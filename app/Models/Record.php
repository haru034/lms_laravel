<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'health', 'kg', 'study', 'thounght'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User'); // usersテーブルと紐づけ
    }
}
