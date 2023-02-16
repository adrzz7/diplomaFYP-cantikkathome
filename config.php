<?php
require_once('./lib/Stripe.php');

/* REPLACE STRIPE_SECRET_KEY AND STRIPE_SECRET_KEY WITH YOUR CREDENTIALS */

$stripe = array(
  "secret_key"      => "sk_test_51IFtjgAdUBNlkal9jd6cXEOG6SupCrFw3we0wItHMgyHXLbUyuHGQ3shDqCWsmA4VGZJXPc1QaFppfvjbS1it6Lo00n6EuPTXy",
  "publishable_key" => "pk_test_51IFtjgAdUBNlkal9Y7WIFp1T6pRN6b582U0AKE7sRZrD0bvM4OzR2HPN3xYUyeknhzjJeTbmgSTc2xQrXDD9aiFP002FO6NKf5"
);

Stripe::setApiKey($stripe['secret_key']);
?>
