<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccountInformation extends Model
{
    protected $table = 'account_informations';
    use HasFactory, SoftDeletes;

    protected $fillable = ['id','mojoodi', 'name', 'tedad_vam', 'user_id','user_access'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function user_acc()
    {
        return $this->belongsTo(User::class, 'user_access');
    }

}
