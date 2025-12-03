<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'thumbnail', 'description', 'content', 'status', 'destacado','user_id', 'metatitle', 'metadescription'];

    public function scopeSearch($query, $title)
    {
        return $query->where('title', 'LIKE', "%{$title}%");
    }

    public function scopePublish($query)
    {
        return $query->where('status', 'publish');
    }

    // Relación: un servicio tiene muchos artículos
    public function articulos()
    {
        return $this->hasMany(Articulos::class, 'fk_servicio', 'id');
    }

    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

    public function scopeSi($query)
    {
        return $query->where('destacado', 'si');
    }

    public function scopeNo($query)
    {
        return $query->where('destacado', 'no');
    }

}
