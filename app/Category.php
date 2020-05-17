<?php

namespace App;


use Illuminate\Database\Eloquent\Relations\HasMany;
use TCG\Voyager\Models\Category as BaseModel;

class Category extends BaseModel
{
    /**
     * @return HasMany
     */
    public function children()
    {
        return $this->hasMany(self::class, 'parent_id')
            ->whereNotNull('parent_id')
            ->with('children')
            ->orderBy('order');
    }

    /**
     * @return mixed
     */
    public function products()
    {
        return $this->hasMany(Product::class)
            ->published()
            ->orderBy('created_at', 'DESC');
    }
}
