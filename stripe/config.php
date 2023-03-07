<?php

 
// Product Details  
// Minimum amount is $0.50 US  
$productName = "Codex Demo Product";  
$productID = "DP12345";  
$productPrice = 55; 
$currency = "usd"; 
  
/* 
 * Stripe API configuration 
 * Remember to switch to your live publishable and secret key in production! 
 * See your keys here: https://dashboard.stripe.com/account/apikeys 
 */ 
define('STRIPE_API_KEY', 'sk_test_51MgPtTGMJ1GztlcrvctPARbVZd0s3vQGJeyqXwSj5QmambgoysPS1WyGqVis5ZSojHUgBwWP1ebTlASxO9Kw4NEt00EWaq73TC'); 
define('STRIPE_PUBLISHABLE_KEY', 'pk_test_51MgPtTGMJ1GztlcrdNoxsvQSpXEJcMrXh5HFO0qvmQZ51OE7TAq56QoEWasEnizCfgChRH5hK9uvHluOeGoke5Wf00jmap9B9s'); 
define('STRIPE_SUCCESS_URL', 'http://localhost/chanborey/page/'); //Payment success URL 
define('STRIPE_CANCEL_URL', 'http://localhost/chanborey/page/'); //Payment cancel URL 
    
// Database configuration    
define('DB_HOST', 'localhost');   
define('DB_USERNAME', 'root'); 
define('DB_PASSWORD', '');   
define('DB_NAME', '_cloths'); 
 
?>