<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\User;
use App\Posts;
use App\Comments;
use App\Projects;
use App\UsersProjects;
use Auth;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("inputproduct");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        products::create([
            "user_id"=>Auth::user()->id,
            "title"=>$request->input("title"),
            "description"=>$request->input("description")
        ]);
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products=Products::get();
        return view("home",["title"=>$title , "description"=>$description]);    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id )
    {
        $Products=Products::where("id",$id)->firstOrFail();
        return view("edit",["Products"=>$Products]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // return $request->post();    
        Products::where("id",$request->input("id"))->update([
            "title"=>$request->input("title"),
            "description"=>$request->input("description")
            ]);
        return redirect()->route('home');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function delete(Request $request)    {
        Products::where("id", $request->input("id"))->delete();
        return redirect()->back();
    }
    public function get_phone(){
        return User::with(['phone'])->first()['phone'];
    }
    public function PostsWithComments(){
        // return Comments::join('posts', 'post_id', 'posts.id')->get();
        // return Comments::with(['Posts'])->first();
        return Posts::withCount(['comments'])->first();
    }

    public function CommentsWithPosts(){
        // return Posts::join('comments','title')->get();
        return Comments::with(['posts'])->get();
    }
    public function get_usersProjects()
    {
        return Projects::with('UsersProjects')->get();
    }
}