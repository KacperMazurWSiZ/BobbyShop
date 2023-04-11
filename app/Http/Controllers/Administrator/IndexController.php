<?php

namespace App\Http\Controllers\Administrator;
use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{

    public function index()
    {
        return view('administrator.default');
    }

    public function profile(){
        $admin = auth()->user();

        if(request()->isMethod('post')) {
            $post = request()->all();
            $validator = Validator::make($post, [
                'admin_image' => "mimes:png|max:8192|file",
            ]);

            if ($validator->fails()) {
                return redirect()->route('admin.profile')->withErrors($validator);
            }

            if (request()->hasFile('admin_image')) {

                $filepath = 'admin' . $admin->id_admin;
                if (Storage::exists("public/admins/$filepath.png")) {
                    Storage::delete("public/admins/$filepath");
                }

                $image = request()->file('admin_image');
                $imageName = $filepath . '.' . $image->extension();
                $image->storeAs('public/admins', $imageName);
            }
        }
            return view('administrator.profile');
        }
}
