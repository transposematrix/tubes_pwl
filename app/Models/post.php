<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $fillable = [
        'judul', 'gambar', 'content', 'excerpt', 'slug', 'user_id', 'kategori_id', 'created_at', 'updated_at'
    ];

    public function kategoris()
    {
        return $this->belongsTo('App\Models\kategori', 'kategori_id');
    }

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function comment()
    {
        return $this->hasMany('App\Models\comment');
    }

    public function Adopt()
    {
        return $this->hasMany('App\Models\AdoptForm');
    }
    
}
