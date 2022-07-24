<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\API\MidtransController;
use App\Http\Controllers\Landing\LandingController;
use App\Http\Controllers\Dashboard\MemberController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\WebinarController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\member\QuizController;
use App\Http\Controllers\Dashboard\mentor\ExamController;
use App\Http\Controllers\Dashboard\mentor\TypeController;
use App\Http\Controllers\Dashboard\member\MateriController;
use App\Http\Controllers\Dashboard\mentor\courseController;
// use App\Http\Controllers\Dashboard\mentor\profileController as mentorProfileController;
use App\Http\Controllers\Dashboard\mentor\lessonController;
use App\Http\Controllers\Dashboard\mentor\chapterController;
use App\Http\Controllers\Dashboard\mentor\priviewController;
use App\Http\Controllers\Dashboard\member\ProgressController;
use App\Http\Controllers\Dashboard\mentor\QuestionController;
use App\Http\Controllers\Dashboard\mentor\createMateriController;
use App\Http\Controllers\Dashboard\mentor\courseCategoryController;
use App\Http\Controllers\Dashboard\MentorController as DashboardMentorController;
use App\Http\Controllers\Dashboard\member\CourseController as MemberCourseController;
use App\Http\Controllers\Dashboard\member\MemberController as MemberMemberController;
use App\Http\Controllers\Dashboard\mentor\profileController as mentorProfileController;


// frontend

// dashboard (member)
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

Route::get('corporate', [LandingController::class, 'corporate'])->name('corporate.landing');
Route::get('profesional', [LandingController::class, 'profesional'])->name('profesional.landing');
Route::get('detail_booking/{slug:created_at}', [LandingController::class, 'detail_booking'])->name('detail.booking.landing');
Route::get('booking/{id}', [LandingController::class, 'booking'])->name('booking.landing');
Route::get('detail/{slug:slug}', [LandingController::class, 'detail'])->name('detail.landing');
Route::get('explore', [LandingController::class, 'explore'])->name('explore.landing');
// Route::get('midtrans/success', MidtransController::class, 'success');
// Route::get('midtrans/unfinish', MidtransController::class, 'unfinish');
// Route::get('midtrans/error', MidtransController::class, 'error');
Route::resource('/', LandingController::class);

// midtrans route
Route::get('payment/success', [LandingController::class, 'midtransCallback']);
Route::post('payment/success', [LandingController::class, 'midtransCallback']);

// Dashboard
// route group menggunakan middleware admin
// Route::group(['middleware' => ['auth', 'admin']], function () {
// Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
// });

// get image from storage folder
Route::get('/storage/course/thumbnail/{filename}', function ($filename) {
    $path = storage_path('public/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});


Route::group(
    ['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'verified', 'Admin']],
    function () {

        Route::resource('dashboard', DashboardController::class);
        // Route::resource('mentor', MentorController::class);
        Route::resource('member-management', MemberController::class);
        Route::resource('mentor-management', DashboardMentorController::class);
        Route::resource('webinar', WebinarController::class);
        Route::resource('profile', ProfileController::class);
        // Route::resource('user', UserController::class);
    }
);

Route::group(
    ['prefix' => 'mentor', 'as' => 'mentor.', 'middleware' => ['auth', 'verified', 'Mentor']],
    function () {

        Route::resource('dashboard', DashboardController::class);
        Route::resource('course', courseController::class);
        Route::resource('materi', lessonController::class);
        Route::resource('chapter', chapterController::class);
        Route::resource('create-materi', createMateriController::class);
        Route::resource('profile', mentorProfileController::class);
        Route::resource('categories', courseCategoryController::class);
        Route::resource('priview', priviewController::class);
        Route::resource('exam', ExamController::class);
        Route::resource('type', TypeController::class);
        Route::resource('question', QuestionController::class);
        // Route::resource('user', UserController::class);
    }
);

Route::group(
    ['prefix' => 'member', 'as' => 'member.', 'middleware' => ['auth', 'verified', 'Member']],
    function () {
        Route::resource('dashboard', DashboardController::class);
        Route::resource('course', MemberCourseController::class);
        Route::get('materi/{id}/', [MateriController::class, 'tampil'])->name(name: 'course.materi');
        Route::resource('progress', ProgressController::class);
        // quiz

        Route::get('quiz/{id}/', [QuizController::class, 'start'])->name('course.quiz');
        Route::get('quiz/result/{score}/{id}', [QuizController::class, 'result'])->name('quiz.result');
        // Route::resource('materi', MateriController::class);
    }
);

// Route::group(
//     ['prefix' => 'mentor', 'as' => 'mentor.', 'middleware' => ['auth', 'verified', 'Member']],
//     function () {
//         Route::resource('dashboard', MemberMemberController::class);
//     }
// );


// Dashboard
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

// route socialite
Route::get('sign-in-google', [UserController::class, 'google'])->name('user.login.google');
Route::get('auth/google/callback', [UserController::class, 'handleProviderCallback'])->name('user.google.callback');
