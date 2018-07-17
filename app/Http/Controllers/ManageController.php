<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BankAccount;

class ManageController extends Controller
{
    public function index()
    {
        $model = new BankAccount;

        return view('manage.index', compact('model'));
    }

    public function validateBankAccounts()
    {
        dd(request('csvFile'));
    }


}
