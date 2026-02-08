<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    /** @use HasFactory<\Database\Factories\RequestFactory> */
    use HasFactory;

    protected $fillable = [
        'requester_name',
        'user_id',
        'department',
        'item',
        'item_id',
        'quantity',
        'purpose',
        'status',
    ];
}
