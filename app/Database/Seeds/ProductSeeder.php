<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class ProductSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 10; $i++) { //to add 10 clients. Change limit as desired
            $this->db->table('product')->insert($this->generateProducts());
        }
    }

    private function generateProducts(): array
    {
        $faker = Factory::create();
        return [
            'name' => $faker->name(),
            'recipe' => $faker->text(200),
            'type' => 'tower_cake'.random_int(1, 20),
            'price' => random_int(100000, 100000000)
        ];
    }
}
