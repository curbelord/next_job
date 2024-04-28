<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Demandante;
use App\Models\CV;
use App\Models\Experiencia;

class PerfilControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_update_user_profile()
    {
        $usuario = User::create([
            'nombre' => 'Nombre Test',
            'apellidos' => 'Apellidos Test',
            'email' => 'nombre@gmail.com',
            'password' => 'password',
            'telefono' => '923456789',
            'direccion' => 'Dirección de prueba',
            'fecha_nacimiento' => '1990-01-01',
        ]);

        $response = $this->actingAs($usuario)
            ->post(route('perfil.editar_demandante', ['id' => $usuario->id]), [
                'nombre' => 'Nuevo Nombre',
                'apellidos' => 'Apellidos Test',
                'email' => 'nuevo@gmail.com',
                'telefono' => '923456789',
                'direccion' => 'Nueva Dirección',
                'fecha_nacimiento' => '1990-01-01'
            ]);

        $this->assertDatabaseHas('users', [
            'id' => $usuario->id,
            'nombre' => 'Nuevo Nombre',
            'apellidos' => 'Apellidos Test',
            'email' => 'nuevo@gmail.com',
            'telefono' => '923456789',
            'direccion' => 'Nueva Dirección',
            'fecha_nacimiento' => '1990-01-01'
        ]);

        $response->assertRedirect(route('perfil.ver_demandante', compact('usuario')));
    }

    /** @test */
    /*public function it_can_create_experience()
    {
        $usuario = User::create([
            'nombre' => 'Nombre Test',
            'apellidos' => 'Apellidos Test',
            'email' => 'nombre@gmail.com',
            'password' => 'password',
            'telefono' => '923456789',
            'direccion' => 'Dirección de prueba',
            'fecha_nacimiento' => '1990-01-01'
        ]);

        $table->string('descripcion')->default('');

        $demandante = Demandante::create([
            'id' => $usuario->id,
            'checkin' => 1
        ]);

        $cv = CV::create([
            'jornada_laboral' => 'Tiempo Completo',
            'puesto_trabajo' => 'Puesto Test',
            'tipo_trabajo' => 'Tiempo Completo',
            'id_demandante' => $usuario->id
        ]);

        $experiencia = Experiencia::create([
            'id_cv' => $cv->id,
            'id_experiencia' => 1,
            'nombre' => 'Puesto Test',
            'centro_laboral' => 'Empresa Test',
            'descripcion' => 'Descripción de la experiencia',
            'fecha_inicio' => '2020-01-01',
            'fecha_fin' => '2021-01-01'
        ]);

        $response = $this->actingAs($cv)
            ->post(route('perfil.editar.experiencia_laboral.ver', ['id_cv' => $cv->id, 'id' => 1]), [
                'id_cv' => $cv->id,
                'id_experiencia' => 1,
                'nombre' => 'Puesto Test',
                'centro_laboral' => 'Empresa Test',
                'descripcion' => 'Descripción de la experiencia',
                'fecha_inicio' => '2020-01-01',
                'fecha_fin' => '2021-01-01'
            ]);
        
        $this->assertDatabaseHas('experiencia', [
            'id_cv' => $usuario->id,
            'id_experiencia' => 1,
            'nombre' => 'Puesto Test',
            'centro_laboral' => 'Empresa Test',
            'descripcion' => 'Descripción de la experiencia',
            'fecha_inicio' => '2020-01-01',
            'fecha_fin' => '2021-01-01'
        ]);

        $response->assertRedirect(route('perfil.ver_demandante'));
    }*/
}
