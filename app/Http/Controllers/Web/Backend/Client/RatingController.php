<?php

namespace App\Http\Controllers\Web\Backend\Client;

use App\Models\Rating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|max:1000',
            'rated_item_id' => 'required|integer',
            'rated_item_type' => 'required|string', 
        ]);

        // Check if the user already has a rating for the item
        $existingRating = Rating::where('user_id', Auth::id())
            ->where('rated_item_id', $request->rated_item_id)
            ->where('rated_item_type', $request->rated_item_type)
            ->first();

        if (is_null($existingRating)) {
            // Create a new rating
            Rating::create([
                'user_id' => Auth::id(),
                'rated_item_id' => $request->rated_item_id,
                'rated_item_type' => $request->rated_item_type,
                'rating' => $request->rating,
                'review' => $request->review,
            ]);
        } else {
            // Update existing rating
            $existingRating->update([
                'rating' => $request->rating,
                'review' => $request->review,
            ]);
        }

        return redirect()->back()->with('success', 'Rating added successfully');
    }

}
