<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SejarahSekolahController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\GurupemanduController;
use App\Http\Controllers\OlahragaController;
use App\Http\Controllers\PrestasiiController;
use App\Http\Controllers\PrestasiolahragaController;
use App\Http\Controllers\PrestasipenelitianController;
use App\Http\Controllers\PrestasisainsController;
use App\Http\Controllers\PrestasiseniController;
use App\Http\Controllers\PrestasiolahragaISIController;
use App\Http\Controllers\PrestasipenelitianISIController;
use App\Http\Controllers\PrestasisainsISIController;
use App\Http\Controllers\PrestasiseniISIController;
use App\Http\Controllers\olahragaISIController;
use App\Http\Controllers\GurupemanduISIController;
use App\Http\Controllers\Public\ArticleController as PublicArticleController;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\MajorController as PublicMajorController;
use App\Http\Controllers\Public\PageController as PublicPageController;
use App\Http\Controllers\Public\SchoolProfileController as PublicSchoolProfileController;
use App\Http\Controllers\Public\SejarahSekolahController as PublicSejarahSekolahController;
use App\Http\Controllers\Public\VisiMisiController as PublicVisiMisiController;
use App\Http\Controllers\Public\PrestasiController as PublicPrestasiController;
use App\Http\Controllers\Public\GurupemanduController as PublicGurupemanduController;
use App\Http\Controllers\Public\OlahragaController as PublicOlahragaController;
use App\Http\Controllers\Public\PrestasiiController as PublicPrestasiiController;
use App\Http\Controllers\Public\PrestasipenelitianController as PublicPrestasipenelitianController;
use App\Http\Controllers\Public\PrestasiolahragaController as PublicPrestasiolahragaController;
use App\Http\Controllers\Public\PrestasisainsController as PublicPrestasisainsController;
use App\Http\Controllers\Public\PrestasiseniController as PublicPrestasiseniController;
use App\Http\Controllers\SchoolProfileController;
use App\Http\Controllers\VisiMisiController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Models\Article;
use Illuminate\Support\Facades\Route;

// roles & permissions
// superadmin: can all (users, articles, categories, students, teachers, majors)
// admin: can all (articles, categories, students, teachers, majors)
// editor: can only (articles)
Route::DELETE('/remove-image-carousel/{major}', [MajorController::class, 'removeImageCarousel']);
Route::DELETE('/remove-image/{page}', [PageController::class, 'removeImage']);

Route::prefix('/')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
    Route::get('/articles/{article}', [PublicArticleController::class, 'show'])->name('articles.show');
    Route::get('/school-profile', [PublicSchoolProfileController::class, 'index'])->name('school-profile.index');
    Route::get('/sejarah-sekolah', [PublicSejarahSekolahController::class, 'index'])->name('sejarah-sekolah.index');
    Route::get('/visi-misi', [PublicVisiMisiController::class, 'index'])->name('visi-misi.index');
    Route::get('/prestasi', [PublicPrestasiController::class, 'index'])->name('prestasi.index');
    Route::get('/gurupemandu', [PublicGurupemanduController::class, 'index'])->name('prestasi2.gurupemandu');
    Route::get('/olahraga', [PublicOlahragaController::class, 'index'])->name('prestasi2.olahraga');
    Route::get('/prestasii', [PublicPrestasiiController::class, 'index'])->name('prestasi2.prestasi');
    Route::get('/prestasipenelitian', [PublicPrestasipenelitianController::class, 'index'])->name('prestasi_tampilan.penelitian');
    Route::get('/prestasiolahraga', [PublicPrestasiolahragaController::class, 'index'])->name('prestasi_tampilan.olahraga');
    Route::get('/prestasisains', [PublicPrestasisainsController::class, 'index'])->name('prestasi_tampilan.sains');
    Route::get('/prestasiseni', [PublicPrestasiseniController::class, 'index'])->name('prestasi_tampilan.seni');
    Route::get('/majors/{major}', [PublicMajorController::class, 'show'])->name('majors.show');
    Route::get('/pages/{page}', [PublicPageController::class, 'show'])->name('pages.show');
    
    // Route::delete('/removeImageCarousel/{index}', [MajorController::class, 'removeImageCarousel'])->name('removeImageCarousel.delete');
    // Route::delete('/remove-image-carousel/{major}', [MajorController::class, 'removeImageCarousel']);

});

