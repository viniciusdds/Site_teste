<?php

use Illuminate\Database\Seeder;
use App\Models\Graph;

class GraphTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Graph::create([
            'labels' => 'Dom',
            'weeks' => 'Semana 2',
            'values' => 49
        ]);
    }
}
