<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function store(ArticleRequest $request)
    {
        $article_id = $request['article_id'];

        if($article_id) {
            $article = Article::find($article_id);
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
        } else {
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
        }

        return redirect()->to('home');
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();

        return response()->json(200);
    }
}