Route::middleware('auth')->group(function () {
    Route::prefix('/dashboard')->name('dashboard.')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');


        Route::middleware(['role:superadmin,admin,editor'])->group(function () {
            Route::resource('/articles', ArticleController::class)->except(['index', 'show']);
            Route::delete('/remove-image-carousel/{major}', [MajorController::class, 'removeImageCarousel']);

        });  

        Route::middleware(['role:superadmin,admin'])->group(function () {
            Route::resource('/categories', CategoryController::class)->except(['index', 'show']);
            Route::resource('/majors', MajorController::class)->except(['index', 'show']);
            Route::resource('/teachers', TeacherController::class)->except(['index', 'show']);
            Route::resource('/students', StudentController::class)->except(['index', 'show']);
            Route::resource('/slides', SlideController::class)->except(['index', 'show']);
            Route::resource('/menus', MenuController::class)->except(['index', 'show']);
            Route::resource('/pages', PageController::class)->except(['index', 'show']);
            Route::resource('/olahraga', OlahragaISIController::class)->except(['index', 'show']);
            Route::resource('/GurupemanduISI', GurupemanduISIController::class)->except(['index', 'show']);
            Route::resource('/OlahragaISI', OlahragaISIController::class)->except(['index', 'show']);
            Route::resource('/PrestasipenelitianISI', PrestasipenelitianISIController::class)->except(['index', 'show']);
            Route::resource('/PrestasiolahragaISI', PrestasiolahragaISIController::class)->except(['index', 'show']);
            Route::resource('/PrestasisainsISI', PrestasisainsISIController::class)->except(['index', 'show']);
            Route::resource('/PrestasiseniISI', PrestasiseniISIController::class)->except(['index', 'show']);

            Route::get('/school-profile/edit', [SchoolProfileController::class, 'edit'])->name('school-profile.edit');
            Route::put('/school-profile/edit', [SchoolProfileController::class, 'update'])->name('school-profile.update');

            Route::get('/sejarah-sekolah/edit', [SejarahSekolahController::class, 'edit'])->name('sejarah-sekolah.edit');
            Route::put('/sejarah-sekolah/edit', [SejarahSekolahController::class, 'update'])->name('sejarah-sekolah.update');

            Route::get('/visi-misi/edit', [VisiMisiController::class, 'edit'])->name('visi-misi.edit');
            Route::put('/visi-misi/edit', [VisiMisiController::class, 'update'])->name('visi-misi.update');



        });

        Route::middleware('role:superadmin')->group(function () {
            Route::resource('/users', UserController::class);
        });

        Route::get('/school-profile', [SchoolProfileController::class, 'index'])->name('school-profile.index');
        
        Route::get('/sejarah-sekolah', [SejarahSekolahController::class, 'index'])->name('sejarah-sekolah.index');

        Route::get('/visi-misi', [VisiMisiController::class, 'index'])->name('visi-misi.index');

        Route::get('/prestasi', [PrestasiController::class, 'index'])->name('prestasi.index');

        Route::get('/gurupemandu', [GurupemanduController::class, 'index'])->name('prestasi2be.gurupemandu');

        Route::get('/olahraga', [OlahragaController::class, 'index'])->name('prestasi2be.olahraga');

        Route::get('/prestasii', [PrestasiiController::class, 'index'])->name('prestasi2be.prestasi');

        Route::get('/prestasiolahraga', [PrestasiolahragaController::class, 'index'])->name('prestasi_tampilan.olahraga');

        Route::get('/prestasipenelitian', [PrestasipenelitianController::class, 'index'])->name('prestasi_tampilan.penelitian');

        Route::get('/prestasisains', [PrestasisainsController::class, 'index'])->name('prestasi_tampilan.sains');

        Route::get('/prestasiseni', [PrestasiseniController::class, 'index'])->name('prestasi_tampilan.seni');

        Route::get('/prestasiolahragaISI', [PrestasiolahragaISiController::class, 'index'])->name('prestasi_isi.olahragaindex');

        Route::get('/prestasipenelitianISI', [PrestasipenelitianISiController::class, 'index'])->name('prestasi_isi.penelitianindex');

        Route::get('/prestasisainsISI', [PrestasisainsISiController::class, 'index'])->name('prestasi_isi.sainsindex');

        Route::get('/prestasiseniISI', [PrestasiseniISiController::class, 'index'])->name('prestasi_isi.seniindex');

        Route::get('/Olahraga', [olahragaISIController::class, 'index'])->name('olahraga_isi.olahragaindex');

        Route::get('/Gurupemandu', [GurupemanduISIController::class, 'index'])->name('guru_pemandu_isi.gurupemanduindex');

        Route::get('/menus', [MenuController::class, 'index'])->name('menus.index');

        Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
        Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

        Route::get('/pages', [PageController::class, 'index'])->name('pages.index');
        Route::get('/pages/{page}', [PageController::class, 'show'])->name('pages.show');

        Route::get('/slides', [SlideController::class, 'index'])->name('slides.index');
        Route::get('/slides/{slide}', [SlideController::class, 'show'])->name('slides.show');

        // for public (editor, superadmin and all) to see major detail page
        Route::get('/majors', [MajorController::class, 'index'])->name('majors.index');
        Route::get('/majors/{major}', [MajorController::class, 'show'])->name('majors.show');
        // Route::delete('/removeImageCarousel/{index}', [MajorController::class, 'removeImageCarousel'])->name('removeImageCarousel');


        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

        Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');
        Route::get('/teachers/{teacher}', [TeacherController::class, 'show'])->name('teachers.show');

        Route::get('/students', [StudentController::class, 'index'])->name('students.index');
        Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');

        // Route::post('ckeditor/upload', 'CKEditorController@upload')->name('ckeditor.upload');


        // Route::post('ckeditor/upload',[ArticleController::class,'upload'])->name('ckeditor.upload');

    });
    Route::delete('/sign-out', [AuthController::class, 'logout'])->name('signOut');
    // Route::delete('/removeImageCarousel/{index}', [MajorController::class, 'removeImageCarousel'])->name('removeImageCarousel');

});

Route::middleware('guest')->group(function () {
    Route::get('/sign-in', [AuthController::class, 'index'])->name('signIn');
    Route::post('/sign-in', [AuthController::class, 'authenticate']);
});
