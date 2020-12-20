<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{

    protected $fillable = [
        'label', 'user_id'
    ];

    public function tasks(){
        return $this->hasMany(TodoTask::class);
    }
}
