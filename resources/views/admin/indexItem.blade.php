<!DOCTYPE html>
<html lang="en">
  <head>
     <!-- partial:partials/_css -->
     @include('admin.partials._css')

     <style type="text/css">

            .div_center{
                text-align: center;
                padding-top: 40px;
            }

            .h2_font{
                font-size: 25px;
                padding-bottom: 40px;
            }

            .input_color{
                color: black;
            }

            .error_message{
                color: red;
            }

            .center{
                margin: auto;
                width: 50%;
                text-align: center;
                margin-top: 30px;
                border: 3px solid #330e5c;
            }

            .th_color{
                background: grey;
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
                    <div>
                        <h2 class="h2_font">{{$auction->title}}'s Lot Items</h2>
                    </div>

                    <div>
                        <a class="btn btn-primary" href="{{ route('admin.create-item', $auction->id) }}">Add Item</a>
                    </div>
                </div>


                
                <table class="center">
                    <tr class="th_color">
                        <td>Artist Name</td>
                        <td>Action</td>
                        <td>Action</td>
                    </tr>

                    {{-- use the relationship method inside of the auction model to get all the items --}}
                    @foreach ($auction->items as $item)
                    <tr>
                        <td>{{$item->artist}}</td>

                        <td>
                            <a class="btn btn-success" href="{{ route('admin.edit-item', $item->id) }}">Edit Item</a>
                        </td>

                        <td>
                            <form action="{{ route('admin.destroy-item', $item->id) }}" method="POST">
                                @csrf
                                <!-- use method directive to change method to 'DELETE' because browsers don't always understand DELETE methods when used directly with forms -->
                                @method('DELETE') 
                                <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete Item</button>
                            </form>
                        </td>
                    </tr>

                    @endforeach

                </table>




            </div>
        </div>

       @include('admin.partials._script')
      
  </body>
</html>