<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;

class UserDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 10; $i++) {
            $name = $this->generateRandomName();
            $username = $this->generateRandomUsername();
            $date_of_birth = $this->generateRandomDateOfBirth();

            User::create([
                'name' => $name,
                'username' => $username,
                'date_of_birth' => $date_of_birth,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('12345678'),
            ]);
        }
    }

    private function generateRandomName()
    {
        $names = [
            'Arslan',
            'Usman',
            'Khalid',
            'Saad',
            'Noman',
        ];

        return $names[array_rand($names)];
    }

    private function generateRandomUsername()
    {
        $names = [
            'Arslan12',
            'Usman13',
            'Khalid56',
            'Saad985',
            'Noman62',
        ];

        return $names[array_rand($names)];
    }

    private function generateRandomDateOfBirth()
    {
        $minAge = 18; // Minimum age for users (adjust as needed)
        $maxAge = 65; // Maximum age for users (adjust as needed)

        // Calculate a random birthdate within the specified age range
        $randomYear = now()->year - rand($minAge, $maxAge);
        $randomMonth = rand(1, 12);
        $randomDay = rand(1, 28); // Adjust maximum day as needed

        return Carbon::createFromDate($randomYear, $randomMonth, $randomDay)->format('Y-m-d');
    }

}
