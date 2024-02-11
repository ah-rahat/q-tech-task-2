<x-app-layout>

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URL Shortener</title>
    <!-- Add your styles here -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f7f7f7;
        }
        h1 {
            color: #333;
        }
        form {
            margin-top: 20px;
        }
        label {
            font-weight: bold;
            color: #333;
        }
        input[type="url"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }
        button.shorten-button {
            background-color: #1e90ff; /* Blue color for the Shorten button */
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px; /* Add margin to separate buttons */
        }
        button.gray {
            background-color: gray;
            color: white; /* Add white text color for better visibility on the gray button */
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px; /* Add margin to separate buttons */
        }
        button.gray:hover {
            background-color: darkgray; /* Darken the gray button on hover for visual feedback */
        }
        button.shorten-button:hover {
            background-color: #45a049; /* Darken the Shorten button on hover for visual feedback */
        }
        p {
            margin-top: 15px;
            color: #333;
        }
        a {
            color: #1e90ff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }

        .alert {
            margin: 20px 0;
            padding: 15px;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        .alert-success {
            background-color: #dff0d8;
            border-color: #d6e9c6;
            color: #3c763d;
        }
        .alert-danger {
            background-color: #f2dede;
            border-color: #ebccd1;
            color: #a94442;
        }
    </style>
</head>
<body>
    <h1>URL Shortener</h1>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('shorten') }}" method="post">
        @csrf
        <label for="original_url">Enter URL:</label>
        <input type="url" name="original_url">
        <button type="submit" class="shorten-button">Shorten URLs</button>
        
    </form>
    <button type="button" class="gray" onclick="location.href='{{ route('count_click') }}'">View Clicks</button>
    @isset($originalUrl)
    <p>Original URL: {{ $originalUrl }}</p>
    @endisset
    @isset($shortUrl)
    <p>Short URL: <a href="{{ $shortUrl }}" target="_blank">{{ $shortUrl }}</a></p>
    @endisset
</body>
</html>


</x-app-layout>
