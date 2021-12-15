<?php

namespace App\Http\Controllers;

use App\City;
use App\Exceptions\PhoneExists;
use App\Exports\UsersExport;
use App\Imports\oldUsersImport;
use App\Imports\UsersAdminImport;
use App\Permission;
use App\Role;
use App\Services\Uploader\Uploader;
use App\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private $uploader;



    public function __construct(Uploader $uploader)
    {
        $this->uploader = $uploader;
    }

    public function index()
    {
        $roles = Role::all();

        $users = User::with('roles', 'city')->orderBy('created_at','desc')->paginate(100);

        return view('admin.usersList', compact(['users','roles']));
    }

    public function search(Request $request)
    {
        $roles = Role::all();

        $text = $request['search'];
        if($text == 'معلم'){
            $users = User::whereHas(
                'roles', function($q){
                    $q->where('id', '3')->orWhere('id', '4');
                }
            )->get();
        }
        else {
            $users = User::where('phone','like',$text."%")->orWhere('first_name','like',$text."%")->orWhere('last_name','like',$text."%")->paginate(100);
        }

        return view('admin.usersList',compact(['users','roles']));
    }

    public function edit(User $user)
    {
        $permissions = Permission::all();

        $roles = Role::all();

        $cities = City::all();
        
        return view('admin.usersEdit', compact('permissions', 'roles', 'user','cities'));
    }

    public function update(Request $request, User $user)
    {
        $this->validateUpdateForm($request);

        if ($request->file('file') !== null) {
            $file = $this->uploader->upload();
            
            $user->update([
            'photo_id' => $file->id,
            ]);
        }

        $user->update([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'phone' => $request['phone'],
            'school' => $request['school'],
            'grade' => $request['grade'],
            'field_of_study' => $request['field_of_study'],
            'city_id' => $request['city'],
            'address' => $request['address'],
            'info' => $request['info'],
        ]);

        $user->givePermissionsTo($request->permissions);

        $user->giveRolesTo($request->roles);

        $user->save();

        return redirect()->route('users.index')->with('userUpdate', true);
    }

    protected function validateUpdateForm($request)
    {
        $request->validate(
            [
                'first_name' => ['required', 'string', 'max:20'],
                'last_name' => ['required', 'string', 'max:20'],
                'phone' => ['required', 'numeric', 'digits:11'],
            ],
            [
                'phone.required' => 'لطفا تلفن همراه خود را وارد نمایید',
                'phone.numeric' => 'شماره تلفن فقط میتواند عدد باشد.',
                'phone.digits' => 'شماره تلفن نمیتواند بیش از 11 رقم باشد .',
                'last_name.required' => 'لطفا نام خانوادگی خود را وارد نمایید.',
                'first_name.required' => 'لطفا نام خود را وارد نمایید.'
            ]
        );
    }

    public function destroy(User $user)
    {
        $user->delete();

        $file = $user->photo();
        
        $file->delete();

        return back()->with('userDelete', true);
    }

    public function adminCreate()
    {
        $permissions = Permission::all();

        $roles = Role::all();

        $cities = City::all();

        return view('admin.userCreate', compact('permissions', 'roles', 'cities'));
    }

    public function adminStore(Request $request)
    {
        $this->validateForm($request);

        $user = User::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'phone' => $request['phone'],
            'school' => $request['school'],
            'grade' => $request['grade'],
            'field_of_study' => $request['field_of_study'],
            'city_id' => $request['city'],
            'address' => $request['address'],
            'info' => $request['info'],
        ]);

        if ($request->file('file') !== null) {
            
            $file = $this->uploader->upload();

            $user->update([
            'photo_id' => $file->id,
            ]);
        }

        $user->givePermissionsTo($request->permissions);

        $user->is_verify = true;

        $user->giveRolesTo($request->roles);

        $user->save();

        return redirect()->route('users.index')->with('userCreate', true);
    }

    protected function validateForm($request)
    {
        $request->validate(
            [
                'first_name' => ['required', 'string', 'max:20'],
                'last_name' => ['required', 'string', 'max:20'],
                'phone' => ['required', 'numeric', 'digits:11', 'unique:users'],
            ],
            [
                'phone.required' => 'لطفا تلفن همراه خود را وارد نمایید',
                'phone.numeric' => 'شماره تلفن فقط میتواند عدد باشد.',
                'phone.digits' => 'شماره تلفن نمیتواند بیش از 11 رقم باشد .',
                'phone.unique' => 'این شماره تلفن قبلا در سامانه ثبت شده لطفا با شماره تلفن دیگر ثبت نام کنید.',
                'last_name.required' => 'لطفا نام خانوادگی خود را وارد نمایید.',
                'first_name.required' => 'لطفا نام خود را وارد نمایید.'
            ]
        );
    }

    public function userExcel()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function importAdminUser(Request $request)
    {
        $roles = $request['roles'];

        try {

            Excel::import(new UsersAdminImport($roles), request()->file('file'));
        } catch (\TypeError $ex) {

            return back()->with('file wrong',true);
        }catch(PhoneExists $message){

            return back()->withError("شماره تلفن {$message->getMessage()} در سامانه موجود میباشد.");
        }

        return back()->with('success',true);
    }

    public function importOldUser(Request $request)
    {

        try {

            Excel::import(new oldUsersImport(), request()->file('file'));
        } catch (\TypeError $ex) {

            return back()->with('file wrong',true);
        }

        return back()->with('success',true);
    }

    public function loginas(User $user)
    {
        Auth::login($user);
        
        return redirect()->route('home');
    }
}
