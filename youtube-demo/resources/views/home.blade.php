<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }

        .container:hover {
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.2);
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
            font-size: 1.8em;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            transition: border-color 0.3s;
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

        .post {
            background-color: #f9f9f9;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            border: 1px solid #ddd;
            transition: transform 0.3s ease;
        }

        .post:hover {
            transform: translateY(-5px);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .post h3 {
            margin: 0 0 10px;
            font-size: 1.4em;
        }

        .post p {
            margin-bottom: 15px;
        }

        .post a {
            text-decoration: none;
            color: #007BFF;
        }

        .post a:hover {
            text-decoration: underline;
        }

        .auth-container {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }

        .auth-container>div {
            flex: 1;
        }

        @media (max-width: 768px) {
            .auth-container {
                flex-direction: column;
            }

            .container {
                padding: 15px;
            }

            button {
                font-size: 0.9em;
            }
        }

        @media (max-width: 480px) {
            h2 {
                font-size: 1.5em;
            }

            .post h3 {
                font-size: 1.2em;
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

    @auth
        <div class="container">
            <p>Congrats, you are logged in.</p>
            <form action="/logout" method="POST">
                @csrf
                <button>Log out</button>
            </form>
        </div>

        <div class="container">
            <h2>Create a New Post</h2>
            <form action="/create-post" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" name="title" placeholder="Post title" required>
                </div>
                <div class="form-group">
                    <textarea name="body" placeholder="Body content..." required></textarea>
                </div>
                <button>Save Post</button>
            </form>
        </div>

        <div class="container">
            <h2>All Posts</h2>
            @foreach ($posts as $post)
                <div class="post">
                    <h3>{{ $post['title'] }} by {{ $post->user->name }}</h3>
                    <p>{{ $post['body'] }}</p>
                    <p><a href="/edit-post/{{ $post->id }}">Edit</a></p>
                    <form action="/delete-post/{{ $post->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
    @else
        <div class="container auth-container">
            <div>
                <h2>Register</h2>
                <form action="/register" method="POST">
                    @csrf
                    <div class="form-group">
                        <input name="name" type="text" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <input name="email" type="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input name="password" type="password" placeholder="Password" required>
                    </div>
                    <button>Register</button>
                </form>
            </div>
            <div>
                <h2>Login</h2>
                <form action="/login" method="POST">
                    @csrf
                    <div class="form-group">
                        <input name="loginname" type="text" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <input name="loginpassword" type="password" placeholder="Password" required>
                    </div>
                    <button>Log in</button>
                </form>
            </div>
        </div>
    @endauth

</body>

</html>
