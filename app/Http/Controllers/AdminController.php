<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\User;
use App\Models\Mojrem;
use App\Models\Privilage;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Morilog\Jalali\Jalalian;
use Symfony\Component\HttpFoundation\File\File;

class AdminController extends Controller
{

    public function index()
    {
        $admin = User::all();
        return view('admin.list_admin', compact('admin'));
    }

    public function home()
    {
        if (Auth::check())
        {
            $mojrem = Mojrem::all();
            $admin = User::all();
            return view('admin.main', compact('admin','mojrem'));
        } else {
            return redirect()->route('login');
        }
    }
    public function create()
    {
        return view('admin.add_admin');
    }

    public function store(Request $request)
    {
//        $data = [
//            'first_name' => $request['first_name'],
//            'last_name' => $request['last_name'],
//            'username' => $request['username'],
//            'password' => bcrypt($request['password']),
//            'level' => $request['level'],
//        ];
        $data['first_name'] = $request->input('first_name');
        $data['last_name'] = $request->input('last_name');
        $data['username'] = $request->input('username');
        $data['password'] = bcrypt($request->input('password'));
        $data['level'] = $request->input('level');
        $admin_photo = time() . '.' . $request->file('admin_photo')->getClientOriginalExtension();
        $result = $request->file('admin_photo')->move(public_path('img/admin_photos'), $admin_photo);
        if ($result instanceof File) {
            $data['image_name'] = $admin_photo;
        }

        $admin = new User();
        $admin->first_name = $data["first_name"];
        $admin->last_name = $data["last_name"];
        $admin->username = $data["username"];
        $admin->password = $data["password"];
        $admin->level = $data["level"];
        $admin->image_name = $data['image_name'];
        $admin->save();
        if ($data['level'] == '1') {
            $p = array(
                'user_id' => $admin->id,
                'read_person' => '1',
                'write_person' => '1',
                'delete_person' => '1',
                'add_admin' => '1'
            );
        } else {
            $p = array(
                'user_id' => $admin->id,
                'read_person' => '1',
                'write_person' => '0',
                'delete_person' => '0',
                'add_admin' => '0'
            );
        }
        Privilage::create($p);
        if ($admin) {
            return redirect()->route('admin.list', compact('admin'))->with('success', __('مدیر جدید با موفقیت اضافه شد'));
        }
    }

    public function edit($id)
    {
        $admin = User::find($id);
        if ($admin->level == 1){
            return redirect()->back()->with('permissionError', __('شما اجازه ویرایش مدیر درجه اول را ندارید'));
        }
        $privilage = DB::table('privilage')
            ->join('users','id', '=', 'user_id' )
            ->select()
            ->where('user_id', $id)
            ->get();
        return view('admin.admin_privilage', compact('privilage'));
    }

    public function update(Request $request, $id)
    {
        $level = $request->input('level');
        if ($level == 1) {
            $data = [
                'user_id' => $id,
                'read_person' => '1',
                'write_person' => '1',
                'delete_person' => '1',
                'add_admin' => '1'
            ];

            $user_level['level'] = 1;
            $user = DB::table('users')->where('id', $id)->update($user_level);
            $privilage = DB::table('privilage')->where('user_id', $id)->update($data);
        } else {
            $data = [
                'user_id' => $id,
                'write_person' => $request->input('write_p'),
                'delete_person' => $request->input('delete_p'),
                'add_admin' => $request->input('add_p'),
            ];
            $privilage = DB::table('privilage')->where('user_id', $id)->update($data);

        }

        return redirect()->route('admin.list');


    }

    public function destroy($id)
    {
        if ($id && ctype_digit($id)) {
            $adminItem = User::find($id);
            if ($adminItem && $adminItem instanceof User) {
                $adminItem->delete();
                return redirect()->route('admin.list')->with('success', __('مدیر مورد نظر با موفقیت حذف گردید.'));
            }
        }
    }

    public function login()
    {
        return view('Auth.login');
    }

