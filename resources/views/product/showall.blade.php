<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container py-3">
        <div class="row">
            <div class="col-md-12">
                <h5>Show Product</h5>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Harga Jual</th>
                            <th>Harga Beli</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($products as $item)
                            <tr>

                                <td>{{ $i++ }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ $item->harga_jual }}</td>
                                <td>{{ $item->harga_beli }}</td>
                                <td>
                                    <a href="" class="btn btn-primary">Edit</a>
                                    <a href="" class="btn btn-primary">Hapus</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
