<?php

namespace App\Repositories;

use App\Contracts\Repositories\UserRepository;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;

class UserRepositoryEloquent extends AbstractRepositoryEloquent implements UserRepository
{
    public function model()
    {
        return app(User::class);
    }

    /**
     * Login user
     *
     * @param array $data
     * @return bool
     */
    public function login($data)
    {
        $data = [
            'email' => $data['email'],
            'password' => $data['password'],
        ];

        $remember = (Input::has('remember')) ? true : false;

        if (Auth::attempt($data, $remember)) {
            return true;
        }

        return false;
    }

    public function all()
    {
        return $this->model()->latest()->get();
    }

    public function show($id)
    {
        return $this->model()->findOrFail($id);
    }

    public function store(array $data)
    {
        // TODO: Implement store() method.
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function update($id, array $data)
    {
        // TODO: Implement update() method.
    }

    /**
     * Update profile user
     *
     * @param int $id
     * @param array $data
     * @return User
     */
    public function updateUser($id, $newPass, array $data)
    {
        $user = $this->model()->findOrFail($id);

        $oldPass = $user->password;

        if ($newPass == $oldPass) {
            return $user->update([
                'name' => $data['name'],
                'email' => $data['email'],
                'birthday' => $data['birthday'],
                'avatar' => $data['avatar'],
                'password' => $oldPass,
            ]);
        }

        return $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'birthday' => $data['birthday'],
            'avatar' => $data['avatar'],
            'password' => bcrypt($newPass),
        ]);
    }

    /**
     * Delete user and their posts
     *
     * @param int $id
     */
    public function destroy($id)
    {
        $user = $this->model()->findOrFail($id);

        $user->delete();

        $user->posts()->delete();
    }

    /**
     * Update user to active
     *
     * @param int $id
     */
    public function active($id)
    {
        $user = $this->model()->findOrFail($id);

        $user->update([
            'status' => config('blog.user.status.active'),
        ]);
    }

    /**
     * Inactive user and make reason block
     *
     * @param int $id
     * @param int $data
     */
    public function inActive($id, $data)
    {
        $user = $this->model()->findOrFail($id);
       
        $user->update([
            'status' => config('blog.user.status.inactive'),
            'block_reason' => $data,
        ]);
    }

    /**
     * Get all question belongto user
     *
     * @param int $id
     * @return mixed
     */
    public function getQuestions($id)
    {
        return $this->model()->findOrFail($id)->questions;
    }

    /**
     * Get all posts belongto user
     *
     * @param int $id
     * @return mixed
     */
    public function getPosts($id)
    {
        return $this->model()->findOrFail($id)->posts;
    }

    public function getAdmin()
    {
        $admins = $this->model()
            ->where('role', config('blog.user.role.admin'))
            ->get();

        return $admins;
    }
}

