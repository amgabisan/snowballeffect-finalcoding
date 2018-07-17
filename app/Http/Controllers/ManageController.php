<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BankAccount;
use Illuminate\Http\UploadedFile;

class ManageController extends Controller
{
    public function index()
    {
        $model = new BankAccount;

        return view('manage.index', compact('model'));
    }

    public function validateBankAccounts(Request $request)
    {
        $request->validate([
            'csvFile' => 'required|mimes:csv,txt',

        ], [
            'csvFile.mimes' => 'Please upload CSV file, other files are not supported.'
        ]);
        $file = $request->file('csvFile');
        dd($file->getMimeType());
    }


}
