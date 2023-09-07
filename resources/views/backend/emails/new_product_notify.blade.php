<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Hello {{ $email }}</h2>
    <p>New product available <a href="{{ route('single.product', [$product_details->id, $product_details->slug]) }}">Click Here</a></p>
</body>
</html>
