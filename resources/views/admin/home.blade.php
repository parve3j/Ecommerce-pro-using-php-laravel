<!DOCTYPE html>
<html lang="en">
<head>
@include('admin.head')
</head>  <body>
    <div class="container-scroller">
     @include('admin.sidebar')
       @include('admin.nav')
       @include('admin.main')
      </div>
    </div>
    @include('admin.script')
  </body>
</html>