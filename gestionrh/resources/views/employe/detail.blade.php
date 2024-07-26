@extends('layouts.website')
@section('content')

{{-- <link href="https://fonts.googleapis.com/css?family=Mukta:300,400,500,600,700&display=swap" rel="stylesheet"> --}}
<link rel="stylesheet" href="{{asset('admin/css/resumecv.css')}}">

<div class="container-fluid">
    <div class="content-wrapper">
        <aside>
            <div class="profile-img-wrapper">
                @if($employe->photo)
                <img src="{{asset('storage/'.$employe->photo->photo_employe)}}" alt="profile">
                @endif
            </div>
           <div style="margin-left: 70px;">
            <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#exampleModal" wire:click.prevent="editer_photo({{$employe->id}})">Modif</button>
            {{-- <a href="{{route('employe.delete_photo',$employe->id)}}" data-bs-toggle="modal" data-bs-target="#exampleModal">Modifier</a> --}}
           </div>
            <h1 class="profile-name">{{$employe->prenom}} {{$employe->nom}}</h1>
            <div class="text-center">
                <span class="badge badge-white badge-pill profile-designation">{{$employe->poste->poste}}</span>
            </div>
            {{-- <nav class="social-links">
                <a href="#!" class="social-link"><i class="fab fa-facebook-f"></i></a>
                <a href="#!" class="social-link"><i class="fab fa-twitter"></i></a>
                <a href="#!" class="social-link"><i class="fab fa-behance"></i></a>
                <a href="#!" class="social-link"><i class="fab fa-dribbble"></i></a>
                <a href="#!" class="social-link"><i class="fab fa-github"></i></a>
            </nav> --}}
            <div class="widget">
                <h5 class="widget-title">Infos Personnel</h5>
                <div class="widget-content">
                    <p>Né(e) le : <strong>{{$employe->date_naissance}}</strong></p>
                    <p>Né(e) à : <strong>{{$employe->lieu_naissance}}</strong></p>
                    <p>Sexe : <strong>{{$employe->genre->name}}</strong></p>
                    <p>Telephone : <strong>+1 123 000 4444</strong></p>
                    <p>Email: <strong>{{$employe->email}}</strong></p>
                    <button class="btn btn-download-cv btn-success rounded-pill">
                        <a style="color:white;" href="{{asset('storage/'.$employe->photocv->image_cv)}}" target="_blank" alt="dounload">Voir le CV</a>
                    </button>
                </div>
            </div>
            <div class="widget card">
                <div class="card-body">
                    <div class="widget-content">
                        <h5 class="widget-title card-title">Situation Matrimoniale</h5>
                        <p>Matrimonial : <strong>{{$employe->matrimonial->situation_matrimoniale}}</strong></p>
                        <p>Nbr d'enfant : <strong>{{$employe->nbr_enfant}}</strong></p>
                        <p>Age : <strong>{{$employe->age}}</strong> ans</p>
                    </div>
                </div>
            </div>
            <div class="widget card">
                <div class="card-body">
                    <div class="widget-content">
                        <h5 style="color:black;" class="widget-title card-title">Autres Documents</h5>
                        <p><a style="color:blue" href="{{asset('storage/'.$employe->photocontrat->image_contrat)}}">Voir le contrat </a></p>
                        {{-- <p><a style="color:blue" href="{{asset('storage/'.$employe->photodiplome->image_diplome) ?? ''}}">Voir le diplome</a></p>
                        <p><a style="color:blue" href="{{asset('storage/'.$employe->photoextrait->image_extrait)}}">Voir les extraits</a></p> --}}

                    </div>
                </div>
            </div>
        </aside>
        <main>
            <section>
                <div class="widget card">
                    <div class="card-body">
                        <div style="display: flex; justify-content-between;">
                            <h5 style="color:black;" class="widget-title card-title">Modification Supplementaire</h5>
                           <div>Photo de profil</div>
                           <div>Dernier diplome</div>
                           <div>Dernier contrat</div>
                           <div>Extrait des enfants</div>

                        </div>
                    </div>
                </div>
            </section>
            <section class="intro-section">
                <h2 class="badge badge-primary section-title">{{$employe->poste->poste}}</h2>
                {{-- <p>I'm Creative Director and UI/UX Designer from Sydney, Australia, working in web development and print
                    media. I enjoy turning complex problems into simple, beautiful and intuitive designs. My job is to
                    build your website so that it is functional and user-friendly but at the same time attractive.
                    Moreover, I add personal touch to your product and make sure that is eye-catching and easy to use.
                    My aim is to bring across your message and identity in the most creative way. I created web design
                    for many famous brand companies.</p>
                <a href="#!" class="btn btn-primary btn-hire-me">HIRE ME</a> --}}
            </section>
            <section class="resume-section">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="section-titlee">CONTRAT & DIPLOME</h4>
                        <ul class="time-line">
                            <li class="time-line-item">
                                <span class="time-line-item-title">Dernier type de contrat</span><br>
                                <h6 style="margin-top: 5px; font-size:16px;" class="section-title">{{$employe->contrat->contrat}}</h6>
                            </li>
                            <li class="time-line-item">
                                <span class="time-line-item-title">Niveau d'etude</span><br>
                                <h6 style="margin-top: 5px; font-size:16px;" class="section-title">{{$employe->niveauetude->niveau_etude ?? ''}}</h6>

                            </li>
                            <li class="time-line-item">
                                <span class=" time-line-item-title">Dernier Diplome Obtenu</span><br>
                                <h6 style="margin-top: 5px; font-size:16px;" class="section-title">{{$employe->diplome->diplome_etude}}</h6>

                            </li>
                            {{-- <li class="time-line-item">
                                <span class=" time-line-item-title">Dernier Diplome Obtenu</span><br>
                                <h6 style="margin-top: 5px; font-size:16px;" class="badge badge-success section-title">{{$employe->diplome->diplome_etude}}</h6>

                            </li> --}}
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <h4 class="section-titlee">Direction & Service</h4>
                        <ul class="time-line">
                            <li class="time-line-item">
                                <span class=" time-line-item-title">Direction</span><br>
                                <h6 style="margin-top: 5px; font-size:16px;" class="section-title">{{$employe->direction->direction}}</h6>

                            </li>
                            <li class="time-line-item">
                                <span class=" time-line-item-title">Service</span><br>
                                <h6 style="margin-top: 5px; font-size:16px;" class="section-title">{{$employe->service->service}}</h6>

                            </li>
                            <li class="time-line-item">
                                <span class=" time-line-item-title">Antenne</span><br>
                                <h6 style="margin-top: 5px; font-size:16px;" class="badge badge-success section-title">{{$employe->antenne->antenne ?? ''}}</h6>

                            </li>

                        </ul>
                    </div>
                </div>
                <section class="clients-section">
                    <h4 class="section-title">DOCUMENTS A TELECHARGER</h4>
                    <div class="client-logos-wrapper">
                        <div style="height: 80;" class="client-logo"><a href="{{asset('storage/'.$employe->photocontrat->image_contrat)}}"><img src="{{asset('icon/contrat.png')}}" title="CONTRAT" alt="contrat" class="w-100"></a>
                        </div>

                        <div style="height: 80;" class="client-logo"><a href="{{asset('storage/'.$employe->photocv->image_cv)}}"><img  style="height: 180px;" src="{{asset('icon/cv.png')}}"title="CV" alt="cv" class="w-100"></a></div>
                        <p><a href="">Modifier</a></p>
                        @if ($employe->photodiplome)
                            <div style="height: 80;" class="client-logo"><a href="{{asset('storage/'.$employe->photodiplome->image_diplome)}}"><img src="{{asset('icon/diplome.png')}}" alt="diplome" title="DIPLOME" class="w-100"></a></div>
                        @endif
                        @if ($employe->photoextrait)
                        <div style="height: 80;" class="client-logo"><a href="{{asset('storage/'.$employe->photoextrait->image_extrait)}}"><img src="{{asset('icon/extrait.png')}}" title="EXTRAIT" alt="extrait" class="w-100"></a></div>
                        @endif
                    </div>
                </section>
            </section>
            <footer>Resume du Profil de <a href="" target="_blank" rel="noopener noreferrer">{{$employe->prenom}} {{$employe->nom}}</a>. ANPEJ - 2024</footer>
        </main>
    </div>
</div>

@endsection


