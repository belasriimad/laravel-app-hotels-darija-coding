<?php

namespace App\Http\Controllers;
use App\Hotel;
use App\Room;
use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class HotelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::user()){
            if(Auth::user()->isAdmin){
                return view('admin.hotels.index')->with(['hotels'=>Hotel::all()]);
            }else{
                return view('hotels.index')->with(['hotels'=>Hotel::all()]);
            }
        }else{
            return view('hotels.index')->with(['hotels'=>Hotel::all()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.hotels.add');
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
        $this->validate($request,[
            'name'=>'required',
            'rooms'=>'required',
            'city'=>'required',
            'photo'=>'required',
        ]);
        $file = $request->file('photo');
        $name = time().'_'.$file->getClientOriginalName();
        $file->move(public_path().'/images/',$name);
        Hotel::create(['name'=>$request->name,'rooms'=>$request->rooms,'city'=>$request->city,'photo'=>$name]);
        return redirect()->route('user.admin')->with(['success'=>'Hotel ajouté']);
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
        return view('hotels.show')->with(['hotel'=>Hotel::find($id)]);
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
        return view('admin.hotels.edit')->with(['hotel'=>Hotel::findOrFail($id)]);
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
        $this->validate($request,[
            'name'=>'required',
            'rooms'=>'required',
            'city'=>'required'
        ]);
        $hotel = Hotel::find($id);
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path().'/images/',$name);
            $hotel->photo = $name;
        }
        $hotel->name = $request->name;
        $hotel->rooms = $request->rooms;
        $hotel->city = $request->city;
        $hotel->update();
        return redirect()->route('user.admin')->with(['success'=>'Hotel modifié']);
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
        Hotel::findOrFail($id)->delete();
        return redirect()->route('user.admin')->with(['success'=>'Hotel suprimé']);
    }
    public function search(Request $request){
        if($request->hotel != null){
            $hotels = Hotel::where('name', Input::get('hotel'))
                            ->orWhere('name', 'like', '%' . Input::get('hotel') . '%')->get();
            return view('hotels.search',compact('hotels'));
        }else{
            $rooms = Room::where('date_in','=',null)
                            ->where('date_out', '=',null)
                            ->where('status', '=',0)->get();
            return view('hotels.search-rooms',compact('rooms'));
        }
    }
}
