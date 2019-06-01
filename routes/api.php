<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('user/register', 'APIRegisterController@register');

Route::post('user/login', 'APILoginController@login');

Route::middleware('jwt.auth')->group(function () {
    Route::get('users', function (Request $request) {
        return auth()->user();
    });

    Route::get('content', 'ContentController@indexForApi');

    Route::get('content/{id}', 'ContentController@show');

    Route::get('favoritos', function () {
        $userId = auth()->user()->id;
        $favoritosContentIds = App\Favorite::select('content_id')->where('user_id', $userId)->get();
        $contents = App\Content::whereIn('id', $favoritosContentIds)->get();
        return App\Http\Resources\Content::collection($contents);
    });

    Route::delete('favorito/{id}', function ($id) {
        $userId = auth()->user()->id;
        $favorito = \App\Favorite::where('user_id', $userId)->where('content_id', $id)->first();
        $favorito->delete();
        return response()->json(true, 200);
    });

    Route::put('favorito/{id}', function ($id) {
        $userId = auth()->user()->id;
        \App\Favorite::firstOrCreate(['user_id' => $userId, 'content_id' => $id]);
        return response()->json(true, 200);
    });
});

Route::get('pools', function () {
    $pools = \App\Pool::all();
    return \App\Http\Resources\Pool::collection($pools);
});
