<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients = factory(App\Client::class, 50)
            ->create()
            ->each(function($client) {
                $client->save();
                $estimate = factory(App\Estimate::class)
                    ->make([ 'client_id' => $client->id ]);

                $client->estimates()->save($estimate);
            });
    }
}
