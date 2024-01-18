<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $article_edit   = $data['article_edit'] = $request['article_edit'];
        $article_id     = $request['article_id'];
        
        if($article_edit) {
            $data['article']  = Article::find($article_id);
            $data['articles'] = Article::where('id', '!=', $article_id)->latest()->get();
        } else {
            $data['articles'] = Article::latest()->get();
        }

        return view('home', $data);
    }
}
