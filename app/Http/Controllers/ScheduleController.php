<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Schedule;
use App\Http\Requests\ScheduleFormRequest;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type=Auth::user()->type;
        $schedule = Schedule::all();
        return view('schedule.index', compact('schedule', 'type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type=Auth::user()->type;
        $artist = User::where('type', "artist")->get();
        $manager = User::where('type', "manager")->orWhere('type', "admin")->get();
        return view('schedule.create', compact('artist', 'manager', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ScheduleFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ScheduleFormRequest $request)
    {
        $schedule = new Schedule;
        $schedule->name = $request->name; 
        $schedule->note = $request->note;
        $schedule->time = $request->time;
        $schedule->manager_id = $request->manager_id; 
        $schedule->artist_id = $request->artist_id;

        $schedule->save();
        return redirect('schedule');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type=Auth::user()->type;
        $schedule = Schedule::find($id);
        return view('schedule.show', compact('schedule', 'type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type=Auth::user()->type;
        $schedule = Schedule::find($id);
        return view('schedule.edit', compact('schedule', 'type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ScheduleFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ScheduleFormRequest $request, $id)
    {
        $schedule = Schedule::find($id);
        $schedule->name = $request->name; 
        $schedule->note = $request->note;
        $schedule->time = $request->time;
        $schedule->manager_id = $request->manager_id; 
        $schedule->artist_id = $request->artist_id;

        $schedule->save();
        return redirect('schedule');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schedule = Schedule::find($id);
        $schedule->delete();

        return redirect('schedule');
        // echo ($schedule);
    }
}
