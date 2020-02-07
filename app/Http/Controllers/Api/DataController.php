<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\About;
use App\Category;
use App\Article;

class DataController extends Controller
{
    // about
    public function get_about(){
        $about = About::all();
        return response()->json([
            'message'   => 'Success',
            'status'    => 200,
            'data'      => $about,
        ], 200);
    }

    // all category
    public function get_categories(){
        $categories = Category::all();
        return response()->json([
            'message'   => 'Success',
            'status'    => 200,
            'data'      => $categories,
        ], 200);
    }

    // category by id
    public function get_category_by_id($id){
        $category = Category::find($id);
        if($category){
            return response()->json([
                'message'   => 'Success',
                'status'    => 200,
                'data'      => $category,
            ], 200);
        }else{
            return response()->json([
                'message'   => 'Data Not Found',
                'status'    => 404,
                'Data'      => [],
            ], 404);
        }
    }

    // all article
    public function get_all_articles(Request $request) {
        $keyword  = $request->get('s') ? $request->get('s') : '';
        $category = $request->get('c') ? $request->get('c') : '';

        $articles = \App\Article::with('categories')
                                    ->whereHas('categories', function($q) use($category){
                                        $q->where('name', 'LIKE', "%$category%");
                                    })
                                    ->where('status', 'PUBLISH')
                                    ->where('title', 'LIKE', "%$keyword%")
                                    ->paginate(10);

        return response()->json([
            'message'   => 'Success',
            'status'    => 200,
            'data'      => $articles,
        ], 200);
    }

    // article by id
    public function get_article_by_id($id){
        $article = Article::find($id);
        if($article){
            return response()->json([
                'message'   => 'Success',
                'status'    => 200,
                'data'      => $article,
            ], 200);
        }else{
            return response()->json([
                'message'   => 'Data Not Found',
                'status'    => 404,
                'data'      => [],
            ], 200);
        }
    }

    // article by category name
    public function get_article_by_category_name($category){
        $articles = \App\Article::with('categories')
                                    ->whereHas('categories', function($q) use($category){
                                        $q->where('name', 'LIKE', "%$category%"); })
                                    ->paginate(10);
        if($articles){
            return response()->json([
                'message'   => 'Success',
                'status'    => 200,
                'data'      => $articles,
            ], 200);
        }else{
            return response()->json([
                'message'   => 'Data Not Found',
                'status'    => 404,
                'data'      => [],
            ], 200);
        }
        
    }

}
