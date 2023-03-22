<?php

    namespace App\Helper;

    use App\Http\Requests;


    class CartHelper
    {
        public $items = [];
        public $total_quantity = 0;
        public $total_price = 0;

        public function __construct(){
            $this->items = session('cart')? session('cart'): [];
            $this->total_price = $this->get_total_price();
            $this->total_quantity = $this->get_total_quantity();
        }

        public function add($product, $quantity = 1){
            $cart = [
                'id'=> $product->id,
                'title'=> $product->title,
                'price'=> $product->sale_price ? $product->sale_price : $product->price,
                'image'=> $product->images[0]->image,
                'quantity'=> $quantity,
            ];

            $this->items[$product->id] = $cart;
            session()->put('cart', $this->items);
        }

        public function remove($id){

        }

        public function update($id, $quantity){

        }

        public function clear(){

        }

        private function get_total_price(){
            $t = 0;
            foreach ($this->items as $item) {
                $t += $item['price'] * $item['quantity'];
            }
            return $t;
        }

        private function get_total_quantity(){
            $t = 0;
            foreach ($this->items as $item) {
                $t += $item['quantity'];
            }
            return $t;
        }
    }
?>