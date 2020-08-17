<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use DB;
use App\Models\UserRole;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
class AdminUserController extends Controller
{

    // lấy thong tin khách hàng
  public function getCustomer()
  {
    $users = $listRoleOfUser = DB::table('users')
    ->LeftJoin('user_roles', 'users.id', '=', 'user_roles.user_id')
    ->where('user_roles.id', NULL)
    ->select('users.*')
    ->get();
    // dd($users);
    return view('backend.user.userCustomer',['users' => $users]);
  }
     // lấy thong tin quản trị viên
  public function getListAdmin()
  {
    $users = $listRoleOfUser = DB::table('users')
    ->Join('user_roles', 'users.id', '=', 'user_roles.user_id')
    ->join('roles','user_roles.role_id','=','roles.id')
    ->select('users.name as username','users.id as userid', 'users.*', 'roles.*')
    ->get();
    return view('backend.user.adminlist',['users' => $users]);
  }


    // phần quản trị admin user
  public function getUserEmphloyee()
  {
    $level = User::select('id','level')->get();
    return view('backend.user.userEmployee',['level' => $level]);
  }
  public function showEmployeeUser($id)
  {
   $listUser = Role::with('users')->where('id',$id)->get()->toArray();
   return view('backend.user.userEmployeeShow',compact('listUser'));
 }
// Tạo và lưu thông tin admin user
 public function createEmployeeUser()
 {
   $listRole= Role::all();
   return view('backend.user.userEmployeeCreate', compact('listRole'));
 }
 public function storeEmployeeUser(UserRequest $request)
 {
  $dataUser = $request->only('name','sex','email','phone','address');
  $dataUser['password'] = bcrypt($request->password);
  $user = User::create($dataUser);

  $roleID = $request->roleID;
  foreach($roleID as $roleID){
    \DB::table('user_roles')->insert([
      'user_id' => $user->id,
      'role_id' => $roleID
    ]);
  }
  return redirect()->back()->with('thongbao','Thêm mới Admin User thành công');
}
public function editEmployeeUser($id)
{
  $user = User::find($id);
  $listRole = Role::all();
  $listUserOfRole = \DB::table('user_roles')->where('user_id',$id)->pluck('role_id');
  return view('backend.user.userEmployeeEdit', compact('user', 'listRole', 'listUserOfRole'));
}
public function updateEmployeeUser(Request $request, $id)
{
 $this -> validate($request, [
   'name' =>'required',
   'sex'=>'required',
   'password'=>'required',
   'rePassword' => 'required|same:password',
   'phone'=>'required|integer',
   'address'=>'required',
   'roleID'=>'required'
 ],

 [
  'name.required'=>'**Vui lòng nhập Họ tên',
  'sex.required'=>'**Vui lòng nhập Họ tên',
  'password.required'=>'**Vui lòng nhập mật khẩu',
  'address.required'=>'**Vui lòng nhập địa chỉ',
  'rePassword.required' => '**Vui lòng nhập lại mật khẩu',
  'rePassword.same' => '** Mật khẩu không khớp',
  'phone.required'=>'**Vui lòng nhập Số điên thoại',
  'phone.integer'=>'**Không lấy số không ở đầu vì đẵ mặt định',
  'roleID.required'=>'**Vui lòng chọn quyền'

]);
 $user = User::find($id);
 $dataUser = $request->only('name','sex','email','phone','address');
 if($request->password){
  $dataUser['password'] = bcrypt($request->password);
}else{
  $dataUser['password'] =bcrypt( $user->password);
}

$user->update($dataUser);

$roleID = $request->roleID;
\DB::table('user_roles')->where('user_id',$id)->delete();
foreach($roleID as $roleID){
  \DB::table('user_roles')->insert([
    'user_id'=> $user->id,
    'role_id'=>$roleID
  ]);
}
return redirect()->back()->with('thongbao','Đã chỉnh sửa thông tin thành công'); 
}
// xóa admin user
public function destroy($id)
{
 $user = user::find($id);
 if (Auth::user()-> id == $user -> id) {
   return response()-> json(['error' => 'Thất Bại! Bạn không thể xóa chính mình']);
 }
 
 UserRole::where('user_id',$id)->delete();
 $user->delete();
 return response()-> json(['success' => 'Xóa Thành Công']);

}

}
