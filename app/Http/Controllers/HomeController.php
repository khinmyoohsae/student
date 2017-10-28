<?php

namespace App\Http\Controllers;

//use App\Http\Requests\Request;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Student;
use App\Address;
use DB;
use Session;
use Auth;
use Illuminate\Support\Facades\Redirect;
//use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = \Auth::id();

        $user = User::find($userId);

        //$user = Auth::user();

    
        if($user->admin == 1)
        {
           
            $students = DB::table('students')->get();

            
            $first_address = DB::table('students')
            ->join('addresses', 'students.address_id', '=', 'addresses.id')
            ->select('addresses.home_address')
            ->get();

            $second_address = DB::table('students')
            ->join('addresses', 'students.address_id', '=', 'addresses.id')
            ->select('addresses.current_address')
            ->get();


            return view('admin.index',compact('students','first_address','second_address'));

            //return view('user.index', ['users' => $users]);
        }
        
        return view('home');
    }

     public function show()
    {

        $userId = \Auth::id();

        $user = User::find($userId);

        if($user->admin == 1){

        return view('admin.show',compact('user'));

        }

        return view('home');

    }

    public function change()
    {
        $userId = \Auth::id();

        $user = User::find($userId);

        if($user->admin == 1){

        return view('admin.password',compact('user'));
        }
        return view('home');

    }


    public function update(Request $request,$id)
    {
        $user = Auth::user();
        
        $user->update($request->all());
        $user->save();

        //Flash::message('Your account has been updated!');

        return view('admin.show');
    }

    public function recreate(Request $request,$id)
    {
        $user = Auth::user();
        
        $this->validate($request, [
        'password' => 'required|string|min:6|confirmed'
        ]);

        $request->user()->fill([

            'password' => Hash::make($request->password)

        ])->save();
        
        //$user->save();

        return view('admin.show');
    }
}
