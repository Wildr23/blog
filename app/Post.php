<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function autor()
    {
        return $this->belongsTo(Autor::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}


