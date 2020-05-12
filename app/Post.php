<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use Sluggable;

    protected $fillable = ['title','content','user_id','thumbnail','slug'];
    //inheritance dates function on created_at
    protected $dates = ['created_at'];
    
    function user()
    {
        return $this->belongsTo(User::class);
    }

    function thumbnail()
    {
        return !$this->thumbnail ? asset('no-thumbnail.jpg') : $this->thumbnail;
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
