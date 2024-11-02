<?php

namespace App\Filters;

use App\Contracts\IFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class QueryFilter implements IFilter
{
    public $request;
    protected $builder;
    protected $delimiter = ',';

    public function __construct(Request $request)
    {

        $this->request = $request;
    }
    public function filters()
    {
        return $this->request->query();
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
