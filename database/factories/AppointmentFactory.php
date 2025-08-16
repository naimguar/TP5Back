<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Client;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'client_id' => Client::factory(),
            'appointment_date' => $this->faker->dateTimeBetween('now', '+3 months'),
            'reason' => $this->faker->randomElement([
                'Consulta general',
                'Control rutinario', 
                'Seguimiento',
                'Primera consulta',
                'Chequeo médico',
                'Consulta especializada',
                'Revisión',
                'Urgencia',
                'Examen preventivo'
            ]),
            'status' => $this->faker->randomElement(['scheduled', 'completed', 'cancelled']),
        ];
    }

    /**
     * Indicate that the appointment is scheduled.
     */
    public function scheduled()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => 'scheduled',
                'appointment_date' => $this->faker->dateTimeBetween('now', '+2 months'),
            ];
        });
    }

    /**
     * Indicate that the appointment is completed.
     */
    public function completed()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => 'completed',
                'appointment_date' => $this->faker->dateTimeBetween('-6 months', 'now'),
            ];
        });
    }

    /**
     * Indicate that the appointment is cancelled.
     */
    public function cancelled()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => 'cancelled',
                'appointment_date' => $this->faker->dateTimeBetween('-3 months', '+1 month'),
            ];
        });
    }
}
