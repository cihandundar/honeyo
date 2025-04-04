<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ getSiteTitle() }}</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <style>
        .full-height,
        body,
        html {
            height: 100vh
        }

        body,
        html {
            background-color: #fff;
            color: #636b6f;
            font-family: Raleway, sans-serif;
            font-weight: 100;
            margin: 0
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center
        }

        .position-ref {
            position: relative
        }

        .content {
            text-align: center
        }

        .title {
            font-size: 36px;
            padding: 20px
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title"> {!! setting('bakim-modu-icerigi') !!} </div>
        </div>
    </div>
</body>

</html>
