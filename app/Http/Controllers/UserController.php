<?php

namespace App\Http\Controllers;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $query = User::query();


        if($request->name){
                    $query->where('name', 'like', '%' . $request->name . '%');
        }

        if($request->mobile_number){
            $query->where('mobile_number', 'like', '%' . $request->mobile_number . '%');
        }

        if ($request->state) {
            $query->where('state', $request->state);
        }

        if ($request->city) {
            $query->where('city', $request->city);
        }

        if ($request->start_date) {
            $query->where('created_at', '>=', $request->start_date);
        }

        if ($request->end_date) {
            $query->where('created_at', '<=', $request->end_date);
        }

        $users = $query->sortable()->paginate(2);

        // Fetch distinct states and cities for dropdowns
        $states = User::distinct()->pluck('state')->toArray();
        $cities = User::distinct()->pluck('city')->toArray();

        return view('User.Index', compact('users', 'states', 'cities','request'));
    }

    public function edit($id)
    {

        // dd($id);
        $user = User::findOrFail($id);

        // dd($user);
        // Session::put('previous_url', url()->previous());

        // dd(Session::get('previous_url'));

    }
    
}
