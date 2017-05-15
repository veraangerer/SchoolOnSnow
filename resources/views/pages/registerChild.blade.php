@extends('layouts.master')

@section('title')
    Registrierung eines Kindes
@stop

@section('content')
    <section id="registerChild">
        <div class="container">
            <h2>Guten Tag</h2>
            <p>Sie haben über dieses System nun die Möglichkeit, Ihre Kinder für School on Snow anzumelden.</p>

            <p>Hierzu haben Sie von Ihrem zuständigen Lehrer ein Einladungsschreiben erhalten, auf welchem ein Einladungs-Code abgedruckt ist.
            Bitte geben Sie diesen Code im folgenden Textfeld ein, um sich zu identifizieren.</p>

            <p><b>Haben Sie Ihre Kinder bereits angemeldet, so ist eine erneute Anmeldung NICHT mehr erforderlich.</b></p>
            <p>Weitere Informationen finden Sie in der Anmeldungsbestätigung, die Sie per E-Mail erhalten haben</p>

            {!! Form::open(['url' => 'registerChild']) !!}
            <div class="form-group">
                <div class="col-md-3 col-md-offset-4">
                    <input type="text" class="form-control" placeholder="z.B. QHA34N5Z1" name="wish_Id">
                </div>
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                       Registrierungscode überprüfen
                    </button>
                </div>
           </div>
            {!! Form::close() !!}


        </div>
        <!--/.container-->
    </section>
@stop