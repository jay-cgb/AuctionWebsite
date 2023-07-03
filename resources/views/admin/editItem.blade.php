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

            .field_visibility
            {
                display: none;
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
                    <h1 class="font_size">Edit Lot Item</h1>

                    <form action="{{ route('admin.update-item', $item->id) }}" method="POST" enctype="multipart/form-data" >
                        <!-- cross site request forgeries -->
                        @csrf

                        @method('PUT')
                        <div class="div_design">
                            <label for="artist" class="inline-block text-lg mb-2"> Artist Name :</label>
                            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="artist" value="{{ $item->artist }}"/>
                    
                            @error('artist')
                            <p class="error_message"> {{$message}}</p>
                            @enderror
                        </div>
    
                        <div class="div_design">
                            <label for="year_produced" class="inline-block text-lg mb-2"> Year Produced :</label>
                            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="year_produced" value="{{ $item->year_produced }}"/>
                    
                            @error('year_produced')
                            <p class="error_message"> {{$message}}</p>
                            @enderror
                        </div>
    
                        <div class="div_design">
                            <label for="subject_classification" class="inline-block text-lg mb-2"> Subject Classification :</label>
                            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="subject_classification" value="{{ $item->subject_classification }}"/>
                    
                            @error('subject_classification')
                            <p class="error_message"> {{$message}}</p>
                            @enderror
                        </div>


                        <div class="div_design">
                            <label for="date" class="inline-block text-lg mb-2"> Auction Date :</label>
                            <input type="date" class="border border-gray-200 rounded p-2 w-full" name="date" value="{{ $item->date }}"/>
                    
                            @error('date')
                            <p class="error_message"> {{$message}}</p>
                            @enderror
                        </div>


                        <div class="div_design">
                            <label for="estimated_price" class="inline-block text-lg mb-2"> Estimated Price :</label>
                            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="estimated_price" value="{{ $item->estimated_price }}"/>
                    
                            @error('estimated_price')
                            <p class="error_message"> {{$message}}</p>
                            @enderror
                        </div>
    
                    
                     
                        <div class="div_design">
                            <label for="description_summary" class="inline-block text-lg mb-2"> Short Description :</label>
                            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="description_summary" value="{{ $item->description_summary }}"/>
                    
                            @error('description_summary')
                            <p class="error_message"> {{$message}}</p>
                            @enderror
                        </div>


                        <div class="div_design">
                            <label for="description" class="inline-block text-lg mb-2"> Description :</label>
                            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="description" value="{{ $item->description }}"/>
                    
                            @error('description')
                            <p class="error_message"> {{$message}}</p>
                            @enderror
                        </div>



                        <div class="div_design">
                            <label for="image" class="inline-block text-lg mb-2"> Image :</label>
                            <input type="file" class="border border-gray-200 rounded p-2 w-full" name="image" value="{{ $item->image }}"/>
                        </div>



                        
                        <div class="div_design">
                            <label for="category_id" class="inline-block text-lg mb-2">Item Category :</label>
                            <select class="border border-gray-200 rounded p-2 w-full" name="category_id" id="category" onchange="hideOrShowFields()">

                                <option value="" selected>--Select a category--</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{$category->name}}</option>
                                @endforeach
                            </select>
                    
                            @error('category_id')
                            <p class="error_message"> {{$message}}</p>
                            @enderror
                        </div>



                        <!-- optional fields starts here -->
                        <div class="div_design">
                            <label for="medium" class="field_visibility medium" > Medium :</label>
                            <input type="text" class=" field_visibility medium border border-gray-200 rounded p-2 w-full" name="medium" value="{{ $item->medium }}"/>
                    
                            @error('medium')
                            <p class="error_message"> {{$message}}</p>
                            @enderror
                        </div>


                        <div class="div_design">
                            <label for="" class="field_visibility is_framed" id="is_framed"> Framed :</label>

                            <input type="radio" class="field_visibility is_framed" name="is_framed" id="yes" value="{{ $item->is_framed }}" />
                            <label class="field_visibility is_framed" for="yes">
                              YES
                            </label>

                            <input type="radio" class="field_visibility is_framed" name="is_framed" id="no" value="{{ $item->is_framed }}" />
                            <label class="field_visibility is_framed" for="no">
                              NO
                            </label>
                        
                    
                            @error('is_framed')
                            <p class="error_message"> {{$message}}</p>
                            @enderror
                        </div>



                        <div class="div_design">
                            <label for="dimension" class="field_visibility dimension"> Dimension of the piece :</label>
                            <input type="text" class="field_visibility dimension border-gray-200 rounded p-2 w-full" name="dimension" value="{{ $item->dimension }}"/>
                    
                            @error('dimension')
                            <p class="error_message"> {{$message}}</p>
                            @enderror
                        </div>



                        <div class="div_design">
                            <label for="image_type" class="field_visibility image_type"> Image Type :</label>
                            <input type="text" class="field_visibility image_type border-gray-200 rounded p-2 w-full" name="image_type" value="{{ $item->image_type }}"/>
                    
                            @error('image_type')
                            <p class="error_message"> {{$message}}</p>
                            @enderror
                        </div>



                        <div class="div_design">
                            <label for="material_used" class="field_visibility material_used"> Material Used :</label>
                            <input type="text" class="field_visibility material_used border-gray-200 rounded p-2 w-full" name="material_used" value="{{ $item->material_used }}"/>
                    
                            @error('material_used')
                            <p class="error_message"> {{$message}}</p>
                            @enderror
                        </div>



                        <div class="div_design">
                            <label for="weight" class="field_visibility weight"> Weight of the piece :</label>
                            <input type="text" class="field_visibility weight border-gray-200 rounded p-2 w-full" name="weight" value="{{ $item->weight }}"/>
                    
                            @error('weight')
                            <p class="error_message"> {{$message}}</p>
                            @enderror
                        </div>
                        <!-- optional fields ends here -->
                    
                    
                        
                        <div class="div_design">
                            <button class="btn btn-primary">Update Item </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

       @include('admin.partials._script')
      
  </body>
</html>


