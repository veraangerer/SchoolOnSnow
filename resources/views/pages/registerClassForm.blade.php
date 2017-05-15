@extends('layouts.master')

@section('title')
    Registrierung eines Kindes
@stop

@section('content')
    <section id="registerChildForm">
        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Klasse anmelden</div>
                    <div class="panel-body">

                        @if (Auth::guest())
                        <h3>Bitte loggen Sie sich rechts oben ein.</h3>
                        @else
                            <!-- Validation Errors go here-->
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif


                            {!! Form::open(array('url' => 'registerClass', 'class' => 'form-horizontal', 'id' =>
                            'eventForm')) !!}
                            <div class="form-group">
                                <h2>Angaben zur Schule</h2>

                                <div @if ($errors->has('idNumber')) has-error @endif>
                                    {!! Form::label('idNumber', 'Schulkennzahl: ') !!}
                                    {!! Form::number('idNumber', null, array('class' => 'form-control', 'id' => 'idNumber')) !!}
                                    @if ($errors->has('idNumber')) <p class="help-block">{{ $errors->first('idNumber') }}</p> @endif
                                </div>
                                {!! Form::button('Schulkennzahl suchen und Daten automatisch ausfüllen', ['onClick' => 'autofill()', 'class' => 'btn btn-primary form-control']) !!}
                                <div id="skz"></div>
                                {!! Form::label('name', 'Name: ') !!}

                                {!! Form::text('name', null, array('class' => 'form-control')) !!}

                                {!! Form::label('address', 'Adresse: ') !!}

                                {!! Form::text('address', null, array('class' => 'form-control')) !!}

                                {!! Form::label('postcode', 'PLZ: ') !!}

                                {!! Form::number('postcode', null, array('class' => 'form-control')) !!}

                                {!! Form::label('schools_city', 'Ort: ') !!}

                                {!! Form::text('schools_city', null, array('class' => 'form-control')) !!}

                                {!! Form::label('schools_country', 'Land: ') !!}

                                {!! Form::text('schools_country', null, array('class' => 'form-control')) !!}

                            </div>

                            <div class="form-group">
                                <h3>Direktion</h3>
                                {!! Form::label('firstName', 'Vorname: ') !!}

                                {!! Form::text('firstName', null, array('class' => 'form-control')) !!}

                                {!! Form::label('lastName', 'Nachname: ')!!}

                                {!! Form::text('lastName', null, array('class' => 'form-control')) !!}

                                {!! Form::label('telephone', 'Telefonnummer: ') !!}

                                {!! Form::text('telephone', null, array('class' => 'form-control')) !!}

                                {!! Form::label('email', 'E-mail: ') !!}

                                {!! Form::email('email', null, array('class' => 'form-control')) !!}


                            </div>

                            <div class="form-group">
                                <h2>Angaben zur Klasse</h2>
                                {!! Form::label('name_class', 'Bezeichnung: ' ) !!}

                                {!! Form::text('name_class', null, array('class' => 'form-control', 'placeholder' => 'zb: 1A')) !!}

                                {!! Form::label('sumstudents', 'Anzahl an teilnehmenden Schüler: ') !!}

                                {!! Form::number('sumstudents', null, array('class' => 'form-control')) !!}


                            </div>

                            <div class="form-group">
                                <h2>Angaben zu LehrerIn</h2>

                                <h3>Verantwortliche(r) LehrerIn</h3>

                                {!! Form::label('firstName1', 'Vorname: ') !!}

                                {!! Form::text('firstName1', null, array('class' => 'form-control')) !!}

                                {!! Form::label('lastName1', 'Nachname: ' ) !!}

                                {!! Form::text('lastName1', null, array('class' => 'form-control')) !!}

                                {!! Form::label('telephone1', 'Mobilnummer: ') !!}

                                {!! Form::number('telephone1', null, array('class' => 'form-control')) !!}

                                {!! Form::label('email1', 'E-mail: ') !!}

                                {!! Form::email('email1', null, array('class' => 'form-control')) !!}

                                <h3>ErsatzlehrerIn</h3>
                                {!! Form::label('firstName2', 'Vorname: ') !!}

                                {!! Form::text('firstName2', null, array('class' => 'form-control')) !!}

                                {!! Form::label('lastName2', 'Nachname: ') !!}

                                {!! Form::text('lastName2', null, array('class' => 'form-control')) !!}

                                {!! Form::label('telephone2', 'Mobilnummer: ') !!}

                                {!! Form::number('telephone2', null, array('class' => 'form-control')) !!}

                                {!! Form::label('email2', 'E-mail: ' ) !!}

                                {!! Form::email('email2', null, array('class' => 'form-control')) !!}

                            </div>

                            <div class="form-group">
                                <h2>Angebot</h2>

                                {!! Form::label('package_id', 'Paket: ') !!}

                                {!! Form::select('package_id', (['' => 'Paket wählen...'] + $packages),null, ['class' =>
                                'form-control']) !!}

                                {!! Form::label('country', 'Gewünschtes Bundesland: ') !!}
                                {!! Form::select( 'country', (['' => 'Bundesland wählen...'] + $countries), 'default', array('onchange' => 'getval(this)', 'class' =>
                                'form-control') ) !!}

                                {!! Form::label('city', 'Gewünschter Ort: ') !!}

                                <select name="city" id="city" class="form-control">
                                    <option value="0">Ort wählen...</option>
                                </select>

                                <h3>Gewünschter Start- und Endtermin</h3>

                                {!! Form::label('primaryDateStart', 'von: ') !!}
                                <div class="input-group input-append date" id="datePicker1">
                                    <span class="input-group-addon add-on"><span
                                                class="glyphicon glyphicon-calendar"></span></span>
                                    {!! Form::text('primaryDateStart', null, array('class' => 'form-control', 'placeholder'
                                    => 'TT.MM.YYYY')) !!}
                                </div>
                                {!! Form::label('primaryDateEnd', 'bis: ') !!}
                                <div class="input-group input-append date" id="datePicker2">
                                    <span class="input-group-addon add-on"><span
                                                class="glyphicon glyphicon-calendar"></span></span>
                                    {!! Form::text('primaryDateEnd', null, array('class' => 'form-control', 'placeholder' =>
                                    'TT.MM.YYYY')) !!}
                                </div>
                                <h3>Gewünschter Start und Endtermin (ERSATZTERMIN)</h3>
                                {!! Form::label('secondaryDateStart', 'von: ') !!}
                                <div class="input-group input-append date" id="datePicker3">
                                    <span class="input-group-addon add-on"><span
                                                class="glyphicon glyphicon-calendar"></span></span>
                                    {!! Form::text('secondaryDateStart', null, array('class' => 'form-control',
                                    'placeholder' => 'TT.MM.YYYY')) !!}
                                </div>
                                {!! Form::label('secondaryDateEnd', 'bis: ') !!}
                                <div class="input-group input-append date" id="datePicker4">
                                    <span class="input-group-addon add-on"><span
                                                class="glyphicon glyphicon-calendar"></span></span>
                                    {!! Form::text('secondaryDateEnd', null, array('class' => 'form-control', 'placeholder'
                                    => 'TT.MM.YYYY')) !!}
                                </div>
                            </div>


                            <div class="form-group">
                                {!! Form::submit('senden', ['class' => 'btn btn-primary form-control']) !!}
                            </div>
                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!--/.container-->
    </section>
