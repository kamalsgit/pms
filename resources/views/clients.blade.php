@extends('layout.app')

@section('title', 'Clients')

@section('h1title',"Clients")
@section('pageData')
	@include('client.'.$page)
@endsection
@section('scripts')
<script type="text/javascript" src="{!! asset('app/controller/clientController.js') !!}"></script>

@endsection