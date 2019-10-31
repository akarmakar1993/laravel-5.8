<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\User;
use Auth;
use File;

class UserRepository

{
	public function update1()
	{
		return $user = Auth::user();
        
	}

	public function submitData(Request $request)
	{
		$user = Auth::user();

        if(($request->hasFile('image')))
        {
            if($user->image)
            {
                $usersImage = public_path("images/{$user->image}"); // get previous image from folder
                if (File::exists($usersImage)) 
                { 
                    unlink($usersImage);            // unlink or remove previous image from folder
                }
            }

            $file = $request->file('image');
            $img = time() . '-' . $file->getClientOriginalName();
            $file = $file->move(('images'), $img);
            $user->image= $img;
        }

       User::where('id', $user->id)
            ->update([
                'name' => $request->input('name'),
                'image' => $user->image
            ]);
	}

}