<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\CalculationMultiplyRequest;
use App\Classes\ArrayCalculation;
use App\Classes\CharConversion;

class CalculationController extends Controller
{
    /**
     * Multiply the post variables
     * and return result
     *
     * @return \Illuminate\Http\Response
     */
    public function multiply(CalculationMultiplyRequest $request, CharConversion $charConversion, ArrayCalculation $arrayCalculation)
    {
        $numbers = $charConversion->arrayToNumbers($request->values);
        $sum = $arrayCalculation->multiply($numbers);
        $sumInChar = $charConversion->numberToLetters($sum);

        return response()->json([
            'sum' => $sumInChar
        ], 200);
    }
}
