<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    /**
     * The table associated with the model.
     * default: plural of class name
     * @var string
     */
    protected $table = 'user';

    /**
     * The primary key associated with the table.
     * default: id
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the model's ID is auto-incrementing.
     * default: true
     * @var bool
     */
    public $incrementing = true;

    /**
     * The data type of the auto-incrementing ID.
     * default: integer
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * Indicates if the model should be timestamped.
     * default: true
     * @var bool
     */
    public $timestamps = true;

    /**
     * The storage format of the model's date columns.
     * default: Y-m-d H:i:s
     * reference: http://docs.php.net/manual/tw/function.date.php
     * @var string
     */
    protected $dateFormat = 'Y-m-d H:i:s';

    /**
     * To customize the names of the columns used to store the timestamps,
     */
    const CREATED_AT = 'create_at';
    const UPDATED_AT = 'update_at';

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['email', 'password', 'isAdmin'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
//    protected $guarded = [];

    //JWT stuff
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
