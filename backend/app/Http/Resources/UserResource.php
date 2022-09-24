<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'tel' => $this->tel,
            'email' => $this->email,
            'student' => [
                'full_name' => $this->student->first_name.' '.$this->student->last_name,
                'student_number' => $this->student->student_number,
                'classroom' => $this->student->classroom,
                'grade' => $this->student->grade
            ]
        ];
    }
}
