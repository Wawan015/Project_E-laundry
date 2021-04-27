<?php

namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        
        if($request->has('cari')){
            $customer=customer::where('nama','LIKE','%'.$request->cari.'%')->paginate(5);

        }else{
            $customer=customer::paginate(5);
        }
        //
        $title="Daftar Pelanggan";
        return view('karyawan.customers.index',compact('title','customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
        
       // return view('admin.input');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            
            'nama'=>'required',
            'kontak'=>'required',
            'alamat'=>'required',
            'kelamin'=>'required'
        ]);
        $request['user_id']=Auth::id();
        Customer::create($request->all());
        return redirect('admin/customers')->with('status', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $customer=Customer::find($id);
        return view('karyawan.customers.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $customer=Customer::find($id);
        $customer->nama = $request->nama;
        $customer->kontak = $request->kontak;
        $customer->alamat = $request->alamat;
        $customer->kelamin = $request->kelamin;
        $customer->save();
        
        //return $request;
        return redirect('admin/customers')->with('status', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function delete($id)
    {
        $customer=Customer::find($id);
        $customer->delete();
        return redirect('admin/customers')->with('status', 'Data Berhasil Dihapus');
    }
}