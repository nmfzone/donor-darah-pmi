<?php

use Illuminate\Database\Seeder;
use DonorDarahPMI\Anggota;
use DonorDarahPMI\User;

class UserTableSeeder extends Seeder
{

    private $anggota;

    private $user;

    public function __construct(Anggota $anggota, User $user)
    {
        $this->anggota = $anggota;
        $this->user    = $user;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $anggota = $this->anggota->newInstance([
                'name'        => 'Nabil Muhammad Firdaus',
                'age'         => 19,
                'job'         => 'Programmer',
                'city'        => 'Kulonprogo',
                'province'    => 'Yogyakarta',
                'address'     => 'Kedundang Temon',
                'mobilePhone' => '081328733696'
        ]);

        $user = $this->user->newInstance([
                'password' => Hash::make('NMFZONE'),
                'email'    => 'nabilftd@gmail.com',
                'role'     => DonorDarahPMI\Role::ANGGOTA
        ]);

        $user->save();

        $anggota->user_id = $user->id;
        $anggota->save();

        $this->command->info('Users Has been Seeded');
    }
}
