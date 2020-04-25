<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

	
    public function index()
    {
    	$readNotifications = auth()->user()->readNotifications;
    	$unreadNotifications = auth()->user()->unreadNotifications;
    	
    	return view('notifications.index',[
    		'readNotifications' => $readNotifications,
    		'unreadNotifications' => $unreadNotifications
    	]);
    }


    public function read($notification)
    {
    	DatabaseNotification::find($notification)->markAsRead();

    	return back()->with('status','Notificacion actualizada');
    }

    public function destroy($notification)
    {
    	DatabaseNotification::find($notification)->delete();

    	return back()->with('status','Notificacion eliminada');
    }
}
