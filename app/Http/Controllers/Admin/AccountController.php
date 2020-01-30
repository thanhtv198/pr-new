<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UpdateUserRequest;
use App\Models\City;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\User;
use App\Models\Role;
use Validator;
use App\Http\Requests\UserRequest;

class AccountController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getMember()
    {
        $members = User::where('role_id', '3')->orderBy('id', 'desc')->get();
        return view('admin.account.member.index', compact('members'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addMember()
    {
        $role = Role::pluck('role', 'id');

        $city = City::pluck('name', 'id');

        return view('admin.account.member.add', compact('role', 'city'));
    }

    /**
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postAddMember(UserRequest $request)
    {
        $request->merge([
            'password' => bcrypt($request->password),
            'remove' => 0,
        ]);

        User::create($request->all());

        return redirect('admin/member/index')->with('success', trans('common.with.add_success'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editMember($id)
    {
        $user = User::findOrFail($id);

        $role = Role::pluck('role', 'id');

        $city = City::pluck('name', 'id');

        return view('admin/account/member/edit', compact('role', 'user', 'city'));
    }

    /**
     * @param $id
     * @param UserRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function postEditMember($id, UpdateUserRequest $request)
    {
        $user = User::findOrFail($id);

        $pass_old = $user->password;

        if ($request->password == $pass_old) {
            $pass_new = $pass_old;
        } else {
            $pass_new = bcrypt($request->password);
        }

        $request->merge([
            'password' => $pass_new,
            'remove' => 0,
        ]);

        $user->update($request->all());

        return redirect('admin/member/index')->with('success', trans('common.with.edit_success'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function deleteMember($id)
    {
        try {
            $user = User::findOrFail($id);
            if(count($user->posts)) {
                $user->posts->delete();
            }

            if(count($user->products)) {
                $user->products->delete();
            }
            $user->delete();

            return redirect('admin/member/index')->with('success', trans('common.with.delete_success'));
        } catch (ModelNotFoundException $e) {
            return view('admin.404');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteMulMember(Request $request)
    {
        if ($request->check == null) {
            return redirect('admin/member/index')->with('message', trans('common.with.delete_ept'));
        }

        for ($i = 0; $i < count($request->check); $i++) {
            $user = User::findOrFail($request->check[$i]);

            $user->delete();
        }

        return redirect('admin/member/index')->with('success', trans('common.with.delete_success'));
    }

    /**
     * @param Request $req
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchMember(Request $req)
    {
        $members = User::member($req->key)->get();

        return view('admin.account.member.index', compact('members'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getManager()
    {
        $managers = User::where('role_id', '<>', '3')->get();

        return view('admin.account.manager.index', compact('managers'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addManager()
    {
        $role = Role::pluck('role', 'id');

        $city = city::pluck('name', 'id');

        return view('admin.account.manager.add', compact('role', 'city'));
    }

    /**
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postAddManager(UserRequest $request)
    {
        $request->merge([
            'password' => bcrypt($request->password),
            'remove' => config('page.user.remove.active')
        ]);

        User::create($request->all());

        return redirect('admin/manager/index')->with('success', trans('common.with.add_success'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editManager($id)
    {
        $user = User::findOrFail($id);

        $role = Role::pluck('role', 'id');

        $city = city::pluck('name', 'id');

        return view('admin/account/manager/edit', compact('role', 'user', 'city'));
    }

    /**
     * @param $id
     * @param UserRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function postEditManager($id, UpdateUserRequest $request)
    {
        $user = User::findOrFail($id);

        $passOld = $user->password;

        if ($request->password == $passOld) {
            $passNew = $passOld;
        } else {
            $passNew = bcrypt($request->password);
        }

        $request->merge([
            'password' => $passNew,
            'remove' => config('page.user.remove.active'),
        ]);

        $user->update($request->all());

        return redirect('admin/manager/index')->with('success', trans('common.with.edit_success'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function deleteManager($id)
    {
        try {
            if (auth()->user()->id == $id) {
                return back()->with('message', trans('common.with.delete_error'));
            }
            $user = User::findOrFail($id);

            if(count($user->posts)) {
                $user->posts->delete();
            }

            if(count($user->products)) {
                $user->products->delete();
            }

            $user->delete();
            return redirect('admin/manager/index')->with('success', trans('common.with.delete_success'));
        } catch (ModelNotFoundException $e) {
            return view('admin.404');
        }
    }

    /**
     * @param Request $req
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchManager(Request $req)
    {
        $managers = User::manager($req->key)->get();

        return view('admin.account.manager.index', compact('managers'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteMulManager(Request $request)
    {
        if ($request->check == null) {
            return redirect('admin/manager/index')->with('message', trans('common.with.delete_ept'));
        }

        for ($i = 0; $i < count($request->check); $i++) {
            $user = User::findOrFail($request->check[$i]);

            if (auth()->user()->id = $request->check[$i]) {
                return back()->with('message', trans('common.with.delete_error'));
            }

            $user->delete();
        }

        return redirect('admin/manager/index')->with('success', trans('common.with.delete_success'));
    }
}

