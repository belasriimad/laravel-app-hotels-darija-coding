<?php

namespace App\Http\Controllers;
use App\User;
use App\Room;
use App\Hotel;
use App\Book;
use Auth;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.clients.index')->with(['users'=>User::where('isAdmin','=',0)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.register');
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
            'nom' => 'required|min:3',
            'prenom' => 'required|min:3',
            'email' => 'required|email:valid',
            'password' => 'required|min:6',
            'city' => 'required|min:3'
        ]);
        $user = new User();
        $user->firstname = $request->nom;
        $user->lastname = $request->prenom;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->city = $request->city;
        $user->zipcode = $request->zipcode;
        $user->adress = $request->adress;
        $user->save();
        return redirect()->route('users.create')->with(['success'=>'Compte crée avec success']);
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
        return view('users.update-profile')->with(['user'=>User::find($id)]);
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
            'nom' => 'required|min:3',
            'prenom' => 'required|min:3',
            'email' => 'required|email:valid',
            'city' => 'required|min:3'
        ]);
        $user = User::find($id);
        $user->firstname = $request->nom;
        $user->lastname = $request->prenom;
        $user->email = $request->email;
        if(!empty($request->password)){
            $user->password = bcrypt($request->password);
        }
        $user->city = $request->city;
        $user->zipcode = $request->zipcode;
        $user->adress = $request->adress;
        $user->update();
        return redirect()->route('user.profile')->with(['success'=>'Compte modifié avec success']);
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
        $user = User::findOrFail($id);
        if(count($user->bookings) > 0){
            for($i = 0; $i < count($user->bookings);$i++){
                Room::find($user->bookings[$i]['room_id'])->update(['status'=>0]);
            }
            $user->bookings()->delete();
            $user->delete();
            return redirect()->route('users.index')->with(['success'=>'Client supprimé avec success']);
        }else{
            $user->delete();
            return redirect()->route('users.index')->with(['success'=>'Client supprimé avec success']);
        }
    }
    public function login()
    {
        //
        return view('users.login');
    }
    public function auth(Request $request)
    {
        //
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required|min:6'
        ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect('/');
        }else{
            return redirect()->back()->with(['fail'=>'Email ou mot de passe est incorrect']);
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
    public function admin(){
        if(Auth::user()){
            if(Auth::user()->isAdmin){
                $rooms = Room::all();
                $bookings = Book::all();
                $users = User::all();
                $hotels = Hotel::all();
                return view('admin.index',compact('rooms','bookings','users','hotels'));   
            }
            return redirect('/');
        }
        return redirect('/');
    }
    public function profile(){
        if(Auth::user()){
            return view('users.profile',compact('rooms','bookings','users'));   
        }else{
            return redirect('/');
        }
    }
}
