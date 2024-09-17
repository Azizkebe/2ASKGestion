<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionModel extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'permission_models';

    static function getRecord()
    {
        $getPermission = PermissionModel::groupBy('groupby')->get();
        $result = [];
        foreach($getPermission as $value)
        {
            $getPermissionGroup = PermissionModel::where('groupby',$value->groupby)->get();
            $data = [];
            $data['id'] = $value->id;
            $data['name'] = $value->name;
            $group = [];
            foreach($getPermissionGroup as $valueG)
            {
                $dataG = [];
                $dataG['id'] = $valueG->id;
                $dataG['name'] = $valueG->name;
                $group[] = $dataG;
            }
            $data['group'] = $group;
            $result[] = $data;
        }
        return $result;

    }
}
