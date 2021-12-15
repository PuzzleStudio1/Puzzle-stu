<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissionList', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateStoreForm($request);

        Permission::create($request->only('name', 'persian_name'));

        return back()->with('permissionStore', true);
    }

    protected function validateStoreForm($request)
    {
        return $request->validate([
            'name' => ['required'],
            'persian_name' => ['required']
        ], [
            'name.required' => 'لطفا نام دسترسی را وارد کنید.',
            'persian_name.required' => 'لطفا نام فارسی دسترسی را وارد کنید .'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return back()->with('permissionDelete', true);
    }
}
