<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($locale)
    {
        App::setLocale($locale);
        $categories = Category::with("Subcategories", "posts")->get();
        $exams = Exam::where("language", $locale)->orderBy("id", "desc")->with("questions")->get();
        return view("exams", compact("exams", "categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $exam = Exam::where("id", $id)->with("questions")->first();
        $exams = Exam::where("language", $locale)->orderBy("id", "desc")->with("questions")->get();
        $categories = Category::with("Subcategories", "posts")->get();
        return response(view('exam',compact("exam", "categories", "exams")));
    }


    public function answer(Request $request, $locale, $id)
    {
        
        $x = array($request->all());
        $results = $x[0];
        unset($results["_token"]);
        $y = Exam::find($id);
        $options = array();
        $number = 0;
        foreach ($y->questions as $question) {
            array_push($options, $question->answer->option);
        }
        $score = 0;
        foreach ($results as $result) {
            if ($result == $options[$number]) {
                $score++;
                $number++;
            } else {
                $number++;
            }
        }
        return redirect()->route('home.content.exams.score', $score);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function score($locale, $score)
    {
        App::setLocale($locale);
        return view("score", compact("score"));
    }
}
