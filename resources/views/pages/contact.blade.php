@extends('main')

@section('title', '| Kontakt')

@section('content')
        <div class="row">
            <div class="col-md-12">
                <h1>Skontaktuj się ze mną</h1>
                <hr>
                <form action="{{ url('contact') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label name="email">Email:</label>
                        <input id="email" name="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label name="subject">Tytuł:</label>
                        <input id="subject" name="subject" class="form-control">
                    </div>

                    <div class="form-group">
                        <label name="message">Wiadomość:</label>
                        <textarea id="message" name="message" class="form-control">Wpisz twoją wiadomość...</textarea>
                    </div>

                    <input type="submit" value="Wyślij wiadomość" class="btn btn-success">
                </form>
            </div>
        </div>
@endsection