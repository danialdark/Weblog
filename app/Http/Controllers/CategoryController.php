<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Image;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function all()
    {
        $categories = Category::all();

        return view("admin.content.category.index", compact("categories"));
    }
    public function index()
    {
        return view("category");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view("admin.content.category.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $category = new Category();
        $category->title = $request->name;
        $category->head = $request->head;
        $desctiption = strip_tags($request->description);
        $category->description = $desctiption;
        $category->status = $request->status;
        $iconname = time() . "." . $request->icon->extension();
        $request->icon->move(public_path("assets/blog/images/category/icon"), $iconname);
        $category->icon = $iconname;
        $imagename = time() . "." . $request->image->extension();
        $request->image->move(public_path("assets/blog/images/category/"), $imagename);
        $category->image = $imagename;
        $category->save();
        return redirect()->route("admin.content.category.image");
    }

    public function image()
    {
        $categoryimg = Category::orderby("id", "desc")->first();
        $image = new Image();
        $image->url = "assets/blog/images/category/" . $categoryimg->image;
        $categoryimg->images()->save($image);
        $categoryicon = Category::orderby("id", "desc")->first();
        $icon = new Image();
        $icon->url = "assets/blog/images/category/icon/" . $categoryicon->icon;
        $categoryicon->images()->save($icon);

        return redirect()->route("admin.content.category.all");
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
        $category = Category::find($id);

        return view("category", compact(["category", "categories", "exams"]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view("admin.content.category.edit", compact("category"));
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
        $category = Category::find($id);
        $category->title = $request->title;
        $desctiption = strip_tags($request->description);
        $category->description = $desctiption;
        $category->status = $request->status;
        $category->save();
        return redirect()->route("admin.content.category.all");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route("admin.content.category.all");
    }
}
