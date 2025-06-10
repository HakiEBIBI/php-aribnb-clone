<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperReservation
 */
class Reservation extends Model
{
    /** @use HasFactory<\Database\Factories\ReservationFactory> */
    use HasFactory;

    public function reservation(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = ['user_id','arrival_date', 'departure_date', 'traveler_number'];
}
