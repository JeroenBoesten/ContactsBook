<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use Filterable;

    protected $fillable = [
        'first_name',
        'last_name',
        'description',
        'phone_number',
        'email',
        'twitter',
    ];

    protected $appends = ['gravatar'];

    /**
     * Gets a gravatar picture based on the email, if gravatar doesn't exist show anonymous silhouette.
     *
     * @param integer $size
     * @return string url
     */
    public function getGravatarAttribute($size = 75)
    {
        $hash = md5(strtolower(trim($this->email)));

        return "https://www.gravatar.com/avatar/". $hash ."?s=". (int)$size ."&d=mp";
    }

    /**
     * @param String $value
     * Make sure firstname always has capital letter at the start
     */
    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = ucfirst($value);
    }
    /**
     * @param String $value
     * Make sure lastname always has capital letter at the start
     */
    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = ucfirst($value);
    }
}
