
@extends('layouts.report')
@section('content')
<div id="report-title"><h1></h1></div>
<table class="table table-sm table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Diagnosis</th>
            <th>Solution</th>
            <th>Cost</th>
            <th>Children Id</th>
            <th>Children Name</th>
            <th>Children Date Of Birth</th>
            <th>Children Address</th>
            <th>Children Gender</th>
            <th>Children Image</th>
        </tr>
    </thead>
    <tbody>
        @foreach($records as $record)
        <tr>
            <td>{{ $record->id }}</td>
            <td>{{ $record->diagnosis }}</td>
            <td>{{ $record->solution }}</td>
            <td>{{ $record->cost }}</td>
            <td>{{ $record->children_id }}</td>
            <td>{{ $record->children_name }}</td>
            <td>{{ $record->children_date_of_birth }}</td>
            <td>{{ $record->children_address }}</td>
            <td>{{ $record->children_gender }}</td>
            <td>{{ $record->children_image }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
