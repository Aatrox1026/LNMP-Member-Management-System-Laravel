<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';
    protected $fillable = ['poster_id', 'title', 'status'];
    const CREATED_AT = 'create_at';
    const UPDATED_AT = 'update_at';
}
