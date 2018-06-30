<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'province_id'               => '2',
            'city_id'                   => '2',
            'name'                      => 'Helmuth',
            'lastname'                  => 'Sodetz',
            'username'                  => 'hsodetz',
            'age'                       => '39',
            'email'                     => 'sodhel2001@gmail.com',
            'password'                  => bcrypt('123456'),
            'identification_document'   => '14272998',
            'address'                   => 'Napo',
            'phone_mobile'              => '231654',
            'phone_house'               => '4546',
            'sex'                       => 'Male',
            'nationality'               => 'Venezolana',
            'occupation'                => 'Electronico',
            'civil_status'              => 'Single',
        ]);
    }
}
