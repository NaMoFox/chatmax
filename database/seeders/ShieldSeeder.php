<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use BezhanSalleh\FilamentShield\Support\Utils;
use Spatie\Permission\PermissionRegistrar;

class ShieldSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $rolesWithPermissions = '[{"name":"panel_user","guard_name":"web","permissions":["view_apikey","view_any_apikey","create_apikey","update_apikey","restore_apikey","restore_any_apikey","replicate_apikey","reorder_apikey","delete_apikey","delete_any_apikey","force_delete_apikey","force_delete_any_apikey","view_chatbot","view_any_chatbot","create_chatbot","update_chatbot","restore_chatbot","restore_any_chatbot","replicate_chatbot","reorder_chatbot","delete_chatbot","delete_any_chatbot","force_delete_chatbot","force_delete_any_chatbot","view_chatia","view_any_chatia","create_chatia","update_chatia","restore_chatia","restore_any_chatia","replicate_chatia","reorder_chatia","delete_chatia","delete_any_chatia","force_delete_chatia","force_delete_any_chatia","view_flow","view_any_flow","create_flow","update_flow","restore_flow","restore_any_flow","replicate_flow","reorder_flow","delete_flow","delete_any_flow","force_delete_flow","force_delete_any_flow","view_prompt","view_any_prompt","create_prompt","update_prompt","restore_prompt","restore_any_prompt","replicate_prompt","reorder_prompt","delete_prompt","delete_any_prompt","force_delete_prompt","force_delete_any_prompt","view_user","view_any_user","create_user","update_user","restore_user","restore_any_user","replicate_user","reorder_user","delete_user","delete_any_user","force_delete_user","force_delete_any_user","view_welcome","view_any_welcome","create_welcome","update_welcome","restore_welcome","restore_any_welcome","replicate_welcome","reorder_welcome","delete_welcome","delete_any_welcome","force_delete_welcome","force_delete_any_welcome"]},{"name":"super_admin","guard_name":"web","permissions":["view_apikey","view_any_apikey","create_apikey","update_apikey","restore_apikey","restore_any_apikey","replicate_apikey","reorder_apikey","delete_apikey","delete_any_apikey","force_delete_apikey","force_delete_any_apikey","view_category","view_any_category","create_category","update_category","restore_category","restore_any_category","replicate_category","reorder_category","delete_category","delete_any_category","force_delete_category","force_delete_any_category","view_chatbot","view_any_chatbot","create_chatbot","update_chatbot","restore_chatbot","restore_any_chatbot","replicate_chatbot","reorder_chatbot","delete_chatbot","delete_any_chatbot","force_delete_chatbot","force_delete_any_chatbot","view_chatia","view_any_chatia","create_chatia","update_chatia","restore_chatia","restore_any_chatia","replicate_chatia","reorder_chatia","delete_chatia","delete_any_chatia","force_delete_chatia","force_delete_any_chatia","view_closesession","view_any_closesession","create_closesession","update_closesession","restore_closesession","restore_any_closesession","replicate_closesession","reorder_closesession","delete_closesession","delete_any_closesession","force_delete_closesession","force_delete_any_closesession","view_flow","view_any_flow","create_flow","update_flow","restore_flow","restore_any_flow","replicate_flow","reorder_flow","delete_flow","delete_any_flow","force_delete_flow","force_delete_any_flow","view_product","view_any_product","create_product","update_product","restore_product","restore_any_product","replicate_product","reorder_product","delete_product","delete_any_product","force_delete_product","force_delete_any_product","view_prompt","view_any_prompt","create_prompt","update_prompt","restore_prompt","restore_any_prompt","replicate_prompt","reorder_prompt","delete_prompt","delete_any_prompt","force_delete_prompt","force_delete_any_prompt","view_role","view_any_role","create_role","update_role","delete_role","delete_any_role","view_user","view_any_user","create_user","update_user","restore_user","restore_any_user","replicate_user","reorder_user","delete_user","delete_any_user","force_delete_user","force_delete_any_user","view_welcome","view_any_welcome","create_welcome","update_welcome","restore_welcome","restore_any_welcome","replicate_welcome","reorder_welcome","delete_welcome","delete_any_welcome","force_delete_welcome","force_delete_any_welcome"]},{"name":"panel_admin","guard_name":"web","permissions":["view_apikey","view_any_apikey","create_apikey","update_apikey","restore_apikey","restore_any_apikey","replicate_apikey","reorder_apikey","delete_apikey","delete_any_apikey","force_delete_apikey","force_delete_any_apikey","view_chatbot","view_any_chatbot","create_chatbot","update_chatbot","restore_chatbot","restore_any_chatbot","replicate_chatbot","reorder_chatbot","delete_chatbot","delete_any_chatbot","force_delete_chatbot","force_delete_any_chatbot","view_chatia","view_any_chatia","create_chatia","update_chatia","restore_chatia","restore_any_chatia","replicate_chatia","reorder_chatia","delete_chatia","delete_any_chatia","force_delete_chatia","force_delete_any_chatia","view_flow","view_any_flow","create_flow","update_flow","restore_flow","restore_any_flow","replicate_flow","reorder_flow","delete_flow","delete_any_flow","force_delete_flow","force_delete_any_flow","view_prompt","view_any_prompt","create_prompt","update_prompt","restore_prompt","restore_any_prompt","replicate_prompt","reorder_prompt","delete_prompt","delete_any_prompt","force_delete_prompt","force_delete_any_prompt","view_user","view_any_user","create_user","update_user","restore_user","restore_any_user","replicate_user","reorder_user","delete_user","delete_any_user","force_delete_user","force_delete_any_user","view_welcome","view_any_welcome","create_welcome","update_welcome","restore_welcome","restore_any_welcome","replicate_welcome","reorder_welcome","delete_welcome","delete_any_welcome","force_delete_welcome","force_delete_any_welcome","view_generateqr","view_any_generateqr","create_generateqr","update_generateqr","restore_generateqr","restore_any_generateqr","replicate_generateqr","reorder_generateqr","delete_generateqr","delete_any_generateqr","force_delete_generateqr","force_delete_any_generateqr"]}]';
        $directPermissions = '[]';

        static::makeRolesWithPermissions($rolesWithPermissions);
        static::makeDirectPermissions($directPermissions);

        $this->command->info('Shield Seeding Completed.');
    }

    protected static function makeRolesWithPermissions(string $rolesWithPermissions): void
    {
        if (! blank($rolePlusPermissions = json_decode($rolesWithPermissions, true))) {
            /** @var Model $roleModel */
            $roleModel = Utils::getRoleModel();
            /** @var Model $permissionModel */
            $permissionModel = Utils::getPermissionModel();

            foreach ($rolePlusPermissions as $rolePlusPermission) {
                $role = $roleModel::firstOrCreate([
                    'name' => $rolePlusPermission['name'],
                    'guard_name' => $rolePlusPermission['guard_name'],
                ]);

                if (! blank($rolePlusPermission['permissions'])) {
                    $permissionModels = collect($rolePlusPermission['permissions'])
                        ->map(fn ($permission) => $permissionModel::firstOrCreate([
                            'name' => $permission,
                            'guard_name' => $rolePlusPermission['guard_name'],
                        ]))
                        ->all();

                    $role->syncPermissions($permissionModels);
                }
            }
        }
    }

    public static function makeDirectPermissions(string $directPermissions): void
    {
        if (! blank($permissions = json_decode($directPermissions, true))) {
            /** @var Model $permissionModel */
            $permissionModel = Utils::getPermissionModel();

            foreach ($permissions as $permission) {
                if ($permissionModel::whereName($permission)->doesntExist()) {
                    $permissionModel::create([
                        'name' => $permission['name'],
                        'guard_name' => $permission['guard_name'],
                    ]);
                }
            }
        }
    }
}
