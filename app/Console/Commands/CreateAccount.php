<?php

namespace App\Console\Commands;

use App\Mail\AccountCreated;
use App\Mail\OrderConfirmation;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class CreateAccount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:account {email : The email for the account} {product_id : The id of the package ordered } {transaction_id : Transaction id for payment}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a user account';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $product = Product::findOrFail($this->input->getArgument('product_id'));

        $user = User::firstOrCreate([
            'email' => $this->input->getArgument('email')
        ], [
            'password' => Hash::make('gitstarted')
        ]);

        $order = Order::create([
            'product_id' => $product->id,
            'total' => $product->price,
            'stripe_id' => $this->input->getArgument('transaction_id'),
            'user_id' => $user->id
        ]);

        Mail::to($user->email)->send(new OrderConfirmation($order));
        Mail::to($user->email)->send(new AccountCreated($user->email));
    }
}
