@extends('layouts.main')

@section('title')
    {{ config('app.name', 'Laravel') }} | Manage Clients
@endsection

@section('content')
    
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Clients</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Manage clients</a></li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">

            @include('partials.messages')

            <div class="container-fluid">
               
                <div class="row">
                
                    <section class="col-lg-12 connectedSortable">
                        <div class="card card-default container">
                            <div class="card-header">
                                <a href="{{route('client.form')}}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i>
                                    Add new client
                                </a>
                            </div>

                            <div class="card-body">
                                <table id="datatable" class="table table-hover dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID Number</th>
                                            <th>First name</th>
                                            <th>Surname</th>
                                            <th>Nickname</th>
                                            <th>Date of birth</th>
                                            <th>E-mail</th>
                                            <th>Cellphone</th>
                                            <th>Address</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($clients as $client)
                                            <tr>
                                                <td>{{$client->id_number}}</td>
                                                <td>{{$client->first_name}}</td>
                                                <td>{{$client->surname}}</td>
                                                <td>{{$client->nickname}}</td>
                                                <td>{{$client->date}}</td>
                                                <td>{{$client->email}}</td>
                                                <td>{{$client->cellphone}}</td>
                                                <td>{{$client->address}}</td>
                                                <td>
                                                    
                                                    <form action="{{route('client.delete', $client->id)}}" method="post">
                                                        @csrf
                                                        @method('delete')

                                                        <a href="{{route('client.edit', $client->id)}}">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <button type="submit" onclick="return confirm('Are you sure?')">
                                                            <i class="fas fa-trash" style="color: red"></i>
                                                        </button>
                                                    </form>
                                                    
                                                    
                                                </td>
                                            </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                            

                    </section>
                
                </div>
                
            </div>
        </section>
        <!-- /.content -->
    </div>

@endsection