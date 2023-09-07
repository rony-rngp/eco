<?php

use App\Model\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::updateOrCreate([
            'name' => 'Rony Islam',
            'type' => 'admin',
            'mobile' => '01792702312',
            'email' => 'rony.rng@gmail.com',
            'password' => Hash::make('11111111'),
            'status' => 1,
        ]);

        Admin::updateOrCreate([
            'name' => 'Arafat Hossen',
            'type' => 'subadmin',
            'mobile' => '01792702311',
            'email' => 'arafat@gmail.com',
            'password' => Hash::make('11111111'),
            'status' => 1,
        ]);
    }
}
