<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'age',
        'last_activity',
    ];

    public function interests():BelongsToMany
    {
        return $this->belongsToMany(Interest::class);
    }

    public function scopeFilter(Builder $builder, QueryFilter $filter)
    {

        return $filter->apply($builder);
    }


    public function chats()
    {

        $chats1 = $this->hasMany(Chat::class, 'sender_id')->get();
        $chats2 = $this->hasMany(Chat::class, 'recipient_id')->get();

        $marged = $chats1->merge($chats2);

        return $marged->sortByDesc('updated_at');
    }

    public function offers():HasMany
    {
        return $this->hasMany(Offer::class);
    }
}
