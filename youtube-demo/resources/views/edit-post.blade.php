<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Post</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-top: 5px;
            transition: border-color 0.3s ease;
        }

        input:focus,
        textarea:focus {
            border-color: #007BFF;
            outline: none;
        }

        button {
            display: inline-block;
            padding: 12px 24px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        button:hover {
            background-color: #0056b3;
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            button {
                font-size: 0.9em;
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 1.5em;
            }

            input,
            textarea {
                padding: 10px;
            }

            button {
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Edit Post</h1>
        <form action="/edit-post/{{ $post->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <input type="text" name="title" value="{{ $post->title }}" required>
            </div>
            <div class="form-group">
                <textarea name="body" rows="10" required>{{ $post->body }}</textarea>
            </div>
            <button>Save Changes</button>
        </form>
    </div>
</body>

</html>
