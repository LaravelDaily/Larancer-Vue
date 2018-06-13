<?php

use Illuminate\Database\Seeder;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'title' => 'user_management_access',],
            ['id' => 2, 'title' => 'permission_access',],
            ['id' => 3, 'title' => 'permission_create',],
            ['id' => 4, 'title' => 'permission_edit',],
            ['id' => 5, 'title' => 'permission_view',],
            ['id' => 6, 'title' => 'permission_delete',],
            ['id' => 7, 'title' => 'role_access',],
            ['id' => 8, 'title' => 'role_create',],
            ['id' => 9, 'title' => 'role_edit',],
            ['id' => 10, 'title' => 'role_view',],
            ['id' => 11, 'title' => 'role_delete',],
            ['id' => 12, 'title' => 'user_access',],
            ['id' => 13, 'title' => 'user_create',],
            ['id' => 14, 'title' => 'user_edit',],
            ['id' => 15, 'title' => 'user_view',],
            ['id' => 16, 'title' => 'user_delete',],
            ['id' => 17, 'title' => 'setting_access',],
            ['id' => 18, 'title' => 'currency_access',],
            ['id' => 19, 'title' => 'currency_create',],
            ['id' => 20, 'title' => 'currency_edit',],
            ['id' => 21, 'title' => 'currency_view',],
            ['id' => 22, 'title' => 'currency_delete',],
            ['id' => 23, 'title' => 'transaction_type_access',],
            ['id' => 24, 'title' => 'transaction_type_create',],
            ['id' => 25, 'title' => 'transaction_type_edit',],
            ['id' => 26, 'title' => 'transaction_type_view',],
            ['id' => 27, 'title' => 'transaction_type_delete',],
            ['id' => 28, 'title' => 'income_source_access',],
            ['id' => 29, 'title' => 'income_source_create',],
            ['id' => 30, 'title' => 'income_source_edit',],
            ['id' => 31, 'title' => 'income_source_view',],
            ['id' => 32, 'title' => 'income_source_delete',],
            ['id' => 33, 'title' => 'client_status_access',],
            ['id' => 34, 'title' => 'client_status_create',],
            ['id' => 35, 'title' => 'client_status_edit',],
            ['id' => 36, 'title' => 'client_status_view',],
            ['id' => 37, 'title' => 'client_status_delete',],
            ['id' => 38, 'title' => 'project_status_access',],
            ['id' => 39, 'title' => 'project_status_create',],
            ['id' => 40, 'title' => 'project_status_edit',],
            ['id' => 41, 'title' => 'project_status_view',],
            ['id' => 42, 'title' => 'project_status_delete',],
            ['id' => 43, 'title' => 'client_access',],
            ['id' => 44, 'title' => 'client_create',],
            ['id' => 45, 'title' => 'client_edit',],
            ['id' => 46, 'title' => 'client_view',],
            ['id' => 47, 'title' => 'client_delete',],
            ['id' => 48, 'title' => 'project_access',],
            ['id' => 49, 'title' => 'project_create',],
            ['id' => 50, 'title' => 'project_edit',],
            ['id' => 51, 'title' => 'project_view',],
            ['id' => 52, 'title' => 'project_delete',],
            ['id' => 53, 'title' => 'note_access',],
            ['id' => 54, 'title' => 'note_create',],
            ['id' => 55, 'title' => 'note_edit',],
            ['id' => 56, 'title' => 'note_view',],
            ['id' => 57, 'title' => 'note_delete',],
            ['id' => 58, 'title' => 'document_access',],
            ['id' => 59, 'title' => 'document_create',],
            ['id' => 60, 'title' => 'document_edit',],
            ['id' => 61, 'title' => 'document_view',],
            ['id' => 62, 'title' => 'document_delete',],
            ['id' => 63, 'title' => 'transaction_access',],
            ['id' => 64, 'title' => 'transaction_create',],
            ['id' => 65, 'title' => 'transaction_edit',],
            ['id' => 66, 'title' => 'transaction_view',],
            ['id' => 67, 'title' => 'transaction_delete',],

        ];

        foreach ($items as $item) {
            \App\Permission::create($item);
        }
    }
}
