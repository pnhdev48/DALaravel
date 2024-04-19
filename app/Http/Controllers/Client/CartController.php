<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use App\Http\Services\CartService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

//    public function index(Request $request)
//    {
//        $result = $this->cartService->create($request);
//        if ($result === false) {
//            return redirect()->back();
//        }
//
//        return redirect('/carts');
//    }
    public function hehe(Request $request)
    {
        $result = $this->cartService->create($request);
        if ($result === false) {
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function show()
    {
        $products = $this->cartService->getProduct();
        //dd(Session::get('carts'));
        return view('client.cart.list', [
            'title' => 'Giỏ Hàng',
            'name' => 'Giỏ hàng',
            'productModels' => $products,
            'carts' => Session::get('carts'),
        ]);
    }

    public function update(Request $request)
    {
        $this->cartService->update($request);

        return redirect('/carts');
    }


    public function remove($id = 0)
    {
        $this->cartService->remove($id);

        return redirect('/carts');
    }

    public function checkout()
    {
        $cart_product = CartService::getProduct();
        return view('client.checkout',[
            'title' => 'Thanh toán',
            'name' => 'Thanh toán',
            'cart_products' => $cart_product,
            'carts' => Session::get('carts'),
        ]);
    }
    public function addCart(CheckoutRequest $request)
    {
        if (empty(Session::get('carts')))
        {
            Session::flash('error','Giỏ hàng trống!');
            return redirect()->back();
        }

        $carts = Session::get('carts');
        $productId = array_keys(Session::get('carts'));
        $products = ProductModel::select('id', 'name', 'price', 'image', 'quantity')
            ->whereIn('id', $productId)
            ->get();
        foreach ($products as $product) {
            $qty = $product->quantity - $carts[$product->id];
            if ($qty < 0) {
                Session::flash('error', 'Sản phẩm '. $product->name . ' đã hết hàng!');
                return redirect()->back();
            }
        }

        $this->validate($request, [
            'customer_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $this->cartService->addCart($request);

        return redirect()->back();
    }
}
