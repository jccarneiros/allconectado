<?php

namespace Database\Seeders;

use App\Models\Dashboard\AccessControl\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Permissão de configurations ////////////////////////////////////////////////////////////
        Permission::create([
            'name' => 'Listar Configurações',
            'slug' => 'configurations.index',
        ]);
        Permission::create([
            'name' => 'Criar Configurações',
            'slug' => 'configurations.create',
        ]);
        Permission::create([
            'name' => 'Perfil Configurações',
            'slug' => 'configurations.show',
        ]);
        Permission::create([
            'name' => 'Editar Configurações',
            'slug' => 'configurations.edit',
        ]);
        Permission::create([
            'name' => 'Excluir Configurações',
            'slug' => 'configurations.delete',
        ]);
        // Permissão de configurations ////////////////////////////////////////////////////////////

        // Permissão de superusers ////////////////////////////////////////////////////////////
        //        Permission::create([
        //            'name' => 'Listar Super Usuário',
        //            'slug' => 'superusers.index',
        //        ]);
        //        Permission::create([
        //            'name' => 'Criar Super Usuário',
        //            'slug' => 'superusers.create',
        //        ]);
        //        Permission::create([
        //            'name' => 'Perfil Super Usuário',
        //            'slug' => 'superusers.show',
        //        ]);
        //        Permission::create([
        //            'name' => 'Editar Super Usuário',
        //            'slug' => 'superusers.edit',
        //        ]);
        //        Permission::create([
        //            'name' => 'Excluir Super Usuário',
        //            'slug' => 'superusers.delete',
        //        ]);
        // Permissão de superusers ////////////////////////////////////////////////////////////

        // Permissão de users ////////////////////////////////////////////////////////////
        Permission::create([
            'name' => 'Listar Usuário',
            'slug' => 'users.index',
        ]);
        Permission::create([
            'name' => 'Criar Usuário',
            'slug' => 'users.create',
        ]);
        Permission::create([
            'name' => 'Perfil Usuário',
            'slug' => 'users.show',
        ]);
        Permission::create([
            'name' => 'Editar Usuário',
            'slug' => 'users.edit',
        ]);
        Permission::create([
            'name' => 'Inativar Usuário',
            'slug' => 'users.delete',
        ]);
        Permission::create([
            'name' => 'Listar U. Inativados',
            'slug' => 'users.onlyTrashed',
        ]);
        Permission::create([
            'name' => 'Ativar U. Inativos',
            'slug' => 'users.restore',
        ]);
        Permission::create([
            'name' => 'Excluir U. Inativos',
            'slug' => 'users.forceDelete',
        ]);
        // Permissão de users ////////////////////////////////////////////////////////////

        // Permissão de roles ////////////////////////////////////////////////////////////

        Permission::create([
            'name' => 'Listar Grupos',
            'slug' => 'roles.index',
        ]);
        Permission::create([
            'name' => 'Criar Grupos',
            'slug' => 'roles.create',
        ]);
        Permission::create([
            'name' => 'Perfil Grupos',
            'slug' => 'roles.show',
        ]);
        Permission::create([
            'name' => 'Editar Grupos',
            'slug' => 'roles.edit',
        ]);
        Permission::create([
            'name' => 'Excluir Grupo',
            'slug' => 'roles.delete',
        ]);
        // Permissão de roles ////////////////////////////////////////////////////////////

        // Permissão de permissions ////////////////////////////////////////////////////////////

        //        Permission::create([
        //            'name' => 'Listar Permissões',
        //            'slug' => 'permissions.index',
        //        ]);
        //        Permission::create([
        //            'name' => 'Criar Permissões',
        //            'slug' => 'permissions.create',
        //        ]);
        //        Permission::create([
        //            'name' => 'Perfil Permissões',
        //            'slug' => 'permissions.show',
        //        ]);
        //        Permission::create([
        //            'name' => 'Editar Permissões',
        //            'slug' => 'permissions.edit',
        //        ]);
        //        Permission::create([
        //            'name' => 'Excluir Permissões',
        //            'slug' => 'permissions.delete',
        //        ]);
        // Permissão de permissions ////////////////////////////////////////////////////////////
    }
}
