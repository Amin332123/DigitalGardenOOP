


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Attente de validation</title>
<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #0a1d3f; /* dark blue background */
        font-family: Arial, sans-serif;
        color: #fff;
        flex-direction: column;
        text-align: center;
        margin: 0;
    }

    h1 {
        font-size: 26px;
        margin-bottom: 15px;
    }

    p {
        font-size: 18px;
        margin-bottom: 50px;
    }

    .loader {
        width: 100px;
        height: 100px;
        border: 12px solid rgba(0, 255, 0, 0.2); /* light green border */
        border-top: 12px solid #00ff00; /* bright green for animation */
        border-radius: 50%;
        animation: spin 1.5s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

</style>
</head>
<body>
<h1>Please wait a moment...</h1>
<h3>You can come back in 5 mins and log in normally</h3>
<p>Your account will be activated once the administrator approves your request.</p>
<div class="loader"></div>

</body>
</html>
