<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //protected $fillable = ['title', 'url', 'description'];
    protected $guarded =[];
    public function getRouteKeyName()
    {
        return 'url';
    }
}
