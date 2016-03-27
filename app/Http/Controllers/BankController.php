<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BankController extends Controller
{
    public function cancel()
    {
        $returnmsg = 'Payment cancelled';
        return view('bankredirect', ['message' => $returnmsg]);
    }

    public function callback()
    {
        $returnmsg = 'Payment successful';
        return view('bankredirect', ['message' => $returnmsg]);
    }

    public function bankQuery()
    {

        $bank = new \ArturKp\LaravelBanklinks\Estonia\SEB();
        $bank->setCallbackUrl(\URL::to('callback/seb')); //callback/seb
        $bank->setCancelUrl(\URL::to('cancel/seb')); //cancel/seb

        $requestData = $bank->getPaymentRequest(1, 25, 'Beer + Movie');
        $requestUrl = $bank->getRequestUrl();

        return view('dbqueryview', compact('requestData', 'requestUrl'));
    }
    
}
