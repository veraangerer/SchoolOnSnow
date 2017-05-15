@extends('layouts.admin')
@section('title')
    {{ $results[0] }}
@stop

@section('table')
    <div class="container">
        <button type="button" class="btn btn-warning" onclick="renderNewInline(this)" style="float: right; margin-bottom: 10px;">Hinzufügen</button>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Vorname</th>
                <th>Name</th>
                <th>Geburtsdatum</th>
                <th>Tel.</th>
                <th>Sekudäre Tel.</th>
                <th>Hat Ticket</th>
                <th>Photos Nehmen</th>
                <th>Können</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody id="tableBody">
            @foreach($results[1] as $result)
                <tr>
                    <td class="tdID">{{$result->id}}</td>
                    <td class="firstName">{{$result->firstName}}</td>
                    <td class="lastName">{{$result->lastName}}</td>
                    <td class="bDate">{{$result->bDate}}</td>
                    <td class="telPrimary">{{$result->telPrimary}}</td>
                    <td class="telSecondary">{{$result->telSecondary}}</td>
                    <td class="hasTicket">@if($result->hasTicket == 1) Ja @else Nein @endif
                    </td>
                    <td class="canTakePhotos">@if($result->canTakePhotos == 1) Ja @else Nein @endif
                    </td>
                    <td class="skillLevel">@if($result->skillLevel == 0)<span class="glyphicon glyphicon-record" aria-hidden="true" style="color: green;"></span>
                        @elseif($result->skillLevel == 1)<span class="glyphicon glyphicon-record" aria-hidden="true" style="color: yellow;"></span>
                        @else <span class="glyphicon glyphicon-record" aria-hidden="true" style="color: red;"> </span>@endif
                    </td>
                    <td class="editButton"><button type="put" class="btn btn-warning" onclick="renderEditInline(this)" value="{{$result->id}}">Edit</button></td>
                    <td class="deleteButton"><button type="delete" class="btn btn-danger" onclick="deleteThisRow(this)" value="{{$result->id}}">Delete</button></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
