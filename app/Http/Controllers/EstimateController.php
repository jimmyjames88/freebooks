<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstimateController extends Controller
{

    public function index()
    {
        $estimates = \App\Estimate::with(['client'])->get();
        return view('estimates.index', compact('estimates'));
    }

    public function show($id)
    {
        $estimate = \App\Estimate::find($id);
        $clients = \App\Client::all();
        return view('estimates.show', compact('estimate', 'clients'));
    }

    public function create()
    {
        $clients = \App\Client::all();
        return view('estimates.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'issue_date'    =>  'required',
            'client_id'     =>  'required',
        ]);

        $data = $request->all();
        $data['line_items'] = json_encode($request->line_items);

        $estimate = \App\Estimate::create($data);

        if($estimate) {
            return redirect('/estimates/' . $estimate->id)
                    ->with('success', 'Estimate created');
        }

        return back()->with('error', 'Estimate not created');
    }

    public function edit($id)
    {
        $estimate = \App\Estimate::find($id);
        $clients = \App\Client::all();
        return view('estimates.edit', compact('estimate', 'clients'));
    }

    public function update(Request $request, $id)
    {



        $request->validate([
            'issue_date'    =>  'required',
            'client_id'     =>  'required',
        ]);

        $data = $request->except(['_token', '_method', 'line_items']);

        // scrub empty line item rows
        foreach($request->line_items as $item) {
            if($item['description'] && $item['rate'] && $item['quantity']) {
                $data['line_items'][] = $item;
            }
        }

        $data['line_items'] = json_encode($data['line_items']);

        //dd($data);

        $estimate = \App\Estimate::where('id', $id)
                        ->update($data);

        if($estimate)
            return redirect('/estimates/' . $id)->with('success', 'Changes saved');

        return back()->with('error', 'Changes not saved');
    }
}
