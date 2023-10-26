<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form say hellooo</title>
</head>

<body>
    <form action="/form" method="post">
        <label for="name">
            <input type="text" name="name">
        </label>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="submit" value="say hello">
    </form>

</body>

</html>