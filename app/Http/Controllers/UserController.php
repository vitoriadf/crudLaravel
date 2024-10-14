<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); 
        return view('users', ['users' => $users]);
    }

    public function create()
    {
        return view('user_create');
    }

    public function store(Request $request)
{
    $created = User::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => password_hash($request->input('password'), PASSWORD_DEFAULT),
    ]);

    if ($created) {
        return redirect()->back()->with('message', 'Successfully created');
    } else {
        return redirect()->back()->with('message', 'Error created');
    }
}


    public function show(string $id)
    {
        //
    }

    public function edit(User $user)
    {
        return view('user_edit',['user' => $user]);
    }

    public function update(Request $request, string $id)
    {
        //dados é um array que tem os dados pra atualizar no bd 
        $dados = $request->except(['_token', '_method']);
    
        $update = User::where('id', $id)->update($dados);
    
        if ($update) {
            return redirect()->back()->with('message', 'Successfully updated');
        } else {
            return redirect()->back()->with('message', 'Error updating user');
        }
    }
    

    public function destroy(string $id)
    {
        //
    }
}
