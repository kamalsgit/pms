@extends('layout.app')

@section('title', 'Update Profile')

@section('h1title',"My Profile")

@section('pageData')
    @include('profile.editProfile')
@endsection

@section('scripts')
    <script type="text/javascript" src="{!! asset('app/controller/profileController.js') !!}"></script>
@endsection