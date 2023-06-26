<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    /**
     * @var mixed|string
     */
    protected $fillable =[
       'filename',
       'caption',
       'user_id',
        'path'
   ];
}
