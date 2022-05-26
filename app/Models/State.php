<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Events\StateCreated;
use App\Events\StateEdited;
use App\Events\StateDeleted;

class State extends Model
{
    use HasFactory;
    protected $guarded  = [];

    protected $dispatchesEvents = [
        'created' => StateCreated::class,
        'updated' => StateEdited::class,
        'deleted' => StateDeleted::class
    ];
}
