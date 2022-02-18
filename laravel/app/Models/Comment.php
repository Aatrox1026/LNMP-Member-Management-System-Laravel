<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    protected $fillable = ['post_id', 'user_id', 'text', 'status'];
    const CREATED_AT = 'create_at';
    const UPDATED_AT = 'update_at';
}
