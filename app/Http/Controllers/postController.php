<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\post;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Auth;

class postController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $post = Post::all();
       //$post = Post::Limit('1')->get();
       $post = Post::OrderBy('id','desc')->paginate(10);
        return view("posts.index")->with('posts',$post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
           'cover_image'=>'file|max:1999',
        ]);
        //Handle files upload
        if($request->hasFile('cover_image')){
            $filenameWithExt =$request->file('cover_image')->getClientOriginalName();

            $filename = pathinfo('$filenameWithExt', PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //file name to store
            $filenameTostore = $filename.'_'.time().'.'.$extension;
            //uploading image
            $path = $request->file('cover_image')->move('cover_images', $filenameTostore);

        }else{
            $filenameTostore = 'noimage.jpg';
        }
        
        //return 123;
        //create posts
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body'); 
        $post->user_id = auth()->user()->id;
        $post->cover_image=$filenameTostore;
        $post->save();
      
        return redirect('/post')->with('success','Post Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if(Auth()->user()->id != $post->user_id){
            return redirect('/post')-> with('error', 'Unathorized page');

        }
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
           'cover_image'=>'file|max:1999',
        ]);

        //Handle files upload
            if($request->hasFile('cover_image')){
                $filenameWithExt =$request->file('cover_image')->getClientOriginalName();

                $filename = pathinfo('$filenameWithExt', PATHINFO_FILENAME);
                $extension = $request->file('cover_image')->getClientOriginalExtension();
                //file name to store
                $filenameTostore = $filename.'_'.time().'.'.$extension;
                //uploading image
                $path = $request->file('cover_image')->move('cover_images', $filenameTostore);

            }

        $post = post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body'); 
        $post->user_id = Auth()->user()->id;
        if($request->hasFile('cover_image')){
            $post->cover_image = $filenameTostore;
        }
        $post->save();
        return redirect('/post')->with('success','Post Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = post::find($id);
        if(Auth()->user()->id != $post->user_id){
            return redirect('/post')-> with('error', 'Unathorized page');

        }

        if($post->cover_image != 'noimage.jpg'){
            // Delete image
            Storage::delete('/cover_images'.$post->cover_image);
        }
        $post->delete();
        return redirect('/post')->with('success','Post deleted!');
    }
}
