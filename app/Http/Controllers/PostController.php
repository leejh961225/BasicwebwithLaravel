<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Request 를 statically 사용하기 위해 위 경로 Request 클래스를 지워야함 
//use Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use DB;



class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['expect' => ['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function index(Request $request)
    {
        //$posts = Post::where('title','Post Two')->get();
        //$posts = Post::orderBy('title','desc')->take(1)->get();
        //$posts = Post::all();
        //$posts = DB::select('SELECT * FROM posts');
        
      
        
        //$search_word  = Request::get('search_word');
        //return $search_word;
        //Cannot use like this, need to be redirected to Request class
        
        $search_key = $request->input('search_key');
        $search_word = $request->input('search_word');
        
        switch ($search_key) {
            case 1:
                 //filter by 글제목
            $posts = Post::where('title', 'LIKE','%' . $search_word . '%')
            ->orderBy('created_at','desc')
            ->paginate(5);
            //return $posts;
            return view('posts.index')->with('posts',$posts);

            break;
            
            case 2:
                 //filter by 글내용
                 $posts = Post::where('body', 'LIKE','%' . $search_word . '%')
                 ->orderBy('created_at','desc')
                 ->paginate(5);
                 //return $posts;
                 return view('posts.index')->with('posts',$posts);

            break;

            case 3:
                //filter by 글쓴이
            //table users join to table posts using users.id and posts.user_id in order to get the name of user using posts.user_id
            $posts = Post::join('users', 'users.id','=','posts.user_id')
            //indicate the table name such as users.name not name
            ->where('users.name', 'LIKE','%' . $search_word . '%')
            ->orderBy('posts.created_at','desc')
            ->paginate(5);
            //return $posts;
            return view('posts.index')->with('posts',$posts);

            break;


            default:
            $posts = Post::orderBy('created_at','desc')->paginate(5);
            return view('posts.index')->with('posts', $posts);

            break;
        }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_chord()
    {
        //
        return view('posts.create_chord');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);
        
        // Handle file upload

        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            //filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        // Create post

        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();

        return redirect('/posts')->with('success', 'Post Created');

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
        return view('posts.show')->with('post',$post);
        
        //return view('posts.show')->with('post',$post); posts.show에서 posts 는 폴더이름 show는 그안에있는 show.blade.php  
        //->with('post',$post) 에서 'post' 는 show.blade.php 에서 데이터 fetch 하기위한 variable name. $post 는 $id 로 db에서 찾은 array 

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::find($id);
        //Check for correct author
        if(auth()->user()->id !== $post->user_id){
        return redirect('/posts')->with('error','Unauthorized Access');
        }
        return view('posts.edit')->with('post',$post);
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
        //
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            //filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }
        // Create post


        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        
        //Update chord with key data
        //$post->body = "<pre id='chord' data-key='A'>" . $request->input('body') . "<pre>";
        if($request->hasFile('cover_image')){
            $post->cover_image = $fileNameToStore;
        }
        $post->save();

        return redirect('/posts')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $id = $request->input('postId');
        $post = Post::find($id);

        //Check for correct author
        if(auth()->user()->id !== $post->user_id ){
            return redirect('/posts')->with('error','Unauthorized Access');
            }
        if($post->cover_image != 'noimage.jpg'){
            //Delete image if it's not the noimage.jpg
            Storage::delete('public/cover_images/'.$post->cover_image);
        }    
        $post->delete();
        return redirect('/posts')->with('success', 'Post Deleted');
    }
    //CREATE ANOTHER FUNCTION FOR MAIN

    

}
