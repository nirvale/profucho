<?php

namespace App\Http\Controllers\Intranet;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Intranet\Profile;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{


    private $profilePathAvatar = 'images/profiles';

    public function __construct()
    {
        
    }

    public function avatar($filename)
    {
        $exists = Storage::exists($this->profilePathAvatar.'/'.$filename);

        if (! $exists) {
            $defaulPath = Storage::path($this->profilePathAvatar.'/avatar.svg');
            $mime = Storage::mimeType($this->profilePathAvatar.'/avatar.svg');
            $headers = ['Content-Type' => $mime];

            return response()->file($defaulPath, $headers);

        } else {
            $path = Storage::path($this->profilePathAvatar.'/'.$filename);
            $mime = Storage::mimeType($this->profilePathAvatar.'/'.$filename);
            $headers = ['Content-Type' => $mime];

            return response()->file($path, $headers);
        }

    }

    public function profile()
    {
        return view('intranet.profile.show');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfileRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequest $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
