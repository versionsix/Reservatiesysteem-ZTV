<?php

namespace App\Http\Controllers;

use App\Page;
use App\Performance;
use App\Play;
use App\SentMail;
use Carbon\Carbon;
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
            'page_content.required' => 'Geen beschrijving opgegeven, gelive een beschrijving op te geven',
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'page_content' => 'required',
        ], $error_messages);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        //Else if no errors, create new
        $play = new Play();
        $play->name = $request->input('name');
        $play->page_content = $request->input('page_content');
        if (!($request->input('playEnabled') == null))
        {
            $play->enabled = "true";
            Play::where('enabled', '=', 'true')->update(['enabled' => 'false']);
        }

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
            'page_content.required' => 'Geen beschrijving opgegeven, gelive een beschrijving op te geven',
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'page_content' => 'required',
        ], $error_messages);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        //Else if no errors, update entry
        $play = Play::find($id);
        $play->name = $request->input('name');
        $play->page_content = $request->input('page_content');
        if ($request->input('playEnabled') != null && $play->enabled == "false")
        {
            Play::where('enabled', '=', 'true')->update(['enabled' => 'false']);
            $play->enabled = "true";
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
    public function RequestPlayDelete($id, Request $request)
    {
        $error_messages = [
            'confirmDelete.required' => 'U moet de checkbox aanvinken om verwijdering te bevestigen.',
        ];
        $validator = Validator::make($request->all(), [
            'confirmDelete' => 'required',
        ], $error_messages);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        //Else if no errors, update entry
        $play = Play::find($id);
        Play::destroy($id);

        return redirect()
            ->action('BackendController@ShowPlay')
            ->with('status', 'Voorstelling "' . $play->name . '" successvol verwijderd')
            ->withInput();
    }
    public function ShowPerformance(Request $request)
    {
        if (Play::where('enabled', '=', 'true')->count() == 0)
            return redirect()
                ->action('BackendController@ShowPlay')
                ->with('status', 'Voeg een toneelstuk toe, of selecteer een toneelstuk als ingschakeld.')
                ->withInput();
        $play_active = Play::where('enabled', '=', 'true')->first();
        $performance = Performance::where('play_id', '=', $play_active->id)->get();

        foreach ($performance as $performance_item) {
            $performance_item->hour = Carbon::createFromFormat('H:i:s',$performance_item->hour)->format('H.i \u\u\r');
        }
            \Debugbar::info($performance);
        return view('backend.CRUD.listPerformance', [
            'request' => $request,
            'play_active' => $play_active,
            'performance' => $performance]);
    }
    public function ShowPerformanceAdd()
    {
        $play_active = Play::where('enabled', '=', 'true')->first();
        return view('backend.CRUD.addPerformance', [
            'play_active' => $play_active]);
    }
    public function RequestPerformanceAdd(Request $request){
        $play_active = Play::where('enabled', '=', 'true')->first();
        \Debugbar::info(Carbon::createFromFormat('d-m-Y',$request->input('datePerformance'))->format('Y-m-d'));
        $error_messages = [
            'datePerformance.required' => 'Datum opgeven AUB',
            'hourPerformance.required' => 'Uur opgeven AUB',
            'seatingType.required' => 'Reservatieplan opgeven AUB',
            'page_content.required' => 'Geen beschrijving opgegeven, gelive extra info op te geven',
        ];
        $validator = Validator::make($request->all(), [
            'datePerformance' => 'required',
            'hourPerformance' => 'required',
            'seatingType' => 'required',
            'page_content' => 'required',
        ], $error_messages);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        //Else if no errors, create new
        $performance = new Performance();
        $performance->play_id = $play_active->id;
        $performance->date = Carbon::createFromFormat('d-m-Y',$request->input('datePerformance'))->format('Y-m-d');
        $performance->hour = Carbon::createFromFormat('H:i',$request->input('hourPerformance'))->format('H:i:s');
        $performance->seatingType = $request->input('seatingType');
        $performance->page_content = $request->input('page_content');
        if (!($request->input('performanceEnabled') == null))
        {
            $performance->enabled = "true";
        }

        $performance->save();
        return redirect()
            ->action('BackendController@ShowPerformance')
            ->with('status', 'Voorstelling "' . $performance->date . " " . $performance->hour . '" successvol toegevoed')
            ->withInput();
    }
    public function ShowPerformanceEdit($id)
    {
        $performande_active = Performance::find($id);
        $performande_active->date = Carbon::createFromFormat('Y-m-d',$performande_active->date)->format('d-m-Y');
        $performande_active->hour = Carbon::createFromFormat('H:i:s',$performande_active->hour)->format('H:i');
        return view('backend.CRUD.editPerformace', [
            'id' => $id,
            'performande_active' => $performande_active]);
    }
    public function RequestPerformanceEdit(Request $request, $id)
    {
        $error_messages = [
            'datePerformance.required' => 'Datum opgeven AUB',
            'hourPerformance.required' => 'Uur opgeven AUB',
            'seatingType.required' => 'Reservatieplan opgeven AUB',
            'page_content.required' => 'Geen beschrijving opgegeven, gelive extra info op te geven',
        ];
        $validator = Validator::make($request->all(), [
            'datePerformance' => 'required',
            'hourPerformance' => 'required',
            'seatingType' => 'required',
            'page_content' => 'required',
        ], $error_messages);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        //Else if no errors, create new
        $performance = Performance::find($id);
        $performance->date = Carbon::createFromFormat('d-m-Y',$request->input('datePerformance'))->format('Y-m-d');
        $performance->hour = Carbon::createFromFormat('H:i',$request->input('hourPerformance'))->format('H:i:s');
        $performance->seatingType = $request->input('seatingType');
        $performance->page_content = $request->input('page_content');
        if (!($request->input('performanceEnabled') == null))
        {
            $performance->enabled = "true";
        }

        $performance->save();
        return redirect()
            ->action('BackendController@ShowPerformance')
            ->with('status', 'Voorstelling "' . $performance->date . " " . $performance->hour . '" successvol bijgewerkt')
            ->withInput();
    }
    public function ShowPerformanceDelete($id)
    {
        $performance = Performance::find($id);
        return view('backend.CRUD.deletePerformance', [
            'performance' => $performance]);
    }
    public function RequestPerformanceDelete($id, Request $request)
    {
        $error_messages = [
            'confirmDelete.required' => 'U moet de checkbox aanvinken om verwijdering te bevestigen.',
        ];
        $validator = Validator::make($request->all(), [
            'confirmDelete' => 'required',
        ], $error_messages);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        //Else if no errors, update entry
        $performance = Performance::find($id);
        Performance::destroy($id);

        return redirect()
            ->action('BackendController@ShowPerformance')
            ->with('status', 'Voorstelling "' . $performance->date . " " . $performance->hour . '" successvol verwijderd')
            ->withInput();
    }
    public function ShowPage()
    {
        $page = Page::get();
        return view('backend.CRUD.listPage', [
            'page' => $page]);
    }
    public function ShowPageEdit($id)
    {
        $page = Page::find($id);
        return view('backend.CRUD.editPage', [
            'page' => $page]);
    }
    public function RequestPageEdit(Request $request, $id)
    {

        $error_messages = [
            'page_content.required' => 'Geen inhoud gevonden',
        ];
        $validator = Validator::make($request->all(), [
            'page_content' => 'required',
        ], $error_messages);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        //Else if no errors, create new
        $page = Page::find($id);
        $page->content = $request->input('page_content');

        $page->save();
        return redirect()
            ->action('BackendController@ShowPage')
            ->with('status', 'Pagina  "' . $page->name . '" successvol bijgewerkt')
            ->withInput();
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
        $log = SentMail::get();
        return view('backend.CRUD.listLog', [
            'log' => $log]);
    }
    public function ShowLogItem($id)
    {
        $log = SentMail::find($id);
        return view('backend.CRUD.listLogItem', [
            'log' => $log]);
    }


}
