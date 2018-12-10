<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name', 'code'];

    //
    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
}
