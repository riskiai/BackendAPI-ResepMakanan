<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DataTableController extends Controller
{
    
    public function clientside(Request $request)
    {
        $data = new User();

        /* Melakukan Filter Data */
        if ($request->get('search')) {
           $data =  $data->where('name', 'LIKE', '%' . $request->get('search') . '%')
                ->orWhere('email', 'LIKE', '%' . $request->get('search') . '%');
        }

        $data = $data->get();
    
        return view('adminpage.datatable.clientside', compact('data','request'));
    }

    public function serverside(Request $request)
    {
      
        /* Request Data Table Server Side */
        if ($request->ajax()) {
            
            $data = new User;
            $data = $data->latest(); // Dimulai dari yang terbaru

            return DataTables::of($data)
            ->addColumn('no', function($data){
                return 'ini nomor';
            })
            ->addColumn('photo', function($data){
                return ' <img src="'.asset('storage/photo-user/' . $data->image).'" alt="" width="50">';
            })
            ->addColumn('nama', function($data){
                return $data->name;
            })
            ->addColumn('email', function($data){
                return $data->email;
            })
            ->addColumn('action', function($data){
                return '  <a href="'.route('admin.user.edit', ['id' => $data->id]).'" class="btn btn-primary"><i class="fas fa-pen"></i>Edit</a>
                <a data-toggle="modal" data-target="#modal-hapus'.$data->id.'" class="btn btn-danger"><i class="fas fa-trash-alt"></i>Delete</a>';
            })
            /* Render Untuk Image dan action */
            ->rawColumns(['photo','action'])
            ->make(true);
        }
    
        return view('adminpage.datatable.serverside', compact('request'));
    }
 
}
