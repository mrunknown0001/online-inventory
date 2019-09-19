<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Customer;

class CustomerController extends Controller
{
    /**
     * Customer Controller
     */
    public function index()
    {
    	return view('admin.customer.index');
    }



    /**
     * Add customer
     */
    public function addCustomer()
    {
        return view('admin.customer.add-edit', ['id' => NULL, 'customer' => NULL]);
    }



    /**
     * Store Customer
     */
    public function storeCustomer(Request $request)
    {
        $request->validate([
            'customer' => 'required',
            'address' => 'required',
            'note' => 'nullable',
        ]);

        $customer = $request['customer'];
        $address = $request['address'];
        $note = $request['note'];

        $new = new Customer();
        $new->customer = $customer;
        $new->address = $address;
        $new->note = $note;

        if($new->save()) {
            return redirect()->route('add.customer')->with('success', 'Customer Saved!');
        }

        return redirect()->route('add.customer')->with('error', 'Error in Adding Customer Data!');
    }



    /**
     * viewCustomer method
     */
    public function viewCustomer($id = NULL)
    {
        $id = $this->decryptString($id);

        $customer = Customer::findorfail($id);

        return $customer;
    }



    /**
     * remove customer method
     */
    public function removeCustomer($id = NULL)
    {
        $id = $this->decryptString($id);

        $customer = Customer::findorfail($id);

        $customer->active = 0;

        $customer->save();
    }




    /**
     * all customers
     */
    public function all()
    {
    	$data = [
    		'customer' => NULL,
    		'address' => NULL,
    		'action' => NULL,
    	];


        $customers = Customer::where('active', 1)->get();

        if(count($customers) > 0) {
            $data = NULL;

            foreach($customers as $c) {
                $data[] = [
                    'customer' => $c->customer,
                    'address' => $c->address,
                    'action' => "<button class='btn btn-primary btn-xs' id='view' data-id='" . encrypt($c->customer_id) . "'><i class='fa fa-eye'></i> View</button> <button class='btn btn-danger btn-xs' id='remove' data-id='" . encrypt($c->customer_id) . "'><i class='fa fa-trash'></i> Remove</button>",
                ];
            }
        }

    	return $data;
    }
}
