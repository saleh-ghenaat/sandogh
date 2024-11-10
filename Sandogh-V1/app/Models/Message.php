<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['body' , 'author_id' , 'seen' , 'receiver_id' , 'receiver_firstname' , 'receiver_lastname' , 'reference_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }


    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    // رابطه با کاربر دریافت کننده پیام (receiver)
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    // رابطه با پیام ارجاعی (برای پیوست کردن پیام‌ها)
    public function reference()
    {
        return $this->belongsTo(Message::class, 'reference_id');
    }
}
