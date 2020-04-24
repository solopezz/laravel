<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUser;
use App\Models\User;
use App\Repo\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{

    public function __construct(Users $users)
    {
        //Agregamos mas roles para el middleware
        $this->middleware('auth');
        $this->middleware('type:admin,estudiante,jefe',['except'=>['edit','update']]);
        $this->users = $users;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->users->index();

        return view('users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('edit',$user);//->aqui se llama la police UserPolicy en metodo edit
        return view('user.edit',['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, EditUser $request)
    {
        $this->authorize('update',$user);//->aqui se llama la police UserPolicy en metodo update
        
        if ($request->hasFile('img')) {
            if ($user->img != "default.png") {
                Storage::delete($user->img);
            }
            $user->img = $request->file('img')->store('public');
        }

        $this->users->update($user, $request);

        return back()->with('status', 'Usuario actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
