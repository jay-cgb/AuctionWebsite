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
        
                    <h1 class="font_size">Add Category</h1>

                    <form action="{{ route('admin.store-category') }}" method='POST'>
                        <!-- cross site request forgeries -->
                        @csrf

                        <label for="title" class="inline-block text-lg mb-2"> Category Name :</label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name" value="{{ old('name') }}" placeholder="Enter category name"/>
            
                        @error('name')
                        <p class="error_message"> {{$message}}</p>
                        @enderror
                        
                        <button class="btn btn-primary">Add Category</button>
                    </form>
                </div>
            </div>
        </div>

       @include('admin.partials._script')
      
  </body>
</html>


