<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.head')
    <style type="text/css" >
        .div_center
        {
            text-align: center;
            padding-top: 40px;
            font-size: 32px;
        }
        .input_color{
            color: black;
        }
        .center{
            margin: auto;
            width: 50%;
            font-size: 22px;
            margin-top: 30px;
            border: 3px solid white;

        }
    </style>
</head>
  <body>
    <div class="container-scroller">
     @include('admin.sidebar')
     @include('admin.nav')
       <div class="container-fluid page-body-wrapper">
        <div class="div_center" >
            @if (session()->has('message'))
            <div class="alert alert-success" >
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >x</button>
                {{session()->get('message')}}
            </div>
            @endif

                <h1>Add Category</h1>
                    <form action="{{url('add_category')}}" method="POST">
                        @csrf
                        <input class="input_color" type="text" name="name" placeholder="Category Name?">
                        <input class="btn btn-primary" type="submit" name="submit" value="Add Category" >
                    </form>
            
                    <table class="center" >
                        <tr>
                            <td> Name</td>
                            <td>Action</td>
                        </tr>
                        @foreach ($categories as $categorie)
                        <tr>
                            <td>{{$categorie->category_name}}</td>
                            <td>
                                <a onclick="return confirm('sure?')" class="btn btn-danger" href="{{url('delete_category',$categorie->id)}}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                   
                    </table>
        </div>
       </div>

      
    </div>
    @include('admin.script')
  </body>
</html>