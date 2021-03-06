<?php

namespace App\Http\Controllers\Site;

use App\Contracts\Repositories\PostRepository;
use App\Contracts\Repositories\UserRepository;
use App\Http\Requests\UpdateUserRequest;
use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\User;
use Auth;
use App\Http\Requests\UserRequest;

class ProfileController extends Controller
{
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getProfile($id)
    {
        $user = User::findOrFail($id);

        $city = City::pluck('name', 'id');

        return view('site.profile.info', compact('city', 'user'));
    }

    /**
     * @param $id
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postProfile($id, UpdateUserRequest $request)
    {
        $user = User::findOrFail($id);
        $odlAvatar = $user->avatar;
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $fileName = $this->uploadFile($file);

            $request->merge([
                'avatar' => $fileName,
            ]);
        } else {
            $request->merge([
                'avatar' => $odlAvatar,
            ]);
        }

        $this->repository->updateUser($id, $request->password, $request->all());

        return redirect()->route('get_profile', $id)->with('success', trans('common.with.edit_success'));
    }

    public function timeLine($id)
    {
        $user = User::findOrFail($id);
        $sellings = $user->products;
        $discuss = $user->posts;

        return view('site.profile.time_line', compact('sellings', 'discuss'));
    }
}

