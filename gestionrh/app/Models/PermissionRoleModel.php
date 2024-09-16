<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionRoleModel extends Model
{
    use HasFactory;
    protected $table = 'permission_role_models';

    static public function InsertUpdatedRecord($permission_ids, $role_id)
    {
        PermissionRoleModel::where('role_id', $role_id)->delete();

        foreach($permission_ids as $permission_id)
        {
            $save = new PermissionRoleModel;
            $save->permission_id = $permission_id;
            $save->role_id = $role_id;

            $save->save();
        }
    }
}
