@extends('layout.app')

@section('title', 'Punching')

@section('h1title',"Punching")
@section('pageData')
	@include('punching.'.$page)
@endsection
@section('scripts')
<script type="text/javascript" src="{!! asset('app/controller/PunchingController.js') !!}"></script>

@endsection