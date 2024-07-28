@extends('layouts.website')

@section('content')
<link rel="stylesheet" href="{{asset('admin/css/resumecv.css')}}">

@livewire('detail-employe',['employe'=>$employe])
@endsection
