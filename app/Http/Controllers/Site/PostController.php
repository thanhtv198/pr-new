<?php

namespace App\Http\Controllers\Site;

use App\Contracts\Repositories\PostRepository;
use App\Contracts\Repositories\TagRepository;
use App\Contracts\Repositories\UserRepository;
use App\Contracts\Repositories\TopicRepository;
use App\Events\NotifyWelcome;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\PostRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Notifications\NewPostNotification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Notification;

class PostController extends Controller
{
    protected $repository;

    protected $tagRepository;

    protected $userRepository;

    protected $topicRepository;

    public function __construct(
        PostRepository $repository,
        TagRepository $tagRepository,
        UserRepository $userRepository,
        TopicRepository $topicRepository
    )
    {
        $this->repository = $repository;
        $this->tagRepository = $tagRepository;
        $this->userRepository = $userRepository;
        $this->topicRepository = $topicRepository;
    }

    public function getPostByUser($id)
    {
        $id = auth()->user()->id;
        $posts = $this->repository->getPostByUser($id);

        return view('site.post.index', compact('posts'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->repository->paginate();
        $topics = $this->topicRepository->take();
        
        return view('site.forumn.index', compact('posts', 'topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = $this->tagRepository->pluck();
        $topics = $this->topicRepository->pluck();

        return view('site.post.add', compact('tags', 'topics'));
    }

    /**
     * Store a new post
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $data = $request->only('content', 'title');

        $this->repository->store($data);

        return redirect()->route('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $this->repository->show($id);
        $id = $post->id;
//        $tags = $this->repository->getTags($id);

        $comments = Comment::getByIdPost($id);

        return view('site.forumn.detail', compact('post',  'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->repository->edit($id);
        $topic = $this->topicRepository->pluck();

        return view('site.post.edit', compact('post', 'topic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->only('title', 'content');

        $this->repository->update($id, $data);

        return redirect()->route('posts.user', auth()->user()->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Post::findOrFail($id)->delete();
    }

    /**
     * @param CommentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function comment(CommentRequest $request, $id)
    {
        $comment = $this->repository->comment($id, $request->all());

        return [
            'comment' => $comment,
            'name' => auth()->user()->name,
            'time' => $comment->created_at->diffForHumans(),
            'avatar' => Auth::user()->avatar?Auth::user()->avatar: '',
            'base_url' => url(config('model.user.upload')),
            'reply' => trans('common.button.reply'),
        ];
    }

    /**
     * Reply comment
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function reply(Request $request, $id)
    {
        $request->merge([
            'content' => $request->repContent,
        ]);

        $reply = $this->repository->reply($request->postId, $request->all());

        return [
            'replies' => $reply,
            'name' => auth()->user()->name,
            'time' => $reply->created_at->diffForHumans(),
            'avatar' => Auth::user()->avatar?Auth::user()->avatar: '',
            'base_url' => url(config('model.user.upload')),
            'reply' => trans('common.button.reply'),
        ];

    }
}

