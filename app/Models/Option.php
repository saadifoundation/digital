<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'title_abbr';
    }
    
    public function levels()
    {
        return $this->belongsToMany('App\Models\Level')->withTimestamps();
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag')->withTimestamps();
    }
}
