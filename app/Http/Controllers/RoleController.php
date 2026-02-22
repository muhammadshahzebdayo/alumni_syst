<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // GET
    public function index()
    {
        $users = User::all();
        $roles = Role::all();

        return view('alumni-admin.role-assign', compact('users', 'roles'));
    }

    // POST
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'role_id' => 'required|exists:user_roles,id',
        ]);

        $user = User::findOrFail($request->user_id);
        $user->role_id = $request->role_id;
        $user->save();

        return back()->with('success', 'Role assigned successfully');
    }

private function assignRole($id, $roleId, $roleName)
{
    $user = User::findOrFail($id);
    $user->role_id = $roleId;
    $user->save();

    return redirect()->back()->with(
        'success',
        $user->name . ' is now ' . $roleName . '!'
    );
}



    public function makeAdmin($id)
{
    $user = \App\Models\User::findOrFail($id);

    // Admin role assign karna (role_id = 1)
    $user->role_id = 1;
    $user->save();

    return redirect()->back()->with('success', $user->name . ' is now Admin!');
}
  public function makeStudent($id)
    {
        return $this->assignRole($id, 2, 'Student');
    }

    // Make Alumni
    public function makeAlumni($id)
    {
        return $this->assignRole($id, 3, 'Alumni');
    }

    // Make Faculty
    public function makeFaculty($id)
    {
        return $this->assignRole($id, 4, 'Faculty');
    }

}