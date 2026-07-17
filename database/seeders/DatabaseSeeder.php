<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Orden de ejecución importante para mantener las relaciones
        $this->call([
            TransporteSeeder::class,
            ControlSeeder::class,
            CargoSeeder::class,
            UnidadAdministrativaSeeder::class,
            AutorizacionSeeder::class,
            // ConvenioSeeder::class, // Descomentar si se necesitan datos de convenios
            // AutorizacionConvenioSeeder::class, // Descomentar si se necesitan datos
            AutorizacionUnidadAdministrativaSeeder::class,
            // Los seeders de solicitantes, registros y solicitudes se pueden agregar después
        ]);
    }
}