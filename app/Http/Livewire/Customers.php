<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use App\Models\Customer;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Customers extends Component
{
    use WithPagination;

    public $search;
    public $nama,$alamat,$kelamin,$no_telp,$email_customer,$user_id;
    public $isOpen = 0;

    public function render()
    {       
        $searchParams = '%'.$this->search.'%';
        return view('livewire.customers', [
            'customers' => Customer::where('nama', $searchParams)->latest()->paginate(5)
        ]);
    }

    public function showModal() {
        $this->isOpen = true;
    }

    public function hideModal() {
        $this->isOpen = false;
    }

    public function store(Request $request){
        //dd($request->all());
        $this->validate(
            [

                'nama' => 'required',
                'alamat' => 'required',
                'kelamin' => 'required',
                'no_telp' => 'required',
                'email_customer' => 'required',
                
                
            ]
           
        );
            Customer::updateOrCreate(['id' => $this->customerId], [
            
            'nama' => $this->nama,
            'alamat' => $this->alamat,
            'kelamin' => $this->kelamin,
            'no_telp' => $this->no_telp,
            'email_customer' => $this->email_customer,
        ]);
        
        

        $this->hideModal();

        session()->flash('info', $this->customerId ? 'Post Update Successfully' : 'Post Created Successfully' );

        $this->customerId = '';
        $this->nama = '';
        $this->alamat = '';
        $this->kelamin = '';
        $this->no_telp= '';
        $this->email_customer = '';

    }

    public function edit($id){
        $customer = Customer::findOrFail($id);
        $this->customerId = $id;
        $this->nama = $customer->nama;
        $this->alamat = $customer->alamat;
        $this->kelamin = $customer->kelamin;
        $this->no_telp = $customer->no_telp;
        $this->email_customer = $customer->email_customer;

        $this->showModal();
    }

    public function delete($id){
        Customer::find($id)->delete();
        session()->flash('delete','Post Successfully Deleted');
    }
}
