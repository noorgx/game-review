@extends('layouts.app')

@section('content')

    <h1 class="mb-10 text-2xl">Games</h1>

    <form method="GET" action="{{ route('games.index') }}" class="mb-4 flex items-center space-x-2">
        <input type="text" name="title" placeholder="Search by title"
               value="{{ request('title') }}" class="input h-10" />
        <button type="submit" class="btn h-10">Search</button>
        <a href="{{ route('games.index') }}" class="btn h-10">Clear</a>
    </form>


    <div class="filter-container mb-4 flex">
        @php
            $filters = [
                '' => 'Top',
                'hot' => 'Hot',
                'low_pc' => 'Low Pc',
                'low_space_pc' => 'Low Space Pc',
                'low_end_pc' => 'Low End Pc',
            ];
        @endphp

        @foreach ($filters as $key => $label)
            <a href="{{ route('games.index', [...request()->query(), 'filter' => $key]) }}"
               class="{{ request('filter') === $key || (request('filter') === null && $key === '') ? 'filter-item-active' : 'filter-item' }}">
                {{ $label }}
            </a>
        @endforeach
    </div>




    @forelse ($games as $game)
        <li class="mb-4">
            <div class="game-item">
                <div
                    class="flex flex-wrap items-center justify-between">
                    <div class="w-full flex-grow sm:w-auto">
                        <a href="{{ route('games.show', $game) }}" class="game-title">{{ $game->title }}</a>
                        <span class="game-dis">by {{ $game->description }}</span>
                    </div>
                    <div>

                        <div class="game-review-count">
                            out of {{ $game->reviews_count }} {{ Str::plural('review', $game->reviews_count) }}
                        </div>
                    </div>
                </div>
            </div>
        </li>
    @empty
        <li class="mb-4">
            <div class="empty-game-item">
                <p class="empty-text">No games found</p>
                <a href="{{ route('games.index') }}" class="reset-link">Reset criteria</a>
            </div>
        </li>
    @endforelse

{{ $games->links() }}
@endsection





