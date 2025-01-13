<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class AdminViewReviewController extends Controller
{
    //
    public function index()
    {
        $reviews = Review::latest()->paginate(5);
        return view('viewreview', compact('reviews'));
    }

    public function search(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $reviews = Review::whereBetween('review_date', [$startDate, $endDate])->latest()->paginate(5);
        return view('viewreview', compact('reviews'));
    }
}
