<?php

namespace App\Http\Controllers\AdmindanSuperadmin\Superadminpage;


use App\Http\Controllers\Controller;

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
    
        return view('admindansuperadmin.superadminpage.datatable.clientside', compact('data','request'));
    }

    public function serverside(Request $request)
    {
      
        /* Request Data Table Server Side */
        if ($request->ajax()) {
            
            $data = new User;
            $data = $data->orderBy('id', 'asc');

            // Proses pencarian
            if ($request->has('search') && !empty($request->input('search')['value'])) {
                $search = $request->input('search')['value'];
                $data = $data->where(function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%');
                });
             }

            return DataTables::of($data)
            ->addColumn('DT_RowIndex', function($data) {
                return $data->id; // Gunakan kolom yang sesuai untuk indeks
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
            ->addColumn('password', function($data){
                return $data->password;
            })
            // ->addColumn('action', function($data){
            //     return '<a data-toggle="modal" data-target="#modal-hapus' . $data->id . '" class="btn btn-danger delete-btn" data-id="' . $data->id . '"><i class="fas fa-trash-alt"></i>Delete</a>';
            // })
            
            /* Render Untuk Image dan action */
            
            ->rawColumns(['photo','action'])
            ->make(true);
        }
    
        return view('admindansuperadmin.superadminpage.datatable.serverside', compact('request'));
    }
 
    public function delete(Request $request, $id)
    {
        $data = User::find($id);
    
        if ($data) {
            $data->delete();
        }
    
        return response()->json(['success' => true]);
    }
    

}
