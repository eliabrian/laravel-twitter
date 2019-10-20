<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $fillable = [
        'bio', 'location', 'url', 'image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
