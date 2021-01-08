<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $table = 'medias';
    protected $primarykey = 'id';

    protected $fillable = [
        'title',
        'detail',
        'image',
        'date'
    ];
}
