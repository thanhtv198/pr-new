<?php

namespace App\Repositories;

use App\Contracts\Repositories\TopicRepository;
use App\Models\Topic;

class TopicRepositoryEloquent extends AbstractRepositoryEloquent implements TopicRepository
{

    public function model()
    {
        return app(Topic::class);
    }

    public function all()
    {
        $topic = $this->model()
            ->latest()
            ->get();

        return $topic;
    }

    public function show($id)
    {
        return $this->model()->findBySlugOrFail($id);
    }

    public function store(array $data)
    {
        return $this->model()->create([
            'name' => $data['name'],
            'slug' => $data['slug'],
            'parent_id' => $data['slug'],
            'status' => config('blog.topic.status.active'),
        ]);
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function update($id, array $data)
    {
        $topic = $this->model()->findBySlugOrFail($id)->update([
            'name' => $data['name'],
            'slug' => $data['slug'],
            'parent_id' => $data['slug'],
            'status' => config('blog.topic.status.active'),
        ]);

        return $topic;
    }

    /**
     * Destroy topic by id
     *
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $topic = $this->model()->findBySlugOrFail($id);

        return $topic->delete();
    }

    /**
     * Active topic by id
     *
     * @param $id
     * @return Topic
     */
    public function active($id)
    {
        $topic = $this->model()->findBySlugOrFail($id)->update([
            'status' => config('blog.topic.active'),
        ]);

        return $topic;
    }

    /**
     * in active topic by id
     *
     * @param int $id
     * @return Topic
     */
    public function inactive($id)
    {
        $topic = $this->model()->findBySlugOrFail($id)->update([
            'status' => config('blog.topic.inactive'),
        ]);

        return $topic;
    }

    /**
     * Get all Post belong to topic
     *
     * @param int $id
     * @return mixed
     */
    public function getPostById($id)
    {
        return $this->model()->findBySlugOrFail($id)->posts;
    }

    /**
     * Get name of topic
     *
     * @param int $id
     * @return mixed
     */
    public function getNameById($id)
    {
        return $this->model()->findBySlugOrFail($id)->name;
    }
}