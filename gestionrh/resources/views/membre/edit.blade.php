@extends('layouts.website')

@section('content')

@livewire('edit-membre',['membres'=>$membres])

@endsection
