<?php

namespace App\Http\Controllers;

use PayPalHttp\HttpException;
use Illuminate\Http\Request;
use PayPalCheckoutSdk\Subscriptions\SubscriptionsGetRequest;
use PayPalCheckoutSdk\Subscriptions\SubscriptionsPatchRequest;
use PayPal\Core\SandboxEnvironment as sandboxEnvironment;
use PayPalHttp\HttpClient as PayPalHttpClient;
use Illuminate\Support\Facades\Http;
use Srmklive\PayPal\Services\ExpressCheckout;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

    class PayPalController extends Controller
    {
        public function getToken(){
            $clientId = 'ARNJnXNRt51i4y59_gRQ3KczGD5bP7eGCoVFbeAl8NaI_RAzt3DptaiWTC_NqadwdZ3V6KVdGxpaWvLh';
        $clientSecret = 'ECvjieydGl0nNdce1DA-ZQp1ZJ-6xu1Mt0NxG2qGp9YOfZMgLOp6-Q1baukoch8TT1Swb9vyt0WJ7XGt';

$accessTokenResponse = shell_exec("curl -v -X POST https://api-m.sandbox.paypal.com/v1/oauth2/token \
    -H 'Accept: application/json' \
    -H 'Accept-Language: en_US' \
    -u '$clientId:$clientSecret' \
    -d 'grant_type=client_credentials'");

$accessTokenData = json_decode($accessTokenResponse, true);
$expiresIn = $accessTokenData['expires_in']; 
$expirationTime = time() + $expiresIn;

if (isset($accessTokenData['access_token'])) {
    $accessToken = $accessTokenData['access_token'];
     return $accessToken; 
} else {
    // Handle the case where access token retrieval failed.
}

        }
    
    public function createPlan()             
    {   
        $accessToken = $this->getToken();
        if ($accessToken === null) {
            return response()->json(['error' => 'Unable to get access token']);
        }
        
        $response = Http::withToken($accessToken)
            ->withHeaders([
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'PayPal-Request-Id' => 'PLAN-18062019-001',
                'Prefer' => 'return=representation',
            ])
            ->post('https://api-m.paypal.com/v1/billing/plans', [
                'product_id' => 'PROD-XXCD1234QWER65782',
                'name' => 'Video Streaming Service Plan',
                'description' => 'Video Streaming Service basic plan',
                'status' => 'ACTIVE',
                'billing_cycles' => [
                    // ... your billing cycles array
                ],
                'payment_preferences' => [
                    // ... your payment preferences array
                ],
                'taxes' => [
                    'percentage' => '10',
                    'inclusive' => false,
                ],
            ]);
        
        dd($response->json());
    }


    public function updateSubscriptionPlanPrice($planId, $newPrice)
    {
     
        $accessToken = $this->getToken();
        // dd($accessToken);
        
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => "Bearer $accessToken",
        ])->post("https://api-m.sandbox.paypal.com/v1/billing/plans/$planId/update-pricing-schemes", [
            'pricing_schemes' => [
                [
                    'billing_cycle_sequence' => 1,
                    'pricing_scheme' => [
                        'fixed_price' => [
                            'value' => $newPrice,
                            'currency_code' => 'USD',
                        ],
                        'roll_out_strategy' => [
                            'effective_time' => '2023-02-10T21:20:49Z',
                            'process_change_from' => 'NEXT_PAYMENT',
                        ],
                    ],
                ],
                // ... (additional pricing schemes as needed)
            ],
        ]);

        // Access the response body
        // return response()->json($response->json());
        return view('product.monbasket');


    }



    public function Plan(){
        return view('product.subcribe');
    }

    public function yearlyPlan(){
        return view('product.yearsubcribe');
    }
}

