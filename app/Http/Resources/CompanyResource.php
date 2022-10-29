<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'logo' => $this->logo,
            'name' => $this->name,
            'email' => $this->email,
            'website' => $this->website,
            // 'employees_count' => $this->employees_count,
            // 'employees' => CompanyEmployeeResource::collection($this->employees),
        ];
    }
}