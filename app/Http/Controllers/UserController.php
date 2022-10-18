<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Traits\ApiResponser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use ApiResponser;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Return users list
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return $this->validResponse($users);
    }

    /**
     * Create an instance of User
     * @return Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

        $fields = $request->all();
        $fields['password'] = Hash::make($request->password);

        $user = User::create($fields);

        return $this->validResponse($user, Response::HTTP_CREATED);
    }

    /**
     * Return an specific user
     * @return Illuminate\Http\Response
     */
    public function show($user)
    {
        $user = User::findOrFail($user);

        return $this->validResponse($user);
    }

    /**
     * Update the information of an existing user
     * @return Illuminate\Http\Response
     */
    public function update(UserRequest $request, $user)
    {

        $user = User::findOrFail($user);

        $user->fill($request->all());

        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($user->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $user->save();

        return $this->validResponse($user);
    }

    /**
     * Removes an existing user
     * @return Illuminate\Http\Response
     */
    public function destroy($user)
    {
        $user = User::findOrFail($user);

        $user->delete();

        return $this->validResponse($user);
    }

    /**
     * Identifies the curren user
     * @return Illuminate\Http\Response
     */
    public function me(Request $request)
    {
        return $this->validResponse($request->user());
    }
}
