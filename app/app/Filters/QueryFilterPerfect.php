<?php

namespace App\Filters;

use App\Contracts\IFilter;
use Illuminate\Database\Eloquent\Builder;

class QueryFilterPerfect implements IFilter
{
    public $criteria;
    protected $builder;
    protected $delimiter = ',';

    public function __construct(array $criteria)
    {

        $this->criteria = $criteria;
    }
    public function filters()
    {
        return $this->criteria;
    }
    public function apply(Builder $builder)
    {

        $builder->leftJoin('user_infos', 'users.id', '=', 'user_infos.user_id')
            ->select([
            'users.*',
            'user_infos.hair_color',
            'user_infos.height',
            'user_infos.weight',
            'user_infos.waistline',
            'user_infos.boobs_size',
            'user_infos.ass_girth',
            'user_infos.dick_length',
            'user_infos.goal_here',
        ]);
        $this->builder = $builder;
        foreach ($this->filters() as $name => $value) {
            if (method_exists($this, $name)) {
                call_user_func_array([$this, $name], array_filter([$value]));
            }
        }
    }
    public function paramToArray($param)
    {

        return explode($this->delimiter, $param);
    }

}
