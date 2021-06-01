<?php

namespace App\Controllers;

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\PaymentExecution;

use App\Controllers\BaseController;
use PayPal\Rest\ApiContext;

class PaypalController extends BaseController{

    protected $apiContext;

    public function __construct(){
        $this->apiContext= new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'ASo-a1FD2hbEDxRsMt0HvDtLy4yww14Pa5lniL5DdQvIwdRc-T7HthB3-iPZzNF_tZrOJ_KCAKDPYLau',     // ClientID
                'EKTksXdhGrBh7o9Lg1tZb1WnuGeq0iezBNAsS0jPgKEgJ7wgj7k4nPbr7Jcw8fU0W-oKlCDGJJOE_l36'      // ClientSecret
            )
        );
    }

    public function getApprovalLink(){
        
        $user=$_GET['id'];
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        $item1 = new Item();
        $item1->setName('Suscripcion')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice(20);
        
        $itemList = new ItemList();
        $itemList->setItems(array($item1));

        $details = new Details();
        $details->setShipping(0)
            ->setTax(0)
            ->setSubtotal(20);

        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal(20)
            ->setDetails($details);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Suscripcion a Truchameo")
            ->setInvoiceNumber(uniqid())
            ->setCustom($user);
        $baseUrl = base_url();
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl("$baseUrl/ExecutePayment?success=true")
            ->setCancelUrl("$baseUrl/ExecutePayment?success=false");

        $payment = new Payment();
        $payment->setIntent("authorize")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));

        $request = clone $payment;

        $payment->create($this->apiContext);
      
        $approvalUrl = $payment->getApprovalLink();
        return redirect()->to($approvalUrl);           

    }
    public function executePayment(){
        if (isset($_GET['success']) && $_GET['success'] == 'true') {
                echo "ENTRE A EJECUTAR PAGO";
                $paymentId = $_GET['paymentId'];
                $payment = Payment::get($paymentId, $this->apiContext);
            
                $execution = new PaymentExecution();
                $execution->setPayerId($_GET['PayerID']);
            
                $transactionlist = $payment->getTransactions();
                $transaction = $transactionlist[0];
                $amount = new Amount();
                $details = new Details();

                $details->setShipping(0)
                    ->setTax(0)
                    ->setSubtotal(20);
            
                $amount->setCurrency('USD');
                $amount->setTotal(20);
                $amount->setDetails($details);
                $transaction->setAmount($amount);
                $user = $transaction->getCustom();
                $execution->addTransaction($transaction);
            
                $result = $payment->execute($execution, $this->apiContext);
                return redirect()->to(base_url().'/suscripExito?id='. $user);

            } else {
                echo "ALGO FALLO";
                return redirect()->to(base_url());
            }
    }


}