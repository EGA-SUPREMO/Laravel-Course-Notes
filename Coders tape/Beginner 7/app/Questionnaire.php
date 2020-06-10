<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Questionnaire extends Model
{
    protected $guarded = [];

    public function path()
    {
        return '/questionnaires/' . $this->id;
    }
    public function publicPath()
    {
        return '/survey/'. $this -> id . '-' . Str::slug($this -> title);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function questions()
	{
		return $this -> hasMany(Question::class);
	}

    public function surveys()
	{
		return $this -> hasMany(Survey::class);
	}
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
    public function labels()
    {
        return $this->morphToMany(Label::class, 'labelable');
    }
}
