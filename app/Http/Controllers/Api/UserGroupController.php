<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateUserGroupRequest;
use App\Http\Resources\UserGroupResource;
use App\Models\UserGroup;
use Illuminate\Http\Response;

class UserGroupController extends Controller
{
    public function index()
    {
        $userGroups = UserGroup::all();
        return UserGroupResource::collection($userGroups);
    }
    

    public function store(StoreUpdateUserGroupRequest $request)
    {
        $data = $request->validated();
        $userGroup = UserGroup::create($data);
        return new UserGroupResource($userGroup);
    }

    public function show($id)
    {        
        $userGroup = UserGroup::findOrFail($id);
        return new UserGroupResource($userGroup);
    }

    public function update(StoreUpdateUserGroupRequest $request, $id)
    {
        $userGroup = UserGroup::findOrFail($id);
        $userGroup->update($request->all());
        return $userGroup;
    }

    public function destroy(string $id)
    {
        $userGroup = UserGroup::findOrFail($id);
        $userGroup->delete();

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
