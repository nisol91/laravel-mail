@extends('layouts.app')
@section('title')
 Admission form
@endsection
@section('content')
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if (!empty($message))
        <div class="alert alert-success">
            {{ $message }}
        </div>
        @endif
        <div class="row">
            <div class="col-12">
                <h1>Sei ad un passo dalla tua nuova professione</h1>
                <p>Per assicurare la buona riuscita del corso, ogni candidato deve sostenere
                        un breve percorso di selezione. Le due caratteristiche fondamentali per
                        essere un perfetto studente Boolean sono la capacità di ragionamento
                        critico e la motivazione</p>
            </div>
        </div>
    </div>
    <div class="container-fluid section-input">
        <div class="row">
            <div class="col-6 center">
                <h2>Admission Form</h2>
                <form class="form-group" action="{{ route('admission.save') }}" method="post">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="name">name</label>
                        <input type="text" name="name" class="form-control" id="" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="text" name="email" class="form-control" id="" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="message">message</label>
                        <input type="text" name="message" class="form-control" id="" placeholder="Enter message">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="Send Message">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
