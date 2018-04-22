<?php

namespace App\Http\Controllers;
use App\Room;
use App\Book;
use Auth;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$rooms = Room::all();
        if(Auth::user()){
            if(Auth::user()->isAdmin){
              return view('admin.bookings.index')->with(['bookings'=>Book::all()]);
            }else{
                return view('booking')->with(['rooms'=>Room::all()]);
            }
        }else{
            return view('booking')->with(['rooms'=>Room::all()]);
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
            'dateDebut' => 'required|date',
            'dateFin' => 'required|date',
            'room_id'=> 'required'
        ]);
        Book::create(['date_in'=>$request->dateDebut,'date_out'=>$request->dateFin,'user_id'=>Auth::user()->id,'room_id'=>$request->room_id]);
        $room = Room::findOrFail($request->room_id);
        $room->status = 1;
        $room->date_in = $request->dateDebut;
        $room->date_out = $request->dateFin;
        $room->update();
        return redirect()->route('booking.index')->with(['success'=>'Réservation effectué avec succés!']);
        
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
        $booking = Book::findOrFail($id);
        Room::findOrFail($booking->room_id)->update(['status'=> 0]);
        $booking->delete();
        return redirect()->route('booking.index')->with(['success'=>'Réservation supprimée avec succés!']);
    }
}
