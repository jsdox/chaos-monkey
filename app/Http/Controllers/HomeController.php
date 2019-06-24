<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       return "Laravel";
    }

    public function test(Request $request)
    {
        $input = $request->all();
        $data_saved = User::create($input);
        if(!$data_saved) {
            return $data_saved->getErrors();
        }
    }
    public function save(Request $request)
    {
        $input = $request->all();
        $object = new User($input);
        if ($object->save()) {
            return 'data_saved';
        }
        return $object->getErrors();
    }

    public function login()
    {
        return redirect()->route('dashboard');
    }
    
    public function dashboard()
    {
        return 'dashobard';
    }

    public function logOut()
    {
        return redirect()->route('logoutView');
    }
    public function logOutView()
    {
        return 'logout';
    }

    public function checkLoing(Request $request)
    {
        $input = $request->all();
        $user = (new User())->getUserByEmail(strtolower(trim($input['email'])));
        if (!$user || !Hash::check($input['password'], $user->password)) {
            return 'success';
        }
        return false;
    }
}

