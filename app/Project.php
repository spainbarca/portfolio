<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //protected $fillable = ['title', 'url', 'description'];
    protected $guarded =[];
    public function getRouteKeyName()
    {
        return 'url';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
