<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Http\Requests\ClientRequest;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();

        return view('pages.client.index', compact('clients'));
    }

    public function form()
    {
        return view('pages.client.form');
    }

    public function store(ClientRequest $request)
    {
        $client = Client::create($request->all());

        return redirect()->back()->with('success', 'The client has been saved');
    }

    public function edit($id)
    {
        $client = Client::findOrFail($id);

        return view('pages.client.edit', compact('client'));
    }

    public function update(ClientRequest $request, $id)
    {
        $client = Client::findOrFail($id);

        $client->update($request->all());

        return redirect()->back()->with('success', 'The client has been updated');
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);

        $client->delete();

        return redirect()->back()->with('success', 'A client has been deleted');
    }
}
