<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class BannerController extends Controller
{
    public function index() {
        return view('admin-template.banner');
    }
    public function show(Request $request) {
        $banner = Banner::orderBy('created_at', 'asc')->get();

        return DataTables::of($banner)
            ->addIndexColumn()
            ->editColumn('created_at', function ($row) {
                return Carbon::parse($row->created_at)->format('d/m/y');
            })
            ->editColumn('updated_at', function ($row) {
                return Carbon::parse($row->updated_at)->format('d/m/y');
            })
            ->editColumn('picture', function ($row) {
                $url = Storage::url('' . $row->picture);
                return "<img src='$url' alt='Picture' style='width: 50px; height: 50px; object-fit: cover;'>";
            })
            
            ->addColumn('action', function ($row) {
                $icon = ($row->status) ? "ti-circle-x" : "ti-circle-check";
                $color = ($row->status) ? "danger" : "success";

                $btn = "
                <a data-id='{$row->id}' data-url='banner/destroy' class='btn-icon delete-data waves-effect waves-light'><i class='ti ti-trash fa-lg' style='color:red'></i></a>
               ";
                return $btn;
            })
            ->rawColumns(['action', 'picture'])
            ->make(true);
    }

    public function store(BannerRequest $request){
        try {
            $file = null;
            if ($request->file('picture')) {
                $file = $request->file('picture')->store('banner', 'public');
            }
            
            $banner = Banner::create([
                'deskripsi' => $request->deskripsi,
                'picture' => $file,
                'status' => 0,
            ]);
            $banner->save();

            return response()->json([
                'error' => false,
                'message' => 'Image successfully Created!',
                'modal' => '#modal-background',
                'table' => '#table-background',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function status(String $id){
        try {
            $banner = Banner::where('id', $id)->first();
            $banner->status = ($banner->status) ? false : true;
            $banner->save();

            return response()->json([
                'error' => false,
                'message' => 'Status successfully Updated!',
                'table' => '#table-background'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function destroy($id) {
        try {
            $banner = Banner::Where('id', $id)->first();
            if ($banner) {
                $banner->delete();
                return response()->json([
                    'error' => false,
                    'message' => 'banner successfully deleted!',
                    'table' => '#table-background'
                ]);
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'Data not found!',
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ]);
        }
    }
}
