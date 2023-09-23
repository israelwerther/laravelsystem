<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGroupAssociate extends Model
{
    use HasFactory;

    protected $fillable = ['user_group_id', 'user_id', 'active'];
    
}
