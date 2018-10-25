<?php

namespace App\Http\Controllers\Frontend;

use App\Contracts\Repositories\TopicRepository;
use App\Http\Controllers\Controller;
use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    protected $repository;

    public function __construct(TopicRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Get posts of topic by topic id
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getPostByTopicId($id)
    {
        $posts = $this->repository->getPostById($id);

        $topicSidebar = $id;

        $topicName = $this->repository->getNameById($id);
       
        return view('frontend.topic.index', compact('posts', 'topicName', 'topicSidebar'));
    }
}
