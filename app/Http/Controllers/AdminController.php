<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Staff;
use App\Models\CustomerGeoTagging;
use App\Models\User;
use App\Models\District;
use App\Models\Feedback;
use App\Models\LocalBody;
use App\Models\Product;
use App\Models\StaffFeedback;
use App\Models\Ward;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function index()
    {
        $products = Product::where('status', 1)->latest()->get();
        return view('index', compact('products'));
    }

    public function adminlogin()
    {
        return view('admin.login');
    }

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function account()
    {
        if (Auth::user()->role == 'Admin') :
            return redirect()->route('admin.dashboard');
        elseif (Auth::user()->role == 'Staff') :
            return redirect()->route('staff.dashboard');
        else :
            return redirect()->route('user.dashboard');
        endif;
    }

    public function admindashboard()
    {
        return view('admin.dashboard');
    }

    public function staffdashboard()
    {
        return view('staff.dashboard');
    }

    public function userdashboard()
    {
        return view('account');
    }

    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'mobile' => 'required|numeric|digits:10',
            'password' => 'required',
        ]);
        try {
            $credentials = $request->only('mobile', 'password');
            $credentials['status'] = 1;
            if (Auth::attempt($credentials)) {
                return redirect()->route('account')
                    ->with("success", "User logged in successfully");
            }
            return redirect()->back()->with("error", "Invalid Credentials")->withInput($request->all());
        } catch (Exception $e) {
            return redirect()->back()->with("error", $e->getMessage())->withInput($request->all());
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        $role = $request->user()->role;
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        if ($role == 'Admin') :
            return redirect()->route('admin.login')->with("success", "User logged out successfully");
        else :
            return redirect()->route('login')->with("success", "User logged out successfully");
        endif;
    }

    public function signup(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'mobile' => 'required|numeric|digits:10|unique:users,mobile',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required'
        ]);
        $input = $request->all();
        $input['password'] = bcrypt($request->password);
        $input['status'] = 1;
        $input['role'] = 'User';
        User::create($input);
        return redirect()->route('login')->with("success", "User registered successfully");
    }

    public function userselfupdate(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'mobile' => 'required|numeric|digits:10|unique:users,mobile,' . $id,
            'address' => 'required',
            'status' => 'required',
            'role' => 'required',
        ]);
        $input = $request->all();
        $user = User::findOrFail($id);
        $input['password'] = ($request->password) ? bcrypt($request->password) : $user->getOriginal('password');
        $user->update($input);
        return redirect()->back()->with("success", "User updated successfully");
    }

    public function districts()
    {
        $districts = District::all();
        return view('admin.district.index', compact('districts'));
    }

    public function localbodies()
    {
        $lbs = LocalBody::all();
        return view('admin.lb.index', compact('lbs'));
    }

    public function feedback()
    {
        $feeds = Feedback::where('user_id', Auth::id())->get();
        return view('feedback', compact('feeds'));
    }

    public function feedbacksave(Request $request)
    {
        $this->validate($request, [
            'feedback' => 'required',
            'type' => 'required',
        ]);
        $input = $request->all();
        $input['user_id'] = Auth::id();
        Feedback::create($input);
        return redirect()->back()->with("success", "Feedback submitted successfully");
    }

    public function geotagginglist()
    {
        $geos = CustomerGeoTagging::where('created_by', Auth::id())->get();
        return view('staff.geo-list', compact('geos'));
    }

    public function geotagging()
    {
        $lbs = LocalBody::leftJoin('districts as d', 'd.id', 'local_bodies.district_id')->selectRaw("CONCAT_WS(' -- ', local_bodies.name, d.name) AS name, local_bodies.id as id")->get();
        $districts = District::all();
        $wards = Ward::all();
        $products = Product::all();
        return view('staff.geo-tagging', compact('lbs', 'districts', 'wards', 'products'));
    }

    public function geotaggingsave(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required',
            'customer_name' => 'required',
            'mobile' => 'required|numeric|digits:10',
            'location' => 'required',
            'localbody_id' => 'required',
            'district_id' => 'required',
            'ward_id' => 'required',
        ]);
        $input = $request->all();
        $input['created_by'] = $request->user()->id;
        CustomerGeoTagging::create($input);
        return redirect()->route('staff.geo.tagging.list')->with("success", "Tagged Successfully");
    }

    public function stafffeedback()
    {
        $customers = CustomerGeoTagging::all();
        $products = Product::where('status', 1)->get();
        $feedbacks = StaffFeedback::where('created_by', Auth::id())->get();
        return view('staff.feedback', compact('customers', 'products', 'feedbacks'));
    }

    public function stafffeedbacksave(Request $request)
    {
        $this->validate($request, [
            'remarks' => 'required',
            'status' => 'required',
            'product_id' => 'required',
            'remarks' => 'required',
            'user_id' => 'required'
        ]);
        $input = $request->all();
        $input['created_by'] = Auth::id();
        StaffFeedback::create($input);
        return redirect()->back()->with("success", "Feedback submitted successfully");
    }

    public function getDdlData(string $id, string $type)
    {
        $data = ($type == 'lb') ? Ward::where('localbody_id', $id)->get() : LocalBody::where('district_id', $id)->get();
        return response()->json($data);
    }
}
