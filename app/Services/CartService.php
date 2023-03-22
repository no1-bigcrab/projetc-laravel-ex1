<?php
    namespace App\Services;
    
    use Illuminate\Support\Collection;
    use Illuminate\Sessison\SessionManager;

    class CartService {
        const MINIMUM_QUANTITY = 1;
        const DEFAULT_INSTANCE = 'shopping-cart';

        protected $session;
        protected $instance;

        public function __construct(SessionManager $session)
        {
            $this->session = $session;
        }

        //add products on shoppingcart
        public function add($id, $name, $price, $quantity, $options = []): void
        {
            $cartItem = $this->createCartItem($name, $price, $quantity, $options);

            $content = $this->getContent();

            if ($content->has($id)) {
                $cartItem->put('quantity', $content->get($id)->get('quantitty') + $quantity);
            }

            $content->put($id, $cartItem);

            $this->session->put(self::DEFAULT_INSTANCE, $content);
        }

        //update shoppingcart
        public function update(string $id, string $action): void
        {
            $content = $this->getContent();
            if ($content->has($id)) {
                $cartItem = $content->get($id);

                switch ($action) {
                    case 'plus':
                        $cartItem->put('quantity', $content->get($id)->get('quantity') + 1);
                        break;
                    case 'minus':
                        $updateQuantity = $content->get($id)->get('quantity') - 1;
                        if ($updateQuantity < self::MINIMUM_QUANTITY) {
                            $updateQuantity = self::MINIMUM_QUANTITY;
                        }
                        $cartItem->put('quantity', $updateQuantity);
                        break;
                }

                $content->put($id, $cartItem);
                $this->session->put(self::DEFAULT_INSTANCE, $content);
            }
        }

        //remove item in the cart
        public function remove(string $id): void
        {
            $content = $this->getContent();

            if ($content->has($id)) {
                $this->session->put(self::DEFAULT_INSTANCE, $content->except($id));
            }
        }

        //clear the cart
        public function clear(): void
        {
            $this->session->forget(self::DEFAULT_INSTANCE);
        }

        //function contennt
        public function content(): Collection
        {
            return is_null($this->session->get(self::DEFAULT_INSTANCE)) ? collect([]) : $this->session->get(self::DEFAULT_INSTANCE);
        }

        //function total
        public function total(): string
        {
            $content = $this->getContent();

            $total = $content->reduce(
                function($total, $item)
                {
                    return $total += $item->get('price') *  $item->get('quantity');
                });

            return number_format($total, 2);
        }
        protected function getContent(): Collection
        {
            return $this->session->has(self::DEFAULT_INSTANCE) ? $this->session->get(self::DEFAULT_INSTANCE) : collection([]);
        }

        protected function createCartItem(string $name, string $price, string $quantity, array $options):Collection
        {
            $price = floatval($price);
            $quantity = intval($quantity);

            if ($quantity < self::MINIMUM_quantity){
                $quantity = self::MINIMUM_quantity;
            }

            return collect([
                'name' => $name,
                'price' => $price,
                'quantity' => $quantity,
                'options' => $options
            ]);
        }
    }

?>