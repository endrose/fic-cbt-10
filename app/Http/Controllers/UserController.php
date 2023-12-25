<?php

namespace App\Http\Controllers;

// use App\Models\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    //
    public function index(Request $request)
    {
        //
        // $users = User::paginate(10);
        $users = DB::table('users')->when($request->input('name'), function ($query, $name) {
            return $query->where('name', 'like', '%' . $name . '%');
        })->paginate(10);
        // dd($users);

        return view('pages.users.index', compact('users'));
    }


    public function create()
    {
        return view('pages.users.create');
    }

    public function store(StoreUserRequest $storeUserRequest)
    {
        $data = $storeUserRequest->all();
        $data['password'] = Hash::make($storeUserRequest->password);
        User::create($data);
        return redirect()->route('users.index')->with('success', 'User successfully created');
    }

    public function edit($id)
    {

        $user = User::findOrFail($id);

        return view('pages.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $pdateUserRequest, User $user)
    {
        $data = $pdateUserRequest->validated();
        $user->update($data);
        return redirect()->route('users.index')->with('success', 'User successfully updated');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User successfully deleted');
    }
}
