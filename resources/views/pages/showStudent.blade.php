@extends('layouts.master')

@section('title')
    Ihre eingegebenen Daten
@stop

@section('content')
    <section id="registerChildForm">
        <div class="container">
            <div class="col-md-8 col-md-offset-2">

                foreach (Student::with('id')->get() as $student)
                {
                    echo $student->id->name;
                }
                
            </div>
        </div>
        <!--/.container-->
    </section>
@stop