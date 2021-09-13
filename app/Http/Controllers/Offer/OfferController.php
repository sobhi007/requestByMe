<?php

namespace App\Http\Controllers\Offer;

use App\Http\Controllers\Controller;
use App\Http\Requests\OfferRequest;
use App\Models\Offers\Offer;
use Illuminate\Http\Request;
use LaravelLocalization;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $op = Offer::select(
            'id',
            "name_" . LaravelLocalization::getCurrentLocale() . " as name",
            "description_" . LaravelLocalization::getCurrentLocale() . " as description",
        )->get();

        $direction = LaravelLocalization::getCurrentLocale() == 'ar' ? 'rtl' : 'ltr';

        return view('offer.index', ['offers' => $op, 'direction' => $direction]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $direction = LaravelLocalization::getCurrentLocale() == 'ar' ? 'rtl' : 'ltr';
        return view('offer.create')->with(['direction' => $direction]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfferRequest $request)
    {

        $op = Offer::Create($request->toArray());

        $op ? session()->flash('success', __('translate.offer_add_success'))
        : session()->flash('fail', __('translate.offer_add_fail'));

        return redirect('/offer/create');

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
        $direction = LaravelLocalization::getCurrentLocale() == 'ar' ? 'rtl' : 'ltr';
        $data = Offer::where('id', $id)->first();
        return view('offer.edit')->with(['data' => $data, 'direction' => $direction]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OfferRequest $request, $id)
    {
        $op = Offer::find($id)->update($request->all());
        $op ? session()->flash('success', __('translate.offer_update_success'))
        : session()->flash('fail', __('translate.offer_update_fail'));

        return redirect('/offer/create');

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
}
