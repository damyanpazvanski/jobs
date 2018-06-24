<?php

namespace App\Console\Commands;

use App\Answer;
use App\Question;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AddQuestions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'questions:populate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add all of the questions';

    /**
     * AddQuestions constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('------------------------- START ADDING -------------------------');

        if (Question::count()) {
            $this->info('------------------------- START ADDING -------------------------');

        }

        $path = Storage::disk('questions')->getDriver()->getAdapter()->getPathPrefix();
        $directories = Storage::disk('questions')->allDirectories();

        foreach ($directories as $directory) {
            $files = Storage::disk('questions')->files($directory);

            $answers = [];
            $question = null;
            $correctAnswer = null;

            $question = $this->addQestion($path . $directory . '/iq-questions.gif');

            foreach ($files as $file) {
                if ($directory . '/answer.gif' === $file) {
                    $correctAnswer = $this->addAnswer($path . $file, $question);
                    $answers[] = $correctAnswer;
                    continue;
                } else if ($directory . '/iq-questions.gif' === $file) {
                    continue;
                }

                $answer = $this->addAnswer($path . $file, $question->id);
                $answers[] = $answer;
            }

            $this->updateQuestion($question, $correctAnswer, $answers);
        }

        $this->info('------------------------- FINISHED -------------------------');
    }

    private function addQestion($pathToImage)
    {
        $questionImage = File::get($pathToImage);

        return Question::create([
            'image' => base64_encode($questionImage)
        ]);
    }

    private function updateQuestion($question, $correctAnswer, $answers)
    {
        $question->answer1()->associate($answers[0]);
        $question->answer2()->associate($answers[1]);
        $question->answer3()->associate($answers[2]);
        $question->answer4()->associate($answers[3]);
        $question->corectAnswer()->associate($correctAnswer);
        $question->save();
    }

    private function addAnswer($pathToImage, $question)
    {
        $answerImage = File::get($pathToImage);

        $answer = new Answer([
            'image' => base64_encode($answerImage)
        ]);

        $answer->question()->associate($question);
        $answer->save();

        return $answer;
    }
}
