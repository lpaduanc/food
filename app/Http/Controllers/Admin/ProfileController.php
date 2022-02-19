<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProfileRequest;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    protected $profilerepository;
    
    public function __construct(Profile $profile)
    {
        $this->profilerepository = $profile;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.profiles.index', [
            'profiles' => $this->profilerepository->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreProfileRequest  $storeProfileRequest
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfileRequest $storeProfileRequest)
    {
        $this->profilerepository->create($storeProfileRequest->all());

        return redirect()->route('profile.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $profileId
     * @return \Illuminate\Http\Response
     */
    public function show($profileId)
    {
        $profile = $this->profilerepository->find($profileId);

        if (!$profile) {
            return redirect()->back();
        }

        return view('admin.pages.profiles.show', [
            'profile' => $profile,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $profileId
     * @return \Illuminate\Http\Response
     */
    public function edit($profileId)
    {
        $profile = $this->profilerepository->find($profileId);

        if (!$profile) {
            return redirect()->back();
        }
        
        return view('admin.pages.profiles.edit', [
            'profile' => $profile,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreProfileRequest  $storeProfileRequest
     * @param  int  $profileId
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProfileRequest $storeProfileRequest, $profileId)
    {
        $profile = $this->profilerepository->find($profileId);

        if (!$profile) {
            return redirect()->back();
        }

        $profile->update($storeProfileRequest->all());

        return redirect()->route('profile.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $profileId
     * @return \Illuminate\Http\Response
     */
    public function destroy($profileId)
    {
        $profile = $this->profilerepository->find($profileId);

        if (!$profile) {
            return redirect()->back();
        }

        $profile->delete();

        return redirect()->route('profile.index');
    }

    /**
     * Search results
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $profiles = $this->profilerepository
            ->where(function ($query) use ($request) {
                if ($request->filter) {
                    $query
                        ->where('name', $request->filter)
                        ->orWhere('description', 'LIKE', "%{$request->filter}%");
                }
            })
            ->paginate();

        return view('admin.pages.profiles.index', [
            'profiles' => $profiles,
            'filter' => $request->only('filter'),
        ]);
    }
}
