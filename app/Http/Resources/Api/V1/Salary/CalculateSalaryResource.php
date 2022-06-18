<?php

namespace App\Http\Resources\Api\V1\Salary;

use Illuminate\Http\Resources\Json\JsonResource;

class CalculateSalaryResource extends JsonResource
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
            'base_salary'=>$this['base_salary'],
            'worked_days'=>$this['worked_days'],
            'sales_value'=>$this['sales_value'],
            'calculated_salary'=>$this['calculated_salary'],
            'commissions_earned' => $this['commissions_earned'],
            'proration_percentage' => $this['proration_percentage'],
        ];
    }
}
