<!DOCTYPE html>
<html>
<head>
    <title>Lab 2 - Temperature Converter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        input[type="number"] {
            width: 70%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #ff6347;
            color: white;
            padding: 12px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }
        input[type="submit"]:hover {
            background-color: #e5533d;
        }
        .result {
            margin-top: 25px;
            padding: 15px;
            background-color: #fff3cd;
            border-radius: 4px;
            font-size: 18px;
            color: #856404;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Temperature Converter</h2>
    <form method="post" action="">
        Enter Celsius: <input type="number" name="celsius" step="any" required>
        <input type="submit" name="convert" value="Convert to Fahrenheit">
    </form>

    <?php
    // Function to convert Celsius to Fahrenheit
    function celsiusToFahrenheit($c){
        return ($c * 9/5) + 32;
    }

    if(isset($_POST['convert'])){
        $c = $_POST['celsius'];
        $f = celsiusToFahrenheit($c);
        echo "<div class='result'>";
        echo "<h3>Result:</h3>";
        echo "$c&deg;C = " . number_format($f, 1) . "&deg;F";
        echo "</div>";
    }
    ?>
</body>
</html>