<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @can('IsAdministrator')
    <p>Hanya Dapat Dilihat Oleh Administrator</p>
    @endcan

    @can('IsAdmin')
    <p>Hanya Dapat Dilihat Oleh Admin</p>
    @endcan

    @can('IsUserBiasa')
    <p>Hanya Dapat Dilihat Oleh User Biasa</p>
    @endcan


</body>
</html>