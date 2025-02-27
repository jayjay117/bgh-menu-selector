<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $role = $_POST['role'];
    switch ($role) {
        case 'student':
            header('Location: student_form.php');
            exit();
        case 'customer':
            header('Location: customer_form.php');
            exit();
        default:
            echo "Invalid selection";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <title>Select Role</title>
    <style>
        :root {
            --primary: #4f46e5;
            --secondary: #7c3aed;
            --accent: #4338ca;
            --background: #f3f4f6;
            --text: #ffffff;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(12px);
            border-radius: 1.5rem;
            padding: 2.5rem;
            width: 90%;
            max-width: 400px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            animation: slideIn 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        @keyframes slideIn {
            from { transform: translateY(-50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        h3 {
            color: var(--text);
            margin-bottom: 1.5rem;
            font-size: 1.75rem;
            font-weight: 600;
        }

        .role-option {
            display: flex;
            align-items: center;
            padding: 1rem;
            margin: 0.75rem 0;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 0.75rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .role-option:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateX(5px);
        }

        input[type="radio"] {
            margin-right: 1rem;
            accent-color: var(--accent);
        }

        .role-option span {
            color: var(--text);
            font-size: 1rem;
        }

        button[type="submit"] {
            width: 100%;
            padding: 1rem;
            margin-top: 1.5rem;
            background: var(--accent);
            color: var(--text);
            border: none;
            border-radius: 0.75rem;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 1rem;
            font-weight: 500;
        }

        button[type="submit"]:hover {
            background: #4338ca;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        button[type="submit"]::after {
            content: ' →';
            transition: transform 0.3s ease;
        }

        button[type="submit"]:hover::after {
            display: inline-block;
            transform: translateX(4px);
        }

        @media (max-width: 480px) {
            .form-container {
                padding: 2rem;
            }

            h3 {
                font-size: 1.5rem;
            }

            .role-option {
                padding: 0.75rem;
            }
        }
    </style>
    
</head>
<body>
    <div class="form-container">
        <form method="POST">
            <h3>Select Your Category</h3>
            <label class="role-option">
                <input type="radio" name="role" value="student" required> 
                <span>Student</span>
            </label>
            <label class="role-option">
                <input type="radio" name="role" value="customer"> 
                <span>Customer</span>
            </label>
            <button type="submit">Continue</button>
        </form>
    </div>
</body>
</html>
