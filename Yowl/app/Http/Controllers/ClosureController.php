<?php

namespace App\Http\Controllers;

use App\Models\closure;
use Illuminate\Http\Request;
use App\Filters\ClosuresFilter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ClosureCollection;
use App\Http\Requests\StoreclosureRequest;
use App\Http\Requests\UpdateclosureRequest;

class ClosureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = new ClosuresFilter();
        $filterItems = $filter->transform($request);

        $creations = Closure::where($filterItems);
        if (Auth::user()->is_admin == 1) {
            return new ClosureCollection($creations->paginate()->appends($request->query()));
        }
        return $this->error('', 'You are not authorized to make this request', 403);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreclosureRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreclosureRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\closure  $closure
     * @return \Illuminate\Http\Response
     */
    public function show(closure $closure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\closure  $closure
     * @return \Illuminate\Http\Response
     */
    public function edit(closure $closure)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateclosureRequest  $request
     * @param  \App\Models\closure  $closure
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateclosureRequest $request, closure $closure)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\closure  $closure
     * @return \Illuminate\Http\Response
     */
    public function destroy(closure $closure)
    {
        //
    }
}
