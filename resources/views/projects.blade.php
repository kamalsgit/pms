@extends('layout.app')

@section('title', 'Projects')

@section('h1title',"Projects")
@section('pageData')
	@include('project.'.$page)
@endsection
@section('scripts')
<script type="text/javascript" src="{!! asset('app/controller/projectController.js') !!}"></script>

@endsection