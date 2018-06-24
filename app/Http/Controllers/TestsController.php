<?php

namespace App\Http\Controllers;

use App\Actions\Tests\Store;
use App\Http\Requests\TestRequest;
use App\Http\Resources\QuestionsResource;
use App\Question;


class TestsController extends Controller
{

    public function index()
    {
        $questions = QuestionsResource::collection(Question::all())->collection;

        return view('tests.index', compact('questions'));
    }

    public function validateEmail(TestRequest $request)
    {
        return response()->json([]);
    }

    public function store(TestRequest $request)
    {
        return (new Store())->handle();
    }
}
