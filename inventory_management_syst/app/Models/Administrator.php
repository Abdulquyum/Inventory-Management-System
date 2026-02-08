<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Models\Request;

class Administrator extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\AdministratorFactory> */
    use HasFactory;

    protected $guarded = [];

    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function requests()
    {
        return $this->hasMany(Request::class, 'user_id');
    }
}
