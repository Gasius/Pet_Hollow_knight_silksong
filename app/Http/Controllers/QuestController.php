<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use App\Models\Quest;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class QuestController extends Controller
{
    public function index()
    {
        $quests = Quest::latest();

        return inertia('Home/Index', [
            'quest' => $quests,
        ]);
    }

    public function create()
    {
        return inertia('Games/Create');
    }

    public function store(StoreGameRequest $request)
    {
        Quest::create($request->validated());
        return redirect()->route('games.index')->with('success', 'Игра успешно добавлена!');
    }

    public function show(Quest $game)
    {
        return inertia('Home/Game', ['game' => $game]);
    }

    public function edit(Quest $game)
    {
        return inertia('Games/Edit', ['game' => $game]);
    }

    public function update(UpdateGameRequest $request, Quest $game)
    {
        $game->update($request->validated());
        return redirect()->route('games.index');
    }

    public function destroy(Quest $game)
    {
        $game->delete();
        return redirect()->route('games.index');
    }
}

