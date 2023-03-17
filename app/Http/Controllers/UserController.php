<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $txt = $request->get('name');
        $user = User::ofSearch($txt)
            ->get();
        return $user;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return $user;
    }

  
    public function show($id)
    {
        
    }

    public function update(Request $request, User $user, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;

        $user->update();
        return $user;
    }

    public function destroy($name)
    {
        $user = User::find($name);
        if (is_null($user)) {
            return response()->json('No se completó la operación', 404);
        }
        $user->delete();
        return response()->noContent();
    }
}
