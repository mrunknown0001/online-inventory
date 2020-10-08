<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PDF;

class ShippingPermitController extends Controller
{
    /**
     * index
     */
    public function index()
    {
    	return view('common.shipping_permit.index');
    }




    /**
     * Set starting shipping number
     */
    public function setStartingNumber()
    {
        // check if the starting number is already 
        $check = \App\ShippingPermitStart::where('active', 1)->first();

        if(!empty($check)) {
            return redirect()->route('shipping.permits')->with('error', 'Shipping Number Already Set!');
        }

        return view('common.shipping_permit.set-starting-shipping-no');
    }


    /**
     * save starting number saveStartShippingNumber
     */
    public function saveStartShippingNumber(Request $request)
    {
        $request->validate([
            'starting_number' => 'required',
        ]);

        $number = $request['starting_number'];

        $start = new \App\ShippingPermitStart();
        $start->start = $number;
        if($start->save()) {
            return redirect()->route('shipping.permits')->with('success', 'Shipping Start Number Saved!');
        }
    }


    /**
     * Add addShippingPermit
     */
    public function addShippingPermit()
    {
        $check = \App\ShippingPermitStart::where('active', 1)->first();

        if(empty($check)) {
            return redirect()->route('shipping.permits')->with('error', 'No Starting Shipping Number Set!');
        }

        $farms = \App\Farm::where('active', 1)->get();


        return view('common.shipping_permit.add-edit', ['id' => NULL, 'farms' => $farms]);
    }


    /**
     * store
     */
    public function postAddShippingPermit(Request $request)
    {
        $request->validate([
            'shippers_name' => 'required',
            'shippers_address' => 'required',
            'origin' => 'required', // farm
            'destination' => 'required',
            'destination_address' => 'nullable',
            'valid_until' => 'required', // date
            'live_stock_handlers_no' => 'required',
            'shippers_contact_no' => 'required',
            'livestock_carrier' => 'required',
            'vehicle_type' => 'required',
            'plate_no' => 'required',
            'inspected_by' => 'required',
            'approved_by' => 'required',
            'inspectors_address' => 'required',
            'approvers_address' => 'required'
        ]);


        $shippers_name = $request['shippers_name'];
        $shippers_address = $request['shippers_address'];
        $origin = $request['origin']; // farm id
        $destination = $request['destination'];
        $destination_address = $request['destination_address'];
        $valid_until = $request['valid_until'];
        $live_stock_handlers_no = $request['live_stock_handlers_no'];
        $shippers_contact_no = $request['shippers_contact_no'];
        $livestock_carrier = $request['livestock_carrier'];
        $vehicle_type = $request['vehicle_type'];
        $plate_no = $request['plate_no'];
        $inspected_by = $request['inspected_by'];
        $approved_by = $request['approved_by'];
        $inspectors_address = $request['inspectors_address'];
        $approvers_address = $request['approvers_address'];

        // get number in starting number if there is no previous permit number
        $last_number = \App\ShippingPermit::orderBy('created_at', 'desc')->first();

        if(empty($last_number)) {
            $start = \App\ShippingPermitStart::where('active', 1)->first();

            if(!empty($start)) {
                $permit_no = $start->start;
            }
            else {
                return redirect()->route('shipping.permits')->with('error', 'Please Set Starting Permit Number');
            }
        }
        else {
            $permit_no = $last_number->permit_no + 1;
        }


        // return $permit_no;

        // save
        $new = new \App\ShippingPermit();
        $new->permit_no = $permit_no;
        $new->shippers_name = $shippers_name;
        $new->shippers_address = $shippers_address;
        $new->origin = $this->decryptString($origin);
        $new->destination = $destination;
        $new->destination_address = $destination_address;
        $new->valid_until = date('Y-m-d', strtotime($valid_until));
        $new->livestock_handlers_no = $live_stock_handlers_no;
        $new->shippers_contact_no = $shippers_contact_no;
        $new->livestock_carrier = $livestock_carrier;
        $new->vehicle_type = $vehicle_type;
        $new->plate_no = $plate_no;
        $new->inspected_by = $inspected_by;
        $new->approved_by = $approved_by;
        $new->inspectors_address = $inspectors_address;
        $new->approvers_address = $approvers_address;

        if($new->save()) {
            return redirect()->route('shipping.permits')->with('success', 'Saved Shipping Permit!');
        }

    }


    /**
     * print function
     */
    public function print($id = NULL)
    {
        $id = $this->decryptString($id);

        $permit = \App\ShippingPermit::findorfail($id);

        return view('common.shipping_permit.print', ['permit' => $permit]);
    }



    /**
     * downloadPermitPdf
     */
    public function downloadPermitPdf($id = NULL)
    {
        $id = $this->decryptString($id);

        $permit = \App\ShippingPermit::findorfail($id);

        $pdf = PDF::loadView('common.shipping_permit.print', ['permit' => $permit]);

        $title = "Shipping Permit No " . $permit->permit_no . ".pdf";

        return $pdf->download($title);
    }


    /**
     * all
     */
    public function all()
    {
    	$data = [
    		'permit_no' => NULL,
    		'origin' => NULL,
    		'destination' => NULL,
    		'action' => NULL,
    	];

        $permits = \App\ShippingPermit::orderBy('created_at', 'asc')->get();

        if(count($permits) > 0) {
            $data = NULL;

            foreach($permits as $p) {
                $data[] = [
                    'permit_no' => $p->permit_no,
                    'origin' => $p->originFarm->name,
                    'destination' => $p->destination,
                    'action' => "<a href=" . route('print.shipping.permit', ['id' => encrypt($p->shipping_permit_id)]) . " class='btn btn-primary btn-xs'><i class='fa fa-print'></i> Print</a> <a href=" . route('download.permit', ['id' => encrypt($p->shipping_permit_id)]) . " class='btn btn-warning btn-xs'><i class='fa fa-download'></i> Download</a>"
                ];
            }
        }

    	return $data;
    }
}
