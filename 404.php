<?php
// Set the API endpoint for programming jokes
$apiUrl = 'https://v2.jokeapi.dev/joke/Dark?blacklistFlags=nsfw,sexist&type=single';

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, false);

// Execute the cURL request
$response = curl_exec($ch);

// Close the cURL session
curl_close($ch);

// Decode the JSON response
$joke = json_decode($response, true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <style>
        /* General reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            text-align: center;
        }

        .error-box {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 40px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
        }

        .error-box h1 {
            font-size: 6rem;
            color: #ff6347;
            margin-bottom: 20px;
        }

        .error-box p {
            font-size: 1.2rem;
            color: #333;
            margin-bottom: 30px;
        }

        .joke {
            background-color: #f0f8ff;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 30px;
        }

        .joke-text {
            font-size: 1.5rem;
            color: #333;
            font-weight: bold;
            font-style: italic;
        }

        .home-link {
            display: inline-block;
            padding: 10px 20px;
            background-color: #ff6347;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1rem;
        }

        .home-link:hover {
            background-color: #ff4500;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="error-box">
        <h1>Oops! 404</h1>
        <p>Sorry, the page you are looking for does not exist. Now enjoy this...</p>
        <div class="joke">
            <?php
            // Display the joke
            if (isset($joke['joke'])) {
                echo "<p class='joke-text'>{$joke['joke']}</p>";
            } else {
                echo "<p class='joke-text'>Sorry, couldn't fetch a joke at the moment.</p>";
            }
            ?>
        </div>
        <a href="/ims" class="home-link">Go Back Home</a>
    </div>
</div>
</body>
</html>
