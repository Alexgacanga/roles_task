<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Role;
use App\Models\User;
use App\Notifications\UserAdded;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $query = User::query();    
    if(request()->has('search')){
        $query = $query->where('name','LIKE','%' . request('search','') . '%')
        ->orWhere('email', 'LIKE', '%' . request('search', '') . '%');
    }
    $query = $query->paginate(5);
        return view('users.index', [
            'users'=>$query
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('users.create', [
            'roles' => $roles
        ]);
    }

    public function profile(User $user,string $id, Article $articles, Role $roles){
        $user = User::findOrFail($id);
        return view('users.userProfile',[
            'user' => $user,
            'roles' => $user->roles,
            'articles' => $user->articles
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::create($request->all());
        $user->roles()->attach($request->input('roles'));
        $user->notify(new UserAdded($user));

        return redirect()->route('users.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('users.edit', [
            'user' => $user,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        $user->roles()->sync($request->input('roles'));
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index');
    }
}
