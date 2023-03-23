
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
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
