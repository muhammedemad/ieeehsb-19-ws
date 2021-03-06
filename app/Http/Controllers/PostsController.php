<?php

namespace App\Http\Controllers;

use App\Http\Resources\Post\PostResource;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['viewPost', 'index']);

    }

    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        // return PostCollection::collection($posts);
        if (auth()->user()) {
            return view('/posts.index', compact('posts'));
        } else {
            return view('/articles_guest', compact('posts'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
        // return redirect('posts/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        if ((auth()->user()) || (auth()->user()->type == 'admin') || $this->middleware('auth')) {
            $fileNameStoreImage = null;
            $fileNameStoreVideo = null;
            $fileNameStoreFile = null;
            //
            $this->validate($request, [
                'title' => 'required',
                'hero_image' => 'image|nullable|max:10000000 | mimes:jpg,png,jpeg,svg',
                'custom_file' => 'nullable|max:10000000 | mimes:pdf,txt,docx,doc,pptx,ppt,xls ',
            ]);

            // upload image
            if ($request->hasFile('hero_image')) {
                // foreach ($request->hero_image as $hero_image) {
                $filenameWithExtention = $request->file('hero_image')->getClientOriginalName();
                $fileName = pathinfo($filenameWithExtention, PATHINFO_FILENAME);
                $extension = $request->file('hero_image')->getClientOriginalExtension();
                $fileNameStoreImage = $fileName . '_' . time() . '.' . $extension;
                $path = $request->file('hero_image')->move(base_path() . '/public/uploaded/images/', $fileNameStoreImage);
            }

            /***********  upload video*/
            // if ($request->hasFile('post_video')) {
            //     $filenameWithExtention = $request->file('post_video')->getClientOriginalName();
            //     $fileName = pathinfo($filenameWithExtention, PATHINFO_FILENAME);
            //     $extension = $request->file('post_video')->getClientOriginalExtension();
            //     $fileNameStoreVideo = $fileName . '_' . time() . '.' . $extension;
            //     $path = $request->file('post_video')->move(base_path() . '/public/uploaded/videos/', $fileNameStoreVideo);
            // }

            // upload file
            if ($request->hasFile('custom_file')) {

                $filenameWithExtention = $request->file('custom_file')->getClientOriginalName();
                $fileName = pathinfo($filenameWithExtention, PATHINFO_FILENAME);
                $extension = $request->file('custom_file')->getClientOriginalExtension();
                $fileNameStoreFile = $fileName . '_' . time() . '.' . $extension;

                $path = $request->file('custom_file')->move(base_path() . '/public/uploaded/files/', $fileNameStoreFile);

            }

            $post = new Post;
            $post->title = $request->input('title');
            $post->body = $request->input('body');
            $post->user_id = auth()->user()->id;
            // $post->post_owner = auth()->user()->name;
            $post->hero_image = $fileNameStoreImage;
            // $post->post_video = $fileNameStoreVideo;
            $post->custom_file = $fileNameStoreFile;
            $post->save();

            // return redirect('api/posts')->with('success', 'Done successfully');
            return redirect('/articles-dashboard')->with('success', 'Done successfully');
        } else {
            // return redirect('api/auth/login')->with('Unauthorized' , 'Please Login First');
            return redirect('/login')->with('Unauthorized', 'Please Login First');
        }
    }

    // public function show($id)
    public function show(Post $post)
    {
        return new PostResource($post);
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

        if ((auth()->user()->id == $post->user_id) || (auth()->user()->type == 'admin')) {
            return view('posts.edit')->with('post', $post);
        }

        // return redirect('api/posts')->with('error','Unauthorized');
        return redirect('/articles-dashboard')->with('error', 'Unauthorized');
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
        $post = Post::findOrFail($id);

        if ((auth()->user()->id == $post->user_id) || (auth()->user()->type == 'admin')) {
            // $fileNameStoreImage = null;
            // $fileNameStoreVideo =null;
            // $fileNameStoreFile = null;

            $fileNameStoreImage = $post->hero_image;
            // $fileNameStoreVideo = $post->post_video;
            $fileNameStoreFile = $post->custom_file;

            $this->validate($request, [
                'title' => 'required',
                'hero_image' => 'image|nullable|max:10000000 | mimes:jpg,png,jpeg,svg',
                // 'post_video' => 'nullable | max:10000000 |mimes:mp4,3pg,flv,mkv,weba',
                'custom_file' => 'nullable|max:10000000 | mimes:pdf,txt,docx,doc,pptx,ppt,xls ',
            ]);

            //upload image
            if ($request->hasFile('hero_image')) {

                $filenameWithExtention = $request->file('hero_image')->getClientOriginalName();
                $fileName = pathinfo($filenameWithExtention, PATHINFO_FILENAME);
                $extension = $request->file('hero_image')->getClientOriginalExtension();
                $fileNameStoreImage = $fileName . '_' . time() . '.' . $extension;

                $path = $request->file('hero_image')->move(base_path() . '/public/uploaded/images/', $fileNameStoreImage);

                // $fileNameStoreVideo = null;
                // $fileNameStoreFile = null;

            }

            /************** upload video */
            // if ($request->hasFile('post_video')) {

            //     $filenameWithExtention = $request->file('post_video')->getClientOriginalName();
            //     $fileName = pathinfo($filenameWithExtention, PATHINFO_FILENAME);
            //     $extension = $request->file('post_video')->getClientOriginalExtension();
            //     $fileNameStoreVideo = $fileName . '_' . time() . '.' . $extension;

            //     $path = $request->file('post_video')->move(base_path() . '/public/uploaded/videos/', $fileNameStoreVideo);

            //     // $fileNameStoreImage = null;
            //     // $fileNameStoreFile = null;
            // }

            /***************** upload file */
            if ($request->hasFile('custom_file')) {

                $filenameWithExtention = $request->file('custom_file')->getClientOriginalName();
                $fileName = pathinfo($filenameWithExtention, PATHINFO_FILENAME);
                $extension = $request->file('custom_file')->getClientOriginalExtension();
                $fileNameStoreFile = $fileName . '_' . time() . '.' . $extension;

                $path = $request->file('custom_file')->move(base_path() . '/public/uploaded/files/', $fileNameStoreFile);

                // $fileNameStoreVideo = null;
                // $fileNameStoreImage = null;
            }

            // $post =   Post::findOrFail($id);
            $post->title = $request->input('title');
            $post->body = $request->input('body');
            $post->hero_image = $fileNameStoreImage;
            // $post->post_video = $fileNameStoreVideo;
            $post->custom_file = $fileNameStoreFile;
            $post->update();

            // return redirect('/api/posts')->with('success', 'Done successfully');
            return redirect('/articles-dashboard')->with('success', 'Done successfully');
        } else {
            // return redirect('/api/posts')->with('error','Unauthorized');
            return redirect('/articles-dashboard')->with('error', 'Unauthorized');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if ((auth()->user()->id == $post->user_id) || auth()->user()->type == 'admin') {

            if ($post->hero_image) {
                Storage::delete('/public/uploaded/images/' . $post->hero_image);
            }
            // if ($post->post_video) {
            //     Storage::delete('/public/uploaded/videos/' . $post->post_video);
            // }
            if ($post->custom_file) {
                Storage::delete('/public/uploaded/files/' . $post->custom_file);

            }

            $post->delete();
            // return redirect('api/posts')->with('success', 'Done successfully');
            // return redirect('/posts')->with('success', 'Done successfully');
            return redirect('/articles-dashboard')->with('success', 'Done successfully');
        } else {
            // return redirect('api/posts')->with('error','Unauthorized');
            return redirect('/articles-dashboard')->with('error', 'Unauthorized');
        }

    }

    public function viewPost($id)
    {
        $post = Post::findOrFail($id);
        // return view('posts/viewPost' , compact('post'));
        // if((auth()->user()) ||$this->middleware('auth') ) {
        if (!auth()->guest()) {
            return view('posts/viewPost', compact('post'));
        } else {
            return view('/viewPostGuest', compact('post'));
        }
    }
}
