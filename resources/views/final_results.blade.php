<x-main-layout pageTitle="Countries & Capitals Quiz">
    <div class="container">

        <div class="text-center fs-3 mb-3">
            <p class="text-info">FINAL RESULTS</p>
        </div>

        <div class="row fs-3">
            <div class="col text-end">Total Questions:</div>
            <div class="col text-info">{{ $total_questions }}</div>
        </div>
        <div class="row fs-3">
            <div class="col text-end">Correct Answers:</div>
            <div class="col text-success">{{ $correct_answers }}</div>
        </div>
        <div class="row fs-3">
            <div class="col text-end">Wrong Answers:</div>
            <div class="col text-danger">{{ $wrong_answers }}</div>
        </div>
        <div class="row fs-1">
            <div class="col text-end">Final Score:</div>
            <div class="col {{ $final_score > 50 ? 'text-success' : 'text-danger'}}">{{ $final_score }} %</div>
        </div>

    </div>

    <!-- home game -->
    <div class="text-center mt-5">
        <a href="{{ route('start_game')}}" class="btn btn-primary mt-3 px-5">BACK TO HOME</a>
    </div>
</x-main-layout>
