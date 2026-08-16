@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="text-center mb-4">{{ t('Vegetable Questions') }}</h2>
    @forelse($questions as $question)
        <div class="card mb-3 shadow-sm"><div class="card-body">
            <div><strong>{{ t('User') }}:</strong> {{ $question->user->name ?? '' }}</div>
            <div class="mt-3 p-3 bg-light rounded">{{ $question->question_text }}</div>
            <form action="{{ route('answers.store') }}" method="POST" class="mt-3">
                @csrf
                <input type="hidden" name="question_id" value="{{ $question->id }}">
                <textarea name="answer_text" class="form-control" rows="4" required placeholder="{{ t('Write your answer') }}"></textarea>
                <button class="btn btn-success mt-2">{{ t('Submit Answer') }}</button>
            </form>
        </div></div>
    @empty
        <div class="alert alert-info text-center">{{ t('No vegetable questions are available.') }}</div>
    @endforelse
</div>
@endsection
