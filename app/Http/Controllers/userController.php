<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Industry;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules;

class userController extends Controller
{
    // <-- Dashboard Page -->
    
    public function AllUser()
    {
       $total_users = User::all()->count();
       $total_companies = Company::all()->count();
       $total_industries = Industry::all()->count();
       $users = User::paginate(10);
       return view('dashboard',[
           'users' => $users,
           'total_users' => $total_users,
           'total_companies' => $total_companies,
           'total_industries' => $total_industries
       ]);
    }

    public function DeleteUser($id)
    {
        $users = User::findOrFail($id);

        $users->delete();

        Toastr::error('User Deleted!!', 'SUCCESS', ["positionClass" => "toast-top-right"]);
    
        return Redirect::route('dashboard' , compact('users'));
    }

    public function EditUser($id)
    {
        $user = User::findOrFail($id);
        return view('pages.editUser',[
            'user' => $user,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'string', 'max:255'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        

        // event(new Registered($user));

        // Auth::login($user);
        Toastr::success('User Added Successfully', 'SUCCESS', ["positionClass" => "toast-top-right"]);

        return redirect('/dashboard');
    }

    public function UpdateUser(Request $request)
    {
        $userId = $request->id;
        $this->validate($request, [
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:users,email,'.$request->id,
            'role'=>'required|string|max:255',
        ]);

        $user = User::findOrFail($userId);
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->save();

        Toastr::success('User Updated Successfully', 'SUCCESS', ["positionClass" => "toast-top-right"]);

        return Redirect::to('/dashboard');
    }

    public function ChangePassword()
    {
        return view('pages.changePass');
    }

    public function UpdatePassword(Request $request)
    {
        $this->validate($request, [
            'old_password'=>'required',
            'new_password'=>'required',
            'password_confirmation'=>'required',
        ]);

        $user = User::findOrFail(Auth::user()->id);

        if (Hash::check($request->old_password, $user->password) )
        {
            if ($request->new_password == $request->password_confirmation)
            {
                $user->password = bcrypt($request->new_password);
                $user->save();

                Toastr::success('Password Changed Successfully', 'SUCCESS');
                return redirect('/changePassword');
            }
            else
            {
                Toastr::error('New & Confirm Password Not Matching!!', 'ERROR');
                return redirect('/changePassword');
            }
        }
        else
        {
            Toastr::error('Old Password Not Matching!!', 'ERROR');
            return redirect('/changePassword');
        }
    }

    public function EditProfile()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('pages.editProfile',[
            'user' => $user,
        ]);
    }

    public function UpdateProfile(Request $request)
    {
        $userId = $request->id;
        $this->validate($request, [
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:users,email,'.$request->id,
        ]);

        $user = User::findOrFail($userId);
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        Toastr::success('Profile Updated Successfully', 'SUCCESS', ["positionClass" => "toast-top-right"]);

        return Redirect::to('/dashboard');
    }
}
