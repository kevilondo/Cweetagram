<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Device;
use App\Http\Requests\DeviceRequest;

class DeviceController extends Controller
{
    public function index()
    {
        $devices = Device::all();

        return view('pages.device.index', compact('devices'));
    }

    public function form()
    {
        $vehicles = Vehicle::doesntHave('device')->get();

        return view('pages.device.form', compact('vehicles'));
    }

    public function store(DeviceRequest $request)
    {
        $device = Device::create([
            'serial_number' => $request->serial_number,
            'cell_number' => $request->cell_number,
            'vehicle_id' => $request->vehicle
        ]);

        return redirect()->back()->with('success', 'A device has been added');
    }

    public function edit($id)
    {
        $device = Device::findOrFail($id);

        $vehicles = Vehicle::doesntHave('device')->get();

        return view('pages.device.edit', compact('device', 'vehicles'));
    }

    public function update(DeviceRequest $request, $id)
    {
        $device = Device::findOrFail($id);

        $device->update([
            'serial_number' => $request->serial_number,
            'password' => $request->password,
            'cell_number' => $request->cell_number,
            'vehicle_id' => $request->vehicle
        ]);

        return redirect()->back()->with('success', 'The device has been updated');
    }

    public function destroy($id)
    {
        $device = Device::findOrFail($id);

        $device->delete();

        return redirect()->back()->with('success', 'A device has been deleted');
    }
}
