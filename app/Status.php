<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{

    protected $fillable = [
        'status', 'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
