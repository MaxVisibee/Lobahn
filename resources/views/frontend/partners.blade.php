<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <h5>Partners</h5>

    <ul>
        @foreach ($partners as $partner)
            <li>
                {{ $partner->partner_name }}
                {{ $partner->description }}
                <img src="{{ '/uploads/partner_logo/' . $partner->partner_logo }}" alt="">
            </li>
        @endforeach

    </ul>

</body>

</html>
