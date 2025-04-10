<x-main-layout pageTitle="Countries & Capitals Quiz">
<div class="container">

    <x-question :country="$country" :currentQuestion="$current_question"  :totalQuestions="$total_questions" />

    <div class="row">

        @foreach ($answers as $answer)
            <x-answer :capital="$answer"/>
        @endforeach

    </div>

</div>

<!-- cancel game -->
<div class="text-center mt-5">
    <a href="{{ route('start_game')}}" class="btn btn-outline-danger mt-3 px-5">CANCEL GAME</a>
</div>
</x-main-layout>
