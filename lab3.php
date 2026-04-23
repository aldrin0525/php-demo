<!DOCTYPE html>
<html>
<head>
    <title>Lab 3 - ATM Machine Simulation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
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
        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 8px;
            margin: 8px 0 20px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .result {
            margin-top: 20px;
            padding: 15px;
            background-color: #e9f7e9;
            border-radius: 4px;
            color: #2c662d;
        }
    </style>
</head>
<body>
    <h2>ATM Machine Simulation</h2>
    <form method="post" action="">
        Account Name: <input type="text" name="name" required><br>
        Initial Balance: <input type="number" name="balance" step="any" required><br>
        
        Action:
        <select name="action">
            <option value="check">Check Balance</option>
            <option value="deposit">Deposit</option>
            <option value="withdraw">Withdraw</option>
        </select><br>
        
        Amount: <input type="number" name="amount" step="any"><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    class BankAccount {
        private $name;
        private $balance;

        // Constructor to initialize account
        public function __construct($name, $balance){
            $this->name = $name;
            $this->balance = $balance;
        }

        // Check balance
        public function checkBalance(){
            return "Account Holder: " . $this->name . "<br>Current Balance: $" . number_format($this->balance, 2);
        }

        // Deposit money
        public function deposit($amount){
            if($amount > 0){
                $this->balance += $amount;
                return "Successfully deposited $" . number_format($amount, 2) . ".<br>" . $this->checkBalance();
            } else {
                return "Invalid amount!";
            }
        }

        // Withdraw money
        public function withdraw($amount){
            if($amount > $this->balance){
                return "Insufficient balance!";
            } elseif($amount <= 0){
                return "Invalid amount!";
            } else {
                $this->balance -= $amount;
                return "Successfully withdrew $" . number_format($amount, 2) . ".<br>" . $this->checkBalance();
            }
        }
    }

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $balance = $_POST['balance'];
        $action = $_POST['action'];
        $amount = isset($_POST['amount']) ? $_POST['amount'] : 0;

        // Create object
        $account = new BankAccount($name, $balance);

        // Perform action
        echo "<div class='result'>";
        echo "<h3>Result:</h3>";
        switch($action){
            case 'check':
                echo $account->checkBalance();
                break;
            case 'deposit':
                echo $account->deposit($amount);
                break;
            case 'withdraw':
                echo $account->withdraw($amount);
                break;
        }
        echo "</div>";
    }
    ?>
</body>
</html>