<?php

namespace App\Http\Controllers\Frontend;

use App\Contracts\Repositories\PostRepository;
use App\Contracts\Repositories\TagRepository;
use App\Contracts\Repositories\UserRepository;
use App\Events\NotifyWelcome;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\PostRequest;
use App\Models\Comment;
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

    public function __construct(
        PostRepository $repository,
        TagRepository $tagRepository,
        UserRepository $userRepository
    )
    {
        $this->repository = $repository;
        $this->tagRepository = $tagRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->repository->paginate();

        return view('frontend.post.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = $this->tagRepository->pluck();

        return view('frontend.post.create', compact('tags'));
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

        $post = $this->repository->store($data);

        $this->tagRepository->saveTagsByPost($request->tags, $post->id);

        $admins = $this->userRepository->getAdmin();

        Notification::send($admins, new NewPostNotification($post));

        event(new NotifyWelcome("Hi,for reading my article!"));

        return redirect()->route('home');
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

        $tags = $this->repository->getTags($id);

        $comments = Comment::getById($id);

        return view('frontend.post.detail', compact('post', 'tags', 'comments'));
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

        return view('frontend.post.edit', compact('post'));
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

        return redirect()->route('home');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param CommentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function comment(CommentRequest $request, $id)
    {
        $comment = $this->repository->comment($id, $request->all());

        return response()->json($comment);
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

        $comment = $this->repository->reply($id, $request->all());

        return response()->json([
            'comment' => $comment,
            'username' => auth()->user()->name,
        ]);

    }
}

