<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Filters\CommentFilter;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\CommentResource;
use App\Http\Resources\CommentCollection;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;

class CommentController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return Comment::all();
        // return new CommentCollection(Comment::paginate());
        $filter = new CommentFilter();
        $filterItems = $filter->transform($request);

        $includeResponses = request()->query('includeResponses');
        // $includeLikes = request()->query('includeLikes');

        $comments = Comment::where($filterItems);

        if ($includeResponses) {
            $comments = $comments->with('responses');
        }
        // if ($includeLikes) {
        //     $comments = $comments->with('likes');
        // }

        return new CommentCollection($comments->paginate()->appends($request->query()));

        // if (count($filterItems) == 0) {
        //     return new CommentCollection(Comment::paginate());

        // } else {
        //     $users = Comment::where($filterItems)->paginate();
        //     return new CommentCollection($users->appends($request->query()));
        // }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommentRequest $request)
    {
        $id = Auth::id();
        return new CommentResource(Comment::create([
            'title' => $request->title,
            'content' => $request->content,
            'url' => $request->url,
            'user_id' => $id,
            'category_id' => $request->category_id,
        ]));

        return $this->error('', 'You are not authorized to make this request', 403);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        $includeResponses = request()->query('includeResponses');

        if ($includeResponses) {
            return new CommentResource($comment->loadMissing('responses'));
        }
        return new CommentResource($comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCommentRequest  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        if (Auth::user()->id == $comment->user_id) {
            $comment->update($request->all());
            return $this->success('', 'Request was succesful.', 200);
        }
        return $this->error('', 'You are not authorized to make this request', 403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        if (Auth::user()->id == $comment->user_id || Auth::user()->is_admin == 1) {
            $comment->delete();
            return $this->success('', 'Request was successful.', 200);
        }
        return $this->error('', 'You are not authorized to make this request', 403);
    }

    public function search(Request $request, $q)
    {
        // $q = request()->input('q');
        $comments = Comment::where('title', 'like', "%$q%")
            ->orWhere('content', 'like', "%$q%")
            ->orWhere('url', 'like', "%$q%");
        return new CommentCollection($comments->paginate()->appends($request->query()));
    }
}
