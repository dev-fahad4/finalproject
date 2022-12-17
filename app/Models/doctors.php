<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctors extends Model
{
    use HasFactory;

    protected $hidden = [
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
        
    ];
}
