@extends('layout.app')

@section('title', 'Performance')

@section('h1title',"Performance")
@section('pageData')
	@include('Performance.'.$page)
@endsection
@section('scripts')
<script type="text/javascript" src="{!! asset('app/controller/PerformanceController.js') !!}"></script>
@endsection