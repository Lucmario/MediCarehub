<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class FedaPayController extends Controller
{
    public function initiatePayment(Request $request)
    {
        $amount = $request->input('amount');
        $customer_email = $request->input('email');
        $customer_name = $request->input('name');

        $client = new Client();
        $apiKey = env('FEDAPAY_API_KEY');
        $env = env('FEDAPAY_ENV', 'sandbox');
        $baseUrl = $env === 'live' ? 'https://api.fedapay.com/v1' : 'https://sandbox-api.fedapay.com/v1';

        try {
            $response = $client->post("$baseUrl/transactions", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $apiKey,
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'description' => 'Paiement consultation',
                    'amount' => $amount,
                    'currency' => ['iso' => 'XOF'],
                    'customer' => [
                        'firstname' => $customer_name,
                        'email' => $customer_email,
                    ],
                    'callback_url' => route('fedapay.callback'),
                    'return_url' => route('fedapay.return'),
                ],
            ]);

            $data = json_decode($response->getBody(), true);
            $redirectUrl = $data['transaction']['url'] ?? null;

            if ($redirectUrl) {
                return redirect($redirectUrl);
            } else {
                return back()->with('error', "Impossible d'obtenir l'URL de paiement FedaPay.");
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Erreur FedaPay : ' . $e->getMessage());
        }
    }
}
