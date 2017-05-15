@extends('layouts.admin')
@section('title')
    Schulen - Lehrer
@stop
@section('table')
    <div class="adminPanel">
    <div class="container">
        <button type="button" class="btn btn-primary" onclick="renderNewInline(this)" style="float: right; margin-bottom: 10px;">Hinzufügen</button>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Vorname</th>
                <th>Name</th>
                <th>Email</th>
                <th>Telefon</th>
            </tr>
            </thead>
            <tbody id="tableBody">
            @foreach($results[1] as $result)
                <tr>
                    <td class="tdID">{{$result->id}}</td>
                    <td class="firstName">{{$result->firstName}}</td>
                    <td class="lastName">{{$result->lastName}}</td>
                    <td class="email">{{$result->email}}</td>
                    <td class="telephone">{{$result->telephone}}</td>
                    <td class="editButton"><button type="put" onclick="renderEditInline(this)" value="{{$result->id}}" class="btn btn-primary">Edit</button></td>
                    <td class="deleteButton"><button type="delete" class="btn btn-primary" onclick="deleteThisRow(this)" value="{{$result->id}}">Delete</button></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>
@stop
<script type="text/javascript">
    function renderNewInline(element) {
        var urlArray =  window.location.href.split('/');
        var idTd = '<td><input name="school_Id" type="hidden" value="' + urlArray[urlArray.length - 2] + '" disabled></td>';
        var firstNameInput = '<td><input name="firstName" type="text" value="" required></td>';
        var lastNameInput = '<td><input name ="lastName" type="text" value="" required></td>';
        var emailInput = '<td><input name="email" type="text" value="" required></td>';
        var telephoneInput = '<td><input name="telephone" type="text" value="" required></td>';
        var submitButtonInput = '<td><button class="btn btn-primary" type="POST" onclick="postRow(this)">Submit</button></td>';
        var htmlForm = idTd + firstNameInput + lastNameInput + emailInput + telephoneInput + submitButtonInput;
        $('#tableBody').append('<tr>'+htmlForm+'</tr>');
    }

    function renderEditInline(element){
        var superNode = $(element).parent().parent();
        var idTd = '<td><input name="tdID" type="text" value="' + superNode.find('.tdID').text() + '" disabled></td>'
        var firstNameInput = '<td><input name="firstName" type="text" value="' + superNode.find('.firstName').text() + '" required></td>';
        var lastNameInput = '<td><input name ="lastName" type="text" value="' + superNode.find('.lastName').text() + '" required></td>';
        var emailInput = '<td><input name="email" type="text" value="' + superNode.find('.email').text() + '" required></td>';
        var telephoneInput = '<td><input name="telephone" type="text" value="'+ superNode.find('.telephone').text() + '" required></td>';
        var submitButtonInput = '<td><button type="PUT" onclick="postRow(this)">Submit</button class="btn btn-primary"></td>';
        var htmlForm = idTd + firstNameInput + lastNameInput + emailInput + telephoneInput + submitButtonInput;
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
        var keys = ['tdID', 'firstName', 'lastName', 'email', 'telephone'];
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
            }
        });
        //Set up url
        if(posttype == "PUT") {
            console.log("Going with PUT");
            url =  "../../../teacher/" + postArray['school_Id']
        } else if (posttype == "POST") {
            console.log("Going with POST");
            url = "../../../teacher/";
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
            url: "../../../teacher/" + $(element).val(),
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
</script>
