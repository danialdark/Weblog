<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Post;
use App\Models\Image;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Models\Posttranslation;
use Illuminate\Support\Facades\App;
use Illuminate\Contracts\Session\Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function all()
    {
        $posts = Post::with("translations")->get();
        return view("admin.content.posts.index", compact("posts"));
    }
    public function farsi()
    {
        $translations = Posttranslation::where("language", "fa")->with("posts")->get();
        return view("admin.content.posts.translateindex", compact("translations"));
    }
    public function index($locale)
    {
        if ($locale == "en") {
            App::setLocale($locale);
        }
        if ($locale == "fa") {
            App::setLocale($locale);
        }
        return view("category");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where("status", 1)->get();
        $subcategories = Subcategory::all();
        return view("admin.content.posts.create", compact(["categories", "subcategories"]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // dd($request->all());
        $post = new Post();
        $post->user_id = $request->user_id;
        $post->subcategory_id = $request->sub_category;
        $post->status = $request->status;
        $imagename = time() . "." . $request->image->extension();
        $request->image->move(public_path("assets/blog/images"), $imagename);
        $post->image = $imagename;
        $post->save();
        $posttranslation = new Posttranslation();
        $postid = Post::orderby("id", "desc")->first();
        $posttranslation->language = $request->language;
        $posttranslation->post_id = $postid->id;
        $posttranslation->summary = $request->summary;
        $posttranslation->title = $request->title;
        $posttranslation->body = $request->description;
        $posttranslation->save();

        return redirect()->route("admin.content.posts.image");
    }
    public function image()
    {
        $postimg = Post::orderby("id", "desc")->first();
        $image = new Image();
        $image->url = "assets/blog/images/" . $postimg->image;
        $postimg->images()->save($image);
        return redirect()->route("admin.content.posts.all");
    }
    public function translate($id)
    {
        $post = Post::find($id);
        $categories = Category::where("status", 1)->get();
        $subcategories = Subcategory::all();
        return view("admin.content.posts.translate", compact(["post", "categories", "subcategories"]));
    }
    public function maketranslate(Request $request, $id)
    {

        $post = Post::find($id);
        $posttranslation = new Posttranslation();
        $posttranslation->language = $request->language;
        $posttranslation->post_id = $post->id;
        $posttranslation->summary = $request->summary;
        $posttranslation->title = $request->title;
        $posttranslation->body = $request->description;
        $posttranslation->save();
        return redirect()->route("admin.content.posts.all.farsi");
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($locale, $id)
    {
        App::setLocale($locale);
        $exams = Exam::where("language", $locale)->orderBy("id", "desc")->limit(3)->get();
        $categories = Category::where("status", 1)->get();
        $posttranslation = Posttranslation::find($id);
        $comments = Comment::orderby("id", "desc")->where([["post_id", "$posttranslation->post_id"], ["approved", 1]])->limit(3)->get();
        return view("posts", compact(["categories", "posttranslation", "comments", "exams"]));
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
        $categories = Category::where("status", 1)->get();
        $subcategories = Subcategory::all();
        return view("admin.content.posts.edit", compact(["post", "categories", "subcategories"]));
    }
    public function editfarsi($id)
    {
        $posttranslation = Posttranslation::find($id);
        $categories = Category::where("status", 1)->get();
        $subcategories = Subcategory::all();
        return view("admin.content.posts.editfarsi", compact(["posttranslation", "categories", "subcategories"]));
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
        $post = Post::find($id);
        $post->status = $request->status;
        $post->save();
        $posttranslation = Posttranslation::where("post_id", $post->id)->first();
        $posttranslation->summary = $request->summary;
        $posttranslation->title = $request->title;
        $description = strip_tags($request->description);
        $posttranslation->body = $description;
        $posttranslation->save();
        return redirect()->route("admin.content.posts.all");
    }

    public function updatefarsi(Request $request, $id)
    {
        $posttranslation = Posttranslation::find($id);
        $posttranslation->summary = $request->summary;
        $posttranslation->title = $request->title;
        $description = strip_tags($request->description);
        $posttranslation->body = $description;
        $posttranslation->save();
        return redirect()->route("admin.content.posts.all.farsi");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route("admin.content.posts.all");
    }
    public function destroyfarsi($id)
    {
        $translation = Posttranslation::find($id);
        $translation->delete();
        return redirect()->route("admin.content.posts.all.farsi");
    }
}
