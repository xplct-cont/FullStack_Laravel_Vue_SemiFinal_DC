<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'operator' => $this->faker->unique()->randomElement(["Gellert Grindelwald", "Ron Weasley", "Draco Malfoy", "Albus Dumbledore", "Neville Longbottom", "Harry Potter", "Kenn Secusana", "Chris Cornell"]),
            'bus_name' => $this->faker->unique()->randomElement(["Dragon Lines","Charter Bus Co.","Blue Line Bus","Champion Express", "Sorcerer Bus", "Skoda Transportation", "Solaris Bus Lines", "Ikarus Bus"]),
            'point_of_origin' => $this->faker->unique()->randomELement(["Cabulijan, Tubigon, Bohol,", "Looc, Calape, Bohol,", "Bentig, Calape, Bohol", "Lomboy, Calape, Bohol", "Liboron, Calape, Bohol", "Desamparados, Calape, Bohol", "Ulbujan, Calape, Bohol", "Sta. Cruz, Calape, Bohol"]),
            'destination' => $this->faker->randomElement(["Tagbilaran City, Bohol", "Puntacruz, Maribojoc, Bohol", "Basdacu, Loon, Bohol", "Palo, Loay, Bohol", "Bonbon, Loay, Bohol"]),
            'passenger_name'=>$this->faker->name,

        ];
    }
}
