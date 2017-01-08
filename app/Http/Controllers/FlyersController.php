<?php

namespace App\Http\Controllers;

use App\Flyer;
use App\Photo;
use App\Http\Requests\FlyerFormRequest;

class FlyersController extends Controller
{
	
    /**
     * User usthentiaction 
     */
    public function __construct()
    {
		$this->middleware('auth', ['except' => ['index', 'show']] );
    }    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flyers = Flyer::paginate(7);
		
		return view('flyers.index', ['flyers' => $flyers]);
    }

    /**
     * Show the form for creating a new Flyer.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('flyers.create');
    }

    /**
     * Store a newly created flyer in database.
     *
     * @param  App\Http\Requests\FlyerFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FlyerFormRequest $request)
    {
        // request validation via Form Request
		
		$flyer = \Auth::user()->publish(
            new Flyer($request->all())
        );
        
		flash()->success('Success', 'Your Flyer has been created.');

		return redirect(flyer_path($flyer));		
    }

    /**
     * Display the specified flyer.
     *
     * @param  string  $zip
     * @param  string  $street 
     * @return \Illuminate\Http\Response
     */
    public function show($zip, $street)
    {
        $flyer = Flyer::locatedAt($zip, $street);
        
        return view('flyers.show', compact('flyer'));
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
    }
}
