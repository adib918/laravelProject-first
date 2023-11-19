<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AvatarController extends Controller
{
    public function update(UpdateAvatarRequest $request){
        $path = Storage::disk('public')->put('avatars', $request->file('avatar'));
        //$path = $request->file('avatar')->store('avatars', 'public');
        if($oldAvatar = $request->user()->avatar){
            Storage::disk('public')->delete($oldAvatar);
        }
        auth()->user()->update(['avatar' => $path]);
        return redirect(route('profile.edit'))->with('message','Avatar uploaded successfuly.');
    }
    public function generate(Request $request){
        $contents = file_get_contents("https://th.bing.com/th/id/OIP.Sm45n45PHuTBZPtuxxqI4AHaHa?rs=1&pid=ImgDetMain");
        $filename = Str::random(25);
        Storage::disk('public')->put("avatars/$filename.jpg", $contents);

        if($oldAvatar = $request->user()->avatar){
            Storage::disk('public')->delete($oldAvatar);
        }

        auth()->user()->update(['avatar' => "avatars/$filename.jpg"]);
        return redirect(route('profile.edit'))->with('message','Avatar generated successfuly.');
    }
}