<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Cart;
use App\Product;
use App\Order;
use Barryvdh\DomPDF\Facade as PDF;


class ShopController extends Controller

{
    //
    public function showIndex(){
        $products = Product::skip(1)->take(8)->get();
        return view('shop.index', ['products' => $products]);
    }

    public function showAbout(){
        return view('shop.about');
    }

    public function showContact(){
        return view('shop.contact');
    }

    public function showOrder(){
        return view('shop.order');
    }

    public function showPrivacy(){
        return view('shop.privacy');
    }

    public function showWholesale(){
        return view('shop.wholesale');
    }

    public function showCollection(){
        $products = Product::paginate(12);
        return view('shop.collection', ['products' => $products]);
    }

    public function showProduct($product_name){
        $product = Product::where('name', '=', $product_name)->firstOrFail();
        return view('shop.product', ['product' => $product]);
    }

    public function addProduct(Request $request, $product_name){
        $product = Product::where('name', '=', $product_name)->firstOrFail();
        $count_name = str_replace(" ", "_", $product_name);
        $quantity = Facades\Request::input($count_name);
        $oldCart = Session::has('cart') ? Session::get('cart'): null;
        $cart = new Cart($oldCart);
        $cart->addToCart($product, $quantity);
        $newCart = serialize($cart);
        Session::put('cart', $newCart);
        Session::put('cartNum', $cart->amount);
        Session::save();
        return redirect('product/'.$product_name);
    }
 
    public function showCart(){
        $oldCart = Session::has('cart') ? Session::get('cart'): null;
        $summary = ['subtotal'=> 0, 'taxes'=>0, 'shipping'=>0, 'total'=>0];
        if($oldCart)
        {
            $cart = new Cart($oldCart);
            $subtotal = $cart->cost;
            $taxes = number_format($cart->cost * 0.15, 2);
            $shipping = 0;
            if($cart->cost <= 80)
                $shipping = 13.08;
            $total = number_format($subtotal + $taxes + $shipping, 2);
            $summary = ['subtotal'=> $subtotal, 'taxes'=> $taxes, 'shipping'=> $shipping, 'total'=> $total];
        }    
        else
        {
            $cart = $oldCart;
        }
        return view('shop.cart', ['cartlist' => $cart, 'summary'=> $summary]);
    }

    public function updateCart(Request $request){
        $count_name = str_replace("_", " ", $request->name);
        $product = Product::where('name', '=', $count_name)->firstOrFail();
        $quantity = $request->quantity;
        $oldCart = Session::has('cart') ? Session::get('cart'): null;
        $summary = ['subtotal'=> 0, 'taxes'=>0, 'shipping'=>0, 'total'=>0];
        $oldCart = Session::has('cart') ? Session::get('cart'): null;
        $cart = new Cart($oldCart);
        $cart->updateCart($product, $quantity);
        $newCart = serialize($cart);
        Session::put('cart', $newCart);
        Session::put('cartNum', $cart->amount);
        Session::save();
        $subtotal = $cart->cost;
        $taxes = number_format($cart->cost * 0.15, 2);
        $shipping = 0;
        if($cart->cost <= 80)
            $shipping = 13.08;
        $total = number_format($subtotal + $taxes + $shipping, 2);
        $summary = ['subtotal'=> $subtotal, 'taxes'=> $taxes, 'shipping'=> $shipping, 'total'=> $total];
        return ['quantity'=>$quantity, 'summary'=>$summary, 'cartNum'=> $cart->amount];
    }

    public function removeCart($product_name){
        $oldCart = Session::has('cart') ? Session::get('cart'): null;
        $cart = new Cart($oldCart);
        $cart->removeFromCart($product_name);
        if(count($cart->items) > 0)
        {
            $newCart = serialize($cart);
            Session::put('cart', $newCart);
            Session::put('cartNum', $cart->amount);
            Session::save();
        }else{
            Session::forget('cart');
            Session::forget('cartNum');
        }
        return redirect('cart');
    }

    public function getPayment(){
        $oldCart = Session::has('cart') ? Session::get('cart'): null;
        $summary = ['subtotal'=> 0, 'taxes'=>0, 'shipping'=>0, 'total'=>0];
        if($oldCart)
        {
            $cart = new Cart($oldCart);
            $subtotal = $cart->cost;
            $taxes = number_format($cart->cost * 0.15, 2);
            $shipping = 0;
            if($cart->cost <= 80)
                $shipping = 13.08;
            $total = number_format($subtotal + $taxes + $shipping, 2);
            $summary = ['subtotal'=> $subtotal, 'taxes'=> $taxes, 'shipping'=> $shipping, 'total'=> $total];
        }    
        else
        {
            $cart = $oldCart;
        }
        return view('shop.payment', ['summary'=> $summary]);
    }

    public function makePayment(Request $request){

        $oldCart = Session::has('cart') ? Session::get('cart'): null;
        $summary = ['subtotal'=> 0, 'taxes'=>0, 'shipping'=>0, 'total'=>0];
        if($oldCart)
        {
            $cart = new Cart($oldCart);
            $subtotal = $cart->cost;
            $taxes = number_format($cart->cost * 0.15, 2);
            $shipping = 0;
            if($cart->cost <= 80)
                $shipping = 13.08;
            $total = number_format($subtotal + $taxes + $shipping, 2);
            $summary = ['subtotal'=> $subtotal, 'taxes'=> $taxes, 'shipping'=> $shipping, 'total'=> $total];
        }

        $oid = Str::uuid();
        $firstname = Facades\Request::input('firstname');
        $lastname = Facades\Request::input('lastname');
        $address = Facades\Request::input('address');
        $city = Facades\Request::input('city');
        $province = Facades\Request::input('province');
        $postalcode = Facades\Request::input('postalcode');
        $phone = Facades\Request::input('phone');
        $email = Facades\Request::input('email');
        $description = ""; 
        foreach ($cart->items as $item) {
            $description .= $item['name'].":=".$item['quantity']."|";
        }

        $order = new Order;
        $order->oid = $oid;
        $order->firstname = $firstname;
        $order->lastname = $lastname;
        $order->address = $address;
        $order->city = $city;
        $order->province = $province;
        $order->postal = $postalcode;
        $order->phone = $phone;
        $order->email = $email;
        $order->total = $summary['total'];
        $order->taxes = $summary['taxes'];
        $order->shipping_fee = $summary['shipping'];
        $order->description = $description;
        $order->save();
        
        $detail = 'Order ID: '.$oid.'||'.'Name: '.$firstname.'-'.$lastname.'||'.'Email: '.$email.'||'.'Phone: '.$phone.'||'.$description;

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $token = Facades\Request::input('stripeToken');
        $charge = \Stripe\Charge::create([
        'amount' => $summary['total'] * 100,
        'currency' => 'cad',
        'description' => $detail,
        'source' => $token,
        ]);

        $list = explode('|', $description);
        array_pop($list);
        Session::forget('cart');
        Session::forget('cartNum');

        $order = Order::where('oid', '=', $oid)->firstOrFail();
        $list = explode('|', $order->description);
        array_pop($list);
        $pdf = PDF::loadView('pdf.receipt', ['order'=> $order, 'list'=> $list]);  
        $content = $pdf->download()->getOriginalContent();
        Storage::disk('public_main')->put('receipt.pdf',$content) ;

        return view('shop.success', ['order'=> $order, 'list'=> $list]);
    }
}
