<?php

namespace App\Http\Controllers;

use App\Models\Recipes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Carbon\Carbon;
use App\Models\Images;
use App\Models\Categories;
use App\Models\Ingredients;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class RecipesController extends Controller
{
    public function __construct(Recipes $model_recipes)
    {
        $this->moduleTitle = "Recipes Management";
        $this->moduleName = "Recipes Management";
        $this->moduleRoute = url('admin');
        $this->moduleView = route('admin_dashboard');
        $this->modelUser = $model_recipes;

        View::share('module_title', $this->moduleTitle);
        View::share('module_name', $this->moduleName);
        View::share('module_route', $this->moduleRoute);
        View::share('moduleView', $this->moduleView);

        // $this->statusCodes = config("aazovo-status-code.status_codes");

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.recipe.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::all();
        $ingredients = Ingredients::all();

        return view('admin.recipe._form', compact('categories', 'ingredients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'recipe_thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'status' => 'required',
                'categories' => 'required',
                'recipe_name' => 'required',
                'short_description' => 'required',
                'instruction' => 'required',
                'direction' => 'required',
                'serve' => 'required|numeric',
                'preparation_time' => 'required',
                'cooking_time' => 'required',
            ]);
            // dd($request->all());
            $add = new Recipes();
            $file = $request->file('recipe_thumbnail');

            if ($file) {
                $file_name = time() . '.' . $file->getClientOriginalExtension();

                // Store the file using the configured storage path            
                $storagePath = config('filesystems.path.storage.recipe');

                $file->storeAs($storagePath, $file_name, 'public');

                $add->image = $file_name;
            }
            // $add->image_ids = "upload failed";
            $add->status = $request->status;
            $add->name = $request->recipe_name;
            $add->description = $request->short_description;
            $add->instruction = $request->instruction;
            $add->direction = $request->direction;
            $add->serve = $request->serve;
            $add->preparation_time = $request->preparation_time;
            $add->cooking_time = $request->cooking_time;


            // //reference insert
            $add->contain_egg  = $request->contain_egg;
            $add->type = $request->type_select;

            // //item contains array
            if (!is_null($request->categories)) {
                $categoriesString = implode(',', $request->categories); //it convet array with comman(,) string
                $add->category_id = $categoriesString;
            }
            if (!is_null($request->ingredients)) {
                $categoriesString = implode(',', $request->ingredients); //it convet array with comman(,) string
                $add->ingredients_id = $categoriesString;
            }
            $add->save();
            $lastInsertedId = $add->id;


            return response()->json(['status' => 'success', 'message' => 'Recipe created successfully.']);
        } catch (Exception $e) {
            // Handle other exceptions
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Recipes $recipes, string $id)
    {
        $recipe = Recipes::withoutGlobalScope('published')->where('id', $id)->first();
        if ($recipe) {
            $categoryIds = explode(',', $recipe->category_id);
            $categoryNames = [];

            foreach ($categoryIds as $categoryId) {
                $categoryName = Categories::withoutGlobalScope('published')->where('id', $categoryId)->value('name');
                if ($categoryName) {
                    $categoryNames[] = $categoryName;
                }
            }
            $recipe->category_id = implode(', ', $categoryNames);

            $ingredientIds = explode(',', $recipe->ingredients_id);
            $categoryNames = [];

            foreach ($ingredientIds as $ingredientId) {
                $ingredientName = Ingredients::withoutGlobalScope('published')->where('id', $ingredientId)->value('name');
                if ($ingredientName) {
                    $ingredientNames[] = $ingredientName;
                }
            }
            $recipe->ingredients_id = implode(', ', $ingredientNames);
        }

        $images = Images::where('recipe_id', $id)->get();

        return view('admin.recipe.view', compact('recipe', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipes $recipes, string $id)
    {
        $recipesDetail = Recipes::withoutGlobalScope('published')->where('id',$id)->first();
        $categories = Categories::all();
        $ingredients = Ingredients::all();
        // dd($recipesDetail, $categories, $ingredients); 
        return view('admin.recipe._form', compact('recipesDetail', 'categories', 'ingredients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipes $recipes, string $id)
    {
        try {
            $this->validate($request, [
                // 'recipe_thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'status' => 'required',
                'categories' => 'required',
                'recipe_name' => 'required',
                'short_description' => 'required',
                'instruction' => 'required',
                'direction' => 'required',
                'serve' => 'required|numeric',
                'level' => 'required',
                'preparation_time' => 'required',
                'cooking_time' => 'required',
            ]);

            $update = Recipes::withoutGlobalScope('published')->find($id);
            // dd($update);
            // dd($request->all());

            $file = $request->file('recipe_thumbnail');
            if ($file) {
                $file_name = time() . '.' . $file->getClientOriginalExtension();
                // Store the file using the configured storage path            
                $storagePath = config('filesystems.path.storage.recipe');

                $imageFile = $storagePath . $update->image;

                if (Storage::disk('public')->exists($imageFile)) {
                    Storage::disk('public')->delete($imageFile);
                }

                $file->storeAs($storagePath, $file_name, 'public');
                $update->image = $file_name;
            }

            // $update->image_ids = "upload failed";
            $update->status = $request->status;
            $update->name = $request->recipe_name;
            $update->description = $request->short_description;
            $update->instruction = $request->instruction;
            $update->direction = $request->direction;
            $update->serve = $request->serve;
            $update->level = $request->level;
            $update->preparation_time = $request->preparation_time;
            $update->cooking_time = $request->cooking_time;


            // //reference insert
            $update->contain_egg  = $request->contain_egg;
            $update->type = $request->type_select;

            // //item contains array
            if (!is_null($request->categories)) {
                $categoriesString = implode(',', $request->categories); //it convet array with comman(,) string
                $update->category_id = $categoriesString;
            }
            if (!is_null($request->ingredients)) {
                $categoriesString = implode(',', $request->ingredients); //it convet array with comman(,) string
                $update->ingredients_id = $categoriesString;
            }
            $update->save();
            // $lastInsertedId = $update->id;

            return response()->json(['status' => 'success', 'message' => 'Recipe updated successfully.']);
        } catch (Exception $e) {
            // Handle other exceptions
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipes $recipes, string $id, Request $request)
    {
        $recipes = Recipes::withoutGlobalScope('published')->find($request->id);
        if (is_null($recipes)) {
            return response()->json(['status' => 'error', 'message' => 'Data Not Found ']);
        } else {
            $images = Images::where('recipe_id', $id)->get();

            foreach ($images as $image) {
                $imagePath = config('filesystems.path.storage.recipe');
                $imageFile = $imagePath . $image->image;

                if (Storage::disk('public')->exists($imageFile)) {
                    Storage::disk('public')->delete($imageFile);
                }

                $image->delete();
            }

            // Delete the image file
            $imagePath = config('filesystems.path.storage.recipe');
            $imageFile = $imagePath . $recipes->image_id;

            if (Storage::disk('public')->exists($imageFile)) {
                Storage::disk('public')->delete($imageFile);
            }
            $recipes->delete();
            return response()->json(['status' => 'success', 'message' => 'Product Deleted Successfully ']);
        }
    }
    public function getDetails(Request $request)
    {
        $query = Recipes::withoutGlobalScope('published');

        if (!is_null($request->status)) {
            if (isset($request->status) && !empty($request->status)) {
                $query->where("status", $request->status);
            } else {
                if ($request->status == 0) {
                    $query->where("status", $request->status);
                }
            }
        }

        // Apply the 'created_at' date filter
        if (isset($request->created_at) && !empty($request->created_at)) {
            $exp_created_at = explode(" - ", $request->created_at);

            $fromDate = date("Y-m-d", strtotime($exp_created_at[0]));
            $toDate = date("Y-m-d", strtotime($exp_created_at[1]));

            $query->whereDate("created_at", '>=', $fromDate)
                ->whereDate("created_at", '<=', $toDate);
        }

        $result = $query->get();

        $result->transform(function ($item) {
            $item->formatted_created_at = Carbon::parse($item->created_at)->format('d M, Y');
            return $item;
        });

        return Datatables::of($result)
            ->addColumn('formatted_created_at', function ($item) {
                return $item->formatted_created_at;
            })
            ->escapeColumns(['formatted_created_at'])
            ->addIndexColumn()
            ->make(true);
    }
    public function changeStatus(Request $request)
    {
        $toogle = Recipes::withoutGlobalScope('published')->find($request->id);
        if (is_null($toogle)) {
            return response()->json(['status' => 'error', 'message' => 'Data Not Found ']);
        } else {
            $toogle->status = $request->status;
            $toogle->save();
            return response()->json(['status' => 'success', 'message' => 'Changes Updated']);
        }
    }
    public function imageFetch(Request $request)
    {
        $request->validate([
            'file' => 'image|max:1024|dimensions:max_width=1024,max_height=1024',
        ]);
        $recipe_images = Images::where('recipe_id', $request->id)->get();
        // $recipe_images = null;
        return response()->json(['status' => 'success', 'message' => 'Images Fetched Successfully', 'data' => $recipe_images]);
    }
    public function imageUpload(Request $request)
    {
        $add_img = new Images();

        $file = $request->file('file');
        if ($file) {
            $file_name = time() . '.' . $file->getClientOriginalExtension();

            // Store the file using the configured storage path            
            $storagePath = config('filesystems.path.storage.recipe');

            $file->storeAs($storagePath, $file_name, 'public');

            $add_img->image = $file_name;
        }
        $add_img->recipe_id = $request->productId;
        $add_img->save();
        return response()->json(['status' => 'success', 'message' => 'Images Added Successfully']);
    }
    public function imageDelete(Request $request)
    {
        $product = Images::find($request->id);
        if (is_null($product)) {
            return response()->json(['status' => 'error', 'message' => 'Data Not Found ']);
        } else {
            // Delete the image file
            $imagePath = config('filesystems.path.storage.recipe');
            $imageFile = $imagePath . $product->image;

            if (Storage::disk('public')->exists($imageFile)) {
                Storage::disk('public')->delete($imageFile);
            }
            $product->delete();
            return response()->json(['status' => 'success', 'message' => 'Image Deleted Successfully ']);
        }
    }
    public function publisToUnpublish(Request $request)
    {
        $data = Recipes::withoutGlobalScope('published')->find($request->id);
        if (is_null($data)) {
            return response()->json(['status' => 'error', 'message' => 'Data Not Found ']);
        } else {
            $data->status = $request->status;
            $data->save();
            return response()->json(['status' => 'success', 'message' => 'Changes Updated']);
        }
    }
    public function unpublishToPublish(Request $request)
    {
        $data = Recipes::withoutGlobalScope('published')->find($request->id);
        if (is_null($data)) {
            return response()->json(['status' => 'error', 'message' => 'Data Not Found ']);
        } else {
            $data->status = $request->status;
            $data->save();
            return response()->json(['status' => 'success', 'message' => 'Changes Updated']);
        }
    }
    public function detailRecipe($id)
    {
        $data = Recipes::find($id);

        if (is_null($data)) {
            return back();
        } else {
            $categoryIds = explode(',', $data->category_id);
            $categoryNames = Categories::whereIn('id', $categoryIds)->pluck('name')->implode(', ');
            $data->category_names = $categoryNames;

            $cat_recipes = Recipes::where(function ($query) use ($categoryIds) {
                foreach ($categoryIds as $categoryId) {
                    $query->orWhereRaw("FIND_IN_SET(?, category_id)", [$categoryId]);
                }
            })->limit(6)->get();
            // dd($cat_recipes);

            return view('front.recipes_details', compact('data', 'cat_recipes'));
        }
    }
    public function recipeList()
    {
        $data = Recipes::paginate(6);
        // dd($data);
        if (is_null($data)) {
            return back();
        } else {
            return view('front.recipes', compact('data'));
        }
    }
    public function recipeSearch(Request $request)
    {
        // dd($request->all());
        
        $searchTerm = $request->search_recipe; 

        $data = Recipes::where('name', 'like', '%' . $searchTerm . '%')
            ->orWhere('description', 'like', '%' . $searchTerm . '%')
            // ->orWhere('ingredients', 'like', '%' . $searchTerm . '%')
            ->paginate(6);
        // dd($data);
        return view('front.recipes', compact('data'));

    }
    public function ingredientSearch(Request $request)
    {
        $data = Ingredients::where('status',0)->get();
        // dd($data);
        return view('front.ingredient_search', compact('data'));

    }
    public function categoriesSearch(Request $request)
    {
        $data = Categories::where('status',0)->get();
        // dd($data);
        return view('front.categories_search', compact('data'));

    }
    public function categoriesSearchResult(Request $request)
    {
        $temp_array = [];
        $ing_select = $request->ing_select;

        for ($i = 0; $i < count($ing_select); $i++) {
            $temp_ing_select = array_slice($ing_select, 0, $i + 1);
            $string = implode(',', $temp_ing_select);
            $data = Recipes::where('category_id', $string)->first();
            if ($data) {
                $temp_array[] = $data->id;
            }
        }

        foreach ($ing_select as $ingredient) {
            $recipes = Recipes::whereRaw("FIND_IN_SET(?, category_id)", [$ingredient])->get();
            foreach ($recipes as $recipe) {
                $temp_array[] = $recipe->id;
            }
        }

        $temp_array = array_values(array_unique($temp_array));

        // $data = Recipes::whereIn('id', $temp_array)->paginate(9);
        $data = Recipes::whereIn('id', $temp_array)->get();

// dd($data);
        return view('front.recipes', compact('data'));
    }
    public function ingredientSearchResult(Request $request)
    {
        $temp_array = [];
        $ing_select = $request->ing_select;

        for ($i = 0; $i < count($ing_select); $i++) {
            $temp_ing_select = array_slice($ing_select, 0, $i + 1);
            $string = implode(',', $temp_ing_select);
            $data = Recipes::where('ingredients_id', $string)->first();
            if ($data) {
                $temp_array[] = $data->id;
            }
        }

        foreach ($ing_select as $ingredient) {
            $recipes = Recipes::whereRaw("FIND_IN_SET(?, ingredients_id)", [$ingredient])->get();
            foreach ($recipes as $recipe) {
                $temp_array[] = $recipe->id;
            }
        }

        $temp_array = array_values(array_unique($temp_array));

        // $data = Recipes::whereIn('id', $temp_array)->paginate(9);
        $data = Recipes::whereIn('id', $temp_array)->get();


        return view('front.recipes', compact('data'));
    }

}
