<?php

namespace App\Http\Controllers\Administrator;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{

    public function index()
    {

        $categories = Category::all();
        return view('administrator.category.index', [
            "categories" => $categories
        ]);
    }

    public function edit(int $id = 0)
    {
        $category = Category::findOrNew($id);
        if (request()->isMethod('POST')){
            $post = request()->get("form");
            $validator = Validator::make($post, [
                'category_name' => "required|max:255|unique:category,category_name,$id,id_category",
            ]);
            if($validator->fails()){
                return redirect()->route('admin.category.edit', [ 'id' => $category->getKey() ])->withErrors($validator);
            }
            DB::beginTransaction();
            try{
                $category->fill($post);
                $category->category_status = isset($post['category_status']);
                $category->save();

                DB::commit();
            }
            catch (\Exception $exception){
                DB::rollBack();
                throw $exception;
            }
            return redirect()->route('admin.category.index')->with('success', 'The operation was successful!');
        }

        return view('administrator.category.edit', [
            "category" => $category
        ]);
    }

    public function delete(int $id = 0){
        $category = Category::findOrFail($id);
        DB::beginTransaction();
        try{
            $category->delete();
            DB::commit();
        }
        catch (\Exception $exception){
            DB::rollBack();
            return redirect()->route('admin.category.index')->with('danger', 'The operation encountered an error!');
        }
        return redirect()->route('admin.category.index')->with('success', 'The operation was successful!');
    }


}

