<?php

namespace App\Http\Controllers\Administrator;
use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AnnouncementController extends Controller
{

    public function index()
    {
        $announcements = Announcement::all();
        return view('administrator.announcement.index', [
            'announcements' => $announcements
        ]);
    }

    public function create(){
        if (request()->isMethod('POST')){
            $post = request()->get("form");
            $validator = Validator::make($post, [
                'announcement_title' => "required",
                'announcement_content' => "required"
            ]);
            if($validator->fails()){
                return redirect()->route('administrator.announcement.index')->withErrors($validator);
            }
            DB::beginTransaction();
            try{
                $announcement = new Announcement();
                $announcement->fill($post);
                $announcement->announcement_status = 1;
                $announcement->id_admin = auth()->user()->id_admin ?? 0;
                $announcement->save();

                DB::commit();
            }
            catch (\Exception $exception){
                DB::rollBack();
                throw $exception;
            }
            return redirect()->route('admin.announcement.index')->with('success', 'The operation was successful!');
        }
    }

    public function delete(int $id = 0){
        $announcement = Announcement::findOrFail($id);
        DB::beginTransaction();
        try{
            $announcement->delete();
            DB::commit();
        }
        catch (\Exception $exception){
            DB::rollBack();
            return redirect()->route('admin.announcement.index')->with('danger', 'The operation encountered an error!');
        }
        return redirect()->route('admin.announcement.index')->with('success', 'The operation was successful!');
    }
}
