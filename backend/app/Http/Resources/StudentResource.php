<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'full_name' => $this->first_name.' '.$this->last_name,
            'student_number' => $this->student_number,
            'classroom' => $this->classroom,
            'grade' => $this->grade,
            'parent' => [
                'full_name' => $this->user ? $this->user->first_name.' '.$this->user->last_name : null
            ]
        ];
    }
}
