@extends('layouts.admin')
@section('title')
    {{ $results[0] }}
@stop
@section('table')
    <div class="container">
        <button type="button" class="btn btn-primary" onclick="renderNewInline(this)" style="float: right; margin-bottom: 10px;">Hinzufügen</button>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Art der Angebots</th>
                <th>Preis pro Erwachsener</th>
                <th>Preis pro Kind</th>
                <th>Übernachtung</th>
                <th>SaisonAnfang</th>
                <th>Saisonende</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody id="tableBody">
            @foreach($results[1] as $result)
                <tr id="{{$result->id}}" class="@if (time() < $result->startSeason || time() > $result->endSeason)inactiveSeason
                @else activeSeason @endif">
                    <td class="offerID">{{$result->id}}</td>
                    <td class="offerName">AngebotsName</td>
                    <td class="ppAdult">{{$result->ppDpA}}</td>
                    <td class="ppChild">{{$result->ppDpC}}</td>
                    <td class="overnight">@if($result->overnight == 1) Ja @else Nein @endif
                    </td>
                    <td class="startDate">{{gmdate("Y-m-d", $result->startSeason)}}</td>
                    <td class="endDate">{{gmdate("Y-m-d", $result->endSeason)}}</td>
                    <td class="editButton"><button type="put" class="btn btn-primary" onclick="renderEditInline(this)" value="{{$result->id}}">Edit</button></td>
                    <td class="deleteButton"><button type="delete" class="btn btn-primary" onclick="deleteThisRow(this)" value="{{$result->id}}">Delete</button></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
<script type="text/javascript">
    function renderNewInline(element) {
        var urlArray =  window.location.href.split('/');
        var idTd = '<tr><td><input name="location_Id" type="hidden" value="' + urlArray[urlArray.length - 2] + '" disabled></td>';
        var nameInput = '<td><input name="name" type="text" value="" required></td>';
        var ppAdultInput = '<td><input name ="ppa" type="number" value="" size="3" required></td>';
        var ppChildInput = '<td><input name="ppc" type="number" value="" required></td>';
        var startDateInput = '<td><input name="startDate" type="date" value="" required></td>';
        var endDateInput = '<td><input name="endDate" type="date" value="" required></td>';
        var submitButtonInput = '<td><button type="POST" class="btn btn-primary" onclick="postRow(this)">Submit</button></td></tr>';
        var htmlForm = idTd + nameInput + ppAdultInput + ppChildInput + startDateInput + endDateInput + submitButtonInput;
        $(element).next().prepend(htmlForm);
    }

    function renderEditInline(element){
        var superNode = $(element).parent().parent();
        var idTd = '<td><input name="tdID" type="text" value="' + superNode.find('.offerID').text() + '" disabled></td>'
        var nameInput = '<td><input name="name" type="text" value="' + superNode.find('.offerName').text() + '" required></td>';
        var ppAdultInput = '<td><input name ="ppa" type="number" value=' + superNode.find('.ppAdult').text() + ' size="3" required></td>';
        var ppChildInput = '<td><input name="ppc" type="number" value=' + superNode.find('.ppChild').text() + ' required></td>';
        var startDateInput = '<td><input name="startDate" type="date" value="'+ superNode.find('.startDate').text() + '" required></td>';
        var endDateInput = '<td><input name="endDate" type="date" value="'+ superNode.find('.endDate').text() + '" required></td>';
        var submitButtonInput = '<td><button type="PUT" class="btn btn-primary" onclick="postRow(this)">Submit</button></td>';
        var htmlForm = idTd + nameInput + ppAdultInput + ppChildInput + startDateInput + endDateInput + submitButtonInput;
        superNode.html(htmlForm);
    }
    function postRow(element) {
        var passThisOn = element;
        var valid = true;
        $(element).parent().parent().children().each(function() {
            if ($(this).children().is('input')) {
                if($(this).find('input').val() == "") {
                    valid = false;
                }
            }
        });
        if(valid) {
            ajaxCall(passThisOn);
        } else {
            alert('Bitte füllen Sie alle Felder aus!');
        }
    }
    function ajaxCall(element) {
        //Reusability across the board; Difference between PUT and POST
        var keys = ['tdID', 'name', 'ppa', 'ppc', 'startDate', 'endDate'];
        var url;
        var posttype = $(element).attr('type');
        var postArray = {};
        //For each input field...
        $(element).parent().parent().children().each(function() {
            if ($(this).children().is('input')) {
                if( $(this).find('input').attr('name') == 'startDate' || $(this).children().attr('name') == 'endDate') {
                    var selectedInput = $(this).find('input');
                    var selectedInputName = selectedInput.attr('name');
                    postArray[selectedInputName] = new Date(selectedInput.val()).getTime() / 1000;
                } else {
                    //Selects input field
                    var selectedInput = $(this).find('input');
                    var selectedInputName = selectedInput.attr('name');
                    postArray[selectedInputName] = selectedInput.val();
                }
            }
        });
        //Set up url
        if(posttype == "PUT") {
            console.log("Going with PUT");
            url =  "../../../offer/" + postArray['school_Id']
        } else if (posttype == "POST") {
            console.log("Going with POST");
            url = "../../../offer/";
        }
        //Set CSRF token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //send ajax
        $.ajax({
            type: posttype,
            url: url,
            data: postArray,
            success: function(data) {
                var row = prepareRow(data.id, postArray, keys);
                if (posttype == "POST") {
                    $("#tableBody tr:last").after('<tr>'+row+'</tr>');
                    $(element).parent().parent().remove();
                } else if (posttype == "PUT") {
                    $(element).parent().parent().html(row);
                }
            },
            error: function(data) {console.log(data);
                console.log("error")},
            dataType: "JSON"
        });
    }
    function deleteRow(element){
        //Set CSRF token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //send ajax
        $.ajax({
            type: "DELETE",
            url: "../../../offer/" + $(element).val(),
            success: function(data) {
                $(element).parent().parent().remove();
            },
            error: function(data) { alert('Konnte nicht ausgeführt werden. Fehler am Server!');
                console.log("error")}
        });
    }

    function deleteThisRow(element) {
        var r = confirm("Wollen sie diesen Eintrag wirklich löschen?!");
        if (r == true) {
            deleteRow(element);
        }
    }
    function prepareRow(id, values, keys) {
        values['tdID'] = id;
        var row = "";
        keys.forEach( function(item, index) {
            row += '<td class="' + item + '">' + values[item] + '</td>';
        });
        var edit = '<td class="editButton"><button type="put" onclick="renderEditInline(this)" value="'+id+'" class="btn btn-primary">Edit</button></td>';
        var del = '<td class="deleteButton"><button type="delete" class="btn btn-primary" onclick="deleteThisRow(this)" value="'+id+'">Delete</button></td>';
        row += edit + del;
        return row;
    }
</script>
