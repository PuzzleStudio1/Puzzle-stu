<?php

namespace App\Services\Course\Traits;

use App\Category;
use Illuminate\Support\Arr;

trait HasCategories
{
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function giveCategoriesTo(...$categories)
    {
        $categories = $this->getAllCategories($categories);
        
        // if($categories->isEmpty()) return $this;

        $this->categories()->sync($categories);
    }

    protected function getAllCategories(array $categories)
    {
        return Category::whereIn('id',Arr::flatten($categories))->get();
    }
    
    public function hasCategories(string $categories)
    {
        return $this->categories->contains('id',$categories);
    }
}