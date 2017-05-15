@extends('layouts.master')

@section('title')
    Registrierung eines Kindes
@stop

@section('content')
    <section id="registerChildForm">
        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Kind anmelden</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/registerChildForm') }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('firstName') ? ' has-error' : '' }}">

                                <label class="col-md-4 control-label">Vorname</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="firstName" value="{{ old('firstName') }}">

                                    @if ($errors->has('firstName'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('firstName') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('lastName') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Nachname</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="lastName">

                                    @if ($errors->has('lastName'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('lastName') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('bDate') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Geburtsdatum</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="bDate" placeholder="22.11.1994">

                                    @if ($errors->has('bDate'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('bDate') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('telPrimary') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Telefonnr.</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="telPrimary" placeholder="0664567....">

                                    @if ($errors->has('telPrimary'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('telPrimary') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('telSecondary') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Alternative Telefonnr.</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="telSecondary" placeholder="0664567....">

                                    @if ($errors->has('telSecondary'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('telSecondary') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="skill">
                                        <p>Bitte markieren Sie hier, wie gut Ihr Kind schifahren kann.</p>
                                        <label>
                                            <input type="radio" name="skillLevel" value="1" class="skills"><div id="green"></div>
                                        </label>
                                        <label>
                                            <input type="radio" name="skillLevel" value="2"><div id="blue"></div>
                                        </label>
                                        <label>
                                            <input type="radio" name="skillLevel" value="3"><div id="blue2"></div>
                                        </label>
                                        <label>
                                            <input type="radio" name="skillLevel" value="4"><div id="red"></div>
                                        </label>
                                        <label>
                                            <input type="radio" name="skillLevel" value="5"><div id="black"></div>
                                        </label>
                                    </div>
                                    <!--http://www.skischule-tuxertal.at/kinder/einteilung.html-->

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                           <!-- <input type="checkbox" name="canTakePhotos" > Von meinem Kind dürfen Fotos gemacht werden-->
                                            {!! Form::hidden('canTakePhotos', 0) !!}
                                            {{ Form::checkbox('canTakePhotos', 1)}} Von meinem Kind dürfen Fotos gemacht werden
                                        </label>
                                    </div>
                                </div>
                            </div>

                            {!! Form::hidden('wish_Id', $wish_Id) !!}
                            {!! Form::hidden('class_Id', $class_Id) !!}


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            {!! Form::hidden('hasTicket', 0) !!}
                                            {{ Form::checkbox('hasTicket', 1)}} Mein Kind hat ein Ticket
                                        </label>
                                    </div>
                                </div>
                           </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                     Kind anmelden
                                 </button>
                             </div>
                        </div>
        </form>
        </div>
    </div>
    </div>
 </div>
<!--/.container-->
</section>
@stop