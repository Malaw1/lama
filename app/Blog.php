<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $dates = ['deleted_at'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $table = 'blogs';

    protected $guarded = ['id'];

    public function comments()
    {
        return $this->hasMany(BlogComment::class);
    }
    public function category()
    {
        return $this->belongsTo(BlogCategory::class,'blog_category_id');
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function getBlogCategoryAttribute()
    {
        return $this->category->pluck('id');
    }
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
