<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(){
        $permissions = Permission::all();
        return view('admin.permissions.index',compact('permissions'));
    }

    public function store(Request $request){
        logger($request->all());
        $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name',
        ]);

        $permission = new Permission();
        $permission->name = $request->name;
        $permission->save();

        return response()->json([
            'data' => $permission,
            'status' => true,
            'message' => 'Permission was created successfully'
        ]);
    }

    public function update(Request $request){
        $validatedData = $request->validate([
            'permission_id' => 'required|exists:permissions,id',
            'name' => 'required|string|max:255',
        ]);

        // Update the permission
        $permission = Permission::where('id', $request->permission_id)->update([
            'name' => $request->name,
        ]);

        // Fetch the updated permission
        $updatedPermission = Permission::find($request->permission_id);

        // Log the updated permission
        logger($updatedPermission);

        return response()->json([
            'status' => true,
            'message' => 'Permission updated successfully',
            'data' => $updatedPermission
        ]);

    }

    public function destroy($permission_id){

        $permission = Permission::where('id', $permission_id)->first();

        $permission->delete();

        return response()->json([
            'status' => true,
        ]);
    }
}
