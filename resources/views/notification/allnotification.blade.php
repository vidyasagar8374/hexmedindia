@include('layouts.css')

@include('layouts.sidebar')
<main id="main" class="main">
        <div class="container">
            <div class="table-responsive">
            <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">Notification</th>
                

                </tr>
            </thead>
            <tbody>
                @foreach($notifications as $notification)
                <tr>
            
                <td>{{$notification->notification}}</td>
               
                </tr>
                @endforeach
            </table>
            </div>
          </div>


    </main>
@extends('layouts.script')