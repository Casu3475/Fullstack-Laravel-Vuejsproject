<?php

namespace App\Http\Controllers;



use App\Models\User;
use App\Models\Closure;
use App\Filters\UsersFilter;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserCollection;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\CommentResource;
use App\Http\Requests\UpdateUserRequest;


class UserController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // $filter = new UsersFilter();
        // $queryItems = $filter->transform($request);

        // if (count($queryItems) == 0) {
        //     return new UserCollection(User::paginate());

        // } else {
        //     $users = User::where($queryItems)->paginate();
        //     return new UserCollection($users->appends($request->query()));
        // }
        $filter = new UsersFilter();
        $filterItems = $filter->transform($request);

        $includeComments = request()->query('includeComments');

        $users = User::where($filterItems);

        // $id=Auth::id();
        // // $user=User::find($id);
        // $usertest=User::where('id',$id)->first();

        if ($includeComments) {
            $users = $users->with('comments');
        }


        if (Auth::user()->is_admin == 1) {
            return new UserCollection($users->paginate()->appends($request->query()));
        }
        return $this->error('', 'You are not authorized to make this request', 403);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        return new UserResource(User::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // if (Auth::user()->id == $user->id || Auth::user()->is_admin == 1) {
            return new UserResource($user);
        // }
        // return $this->error('', 'You are not authorized to make this request', 403);
       
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        if (Auth::user()->id == $user->id || Auth::user()->is_admin == 1) {
            $user->update($request->all());
            return $this->success('', 'Request was successful.', 200);
        }
        return $this->error('', 'You are not authorized to make this request', 403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (Auth::user()->id == $user->id || Auth::user()->is_admin == 1) {
            Closure::create([
                'user_id' => $user->id
            ]);
            $user->delete();
            return $this->success('', 'Request was successful.', 200);
        }
        return $this->error('', 'You are not authorized to make this request', 403);
    }
}
