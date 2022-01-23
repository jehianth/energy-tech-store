<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <title>Datalist - Energy Tech Store</title>
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">
        <!-- Add icon library -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body style="overflow: hidden">
        <div id="page-container">
            <div id="content-wrap">
                <nav class="navbar mt-3">
                    <div class="container">
                        <a class="navbar-brand" href="/product">
                            <img src="assets/logo.png" alt="" width="251" height="100">
                        </a>
                    </div>
                </nav>
                <div class="container">
                    <div class="row g-3 align-items-center" style="float: left">
                        <div class="col-auto">
                            <form action="/product" method="GET">
                                <input type="search" id="search" class="form-control" aria-describedby="" name="search" placeholder="Search Product..." >
                            </form>
                        </div>
                    </div>
                    <a href="/add" class="btn btn-success" style="float: right">Add Product <i class="fa fa-plus"></i> </a>
                    <a href="/exportpdf" class="btn btn-danger" style="float: right;margin-right: 15px;border:2.5px solid;border-color:rgb(100, 0, 0)">Export PDF <i class="fa fa-floppy-o"></i> </a>
                </div>
                <div class="container table-responsive mt-5">
                    <div class="row">
                        {{--@if ($message = Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            {{ $message }}
                        </div>
                        @endif--}}
                        <table class="table table-bordered table-hover">
                            <thead class="table-light">
                                <tr>
                                <th scope="col">No</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Product Photo</th>
                                <th scope="col">Product Type</th>
                                <th scope="col">Entry Date</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data as $key => $row)
                                <tr>
                                    {{--<th scope="row">{{ $key+$data->firstItem() }}</th>--}}
                                    <td style="font-weight:bold ">{{ $data->firstItem()+$key }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>
                                        <img src="{{ asset('productphoto/'.$row->photo) }}" alt="image" style="height: 80px;">
                                    </td>
                                    <td>{{ $row->type }}</td>
                                    <td>{{ $row->entrydate }}</td>
                                    <td>{{ $row->stock }}</td>
                                    <td>
                                        <a href="/edit/{{ $row->id }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                        <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}" data-name="{{ $row->name }}"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div>
                            <div style="float: left">
                                Showing
                                {{ $data->firstItem() }}
                                to
                                {{ $data->lastItem() }}
                                of
                                {{ $data->total() }}
                                entries
                            </div>
                            <div style="float: right">
                                {{ $data->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer id="footer" class="bg-dark text-center text-lg-start">
                <!-- Copyright -->
                <div class="text-center p-3 text-light">
                    © 2022 Copyright :
                    <a class="text-light" href="/product">Energy Tech Store</a>
                </div>
                <!-- Copyright -->
            </footer>
        </div>


        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        -->
    </body>
    <script>
        //pake jquery
        $('.delete').click( function(){
            var productid = $(this).attr('data-id')
            var productname = $(this).attr('data-name')
            swal({
                title: "Are you sure?",
                text: "You will delete product data "+productname+"!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/delete/"+productid+""
                    swal("Poof! Your product data has been deleted!", {
                    icon: "success",
                    });
                } else {
                    swal("Your product data is safe!");
                }
            });
        });
    </script>

    <script>
        @if (Session::has('success'))
            // Set a success toast, with a title
            toastr.success("{{ Session::get('success') }}")
        @endif

    </script>
</html>
