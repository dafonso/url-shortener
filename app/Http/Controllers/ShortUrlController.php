<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use Illuminate\Http\Request;

class ShortUrlController extends Controller
{
    /**
     * Redirect requested short url to target url, 404 if not found.
     *
     * @param Request $request
     * @param string $code
     * @return \Illuminate\Http\Response
     */
    public function redirect(Request $request, string $code) {
        $shortUrl = ShortUrl::whereCode($code)->firstOrFail();
        $shortUrl->increment('clicks');
        return redirect($shortUrl->target_url);
    }
}
