@extends('layout.app')

@section('title', 'Employees')

@section('h1title',"Employees")

@section('pageData')
	@include('employee.'.$page)
@endsection

@section('scripts')
<script type="text/javascript" src="{!! asset('app/controller/employeeController.js') !!}"></script>
@endsection