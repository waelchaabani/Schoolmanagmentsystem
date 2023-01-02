<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Account extends Authenticatable implements CanResetPassword
{
    use HasFactory;
    use Notifiable;

    protected $table = 'accounts';
    public $guarded = [


    ];
    public $timestamps = false;
}
