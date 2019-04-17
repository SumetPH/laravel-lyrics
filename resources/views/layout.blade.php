<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layout</title>
    <link rel="stylesheet" href="/css/app.css">
    <link href="/css/quill.snow.css" rel="stylesheet">
    <script src="/js/app.js"></script>
    <script src="/js/quill.js"></script>
    <style>
        .lyrics p {
            margin: 0;
        }
    </style>
</head>

<body>
    @yield('content')
    <footer class="m-5"></footer>

    <script type="text/javascript">
        function submitDelete(id) { 
            if(confirm('Would you like to delete it ?')){
                $(`#${id}`).submit();
            }
        }
    </script>
</body>

</html>