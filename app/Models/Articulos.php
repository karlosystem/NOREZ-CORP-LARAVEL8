<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulos extends Model
{
    use HasFactory;

    protected $table = 'articulos';

   protected $fillable = [
        'fk_servicio','title','slug','resumen','presentacion','contenido',
        'thumbnail','metatitle','metadescription','metakeywords',
        'status','destacado','portada','orden','user_id'
    ];

    public function scopeOnlyParent($query)
    {
        return $query->whereNull('fk_servicio');
    }

    public function servicios()
    {
        return $this->belongsToMany(Servicios::class)->withTimestamps();
    }


     public function servicio()
    {
        return $this->belongsTo(Servicios::class, 'fk_servicio', 'id');
    }


    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function scopeSearch($query, $title)
    {
        return $query->where('title', 'LIKE', "%{$title}%");
    }

    public function scopePublish($query)
    {
        return $query->where('status', 'publish');
    }

    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

}
