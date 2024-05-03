<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use App\Http\Requests\ProfileRequest;
use Intervention\Image\Drivers\Imagick\Driver;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('profile.index');
    }

    public function store(ProfileRequest $request)
    {
        $data = $request->validated();

        if ($request->image) {
            $imageName = $this->storeImageLocaly($request);

            $data['image'] = $imageName;
        }

        $user = User::find(auth()->user()->id)->update($data);

        $user = User::find(auth()->user()->id);

        return redirect()->route('posts.index', $user->username);
    }

    public function storeImageLocaly($request)
    {
        $imageRequest = $request->file('image');

        // create new manager instance with desired driver
        $manager = new ImageManager(new Driver());

        // read image from filesystem
        $image = $manager->read( $imageRequest );

        $image = $image->resize(1000, 1000);

        $imageName = Str::uuid() . '.png';

        $image->toPng()->save(public_path() . '/' .'profiles/' .$imageName);

        return $imageName;
    }
}
