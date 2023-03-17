<?php

use Illuminate\Database\Seeder;

class mutationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mutations')->insert([
            'transactions_id' => 1,
        ]);

        DB::table('mutations')->insert([
            'transactions_id' => 2,
        ]);
    }
}
