<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class login extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id', // تأكد من إضافة هذا السطر
    ];
}