<?php 
namespace App\Repo;

use App\Models\User;


/**
 * 
 */
class Users
{
	
	public function index()
	{
		return User::with(['type','roles','note','tags'])->paginate(6);
	}

	public function update($user, $request)
	{
        $user->update($request->validated());
	}
	
}


