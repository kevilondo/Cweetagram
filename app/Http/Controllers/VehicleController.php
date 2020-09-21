<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Vehicle;
use App\Models\Device;
use App\Http\Requests\VehicleRequest;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();

        return view('pages.vehicle.index', compact('vehicles'));
    }

    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $clients = Client::all();

        return view('pages.vehicle.edit', compact('clients', 'vehicle'));
    }

    public function form()
    {
        $clients = Client::all();
        
        return view('pages.vehicle.form', compact('clients'));
    }

    public function store(VehicleRequest $request)
    {
        $vehicle = Vehicle::create([
            'number_plate' => $request->number_plate,
            'make' => $request->make,
            'model' => $request->model,
            'color' => $request->color,
            'client_id' => $request->client
        ]);

        return redirect()->back()->with('success', 'A vehicle has been added');
    }

    public function update(VehicleRequest $request, $id)
    {
        $vehicle = Vehicle::findOrFail($id);

        $vehicle->update([
            'number_plate' => $request->number_plate,
            'make' => $request->make,
            'model' => $request->model,
            'color' => $request->color,
            'client_id' => $request->client
        ]);

        return redirect()->back()->with('success', 'The vehicle has been updated');
    }

    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);

        $device = Device::Where('vehicle_id', $id)->first();

        $device->update(['vehicle_id' => null]);

        $vehicle->delete();

        return redirect()->back()->with('success', 'A vehicle has been deleted');
    }
}
