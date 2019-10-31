<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use File;
use App\Repositories\UserRepository;

class UserController extends Controller
{

    private $userRepo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepository $userRepo)
    {
        $this->$userRepo = $userRepo;

        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user.home');
    }


    public function showData()
    {
        $user_table = new User();
        $user = $this->userRepository->showData($user_tables);
        return view('user.userview', compact('user'));
    }


    public function update()
    {
        $user = $this->userRepository->update1();
        return view('user.userupdate', compact('user'));
    }


    public function submit(Request $request)
    {

         $this->validate(request(), [
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $user = $this->userRepository->submitData($request);

        return redirect()->back()->with('message', 'Profile Updated Successfully!');

    }
}