@stop


@section('scriptOnBottom')
    <script>
        function getval(sel) {
            $.get('/countries/' + sel.value, function (cities_id) {

                var allCities = {!! json_encode($cities) !!}
                var cities2select = {};

                for (var i = 0; i < cities_id.length; i++) {
                    //for (var entry in allCities) {
                    for (var j = 0; j < Object.keys(allCities).length; j++) {
                        if ((allCities.hasOwnProperty(cities_id[i]))) {
                            cities2select[cities_id[i]] = allCities[cities_id[i]];
                        }
                    }
                }

                var $state = $('#city');
                $state.find('option').remove().end();
                $state.append('<option value="">' + "Ort wählen..." +'</option>');
                $.each(cities2select, function (k, v) {
                    //display the key and value pair
                    $state.append('<option value="' + k + '">' + v + '</option>');
                });
            });
        }

        function autofill() {

            var skzInput = document.getElementById('idNumber').value;
            var fillData;

            var SKZData = $.getJSON( "https://jsonp.afeld.me/?callback=?&url=http://www.salzburg.gv.at/ogd/645dbdfe-857f-4485-b111-b88d5b2f32d0/Schulstandorte.json", function() {
            })
                    .done(function( data ) {
                       console.log("done funzt");
                    })
                    .fail(function() {
                        console.log( "getJSON Error!" );
                    });

            SKZData.done(function(data) {
                var bool = false;
                for (var j = 0; j < data.features.length; j++) {
                    if (data.features[j].attributes["SKZ"] === parseInt(skzInput)) {
                        fillData = data.features[j];

                        var inputName1 = document.getElementById('name');
                        inputName1.value = fillData.attributes["NAME"];

                        var inputName2 = document.getElementById('address');
                        inputName2.value = fillData.attributes["STRASSE"];

                        var inputName3 = document.getElementById('postcode');
                        inputName3.value = fillData.attributes["PLZ"];

                        var inputName4 = document.getElementById('schools_city');
                        inputName4.value = fillData.attributes["ORT"];

                        var inputName5 = document.getElementById('schools_country');
                        inputName5.value = "Österreich";

                        var inputName6 = document.getElementById('telephone');
                        inputName6.value = fillData.attributes["TELEFON"];

                        var inputName7 = document.getElementById('email');
                        inputName7.value = fillData.attributes["EMAIL"];

                        bool = true;
                        $('#skz').find('p').remove().end();
                        return;

                    }
                }
                if(!bool) {
                    $('#skz').find('p').remove().end();
                    $('#skz').append('<p class="help-block">Die SKZ konnte leider nicht gefunden werden, bitte füllen Sie die Daten manuell aus.</p>');
                    return;
                }




            });

        }

    </script>
@stop















