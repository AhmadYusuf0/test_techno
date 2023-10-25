<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class produkModel extends Model
{

    use HasFactory;

    protected $table = 'produk';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nama',
        'kategori',
        'deskripsi',
        'created_at',
        'updated_at',
    ];
}
