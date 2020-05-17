<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\Resizable;
use TCG\Voyager\Traits\Translatable;

class Product extends Model
{
    use Translatable, Resizable;

    const PUBLISHED = 'PUBLISHED';
    protected $guarded = [];
    protected $translatable = [
        'title',
        'price',
        'image',
        'seo_title',
        'body',
        'slug',
        'meta_description',
        'meta_keywords',
        'buy_now_link',
        'live_demo_link'
    ];

    public function getImageAttribute($value)
    {
        return Voyager::image($value);
    }

    /**
     * Scope a query to only published scopes.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopePublished(Builder $query)
    {
        return $query->where('status', '=', static::PUBLISHED);
    }

    /**
     * @return BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
