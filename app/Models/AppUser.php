<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppUser extends Model
{
    use HasFactory;

    protected $table = 'app_users';
    protected $primarykey = 'id';

    protected $fillable = [
        'name',
        'email',
        'date_of_birth',
        'cnic',
        'phone',
        'ucaddress',
        'number_of_votes',
        'image',
        'password',
    ];

}
