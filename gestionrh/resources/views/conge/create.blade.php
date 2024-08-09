@extends('layouts.website')

@section('content')

<div>
    <div style="margin: auto;" class="card">
        <div class="card-header bg-primary">
            <div class="card-title text-white">Parametre des conges</div>
            <div style="display: flex; justify-content:end;">
                <a href="{{route('conge.liste')}}" class="btn btn-success btn-md"> Liste des types define</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('conge.store')}}" method="POST">
                @csrf
                @method('POST')

                <div class="mt-3 form-group">
                    <label for="type_de_conge">Type de Congé</label>
                    <input type="text" class="form-control" name="type_de_conge" id="type_de_conge" wire:model.live="type_de_conge">
                    <div>
                        @error('type_de_conge')
                        <div class="error">Precisez le type de conge</div>
                        @enderror
                    </div>
                </div>
                <div class="mt-3 form-group">
                    <label for="">Nombre de jour attribué</label>
                    <input type="number" id="nombre_de_jour_reserve" name="nombre_de_jour_reserve" value="0" min="0" class="form-control">
                    <div>
                        @error('nombre_de_jour_reserve')
                            <span class="error">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div style="display: flex; justify-content:center" class="mb-3 mt-3">
                    <button type="submit" class="btn btn-primary"> Autoriser la permission</button>
                </div>

            </form>
    </div>
</div>

@endsection
