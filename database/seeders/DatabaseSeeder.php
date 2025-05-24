<?php

namespace Database\Seeders;

use App\Models\Configuraciones;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Secretaria;
use App\Models\Horario;
use App\Models\Consultorio;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        User::factory(10)->create();
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123'),
        ])->assignRole('admin');
        User::create([
            'name' => 'Secretaria',
            'email' => 'secre@secre.com',
            'password' => Hash::make('secre123'),
        ])->assignRole('secretaria');
        Secretaria::create([
            'nombres' => 'Secretaria',
            'apellidos' => 'lopzez',
            'curp' => 'CQMA932330MPSIDG5D',
            'celular' => '123456789',
            'fecha_nacimiento' => '1993-03-23',
            'direccion' => 'Calle 123',
            'user_id' => 2,
        ])->assignRole('secretaria');
        $doctorUser = User::create([
            'name' => 'Doctor',
            'email' => 'doctor@doctor.com',
            'password' => Hash::make('doctor123'),
        ]);
        $doctorUser->assignRole('doctor');

        Doctor::create([
            'nombre' => 'Doctor',
            'apellido' => 'lopzez',
            'telefono' => '123456789',
            'licencia_medica' => '123456789',
            'especialidad' => 'Medicina General',
            'user_id' => $doctorUser->id,
        ]);
        User::create([
            'name' => 'Paciente',
            'email' => 'paci@paci.com',
            'password' => Hash::make('paci123'),
        ])->assignRole('paciente');
        User::create([
            'name' => 'Usuario1',
            'email' => 'usuario1@usuario1.com',
            'password' => Hash::make('usuario1234'),
        ])->assignRole('usuario');
        //seeder roles y permisos   admin, secretaria, doctores, pacientes y users
        $this->call(ConsultorioSeeder::class);
        $this->call(PacienteSeeder::class);
        $this->call(DoctorSeeder::class);
        $this->call(SecretariaSeeder::class);
        $this->call(HistorialsSeeder::class);


        Consultorio::create([
            'nombre' => 'Consultorio Central 1',
            'ubicacion' => 'Planta baja, pasillo A',
            'capacidad' => '3',
            'telefono' => '555-1234',
            'especialidad' => 'Medicina General',
            'estado' => 'Disponible',
        ]);

        //creacion de 1 horario
        Horario::Create([
            'doctor_id' => 1,
            'consultorio_id' => 1,
            'dia' => 'Lunes',
            'hora_inicio' => '08:00:00',
            'hora_fin' => '12:00:00',
        ]);

        Configuraciones::create([
            'nombre' => 'Clinica SaluS',
            'direccion' => 'Calle Felipe Angeles 228, Colonia Centro',
            'telefono' => '3481115545',
            'correo' => 'salus@salus.com',
            'logo' => 'logos/iMtoCR8So2uS2YpxXYNGmXqNnCn0xkti5wHtgFrh.png',
        ]);
    }
}
