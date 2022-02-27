<?php
// Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_51KWl5kSJeRvB8myUGhjJ6MNET2gm4rY7RYR4HcjNes1dKUhxnFH7tCcj8uUcUquxKJHTaflbZbDcZdiQ8JwcSzCF00NBznmFfA'); 
        $payment_intent = \Stripe\PaymentIntent::create([
			'description' => 'Stripe Test Payment',
			'amount' => $request->total,
			'currency' => 'INR',
			'description' => 'Payment From All About Laravel',
			'payment_method_types' => ['card'],
		]);
         
        $intent = $payment_intent->client_secret;

        return view('payment',compact('intent'));