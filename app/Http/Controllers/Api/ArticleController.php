<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $data['articles'] = Article::latest()->get();
        return response()->json($data, 200);
    }

    public function store(ArticleRequest $request)
    {
        $article = new Article();
        $article->title     = $request['title'];
        $article->content   = $request['content'];
        $article->user_id   = auth()->user()->id;
        
        if ($request->file('feature_photo')) {
            $file       = $request->file('feature_photo');
            $filename   = time();
            $extension  = $file->getClientOriginalExtension();
            $fullpath   = 'uploads/articles/';
            $file->storeAs($fullpath, $filename.'.'.$extension, 'public');
            $article->feature_photo = $fullpath.$filename.'.'.$extension;
        }

        $article->save();

        $data['statusCode'] = 200;
        $data['message']    = 'Article has been created';

        return response()->json($data);
    }

    public function update(ArticleRequest $request, $id)
    {
        $article = Article::find($id);
        $article->title     = $request['title'];
        $article->content   = $request['content'];
        
        if ($request->file('feature_photo')) {
            $file       = $request->file('feature_photo');
            $filename   = time();
            $extension  = $file->getClientOriginalExtension();
            $fullpath   = 'uploads/articles/';
            $file->storeAs($fullpath, $filename.'.'.$extension, 'public');
            $article->feature_photo = $fullpath.$filename.'.'.$extension;
        }

        $article->save();

        $data['statusCode'] = 200;
        $data['message']    = 'Article has been updated';

        return response()->json($data);
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();

        $data['statusCode'] = 200;
        $data['message']    = 'Article has been deleted';
        return response()->json($data);
    }
}
