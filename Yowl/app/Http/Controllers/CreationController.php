<?php

namespace App\Http\Controllers;

use App\Models\Creation;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Filters\CreationsFilter;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\CreationCollection;
use App\Http\Requests\StoreCreationRequest;
use App\Http\Requests\UpdateCreationRequest;

class CreationController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $filter = new CreationsFilter();
        // $queryItems = $filter->transform($request);

        // if (count($queryItems) == 0) {
        //     return new CreationCollection(Creation::paginate());
        // } else {
        //     $creations = Creation::where($queryItems)->paginate();
        //     return new CreationCollection($creations->appends($request->query()));
        // }


        $filter = new CreationsFilter();
        $filterItems = $filter->transform($request);

        $creations = Creation::where($filterItems);
        if (Auth::user()->is_admin == 1) {
            return new CreationCollection($creations->paginate()->appends($request->query()));
        }
        return $this->error('', 'You are not authorized to make this request', 403);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCreationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCreationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Creation  $creation
     * @return \Illuminate\Http\Response
     */
    public function show(Creation $creation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCreationRequest  $request
     * @param  \App\Models\Creation  $creation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCreationRequest $request, Creation $creation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Creation  $creation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Creation $creation)
    {
        //
    }
}
