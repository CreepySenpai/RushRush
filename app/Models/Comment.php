<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
     // Override
     protected $table = 'Comments';
     protected $primaryKey = 'com_id';

     // Can access all data
     protected $guarded = [];
}
