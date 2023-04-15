<?php

namespace App\Http\Controllers\Administrator;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    public function index()
    {
        $admins = Admin::all();
        return view('administrator.admin.index', [
            "admins" => $admins
        ]);
    }

    public function edit(int $id = 0)
    {
        $admin = Admin::findOrNew($id);
        if (request()->isMethod('POST')){
            $post = request()->get("form");
            $required = $id ? 'nullable' : 'required';
            $validator = Validator::make($post, [
                'admin_login' => "required|max:255|unique:admin,admin_login,$id,id_admin",
                'admin_password' => "$required|max:255|min:5"
            ]);
            if($validator->fails()){
                return redirect()->route('admin.admin.edit', [ 'id' => $admin->getKey() ])->withErrors($validator);
            }

            if(!is_null($post['admin_password'])){
                $post['admin_password'] = Hash::make($post['admin_password']);
            } else {
                unset($post['admin_password']);
;           }

            DB::beginTransaction();
            try{
                $admin->fill($post);
                $admin->admin_status = isset($post['admin_status']);
                $admin->admin_superadmin = isset($post['admin_superadmin']);
                $admin->save();

                DB::commit();
            }
            catch (\Exception $exception){
                DB::rollBack();
                throw $exception;
            }
            return redirect()->route('admin.admin.index')->with('success', 'The operation was successful!');
        }

        return view('administrator.admin.edit', [
            "admin" => $admin
        ]);
    }

    public function delete($id = 0){
        $admin = Admin::findOrFail($id);
        DB::beginTransaction();
        try{
            if($admin->admin_superadmin){
                return redirect()->route('admin.admin.index')->with('danger', 'The operation encountered an error!');
            }
            $admin->delete();
            DB::commit();
        }
        catch (\Exception $exception){
            DB::rollBack();
            return redirect()->route('admin.admin.index')->with('danger', 'The operation encountered an error!');
        }
        return redirect()->route('admin.admin.index')->with('success', 'The operation was successful!');
    }


}
