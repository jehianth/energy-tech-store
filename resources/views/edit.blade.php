<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <title>Edit Product - Energy Tech Store</title>
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">
        <!-- Add icon library -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <nav class="navbar">
            <div class="container">
                <a class="navbar-brand" href="/product">
                    <img src="assets/logo.png" alt="" width="151" height="60">
                </a>
            </div>
        </nav>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            <h3>
                                Edit Product
                                <a href="/product" class="btn btn-secondary float-end">Back</a>
                            </h3>
                        </div>
                        <div class="card-body">
                            <form action="/update/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $data->name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="photo" class="form-label">Product Photo</label>
                                    <input type="file" class="form-control" name="photo" id="photo">
                                </div>
                                <div class="mb-3">
                                    <label for="type" class="form-label">Product Type</label>
                                    <select class="form-control" name="type" id="type" aria-label="Default select example">
                                        <option value="" disabled selected>{{ $data->type }}</option>
                                        <option value="GPU">GPU</option>
                                        <option value="Monitor">Monitor</option>
                                        <option value="Processor">Processor</option>
                                        <option value="Motherboard">Motherboard</option>
                                        <option value="RAM">RAM</option>
                                        <option value="HDD">HDD</option>
                                        <option value="SSD">SSD</option>
                                        <option value="Casing">Casing</option>
                                        <option value="GPU">GPU</option>
                                        <option value="PSU">PSU</option>
                                        <option value="Keyboard">Keyboard</option>
                                        <option value="Mouse">Mouse</option>
                                        <option value="Headset">Headset</option>
                                        <option value="Cooler">Cooler</option>
                                        <option value="Monitor">Monitor</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="entrydate" class="form-label">Entry Date</label>
                                    <input type="date" class="form-control" name="entrydate" id="entrydate" value="{{ $data->entrydate }}">
                                </div>
                                <div class="mb-3">
                                    <label for="stock" class="form-label">Stock</label>
                                    <input type="number" class="form-control" name="stock" id="stock" value="{{ $data->stock }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        -->
    </body>
</html>
