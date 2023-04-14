<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::query();

        // If a search query is present, filter the results
        if ($request->input('search')) {
            $searchQuery = $request->input('search');
            $users->where(function ($query) use ($searchQuery) {
                $query->where('id', 'LIKE', "%{$searchQuery}%")
                    ->orWhere('name', 'LIKE', "%{$searchQuery}%")
                    ->orWhere('email', 'LIKE', "%{$searchQuery}%");
            });
        }

        // If the logged in user is not an admin, exclude users with the admin role
        if (auth()->user()->cannot('admin_access')) {
            $users->whereDoesntHave('roles', function ($query) {
                $query->where('id', '1');
            });
        }

        $users = $users->with('roles')->paginate(5);

        return view('users.index', compact('users'));
    }
   

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::query();

        // If the logged in user is not an admin, exclude the admin role
        if (auth()->user()->cannot('admin_access')) {
            $roles->where('title', '<>', 'admin');
        }

        $roles = $roles->pluck('title', 'id');

        return view('users.create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('users.index')->with('success','User created successfully.');
            
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    
        $roles = Role::query();
    
        // If the logged in user is not an admin, exclude the admin role
        if (auth()->user()->cannot('admin_access')) {
            $roles->where('title', '<>', 'admin');
        }
    
        $roles = $roles->pluck('title', 'id');
        $user->load('roles');
    
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user ->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return redirect()->route('users.index')->with('destroyed','User deleted successfully.');
    }
    
}
