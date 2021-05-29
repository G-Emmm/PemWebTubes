<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
  
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'pegawai-list',
           'pegawai-create',
           'pegawai-edit',
           'pegawai-delete',
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',
           'ref_unit-list',
           'ref_unit-create',
           'ref_unit-edit',
           'ref_unit-delete',
           'ref_jabatan-list',
           'ref_jabatan-create',
           'ref_jabatan-edit',
           'ref_jabatan-delete',
           'uraian_pekerjaan-list',
           'uraian_pekerjaan-create',
           'uraian_pekerjaan-edit',
           'uraian_pekerjaan-delete'
        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}