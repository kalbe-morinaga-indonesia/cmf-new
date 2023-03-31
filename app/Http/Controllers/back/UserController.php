<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Department;
use App\Models\Subdepartment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('department','subdepartment')->get();
        return view('themes.back.Master.User.index', compact(
            'users'
        ));
    }

    public function create()
    {
        $departments = Department::get();
        $subdepartments = Subdepartment::get();
        return view('themes.back.Master.User.create', compact(
            'departments',
            'subdepartments'
        ));
    }

    public function store(UserRequest $request)
    {
        if($request->hasFile('avatar') && $request->hasFile('signature')){
            $slug = $request['name'];

            $extFile = $request->avatar->getClientOriginalExtension();
            $extFileSignature = $request->signature->getClientOriginalExtension();

            $nameFile = $slug.'-'.time().".".$extFile;
            $nameFileSignature = $slug.'-'.time()."-signature.".$extFileSignature;

            $request->avatar->storeAs('public/uploads/users/',$nameFile);
            $request->signature->storeAs('public/uploads/signature/',$nameFileSignature);
        }else{
            $nameFile = 'avatar.jpeg';
            $nameFileSignature = 'paraf.jpg';
        }

        User::create([
            'nik' => $request['nik'],
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'signature' => $nameFileSignature,
            'avatar' => $nameFile,
            'department_id' => $request['department'],
            'subdepartment_id' => $request['subdepartment'] ?? null
        ]);

        return redirect()
            ->route('users.index')
            ->with('messages',"Berhasil membuat user");
    }

    public function edit(User $user)
    {
        $departments = Department::get();
        $subdepartments = Subdepartment::get();
        return view('themes.back.Master.User.edit',compact(
            'user',
            'departments',
            'subdepartments'
        ));
    }

    public function update(User $user, UserRequest $request)
    {
        $slug = $request['name'];
        if($request->hasFile('avatar')){
            $extFile = $request->avatar->getClientOriginalExtension();
            $nameFile = $slug.'-'.time().".".$extFile;
            $request->avatar->storeAs('public/uploads/users/',$nameFile);
            $user->update([
                'nik' => $request['nik'],
                'name' => $request['name'],
                'avatar' => $nameFile,
                'email' => $request['email'],
                'password' => $request['password'] == "" ? $user->password : Hash::make($request['password']),
                'department_id' => $request['department'],
                'subdepartment_id' => $request['subdepartment'] ?? null
            ]);
        }elseif($request->hasFile('signature')){
            $extFileSignature = $request->signature->getClientOriginalExtension();
            $nameFileSignature = $slug.'-'.time()."-signature.".$extFileSignature;
            $request->signature->storeAs('public/uploads/signature/',$nameFileSignature);
            $user->update([
                'nik' => $request['nik'],
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => $request['password'] == "" ? $user->password : Hash::make($request['password']),
                'signature' => $nameFileSignature,
                'department_id' => $request['department'],
                'subdepartment_id' => $request['subdepartment'] ?? null
            ]);
        }elseif($request->hasFile('avatar') && $request->hasFile('signature')){
            $extFile = $request->avatar->getClientOriginalExtension();
            $nameFile = $slug.'-'.time().".".$extFile;
            $request->avatar->storeAs('public/uploads/users/',$nameFile);
            $extFileSignature = $request->signature->getClientOriginalExtension();
            $nameFileSignature = $slug.'-'.time()."-signature.".$extFileSignature;
            $request->signature->storeAs('public/uploads/signature/',$nameFileSignature);
            $user->update([
                'nik' => $request['nik'],
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => $request['password'] == "" ? $user->password : Hash::make($request['password']),
                'signature' => $nameFileSignature,
                'avatar' => $nameFile,
                'department_id' => $request['department'],
                'subdepartment_id' => $request['subdepartment'] ?? null
            ]);
        } else{
            $user->update([
                'nik' => $request['nik'],
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => $request['password'] == "" ? $user->password : Hash::make($request['password']),
                'department_id' => $request['department'],
                'subdepartment_id' => $request['subdepartment'] ?? null
            ]);
        }

        return redirect()
            ->route('users.index')
            ->with('messages',"Berhasil memperbaharui user");
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')
            ->with('messages','Berhasil menghapus user');
    }

    public function profile()
    {
        $departments = Department::get();
        $subdepartments = Subdepartment::get();
        return view('themes.back.Master.User.profile.index', compact(
            'departments',
            'subdepartments'
        ));
    }

    public function updateProfile(UserRequest $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        if($request->hasFile('avatar') && $request->hasFile('signature')){
            $slug = $request['name'];
            $extFile = $request->avatar->getClientOriginalExtension();
            $extFileSignature = $request->signature->getClientOriginalExtension();
            $nameFile = $slug.'-'.time().".".$extFile;
            $nameFileSignature = $slug.'-'.time()."-signature.".$extFileSignature;
            $request->avatar->storeAs('public/uploads/users/',$nameFile);
            $request->signature->storeAs('public/uploads/signature/',$nameFileSignature);
            $user->update([
                'name' => $request['name'],
                'signature' => $nameFileSignature,
                'avatar' => $nameFile,
                'department_id' => $request['department'],
                'subdepartment_id' => $request['subdepartment'] ?? null
            ]);
        }else{
            $user->update([
                'name' => $request['name'],
                'department_id' => $request['department'],
                'subdepartment_id' => $request['subdepartment'] ?? null
            ]);
        }

        return redirect()
            ->route('profiles.index')
            ->with('message',"Berhasil memperbaharui profile");
    }

    public function setting()
    {
        return view('themes.back.Master.User.settings.index');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'password_old' => [
                'required',
            ],
            'password_new' => [
                'required',
                'min:8',
                'confirmed'
            ]
        ]);

        if(!Hash::check($request->password_old, auth()->user()->password)){
            return back()->with('error','Password lama salah');
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->password_new)
        ]);

        return back()
            ->with('message','Password berhasil diperbaharui');
    }
}
