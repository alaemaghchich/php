<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Management | RecettesV2</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #6366f1; 
            --secondary-color: #1e293b;
            --bg-gradient: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            --glass-bg: rgba(255, 255, 255, 0.95);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--bg-gradient);
        }

        .container {
            background: var(--glass-bg);
            padding: 4rem 2rem;
            border-radius: 30px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 550px;
            width: 90%;
            border: 1px solid white;
            animation: fadeIn 1s ease-out;
        }

        h1 {
            color: var(--secondary-color);
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            font-weight: 800;
            letter-spacing: -1px;
        }

        p {
            color: #64748b;
            line-height: 1.8;
            margin-bottom: 2.5rem;
            font-size: 1.1rem;
        }

        .btn {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 18px 40px;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 15px;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 10px 15px -3px rgba(99, 102, 241, 0.4);
            text-decoration: none;
            display: inline-block;
        }

        .btn:hover {
            transform: scale(1.05);
            background: #4f46e5;
            box-shadow: 0 20px 25px -5px rgba(99, 102, 241, 0.5);
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 480px) {
            h1 { font-size: 1.8rem; }
            .container { padding: 3rem 1.5rem; }
            .btn { width: 100%; }
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Welcome to the Recipe Management application</h1>
        <p>Manage your recipes easily: add, edit, and delete.</p>        
        <a href="crud/read.php" class="btn">Explore All Recipes</a>
    </div>

</body>
</html>

        