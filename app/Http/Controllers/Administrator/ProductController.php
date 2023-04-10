<?php

namespace App\Http\Controllers\Administrator;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with(['category', 'admin'])->get();
        return view('administrator.product.index', [
            "products" => $products
        ]);
    }

    public function edit(int $id = 0)
    {
        $product = Product::with(['admin'])->findOrNew($id);
        $categories = Category::all();
        if (request()->isMethod('POST')){
            $post = request()->get("form");
            $validator = Validator::make($post, [
                'product_name' => "required|max:255|unique:product,product_name,$id,id_product",
                'product_price' => 'required|numeric|between:1,99999999999999',
                'product_quantity' => 'required|numeric|between:0,99999999999999',
                'id_category' => 'required'
            ]);

            if($validator->fails()){
                return redirect()->route('admin.product.edit', [ 'id' => $product->getKey() ])->withErrors($validator);
            }

            if(request()->hasFile('product_filepath')){
                if(!is_null($product->product_filepath)){
                    $filepath = $product->product_filepath;
                    if(Storage::exists("public/$filepath")){
                        Storage::delete("public/$filepath");
                    }
                }
                $image =  request()->file('product_filepath');
                $imageName = time().'.'.$image->extension();
                $image->storeAs('public', $imageName);
            }


            DB::beginTransaction();
            try{
                $product->fill($post);
                $product->product_status = isset($post['product_status']);
                $product->product_filepath = $imageName ?? null;
                $product->modified_by = auth()->user()->id_admin ?? 0;
                $product->save();

                DB::commit();
            }
            catch (\Exception $exception){
                DB::rollBack();
                throw $exception;
            }
            return redirect()->route('admin.product.index')->with('success', 'The operation was successful!');
        }

        return view('administrator.product.edit', [
            "product" => $product,
            "categories" => $categories

        ]);
    }

    public function delete(int $id = 0){
        $product = Product::findOrFail($id);
        DB::beginTransaction();
        try{
            if(!is_null($product->product_filepath)){
                $filepath = $product->product_filepath;
                if(Storage::exists("public/$filepath")){
                    Storage::delete("public/$filepath");
                }
            }
            $product->delete();
            DB::commit();
        }
        catch (\Exception $exception){
            DB::rollBack();
            return redirect()->route('admin.product.index')->with('danger', 'The operation encountered an error!');
        }
        return redirect()->route('admin.product.index')->with('success', 'The operation was successful!');
    }



}
