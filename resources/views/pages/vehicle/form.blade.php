@extends('layouts.main')

@section('title')
    {{ config('app.name', 'Laravel') }} | Create a vehicle
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create a vehicle</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('vehicle.index')}}">Vehicles</a></li>
                        <li class="breadcrumb-item active">Create vehicle</li>
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

                <form action="{{ route('vehicle.store') }}" method="POST">
                    @csrf
                    <div class="form-group col-md-8">
                        <label for="number_plate">Number plate</label>
                        <input type="text" name="number_plate" class="form-control @error('number_plate') is-invalid @enderror" value='{{old('number_plate')}}'>

                        @if ($errors->has('number_plate'))
                            <span class="text-danger">{{$errors->first('number_plate')}}</span>
                        @endif
                    </div>

                    <div class="form-group col-md-8">
                        <label for="make">Make</label>
                        <input type="text" name="make" class="form-control @error('make') is-invalid @enderror" value="{{old('make')}}">

                        @if ($errors->has('make'))
                            <span class="text-danger">{{$errors->first('make')}}</span>
                        @endif
                    </div>

                    <div class="form-group col-md-8">
                        <label for="model">Model</label>
                        <input type="text" name="model" class="form-control @error('model') is-invalid @enderror" value="{{old('model')}}">

                        @if ($errors->has('model'))
                            <span class="text-danger">{{$errors->first('model')}}</span>
                        @endif
                    </div>

                    <div class="form-group col-md-8">
                        <label for="color">Color</label>
                        <input type="text" name="color" class="form-control @error('color') is-invalid @enderror" value="{{old('color')}}">

                        @if ($errors->has('color'))
                            <span class="text-danger">{{$errors->first('color')}}</span>
                        @endif
                    </div>

                    <div class="form-group col-md-8">
                        <label for="client">Owner</label>
                        <select name="client" id="client" class="form-control @error('client') is-invalid @enderror">
                            <option value="">Select the owner</option>
                            @foreach ($clients as $client)
                                <option value="{{$client->id}}">{{$client->full_name}}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('client'))
                            <span class="text-danger">{{$errors->first('client')}}</span>
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