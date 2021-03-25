<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Requests\User\UserLoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Attempt user login
     *
     * @param UserLoginRequest $request
     * @return \Illuminate\Http\Response
     */
    public function login(UserLoginRequest $request)
    {
        $user = User::where('username', $request->username)->firstOrFail();

        $user->tokens()->delete();

        if (Hash::check($request->password, $user->password)) {
            $token = $user->createToken('token-name');

            return response([
                'data' => [
                    'token' => $token->plainTextToken,
                    'user' => new UserResource($user)
                ]
            ]);
        }

        return response(['message' => 'The provided credentials are incorrect'], 401);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserResource::collection(User::where('id', '!=', auth()->user()->id)
            ->where('username', '!=', 'super_admin')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);

        $user->assignRole($request->role);

        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update([
            'username' => $request->username ? $request->username : $user->username,
            'password' => $request->password ? Hash::make($request->password) : $user->password
        ]);

        if ($request->role) {
            $user->removeRole($user->getRoleNames()[0]);
            $user->assignRole($request->role);
        }

        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response('', 205);
    }

    public function me()
    {
        return new UserResource(auth()->user());
    }
}
