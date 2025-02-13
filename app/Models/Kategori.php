<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory, HasUuids, AuthenticableTrait;
    protected $table = 'kategori';
    protected $fillable = [
        'deskripsi',
        'picture',
        'status',
    ];
    protected $keyType = 'string';
    protected $primaryKey = 'id_kategori';
    public $timestamps = true;

}
