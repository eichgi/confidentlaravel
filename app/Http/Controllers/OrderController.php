<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\Http\Requests\OrderRequest;
use App\Lesson;
use App\Mail\OrderConfirmation;
use App\Order;
use App\Product;
use App\User;
use App\Video;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use PDOException;
use Stripe\Charge;
use Stripe\Error\Card;
use Stripe\Stripe;

class OrderController extends Controller
{
    public function index()
    {
        return view('orders.index', [
            'products' => Product::paid(),
            'lessons' => Lesson::course(),
            'videos' => Video::all()->groupBy('lesson_id'),
        ]);
    }

    public function store(OrderRequest $request)
    {
        try {
            $product = Product::findOrFail($request->get('product_id'));

            Stripe::setApiKey(config('services.stripe.secret'));

            $order = new Order([
                'product_id' => $product->id,
                'total' => $product->price,
            ]);

            $this->applyCoupon($order);

            $charge = Charge::create([
                "amount" => $order->totalInCents(),
                "currency" => "usd",
                "source" => $request->get('stripeToken'),
                "description" => "Confident Laravel - " . $order->product->name,
                "receipt_email" => $request->get('stripeEmail')
            ]);

            $user = User::createFromPurchase($request->get('stripeEmail'), $charge->id);

            $order->user_id = $user->id;
            $order->stripe_id = $charge->id;
            $order->save();

            event('order.placed', $order);

            Auth::login($user, true);
            Mail::to($user->email)->send(new OrderConfirmation($order));
        } catch (Card $e) {
            $data = $e->getJsonBody();
            Log::error('Card failed: ', $data);
            $template = 'partials.errors.charge_failed';
            $data = $data['error'];

            return view('errors.generic', compact('template', 'data'));
        }

        return redirect('/users/edit');
    }

    private function applyCoupon(Order $order)
    {
        if (!Session::has('coupon_id')) {
            return;
        }

        $coupon = Coupon::find(Session::get('coupon_id'));
        if (!$coupon) {
            return;
        }

        if ($coupon->wasAlreadyUsed(Auth::user())) {
            return;
        }

        Session::forget('coupon_id');

        $order->applyCoupon($coupon);
    }
}
