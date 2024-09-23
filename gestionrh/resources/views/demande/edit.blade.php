@extends('layouts.website')

@section('content')

@livewire('edit-permission-demande',['demandepermission'=> $demandepermission])

@endsection
