<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.user.index',compact('users'));
    }

    public function indexActive(){
        $users = User::where('status', 'Active')->get();
        return view('admin.user.index2',compact('users'));
    }
    public function indexInactive(){
        $users = User::where('status', 'Inactive')->get();
        return view('admin.user.index3',compact('users'));
    }
    public function showStudent(){
        $users = User::where('role', 'Mahasiswa')->where('status', 'Active')->get();
        return view('admin.user.student',compact('users'));
    }
    public function showLecturer(){
        $users = User::where('role', 'Dosen')->where('status', 'Active')->get();
        return view('admin.user.lecturer',compact('users'));
    }

    public function updateStatus(Request $request, $id){
        $user = User::find($id);
        $user->status = $request->status;
        $user->save();
        return redirect()->back();
    }

    public function create(){
        return view('admin.user.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'no_unik' => ['required', 'string', 'max:255', 'unique:users'],
            'gender' => ['required', 'string',Rule::in(['Laki-laki', 'Perempuan'])],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required','string','max:255'],
            'status' => ['required'],
        ]);

        $user = new User;
        $user->name = $request->get('name');
        $user->no_unik = $request->get('no_unik');
        $user->gender = $request->get('gender');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->role = $request->get('role');
        $user->status = $request->get('status');
        $user->save();
        return redirect()->back();
    }

    public function edit($id){
        $user = User::where('id',$id)->first();
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'no_unik' => ['required', 'string', 'max:255', 'unique:users,no_unik,' . $id],
            'gender' => ['required', 'string',Rule::in(['Laki-laki', 'Perempuan'])],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
            'role' => ['required','string','max:255'],
        ]);

        $user = User::where('id',$id)->first();
        $user->update($request->all());
        return redirect()->back();
    }

    public function destroy($id){
        $user = User::where('id',$id)->first();
        $user->delete();
        return redirect()->back();
    }

    public function updatePassword(Request $request, $id){
        $this->validate($request, [
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);
        $user = User::find($id);
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->back();
    }
}
