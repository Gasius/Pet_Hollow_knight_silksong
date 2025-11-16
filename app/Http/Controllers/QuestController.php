<?php

namespace App\Http\Controllers;


use App\Models\Quest;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class QuestController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if(!$user) {
            return inertia('Home/Index', [
                'quest' => null,
            ]);
        }

        $CompletedQuestIds = $user->completedQuests()->pluck('quests.id');
        $firstUncompletedQuest = Quest::whereNotIn('id', $CompletedQuestIds)
            ->orderBy('id', 'asc')
            ->first();

        return inertia('Home/Index', [
            'quest' => $firstUncompletedQuest,
        ]);
    }
    public function show(Quest $quest)
    {
        $quest->load(['slides' => function ($query) {
            $query->orderBy('slide_number', 'asc');
        }]);

        return inertia('Home/Show', [
            'quest' => $quest,
        ]);
    }
}

