<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserGroupAssociateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_group_id' => $this-> user_group_id,
            'user_id' => $this-> user_id,
            'created' => Carbon::make($this->created_at)->format('Y-m-d')
        ];
    }
}
