<!DOCTYPE html>
<html lang="en">
  <head>
     <!-- partial:partials/_css -->
     @include('admin.partials._css')
    
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar -->
      @include('admin.partials._sidebar')


      <!-- partial:partials/_navbar -->
      @include('admin.partials._navbar')


       <!-- partial:partials/_body -->
       @include('admin.partials._body')


       @include('admin.partials._script')
      
  </body>
</html>