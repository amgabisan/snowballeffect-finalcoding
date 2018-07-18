<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BankAccount;
use Illuminate\Http\UploadedFile;
use League\Csv\Reader;

class ManageController extends Controller
{
    public function index()
    {
        return view('manage.index');
    }

    public function validateBankAccounts(Request $request)
    {
        $request->validate([
            'csvFile' => 'required|mimes:csv,txt',

        ], [
            'csvFile.mimes' => 'Please upload CSV file, other files are not supported.'
        ]);

        $file = $request->file('csvFile');
        $reader = Reader::createFromPath($file, 'r');
        $bankAccounts = [];

        foreach ($reader as $row) {
            $bankAccount = array_shift($row); // Assume that each row only has one column
            $bankAccounts[$bankAccount] = $this->validateBankAccount($bankAccount);
        }

        return view('manage.index', compact('bankAccounts'));
    }

    private function validateBankAccount($bankAccount)
    {
        $multiplicand = [6, 3, 7, 9, 0, 10, 5, 8, 4, 2, 1]; // branch & account
        $bankAccount = explode("-", $bankAccount);
        $bankAccount = implode("", $bankAccount);

        if ((strlen($bankAccount) == 15 || strlen($bankAccount) == 16) && preg_match('/^[0-9]+$/', $bankAccount)) {
            $bankAccount = substr($bankAccount, 2, 11);
            $bankAccount = str_split($bankAccount); // convert string to array

            $total = array_map(function($x, $y) { return intval($x) * $y; },
                       $bankAccount, $multiplicand); // calculate each item in bankAccount with each item in multiplicand
            $total = array_sum($total); // add all items in the array
            return ($total % 11 == 0) ? true : false;

        }
        return false;
    }


}
