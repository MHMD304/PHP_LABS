<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery - Upload Image</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            border: 2px solid #ccc;
            border-radius: 10px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Hide the default file input button */
        input[type="file"] {
            display: none;
        }

        /* Style the custom 'Choose file' button */
        .choose-file-btn {
            font-size: 18px;
            padding: 10px 20px;
            border: 2px solid black;
            border-radius: 5px;
            cursor: pointer;
            background-color: white;
            transition: all 0.3s ease;
        }

        .choose-file-btn:hover {
            background-color: black;
            color: white;
        }

        input[type="submit"] {
            font-size: 18px;
            padding: 10px 20px;
            border: 2px solid black;
            border-radius: 5px;
            margin: 10px 0;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: black;
            color: white;
        }

        h3 {
            font-size: 24px;
            margin-bottom: 20px;
        }

    </style>
</head>
<body>
    <div class="container">
        <form action="save.php" method="post" enctype="multipart/form-data">
            <h3>Select Recording to upload:</h3>
            <label for="fileToUpload" class="choose-file-btn">
                Choose File
            </label>
            <input type="file" name="fileToUpload" id="fileToUpload" required>
            <input type="submit" value="Upload Image" name="submit">
        </form>
    </div>
</body>
</html>
