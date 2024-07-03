<?php

namespace App\Helper;

class Cart
{
    private $items = [];
    private $total_quantity =0;
    private $total_price = 0;

    public function __construct()
    {
        $this->items = session('cart') ? session('cart') : [];
    }

    //phuong thuc lay ve danh sach san pham trong gio
    public function list()
    {
        return $this->items;
    }

    //them moi san pham vao gio hang
    public function add($product, $quantity = 1)
{
    $item = [
        'productId' => $product->id,
        'name' => $product->name,
        'price' => $product->sale_price > 0 ? $product->sale_price : $product->price,
        'image' => $product->image,
        'quantity' => $quantity
    ];

    // Check if the product already exists in the cart
    foreach ($this->items as $index => $cartItem) {
        if ($cartItem['productId'] === $item['productId']) {
            // If yes, update the quantity and return
            $this->items[$index]['quantity'] += $quantity;
            session(['cart' => $this->items]);
            return;
        }
    }

    // If the product does not exist in the cart, add it
    $this->items[] = $item;
    session(['cart' => $this->items]);
}


    //cap nhat gio hang


    //xoa san pham khoi gio hang


    // xoa het san pham khoi gio hang


    // phuong thuc lay ve tong tien
    public function getTotalPrice(){
        $totalPrice= 0;
        foreach($this->items as $item){
            $totalPrice += $item['price']* $item['quantity'];
        }
        return $totalPrice;
    }
    public function getTotalQuantity(){
        $total= 0;
        foreach($this->items as $item){
            $total += $item['quantity'];
        }
        return $total;
    }
}
