<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MarcaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        /* return [
            'nm_marca'=>'Metal Horse',
            'ck_categoria_marca'=>'P',
        ]; */
        return [
            'nm_marca'=>'Ford',
            'ck_categoria_marca'=>'C',
        ];
    }
}