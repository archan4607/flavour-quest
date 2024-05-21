<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Models\Categories;
use App\Models\Ingredients;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function __construct(Categories $model_categories)
    {
        $this->moduleTitle = "Category Management";
        $this->moduleName = "Category Management";
        $this->moduleRoute = url('admin');
        $this->moduleView = route('admin_dashboard');
        $this->modelUser = $model_categories;

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
        return view('admin.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'categories_status' => 'required',
            'categories_name' => 'required',
        ]);
        $categories = new Categories();

        if ($request->categories_type == 1) {
            $categories->parent_category_id = $request->parent_category_id;
        }
        $categories->name = $request->categories_name;
        $categories->status = $request->categories_status;
        $categories->save();
        // dd($request->all());
        return response()->json(['status' => 'success', 'message' => 'Category Added.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Categories::withoutGlobalScope('published')->find($id);
        if (is_null($data)) {
            return response()->json(['status' => 'error', 'message' => 'Data Not Found']);
        } else {
            return response()->json(['status' => 'success', 'message' => 'Category Retrieved.', 'data' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'categories_status' => 'required',
            'categories_name' => 'required',
        ]);
        $categories = Categories::withoutGlobalScope('published')->where('id', $id)->first();
        if ($request->categories_type == 1) {
            $categories->parent_category_id = $request->parent_category_id;
        }
        $categories->name = $request->categories_name;
        $categories->status = $request->categories_status;
        $categories->save();
        // dd($request->all());
        return response()->json(['status' => 'success', 'message' => 'Category Updated.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $category_master = Categories::withoutGlobalScope('published')->find($request->id);
        if (is_null($category_master)) {
            return response()->json(['status' => 'error', 'message' => 'Data Not Found ']);
        } else {
            $sub_find = Categories::withoutGlobalScope('published')->where('parent_category_id', $request->id)->get();
            $sub_find2 = Ingredients::withoutGlobalScope('published')->where('category_id', $request->id)->get();
            foreach($sub_find as $value){
                $value->parent_category_id = null;
                $value->save();
            }
            foreach($sub_find2 as $value){
                $value->category_id = null;
                $value->save();
            }

            $category_master->delete();
            return response()->json(['status' => 'success', 'message' => 'Category Deleted.']);
        }
    }
    public function getDetails(Request $request)
    {
        $query = Categories::withoutGlobalScope('published')
            ->leftJoin('categories as parent', 'parent.id', '=', 'categories.parent_category_id')
            ->select('categories.id as id', 'categories.image', 'categories.status as status', 'categories.name as child_name', 'parent.name as parent_name',  'categories.created_at as created_at');

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
        $toogle = Categories::withoutGlobalScope('published')->find($request->id);
        if (is_null($toogle)) {
            return response()->json(['status' => 'error', 'message' => 'Data Not Found ']);
        } else {
            $toogle->status = $request->status;
            $toogle->save();
            return response()->json(['status' => 'success', 'message' => 'Changes Updated']);
        }
    }
    public function fetchCategories()
    {
        $category = Categories::whereNull('parent_category_id')->get();
        return response()->json($category);
    }
}
