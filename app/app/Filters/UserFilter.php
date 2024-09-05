<?php

namespace App\Filters;

class UserFilter extends QueryFilter
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
                        ->orWhere('user_infos_goal_here.goal_here', '=', null);
                });
        }
        return $this->builder;
    }

    public function hair_color($value)
    {
        if ($value != 'all') {
            return $this->builder->join('user_infos as user_infos_hair_color', 'users.id', '=', 'user_infos_hair_color.user_id')
                ->where(function ($query) use ($value) {
                    $query->where('user_infos_hair_color.hair_color', $value)
                        ->orWhere('user_infos_hair_color.hair_color', '=', null);
                });
        }
        return $this->builder;
    }

    public function age_from($value = 0)
    {
        return $this->builder
            ->where(function ($query) use ($value) {
                $query->where('age', '>', $value);
            });
    }

    public function age_to($value = 200)
    {
        return $this->builder
            ->where(function ($query) use ($value) {
                $query->where('age', '<', $value);
            });
    }

    public function height_from($value = 0)
    {
        return $this->builder->join('user_infos as user_infos_height_from', 'users.id', '=', 'user_infos_height_from.user_id')
            ->where(function ($query) use ($value) {
                $query->where('user_infos_height_from.height', '>=', $value)
                    ->orWhere('user_infos_height_from.height', '=', null);
            });
    }

    public function height_to($value = 254)
    {
        return $this->builder->join('user_infos as user_infos_height_to', 'users.id', '=', 'user_infos_height_to.user_id')
            ->where(function ($query) use ($value) {
                $query->where('user_infos_height_to.height', '<=', $value)
                    ->orWhere('user_infos_height_to.height', '=', null);
            });
    }

    public function weight_from($value = 0)
    {

        return $this->builder->join('user_infos as user_infos_weight_from', 'users.id', '=', 'user_infos_weight_from.user_id')
            ->where(function ($query) use ($value) {
                $query->where('user_infos_weight_from.weight', '>=', $value)
                    ->orWhere('user_infos_weight_from.weight', '=', null);
            });
    }

    public function weight_to($value = 254)
    {
        return $this->builder->join('user_infos as user_infos_weight_to', 'users.id', '=', 'user_infos_weight_to.user_id')
            ->where(function ($query) use ($value) {
                $query->where('user_infos_weight_to.weight', '<=', $value)
                    ->orWhere('user_infos_weight_to.weight', '=', null);
            });
    }

    public function boobs_size_from($value = 0)
    {
        return $this->builder->join('user_infos as user_infos_boobs_size_from', 'users.id', '=', 'user_infos_boobs_size_from.user_id')
            ->where(function ($query) use ($value) {
                $query->where('user_infos_boobs_size_from.boobs_size', '>=', $value)
                    ->orWhere('user_infos_boobs_size_from.boobs_size', '=', null);
            });
    }

    public function boobs_size_to($value = 254)
    {
        return $this->builder->join('user_infos as user_infos_boobs_size_to', 'users.id', '=', 'user_infos_boobs_size_to.user_id')
            ->where(function ($query) use ($value) {
                $query->where('user_infos_boobs_size_to.boobs_size', '<=', $value)
                    ->orWhere('user_infos_boobs_size_to.boobs_size', '=', null);

            });
    }

    public function ass_girth_from($value = 0)
    {
        return $this->builder->join('user_infos as user_infos_ass_girth_from', 'users.id', '=', 'user_infos_ass_girth_from.user_id')
            ->where(function ($query) use ($value) {
                $query->where('user_infos_ass_girth_from.ass_girth', '>=', $value)
                    ->orWhere('user_infos_ass_girth_from.ass_girth', '=', null);

            });
    }

    public function ass_girth_to($value = 254)
    {
        return $this->builder->join('user_infos as user_infos_ass_girth_to', 'users.id', '=', 'user_infos_ass_girth_to.user_id')
            ->where(function ($query) use ($value) {
                $query->where('user_infos_ass_girth_to.ass_girth', '<=', $value)
                    ->orWhere('user_infos_ass_girth_to.ass_girth', '=', null);

            });
    }

    public function waistline_from($value = 0)
    {
        return $this->builder->join('user_infos as user_infos_waistline_from', 'users.id', '=', 'user_infos_waistline_from.user_id')
            ->where(function ($query) use ($value) {
                $query->where('user_infos_waistline_from.waistline', '>=', $value)
                    ->orWhere('user_infos_waistline_from.waistline', '=', null);

            });
    }

    public function waistline_to($value = 254)
    {
        return $this->builder->join('user_infos as user_infos_waistline_to', 'users.id', '=', 'user_infos_waistline_to.user_id')
            ->where(function ($query) use ($value) {
                $query->where('user_infos_waistline_to.waistline', '<=', $value)
                    ->orWhere('user_infos_waistline_to.dick_length', '=', null);
            });
    }

    public function dick_length_from($value = 0)
    {
        return $this->builder->join('user_infos as user_infos_dick_length_from', 'users.id', '=', 'user_infos_dick_length_from.user_id')
            ->where(function ($query) use ($value) {
                $query->where('user_infos_dick_length_from.dick_length', '>=', $value)
                    ->orWhere('user_infos_dick_length_from.dick_length', '=', null);
            });

    }

    public function dick_length_to($value = 254)
    {
        return $this->builder->join('user_infos as user_infos_dick_length_to', 'users.id', '=', 'user_infos_dick_length_to.user_id')
            ->where(function ($query) use ($value) {
                $query->where('user_infos_dick_length_to.dick_length', '<=', $value)
                    ->orWhere('user_infos_dick_length_to.dick_length', '=', null);
            });
    }

}
