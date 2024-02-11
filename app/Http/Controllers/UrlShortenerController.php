<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UrlShortener;
use Illuminate\Support\Facades\Auth;


class UrlShortenerController extends Controller
{
    

    public function shorten(Request $request)
    {
        $request->validate([
            'original_url' => 'required|url',
        ]);

        $originalUrl = $request->input('original_url');
        $shortCode = $this->generateShortCode();
        $userId = Auth::id();

   
        UrlShortener::create([
            'original_url' => $originalUrl,
            'short_code' => $shortCode,
            'user_id' => $userId,
            
        ]);

        $shortUrl = route('redirect', ['shortCode' => $shortCode]);

         return redirect()->route('dashboard')->with('success', 'URL shortend Successfully');
    }
     public function redirect($shortCode)
    {
        $urlShortener = UrlShortener::where('short_code', $shortCode)->first();

        if ($urlShortener) {
            // Increment the click count
            $urlShortener->increment('click_count');

            return redirect($urlShortener->original_url);
        } else {
            return abort(404);
        }
    }
    public function count_click ()
    {
         $userId = Auth::id();
         $urlShorteners = UrlShortener::where('user_id','=',$userId)->orderByDesc('id')->get();

        return view('count_click', compact('urlShorteners'));
    }
   

   private function generateShortCode()
{
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $length = 8;
    $shortCode = '';

    for ($i = 0; $i < $length; $i++) {
        $shortCode .= $characters[random_int(0, strlen($characters) - 1)];
    }

    return $shortCode;
}
}