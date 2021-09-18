<?php

namespace App\Http\Controllers\Offer;
use App\Events\PageVists;
use App\Events\Edit;
use App\Http\Controllers\Controller;
use App\Http\Requests\OfferRequest;
use App\Models\Offers\Offer;
use Illuminate\Http\Request;
use LaravelLocalization;
use getClientOriginalExtension;

use Event;
use App\Traits\OfferTrait;
use App\Models\Video;
class OfferController extends Controller
{
   

use OfferTrait;
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
       'viewers')->get();

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
        // $direction = LaravelLocalization::getCurrentLocale() == 'ar' ? 'rtl' : 'ltr';
         return view('offer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfferRequest $request)
    {
        

      
 $file_name=  $this->saveImage($request->photo,'offers');


         $op = Offer::Create([
            
            'photo'=>$file_name,
            'name_en'=>$request->name_en,
            'name_ar'=>$request->name_ar,
            'description_en'=>$request->description_en,
            'description_ar'=>$request->description_ar,
        ]);

    //    $op ? session()->flash('success', __('translate.offer_a_success'))
    //      : session()->flash('fail', __('translate.offer_a_fail'));

    //     return redirect('/offer/create');


      if ($op){
             return response()->json([
                 'status' => true,
                 'msg' => 'تم الحفظ بنجاح',
             ]);

            }else{
             return response()->json([
                 'status' => false,
                 'msg' => 'فشل الحفظ برجاء المحاوله مجددا',
             ]);

            }
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


        $data = Offer::where('id', $id)->first();

       event(new Edit($data));
        $direction = LaravelLocalization::getCurrentLocale() == 'ar' ? 'rtl' : 'ltr';
      
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


    public function getVideo()
    {
        $data = Video::first();
        event(new PageVists($data));

        echo $data->views;
    }


    public function destroy($id)
    {
        //
    }
}
