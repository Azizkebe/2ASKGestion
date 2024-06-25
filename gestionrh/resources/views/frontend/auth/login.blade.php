@extends('frontend.frontend')

@section('content')


<input type="checkbox" id="chk" aria-hidden="true">
<div class="signup">
    <div>
            @if (session('success'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert"
                aria-hidden="true"></button>
                {{session('success')}}
            </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert"
            aria-hidden="true"></button>
            {{session('error')}}
        </div>
        @endif

    </div>
    <form action="{{route('handlogin')}}" method="POST">
        @csrf
        @method('POST')

        <label for="chk" aria-hidden="true">Ges-RH</label>
        <input type="email" name="email" placeholder="Email" required="">
        <div>
            @error('email')
                <span style="text-align: center; padding-left:10px;" class="error">{{$message}}</span>
            @enderror
        </div>
        <input type="password" name="password" placeholder="Mot de Passe" required="">
        <div>
            @error('password')
                <span style="text-align: center; padding-left:10px;" class="error">{{$message}}</span>
            @enderror
        </div>
        <button type="submit">Se connecter</button>
    </form>
    <div>
        <p style="text-align: center; color:white;" class="text-center">Mot de passe Oublier
            <a style="background-color: red;" href="#">Ici</a>
        </p>
    </div>
</div>
@endsection

