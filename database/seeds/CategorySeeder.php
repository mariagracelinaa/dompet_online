<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'penjualan',
            'type' => 'pemasukan'
        ]);

        DB::table('categories')->insert([
            'name' => 'gaji karyawan',
            'type' => 'pengeluaran'
        ]);

        DB::table('categories')->insert([
            'name' => 'biaya listrik',
            'type' => 'pengeluaran'
        ]);
    }
}
