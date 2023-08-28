<?php

namespace Database\Seeders;

use App\Models\Contributor;
use Illuminate\Database\Seeder;

class ContributorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contributor::factory(200)->create();
    }
}
