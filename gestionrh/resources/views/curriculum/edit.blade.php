@extends('layouts.website')

@section('content')

@livewire('edit-curriculum',['curricula'=>$curricula])

@endsection

