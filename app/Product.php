<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Resizable;
use TCG\Voyager\Traits\Translatable;

class Product extends Model
{
    use Translatable, Resizable;
    protected $guarded = [];

    protected $translatable = ['title', 'image',  'seo_title', 'body', 'slug', 'meta_description', 'meta_keywords', 'buy_now_link', 'live_demo_link'];
}
