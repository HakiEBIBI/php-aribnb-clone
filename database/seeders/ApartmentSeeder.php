<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
            ->count(10)
            ->hasApartments(3)
            //->has(Apartment::factory()->count(3), 'apartments')
            ->create();

        /*        Apartment::factory()
                    ->count(10)
                    ->for(User::factory())
                    ->create();

                $users = User::factory(10)->create();
                foreach ($users as $user) {
                    Apartment::factory(3)->create(['user_id' => $user->id]);
                }*/
    }
}
