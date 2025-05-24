<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\WebController;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $admin = Role::create(['name' => 'admin']);
        $secretaria = Role::create(['name' => 'secretaria']);
        $doctor = Role::create(['name' => 'doctor']);
        $paciente = Role::create(['name' => 'paciente']);
        $usuario = Role::create(['name' => 'usuario']);

        Permission::create(['name' => 'admin.index']);

        //rutas para admin usuarios

        Permission::create(['name' => 'admin.usuarios.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.show'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.confirm-delete'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.destroy'])->syncRoles([$admin]);
        //rutas para admin secretarias

        // Permission::firstOrCreate(['name' => 'admin.secretarias.index'])->syncRoles([$admin]);
        Permission::firstOrCreate(['name' => 'admin.secretarias.index'])->syncRoles([$admin]);
        Permission::firstOrCreate(['name' => 'admin.secretarias.create'])->syncRoles([$admin]);
        Permission::firstOrCreate(['name' => 'admin.secretarias.store'])->syncRoles([$admin]);
        Permission::firstOrCreate(['name' => 'admin.secretarias.show'])->syncRoles([$admin]);
        Permission::firstOrCreate(['name' => 'admin.secretarias.edit'])->syncRoles([$admin]);
        Permission::firstOrCreate(['name' => 'admin.secretarias.update'])->syncRoles([$admin]);
        Permission::firstOrCreate(['name' => 'admin.secretarias.confirm-delete'])->syncRoles([$admin]);
        Permission::firstOrCreate(['name' => 'admin.secretarias.destroy'])->syncRoles([$admin]);
        //rutas para admin pacientes
        Permission::create(['name' => 'admin.pacientes.index'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.pacientes.create'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.pacientes.store'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.pacientes.show'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.pacientes.edit'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.pacientes.update'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.pacientes.confirm-delete'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.pacientes.destroy'])->syncRoles([$admin, $secretaria]);
        //rutas para admin consultorios
        Permission::create(['name' => 'admin.consultorios.index'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.consultorios.create'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.consultorios.store'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.consultorios.show'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.consultorios.edit'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.consultorios.update'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.consultorios.confirm-delete'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.consultorios.destroy'])->syncRoles([$admin, $secretaria]);
        //rutas para admin doctores
        Permission::create(['name' => 'admin.doctores.index'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.doctores.create'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.doctores.store'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.doctores.show'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.doctores.edit'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.doctores.update'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.doctores.confirm-delete'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.doctores.destroy'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.doctores.reportes'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.doctores.pdf'])->syncRoles([$admin, $secretaria]);
        //rutas para admin horarios
        Permission::create(['name' => 'admin.horarios.index'])->syncRoles([$admin, $secretaria, $doctor]);
        Permission::create(['name' => 'admin.horarios.create'])->syncRoles([$admin, $secretaria, $doctor]);
        Permission::create(['name' => 'admin.horarios.store'])->syncRoles([$admin, $secretaria, $doctor]);
        Permission::create(['name' => 'admin.horarios.show'])->syncRoles([$admin, $secretaria, $doctor]);
        Permission::create(['name' => 'admin.horarios.edit'])->syncRoles([$admin, $secretaria, $doctor]);
        Permission::create(['name' => 'admin.horarios.update'])->syncRoles([$admin, $secretaria, $doctor]);
        Permission::create(['name' => 'admin.horarios.confirm-delete'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.horarios.destroy'])->syncRoles([$admin, $secretaria, $doctor]);
        //ajax
      //  Permission::create(['name' => 'admin.cargar_datos_consultorios'])->syncRoles([$admin, $secretaria, $doctor]);

        Permission::create(['name' => 'admin.horarios.cargar_datos_consultorios'])->syncRoles([$admin, $usuario]);
        Permission::create(['name' => 'cargar_reserva_doctores'])->syncRoles([$admin, $usuario]);
        Permission::create(['name' => 'ver_reservas'])->syncRoles([$admin, $usuario]);
        Permission::create(['name' => 'admin.eventos.create'])->syncRoles([$admin, $usuario]);
        Permission::create(['name' => 'admin.eventos.destroy'])->syncRoles([$admin, $usuario]);

        //ajax


        //rutas para administrar la configuracion

        Permission::create(['name' => 'admin.configuraciones.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.configuraciones.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.configuraciones.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.configuraciones.show'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.configuraciones.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.configuraciones.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.configuraciones.confirm-delete'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.configuraciones.destroy'])->syncRoles([$admin]);

        //rutas de las reservas
        Permission::create(['name' => 'admin.reservas.reportes'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.reservas.pdf'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.reservas.pdf_fechas'])->syncRoles([$admin]);

        //rutas para el doctor-historial
        Permission::create(['name' => 'admin.historial.index'])->syncRoles([$admin, $doctor]);
        Permission::create(['name' => 'admin.historial.create'])->syncRoles([$admin, $doctor]);
        Permission::create(['name' => 'admin.historial.store'])->syncRoles([$admin, $doctor]);
        Permission::create(['name' => 'admin.historial.show'])->syncRoles([$admin, $doctor]);
        Permission::create(['name' => 'admin.historial.edit'])->syncRoles([$admin, $doctor]);
        Permission::create(['name' => 'admin.historial.update'])->syncRoles([$admin, $doctor]);
        Permission::create(['name' => 'admin.historial.confirm-delete'])->syncRoles([$admin, $doctor]);
        Permission::create(['name' => 'admin.historial.destroy'])->syncRoles([$admin, $doctor]);
        Permission::create(['name' => 'admin.historial.pdf'])->syncRoles([$admin, $doctor]);
    }
}
