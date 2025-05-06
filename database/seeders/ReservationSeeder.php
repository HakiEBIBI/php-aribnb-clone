<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Apartment;
use App\Models\Reservation;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users = User::inRandomOrder()->take(10)->get();
        $apartments = Apartment::all();

        $users->each(function ($user) use ($apartments) {
            Reservation::factory()->create([
                'user_id' => $user->id,
                'apartment_id' => $apartments->random()->id,
                ]);
            });
    }
}
