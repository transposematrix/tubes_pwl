<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdoptForm extends Model
{
    protected $fillable = [
        'namalengkap', 'usia', 'alamat', 'alasan', 'user_id', 'post_id', 'created_at',
    ];

    protected $attributes = array(
        'status_adopt' => "0",
     );

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function posts()
    {
        return $this->belongsTo('App\Models\post', 'post_id');
    }
}
