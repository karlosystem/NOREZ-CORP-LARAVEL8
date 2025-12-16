<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contenidos extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'thumbnail', 'description', 'content', 'status', 'orden', 'metatitle', 'metadescription', 'user_id'];

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
