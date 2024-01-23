<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;
use Bcrypt;

class AccountController extends Controller
{
    public function account()
    {
      $data["account"] = Account::get();
      return view("admin/account/account", $data);
    }
    public function add(Request $request)
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
      if ($request->isMethod("post")) {
        $this->validate($request, [
            "fullname" => "required|max:32",
            "address" => "required|min:6|max:150",
            "email" => "required|unique:account,email",
            "password" => "required|alpha_num|min:6|max:32",
            "phone" => "required",
        ],$messages);
        $account = new Account();
        $account->fullname = $request->fullname;
        $account->email = $request->email;
        $account->phone = $request->phone;
        $account->address = $request->address;
        $account->password = $request->password;
        $account->role = $request->role;
        $account->status = $request->status;
   

        $account->save();
        toastr()->success(' Tạo mới thành công!');
        // Session::flash('note','Successfully !');
        return redirect()->route("ht.account");
      }
      return view("admin/account/account_add");
  
    }
    public function update(Request $request, $id = null)
    {
        $olddata["display"] = Account::find($id);
    
        if ($request->isMethod("post")) {
            $this->validate($request, [
                "fullname" => "required",
                'phone' => 'required',
                "address" => "required",
              
                
            ]);
    
            $edit = Account::find($id);
            $edit->fullname = $request->fullname;
            $edit->phone = $request->phone;
            $edit->address = $request->address;   
            $edit->role = $request->role;
            $edit->status = $request->status;
    
            $edit->email = $olddata["display"]->email;
            $edit->password = $olddata["display"]->password;
    
            $edit->save();
            toastr()->success('Cập nhật thành công!');
            return redirect()->route("ht.account");
        } else {
            return view("admin/account/account_update", $olddata);
        }
    }
    
    public function delete($id)
    {
      try {
       
        Account::destroy($id);
        toastr()->success('Xóa thành công!');
        return redirect()->route('ht.account'); //chuyen ve trang category
      } catch (\Throwable $th) {
  
        return redirect()->route('ht.account'); //chuyen ve trang category
      }
    }
    public function adminList()
    {
        $admins = Account::where('email', '!=', 'superadmin@gmail.com')->where('role_id', 1)->paginate(15);
        return view('admin.users.adminList', compact('admins'));
    }
}
