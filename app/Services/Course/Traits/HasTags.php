<?php

namespace App\Services\Course\Traits;

use App\Tag;
use Illuminate\Support\Arr;

trait HasTags
{
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function giveTagsTo(...$tags)
    {
        $tags = $this->getAllTags($tags);
        
        // if($tags->isEmpty()) return $this;

        $this->tags()->sync($tags);
    }

    protected function getAllTags(array $tags)
    {
        return Tag::whereIn('id',Arr::flatten($tags))->get();
    }
    
    public function hasTags(string $tags)
    {
        return $this->tags->contains('id',$tags);
    }
}