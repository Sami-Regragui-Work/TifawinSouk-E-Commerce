<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class User extends Model
{
    protected $fillable = ['name', 'email', 'password', 'role_id'];

    protected $hidden = ['password'];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(fn($user) => $user->password = Hash::make($user->password));
        static::updating(function ($user) {
            if ($user->isDirty('password')) $user->password = Hash::make($user->password);
        });
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
