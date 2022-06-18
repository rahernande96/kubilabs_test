<?php

namespace App\Http\Controllers\Api\V1\Salary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\V1\Salary\CalculateSalaryRequest;
use App\Http\Resources\Api\V1\Salary\CalculateSalaryResource;
use App\Custom\CalculateSalary\CalculateSalary;

class SalaryController extends Controller
{
    public function index(CalculateSalaryRequest $request)
    {
        $data = $request->all();

        $result = (new CalculateSalary($data))->calculate()->getData();
        
        return response()->json(
            new CalculateSalaryResource($result),
            200
        );
    }
}
