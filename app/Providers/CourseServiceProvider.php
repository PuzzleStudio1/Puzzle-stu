<?php

namespace App\Providers;

use App\Absence;
use App\Question;
use Illuminate\Support\ServiceProvider;

class CourseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $absences = Absence::all();
        foreach ($absences as $absence) {
            if ($absence->created_at->diffInDays(now()) > 30) {
                $absence->delete();
            }
        }

        $questions = Question::all();
        foreach ($questions as $question) {
            if ($question->created_at->diffInDays(now()) >30) {
                $question->delete();
            }
        }
    }
}
