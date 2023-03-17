<?php

use Illuminate\Database\Seeder;

class transactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactions')->insert([
            'nominal' => 300000,
            'users_id' => 1,
            'categories_id' => 1,
        ]);

        DB::table('transactions')->insert([
            'nominal' => 55000,
            'users_id' => 1,
            'categories_id' => 2,
        ]);
    }
}
