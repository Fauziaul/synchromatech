<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory,  AuthenticableTrait;
    protected $table = 'pesanan';
    protected $fillable = [
        'id_produk',
        'id_kategori',
        'nama_pemesan',
        'email',
        'nohp',
        'alamat',
        'design',
        'catatan',
        'status',
    ];
    protected $keyType = 'string';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function kategori(){
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }
    public function produk(){
        return $this->belongsTo(Produk::class, 'id_produk', 'id_produk');
    }
    public function ukuran()  {
        return $this->hasOne(Ukuran::class, 'id_pesanan');
    }

}
