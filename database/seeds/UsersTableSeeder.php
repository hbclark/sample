<?php

use Illuminate\Database\Seeder;
use App\Models\User;

/*  Modify databases/factories/Factory.php firstly */

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=factory(User::class)->times(50)->make();
        User::insert($users->makeVisible(['password','remember_token'])->toArray());

        $user= User::findOrFail(1);
        $user->name='clark';
        $user->email='arcaneade@gmail.com';
        $user->password=bcrypt('password');
        $user->is_admin=true;
        $user->save();
    }
}
