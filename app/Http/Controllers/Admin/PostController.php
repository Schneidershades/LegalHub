<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Functions\HelperFunction;
use Storage;
use Image;

class PostController extends Controller
{
    public function index()
    {
    	return view('dashboard.admin.posts.index')
            ->with('posts', Post::latest()->get());
    }

    public function create()
    {
        return view('dashboard.admin.posts.create');
    }

    public function store(Request $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->slug = str_slug($request->title);
        $post->excerpt = $request->excerpt;
        $post->meta_keyword = $request->meta_keyword;
        $post->meta_description = $request->meta_description;
        $post->content = $request->content;

        if ($request->image){
            $path = HelperFunction::uploadAnything(
                $request->image, 
                $post->title, 
                'assets/files/posts/'.str_slug($request->title).'/', 
                $request->image, 760, 390
            );
            $post->image = $path;
        }

        $post->save();

        return redirect()->route('posts.index');
    }

    public function show($id)
    {
    	$post = Post::find($id);
        return view('dashboard.admin.posts.show')
            ->with('post', $post);
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('dashboard.admin.posts.edit')
            ->with('post', $post);
    }

    public function update(Request $request, $id)
    {
        $post = post::findOrFail($id);
        $post->title = $request->title;
        $post->slug = str_slug($request->title);
        $post->excerpt = $request->excerpt;
        $post->meta_keyword = $request->meta_keyword;
        $post->meta_description = $request->meta_description;
        $post->content = $request->content;

        if ($request->image){
            $path = HelperFunction::uploadAnything(
                $request->image, 
                $post->title, 
                'assets/files/events/'.str_slug($request->title).'/', 
                $request->image, 760, 390
            );
            $oldFilename = $post->image;
            // add the new photo
            $post->image = $path;
            // delete the old photo
            Storage::delete($oldFilename);
        }

        $post->save();

        return redirect()->route('posts.show', $post->id);
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        Session::flash('success', 'The post details has been deleted');
    }
}
