@extends('layouts.website')

@section('content')

@livewire('edit-accepte-permission', ['demande_resp'=> $demande_resp])

@endsection
