<?php

namespace App\Repositories;

use App\Contracts\Repositories\WishlistRepository;
use App\Models\wishlist;

class WishlistRepositoryEloquent extends AbstractRepositoryEloquent implements WishlistRepository
{

    public function model()
    {
        return app(wishlist::class);
    }

    public function all()
    {
        $wishlist = $this->model()
            ->latest()
            ->get();

        return $wishlist;
    }

    public function show($id)
    {
        return $this->model()->findBySlugOrFail($id);
    }

    public function store(array $data)
    {
//        return $this->model()->create([
//            'name' => $data['name'],
//            'slug' => $data['slug'],
//            'parent_id' => $data['slug'],
//            'status' => config('blog.wishlist.status.active'),
//        ]);
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function update($id, array $data)
    {
//        $wishlist = $this->model()->findBySlugOrFail($id)->update([
//            'name' => $data['name'],
//            'slug' => $data['slug'],
//            'parent_id' => $data['slug'],
//            'status' => config('blog.wishlist.status.active'),
//        ]);
//
//        return $wishlist;
    }

    /**
     * Destroy wishlist by id
     *
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $wishlist = $this->model()->findBySlugOrFail($id);

        return $wishlist->delete();
    }
}