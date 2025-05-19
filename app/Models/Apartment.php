<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Apartment extends Model
{
    /** @use HasFactory<\Database\Factories\ApartmentFactory> */
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = ['title', 'description', 'address', 'postal_code', 'image', 'city', 'popularity', 'price_per_night', 'max_number_of_people'];

    public function removePhotoFromDisk()
    {
        if ($this->image && Storage::disk('public')->exists($this->image)) {
            Storage::disk('public')->delete($this->image);
            $this->image = null;
        }
    }
}
