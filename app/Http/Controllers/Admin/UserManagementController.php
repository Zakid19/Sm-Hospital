<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Doctor;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rules;

class UserManagementController extends Controller
{
    public function list()
    {
        $users = User::all();

        // return UserResource::collection($users);
        return view('admin.users.list', compact('users'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . optional($user)->id],
        ]);

        $user->update([
            'name' => request('name'),
            'email' => request('email'),
            'role_id' => request('role_id')
        ]);

        return redirect('admin/user');

        return Response::json(['success' => 'true', 'message' => 'Updated User Successfully!', 'updated_data' => $user], 200);

    }

    public function destroy(User $user)
    {
        // Menghapus Doctor
        $user->doctors()->delete();

        // Menghapus Pasien
        $user->appointment()->delete();

        $user->delete();

        return back();

        return Response::json(['success' => 'true', 'message' => 'Deleted User Successfully!', 'deleted_data' => $user], 200);
    }
}
