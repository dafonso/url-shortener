<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShortUrlRequest;
use App\Http\Resources\ShortUrlResource;
use App\Models\ShortUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShortUrlController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $this->validator($request->all())->validate();

        $shortUrl = new ShortUrl($validatedData);
        $shortUrl->code = Str::random(6);
        $shortUrl->access_token = Str::uuid();
        $shortUrl->clicks = 0;
        $shortUrl->save();

        return new ShortUrlResource($shortUrl);
    }

    protected function validator(array $data)
    {
        return \Validator::make($data, [
            'target_url' => 'required|url'
        ]);
    }

    /**
     * Return the specified resource by access token.
     *
     * @param  string  $accessToken
     * @return \Illuminate\Http\Response
     */
    public function show(string $accessToken)
    {
        return new ShortUrlResource(ShortUrl::whereAccessToken($accessToken)->firstOrFail());
    }
}
