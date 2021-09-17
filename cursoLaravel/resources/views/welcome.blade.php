@extends('layouts.main')

@section('title', 'GENESIS EVENTS')

@section('content')

    <div id="search-container" class="col-md-12">
        <h1>Busque um evento</h1>
        <form action="">
            <input type = "text" id = "search" name="search" class="form-control" placeholser="Procurar...">
        </form>
    </div>
    <div id="events-container" class="col-md-12">
        <h2>Próximos Eventos</h2>
        <p>Veja os eventos dos próximos dias</p>
        <div id="cards-container" class="row">
            @foreach($events as $event)
                <div class="card col-md3">
                    <img src="img/baile.jpg" alt="{{ $event -> title}}">
                    <div class="card-body">
                        <p class="card-date">10/05/1997</p>
                        <h5 class="card-title">{{ $event -> title}}</h5>
                        <p class="card-participants">X Participantes</p>
                        <a href="#" class="bt btn-primary"> Saber Mais</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

 
@endsection