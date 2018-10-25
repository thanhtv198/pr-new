<?php

namespace App\Contracts\Repositories;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder\Class_;

interface AbstractRepository
{
    public function model();

    public function all();

    public function store(array $data);

    public function show($id);

    public function edit($id);

    public function update($id, array $data);

    public function destroy($id);
}