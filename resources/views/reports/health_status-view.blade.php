
@extends('layouts.report')
@section('content')
<div id="report-title"><h1></h1></div>
<table class="table table-sm table-striped">
    <tbody>
        <tr>
            <th>Id</th>
            <td>{{ $record->id }}</td>
        </tr>
        <tr>
            <th>Diagnosis</th>
            <td>{{ $record->diagnosis }}</td>
        </tr>
        <tr>
            <th>Solution</th>
            <td>{{ $record->solution }}</td>
        </tr>
        <tr>
            <th>Cost</th>
            <td>{{ $record->cost }}</td>
        </tr>
        <tr>
            <th>Children Id</th>
            <td>{{ $record->children_id }}</td>
        </tr>
        <tr>
            <th>Children Name</th>
            <td>{{ $record->children_name }}</td>
        </tr>
        <tr>
            <th>Children Date Of Birth</th>
            <td>{{ $record->children_date_of_birth }}</td>
        </tr>
        <tr>
            <th>Children Address</th>
            <td>{{ $record->children_address }}</td>
        </tr>
        <tr>
            <th>Children Gender</th>
            <td>{{ $record->children_gender }}</td>
        </tr>
        <tr>
            <th>Children Image</th>
            <td>{{ $record->children_image }}</td>
        </tr>
    </tbody>
</table>
@endsection
