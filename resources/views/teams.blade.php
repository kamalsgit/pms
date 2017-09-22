@extends('layout.app')

@section('title', 'Teams')

@section('h1title',"Teams")

@section('pageData')
	@include('teams.'.$page)
@endsection

@section('scripts')
<script type="text/javascript" src="{!! asset('app/controller/teamController.js') !!}"></script>
@endsection