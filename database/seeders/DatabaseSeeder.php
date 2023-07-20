<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $steven = User::create([
            'name' => 'admin',
            'email' => 'vandenbroeck.steven@gmail.com',
            'password' => Hash::make('Rsc@nderlecht84')
        ]);

        $testUser = User::create([
            'name' => 'Steven',
            'email' => 'vandenbroeck.steven@outlook.com',
            'password' => Hash::make('Rsc@nderlecht84')
        ]);

        $ruben = User::create([
            'name' => 'Rubenz',
            'email' => 'rubenvx@hotmail.com',
            'password' => Hash::make('Rubenz')
        ]);
        $jojo = User::create([
            'name' => 'Jo',
            'email' => 'jovext@gmail.com',
            'password' => Hash::make('Rubenz')
        ]);
       /* $bouncer = app(Bouncer::class);
        $admin = $bouncer->role()->firstOrCreate([
            'name' => 'admin',
            'title' => 'administrator',
        ]);*/

        $role = new Role();
        $role->name = 'admin';
        $role->save();

        //$bouncer->assign('admin')->to($steven);
        $steven->assignRole('admin');
        $ruben->assignRole('admin');
        $jojo->assignRole('admin');

    }
}
