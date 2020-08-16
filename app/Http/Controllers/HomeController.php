<?php

namespace App\Http\Controllers;

use App\Articel;
use App\category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function ShowHome(){
        $categories=category::where('visibility_status','visible')->get();
        $latestArticel=Articel::orderBy('created_at','desc')
            ->where('visibility_status','visible')
            ->limit(3)
            ->get();
        return view('website.home',['categories'=>$categories,'latestArticel'=>$latestArticel]);
    }


    public function ShowArticel($id){
        $articel=Articel::find($id);
        $categories=category::where('visibility_status','visible')->get();
        return view('website.news_de',['categories'=>$categories,'articel'=>$articel]);
    }
    public function ShowCategoryArticel($id){
        $categories=category::where('visibility_status','visible')->get();
        $category=category::with(['articels'=>function($query){
            $query->where('visibility_status','visible');
        }])->find($id);
        return view('website.all_news',['categories'=>$categories,'category'=>$category]);


    }
}


