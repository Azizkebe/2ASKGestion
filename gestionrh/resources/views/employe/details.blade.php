@extends('layouts.website')

@section('content')
<link rel="stylesheet" href="{{asset('admin/css/resumecv.css')}}">

@livewire('detail-employe',['employe'=>$employe])

@endsection

{{-- @section('script')
<script>
    window.addEventListener('close-modal', event =>{
        $('#editModalPhoto').modal('hide')
    })
</script>

@endsection --}}
