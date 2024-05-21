<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IngredientsController;
use App\Http\Controllers\RecipesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('admin.auth.login');
});

//front routes Start
Route::get('/about', function () {
    return view('front.about');
})->name('front_about');
Route::get('/search', function () {
    return view('front.search');
})->name('front_search');
Route::get('/', [HomeController::class, 'index'])->name('front_index');
Route::get('/recipes', [RecipesController::class, 'recipeList'])->name('front_recipe_list');
Route::post('/recipes/search', [RecipesController::class, 'recipeSearch'])->name('front_recipe_search');
Route::get('/recipes/categories-search', [RecipesController::class, 'categoriesSearch'])->name('front_categories_search');
Route::post('/recipes/categories-search', [RecipesController::class, 'categoriesSearchResult'])->name('front_categories_search_result');
Route::get('/recipes/ingredient-search', [RecipesController::class, 'ingredientSearch'])->name('front_ingredient_search');
Route::post('/recipes/ingredient-search', [RecipesController::class, 'ingredientSearchResult'])->name('front_ingredient_search_result');
Route::get('/recipe-detail/{id}', [RecipesController::class, 'detailRecipe'])->name('front_recipe_detail');
//front routes end

//admin routes start
Route::middleware(['LoginCheck'])->prefix('admin')->group(function () {

    //login
    Route::get('/', [AdminController::class, 'login'])->name('admin_login')->withoutMiddleware('LoginCheck');

    Route::post('/', [AdminController::class, 'check'])->name('login_post')->withoutMiddleware('LoginCheck');
    //logout
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin_logout')->withoutMiddleware('LoginCheck');

    //change password
    Route::post('/change-password', [AdminController::class, 'change_password'])->name('change_password');

    //dashboard
    // Route::get('/dashboard', function () {
    //     return view('admin.dashboard.index');
    // })->name('admin_dashboard');

    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('admin_dashboard');

    //user management
    Route::get('/get-user-details', [UserController::class, 'getDetails'])->name('get_user');
    Route::get('/user-change-status', [UserController::class, 'changeStatus'])->name('user_changeStatus');
    Route::resource('user', UserController::class);

    //categories
    Route::get('/get-categories-details', [CategoryController::class, 'getDetails'])->name('get_categories');
    Route::get('/fetch-categories',[CategoryController::class, 'fetchCategories'])->name('fetchCategories');
    Route::get('/categories-change-status', [CategoryController::class, 'changeStatus'])->name('categories_changeStatus');
    Route::resource('categories', CategoryController::class);
    
    //ingredients
    Route::get('/get-ingredients-details', [IngredientsController::class, 'getDetails'])->name('get_ingredients');
    Route::get('/ingredients-change-status', [IngredientsController::class, 'changeStatus'])->name('ingredients_changeStatus');
    Route::resource('ingredients', IngredientsController::class);
    
    //recipes
    Route::post('/image-fetch', [RecipesController::class, 'imageFetch'])->name('imageFetch');
    Route::post('/image-upload', [RecipesController::class, 'imageUpload'])->name('imageUpload');
    Route::post('/image-delete', [RecipesController::class, 'imageDelete'])->name('imageDelete');
    Route::get('/recipes-publistounpublish', [RecipesController::class, 'publisToUnpublish'])->name('products_publisToUnpublish');
    Route::get('/recipes-unpublishtopublish', [RecipesController::class, 'unpublishToPublish'])->name('products_unpublishToPublish');
    Route::get('/get-recipes-details', [RecipesController::class, 'getDetails'])->name('get_recipes');
    Route::get('/recipes-change-status', [RecipesController::class, 'changeStatus'])->name('recipes_changeStatus');
    Route::resource('recipes', RecipesController::class);

    // //member management
    // Route::get('/get-member-details', [MemberController::class, 'getDetails'])->name('get_member');
    // Route::get('/member-change-status', [MemberController::class, 'changeStatus'])->name('member_changeStatus');
    // Route::resource('member', MemberController::class);
});
//admin routes end
