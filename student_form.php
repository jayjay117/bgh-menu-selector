<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>
    <style>
        :root {
            --primary: #4f46e5;
            --secondary: #7c3aed;
            --accent: #4338ca;
            --background: #f3f4f6;
            --text: #1f2937;
            --input-bg: #ffffff;
            --input-border: #d1d5db;
            --input-focus: #818cf8;
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

        .form-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 1.5rem;
            padding: 2.5rem;
            width: 90%;
            max-width: 400px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            animation: scaleUp 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        @keyframes scaleUp {
            from { transform: scale(0.8); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }

        h2 {
            color: var(--primary);
            margin-bottom: 1.5rem;
            font-size: 1.75rem;
            font-weight: 600;
            text-align: center;
        }

        input, select {
            width: 100%;
            padding: 0.75rem 1rem;
            margin: 0.75rem 0;
            border: 2px solid var(--input-border);
            border-radius: 0.75rem;
            background-color: var(--input-bg);
            color: var(--text);
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        input:focus, select:focus {
            border-color: var(--input-focus);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
            outline: none;
        }

        input::placeholder, select::placeholder {
            color: #9ca3af;
        }

        select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%236b7280'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1em;
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

        button:active {
            transform: translateY(0);
        }

        @media (max-width: 480px) {
            .form-container {
                padding: 2rem;
            }

            h2 {
                font-size: 1.5rem;
            }

            input, select, button {
                font-size: 0.875rem;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <form method="POST" action="process_order.php">
            <h2>Student Details</h2>
            <input type="text" name="matric" placeholder="Matric Number" required>
            <input type="number" name="age" placeholder="Age" required>
            <input type="number" name="weight" placeholder="Weight (kg)" required>
            <select name="diet" required>
                <option value="">Select Diet</option>
                <option value="vegetarian">Vegetarian</option>
                <option value="vegan">Vegan</option>
                <option value="regular">Regular</option>
            </select>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>

