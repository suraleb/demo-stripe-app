<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Services\StripeService;

class SubscriptionController extends Controller
{
    /**
     * Show the subscriptions dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $stripeService = new StripeService();
        $stripePrices = $stripeService->getPrices(true);
        $prices = $stripeService->updatePricesWithProducts($stripePrices);
        return view('subscription.index', compact('prices'));
    }

    /**
     * Show the subscription dashboard with email form if not authenticated.
     *
     * @param $id
     * @return Renderable
     */

    public function create(string $id): Renderable
    {
        $stripeService = new StripeService();
        $price = $stripeService->getPriceById($id);
        return view('subscription.create', compact('price'));
    }
}
