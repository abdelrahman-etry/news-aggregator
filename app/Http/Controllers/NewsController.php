<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller{
    public function index(Request $request){
        $query  =   News::query();

        if($request->has('category')){
            $query->where('category', $request->category);
        }

        if($request->has('source')){
            $query->where('source', $request->source);
        }
        
        if($request->has('date')){
            $query->whereDate('published_at', $request->date);
        }

        return response()->json($query->paginate(10));
    }

    public function search(Request $request){
        $request->validate([
            'category'  =>  'string|nullable',
            'source'    =>  'string|nullable',
            'date'      =>  'date|nullable'
        ]);

        return response()->json(
            News::where('title', 'LIKE', "%{$request->q}%")->get()
        );
    }
}
