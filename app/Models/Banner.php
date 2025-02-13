<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory, AuthenticableTrait;
    protected $table = 'banner';
    protected $fillable = [
        'deskripsi',
        'picture',
        'status',
    ];
}
