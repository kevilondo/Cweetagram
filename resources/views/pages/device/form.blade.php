@extends('layouts.main')

@section('title')
    {{ config('app.name', 'Laravel') }} | Create a device
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create a device</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('device.index')}}">Devices</a></li>
                        <li class="breadcrumb-item active">Create device</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        @include('partials.messages')

        <div class="container-fluid">
            <div class="container card card-primary card-outline">

                <form action="{{ route('device.store') }}" method="POST">
                    @csrf
                    <div class="form-group col-md-8">
                        <label for="serial_number">Serial number</label>
                        <input type="text" name="serial_number" class="form-control @error('serial_number') is-invalid @enderror" value='{{old('serial_number')}}'>

                        @if ($errors->has('serial_number'))
                            <span class="text-danger">{{$errors->first('serial_number')}}</span>
                        @endif
                    </div>

                    <div class="form-group col-md-8">
                        <label for="password">Password</label>
                        <input type="text" name="password" class="form-control @error('password') is-invalid @enderror" value='{{old('password')}}'>

                        @if ($errors->has('password'))
                            <span class="text-danger">{{$errors->first('password')}}</span>
                        @endif
                    </div>

                    <div class="form-group col-md-8">
                        <label for="cell_number">Cell number</label>
                        <input type="text" name="cell_number" class="form-control @error('cell_number') is-invalid @enderror" value="{{old('cell_number')}}">

                        @if ($errors->has('cell_number'))
                            <span class="text-danger">{{$errors->first('cell_number')}}</span>
                        @endif
                    </div>

                    <div class="form-group col-md-8">
                        <label for="vehicle">Vehicle</label>
                        <select name="vehicle" id="vehicle" class="form-control @error('vehicle') is-invalid @enderror">
                            <option value="">Select the vehicle</option>
                            @foreach ($vehicles as $vehicle)
                                <option value="{{$vehicle->id}}">{{$vehicle->display_name}}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('vehicle'))
                            <span class="text-danger">{{$errors->first('vehicle')}}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i>
                            Save
                        </button>
                    </div>                    
                </form>
                  
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection