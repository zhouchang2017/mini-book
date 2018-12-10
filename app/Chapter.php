<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $fillable = ['name', 'course_id'];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

}
