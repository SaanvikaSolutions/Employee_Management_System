<?php
session_start(); // Start the session
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VarnaaLoginpage-Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #e8f5fe;
            margin: 0;
        }

        .VarnaaLoginpageMain {
            display: flex;
            flex-wrap: wrap;
            max-width: 1200px;
            width: 100%;
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .VarnaaPageLeftSection {
            flex: 1;
            position: relative;
            background: url('./IMG/loginimg.jpeg') no-repeat center;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .VarnaaPageLeftSection h1 {
            position: absolute;
            top: 5px;
            left: 20px;
            color: #aeacac;
            font-size: 2.5rem;
            font-weight: bold;
        }

        .VarnaaPageLeftSection p {
            position: absolute;
            bottom: 20px;
            left: 20px;
            font-size: 1.2rem;
            line-height: 1.6;
            color: #ffffff;
            margin: 0;
        }

        .VarnaaPageRightSection {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .VarnaaPageRightSection h2 {
            font-size: 2.5rem;
            color: #0078d7;
            margin-bottom: 50px;
            text-align: center;
        }

        .VarnaaFormGroup {
            margin-bottom: 20px;
        }

        .VarnaaFormGroup label {
            display: block;
            font-size: 1rem;
            margin-bottom: 5px;
            color: #555;
        }

        .VarnaaFormGroup input {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .VarnaaSubmitButton {
            background-color: #0078d7;
            color: white;
            padding: 10px;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        .VarnaaSubmitButton:hover {
            background-color: #005bb5;
        }

        @media (max-width: 768px) {
            .VarnaaLoginpageMain {
                flex-direction: column;
                max-width: 90%;
            }

            .VarnaaPageLeftSection {
                height: 300px;
            }
        }

        @media (max-width: 480px) {
            .VarnaaPageLeftSection h1 {
                font-size: 1.5rem;
            }

            .VarnaaPageLeftSection p {
                font-size: 0.9rem;
            }

            .VarnaaSubmitButton {
                font-size: 0.8rem;
                padding: 6px;
            }
        }
    </style>

</head>

<body>
    <div class="VarnaaLoginpageMain">
        <div class="VarnaaPageLeftSection">
            <h1>VARNAA GROUP</h1>
            <p>A place where we pour our heart and soul into crafting designs that bring your dreams to life.</p>
        </div>
        <div class="VarnaaPageRightSection">
            <h2>Welcome</h2>
            <form onsubmit="return validateForm()" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="VarnaaFormGroup">
                    <label for="empid">Employee ID</label>
                    <input type="text" id="empid" name="empid" placeholder="Enter your Employee ID" required>
                </div>
                <div class="VarnaaFormGroup">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <button class="VarnaaSubmitButton" type="submit">Login</button>
            </form>
            <?php
        

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $empid = $_POST['empid'] ?? null;
            $password = $_POST['password'] ?? null;

            if ($empid && $password) {
                // Database connection
                include('./backend/includes/dbconnect.php');

                try {
                    // Fetch employee data (password and role)
                    $stmt = $conn->prepare("SELECT password, employee_type FROM employees WHERE employee_id = ?");
                    $stmt->bind_param("s", $empid);
                    $stmt->execute();
                    $stmt->store_result();

                    if ($stmt->num_rows > 0) {
                        $stmt->bind_result($db_password, $role);
                        $stmt->fetch();

                        // Verify password
                        if ($password === $db_password) { // Replace with password_verify() if using hashed passwords
                            if ($role === 'Admin') {
                                // Set session variables
                                $_SESSION['employee_id'] = $empid;
                                $_SESSION['role'] = $role;

                                echo "<script>alert('Login successful! Welcome, Admin.');window.location.href='CreateEmployee.php';</script>";
                                exit();
                            } else {
                                echo "<p style='color: red;'>Access Denied: Only admins can access this page.</p>";
                            }
                        } else {
                            echo "<p style='color: red;'>Incorrect password.</p>";
                        }
                    } else {
                        echo "<p style='color: red;'>Employee ID not found.</p>";
                    }

                    $stmt->close();
                } catch (Exception $e) {
                    echo "<p style='color: red;'>Error: " . $e->getMessage() . "</p>";
                }
                $conn->close();
            } else {
                echo "<p style='color: red;'>Please fill out all fields.</p>";
            }
        }
        ?>

        </div>
    </div>

    <script>
        function validateForm() {
            const empid = document.getElementById("empid");
            const password = document.getElementById("password");

            if (!empid.value || !password.value) {
                alert("Please fill out all fields.");
                return false;
            }
            return true;
        }
    </script>
</body>


</html>