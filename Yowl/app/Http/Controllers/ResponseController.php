<?php

namespace App\Http\Controllers;

use App\Models\Response;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Filters\ResponsesFilter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ResponseResource;
use App\Http\Resources\ResponseCollection;
use App\Http\Requests\StoreResponseRequest;
use App\Http\Requests\UpdateResponseRequest;

class ResponseController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = new ResponsesFilter();
        $queryItems = $filter->transform($request);

        if (count($queryItems) == 0) {
            return new ResponseCollection(Response::paginate());
        } else {
            $responses = Response::where($queryItems)->paginate();
            return new ResponseCollection($responses->appends($request->query()));
        }
        // return new UserCollection(User::paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreResponseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResponseRequest $request)
    {
        $id = Auth::id();
        return new ResponseResource(Response::create([
            'content' => $request->content,
            'user_id' => $id,
            'category_id' => $request->category_id,
        ]));

        // return $this->error('', 'You are not authorized to make this request', 403);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function show(Response $response)
    {
        return new ResponseResource($response);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateResponseRequest  $request
     * @param  \App\Models\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResponseRequest $request, Response $response)
    {
        if (Auth::user()->id == $response->user_id) {
            $response->update($request->all());
            return $this->success('', 'Request was succesful.', 200);
        }
        return $this->error('', 'You are not authorized to make this request', 403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function destroy(Response $response)
    {
        if (Auth::user()->id == $response->user_id || Auth::user()->is_admin == 1) {
            $response->delete();
            return $this->success('', 'Request was successful.', 200);
        }
        return $this->error('', 'You are not authorized to make this request', 403);
    }
}
