<?php

require __DIR__ . "/vendor/autoload.php";

$stripe_secret_key = "sk_test_51PDaPAAVUQWw9VpGQdPTuC5hr5dPwLiVdobNUvbQgeeE29uphU7j3kA1LQQxFdlbbgR9XTrXfNNcFZDul93skYtP00emlzyb2M";

\Stripe\Stripe::setApiKey($stripe_secret_key);

$checkout_session = \Stripe\Checkout\Session::create([
    "mode" => "payment",
    "success_url" => "http://localhost:63342/accomodationManagment/front/travelix-master/reservation.php",
    //"cancel_url" => "http://localhost:63342/accomodationManagment/front/travelix-master/mails.php",
    "locale" => "auto",
    "line_items" => [
        [
            "quantity" => 1,
            "price_data" => [
                "currency" => "usd",
                "unit_amount" => 2000,
                "product_data" => [
                    "name" => "T-shirt"
                ]
            ]
        ],
        [
            "quantity" => 2,
            "price_data" => [
                "currency" => "usd",
                "unit_amount" => 700,
                "product_data" => [
                    "name" => "Hat"
                ]
            ]
        ]
    ]
]);

http_response_code(303);
header("Location:" . $checkout_session->url);