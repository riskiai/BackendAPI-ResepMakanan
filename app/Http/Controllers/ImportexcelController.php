<?php

namespace App\Http\Controllers;

use App\Imports\MultipleSheetsImport;
use App\Models\User;
use App\Imports\UserImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Cache;

class ImportexcelController extends Controller
{
    public function cache(Request $request){
        $data = Cache::remember('users', now()->addMinutes(5), function(){
            return User::get();
        });

        return view('adminpage.reportexcel.cache', compact('data'));

    }

    public function import(Request $request){
        return view('adminpage.reportexcel.import');
    }

    public function import_proses(Request $request){

      /*  try {
            Excel::import(new UserImport(), $request->file('file'));
            return redirect()->back();
       } catch (\Exception $e) {
            return $e->getMessage();
       } */

       try {
        Excel::import(new MultipleSheetsImport(), $request->file('file'));
        return redirect()->back();
        } catch (\Exception $e) {
                return $e->getMessage();
        }
        
    }
}
