<?php

namespace App\Repositories;

use App\Contracts\Repositories\TagRepository;
use App\Models\Tag;

class TagRepositoryEloquent extends AbstractRepositoryEloquent implements TagRepository
{

    public function model()
    {
        return app(Tag::class);
    }

    /**
     * Get all tags lates
     *
     * @return array $tags
     */
    public function all()
    {
        $tags = $this->model()
            ->latest()
            ->get();

        return $tags;
    }

    public function show($id)
    {
        return $this->findOrFail($id);
    }

    public function store(array $data)
    {
        // TODO: Implement store() method.
    }

    /**
     * Save tags whene store post and pivot table
     *
     * @param array $data
     * @param int $id
     */
    public function saveTagsByPost(array $data, $id)
    {
        foreach ($data as $value) {
            $tag = $this->model()->updateOrCreate([
                'name' => $value,
            ], [
                'view' => config('blog.tag.view'),
            ]);

            $tag->posts()->sync($id);
        }
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function update($id, array $data)
    {
        $tag = $this->findOrFail($id)->update([
            'title' => $data['title'],
            'slug' => $data['slug'],
        ]);

        return $tag;
    }

    public function destroy($id)
    {
        $tag = $this->fincOrFail($id);

        return $tag->delete();
    }

    public function getTagHome()
    {
        $tags = $this->model()
            ->latest()
            ->take(config('blog.tag.limit'))
            ->get();

        return $tags;
    }

    public function getPostByTag($id)
    {
        $tag = $this->model()->findOrFail($id);
        $posts = $tag->posts;

        return $posts;
    }

    public function pluck()
    {
        return $this->model()->pluck('name', 'name');
    }
}