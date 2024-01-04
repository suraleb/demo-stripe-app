<?php

namespace App\Services;

use Stripe\StripeClient;
use Illuminate\Support\Facades\Cache;

class StripeService {

    /**
     * @var StripeClient
     */
    private StripeClient $_client;

    public function __construct()
    {
        $this->_client = new StripeClient(config('services.stripe.client'));
    }

    public function getPrices(bool $isActive = false) : array
    {
        $prices = Cache::remember('stripe_prices', config('services.stripe.prices_cache_ttl'), function () {
            return $this->_client->prices->all();
        });

        if(empty($prices)|| empty($prices->data)) {
            return [];
        }

        if(!$isActive) {
            return $prices->data;
        }

        foreach ($prices->data as $key => $price) {
            if(!$price->active) {
                unset($prices->data[$key]);
            }
        }

        return $prices->data;
    }

    public function getProducts(bool $isActive = true) : array
    {
        $products = Cache::remember('stripe_products', config('services.stripe.prod_cache_ttl'), function () {
            return $this->_client->products->all();
        });

        if(empty($products) || empty($products->data)) {
            return [];
        }

        if(!$isActive) {
            return $products->data;
        }

        foreach ($products->data as $key => $product) {
            if(!$product->active) {
                unset($products->data[$key]);
            }
        }

        return $products->data;
    }

    public function getPriceById(string $id)
    {
        $prices = $this->getPrices(true);
        $prices = $this->updatePricesWithProducts($prices);
        if(empty($prices)) {
            return null;
        }

        foreach ($prices as $price) {
            if($price->id === $id) {
                return $price;
            }
        }

        return null;
    }

    public function updatePricesWithProducts($prices)
    {
        $result = [];
        if(empty($prices)) {
            return $result;
        }

        $products = $this->getProducts();

        foreach ($prices as $price) {
            foreach ($products as $product) {
                if($price->product === $product->id) {
                    $price->productName = $product->name; // add only name for now
                    $result[] = $price;
                }
            }
        }

        return $result;
    }
}
