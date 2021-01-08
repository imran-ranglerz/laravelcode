<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Message extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    public function User(){

        return $this->belongsTo(User::class, 'admin_id', 'id');
        
    }

    protected $fillable = [
        'user_id',
        'messages',
        'admin_id',
    ];

}
