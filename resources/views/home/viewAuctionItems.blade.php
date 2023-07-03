@extends('layouts.master')

@section('content')


<!-- breadcrumb-section -->
<div class="breadcrumb-section" style="background-image: url( {{ asset('storage/'.$auction->image) }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Live Auction - {{$auction->location}}</p>
                    <h1>{{$auction->title}}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- auction items -->
<div class="latest-news mt-150 mb-150">
    <div class="container">
        <div class="row">
            @unless(count($auction->items) == 0)
            <!-- the method "items" below is the hasMany() relationship method -->
            @foreach($auction->items as $item) 
            <div class="col-lg-4 col-md-6">
                <div class="single-latest-news">
                    <!-- checking if an item has an image uploaded for it or not -->
                    <a href="/auctions/{{$auction->id}}/item/{{$item->id}}"><div class="latest-news-bg" style="background-image: url( {{ $item->image ? asset('storage/'.$item->image) : asset('/images/logo.jpg') }}"></div></a>
                    <div class="news-text-box">
                        <h3><a href="/auctions/{{$auction->id}}/item/{{$item->id}}"> {{ $item->artist }} - {{ $item->year_produced }} </a></h3>
                        <p class="blog-meta">
                            Estimate: {{$item->estimated_price}} GBP
                        </p>
                        <p class="excerpt">{{$item->description_summary}}</p>
                        <a href="/auctions/{{$auction->id}}/item/{{$item->id}}" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach

            @else
            <p> No items found for {{$auction->title}} </p>
            @endunless

        </div>
    </div>
</div>
<!-- end latest news -->


@endsection