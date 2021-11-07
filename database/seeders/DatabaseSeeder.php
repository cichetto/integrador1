<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call(AreaSeeder::class);
        $this->call(GrupoSeeder::class);
        $this->call(UsuarioSeeder::class);
        $this->call(TreinamentoSeeder::class);
        $this->call(AgendaSeeder::class);
        $this->call(AtividadeSeeder::class);
    }
}
