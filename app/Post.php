<?php

namespace App;

use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\Post as BaseModel;

class Post extends BaseModel
{
    public function getImageAttribute($value)
    {
        return Voyager::image($value);
    }
}
