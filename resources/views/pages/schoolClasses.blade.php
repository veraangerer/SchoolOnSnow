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
                <th>Name</th>
                <th>Anzahl Schüler</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody id="tableBody">
            @foreach($results[1] as $result)
                <tr>
                    <td class="tdID">{{$result->id}}</td>
                    <td class="name">{{$result->name}}</td>
                    <td class="sumstudents">{{$result->sumstudents}}</td>
                    <td><button  class="btn" ><a href="{{ url('admin/class/'.$result->id.'/students') }}">Schüler</a></button></td>
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
        var school_Id = '<td><input name="school_Id" type="hidden" value="' + urlArray[urlArray.length - 2] + '" disabled></td>';
        var name = '<td><input name="name" type="text" value="" required></td>';
        var sumStudents = '<td><input name="sumstudents" type="number" value="" required></td>';
        var submitButtonInput = '<td><button type="POST" onclick="postRow(this)">Submit</button></td>';
        var htmlForm = school_Id + name + sumStudents +  submitButtonInput;
        $(element).next().prepend('<tr>'+htmlForm+'</tr>');
    }

    function renderEditInline(element){
        var superNode = $(element).parent().parent();
        var idTd = '<td><input name="tdID" type="text" value="' + superNode.find('.tdID').text() + '" disabled></td>';
        var name = '<td><input name="name" type="text" value="' + superNode.find('.name').text() + '" required></td>';
        var sumStudents = '<td><input name="sumstudents" type="number" value="' + superNode.find('.sumStudents').text() + '" required></td>';
        var submitButtonInput = '<td><button type="PUT" onclick="postRow(this)">Submit</button></td>';
        var htmlForm = idTd + name + sumStudents +  submitButtonInput;
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
        var url;
        var posttype = $(element).attr('type');
        var postArray = {};
        var keys = ['tdID', 'name', 'sumstudents'];
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
            url =  "../../../class/" + postArray['school_Id']
        } else if (posttype == "POST") {
            console.log("Going with POST");
            url = "../../../class/";
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
            url: "../../../class/" + $(element).val(),
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
        values.tdID = id;
        var row = "";
        keys.forEach( function(item, index) {
            row += '<td class="' + item + '">' + values[item] + '</td>'
        });
        var linkToStudents = '<td><button  class="btn" ><a href="' + window.location.host + '/admin/class/' + values['tdID'] +'/students">Schüler</a></button></td>';
        var edit = '<td class="editButton"><button type="put" onclick="renderEditInline(this)" value="'+id+'" class="btn btn-primary">Edit</button></td>';
        var del = '<td class="deleteButton"><button type="delete" class="btn btn-primary" onclick="deleteThisRow(this)" value="'+id+'">Delete</button></td>';
        row += linkToStudents + edit + del;
        return row;
    }
</script>