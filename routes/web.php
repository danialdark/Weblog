<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\HomeExamController;
use App\Http\Controllers\HomePostController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\LocalizationCotroller;
use App\Http\Controllers\SubCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
route::get("/", function () {
    return redirect()->route("home", "en");
});


route::get("/fa", function () {
    return redirect()->route("home", "fa");
})->name("fa");

route::get("/en", function () {
    return redirect()->route("home", "en");
})->name("en");

Route::prefix('/{locale}/home')->middleware("lang")->group(function () {
    route::get("/", [HomeController::class, "index"])->name("home");
    Route::prefix('category')->group(function () {
        route::get("/show/{id}", [CategoryController::class, "show"])->name("home.content.category.show");
    });
    Route::prefix('subcategory')->group(function () {
        route::get("/", [SubCategoryController::class, "all"])->name("home.content.subcategory.all");
        route::get("/show/{id}", [SubCategoryController::class, "show"])->name("home.content.subcategory.show");
    });
    Route::prefix('posts')->middleware("auth")->group(function () {
        route::get("/", [HomePostController::class, "index"])->name("home.content.posts.all");
        Route::post('/comment/store', [CommentController::class, 'store'])->name('home.content.posts.comment.store');
        route::get("/show/{id}", [PostController::class, "show"])->name("home.content.posts.show");
    });
    Route::prefix('exams')->middleware("auth")->group(function () {
        route::get("/", [HomeExamController::class, "index"])->name("home.content.exams.index");
        route::get("/show/{id}", [HomeExamController::class, "show"])->name("home.content.exams.show");
        route::post("/answer/{id}", [HomeExamController::class, "answer"])->name("home.content.exams.answer");
        route::get("/score/{score}", [HomeExamController::class, "score"])->name("home.content.exams.score");
    });
});
route::prefix("admin")->middleware(["admin", "auth"])->group(function () {
    route::get("/", [AdminController::class, "index"])->name("admin.home");
    route::prefix("category")->group(function () {
        Route::get('/all', [CategoryController::class, 'all'])->name('admin.content.category.all');
        Route::get('/create', [CategoryController::class, 'create'])->name('admin.content.category.create');

        Route::post('/store', [CategoryController::class, 'store'])->name('admin.content.category.store');
        Route::get('/image', [CategoryController::class, 'image'])->name('admin.content.category.image');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('admin.content.category.edit');
        Route::put('/update/{id}', [CategoryController::class, 'update'])->name('admin.content.category.update');
        Route::delete('/destroy/{id}', [CategoryController::class, 'destroy'])->name('admin.content.category.destroy');
    });
    route::prefix("subcategory")->group(function () {
        Route::get('/all', [SubCategoryController::class, 'all'])->name('admin.content.subcategory.all');
        Route::get('/create', [SubCategoryController::class, 'create'])->name('admin.content.subcategory.create');
        Route::post('/store', [SubCategoryController::class, 'store'])->name('admin.content.subcategory.store');
        Route::get('/edit/{id}', [SubCategoryController::class, 'edit'])->name('admin.content.subcategory.edit');
        Route::put('/update/{id}', [SubCategoryController::class, 'update'])->name('admin.content.subcategory.update');
        Route::delete('/destroy/{id}', [SubCategoryController::class, 'destroy'])->name('admin.content.subcategory.destroy');
    });
    route::prefix("posts")->group(function () {
        Route::get('/all', [PostController::class, 'all'])->name('admin.content.posts.all');
        Route::get('/all/farsi', [PostController::class, 'farsi'])->name('admin.content.posts.all.farsi');
        Route::get('/create', [PostController::class, 'create'])->name('admin.content.posts.create');
        Route::post('/store', [PostController::class, 'store'])->name('admin.content.posts.store');
        Route::get('/translate/{id}', [PostController::class, 'translate'])->name('admin.content.posts.translate');
        Route::post('/maketranslate/{id}', [PostController::class, 'maketranslate'])->name('admin.content.posts.translate.create');
        Route::get('/image', [PostController::class, 'image'])->name('admin.content.posts.image');
        Route::get('/edit/{id}', [PostController::class, 'edit'])->name('admin.content.posts.edit');
        Route::get('/edit/farsi/{id}', [PostController::class, 'editfarsi'])->name('admin.content.posts.edit.farsi');
        Route::put('/update/{id}', [PostController::class, 'update'])->name('admin.content.posts.update');
        Route::put('/update/farsi/{id}', [PostController::class, 'updatefarsi'])->name('admin.content.posts.update.farsi');
        Route::delete('/destroy/{id}', [PostController::class, 'destroy'])->name('admin.content.posts.destroy');
        Route::delete('/destroy/farsi/{id}', [PostController::class, 'destroyfarsi'])->name('admin.content.posts.destroy.farsi');
        Route::post('ckeditor/image_upload', [CkeditorController::class, 'upload'])->name('upload');
    });
    route::prefix("comments")->group(function () {
        Route::get('/', [CommentController::class, 'all'])->name('admin.content.comments.all');
        Route::put('/update/{id}', [CommentController::class, 'update'])->name('admin.content.comments.update');
        Route::delete('/destroy/{id}', [CommentController::class, 'destroy'])->name('admin.content.comments.destroy');
    });
    route::prefix("exams")->group(function () {
        Route::get('/', [ExamController::class, 'index'])->name('admin.content.exams.index');
        Route::get('/create', [ExamController::class, 'create'])->name('admin.content.exams.create');
        route::get("/show/{id}", [ExamController::class, "show"])->name("admin.content.exams.show");
        Route::post('/store', [ExamController::class, 'store'])->name('admin.content.exams.store');
        Route::get('/edit/{id}', [ExamController::class, 'edit'])->name('admin.content.exams.edit');
        Route::put('/update/{id}', [ExamController::class, 'update'])->name('admin.content.exams.update');
        Route::delete('/destroy/{id}', [ExamController::class, 'destroy'])->name('admin.content.exams.destroy');
        route::prefix("questions")->group(function () {
            Route::get('/', [QuestionController::class, 'index'])->name('admin.content.exams.questions.index');
            Route::get('/create/{id}', [QuestionController::class, 'create'])->name('admin.content.exams.questions.create');
            route::get("/show/{id}", [QuestionController::class, "show"])->name("admin.content.exams.questions.show");
            Route::post('/store/{id}', [QuestionController::class, 'store'])->name('admin.content.exams.questions.store');
            Route::get('/option/{option}', [QuestionController::class, 'option'])->name('admin.content.exams.answers.option');
            Route::get('/edit/{id}', [QuestionController::class, 'edit'])->name('admin.content.exams.questions.edit');
            Route::put('/update/{id}', [QuestionController::class, 'update'])->name('admin.content.exams.questions.update');
            Route::delete('/destroy/{id}', [QuestionController::class, 'destroy'])->name('admin.content.exams.questions.destroy');
        });
    });
});
