<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return response()->json($users);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validasi input dari request
        $request->validate([
            'name' => 'nullable|string',
            'username' => 'nullable|string',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string',
            'kelamin' => 'nullable|string',
            'email' => 'nullable|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6',
        ]);

        // Update data pengguna
        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->alamat = $request->input('alamat');
        $user->no_hp = $request->input('no_hp');
        $user->kelamin = $request->input('kelamin');
        $user->email = $request->input('email');

        if ($request->has('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        return response()->json(['message' => 'Data pengguna berhasil diperbarui']);
    }
}
