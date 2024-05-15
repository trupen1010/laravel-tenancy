<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Tenant\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('tenant.user.index', compact('users'));
    }

    public function create()
    {
        return view('tenant.user.create');
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('tenant.user.index');
    }
    
    public function edit($id)
    {
        $user = User::find($id);
        return view('tenant.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('tenant.user.index');
    }
    
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('tenant.user.index');
    }
}
