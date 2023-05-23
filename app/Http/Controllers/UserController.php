<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
        return view('admin.users.index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.form',['user'=>new User()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
       $data = $request->validated();
       $data['password'] = Hash::make($data['password']);
       $user =  User::create($data);

        return to_route('admin.user.index')->with('success','Utilisateur du nom '.$user->name.' est ajouté');
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
    public function edit(User $user)
    {
        return view('admin.users.form',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $data = $request->validated();

        if($data['password'] != null){

            $data['password'] = Hash::make($data['password']);
            User::where('id',(int)$id)->update($data);
        }else{
            
            User::where('id',(int)$id)->update(Arr::except($data,'password'));
        }

      
        return to_route('admin.user.index')->with('success','Utilisateur modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return to_route('admin.user.index')->with('success','Utilisateur supprimé');
    }
}
