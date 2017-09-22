@extends('layout.app')

@section('title', 'Permissions')

@section('h1title',"Permissions")
@section('pageData')
	@include('permission.'.$page)
@endsection
@section('scripts')
<script type="text/javascript" src="{!! asset('app/controller/permissionController.js') !!}"></script>

@endsection