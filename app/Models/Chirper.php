<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Events\ChirpCreated;

class Chirper extends Model
{
    use HasFactory;

  /**
     * Get the user that owns the Chirper
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

     protected $fillable = ['message'];

     /**
      * Get the user that owns the Chirper
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */
     public function user(): BelongsTo
     {
         return $this->belongsTo(User::class);
     }

     protected $dispatchesEvents = [
        'created' => ChirpCreated::class,
    ];
 
}
