<!DOCTYPE html>
<html>
<head>
    <title>Create Notice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        .notice-form {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 50%;
            max-width: 600px;
            margin: 0 auto;
        }

        .form-label {
            display: block;
            margin-bottom: 5px;
        }

        .form-input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }

        .submit-button {
            background-color: #051424;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
            padding: 15px 30px;
            font-size: 18px;
            display: block;
            margin: 20px auto 0;
        }

        .submit-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    @include('navbar')

    <h1>Create New Notice</h1>

    <form class="notice-form" action="{{ route('admin.notices.store') }}" method="POST">
        @csrf
        <label class="form-label" for="title">Title:</label>
        <input class="form-input" type="text" id="title" name="title">

        <label class="form-label" for="description">Description:</label>
        <textarea class="form-input" id="description" name="description"></textarea>

        <label class="form-label" for="release_date">Release Date:</label>
        <input class="form-input" type="date" id="release_date" name="release_date">

        <button class="submit-button" type="submit">Create Notice</button>
    </form>
</body>
</html>
