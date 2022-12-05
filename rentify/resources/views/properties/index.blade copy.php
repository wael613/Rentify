@extends('layouts.app-master')

@section('content')
    
    <h1 class="mb-3">You can manage properties here</h1>

    <div class="bg-light p-4 rounded">
        <h2>Properties</h2>
        <div class="lead">
            Manage your properties here.
            <a href="{{ route('properties.create') }}" class="btn btn-primary btn-sm float-right">Add property</a>
        </div>
        
        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>

        <table class="table table-bordered">
          <tr>
             <th width="1%">No</th>
             <th>Name</th>
             <th width="3%" colspan="3">Action</th>
          </tr>
            @foreach ($properties as $key => $property)
            @role('admin')
            <tr>
                <td>{{ $property->id }}</td>
                <td>{{ $property->name }}</td>
                <td>
                    <a class="btn btn-info btn-sm" href="{{ route('properties.show', $property->id) }}">Show</a>
                </td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('properties.edit', $property->id) }}">Edit</a>
                </td>
                <td>
                    {!! Form::open(['method' => 'DELETE','route' => ['properties.destroy', $property->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endrole
            @if($property->user_id == auth()->id())
            <tr>
                <td>{{ $property->id }}</td>
                <td>{{ $property->name }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('properties.show', $property->id) }}">Show</a>
                </td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('properties.edit', $property->id) }}">Edit</a>
                </td>
                <td>
                    {!! Form::open(['method' => 'DELETE','route' => ['properties.destroy', $property->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endif
            @endforeach
        </table>

        <div class="d-flex">
            {!! $properties->links() !!}
        </div>

    </div>
@endsection