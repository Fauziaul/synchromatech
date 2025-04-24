<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ukuran extends Model
{
    use HasFactory,  AuthenticableTrait;
    protected $table = 'size_has_pesanan';
    protected $fillable = [
        'id_produk',
        'id_pesanan',
        's',
        'l',
        'm',
        'xl',
        'xxl',
        'xxxl',
    ];
    protected $keyType = 'string';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function pesanan(){
        return $this->belongsTo(Pesanan::class, 'id', 'id_pesanan');
    }
    public function produk(){
        return $this->belongsTo(Produk::class, 'id_produk', 'id_produk');
    }
}
