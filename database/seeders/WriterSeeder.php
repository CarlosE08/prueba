<?php

// database/seeders/WritersTableSeeder.php

namespace Database\Seeders;

use App\Models\Writer;
use Illuminate\Database\Seeder;

class WritersSeeder extends Seeder
{
    public function run()
    {
        Writer::factory()->count(5)->create();
    }
}
