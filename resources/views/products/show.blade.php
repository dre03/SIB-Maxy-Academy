<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <img src="{{ !empty($product->image) ? asset('/storage/products/' . $product->image) : 'https://source.unsplash.com/random/200x200' }}"
                            class="rounded" style="width: 230px"
                            alt="{{ !empty($product->image) ? 'Product Image' : 'Default Image' }}">

                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h3>{{ $product->title }}</h3>
                        <hr />
                        <p>{{ 'Rp ' . number_format($product->price, 2, ',', '.') }}</p>
                        <code>
                            <p>{!! $product->description !!}</p>
                        </code>
                        <hr />
                        <p>Stock : {{ $product->stock }}</p>
                        <a href="/products" class="btn btn-secondary btn-sm">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
