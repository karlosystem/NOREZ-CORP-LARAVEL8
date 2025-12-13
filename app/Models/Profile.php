<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = ['email', 'whastapp', 'facebook', 'horario', 'mapa', 'twitter', 'tiktok', 'youtube', 'instagram', 'web', 'message', 'image', 'mobile', 'direccion', 'city','user_id'];
}
