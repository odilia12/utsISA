<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Contract;
use App\User;
use App\Http\Requests\ContractFormRequest;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type=Auth::user()->type;
        $contract=Contract::all();
        return view('contract.index', compact('contract', 'type'));        
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
        return view('contract.create', compact('artist', 'manager', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ContractFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContractFormRequest $request)
    {
        $contract = new Contract;
        $contract->name = $request->name;
        $contract->notes = $request->notes;
        $contract->end_date = $request->end_date;
        $contract->company_name = $request->company_name;
        $contract->manager_id = $request->manager_id;
        $contract->artist_id = $request->artist_id;
        $contract->status = $request->status;

        $contract->save();

        return redirect('contract');
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
        $contract=Contract::find($id);
        return view('contract.show', compact('contract', 'type'));
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
        $contract=Contract::find($id);
        return view('contract.edit', compact('contract', 'type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ContractFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContractFormRequest $request, $id)
    {
        $contract = Contract::find($id);
        $contract->name = $request->name;
        $contract->notes = $request->notes;
        $contract->end_date = $request->end_date;
        $contract->company_name = $request->company_name;
        $contract->manager_id = $request->manager_id;
        $contract->artist_id = $request->artist_id;
        $contract->status = $request->status;

        $contract->save();

        return redirect('contract');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contract = Contract::find($id);
        $contract->delete();

        return redirect('contract');
    }
}
