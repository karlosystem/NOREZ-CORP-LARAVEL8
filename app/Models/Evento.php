<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'cover_image', 'description', 'content', 'status', 'user_id'];

    public function scopeSearch($query, $title)
    {
        return $query->where('name', 'LIKE', "%{$title}%");
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
