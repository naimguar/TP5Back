<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Appointment;
use App\Models\Client;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear appointments con clientes existentes si los hay
        $clients = Client::all();
        
        if ($clients->count() > 0) {
            // Si ya hay clientes, crear appointments para ellos
            foreach ($clients as $client) {
                // Crear 1-3 appointments por cliente
                $appointmentsCount = rand(1, 3);
                
                for ($i = 0; $i < $appointmentsCount; $i++) {
                    Appointment::factory()
                        ->for($client)
                        ->create();
                }
            }
        } else {
            // Si no hay clientes, crear appointments con clientes nuevos
            Appointment::factory()
                ->count(15)
                ->create();
        }

        // Crear algunos appointments específicos con estados diferentes
        if ($clients->count() > 0) {
            // Appointments programadas
            Appointment::factory()
                ->count(5)
                ->scheduled()
                ->for($clients->random())
                ->create();

            // Appointments completadas
            Appointment::factory()
                ->count(8)
                ->completed()
                ->for($clients->random())
                ->create();

            // Appointments canceladas
            Appointment::factory()
                ->count(3)
                ->cancelled()
                ->for($clients->random())
                ->create();
        }
    }
}
