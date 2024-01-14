<?php

namespace App\Http\Controllers\User;

use App\Models\State;
use App\Models\Business;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Business::findOrFail(Auth::guard('user')->user()->business_id);
        return view('user.resources.business.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $states = State::all();
        $business_id = Auth::guard('user')->user()->business_id;
        $data = Business::where('id', $business_id)->firstOrFail();
        return view('user.resources.business.edit', compact('data', 'states'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Business::find($id);
        $logo = $data->logo;
        $registration_certificate = $data->registration_certificate;
        $gst_certificate = $data->gst_certificate;
        $owner_profile_pic = $data->owner_profile_pic;
        if ($request->logo != '') {
            $logo = Storage::put('images/logo', $request->logo);
        }
        if ($request->registration_certificate != '') {
            $registration_certificate = Storage::put('business/documents/'.$data['id'], $request->registration_certificate);
        }
        if ($request->gst_certificate != '') {
            $gst_certificate = Storage::put('business/documents/'.$data['id'], $request->gst_certificate);
        }
        if ($request->owner_profile_pic != '') {
            $owner_profile_pic = Storage::put('images/profile_pic', $request->owner_profile_pic);
        }
        $data->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'registration_number' => $request->registration_number,
            'gst_number' => $request->gst_number,
            'address' => $request->address,
            'city' => $request->city,
            'pin' => $request->pin,
            'state_id' => $request->state_id,
            'bank_address' => $request->bank_address,
            'ifsc' => $request->ifsc,
            'account_holder_name' => $request->account_holder_name,
            'account_number' => $request->account_number,
            'iec_code' => $request->iec_code,
            'ad_code' => $request->ad_code,
            'arn_code' => $request->arn_code,
            'payment_terms' => $request->payment_terms,
            'logo'=> $logo,
            'registration_certificate'=> $registration_certificate,
            'gst_certificate'=> $gst_certificate,
        ]);
        return redirect()->route('business.show', 1)->with('success', 'Business detail updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
