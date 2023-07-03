<!DOCTYPE html>
<html lang="en">
  <head>
     <!-- partial:partials/_css -->
     @include('admin.partials._css')

     <style type="text/css">
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
                
                <table class="center">
                    <tr class="th_color">
                        <td>Auction Title</td>
                        <td>Action</td>
                        <td>Action</td>
                    </tr>

                    
                    @foreach ($auctions as $auction)
                    <tr>
                        <td><h4><a class="" href="{{ route('admin.index-item', $auction->id) }}">{{$auction->title}}</a></h4></td>

                        <td>
                            <a class="btn btn-success" href="{{ route('admin.edit-auction', $auction->id) }}">Edit Auction</a>
                        </td>

                        <td>
                            <form action="{{ route('admin.destroy-auction', $auction->id) }}" method="POST">
                                @csrf
                                <!-- use method directive to change method to 'DELETE' because browsers don't always understand DELETE methods when used directly with forms -->
                                @method('DELETE') 
                                <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete Auction</button>
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