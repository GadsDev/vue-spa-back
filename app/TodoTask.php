<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TodoTask extends Model
{

    protected $fillable = [
        'label', 'is_complete', 'todo_id'
    ];

    public function todo(){
        return $this->belongsTo(Todo::class);
    }
}
