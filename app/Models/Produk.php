<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produk extends Model
{
    use HasFactory, HasUuids, AuthenticableTrait;
    protected $table = 'produk';
    protected $fillable = [
        'nama_produk',
        'picture',
        'harga',
        'stok',
        'status',
        'id_kategori',
    ];
    protected $keyType = 'string';
    protected $primaryKey = 'id_produk';
    public $timestamps = true;

    public function kategori(){
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }
}
