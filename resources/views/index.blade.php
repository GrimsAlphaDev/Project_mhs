@extends('../layouts/mainapp')

@section('title', 'Dashboard')
@section('pagetitle', 'Dashboard Admin')

@section('container')
<h1 class="mb-3">Selamat Datang {{Auth::user()->name}}</h1>
<iframe width="100%" height="350" src="https://www.youtube.com/embed/rj7DOPPTkQA?controls=0&amp;start=13&autoplay=1" title="ASMR" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

@endsection