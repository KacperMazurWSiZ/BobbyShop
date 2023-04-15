<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{

    public function index()
    {
        $products = Product::with(['category'])
            ->where('product_status', '=', '1')
            ->get();

        $data = [];
        foreach ($products as $product){
            $data[$product->category->category_name][] = [
                'id_product' => $product->id_product,
                'product_name' => $product->product_name,
                'product_price' => $product->product_price,
                'product_quantity' => $product->product_quantity,
                'product_filepath' => $product->product_filepath,
                'product_description' => $product->product_description
            ];
        }

        if (request()->isMethod('POST'))
        {
            $products = Product::all();

            $form = request()->get('form');
            $items = request()->get('items');
            DB::beginTransaction();
            try{
                $order = new Order();
                $order->fill($form);
                $order->order_status = 1;
                $order->save();

                $id_order = $order->id_order;

                foreach ($items['id'] as $key => $id_product)
                {
                    $product = $products->where('id_product', '=', $id_product)->first();
                    $orderItem = new OrderItem();
                    $orderItem->id_order = $id_order;
                    $orderItem->id_product = $id_product;
                    $orderItem->order_item_price = $product->product_price;
                    $orderItem->order_item_quantity = 1;
                    $orderItem->save();
                }

                DB::commit();
            }
            catch (\Exception $exception){
                DB::rollBack();
                throw $exception;
            }
            return redirect()->route('frontend.index')->with('success', 'The operation was successful!');
        }


        return view('frontend.default', [
            'products' => $data,
        ]);
    }
}
