@extends('layouts.website')

@section('content')

@livewire('edit-demande-conge',['demande_conge'=> $demande_conge])

@endsection
