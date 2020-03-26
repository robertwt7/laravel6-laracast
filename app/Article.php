<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * We can override method called getRouteKeyName to override the column that is usually taken by the wildcard at the route.
     *
     * This is for the object that are passed to the methods in controllers
     *
     *  */
    protected $guarded = [];

    public function path()
    {
        return route('articles.show', $this);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        //because in the pivot table, the column does not know if we are submitting it with timestamps
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
