<?php

namespace App\Filters;

class UserFilterPerfect extends QueryFilterPerfect
{

    public function gender($value)
    {
        if ($value != 'all') {
            return $this->builder
                ->where(function ($query) use ($value) {
                    $query->where('gender', $value);
                });
        }
        return $this->builder;
    }

    public function goal_here($value)
    {
        if ($value != 'all') {
            return $this->builder->join('user_infos as user_infos_goal_here', 'users.id', '=', 'user_infos_goal_here.user_id')
                ->where(function ($query) use ($value) {
                    $query->where('user_infos_goal_here.goal_here', $value)
                        ->orWhereNull('user_infos_goal_here.goal_here');
                });
        }
        return $this->builder;
    }


    public function hair_color($value)
    {
        if ($value != 'all') {
            return $this->builder->leftJoin('user_infos as user_infos_hair_color', 'users.id', '=', 'user_infos_hair_color.user_id')
//                ->select([
//                    'users.*',
////                    'user_infos_hair_color.user_id as id', // замінюємо user_id на id
//                    'user_infos_hair_color.hair_color',
//                    'user_infos_hair_color.height',
//                    'user_infos_hair_color.weight',
//                    'user_infos_hair_color.waistline',
//                    'user_infos_hair_color.boobs_size',
//                    'user_infos_hair_color.ass_girth',
//                    'user_infos_hair_color.dick_length',
//                    'user_infos_hair_color.goal_here',
//                ])
                ->where(function ($query) use ($value) {
                    $query->where('user_infos_hair_color.hair_color', $value)
                        ->orWhereNull('user_infos_hair_color.hair_color');
                });
        }
        return $this->builder;
    }


//    public function hair_color($value)
//    {
//        if ($value != 'all') {
//            // Переконуємось, що при join таблиці user_infos.id не використовується, а тільки user_infos.user_id
//            return $this->builder->join('user_infos as user_infos_hair_color', function ($join) {
//                $join->on('users.id', '=', 'user_infos_hair_color.user_id');
//            })
//                ->where(function ($query) use ($value) {
//                    $query->where('user_infos_hair_color.hair_color', $value)
//                        ->orWhereNull('user_infos_hair_color.hair_color');
//                });
//        }
//        return $this->builder;
//    }
//    public function hair_color($value)
//    {
//        if ($value != 'all') {
//            return $this->builder->join('user_infos as user_infos_hair_color', 'users.id', '=', 'user_infos_hair_color.user_id')
//                ->where(function ($query) use ($value) {
//                    $query->where('user_infos_hair_color.hair_color', $value)
//                        ->orWhereNull('user_infos_hair_color.hair_color');
//                });
//        }
//        return $this->builder;
//    }

    public function age($value = 0)
    {
        return $this->builder
            ->where(function ($query) use ($value) {
                $query->whereBetween('age',  [$value - 3, $value + 3] );
            });
    }



    public function height($value = 0)
    {
        return $this->builder->join('user_infos as user_infos_height_from', 'users.id', '=', 'user_infos_height_from.user_id')
            ->where(function ($query) use ($value) {
                $query->whereBetween('user_infos_height_from.height', [$value - 15, $value + 15])
                    ->orWhereNull('user_infos_height_from.height');
            });
    }

    public function weight($value = 0)
    {

        return $this->builder->join('user_infos as user_infos_weight_from', 'users.id', '=', 'user_infos_weight_from.user_id')
            ->where(function ($query) use ($value) {
                $query->whereBetween('user_infos_weight_from.weight', [$value - 10, $value + 10])
                    ->orWhereNull('user_infos_weight_from.weight');
            });
    }


    public function boobs_size($value = 0)
    {
        return $this->builder->join('user_infos as user_infos_boobs_size_from', 'users.id', '=', 'user_infos_boobs_size_from.user_id')
            ->where(function ($query) use ($value) {
                $query->whereBetween('user_infos_boobs_size_from.boobs_size', [$value - 1, $value + 1])
                    ->orWhereNull('user_infos_boobs_size_from.boobs_size');
            });
    }


    public function ass_girth($value = 0)
    {
        return $this->builder->join('user_infos as user_infos_ass_girth_from', 'users.id', '=', 'user_infos_ass_girth_from.user_id')
            ->where(function ($query) use ($value) {
                $query->whereBetween('user_infos_ass_girth_from.ass_girth',  [$value - 13, $value + 15])
                    ->orWhereNull('user_infos_ass_girth_from.ass_girth');

            });
    }


    public function waistline($value = 0)
    {
        return $this->builder->join('user_infos as user_infos_waistline_from', 'users.id', '=', 'user_infos_waistline_from.user_id')
            ->where(function ($query) use ($value) {
                $query->whereBetween('user_infos_waistline_from.waistline', [$value - 10, $value + 10])
                    ->orWhereNull('user_infos_waistline_from.waistline');

            });
    }


    public function dick_length($value = 0)
    {
        return $this->builder->join('user_infos as user_infos_dick_length_from', 'users.id', '=', 'user_infos_dick_length_from.user_id')
            ->where(function ($query) use ($value) {
                $query->whereBetween('user_infos_dick_length_from.dick_length', [$value - 3, $value + 4])
                    ->orWhereNull('user_infos_dick_length_from.dick_length');
            });

    }


}
