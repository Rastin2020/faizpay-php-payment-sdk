<?php


use FaizPay\PaymentSDK\Connection;
use FaizPay\PaymentSDK\Payment;
use FaizPay\PaymentSDK\Provider;
use FaizPay\PaymentSDK\User;

class NewPayment
{

    public function createNewPayment()
    {
        $terminalId = '8afa74ae-6ef9-48bb-93b2-9fe8be53db50';
        $terminalSecret = '55d7d5ed-be22-4321-bb3f-aec8524d8be2';
        $orderId = 'ABC';
        $amount = '10.00';

        $connection = Connection::createConnection($terminalId, $terminalSecret);

        $payment = Payment::createPayment(
            $connection,
            $orderId,
            $amount
        );

        $user = User::createUser(
            $email = 'john.doe@test.com',
            $firstName = 'John',
            $lastName = 'Doe',
            $contactNumber = '07000845953'
        );
        $payment->setUser($user);

        $provider = Provider::createProvider(
            $providerId = 'lloyds-bank',
            $sortCode = '123456',
            $accountNumber = '12345678'
        );
        $payment->setProvider($provider);

        $url = $payment->process($redirectBrowser = false);
    }


}