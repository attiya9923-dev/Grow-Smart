@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">{{ t('Review User Questions') }}: {{ $user->name }}</h2>
    @forelse($questions as $question)
        <div class="card mb-3 shadow-sm"><div class="card-body">
            <div class="mb-3"><strong>{{ t('Category') }}:</strong> {{ ucfirst($question->category) }}</div>
            <div class="p-3 bg-light rounded mb-3">{{ $question->question_text }}</div>
            <div class="d-flex gap-2">
                <form action="{{ route('admin.question.approve') }}" method="POST">@csrf<input type="hidden" name="question_id" value="{{ $question->id }}"><button class="btn btn-success">{{ t('Approve') }}</button></form>
                <form action="{{ route('admin.question.reject') }}" method="POST">@csrf<input type="hidden" name="question_id" value="{{ $question->id }}"><button class="btn btn-danger">{{ t('Reject') }}</button></form>
            </div>
        </div></div>
    @empty
        <div class="alert alert-info">{{ t('No pending questions are available.') }}</div>
    @endforelse
</div>
@endsection
