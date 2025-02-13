<?php

namespace App\Http\Controllers;

use App\Http\Requests\KategoriRequest;
use App\Models\Kategori;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class KategoriController extends Controller
{
    public function index() {
        $kategori = Kategori::where('id_kategori')->first();
        return view('admin-template.kategori', compact('kategori'));
    }

    public function show() {
        $kategori = Kategori::orderBy('created_at', 'desc')->get();

        return DataTables::of($kategori)
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

            ->editColumn('status', function ($row) {
                if ($row->status == 1) {
                    return "<div'><div class='badge rounded-pill bg-label-success'>" . "Active" . "</div></div>";
                } else {
                    return "<div'><div class='badge rounded-pill bg-label-danger'>" . "Inactive" . "</div></div>";
                }
            })
            
            ->addColumn('action', function ($row) {
                $icon = ($row->status) ? "ti-circle-x" : "ti-circle-check";
                $color = ($row->status) ? "danger" : "success";

                $btn = 
                "
                <a data-id='{$row->id_kategori}' data-url='kategori/destroy' class='btn-icon delete-data waves-effect waves-light'><i class='ti ti-trash fa-lg' style='color:red'></i></a>
                <a data-bs-toggle='modal' data-id='{$row->id_kategori}' onclick=edit($(this)) class='btn-icon text-warning waves-effect waves-light'><i class='tf-icons ti ti-edit' ></i>
                <a data-status='{$row->status}' data-id='{$row->id_kategori}' data-url='kategori/status' class='btn-icon update-status text-{$color} waves-effect waves-light'><i class='tf-icons ti {$icon}'></i></a>
                ";
                return $btn;
            })
            ->rawColumns(['action', 'picture', 'status'])
            ->make(true);
    }
    public function store(KategoriRequest $request){
        try {
            $file = null;
            if ($request->file('picture')) {
                $file = $request->file('picture')->store('kategori', 'public');
            }
            
            $kategori = Kategori::create([
                'deskripsi' => $request->deskripsi,
                'picture' => $file,
                'status' => 0,
            ]);
            $kategori->save();

            return response()->json([
                'error' => false,
                'message' => 'Image successfully Created!',
                'modal' => '#modal-kategori',
                'table' => '#table-kategori',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function edit(String $id) {
        $kategori = Kategori::where('id_kategori', $id)->first();
        return $kategori;
    }

    public function update(KategoriRequest $request, $id) {
        try {
            $file = null;
            if ($request->file('picture')) {
                $file = $request->file('picture')->store('kategori', 'public');
            }
            $kategori = Kategori::where('id_kategori', $id)->first();
            $kategori->deskripsi = $request->deskripsi;
            $kategori->picture = $file;
            $kategori->updated_at = now();
            $kategori->status = 2;
            $kategori->save();
            return response()->json([
                'error' => false,
                'message' => 'Image successfully Created!',
                'modal' => '#modal-kategori',
                'table' => '#table-kategori',
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
            $kategori = Kategori::where('id_kategori', $id)->first();
            $kategori->status = ($kategori->status) ? false : true;
            $kategori->save();

            return response()->json([
                'error' => false,
                'message' => 'Status successfully Updated!',
                'table' => '#table-kategori'
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
            $kategori = Kategori::Where('id_kategori', $id)->first();
            if ($kategori) {
                $kategori->delete();
                return response()->json([
                    'error' => false,
                    'message' => 'Kategori successfully deleted!',
                    'table' => '#table-kategori'
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
