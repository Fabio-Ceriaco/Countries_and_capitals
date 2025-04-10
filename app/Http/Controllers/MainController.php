<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{
    private $app_data;

    public function __construct()
    {
        // loada app_data.php file from app folder
        $this->app_data = require(app_path('app_data.php'));
    }

    public function startGame(): View
    {
        return view('home');
    }

    public function prepareGame(Request $request)
    {
        //validate request
        $request->validate(

            [
                'total_questions' => ['required', 'integer', 'min:3', 'max:30'],
            ],
            [
                'total_questions.required' => 'The questions number is required.',
                'total_questions.integer' => 'The questions number should be an integer.',
                'total_questions.min' => 'Should be a minimum of :min questions.',
                'total_questions.max' => 'Should be a maximum of :max questions.',
            ]

        );

        // get total questions

        $total_questions = intval($request->input('total_questions'));

        // prepare all the quiz structure

        $quiz = $this->prepareQuiz($total_questions);

        // store quiz in session

        session([
            'quiz' => $quiz,
            'total_questions' => $total_questions,
            'current_question' => 1,
            'correct_answers' => 0,
            'wrong_answers' => 0,
        ]);

        return redirect()->route('game');
    }

    private function prepareQuiz($total_questions): array
    {

        $questions = [];

        $total_countries = count($this->app_data);



        // create countries index for unique questions

        $indexes = range(0, $total_countries - 1);

        shuffle($indexes);

        $indexes = array_slice($indexes, 0, $total_questions);

        // create array of questions
        $question_number = 1;
        foreach ($indexes as $index) {

            $question['question_number'] = $question_number++;
            $question['country'] = $this->app_data[$index]['country'];
            $question['correct_answer'] = $this->app_data[$index]['capital'];

            // wrong answers
            $other_capitals = array_column($this->app_data, 'capital');

            // remove correct answer

            $other_capitals = array_diff($other_capitals, [$question['correct_answer']]);

            //shuffle the wrong answer

            shuffle($other_capitals);

            $question['wrong_answers'] = array_slice($other_capitals, 0, 3);

            // store answer result
            $question['correct'] = null;

            $questions[] = $question;
        };

        return $questions;
    }

    public function game(): View
    {

        $quiz = session('quiz');
        $total_questions = session('total_questions');
        $current_question = session('current_question') - 1;

        // prepare answers to show in view
        $answers = $quiz[$current_question]['wrong_answers'];
        $answers[] = $quiz[$current_question]['correct_answer'];

        shuffle($answers);



        return view('game', [
            'country' => $quiz[$current_question]['country'],
            'total_questions' => $total_questions,
            'current_question' => $current_question,
            'answers' => $answers,
        ]);
    }
}
