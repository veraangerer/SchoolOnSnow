@extends('layouts.admin')
@section('title')
    Übersicht der Schulen
@stop

@section('table')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th>Schulkennzahl</th>
                <th>Schulname</th>
                <th>PLZ</th>
                <th>Stadt</th>
                <th>Adresse</th>
                <th>Bundesland</th>
                <th>Kontakt</th>
                <th>Lehrer</th>
                <th>Klassen</th>
            </tr>
            </thead>
            <tbody>
            @foreach($results as $result)
                <tr>
                    <td>{{$result->idNumber}}</td>
                    <td>{{$result->name}}</td>
                    <td>{{$result->postcode}}</td>
                    <td>{{$result->city}}</td>
                    <td>{{$result->address}}</td>
                    <td>{{$result->country}}</td>
                    <td><p id="cell{{$result->idNumber}}">{{$result->firstName}} {{$result->lastName}}<span onclick="expandDetails({{$result->idNumber}})" class="clickable glyphicon glyphicon-menu-down"></span></p><div id="{{$result->idNumber}}">
                            <p>Telefon: {{$result->telephone}}<br>Mail: {{$result->email}}</p>
                        </div></td>
                    <td><a href="{{ url('admin/school/'.$result->idNumber.'/teachers') }}" class="btn btn-primary" >Lehrer</a></td>
                    <td><a href="{{ url('admin/school/'.$result->idNumber.'/classes') }}" class="btn btn-primary" >Klassen</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
<script type="text/javascript">
    var idNum = 0;
    function expandDetails(id) {
        $('#'+id).slideToggle();
        $('#cell'+id).find("span").toggleClass('glyphicon-menu-down glyphicon-menu-up');
    }
</script>

