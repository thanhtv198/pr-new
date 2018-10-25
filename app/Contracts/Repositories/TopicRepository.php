<?php

namespace App\Contracts\Repositories;

interface TopicRepository extends AbstractRepository
{
    public function getPostById($id);

    public function active($id);

    public function getNameById($id);
}