<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateAssociateToGroupRequest;
use App\Http\Resources\UserGroupAssociateResource;
use App\Models\UserGroupAssociate;

class UserControllerAssociateToGroup extends Controller
{
    public function index()
    {
        $userGroups = UserGroupAssociate::all();
        return UserGroupAssociateResource::collection($userGroups);
    }

    public function store(StoreUpdateAssociateToGroupRequest $request)
    {
        $data = $request->validated();
        $userGroupAssociate = UserGroupAssociate::create($data);
        return new UserGroupAssociateResource($userGroupAssociate);
    }
}
