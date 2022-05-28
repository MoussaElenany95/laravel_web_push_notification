<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginDevice extends Model
{
    use HasFactory;
    protected $table = "login_devices";
    protected $fillable = [
        'name',
        'device_key',
    ];

    public function user(){

        return $this->belongsTo(User::class);
    }


}
