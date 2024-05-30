<?php

namespace App\Filters;

class UserFilter extends QueryFilter
{

    public function gender($value)
    {
        return $this->builder->where('gender', $value);
    }

    public function age_from($value = 0)
    {
        return $this->builder->where('age', '>', $value);
    }

    public function age_to($value = 200)
    {
        return $this->builder->where('age', '<', $value);
    }

}
