
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Success</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #56ccf2, #2f80ed);
            color: white;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            width: 500px;
            animation: slideUp 1s ease-in-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .btn-success {
            animation: fadeIn 1.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>
</head>

<body>

    <div class="card bg-success text-white p-4">
        <h2 class="text-center mb-4">Transaction Successful</h2>
        <div class="mb-3">
            <h4>Transaction Details:</h4>
            <p><strong>Customer Name:</strong> <?php echo htmlspecialchars($transaction['customer_name']); ?></p>
            <p><strong>Item:</strong> <?php echo htmlspecialchars($transaction['item']); ?></p>
            <p><strong>Payment Method:</strong> <?php echo htmlspecialchars($transaction['payment_method']); ?></p>
            <p><strong>Amount:</strong> $<?php echo number_format($transaction['amount'], 2); ?></p>
            <p><strong>Transaction Date:</strong> <?php echo $transaction['created_at']; ?></p>
        </div>
        <a href="index.php" class="btn btn-light btn-block">Back to Transaction List</a>
    </div>

</body>
