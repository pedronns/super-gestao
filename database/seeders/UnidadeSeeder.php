<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Unidade;

class UnidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $unidades = [
            ['unidade' => 'mg', 'descricao' => 'Miligrama'],
            ['unidade' => 'g', 'descricao' => 'Grama'],
            ['unidade' => 'kg', 'descricao' => 'Quilograma'],
            ['unidade' => 't', 'descricao' => 'Tonelada'],
        ];

        foreach ($unidades as $unidade) {
            Unidade::updateOrCreate(['unidade' => $unidade['unidade']], $unidade);
        }
    }
}
