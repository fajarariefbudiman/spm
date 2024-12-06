<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        try {
            $isSeeded = DB::transaction(function () {
                $isAdmin = Role::create(["name" => "admin"]);

                $admin = User::create([
                    'username' => 'admin',
                    'fullname' => 'admin1',
                    'email' => 'admin@example.com',
                    'password' => '123123123',
                    'nik' => '1234678',
                    'no_hp' => '0834567899',
                    'level' => 'admin'
                ]);

                $admin->assignRole($isAdmin);

                return $admin ? true : false;
            });
            if ($isSeeded) {
                DB::commit();
            } else {
                DB::rollback();
            }
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
        }
    }
}
