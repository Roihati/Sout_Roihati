<?php

namespace App\Http\Controllers\client;
use App\models\Feedback;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class FeedbackController extends Controller
{
    public function create()
    {
        return view('client.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
        ]);
        
        Feedback::create([
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'rating' => $request->rating,
        ]);

        return redirect()->back()->with('success', 'Thank you for your feedback!');
    }

    public function index()
    {
        $feedbacks = Feedback::with('user')->get();

        return view('client.index', compact('feedbacks'));
    }
}