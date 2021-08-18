<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use Throwable;

class ApiController extends Controller
{
    public function index()
    {

        try {
            $questions = Question::all();

            return response($questions, 200)
                ->header('Content-Type', 'application/json');
        } catch (Throwable $e) {
            return response([
                "status" => 500,
                "message" => $e
            ], 500)
                ->header('Content-Type', 'application/json');
        }
    }
}
