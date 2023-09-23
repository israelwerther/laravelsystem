<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();
        return UserResource::collection($users);
    }

    public function store(StoreUpdateUserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($request->password);
        $user = User::create($data);
        return new UserResource($user);
    }

    public function show(string $id) 
    {
        try {
            $user = User::find($id);
            return new UserResource($user);
        } catch (ModelNotFoundException) {
            return response()->json(['error' => 'Usuário não encontrado'], 404);
        }
    }

    public function update(StoreUpdateUserRequest $request, string $id)
    {
        $user = User::findOrFail($id);

        $data = $request->all();

        if ($request->password)
            $data['password'] = bcrypt($request->password);
        
        $user->update($data);

        return new UserResource($user);
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json([], Response::HTTP_NO_CONTENT);
    }

}
