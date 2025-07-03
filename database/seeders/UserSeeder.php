<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Jimmy Niels Paytan Villavicencio',
            'email' => 'jimmypaytan10@gmail.com',
            'password' => bcrypt('password'),
            'dni' => 46292623,
            'phone' => '922868264',
            'address' => 'Jr Lima 123'
        ])->assignRole('Doctor');
    }
}
