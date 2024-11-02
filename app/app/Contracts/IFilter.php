<?php


namespace App\Contracts;

use Illuminate\Database\Eloquent\Builder;

interface IFilter
{
    public function filters();

    public function apply(Builder $builder);
    public function paramToArray($param);

}
