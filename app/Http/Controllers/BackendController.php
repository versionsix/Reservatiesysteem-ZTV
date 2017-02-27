<?php

namespace App\Http\Controllers;

use App\Play;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ShowBeheer()
    {
        return view('backend/beheer');
    }
    /*
     * PLAY FUNCTIONS
     * Show
     * ===> ShowPlay
     * Add
     * ===> ShowPlayAdd
     * ===> RequestPlayAdd
     * Edit
     * ===> ShowPlayEdit
     * ===> RequestPlayEdit
     * Delete
     * ===> ShowPlayDelete
     * ===> RequestPlayDelete
     */
    public function ShowPlay(Request $request)
    {
        $play = Play::get();
        \Debugbar::info($play);
        return view('backend.CRUD.listPlay', [
            'request' => $request,
            'play' => $play]);
    }
    public function ShowPlayAdd()
    {
        return view('backend.CRUD.addPlay');
    }
    public function RequestPlayAdd(Request $request)
    {
        $error_messages = [
            'name.required' => 'Geen naam opgegeven, gelive een naam op te geven',
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ], $error_messages);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        //Else if no errors, create new
        $play = new Play();
        $play->name = $request->input('name');
        if ($request->input('playEnabled') == null)
            $play->enabled = "true";
        $play->save();
        return redirect()
            ->action('BackendController@ShowPlay')
            ->with('status', 'Voorstelling "' . $play->name . '" successvol toegevoed')
            ->withInput();
    }
    public function ShowPlayEdit($id)
    {
        $play = Play::find($id);
        return view('backend.CRUD.editPlay', [
            'play' => $play]);
    }
    public function RequestPlayEdit($id, Request $request)
    {
        $error_messages = [
            'name.required' => 'Geen naam opgegeven, gelive een naam op te geven',
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ], $error_messages);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        //Else if no errors, update entry
        $play = Play::find($id);
        $play->name = $request->input('name');
        if ($request->input('playEnabled') != null)
        {
            $play->enabled = "true";
        }else{
            $play->enabled = "false";
        }

        $play->save();
        return redirect()
            ->action('BackendController@ShowPlay')
            ->with('status', 'Voorstelling "' . $play->name . '" successvol bijgewerkt')
            ->withInput();
    }
    public function ShowPlayDelete($id)
    {
        $play = Play::find($id);
        return view('backend.CRUD.deletePlay', [
            'play' => $play]);
    }
    public function ShowPerformance()
    {
        return 'todo';
    }
    public function ShowPerformanceAdd()
    {
        return 'todo';
    }
    public function ShowPerformanceEdit()
    {
        return 'todo';
    }
    public function ShowPage()
    {
        return 'todo';
    }
    public function ShowPageEdit()
    {
        return 'todo';
    }
    public function ShowReservation()
    {
        return 'todo';
    }
    public function ShowPerformanceReservation()
    {
        return 'todo';
    }
    public function ShowReservationEdit()
    {
        return 'todo';
    }
    public function ShowLog()
    {
        return 'todo';
    }


}
