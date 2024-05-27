<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::whereNotIn('name',['admin'])->get();
        $permissions = Permission::all();
        return view('admin.roles.index',compact('roles','permissions'));
    }

    public function store(Request $request){
        logger($request->all());
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
        ]);

        $role = new Role;
        $role->name = $request->name;
        $role->save();

        return response()->json([
            'data' => $role,
            'status' => true,
            'message' => 'Role was created successfully'
        ]);
    }

    public function rolePermissions(Request $request)
    {
        if ($request->isMethod('post')) {

            logger($request->all());
            // $validatedData = $request->validate([
            //     'role_id' => 'required|exists:roles,id',
            //     'permissions' => 'required|array',
            //     'permissions.*' => 'exists:permissions,id',
            // ]);

            // $role = Role::find($validatedData['role_id']);
            // $role->permissions()->sync($validatedData['permissions']);

            // return redirect()->route('role.permissions')->with('success', 'Permissions assigned successfully.');
        }else{

            $permissions = Permission::all();
        return view('admin.roles.role_permission', compact('permissions'));
        }
    }

    public function update(Request $request){
        $validatedData = $request->validate([
            'role_id' => 'required|exists:roles,id',
            'name' => 'required|string|max:255',
        ]);

        // Update the role
        $role = Role::where('id', $request->role_id)->update([
            'name' => $request->name,
        ]);

        // Fetch the updated role
        $updatedRole = Role::find($request->role_id);

        // Log the updated role
        logger($updatedRole);

        return response()->json([
            'status' => true,
            'message' => 'Role updated successfully',
            'data' => $updatedRole
        ]);

    }

    public function destroy($role_id){

        $role = Role::where('id', $role_id)->first();

        $role->delete();

        return response()->json([
            'status' => true,
        ]);
    }

}
