@extends('layout.app')

@section('title', 'Approvels')

@section('h1title',"Approvels")
@section('pageData')
	@include('approvels.'.$page)
@endsection
@section('scripts')
<script type="text/javascript" src="{!! asset('app/controller/approvelController.js') !!}"></script>

@endsection