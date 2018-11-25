<?php

namespace App\Repositories;

use App\Contracts\Repositories\PostRepository;
use App\Models\Block;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use DB;

class PostRepositoryEloquent extends AbstractRepositoryEloquent implements PostRepository
{

    public function model()
    {
        return app(Post::class);
    }

    /**
     * Get all post lates
     *
     * @return array $post
     */
    public function all()
    {
        $posts = $this->model()
            ->latest()
            ->get();

        return $posts;
    }

    /**
     * Show detail post
     *
     * @param int $id
     * @return Post
     */
    public function show($id)
    {
        $post = $this->model()->findBySlugOrFail($id);

//        $tags = $post->tags;
        $tagsName = [];
        $view = $post->view;
        $post->update([
            'view' => $view + 1,
        ]);

//        foreach ($tags as $tag) {
//            $tagsName[] = array([
//                'id' => $tag->id,
//                'name' => $tag->name,
//            ]);
//        }

//        $tagsName = array_slice($tagsName, 0, config('blog.post.tagInDetail'));

//        $post->setAttribute('tags_name', $tagsName);

        return $post;
    }

    /**
     * Store a new post
     *
     * @param array $data
     * @return Post
     */
    public function store(array $data)
    {
        $post = $this->model()->create([
            'user_id' => auth()->user()->id,
            'title' => $data['title'],
            'content' => $data['content'],
            'status' => config('blog.post.status.active'),
            'view' => Post::VIEW,
        ]);

        return $post;
    }

    public function edit($id)
    {
        return $this->model()->findOrFail($id);
    }

    /**
     * Update post by id
     *
     * @param int $id
     * @param array $data
     * @return Post
     */
    public function update($id, array $data)
    {
        $post = $this->model()->findOrFail($id);

        return $post->update([
            'title' => $data['title'],
            'content' => $data['content'],
        ]);
    }

    /**
     * Destroy post by id
     *
     * @param int $id
     * @return mixed
     */
    public function destroy($id)
    {
        $post = $this->model()->findOrFail($id);

        return $post->delete();
    }

    /**
     * Change status to active a post
     *
     * @param int $id
     */
    public function active($id)
    {
        $post = $this->model()->findOrFail($id);

        $post->update([
            'status' => config('blog.post.status.active'),
        ]);
    }

    /**
     * Change status to inactive a post
     *
     * @param int $id
     */
    public function inActive($id, $data)
    {
        $post = $this->model()->findOrFail($id);
        $post->update([
            'status' => config('model.post.status.inactive'),
        ]);

        Block::create([
           'blockable_id' => $id,
           'blockable_type' => 'post',
           'reason' => $data,
        ]);
    }

    public function pending($id)
    {
        $post = $this->model()
            ->findOrFail($id)
            ->update([
                'status' => config('blog.post.pending'),
            ]);

        return $post;
    }

    /**
     * get post and paginate
     *
     * @return mixed
     */
    public function paginate()
    {
        $post = $this->model()
            ->latest()
            ->paginate(config('blog.post.paginate'));

        return $post;
    }

    /**
     * Get latest tags linit
     *
     * @param int $id
     * @return mixed
     */
    public function getTags($id)
    {
        $tags = Tag::latest()
            ->take(config('blog.tag.limit'))
            ->get();

        return $tags;
    }

    public function comment($id, $data)
    {
        $post = $this->model()->findOrFail($id);

        $comment = $post->comments()->create([
            'user_id' => auth()->user()->id,
            'status' => 1,
            'content' => $data['content'],
        ]);

        return $comment;
    }

    public function reply($postId, $data)
    {
        $post = $this->model()->findOrFail($postId);
        $reply = $post->comments()->create([
            'user_id' => auth()->user()->id,
            'status' => 1,
            'content' => $data['content'],
            'parent_id' => $data['parent_id'],
        ]);

        return $reply;
    }

    public function search($data)
    {
        if (!is_null($data)) {
            $result = $this->model()->search($data)->paginate(config('blog.post.paginate'));
        } else {
            $result = $this->model()->latest()->paginate(config('blog.post.paginate'));
        }

        return $result;
    }

    public function getPostByUser($id)
    {
        $user = User::findOrFail($id);
        $posts = $user->posts;

        return $posts;
    }
}