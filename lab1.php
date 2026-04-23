<!DOCTYPE html>
<html>
<head>
    <title>Lab 1 - My Favorite Fruits</title>
</head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
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
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin: 8px 0 15px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #008CBA;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }
        input[type="submit"]:hover {
            background-color: #007B9A;
        }
        .result {
            margin-top: 25px;
            padding: 15px;
            background-color: #e8f4fc;
            border-radius: 4px;
        }
        ul {
            line-height: 1.8;
        }
        .favorite {
            margin-top: 15px;
            font-weight: bold;
            color: #008CBA;
        }
    </style>
</head>
<body>
    <h2>My Favorite Fruits</h2>
    <form method="post" action="">
        Fruit 1: <input type="text" name="fruit[]">
        Fruit 2: <input type="text" name="fruit[]">
        Fruit 3: <input type="text" name="fruit[]">
        Fruit 4: <input type="text" name="fruit[]">
        Fruit 5: <input type="text" name="fruit[]">
        
        <input type="submit" name="submit" value="Save My Fruits">
    </form>

    <?php
    if(isset($_POST['submit'])){
        $fruits = $_POST['fruit']; // Store input in array

        echo "<div class='result'>";
        echo "<h3>Your Favorite Fruits:</h3>";
        echo "<ul>";
        foreach($fruits as $f){
            if(!empty($f)) {
                echo "<li>" . strtoupper($f) . "</li>";
            }
        }
        echo "</ul>";

        // Display first fruit
        if(!empty($fruits[0])) {
            echo "<p class='favorite'>My favorite fruit is: " . strtoupper($fruits[0]) . "</p>";
        }
        echo "</div>";
    }
    ?>
</body>
</html>
