<!DOCTYPE html>
<html lang="en">
  <head>
     <!-- partial:partials/_css -->
     @include('admin.partials._css')

     <style type="text/css">

            .div_design
            {
                padding-bottom: 15px;
            }

            .div_center
            {
                text-align: center;
                padding-top: 40px;
            }

            .font_size
            {
                font-size: 30px;
                padding-bottom: 40px;

            }

            label
            {
                display: inline-block;
                width: 200px;
            }

            .error_message
            {
                color: red;
                font-size: 0.75rem;
                line-height: 1rem;
                margin-top: 0.25;
                padding-top: 1rem;
            }
     </style>

    
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar -->
      @include('admin.partials._sidebar')


      <!-- partial:partials/_navbar -->
      @include('admin.partials._navbar')


        <div class="main-panel">
            <div class="content-wrapper">

                @if (session()->has('message'))

                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                        {{ session()->get('message') }}
                    </div>
                @endif


                <div class="div_center">
                    <h1 class="font_size">Edit Auction</h1>

                    <form action="{{ route('admin.update-auction', $auction->id) }}" method="POST" enctype="multipart/form-data">
                        <!-- cross site request forgeries -->
                        @csrf
                        <!-- use method directive to change method to 'PUT' -->
                        @method('PUT')
                        <div class="div_design">
                            <label for="title" class="inline-block text-lg mb-2"> Auction Title :</label>
                            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title" value="{{ $auction->title }}"/>
                    
                            @error('title')
                            <p class="error_message"> {{$message}}</p>
                            @enderror
                        </div>
    
                        <div class="div_design">
                            <label for="location" class="inline-block text-lg mb-2"> Location :</label>
                            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location" value="{{ $auction->location }}"/>
                    
                            @error('location')
                            <p class="error_message"> {{$message}}</p>
                            @enderror
                        </div>
    
                        <div class="div_design">
                            <label for="date" class="inline-block text-lg mb-2"> Auction Date :</label>
                            <input type="date" class="border border-gray-200 rounded p-2 w-full" name="date" value="{{ $auction->date }}"/>
                    
                            @error('date')
                            <p class="error_message"> {{$message}}</p>
                            @enderror
                        </div>
    
                        <div class="div_design">
                            <label for="period" class="inline-block text-lg mb-2"> Auction Period :</label>
                            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="period" value="{{ $auction->period }}"/>
                    
                            @error('period')
                            <p class="error_message"> {{$message}}</p>
                            @enderror
                        </div>


                        <div class="div_design">
                            <label for="image" class="inline-block text-lg mb-2"> Image :</label>
                            <input type="file" class="border border-gray-200 rounded p-2 w-full" name="image" value="{{ old('image') }}"/>
                        </div>
    
                    
                        <div class="div_design">
                            <label for="category_id" class="inline-block text-lg mb-2">Auction Category :</label>
                            <select class="border border-gray-200 rounded p-2 w-full" name="category_id" id="setting">

                                @foreach($categories as $category)
                                @if($category->name == $auction->category->name)
                                <option value="{{$category->id}}" selected>{{$category->name}}</option>

                                @else
                                <option value="{{$category->id}}">{{$category->name}}</option>

                                @endif
                                @endforeach
    
                            </select>
                    
                            @error('category_id')
                            <p class="error_message"> {{$message}}</p>
                            @enderror
                        </div>
                    
                    
                        
                        <div class="div_design">
                            @if(count($categories) != 0)
                            <button class="btn btn-primary">Update Auction </button>
    
                            @else
                            <button class="btn btn-primary" disabled>Add Auction </button>
                            <p> Sorry You need to Create a category to add an auction <a href="{{route('admin.category')}}" class="text-laravel">Create Category</a></p>
    
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>

       @include('admin.partials._script')
      
  </body>
</html>


