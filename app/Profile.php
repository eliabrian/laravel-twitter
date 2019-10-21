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

    public function profileImage()
    {
        $imageProfile = ($this->image) ? $this->image : 'upload/KeMyOyMFO90EhiHniw1aLfkwArXtvtzJdE239XUn.png';
        return $imageProfile;
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }
}
