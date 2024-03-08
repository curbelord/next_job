<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Empresa;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear datos de ejemplo para Empresa
        Empresa::create([
            'id' => 1,
            'nombre' => 'Artek',
            'descripcion' => 'Empresa de desarrollo de software',
            'ubicacion' => 'Arrecife',
            // Otros campos de Empresa si los hay
        ]);

        // Puedes agregar más registros de Empresa si lo deseas
    }
}
