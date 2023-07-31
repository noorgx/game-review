<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Game $game)
    {
        return view('games.reviews.create', ['game' => $game]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Game $game)
    {
        $data = $request->validate([
            'name'=>'required|min:3',
            'review' => 'required|min:15',
            'rating' => 'required|min:1|max:5|integer'
        ]);

        $game->reviews()->create($data);

        return redirect()->route('games.show', $game);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
