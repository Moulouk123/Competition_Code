<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .article {
            margin-bottom: 30px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .description {
            font-style: italic;
            margin-bottom: 15px;
        }
        .content {
            line-height: 1.6;
        }
    </style>
</head>
<body>

    <div class="article">
        <div class="title">{{ $article->title }}</div>
        <div class="description">{{ $article->description }}</div>
        <div class="content">{!! $article->contenu !!}</div>
    </div>

</body>
</html>
