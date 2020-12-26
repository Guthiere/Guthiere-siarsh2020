<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Role;
Use App\Models\Permiso;

class PermisosInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //User DATA Admin
        $useradmin = User::where('email','admin@admin.com')->first();
        $roleregistered = Role::where('slug','registered.user')->first();

        if($useradmin){
            $useradmin->delete();
        }
            $roleadmin = Role::Create([
                'name'=>'Admin',
                'slug'=>'admin',
                'description'=>'Administrator',
                'full_access'=>'yes',

            ]);

     /*        $useradmin = User::create([
                'role_id'=>$roleadmin->id,
                'name' =>'Admin',
                'email' => 'Admin@admin.com',
                'password' => Hash::make('admin123'),
                'current_team_id'=> $useradmin->id,
            ]); */

                //Permiso
        $permiso_all = [];

        //Permiso Role
            $Permiso = Permiso::Create([
                'name'=>'List Role',
                'slug'=>'role.index',
                'description'=>'A user can list role',
            ]);

            $permiso_all[] = $Permiso->id;


            $Permiso = Permiso::Create([
                'name'=>'Show Role',
                'slug'=>'role.show',
                'description'=>'A user can see role',
            ]);

            $permiso_all[] = $Permiso->id;


            $Permiso = Permiso::Create([
                'name'=>'Create Role',
                'slug'=>'role.create',
                'description'=>'A user can create role',
            ]);

            $permiso_all[] = $Permiso->id;


            $Permiso = Permiso::Create([
                'name'=>'Edit Role',
                'slug'=>'role.edit',
                'description'=>'A user can edit role',
            ]);

            $permiso_all[] = $Permiso->id;


            $Permiso = Permiso::Create([
                'name'=>'Destroy Role',
                'slug'=>'role.destroy',
                'description'=>'A user can destroy role',
            ]);

            $permiso_all[] = $Permiso->id;



            //Table Permiso User


            $Permiso = Permiso::Create([
                'name'=>'List User',
                'slug'=>'user.index',
                'description'=>'A user can list user',
                ]);

            $permiso_all[] = $Permiso->id;

            $Permiso = Permiso::Create([
                'name'=>'Show User',
                'slug'=>'user.show',
                'description'=>'A user can see user',
                ]);

                $permiso_all[] = $Permiso->id;

                /*
                $Permiso = Permiso::Create([
                    'name'=>'Create User',
                    'slug'=>'user.create',
                    'description'=>'A user can create user',
                    ]);

                    $permiso_all[] = $Permiso->id;

                    */

            $Permiso = Permiso::Create([
                'name'=>'Edit User',
                'slug'=>'user.edit',
                'description'=>'A user can edit user',
                ]);

            $permiso_all[] = $Permiso->id;


            $Permiso = Permiso::Create([
                'name'=>'Destroy User',
                'slug'=>'user.destroy',
                'description'=>'A user can destroy user',
                ]);

            $permiso_all[] = $Permiso->id;


            $Permiso = Permiso::Create([
                'name'=>'Edit Own User',
                'slug'=>'userown.edit',
                'description'=>'A user can edit own user',
                ]);

            $permiso_all[] = $Permiso->id;

            $Permiso = Permiso::Create([
                    'name'=>'Show Own User',
                    'slug'=>'userown.show',
                    'description'=>'A user can see own user',
                    ]);

            //rol Registered User

            if (!$roleregistered) {

                Role::Create([
                    'name'=>'Registered User',
                    'slug'=>'registered.user',
                    'description'=>'registered user pending role assignment',
                    'full-access'=>'no'
                ]);

                $roleregistered = Role::where('slug','registered.user')->first();
                $roleregistered->permisos()->sync([6,10,11]);
            }




    }
}
