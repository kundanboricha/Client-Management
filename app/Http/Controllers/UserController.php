<?php

namespace App\Http\Controllers;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Flash;

use App\Models\User;

class UserController extends Controller
{

    public function index(Request $request)
    {
        try {
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

        $users = $query->sortable()->latest()->paginate(2);

        // Fetch distinct states and cities for dropdowns

        $states = User::distinct()->pluck('state')->toArray();
        $cities = User::distinct()->pluck('city')->toArray();

        return view('User.Index', compact('users', 'states', 'cities','request'));
    } catch (\Exception $e) {
        return back()->withError('An error occurred: ' . $e->getMessage());
    }
    }

    public function edit($id)
    {
        try {
            $users = User::findOrFail($id);
            Session::put('previous_url', url()->previous());
            $states = User::distinct()->pluck('state')->toArray();
            $cities = User::distinct()->pluck('city')->toArray();
            return view('User.Edit', compact('users', 'states', 'cities'));
        } catch (ModelNotFoundException $e) {
            return back()->withError('User not found.');
        } catch (\Exception $e) {
            return back()->withError('An error occurred: ' . $e->getMessage());
        }

    }

    public function create()
    {   

        try {
            $cities = User::distinct()->pluck('city')->toArray();
            $states = User::distinct()->pluck('state')->toArray();
            return view('User.Create', compact('cities', 'states'));
        } catch (\Exception $e) {
            // Handle any exceptions
            return back()->withError('An error occurred: ' . $e->getMessage());
        }
    }
    
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'mobile_number' => 'required|string|max:255',
            'email' => 'nullable|string|email|max:255',
            'gender' => 'required',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'address' => 'nullable|string',
        ]);

        try{
        $hashedPassword = Hash::make($validatedData['password']);
        $genderValue = ($validatedData['gender'] == 'male') ? 1 : 2;

        $user = new User();
        $user->name = $validatedData['name'];
        $user->mobile_number = $validatedData['mobile_number'];
        $user->email = $validatedData['email'];
        $user->gender = $genderValue;
        $user->city = $validatedData['city'];
        $user->state = $validatedData['state'];
        $user->password = $hashedPassword;
        $user->address = $validatedData['address'];
        $user->save();
        return redirect()->route('users.index')->with('success', 'User created successfully!');
        }
        catch (\Exception $e) {
            return back()->withError('An error occurred: ' . $e->getMessage())->withInput();
        }
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|string|email|max:255',
            'password' => 'confirmed',
        ]);

        try{
        $users = User::find($request->user_id);
        $users->name  = $request->name;
        $users->email   = $request->email;
        if(!empty($request->password)){
            $users->password  = Hash::make($request->password);
        }
        $users->save();
        $previousUrl = Session::get('previous_url');

        session()->flash('success', 'User Updated  Succesfulll.');
        return redirect(session()->get('previous_url', route('users.index')));
    }
    catch (\Exception $e) {
        return back()->withError('An error occurred: ' . $e->getMessage())->withInput();
    }
    }
    public function delete($id)
    {
        try {
            $users = User::findOrFail($id);
            $users->delete();
            return redirect()->route('users.index')->with('success', 'User deleted successfully!');
        } catch (\Exception $e) {
            return back()->withError('An error occurred: ' . $e->getMessage());
        }
    }
}
