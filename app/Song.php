<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Song;
use App\Category;

class Song extends Model
{
    public function category()
    {
        return $this->belongsTo(App\Category);
    }

}
