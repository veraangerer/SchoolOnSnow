@extends('layouts.master')
@section('content')
    @include('layouts.adminMenu')
    @yield('table')
    @yield('crud')
    @yield('inclusion')
@stop
