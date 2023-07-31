@extends('layouts.app')

@section('content')
    <div class="mb-4">
        <h1 class="mb-2 text-2xl">{{ $game->title }}</h1>

        <div class="game-info">
            <div class="game-dis mb-4 text-lg font-semibold">by {{ $game->description }}</div>
            <div class="game-rating flex items-center">
                <span class="game-review-count text-sm text-green-500">
          {{ $game->reviews_count }} {{ Str::plural('review', $game->reviews_count) }}
        </span>
            </div>
        </div>
    </div>

    <div class="mb-4">
        <a href="{{ route('games.reviews.create', $game) }}" class="reset-link">
            Add a review!</a>
    </div>

    <div>
        <h2 class="mb-4 text-xl font-semibold">Reviews</h2>
        <ul>
            @forelse ($game->reviews->sortByDesc('created_at') as $review)
                <li class="game-item mb-4">
                    <div>
                        <div class="mb-2 flex items-center justify-between">

                            <div class="game-review-count">
                                {{ $review->created_at->format('M j, Y') }}</div>
                        </div>
                        <p class="text-green-700">{{ $review->review }}</p>
                    </div>
                </li>
            @empty
                <li class="mb-4">
                    <div class="empty-game-item">
                        <p class="empty-text text-lg font-semibold">No reviews yet</p>
                    </div>
                </li>
            @endforelse
        </ul>
    </div>
@endsection
