<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\ImportJob;
use Illuminate\Support\Facades\Storage;

class FileImportsController extends Controller
{
    public function index() {
        return view('welcome');
    }

    public function import(Request $request) {
        $request->validate([
            'file' => 'required',
        ]);
        $filePath = request()->file('file')->store('imports');
        ImportJob::dispatch($filePath);

        Storage::delete($filePath);

        return back()->withStatus("Success");
    } 
}
