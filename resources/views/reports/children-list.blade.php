
@extends('layouts.report')
@section('content')
<div id="report-title"><h1></h1></div>
<table class="table table-sm table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Date Of Birth</th>
            <th>Address</th>
            <th>Gender</th>
            <th>Image</th>
        </tr>
    </thead>
    <tbody>
        @foreach($records as $record)
        <tr>
            <td>{{ $record->id }}</td>
            <td>{{ $record->name }}</td>
            <td>{{ $record->date_of_birth }}</td>
            <td>{{ $record->address }}</td>
            <td>{{ $record->gender }}</td>
            <td>{{ $record->image }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
