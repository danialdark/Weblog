<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Post;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Models\Posttranslation;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($locale)
    {
        App::setLocale($locale);
        $exams = Exam::where("language", $locale)->orderBy("id","desc")->limit(3)->get();
        $categories = Category::with("Subcategories", "posts")->get();
        $posts = Post::orderby("id", "desc")->with("images")->limit(9)->get();
        $posttranslations = Posttranslation::where("language", $locale)->with("posts")->limit(9)->get();
        return view('index', compact("categories", "posts", "posttranslations", "exams"));
    }
}
