<?php

namespace App\Http\Controllers;



use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        dd(12131);

        $users = User::where('role' , 'GUEST')->latest()->paginate(20);

        return view('admin.users.index', [ 'data' => $users]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'name' => 'required',
                'username' => 'required|unique:users',
                'email' => 'required|email',
                'password' => 'required|min:6',
            ],
            [
                'name.required' => 'Tên không được để trống',
                'email.required' => 'Email không được để trống',
                'email.email' => 'Email chưa đúng định dạng',
                'password.required' => 'Mật khẩu không được để trống',
                'password.min' => 'Mật khẩu tối thiểu 6 ký tự',
                'username.unique' => 'Tên đăng nhập đã tồn tại'
            ]);
//        dd($request->all());
        $users = new User();
        $users->name = $request->name;
        $users->username = $request->username;
        $users->email = $request->email;
        $users->phone = $request->phone;
//        $users->birthday = $request->birthday;
//        $users->sex = $request->sex;
        $users->role = 'GUEST';
        $users->password = bcrypt($request->password);

        $users->save();
        if ( $users->save()) {
            Session::flash('success', 'Đăng kí tài khoản "'.$users->username.'" thành công');
            return redirect()->route('admin.login');
        }else {
            Session::flash('error', ' Đăng ký thất bại!');
            return redirect()->route('register');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $users = User::findorFail($id);

        return view('admin.users.edit',['data' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $users = User::findorFail($id);
       $users->state = $request->state;
        $users->save();

        if (  $users->save()) {
            Session::flash('success', $users->name.' cập nhật thành công!');
            return redirect()->route('admin.user.index');
        }else {
            Session::flash('error', $users->name.' cập nhật thất bại!');
            return redirect()->route('admin.user.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        User::destroy($id);
        // Trả về dữ liệu json và trạng thái kèm theo thành công là 200
        $dataResp = [
            'status' => true
        ];

        return response()->json($dataResp, 200);

    }
    public function login () {
        return view('admin.login');
    }

    public function postLogin (Request $request){
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('dashboard');
        }

    }

    public function logout(){
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
