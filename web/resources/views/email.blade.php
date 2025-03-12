<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Completed</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        .email-container {
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .email {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            max-width: 600px;
            border-radius: 8px;
            color: rgb(131, 131, 131);
        }

        .email-header h1 {
            text-align: center;
            background-color: #4CAF50;
            color: #f0f0f0;
            padding: 10px 0px;
            margin: 0px;
            border-top-right-radius: 8px;
            border-top-left-radius: 8px;
        }

        .email-content {
            text-align: center;
            padding: 0px 20px;


        }


        .email-content h2 {
            color: #4CAF50;
            margin: 6px 0px;


        }

        .email-content p {
            margin: 10px 0px;

        }

        .email-content .para {
            margin-bottom: 40px;
        }

        .email-footer {
            text-align: center;
            background-color: rgb(238, 235, 235);
            border-bottom-right-radius: 8px;
            border-bottom-left-radius: 8px;
            margin: 40px 0 0px 0;
            padding: 10px 0px;
            line-height: 5px;
        }

        .email-button {
            padding: 15px 20px;
            background-color: #4CAF50;
            color: #f0f0f0;
            text-decoration: none;
            border-radius: 4px;
            margin: 30px 0px;
            text-align: center;
        }

        .email-button:hover {
            background-color: #45a049;
        }

        .email-footer a {
            color: #4CAF50;
            text-decoration: none;
            display: inline-block;
        }

        .email-footer a:hover {
            text-decoration: underline
        }

        @media only screen and (max-width: 640px) {
            .email-container {
                margin: 5px auto;
                max-width: 500px;
            }

            .email-header h1 {
                font-size: 18px;
                padding: 10px 0px;
            }

            .email-content {
                text-align: center;
                padding: 0px 10px;
            }

            .email-footer {
                padding: 10px 10px;
                line-height: 22px;
            }

            .email-footer a {
                margin-top: 16px;
            }
        }

        @media only screen and (max-width: 300px) {
            .email-container {
                margin: 5px;
                max-width: 400px;
            }

            .email-footer {
                padding: 10px 5px;
                line-height: 22px;
            }

            .email-footer a {
                margin-top: 5px;
            }


        }
    </style>
</head>
{{-- {{ dd($order) }} --}}

<body>
    <div class="email-container">
        <div class="email">
            <!-- Header -->
            <div class="email-header">
                <h1>Order Completed</h1>
            </div>

            <!-- Content -->
            <div class="email-content">
                <img src="https://img.icons8.com/color/96/000000/checked--v1.png" alt="Order Completed Icon">
                <h2>Your Order Has Been Completed!</h2>
                <p>Hi <strong>{{ $order['customer']['first_name'] }} {{ $order['customer']['last_name'] }}</strong>,
                    order
                    <strong>{{ $order['name'] }}</strong>
                </p>
                <p class="para"> Thank you for shopping with us! Your order has been successfully processed and
                    completed.
                    We hope you
                    enjoy your purchase.</p>
                <div>
                    <a href=" {{ route('order', $order['id']) }}" class="email-button">View Order Details</a>

                </div>
            </div>

            <!-- Footer -->
            <div class="email-footer">
                <p>If you have any questions, feel free to <a href="#">contact our support
                        team</a>.</p>
                <p class="copy">&copy; 2023 Your Company. All rights reserved.</p>

            </div>
        </div>
    </div>
</body>

</html>
