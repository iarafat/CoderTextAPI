<?php

namespace App;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\Post as BaseModel;

class Post extends BaseModel implements Searchable
{
    public function getImageAttribute($value)
    {
        return Voyager::image($value);
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('posts.show', $this->slug);

        return new SearchResult(
            $this,
            $this->title,
            $url
        );
    }
}