    public function dologin(Request $request)
    {
        if (Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password')]))
        {
            // $admin = User::all();
            // $mojrem = Mojrem::all();
            return redirect()->route('home');
        }
        return redirect()->back()->with('loginError', __('ایمیل یا کلمه عبور اشتباه می باشد'));
    }

//    Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

//    Profile
    public function profile()
    {
        return view('admin.profile');
    }

    public function profile_update(Request $request)
    {
        $data = [
          'first_name' =>  $request->input('first_name'),
          'last_name' =>  $request->input('last_name'),
          'username' =>  $request->input('username'),
          'password' =>  bcrypt($request->input('password')),
        ];
        if (!$request->file('admin_photo'))
        {
            $data['image_name'] = Auth::user()->image_name;
            $admin = User::find(Auth::user()->id);
            if ($admin)
            {
                User::update_profile($data, Auth::user()->id);
            }
            return redirect()->back()->with('success', __('کاربر مورد نظر با موفقیت ویرایش شد.'));
        } else{
            $admin_photo = time().'.'.$request->file('admin_photo')->getClientOriginalExtension();
            $result = $request->file('admin_photo')->move(public_path('img/admin_photos'), $admin_photo);
            if ($result instanceof File) {
                $data['image_name'] = $admin_photo;
            }

            $admin = User::update_profile($data, Auth::user()->id);
            return redirect()->back()->with('success', __('کاربر مورد نظر با موفقیت ویرایش شد.'));

        }
    }


// About
    public function about()
    {
        return view('admin.about');
    }

    public function setting()
    {
        return view('admin.setting');
    }

//    General Report
    public function report()
    {
        $mojrem = Mojrem::all();
        return view('admin.report', compact('mojrem'));
    }
    public function general_report(Request $request)
    {
        $start_date =  date($request->input('start_date')) ;
        $end_date =   date($request->input('end_date')) ;
        $mojrems = DB::table('person')->whereBetween('date', [$start_date, $end_date])->paginate(6);
        return view('admin.report', compact('mojrems', 'start_date', 'end_date'));
    }
//    Yearly report
    public function year_r()
    {
        return view('admin.yearly_report');
    }
    public function yearly_report(Request $request)
    {
        $getyear = $request->get('year');
        $year_date = explode('/', $getyear);
        $final_year = $year_date[0];
        $startfrom = $final_year . '-01-01';
        $end = $final_year . '-12-30';
        $mojrems = DB::table('person')
            ->select()
            ->whereBetween('date', [$startfrom, $end])
            ->paginate(6);

        return view('admin.yearly_report', compact('mojrems', 'getyear'));
    }
//  Monthly Report
    public function month_r()
    {
        return view('admin.montly_report');
    }
    public function monthly_report(Request $request)
    {
        $jmonth = $request->get('month');

        if($jmonth <1 && $jmonth > 12) {
            return redirect()->route()->back()->with('error', __('ماه مورد نظر اشتباه میباشد'));
        }
        $jyear = Jalalian::fromCarbon(Carbon::now())->getYear();
        $jday = Jalalian::fromCarbon(Carbon::now())->getDay();

        $start_month_date = '';
        if ($jmonth < 10) {
            $start_month_date = $jyear . '-0' . $jmonth . '-01';
        } else {
            $start_month_date = $jyear . '-' . $jmonth . '-01';
        }

        $jdate = '';
        if ($jmonth < 10 && $jday > 9) {
            $jdate = $jyear . '-0' . $jmonth . '-' . $jday;
        } elseif ($jday < 10 && $jmonth > 9) {
            $jdate = $jyear . '-' . $jmonth . '-0' . $jday;

        } elseif ($jmonth < 10 && $jday < 10) {
            $jdate = $jyear . '-0' . $jmonth . '-0' . $jday;
        }

        $mojrems = DB::table('person')
            ->select()
            ->whereBetween('date', [$start_month_date, $jdate])
            ->get();
        return view('admin.montly_report', compact('mojrems','jmonth'));
    }
}
