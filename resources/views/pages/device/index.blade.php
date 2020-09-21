@extends('layouts.main')

@section('title')
    {{ config('app.name', 'Laravel') }} | Manage Devices
@endsection

@section('content')
    
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Devices</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Manage devices</a></li>
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
                                <a href="{{route('device.form')}}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i>
                                    Add new device
                                </a>
                            </div>

                            <div class="card-body">
                                <table id="datatable" class="table table-hover dataTable">
                                    <thead>
                                        <tr>
                                            <th>Serial number</th>
                                            <th>Cell number</th>
                                            <th>Password</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($devices as $device)
                                            <tr>
                                                <td>{{$device->serial_number}}</td>
                                                <td>{{$device->cell_number}}</td>
                                                <td>{{$device->password}}</td>
                                                <td>
                                                    
                                                    <form action="{{route('device.delete', $device->id)}}" method="post">
                                                        @csrf
                                                        @method('delete')

                                                        <a href="{{route('device.edit', $device->id)}}">
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