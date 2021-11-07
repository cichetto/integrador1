<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Atividade;

class AtividadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Atividade::factory()
            ->times(20)
            ->create();
    }
}
