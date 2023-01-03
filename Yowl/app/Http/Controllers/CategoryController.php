<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Filters\CategoriesFilter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CategoryCollection;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $filter = new CategoriesFilter();
        // $queryItems = $filter->transform($request);

        // if (count($queryItems) == 0) {
        //     return new CategoryCollection(Category::paginate());
        // } else {
        //     $categories = Category::where($queryItems)->paginate();
        //     return new CategoryCollection($categories->appends($request->query()));
        // }
        $filter = new CategoriesFilter();
        $filterItems = $filter->transform($request);

        $includeComments = request()->query('includeComments');

        $categories = Category::where($filterItems);

        if ($includeComments) {
            $users = $categories->with('comments');
        }

        return new CategoryCollection($categories->paginate()->appends($request->query()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        if (Auth::user()->is_admin == 1) {
            return new CategoryResource(Category::create($request->all()));
        }
        return $this->error('', 'You are not authorized to make this request', 403);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        // return new CategoryResource($category);
        $includeComments = request()->query('includeComments');

        if ($includeComments) {
            return new CategoryResource($category->loadMissing('comments'));
        }
        return new CategoryResource($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        if (Auth::user()->is_admin == 1) {
            $category->update($request->all());
            return $this->success('', 'Request was successful.', 200);
        }
        return $this->error('', 'You are not authorized to make this request', 403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if (Auth::user()->is_admin == 1) {
            $category->delete();
            return $this->success('', 'Request was successful.', 200);
        }
        return $this->error('', 'You are not authorized to make this request', 403);
    }
}
