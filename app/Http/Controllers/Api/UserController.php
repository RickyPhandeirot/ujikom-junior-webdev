<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User::orderBy('name', 'asc')->get();
        return response()->json([
            'message'   => 'Berhasil menampilkan data user',
            'data'      => $users
        ], 200);
    }


    public function store(Request $request)
    {

        $validated = $request->validate([
            'name'      => [
                'required',
                'string',
                'min:3',
                'max:255'
            ],
            'email'     => [
                'required',
                'email',
                'unique:users,email'
            ],
            'password'  => [
                'required',
                'min:8'
            ],
            'phone_number'  => [
                'nullable',
            ],
            'alamat'  => [
                'nullable',
            ],
        ]);

        $user = User::create($validated);

        return response()->json([
            'message'   => 'Berhasil menambahkan user baru',
            'data'      => $user
        ], 201);
    }

    public function show(string $id)
    {
        $user = User::find($id);
        return response()->json([
            'message'   => 'Berhasil menampilkan detail user',
            'data'      => $user
        ], 200);
    }



    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name'      => [
                'required',
                'string',
                'min:3',
                'max:255'
            ],
            'email'     => [
                'required',
                'email',
                'unique:users,email,' . $id
            ],
            'password'  => [
                'nullable',
                'min:8'
            ],
            'phone_number'  => [
                'nullable',
            ],
            'alamat'  => [
                'nullable',
            ],
        ]);

        if ($request->filled('password')) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user = User::find($id);
        $user->update($validated);

        return response()->json([
            'message'   => 'Berhasil mengupdate data user',
            'data'      => $user
        ], 200);
    }

    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();

        return response()->json([
            'message'   => 'Berhasil menghapus data user',
            'data'      => $user
        ], 200);
    }
}
