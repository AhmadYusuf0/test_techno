<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ukuranModel extends Model
{

    use HasFactory;

    protected $table = 'ukuran';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'id_produk',
        'nama_ukuran',
        'created_at',
        'updated_at',
    ];
}
