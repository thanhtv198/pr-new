<?php

namespace App\Contracts\Repositories;

interface PostRepository extends AbstractRepository
{
    public function pending($id);

    public function paginate();

    public function getTags($id);

    public function active($id);

    public function inActive($id, $data);

    public function comment($id, $data);

    public function reply($parentId, $data);

    public function search($data);
}