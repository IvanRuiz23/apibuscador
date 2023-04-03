<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $txt = $request->get('email');
        $user = User::ofSearch($txt)
            ->get();
        return $user;
    }

    public function getUser()
    {
        $user = User::all('id','name','email');
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

    public function update(Request $request, $id)
    {
        $name = $request->get('name');
        $email = $request->get('email');

        $user = User::find($id);

        $user->name = $name;
        $user->email = $email;
        $user->update();
        return $user;
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            return response()->json('No se complet贸 la operaci贸n', 404);
        }
        $user->delete();
        return response()->noContent();
    }
}