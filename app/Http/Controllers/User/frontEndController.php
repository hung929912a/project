<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ToursModel;
use App\Model\guider;
use App\Model\package;
use App\Model\destModel;
<<<<<<< HEAD
use App\Model\banner;
use App\Model\slider;
use App\Model\sliderCustomer;
=======
use App\Model\traveltype_tb;
>>>>>>> 1f0fdcbb3282c9df2ac9d005ce944b7146aa0e09
use DB;

class frontEndController extends Controller
{
    public function getHome(){
        $data['guider'] = guider::where('status',1)->get();
        $data['dest']   = destModel::all();
<<<<<<< HEAD
    	$data['tour'] = ToursModel::where('status',1)->orderBy('tour_id','desc')->take(4)->get();
        $data['slider'] = slider::where('slider_status',1)->get();
        $data['banner'] = banner::where('banner_id',1)->first('banner_img');
        $data['sliCus'] = sliderCustomer::where('slider_status',1)->take(3)->get();

=======
    	$data['tour'] = ToursModel::where('status',1)->orderBy('tour_id','desc')->take(10)->get();
>>>>>>> 1f0fdcbb3282c9df2ac9d005ce944b7146aa0e09
    	return view('frontEnd.index',$data);
    }

    public function getTourDetail($id){

    	$tour = ToursModel::find($id);
        $id = $tour->dest_id;
        $dest = destModel::where('dest_id',$id)->first();
        if($tour->package!=null){
            $key = package::wherein('pac_id',json_decode($tour->package))->get();
        }
        $unkey = package::where('status',1)->orderBy('pac_id','desc')->take(4)->get();
        $data = banner::where('banner_id',2)->first('banner_img');
    	return view('frontEnd.tour-details',compact('tour','key','unkey','dest','data'));
    }
    public function getTourpackages(){
    	// $data['tour'] = ToursModel::where('status',1)->orderBy('tour_id','desc')->paginate(6);
        $data['guider'] = guider::where('status',1)->get();
        $data['dest']   = destModel::all();
<<<<<<< HEAD
    	$data['data'] = DB::table('Tours_tb')->where('status',1)->orderBy('tour_id','desc')->paginate(3);
        $data['banner'] = banner::where('banner_id',2)->first('banner_img');
        $data['sliCus'] = sliderCustomer::where('slider_status',1)->take(3)->get();
=======
    	$data['data'] = DB::table('Tours_tb')->where('Tours_tb.status',1)->join('traveltype_tb','Tours_tb.tour_id','=','traveltype_tb.tour_id')->orderBy('Tours_tb.tour_id','desc')->paginate(6);
>>>>>>> 1f0fdcbb3282c9df2ac9d005ce944b7146aa0e09
    	return view('frontEnd.tour-packages',$data);
    }
    public function getpagetours(Request $request){
        if($request->ajax())
        {
            $data['data'] = DB::table('Tours_tb')->where('status',1)->orderBy('tour_id','desc')->paginate(6);
            return view('frontEnd.tours',$data);
        }
    }
}