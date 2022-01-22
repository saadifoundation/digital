<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'title_abbr';
    }

    public function getWidthAttribute()
    {
        return ($this->order * 15 > 100) ? 100 : $this->order * 15;
    }
    
    public function options()
    {
        return $this->belongsToMany('App\Models\Option')->withTimestamps();
    }
}
