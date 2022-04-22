@extends('layouts.dasboard')


@section('content')
{{-- <H1>HALLO {{auth()->user()->username}}
</H1> --}}
<div class="container">
    <div class="row">
        <form action="{{route('imports')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="input-group mb-3">
                <input type="file" name="file" class="form-control" placeholder="Recipient's username"
                    aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-primary" type="submit" id="button-addon2">Import</button>
            </div>
        </form>

 @endsection
