<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class ServiceRequestFilter extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];

    public function fullName($value)
    {
        return $this->whereLike('full_name', "%$value%");
    }

    public function phoneNumber($value)
    {
        return $this->whereLike('phone_number', "%$value%");
    }

    public function id($value)
    {
        return $this->whereLike('id', "%$value%");
    }
}
