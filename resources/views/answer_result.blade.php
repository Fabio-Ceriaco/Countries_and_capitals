<x-main-layout pageTitle="Countries & Capitals Quiz">
    <div class="container">

        <x-question :country="$country" :currentQuestion="$current_question"  :totalQuestions="$total_questions" />

        <div class="text-center fs-3 mb-3">
            Correct Answer: <span class="text-info">{{ $correct_answer }}</span>
        </div>

        <div class="text-center fs-3 mb-3">
            Your Answer: <span class="[conditional]">{{ $choice_answer }}</span>
        </div>

    </div>

    <!-- cancel game -->
    <div class="text-center mt-5">
        <a href="{{ route('next_question') }}" class="btn btn-primary mt-3 px-5">FORWARD</a>
    </div>
</x-main-layout>
