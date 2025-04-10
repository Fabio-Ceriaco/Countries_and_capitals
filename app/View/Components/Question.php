<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Question extends Component
{
    /**
     * Create a new component instance.
     */

    public string $country;
    public string $totalQuestions;
    public string $currentQuestion;
    public function __construct($country, $totalQuestions, $currentQuestion)
    {

        $this->country = $country;
        $this->totalQuestions = $totalQuestions;
        $this->currentQuestion = $currentQuestion;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.question');
    }
}
