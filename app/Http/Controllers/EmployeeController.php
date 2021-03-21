<?php

namespace App\Http\Controllers;


use App\Employee;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EmployeeController extends Controller
{
    use AuthenticatesUsers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $employees = Employee::where('role' , 'EMPLOYEE')->latest()->paginate(20);

        return view('admin.employees.index', [ 'data' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
//     */
    public function create()
    {
        return view('admin.employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        $request->validate(
//            [
//                'name' => 'required',
//                'email' => 'required|email',
//            ],
//            [
//                'name.required' => 'Tên không được để trống',
//                'email.required' => 'Email không được để trống',
//                'email.email' => 'Email chưa đúng định dạng'
//            ]);
//dd($request->all());
        $employee = new Employee();
        $employee->name = $request->name;
        $employee->username = $request->username;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
//        $employee->birthday = $request->birthday;
//        $employee->sex = $request->sex;
        $employee->role = 'EMPLOYEE';
        $employee->password = bcrypt($request->password);

        $employee->save();

        return redirect()->route('admin.employee.index');
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

        $employee = Employee::findorFail($id);

        return view('admin.employees.edit',['data' => $employee]);
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
        $employee = Employee::findorFail($id);
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->username = $request->username;
        $employee->phone = $request->phone;
        $employee->birthday = $request->birthday;
        $employee->sex = $request->sex;
        $employee->save();

        if (  $employee->save()) {
            Session::flash('success', $employee->name.' cập nhật thành công!');
            return redirect()->route('admin.employee.index');
        }else {
            Session::flash('error', $employee->name.' cập nhật thất bại!');
            return redirect()->route('admin.employee.index');
        }
    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy($id)
//    {
//        //
//    }


//    public function guard()
//    {
//        return Auth::guard('admin');
//    }
//
//    public function loginForm ()
//    {
//        return view('auth.login');
//    }
//
//    public function login()
//    {
//
//    }

}
