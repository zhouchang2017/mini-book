<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    protected $fillable = ['name', 'body', 'type_id','chapter_id'];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }


}
