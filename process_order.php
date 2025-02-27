<?php
session_start();

// Validate and sanitize input
function sanitizeInput($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['role']) && $_POST['role'] === 'student') {
        $age = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT);
        $diet = sanitizeInput($_POST['diet'] ?? '');
        $matric = sanitizeInput($_POST['matric'] ?? '');

        // Check if age is within the allowed range
        if ($age === false || $age < 15 || $age > 18) {
            $message = "We're sorry, but meal options for this age are not available.";
        } else {
            // Age is within range, proceed with normal flow
            $_SESSION['user_data'] = [
                'age' => $age,
                'diet' => $diet,
                'matric' => $matric
            ];

            $vegetarianOptions = ['Rice', 'Pasta', 'Beans', 'Potato', 'Bread'];
            $regularOptions = ['Rice', 'Pasta', 'Egg', 'Beans', 'Milk', 'Nigerian soups', 'Potato', 'Bread', 'Hot dog'];
            
            $foodOptions = ($diet === 'vegetarian' || $diet === 'vegan') ? $vegetarianOptions : $regularOptions;
        }
    } elseif (isset($_POST['role']) && $_POST['role'] === 'customer') {
        $diet = sanitizeInput($_POST['diet'] ?? '');

        $_SESSION['user_data'] = [
            'diet' => $diet
        ];

        $vegetarianOptions = ['Rice', 'Pasta', 'Beans', 'Potato', 'Bread'];
        $regularOptions = ['Rice', 'Pasta', 'Egg', 'Beans', 'Milk', 'Nigerian soups', 'Potato', 'Bread', 'Hot dog'];
        
        $foodOptions = ($diet === 'vegetarian' || $diet === 'vegan') ? $vegetarianOptions : $regularOptions;
    }
} else {
    // Redirect if accessed directly without POST data
    header("Location: role_selection.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Selection</title>
    <style>
        :root {
            --primary: #4f46e5;
            --secondary: #7c3aed;
            --accent: #4338ca;
            --background: #f3f4f6;
            --text: #1f2937;
            --info: #60a5fa;
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
        }

        h2 {
            color: var(--primary);
            margin-bottom: 1.5rem;
            font-size: 1.75rem;
            font-weight: 600;
            text-align: center;
        }

        .food-option {
            margin: 1rem 0;
        }

        .food-option label {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .food-option input[type="checkbox"] {
            margin-right: 0.5rem;
        }

        button[type="submit"] {
            background: var(--accent);
            color: white;
            padding: 1rem;
            width: 100%;
            border: none;
            border-radius: 0.75rem;
            margin-top: 1.5rem;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        button:hover {
            background: #4338ca;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .message {
            background-color: var(--info);
            color: white;
            padding: 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
            text-align: center;
        }

        .back-link {
            display: inline-block;
            margin-top: 1rem;
            color: var(--primary);
            text-decoration: none;
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
        <?php if (isset($message)): ?>
            <div class="message">
                <p><?= $message ?></p>
                <a href="javascript:history.back()" class="back-link">Go Back</a>
            </div>
        <?php else: ?>
            <h2>Available Food Options</h2>
            <form method="POST" action="order_complete.php">
                <?php foreach ($foodOptions as $food): ?>
                    <div class="food-option">
                        <label>
                            <input type="checkbox" name="foods[]" value="<?= htmlspecialchars($food) ?>">
                            <?= htmlspecialchars($food) ?>
                        </label>
                    </div>
                <?php endforeach; ?>
                <button type="submit">Complete Order</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
