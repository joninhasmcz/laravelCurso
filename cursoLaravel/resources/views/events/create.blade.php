@extends('layouts.main')

@section('title', 'Criar Evento')

@section('content')

    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Crie o seu Evento</h1>
        <form action="/event" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="image">Imagem do Evento:</label>
                <input type="file" id="image" name="image" class="form-control-file">
            </div>
            <div class="form-group">
                <label for="title">Evento:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento">
            </div>
            <div class="form-group">
                <label for="title">Data do Evento:</label>
                <input type="date" class="form-control" id="date" name="date">
            </div>
            <div class="form-group">
                <label for="title">Lugar:</label>
                <input type="text" class="form-control" id="place" name="place" placeholder="Local do Evento">
            </div>
            <div class="form-group">
                <label for="title">O evento é privado?</label>
                <select name="private" id="private" class="form-control">
                    <option value="0">Não</option>
                    <option value="1">Sim</option>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Descrição:</label>
                <textarea name="description" id="description" class="form-control" placeholder="O que vai acontecer no evento?"></textarea> 
            </div>
            <div class="form-group">
                <label for="title">Adicione as especificações do Evento:</label>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Segurancas"> Seguranças
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Servicos Gerais"> Serviços Gerais
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Carregadores"> Carregadores
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value=" Bombeiros Civis"> Bombeiros Civis
                </div>
                
            </div>
            <input type="submit" value="Criar Evento" class="btn btm-primary">
        </form>
    </div>



@endsection