<script type="text/javascript">
    function renderNewInline(element) {
        var urlArray =  window.location.href.split('/');
        var idTd = '<td><input name="class_Id" type="hidden" value="' + urlArray[urlArray.length-2] + '" disabled></td>';
        var firstNameInput = '<td><input name="firstName" type="text" value="" required></td>';
        var lastNameInput = '<td><input name ="lastName" type="text" value="" required></td>';
        var bDateInput = '<td><input name ="bDate" type="date" value="" required></td>';
        var telPrimaryInput = '<td><input name ="telPrimary" type="text" value="" required></td>';
        var telSecondaryInput = '<td><input name ="telSecondary" type="text" value="" required></td>';
        var hastTicketInput = '<td><select name="hasTicket" required>' +
                '<option value="0" selected>Nein</option>' +
                '<option value="1">Ja</option>' +
                '</select></td>';
        var canTakePhotosInput = '<td><select name="canTakePhotos" required>' +
                '<option value="0" selected>Nein</option>' +
                '<option value="1">Ja</option>' +
                '</select></td>';
        var skillLevel = '<td><select name="skillLevel" required>' +
                '<option value="0" selected>low</option>' +
                '<option value="1">med</option>' +
                '<option value="2">high</option>' +
                '</select></td>';
        var submitButtonInput = '<td><button type="POST" onclick="postRow(this)">Submit</button></td>';
        var htmlForm = idTd + firstNameInput + lastNameInput + bDateInput + telPrimaryInput + telSecondaryInput + hastTicketInput + canTakePhotosInput + skillLevel + submitButtonInput;
        $('#tableBody').append('<tr>'+htmlForm+'</tr>');
    }

    function renderEditInline(element){
        var superNode = $(element).parent().parent();
        var idTd = '<td><input name="tdID" type="text" value="' + superNode.find('.tdID').text() + '" disabled></td>'
        var firstNameInput = '<td><input name="firstName" type="text" value="' + superNode.find('.firstName').text() + '" required></td>';
        var lastNameInput = '<td><input name ="lastName" type="text" value="' + superNode.find('.lastName').text() + '" required></td>';
        var bDateInput = '<td><input name ="bDate" type="date" value="' + superNode.find('.bDate').val() + '" required></td>';
        var telPrimaryInput = '<td><input name ="telPrimary" type="text" value="' + superNode.find('.studentID').text() + '" required></td>';
        var telSecondaryInput = '<td><input name ="telSecondary" type="text" value="' + superNode.find('.studentID').text() + '" required></td>';
        var hastTicketInput = '<td><select name="hasTicket" required>' +
                '<option value="0" selected>Nein</option>' +
                '<option value="1">Ja</option>' +
                '</select></td>';
        var canTakePhotosInput = '<td><select name="canTakePhotos" required>' +
                '<option value="0" selected>Nein</option>' +
                '<option value="1">Ja</option>' +
                '</select></td>';
        var skillLevel = '<td><select name="skillLevel" required>' +
                '<option value="0" selected>Low</option>' +
                '<option value="1">Med</option>' +
                '<option value="2">High</option>' +
                '</select></td>';
        var submitButtonInput = '<td><button type="POST" onclick="postRow(this)">Submit</button></td>';
        var htmlForm = idTd + firstNameInput + lastNameInput + bDateInput + telPrimaryInput + telSecondaryInput + hastTicketInput + canTakePhotosInput + submitButtonInput;
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
            alert('Bitte füllen sie alle Felder aus!');
        }
    }
    function ajaxCall(element) {
        //Reusability across the board; Difference between PUT and POST
        var keys = ['tdID', 'firstName', 'lastName', 'email', 'telPrimary', 'telSecondary', 'hasTicket', 'canTakePhotos', 'skillLevel'];
        var url;
        var posttype = $(element).attr('type');
        var postArray = {};
        //For each input field...
        $(element).parent().parent().children().each(function() {
            if ($(this).children().is('input')) {
                //Selects input field
                var selectedInput = $(this).find('input');
                var selectedInputName = selectedInput.attr('name');
                postArray[selectedInputName] = selectedInput.val();
            } else if ($(this).children().is('select')) {
                var selectedOption = $(this).find('option:selected');
                var selectedOptionName = selectedOption.attr('name');
                postArray[selectedOptionName] = selectedOption.val();
            }
        });
        //Set up url
        if(posttype == "PUT") {
            console.log("Going with PUT");
            url =  "../../../student/" + postArray['class_Id']
        } else if (posttype == "POST") {
            console.log("Going with POST");
            url = "../../../student/";
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
            url: "../../../student/" + $(element).val(),
            success: function(data) {
                $(element).parent().parent().remove();
            },
            error: function(data) { alert('Konnte nicht ausgeführt werden. Fehler am Server!');
                console.log("error")}
        });
    }
    function deleteThisRow(element) {
        var r = confirm("Wollen sie diesen Eintrag wirklich löschen?");
        if (r == true) {
            deleteRow(element);
        }
    }
    function prepareRow(id, values, keys) {
        values['tdID'] = id;
        var row = "";
        var yesNo = { "Ja": "0", "Nein": "1"};
        var loMidHi = { "Low": "0", "Mid": "1", "High": "2"};
        keys.forEach( function(item, index) {
            if (item == "hasTicket" || item == "canTakePhotos"){
                row += selectFieldGenerator(yesNo, values[item], item)
            } else if (item == "skillLevel"){
                row += selectFieldGenerator(loMidHi, values[item], item)
            } else {
                row += '<td class="' + item + '">' + values[item] + '</td>';
            }
        });
        var edit = '<td class="editButton"><button type="put" onclick="renderEditInline(this)" value="'+id+'" class="btn btn-primary">Edit</button></td>';
        var del = '<td class="deleteButton"><button type="delete" class="btn btn-primary" onclick="deleteThisRow(this)" value="'+id+'">Delete</button></td>';
        row += edit + del;
        return row;
    }
    function selectFieldGenerator(possibleValuesKVP, trueValue, fieldName) {
        var selectField = '<select name="' + fieldName + '">';
        for (var key in possibleValuesKVP) {
            if(possibleValuesKVP[key] == trueValue) {
                selectField += '<option value="' + possibleValuesKVP[key] + '" selected>' + key + '</option>';
            } else {
                selectField += '<option value="' + possibleValuesKVP[key] + '">' + key + '</option>';
            }
        }
        selectField += '</select>';
        return selectField;
    }
</script>
