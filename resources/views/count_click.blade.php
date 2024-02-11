<x-app-layout>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URL Click Counts</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        h1 {
            color: #333;
            text-align: center;
            margin: 20px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
            position: sticky;
            top: 0;
            z-index: 1;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        a {
            color: #1e90ff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h1>URL Click Counts</h1>
    <h1><a href="{{ route('dashboard') }}">Go to Dashboard</a></h1>
    
    <table>
        <thead>
            <tr>
                <th>Short URL</th>
                <th>Original URL</th>
                <th>Click Count</th>
                <th>User Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($urlShorteners as $urlShortener)
                <tr>
                    <td><a href="{{ route('redirect', ['shortCode' => $urlShortener->short_code]) }}" target="_blank">{{ route('redirect', ['shortCode' => $urlShortener->short_code]) }}</a></td>
                    <td>{{ $urlShortener->original_url }}</td>
                    <td>{{ $urlShortener->click_count }}</td>
                    <td>{{ $urlShortener->user->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
</x-app-layout>