<?php

use Illuminate\Database\Seeder;
// use illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PersonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Persons::create([
        //     'name' => 'tgl_lahir Date',
        //     'date' => \Carbon\Carbon::createFromDate(1980,01,01)->toDateTimeString()
        // ]);
        $faker = Faker\Factory::create('id_ID');
        foreach (range(1, 50) as $loop) {
            DB::table('persons')->insert([
                'nama_lengkap' => $faker->name, 
                'jenis_kelamin' => $faker->randomElement(['l','p']),
                'tanggal_lahir' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'no_telepon' => $faker->phoneNumber,
                'email' => $faker->email,
                'alamat' => $faker->address,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        // for($i = 0; $i < 50; $i++) {
        //     App\Person::create([
        //         'nama_lengkap' => $faker->nama_lengkap,
        //         'jenis_kelamin' => $faker->jenis_kelamin,
        //         'tanggal_lahir' => $faker->tanggal_lahir,
        //         'no_telepon' => $faker->no_telepon,
        //         'email' => $faker->email,
        //         'alamat' => $faker->alamat,
        //     ]);
        // }
    }
}
