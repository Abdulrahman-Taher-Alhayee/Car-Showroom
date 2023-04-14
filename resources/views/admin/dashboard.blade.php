@extends('layouts.admin')

@section('title')
الرئيسية
@endsection

@section('contentHeader')
الرئيسية
@endsection

@section('contentHeaderLink')
<a href="{{ route('admin.dashboard') }}">الرئيسية</a>
@endsection

@section('contentHeaderActive')
عرض
@endsection

@section('content')
<div class="row" style="background-image: url({{ asset('assest/admin/imgs/1678974775735.jpg') }});background-size:cover ; background-repeate:ni-repeate;min-height:600px">

</div>
@endsection
