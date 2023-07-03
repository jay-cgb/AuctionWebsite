@extends('layouts.master')

@section('content')



<!-- single item section -->
<div class="mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="single-article-section">
                    <div class="single-article-text">
                        <div class="single-article-bg" style="background-image: url( {{ $item->image ? asset('storage/'.$item->image) : asset('/images/logo.jpg') }}"></div>
                        <p class="blog-meta">
                            Estimate: {{$item->estimated_price}} GBP
                        </p>
                        <h2>{{ $item->artist }} - {{ $item->year_produced }}</h2>
                        <p>{{$item->description_summary}}</p>
                        <p>{{$item->description}}</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="sidebar-section">
                    <div class="recent-posts">
                        <h4>Details</h4>
                        <ul>
                            <li>Subject Classification: {{$item->subject_classification}}.</li>

                            @if(isset($item->medium))
                            <li>Medium Used: {{$item->medium}}.</li>
                            @endif

                            @if(isset($item->is_framed))
                            <li>Framed: {{$item->is_framed}}.</li>
                            @endif

                            @if(isset($item->dimension))
                            <li>Dimensions: {{$item->dimension}} cm.</li>
                            @endif

                            @if(isset($item->image_type))
                            <li>Image Type: {{$item->image_type}}.</li>
                            @endif

                            @if(isset($item->material_used))
                            <li>Material Used: {{$item->material_used}}.</li>
                            @endif

                            @if(isset($item->weight))
                            <li>Approximate Weight: {{$item->weight}} Kg.</li>
                            @endif

                            <li>Year Produced: {{$item->year_produced}}.</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- end single item section -->



@endsection