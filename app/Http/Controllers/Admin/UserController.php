<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'dni' => ['required', 'string', 'max:8', 'unique:users'],
            'phone' => ['nullable', 'string', 'max:9', 'unique:users'],
            'address' => ['nullable', 'string', 'max:255'],
            'role_id' => ['required', 'exists:roles,id'],
        ]);


        $user = User::create($data);
        $user->roles()->attach($data['role_id']);


        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Usuario registrado exitosamente!',
            'text' => 'El usuario fue registrado exitosamente.',
        ]);

        if($user::role('Paciente')){
            $patient = $user->patient()->create([]);
            return redirect()->route('admin.patients.edit', $patient);
        }

        return redirect()->route('admin.users.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'dni' => ['required', 'string', 'max:8', 'unique:users,dni,'.$user->id],
            'phone' => ['nullable', 'string', 'max:9', 'unique:users,phone,'.$user->id],
            'address' => ['nullable', 'string', 'max:255'],
            'role_id' => ['required', 'exists:roles,id'],
        ]);

        $user->update($data);
        $user->roles()->sync($data['role_id']);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Usuario actualizado exitosamente!',
            'text' => 'El usuario fue actualizado exitosamente.',
        ]);

        return redirect()->route('admin.users.edit', $user->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->roles()->detach();
        $user->delete();
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Usuario eliminado exitosamente!',
            'text' => 'El usuario fue eliminado exitosamente.',
        ]);
        return redirect()->route('admin.users.index');
    }
}
