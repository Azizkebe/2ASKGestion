@extends('layouts.website')

@section('content')

@livewire('edit-demande-antenne',['demandeantenne'=> $demandeantenne])

@endsection
