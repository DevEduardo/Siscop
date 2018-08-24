<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use App\User;

class UserController extends Controller
{
    public function updatePassword(Request $request, $id)
    {
    	$user = User::findOrFail($id);
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {	
    	$user = User::findOrFail($id);
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->save();
    	if ($request->file('picture')) {
            $path = Storage::disk('public')->put('storage',  $request->file('picture'));
            $user->fill(['picture' => asset($path)])->save();
        }
        return redirect()->back();
    }
}
