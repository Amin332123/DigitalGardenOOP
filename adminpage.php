<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Card List Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #0b1c2d;
            min-height: 100vh;
        }

        /* ===== Header ===== */
        header {
            width: 100%;
            background-color: #081726;
            padding: 15px 40px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        header form {
            margin: 0;
        }

        .btn-logout {
            padding: 8px 16px;
            border: none;
            border-radius: 6px;
            background-color: #1f2937;
            color: #ffffff;
            font-size: 14px;
            cursor: pointer;
        }

        .btn-logout:hover {
            background-color: #374151;
        }

        /* ===== Full Page Section ===== */
        .page-section {
            min-height: calc(100vh - 60px);
            padding: 40px;
            display: flex;
            justify-content: center;
        }

        .card-list {
            width: 100%;
            max-width: 900px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .card {
            background-color: #122b45;
            padding: 20px 25px;
            border-radius: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-content {
            color: #ffffff;
            max-width: 70%;
        }

        .card-content h3 {
            margin-bottom: 8px;
            font-size: 18px;
        }

        .card-content p {
            font-size: 14px;
            color: #cfd8e3;
        }

        .card-actions {
            display: flex;
            gap: 10px;
        }

        .card-actions form {
            margin: 0;
        }

        .btn {
            padding: 8px 14px;
            border: none;
            border-radius: 6px;
            font-size: 13px;
            cursor: pointer;
        }

        .btn-block {
            background-color: #b91c1c;
            color: #ffffff;
        }

        .btn-block:hover {
            background-color: #991b1b;
        }

        .btn-validate {
            background-color: #15803d;
            color: #ffffff;
        }

        .btn-validate:hover {
            background-color: #166534;
        }
    </style>
</head>
<body>

<!-- Header -->
<header>
    <form method="post" action="">
        <button type="submit" name="logout" class="btn-logout">
            Logout
        </button>
    </form>
</header>

<!-- Main Section -->
<section class="page-section">
    <div class="card-list">

        <div class="card">
            <div class="card-content">
                <h3>User Request #1</h3>
                <p>This is a long card description or user information.</p>
            </div>

            <div class="card-actions">
                <form method="post">
                    <button class="btn btn-block" type="submit">Block</button>
                </form>

                <form method="post">
                    <button class="btn btn-validate" type="submit">Validate</button>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-content">
                <h3>User Request #2</h3>
                <p>Another card with actions on the right side.</p>
            </div>

            <div class="card-actions">
                <form method="post">
                    <button class="btn btn-block" type="submit">Block</button>
                </form>

                <form method="post">
                    <button class="btn btn-validate" type="submit">Validate</button>
                </form>
            </div>
        </div>

    </div>
</section>

</body>
</html>
