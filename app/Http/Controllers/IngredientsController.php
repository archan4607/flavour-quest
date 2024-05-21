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

class IngredientsController extends Controller
{
    public function __construct(Ingredients $model_categories)
    {
        $this->moduleTitle = "Ingredients Management";
        $this->moduleName = "Ingredients Management";
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
        $category = Categories::withoutGlobalScope('published')->whereNull('parent_category_id')->get();
        return view('admin.ingredients.index',compact('category'));
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
            'status' => 'required',
            'name' => 'required',
        ]);
        $addData = new Ingredients();

        $addData->category_id = $request->category_select;
        $addData->name = $request->name;
        $addData->status = $request->status;
        $addData->save();
        // dd($request->all());
        return response()->json(['status' => 'success', 'message' => 'Ingredients Added.']);
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
        $data = Ingredients::withoutGlobalScope('published')->find($id);
        // dd($id);
        if (is_null($data)) {
            return response()->json(['status' => 'error', 'message' => 'Data Not Found']);
        } else {
            return response()->json(['status' => 'success', 'message' => 'Ingredients Retrieved.', 'data' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required',
            'name' => 'required',
        ]);
        $updateData = Ingredients::withoutGlobalScope('published')->where('id', $id)->first();
        $updateData->category_id = $request->category_select;
        $updateData->name = $request->name;
        $updateData->status = $request->status;
        $updateData->save();
        // dd($request->all());
        return response()->json(['status' => 'success', 'message' => 'Ingredients Updated.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Ingredients $ingredients)
    {
        $category_master = Ingredients::withoutGlobalScope('published')->find($request->id);
        if (is_null($category_master)) {
            return response()->json(['status' => 'error', 'message' => 'Data Not Found ']);
        } else {
            $category_master->delete();
            return response()->json(['status' => 'success', 'message' => 'Ingredients Deleted.']);
        }
    }
    public function getDetails(Request $request)
    {
        $query = Ingredients::withoutGlobalScope('published')
            ->leftjoin('categories', 'categories.id', '=', 'ingredients.category_id')
            ->select('ingredients.id as id', 'ingredients.name as ing_name', 'ingredients.status as status', 'categories.name as cat_name');

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
        $toogle = Ingredients::withoutGlobalScope('published')->find($request->id);
        if (is_null($toogle)) {
            return response()->json(['status' => 'error', 'message' => 'Data Not Found ']);
        } else {
            $toogle->status = $request->status;
            $toogle->save();
            return response()->json(['status' => 'success', 'message' => 'Changes Updated']);
        }
    }
}
