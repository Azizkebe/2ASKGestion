@extends('layouts.website')

@section('content')
@livewire('edit-fiche-contrat',['fichecontrat' => $fichecontrat])
@endsection
