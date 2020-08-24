<?php

namespace app;

class Cart
{
    public $items = null;
    public $amount = 0;
    public $cost = 0;

    public function __construct($oldcart)
    {
       
        if($oldcart)
        {
            $this->items = [];
            $cart = unserialize($oldcart);
            $this->items = $cart->items;
            $this->amount = $cart->amount;
            $this->cost = $cart->cost;
        } 
    }

    public function addToCart($product, $quantity)
    {
        $item = ['name' => $product->name, 'price' => $product->price, 'quantity' => 0, 'subtotal' => 0, 'image' => $product->image];
        if($this->items)
            if(array_key_exists($product->name, $this->items))
                $item = $this->items[$product->name];

        /** update the single item */
        $item['quantity'] += $quantity;
        $item['subtotal'] += $item['price'] * $quantity;

        /** update the cart */ 
        $this->items[$product->name] = $item; 
        $this->amount += $quantity;
        $this->cost += $item['price'] * $quantity;
    }

    public function updateCart($product, $quantity)
    {
        $item = ['name' => $product->name, 'price' => $product->price, 'quantity' => 0, 'subtotal' => 0, 'image' => $product->image];
        if($this->items)
            if(array_key_exists($product->name, $this->items))
                $item = $this->items[$product->name];

        $diff = $quantity -$item['quantity'];
        /** update the single item */
        $item['quantity'] = $quantity;
        $item['subtotal'] = $item['price'] * $quantity;

        /** update the cart */ 
        $this->items[$product->name] = $item; 
        $this->amount += $diff;
        $this->cost += $item['price'] * $diff;
    }

    public function removeFromCart($product_name)
    {
        if($this->items)
            if(array_key_exists($product_name, $this->items))
            {
                $quantity = $this->items[$product_name]['quantity'];
                $subtotal = $this->items[$product_name]['subtotal'];
                unset($this->items[$product_name]);
                $this->amount -= $quantity;
                $this->cost -= $subtotal;
            } 
            return redirect('cart');
    }

}