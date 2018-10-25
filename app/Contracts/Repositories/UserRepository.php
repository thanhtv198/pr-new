<?php

namespace App\Contracts\Repositories;

interface UserRepository extends AbstractRepository
{
    public function login($data);

    public function active($id);

    public function inActive($id, $data);

    public function getPosts($id);

    public function getQuestions($id);

    public function updateUser($id, $newPass, array $data);

    public function getAdmin();
}