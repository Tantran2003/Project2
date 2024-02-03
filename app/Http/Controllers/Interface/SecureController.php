<?php

namespace App\Http\Controllers\Interface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;
use Auth;
use Bcrypt;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Mail;
use App\Mail\Sendmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SecureController extends Controller
{
    public function login(Request $request)
    {

        if ($request->isMethod('post')) {
            $messages = [
                'email.exists' => 'Email hoặc mật khẩu sai.Vui lòng nhập lại',   //'exists'kiểm tra xem email có tồn tại ko, nếu ko tồn tại in lỗi
                'email.required' => 'Vui lòng nhập email',
                'password.required' => 'Vui lòng nhập mật khẩu',
                'password.min' => 'Mật khẩu ít nhất có 6 ký tự',

            ];
            $this->validate($request, [
                'email' => 'required|email|exists:account,email',
                'password' => 'required|alpha_num|min:6|max:32',
            ], $messages);

            $email = $request->email;
            $password = $request->password;
            $remember = $request->remember;
            if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {


                if (Auth::user()->status == 1) {
                    toastr()->success('Đăng nhập thành công!');
                    return redirect()->route('gd.home');
                } else {
                    Auth::logout();
                    echo "tài khoản bị cấm";
                }
            } else {
                return redirect()->route('gd.login')
                    ->withErrors(['email' => 'Email hoặc mật khẩu sai.Vui lòng nhập lại']) //Được sử dụng để đặt các thông báo lỗi cho người dùng.
                    ->withInput($request->only('email')); //Được sử dụng để giữ lại giá trị trong ô input khi ngdùng nhập sai "dùng hàm only() để giữ lại ô input mình cần giữ"
            }

        } else {
            return view("interface/pages/login");
        }


    }
    public function logout()
    {
        return redirect()->route('gd.home')->with(Auth::logout());
    }
    public function register(Request $request)
    {
        $messages = [
            "email.unique" => 'Email đã được sử dụng. Vui lòng đổi email khác',
            "fullname.required" => 'Vui lòng nhập họ tên',
            "address.required" => 'Vui lòng nhập địa chỉ',
            "email.required" => 'Vui lòng nhập email',
            "phone.required" => 'Vui lòng nhập số điện thoại',
            "password.required" => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu ít nhất có 6 ký tự',

        ];
        if ($request->isMethod('post')) {
            $this->validate($request, [
                "fullname" => "required|min:6|max:32",
                "address" => "required|min:6|max:150",
                "email" => "required|unique:account,email",
                "password" => "required|alpha_num|min:6|max:32",
                "phone" => "required",

            ], $messages);
            $register = new Account();
            $register->fullname = $request->fullname;
            $register->address = $request->address;
            $register->email = $request->email;
            $register->password = bcrypt($request->password);
            $register->phone = $request->phone;
            $register->role = 0;
            $register->save();
            toastr()->success('Đăng ký thành công!');
            return redirect()->route("gd.login");
        } else {
            return view("interface/pages/register");
        }
    }

    // function test()
    // {

    //     $mailData = [
    //         'title' => 'Khôi phục mật khẩu',
    //         'body' => 'Yêu cầu khôi phục mật khẩu của bạn tại web.com đã được chấp nhận.',
    //     ];
    //     Mail::to('nqht123456789@gmail.com')->send(new Sendmail($mailData));
    //     dd('Email send success');
    // }

    public function forgetPassword()
    {
        return view("interface/pages/forget-password");

    }
    public function forgetPasswordPost(Request $request)
    {
        $request->validate([
            'email' => "required|email|exists:account,email",
        ]);
        $token = Str::random(64);
        DB::table('forget_password')->insert([
            'email' => $request->email,
            'token' => $token,

        ]);
        Mail::send("mail.sendmail", ['token' => $token], function ($messages) use ($request) {
            $messages->to($request->email);
            $messages->subject("Reset Password");

        });
        toastr()->success('Email đã được gửi!');
        return redirect()->route("gd.forget");

    }
    function resetPassword($token)
    {
        return view("interface/pages/new-password", compact('token'));

    }
    function resetPasswordPost(Request $request)
    {
        $messages = [
            'password.confirmed' => 'Xác nhận mật khẩu không trùng khớp!!',
            'password.min' => 'Mật khẩu ít nhất có 6 ký tự',
            "password.required" => 'Vui lòng nhập mật khẩu',
            "password_confirmation.required" => 'Vui lòng nhập mật khẩu',
            "email.required" => 'Vui lòng nhập email',
            "email.exists" => 'Email không hợp lệ',

        ];
        $request->validate([
            'email' => "required|email|exists:account,email",
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'

        ], $messages);

        $updatePassword = DB::table('forget_password')->where([
            'email' => $request->email,
            'token' => $request->token
        ])->first();

        if (!$updatePassword) {
            return redirect()->route("gd.resetPassword");

        }
        Account::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
        DB::table('forget_password')->where(["email" => $request->email])->delete();
        toastr()->success('Thay đổi mật khẩu thành công!');
        return redirect()->route("gd.login");

    }

    
///SEND MAIL BOOKING SUCCESS
    
    public function profile()
    {
        $user = Auth::user();
        return view('interface.pages.profile', ['user' => $user]);

    }
    public function editProfileForm()
    {
        $user = Auth::user();
        return view('interface.pages.editprofile', ['user' => $user]);
    }
    public function editProfile(Request $request)
    {
        $user = Auth::user();

        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if ($user) {
            // Validate dữ liệu đầu vào
            $request->validate([
                'fullname' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'phone' => 'required|string|max:15',

            ]);

            // Cập nhật thông tin người dùng
            $user->fullname = $request->input('fullname');
            $user->address = $request->input('address');
            $user->phone = $request->input('phone');


            // Lưu thay đổi
            $user->save();

            // Redirect hoặc trả về view cần thiết sau khi cập nhật
            toastr()->success('Thay đổi thông tin thành công!');
            return redirect()->route('gd.profile');
        }

        // Nếu người dùng chưa đăng nhập, xử lý tương ứng (ví dụ: chuyển hướng đến trang đăng nhập)
        return redirect()->route('gd.home')->with('error', 'User not logged in.');
    }


    public function history()
    {
        if (auth()->check()) {
            $userId = auth()->id(); // Lấy ID của người dùng đã đăng nhập

            $data['orders'] = DB::table('order_momo')
                ->join('bookings', 'order_momo.order_id', '=', 'bookings.order_id_momo')    //'order_momo.order_id', '=', 'bookings.order_id' so sánh từ order_id của 2 bảng (2 cột của 2 bảng phải giống nhau để lấy quan hệ)
                ->where('order_momo.user_id', $userId)
                ->select('order_momo.*', 'bookings.*')
                ->get();
            // Trả về view với dữ liệu lịch sử đặt hàng
            return view('interface.pages.history_order', $data);
        }
    }
    public function showSearchOrderForm()
    {
        return view('interface.pages.searchform');
    }

    public function searchorder(Request $request)
{
    $order_id_momo = $request->input('order_id_momo');

    $order = DB::table('order_momo')
        ->join('bookings', 'order_momo.order_id', '=', 'bookings.order_id_momo')
        ->where('order_momo.order_id', $order_id_momo)
        ->first();

    if ($order) {
        // Order found, return to history_order.blade.php with order data
        $data['orders'] = [$order];
        return view('interface.pages.history_order', $data);
    } else {
        // Order not found, return to history_order.blade.php with alert
        return redirect()->route('gd.history_order')->with('order_not_found', true);
    }
}




}
// \Config::set('app.name', "Khoi phuc mat khau");
// \Config::set('app.url', "http://web.com");
// \Config::set('mail.driver', 'smtp');
// \Config::set('mail.port', 587);
// \Config::set('mail.encryption', 'tls');
// \Config::set('mail.host', 'smtp.gmail.com');
// \Config::set('mail.username', "nqht123456789@gmail.com");
// \Config::set('mail.password', "hftr dolk cibg uwrv");
// $data = [
//     'title' => 'Khôi phục mật khẩu',
//     'mota' => 'Yêu cầu khôi phục mật khẩu của bạn tại web.com đã được chấp nhận.',
//     'dulieu' => 'Mật khẩu mới của bạn là ' . $password,
// ];
// Mail::to($mail)->send(new Sendmail($data));