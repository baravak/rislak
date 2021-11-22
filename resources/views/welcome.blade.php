<!DOCTYPE html>
<html dir="rtl" lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Risloo | ریسلو">
    <link rel="stylesheet" href="@staticVersion('/css/public.css')">
    <title>Risloo | ریسلو</title>
</head>

    @includeWhen(config('app.env') == 'local', 'welcome-new')
    @includeWhen(config('app.env') != 'local', 'welcome-old')

</html>