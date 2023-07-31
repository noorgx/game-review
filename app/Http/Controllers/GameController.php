<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $title = $request->input('title');
        $filter = $request->input('filter', '');

        $games = Game::when(
            $title,
            fn($query, $title) => $query->search($title)
        );


        $games = match ($filter) {
            'hot' => $games->hot(),
            'low_pc' => $games->lowPc(),
            'low_space_pc' => $games->lowSpace(),
            'low_end_pc' => $games->lowEndPC(),
            default => $games->top()
        };


        return view('games.index',['games'=>$games->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        return view('games.show',['game'=>$game]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
