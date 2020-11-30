<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Input;
use App\Rules\CheckEqualsOne;
use App\News;
use App\Tags;
use File;
use Auth;
class AdminController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }
     public function index()
    {
        return view('news');   
        }
    public function Category(){
        return view('category');
    }
    public function storeCategory(Request $request){
        Category::create([
            'title'=> $request->input('title')
        ]);
        return redirect()->route('news');
    }
    public function store(Request $request)
    {

        $this->validate( $request, [
            'image' => 'required',
            'title' => 'required',
            'short_description' => ['required',new CheckEqualsOne],

        ]);
        if(Input::file("image")){
            $dp=public_path('images');
            $filename=uniqid().".jpg";
            $img=Input::file("image")->move($dp, $filename);
        }

        $news = News::create([
            'user_id'=> Auth::user()->id,
            'category_id'=> $request->input('category_id'),
            'title'=> $request->input('title'),
            'description'=> $request->input('description'),
            'short_description'=> $request->input('short_description'),
            'image'=> $filename,
            'add_date'=> $request->input('add_date'),
        ])->id;

        // return Category::create([
        //  'title'=>'title1'
        // ])->id;
        $data = $request->input('tags');
        foreach ($data as $d) {
            Tags::create([
                'news_id'=>$news,
                'name'=>$d
            ]);
        }

        return view('savenews');
    	
    }
    public function delete(Request $request)    {
        News::where("id", $request->input("id"))->delete();
        return redirect()->route('savenews');
    }
    public function edit($id )
    {
        $News=News::where("id",$id)->firstOrFail();
        return view("editnews",["News"=>$News]);

    }
     public function update(Request $request)
    {
        News::where("id",$request->input("id"))->update([
            "title"=>$request->input("title"),
            "description"=>$request->input("description")
            ]);
        return redirect()->route('savenews');    
    }
}

