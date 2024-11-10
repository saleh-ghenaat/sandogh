<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'password',
        'first_name',
        'last_name',
        'national_code',
        'mobile',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function messages(){
        return $this->hasMany(Message::class , 'author_id');
    }

    public function sentMessages()
    {
        return $this->hasMany(Message::class, 'author_id');
    }

    // رابطه با پیام‌های دریافت شده توسط کاربر (دریافت‌کننده پیام)
    public function receivedMessages()
    {
        return $this->hasMany(Message::class, 'receiver_id');
    }

    // دریافت تمام چت‌ها (پیام‌هایی که کاربر با ادمین یا دیگر کاربران رد و بدل کرده)
    public function chats()
    {
        return $this->sentMessages()->union($this->receivedMessages())
            ->orderBy('created_at', 'asc');
    }

    // برای بررسی اینکه آیا کاربر ادمین است یا خیر
    public function isAdmin()
    {
        return $this->status === 'admin';
    }

}
