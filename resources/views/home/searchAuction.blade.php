@extends('layouts.master')

@section('content')

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Showing You Results For</p>
                    <h1>{{ $searchVal }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->



<!-- Auctions matching search result -->
<div class="container">
    @unless(count($auctions) == 0)
    @foreach ($auctions as $auction)
    <div class="mt-5">
        <div class="d-style btn btn-brc-tp border-2 bgc-white btn-outline-blue btn-h-outline-blue btn-a-outline-blue w-100 my-2 py-3 shadow-sm">
            <div class="row align-items-center">
                <div class="col-12 col-md-4">

                    <a href="{{ route('auction-items', $auction -> id) }}"><div class="auction-img-bg" style="background-image: url( {{ asset('storage/'.$auction->image) }}"></div></a>

                    <h4 class="pt-3 text-150 text-600 text-primary-d1 letter-spacing">
                        {{$auction->title}}
                    </h4>
                    
                </div>
    
                <ul class="list-unstyled mb-0 col-12 col-md-4 text-dark-l1 text-90 text-left my-4 my-md-0">
                    @if(isset($auction->date))
                    <li class="mt-25">
                        <span class=""><i class="fa fa-calendar"></i> {{Carbon\Carbon::parse($auction->date)->format('j F, Y')}}</span>
                    </li>
                    @endif

                    <li class="mt-25">
                        <span class=""><i class="fa fa-map-marker"></i> {{$auction->location}}</span>
                    </li>

                    <li class="mt-25">
                        <span class=""><i class="fas fa-clock"></i> {{$auction->period}}</span>
                    </li>
        
                </ul>
    
                <div class="col-12 col-md-4 text-center">
                    <a href="{{ route('auction-items', $auction -> id) }}" class="f-n-hover btn btn-info btn-raised px-4 py-25 w-75 text-600">Browse</a>
                </div>
            </div>
        </div>
    </div>

    @endforeach

    @else
    <p> No results for<h1>{{ $searchVal }}</h1></p>
    @endunless

</div>

@endsection
