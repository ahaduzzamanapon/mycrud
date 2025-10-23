<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function showPromotion(Promotion $promotion)
    {
        return view('promotion_details', compact('promotion'));
    }
}