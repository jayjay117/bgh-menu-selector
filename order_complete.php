<?php
session_start();

// Check if the user has completed the previous steps
if (!isset($_SESSION['user_data']) || !isset($_POST['foods'])) {
    header("Location: student_form.php");
    exit();
}

$matric = isset($_SESSION['user_data']['matric']) ? htmlspecialchars($_SESSION['user_data']['matric']) : null;
$selectedFoods = isset($_POST['foods']) ? array_map('htmlspecialchars', $_POST['foods']) : [];

// Clear the session data after use
unset($_SESSION['user_data']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Complete</title>
    <style>
        :root {
            --primary: #4f46e5;
            --secondary: #7c3aed;
            --accent: #4338ca;
            --background: #f3f4f6;
            --text: #1f2937;
            --success: #10b981;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text);
        }

        .container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 1.5rem;
            padding: 2.5rem;
            width: 90%;
            max-width: 400px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            color: var(--success);
            margin-bottom: 1.5rem;
            font-size: 1.75rem;
            font-weight: 600;
        }

        p {
            margin-bottom: 1rem;
            line-height: 1.5;
        }

        .food-list {
            background-color: var(--background);
            border-radius: 0.5rem;
            padding: 1rem;
            margin-top: 1rem;
            text-align: left;
        }

        .food-item {
            margin-bottom: 0.5rem;
        }

        .back-link {
            display: inline-block;
            margin-top: 1.5rem;
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .container {
                padding: 2rem;
            }

            h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Order Completed Successfully!</h2>
        <p>Thank you for your order. Here are the details:</p>
        <?php if ($matric): ?>
            <p><strong>Matric Number:</strong> <?= $matric ?></p>
        <?php endif; ?>
        <div class="food-list">
            <strong>Selected Items:</strong>
            <?php if (!empty($selectedFoods)): ?>
                <ul>
                    <?php foreach ($selectedFoods as $food): ?>
                        <li class="food-item"><?= $food ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>No items selected</p>
            <?php endif; ?>
        </div>
        <a href="role_selection.php" class="back-link">Place Another Order</a>
    </div>
</body>
</html>
