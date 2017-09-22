@extends('layout.app')

@section('title', 'Tasks')

@section('h1title',"Tasks")
@section('pageData')
	@include('tasks.'.$page)
@endsection

@section('scripts')
<script type="text/javascript" src="{!! asset('app/controller/taskController.js') !!}"></script>
@endsection