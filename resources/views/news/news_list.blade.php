<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('/css/news_list.css') }}">
</head>
<body>
    <table>
        <tr>
          <th>Title</th>
          <th>Content</th>
          <th>Author</th>
        </tr>
        @foreach($news as $new)
        <tr>
          <td>{{ $new['title'] }}</td>
          <td>{{ $new['content'] }}</td>
          <td>{{ $new['author'] }}</td>
        </tr>
        @endforeach
      </table>
</body>
</html>