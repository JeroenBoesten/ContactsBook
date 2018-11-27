<?php namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class ContactFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function search($value)
    {
        return $this->where(function ($query) use ($value) {
            return $query
                ->where('first_name', 'LIKE', '%' . $value . '%')
                ->orWhere('last_name', 'LIKE', '%' . $value . '%')
                ->orWhere('phone_number', 'LIKE', '%' . $value . '%')
                ->orWhere('twitter', 'LIKE', '%' . $value . '%')
                ->orWhere('email', 'LIKE', '%' . $value . '%');
        });
    }
}
