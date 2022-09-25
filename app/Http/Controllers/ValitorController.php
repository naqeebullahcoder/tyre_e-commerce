<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValitorController extends Controller
{
    //

    public function payment()
    {

        $key = 'Valitor';


        // Gateway URL
        $url = 'https://gateway.valitor.com/direct/';



        // Request
        $req = array(
            'merchantID' => '113498',
            'action' => 'SALE',
            'type' => 1,
            'countryCode' => 826,
            'currencyCode' => 826,
            'amount' => 1001,
            'cardNumber' => '4929421234600821',
            'cardExpiryMonth' => 12,
            'cardExpiryYear' => 15,
            'cardCVV' => '356',
            'customerName' => 'Test Customer',
            'customerEmail' => 'test@testcustomer.com',
            'customerPhone' => '+44 (0) 123 45 67 890',
            'customerAddress' => '16 Test Street',
            'customerPostCode' => 'TE15 5ST',
            'orderRef' => 'Test purchase',
            'transactionUnique' => uniqid(),
        );



        // Create the signature using the function called below.
        $req['signature'] = $this->createSignature($req, $key);

        // Initiate and set curl options to post to the gateway
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($req));
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);



        // Send the request and parse the response
        parse_str(curl_exec($ch), $res);


        // Close the connection to the gateway
        curl_close($ch);


        // Extract the return signature as this isn't hashed
        $signature = null;
        if (isset($res['signature'])) {
            $signature = $res['signature'];
            unset($res['signature']);
        }


        // Create the signature using the function called below.
        $req['signature'] = $this->createSignature($req, $key);


        // Initiate and set curl options to post to the gateway
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($req));
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


        // Send the request and parse the response
        parse_str(curl_exec($ch), $res);


        // Close the connection to the gateway
        curl_close($ch);


        // Extract the return signature as this isn't hashed
        $signature = null;
        if (isset($res['signature'])) {
            $signature = $res['signature'];
            unset($res['signature']);
        }



        // Check the return signature
        if (!$signature || $signature !== $this->createSignature($res, $key)) {


            // You should exit gracefully
            die('Sorry, the signature check failed');
        }


        // Check the response code
        if ($res['responseCode'] === "0") {
            echo "<p>Thank you for your payment.</p>";
        } else {
            echo "<p>Failed to take payment: " . htmlentities($res['responseMessage']) .
                "</p>";
        }


        // Function to create a message signature


    }
    public function createSignature(array $data, $key)
    {
            // Sort by field name
            ksort($data);


            // Create the URL encoded signature string
            $ret = http_build_query($data, '', '&');


            // Normalise all line endings (CRNL|NLCR|NL|CR) to just NL (%0A)
            $ret = str_replace(array('%0D%0A', '%0A%0D', '%0D'), '%0A', $ret);

            // Hash the signature string and the key together
            return hash('SHA512', $ret . $key);

    }




}
