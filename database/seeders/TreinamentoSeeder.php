<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Treinamento;

class TreinamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Treinamento::factory()
            ->times(15)
            ->create();
    }
}
