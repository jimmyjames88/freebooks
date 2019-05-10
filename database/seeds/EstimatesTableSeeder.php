<?php

use Illuminate\Database\Seeder;

class EstimatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     public function generateLineItems($faker) {
         $c = mt_rand(1, 15);
         $items = [];
         for($i=0; $i<$c; $i++) {
             function generateLineItems() {
                 $c = mt_rand(1, 15);
                 $items = [];
                 for($i=0; $i<$c; $i++) {
                     $items[] = [
                         'description'   =>  $faker->realText(mt_rand(10, 20)),
                         'quantity'      =>  mt_rand(1, 40),
                         'rate'          =>  mt_rand(20)
                     ];
                 }
             }
         }
     }

    public function run()
    {

        factory(App\Estimate::class, 150)->create();
    }
}
