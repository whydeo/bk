@extends('layouts.dasboard')


@section('content')
<H1>HALLO {{auth->()->user()->username}}
</H1>
 @endsection
