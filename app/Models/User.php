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
        'online',
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



//    public function chats()
////    public function chats(): HasMany
//    {
//
////        $sender = $this->hasMany(Message::class, 'sender_id')
////            ->selectRaw('recipient_id, MAX(id) as id, MAX(body) as content, MAX(created_at) as created_at')
////            ->groupBy('recipient_id');
////
////
////
////
////
////        $recepient = $this->hasMany(Message::class, 'recipient_id')
////            ->selectRaw('recipient_id, MAX(id) as id, MAX(body) as content, MAX(created_at) as created_at')
////            ->groupBy('sender_id');
////
//
//
//        $senderChats = $this->hasMany(Message::class, 'sender_id')
//            ->selectRaw('recipient_id, MAX(sender_id) as sender_id, MAX(id) as id, MAX(body) as body, MAX(created_at) as created_at')
//
//            ->orderBy('id')
//            ->groupBy('recipient_id');
//
//        $recipientChats = $this->hasMany(Message::class, 'recipient_id')
//            ->selectRaw('sender_id, MAX(recipient_id) as recipient_id, MAX(id) as id, MAX(body) as body, MAX(created_at) as created_at')
//            ->orderBy('id')
//            ->groupBy('sender_id');
//
////        $senderChats = $this->hasMany(Message::class, 'sender_id')
////            ->selectRaw('recipient_id as chat_user_id, MAX(sender_id) as sender_id, MAX(id) as id, MAX(body) as content, MAX(created_at) as created_at')
////            ->groupBy('recipient_id');
////
////        $recipientChats = $this->hasMany(Message::class, 'recipient_id')
////            ->selectRaw('sender_id as chat_user_id, MAX(recipient_id) as recipient_id, MAX(id) as id, MAX(body) as content, MAX(created_at) as created_at')
////            ->groupBy('sender_id');
//
//        return $senderChats->union($recipientChats)->get();
//
////        return $sender;
////        dd($sender);
//
//    }

//    /**
//     * The attributes that should be hidden for serialization.
//     *
//     * @var array<int, string>
//     */
//    protected $hidden = [
//        'password',
//    ];

//    /**
//     * The attributes that should be cast.
//     *
//     * @var array<string, string>
//     */
//    protected $casts = [
//        'email_verified_at' => 'datetime',
//    ];
}
