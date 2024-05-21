<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\DataTables;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct(User $model_units)
    {
        $this->moduleTitle = "User Management";
        $this->moduleName = "User Management";
        $this->moduleRoute = url('admin/user-management');
        $this->moduleView = route('admin_dashboard');
        $this->modelUser = $model_units;

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
        return view('admin.user management.index');
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
            'user_image' => 'required|image',
            'user_name' => 'required',
            'user_email' => 'required|email',
        ]);
        $addData = new User();
        $file = $request->file('user_image');

        if ($file) {
            $file_name = time() . '.' . $file->getClientOriginalExtension();
            $storagePath = config('filesystems.path.storage.user');
            $file->storeAs($storagePath, $file_name, 'public');
            $addData->image = $file_name;
        }
        $addData->name = $request->user_name;
        $addData->email = $request->user_email;
        $addData->save();
        // dd($request->all());
        return response()->json(['status' => 'success', 'message' => 'User Added.']);
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
        $data = User::find($id);
        if (is_null($data)) {
            return response()->json(['status' => 'error', 'message' => 'Data Not Found ']);
        } else {
            return response()->json(['status' => 'success', 'message' => 'User Retrieved.', 'data' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            // 'user_image' => 'required|image',
            // 'status' => 'required|in:0,1',
            'user_name' => 'required',
            'user_email' => 'required|email',
        ]);
        $updateData = User::find($id);
        $file = $request->file('user_image');

        if ($file) {
            $file_name = time() . '.' . $file->getClientOriginalExtension();
            $storagePath = config('filesystems.path.storage.user');
            $imageFile = $storagePath . $updateData->image;

            if (Storage::disk('public')->exists($imageFile)) {
                Storage::disk('public')->delete($imageFile);
            }

            $file->storeAs($storagePath, $file_name, 'public');
            $updateData->image = $file_name;
        }
        $updateData->name = $request->user_name;
        $updateData->email = $request->user_email;
        $updateData->save();
        // dd($request->file('user_image'));
        return response()->json(['status' => 'success', 'message' => 'User Updated.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleteData = User::find($id);
        if (is_null($deleteData)) {
            return response()->json(['status' => 'error', 'message' => 'Data Not Found ']);
        } else {
            $imagePath = config('filesystems.path.storage.user');
            $imageFile = $imagePath . $deleteData->image;

            if (Storage::disk('public')->exists($imageFile)) {
                Storage::disk('public')->delete($imageFile);
            }
            $deleteData->delete();
            return response()->json(['status' => 'success', 'message' => 'User Deleted.']);
        }
    }
    public function getDetails(Request $request)
    {

        $query = User::where('role', '0');

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
        $result->transform(function ($item) {
            $item->formatted_updated_at = Carbon::parse($item->updated_at)->format('d M, Y');
            return $item;
        });

        return Datatables::of($result)
            ->addColumn('formatted_created_at', function ($item) {
                return $item->formatted_created_at;
            })
            ->escapeColumns(['formatted_created_at'])
            ->addColumn('formatted_updated_at', function ($item) {
                return $item->formatted_updated_at;
            })
            ->escapeColumns(['formatted_updated_at'])
            ->addIndexColumn()
            ->make(true);
    }
    // public function changeStatus(Request $request)
    // {
    //     $toogle = User::find($request->id);
    //     if (is_null($toogle)) {
    //         return response()->json(['status' => 'error', 'message' => 'Data Not Found ']);
    //     } else {
    //         $toogle->status = $request->status;
    //         $toogle->save();
    //         return response()->json(['status' => 'success', 'message' => 'Changes Updated']);
    //     }
    // }
}
