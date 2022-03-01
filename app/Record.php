<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = [
        'user_id', 'start_time', 'end_time', 'lifestyle', 'learning_time', 'thoughts'
    ];

    public function user()
    {
        return $this->belongsTo('App\User'); // usersテーブルと紐づけ
    }
}
