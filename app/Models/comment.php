<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $fillable = [
        'post_id', 'name', 'email', 'comment', 'created_at'
    ];
    public function posts()
    {
        return $this->belongsTo('App\Models\post', 'post_id');
    }
}
