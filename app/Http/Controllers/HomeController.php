<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recipes;
use App\Models\Categories;
use App\Models\Ingredients;

class HomeController extends Controller
{
    public function index(){

        $recipes = Recipes::latest()->take(3)->get();
        foreach ($recipes as $recipe) {
            $categoryIds = explode(',', $recipe->category_id);
            $categoryNames = Categories::whereIn('id', $categoryIds)->pluck('name')->implode(', ');
            $recipe->category_names = $categoryNames;
        }
        // dd($recipes);

        return view('front.index',compact('recipes'));
    } 
    public function dashboard(){

        $recipes = Recipes::get();
        $recipes_count = (int)count($recipes);
        $cat = Categories::where('status',0)->get();
        $ing = Ingredients::where('status',0)->get();
       
        // dd($recipes_count,$cat,$ing);

        return view('admin.dashboard.index',compact('recipes_count','cat','ing'));
    } 
}
