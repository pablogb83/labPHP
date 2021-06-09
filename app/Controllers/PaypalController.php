<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use PayPal\Api\Links;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalHttp\HttpException;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;

class PaypalController extends BaseController{

  private $clientId = "ASo-a1FD2hbEDxRsMt0HvDtLy4yww14Pa5lniL5DdQvIwdRc-T7HthB3-iPZzNF_tZrOJ_KCAKDPYLau";
  private $clientSecret = "EKTksXdhGrBh7o9Lg1tZb1WnuGeq0iezBNAsS0jPgKEgJ7wgj7k4nPbr7Jcw8fU0W-oKlCDGJJOE_l36";
  private $environment;
  private $client;
  public function __construct(){
    $this->environment = new SandboxEnvironment($this->clientId, $this->clientSecret);
    $this->client = new PayPalHttpClient($this->environment);
  }
  private $orderId;

  public function createOrder(){
    // Creating an environment
    $user=$_GET['id'];
    $request = new OrdersCreateRequest();
    $request->prefer('return=representation');
    $baseUrl = base_url();
    $request->body = [
                        "intent" => "CAPTURE",
                        "purchase_units" => [[
                            "reference_id" => "test_ref_id1",
                            'description' => "Suscripcion a Truchameo",
                            'custom_id' => $user,
                            "amount" => [
                                "value" => "20.00",
                                "currency_code" => "USD"
                            ]
                        ]],
                        "application_context" => [
                              "cancel_url" => "$baseUrl/ExecutePayment?success=false",
                              "return_url" => "$baseUrl/ExecutePayment?success=true"
                        ] 
                    ];

    try {
        // Call API with your client and get a response for your call
        $response = $this->client->execute($request);
        // If call returns body in response, you can get the deserialized version from the result attribute of the response
        $array = json_decode(json_encode($response->result), true);
        $this->orderId=$array['id'];
        print_r("El id es: " . $this->orderId);
        $approvalUrl = $array['links'][1]['href'];
        return redirect()->to($approvalUrl);  
    }catch (HttpException $ex) {
        echo $ex->statusCode;
        print_r($ex->getMessage());
    }
  }

  public function captureOrder(){
    $id = $_GET['token'];
    $request = new OrdersCaptureRequest($id);
    $request->prefer('return=representation');
    try {
        // Call API with your client and get a response for your call
        $response = $this->client->execute($request);
        // If call returns body in response, you can get the deserialized version from the result attribute of the response
        print_r($response); 
        $array = json_decode(json_encode($response->result), true);
        $user = $array['purchase_units'][0]['custom_id'];       
        return redirect()->to(base_url().'/suscripExito?id='. $user);
    }catch (HttpException $ex) {
      return redirect()->to(base_url());
    }
  }

}