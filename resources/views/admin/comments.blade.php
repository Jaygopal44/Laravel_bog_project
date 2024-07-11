@extends('layouts.backend.app')
@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Data Table</strong>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Comments</th>
                        <th>Commented at</th>

                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comment as $a)

                    <tr>
                        {{-- <td><option value="{{$a->user_id}}">{{$a->name}}</option></td> --}}
                        <td>{{ $a->user_id }}</td>
                        <td>{{ $a->message}}</td>
                        <td>{{ $a->created_at }}</td>

                        <td>
                            <button class="btn btn-danger mb-1" data-toggle="modal" data-target="#delete_model-{{ $a->id }}"><i class="fa fa-trash-o"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
