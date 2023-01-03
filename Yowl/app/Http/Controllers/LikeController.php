<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Filters\LikesFilter;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use App\Http\Resources\LikeResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\LikeCollection;
use App\Http\Requests\StoreLikeRequest;
use App\Http\Requests\UpdateLikeRequest;

class LikeController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = new LikesFilter();
        $queryItems = $filter->transform($request);

        if (count($queryItems) == 0) {
            return new LikeCollection(Like::paginate());
        } else {
            $likes = Like::where($queryItems)->paginate();
            return new LikeCollection($likes->appends($request->query()));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLikeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLikeRequest $request)
    {
        $id = Auth::id();
        $foundLike = Like::find(1)->where('comment_id', $request->comment_id)->where('user_id', $id)->first();
        if ($foundLike) {
            $foundLike->delete();
        } else {
            return new LikeResource(Like::create([
                'user_id' => $id,
                'comment_id' => $request->comment_id,
            ]));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(Like $like)
    {
        return new LikeResource($like);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLikeRequest  $request
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLikeRequest $request, Like $like)
    {
        if (Auth::user()->id == $like->user_id) {
            $like->update($request->all());
        }
        return $this->error('', 'You are not authorized to make this request', 403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Like $like)
    {
        if (Auth::user()->id == $like->user_id) {
            $like->delete();
        }
        return $this->error('', 'You are not authorized to make this request', 403);
    }
}
