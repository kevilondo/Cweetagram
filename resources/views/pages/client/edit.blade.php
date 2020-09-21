@extends('layouts.main')

@section('title')
    {{ config('app.name', 'Laravel') }} | Create a client
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create a client</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create client</li>
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

                <form action="{{ route('client.update', $client->id) }}" method="POST">
                    @csrf
                    <div class="form-group col-md-8">
                        <label for="id_number">ID Number</label>
                        <input type="text" name="id_number" class="form-control @error('id_number') is-invalid @enderror" value='{{isset($client->id_number) ? $client->id_number : old('id_number')}}'>

                        @if ($errors->has('id_number'))
                            <span class="text-danger">{{$errors->first('id_number')}}</span>
                        @endif
                    </div>

                    <div class="form-group col-md-8">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{isset($client->first_name) ? $client->first_name : old('first_name')}}">

                        @if ($errors->has('first_name'))
                            <span class="text-danger">{{$errors->first('first_name')}}</span>
                        @endif
                    </div>

                    <div class="form-group col-md-8">
                        <label for="surname">Surname</label>
                        <input type="text" name="surname" class="form-control @error('surname') is-invalid @enderror" value="{{isset($client->surname) ? $client->surname : old('surname')}}">

                        @if ($errors->has('surname'))
                            <span class="text-danger">{{$errors->first('surname')}}</span>
                        @endif
                    </div>

                    <div class="form-group col-md-8">
                        <label for="nickname">Nickname</label>
                        <input type="text" name="nickname" class="form-control @error('nickname') is-invalid @enderror" value="{{isset($client->nickname) ? $client->nickname : old('nickname')}}">

                        @if ($errors->has('nickname'))
                            <span class="text-danger">{{$errors->first('nickname')}}</span>
                        @endif
                    </div>

                    <div class="form-group col-md-8">
                        <label for="date">Date</label>
                        <div class="input-group">
                            <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" value="{{isset($client->date) ? $client->date : old('date')}}">
                        </div>

                        @if ($errors->has('date'))
                            <span class="text-danger">{{$errors->first('date')}}</span>
                        @endif
                                                
                    </div>

                    <div class="form-group col-md-8">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{isset($client->email) ? $client->email : old('email')}}">

                        @if ($errors->has('email'))
                            <span class="text-danger">{{$errors->first('email')}}</span>
                        @endif
                    </div>

                    <div class="form-group col-md-8">
                        <label for="cellphone">Cell Number</label>
                        <input type="phone" name="cellphone" class="form-control @error('cellphone') is-invalid @enderror" value="{{isset($client->cellphone) ? $client->cellphone : old('cellphone')}}">

                        @if ($errors->has('cellphone'))
                            <span class="text-danger">{{$errors->first('cellphone')}}</span>
                        @endif
                    </div>

                    <div class="form-group col-md-8">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{isset($client->address) ? $client->address : old('address')}}">

                        @if ($errors->has('address'))
                            <span class="text-danger">{{$errors->first('address')}}</span>
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