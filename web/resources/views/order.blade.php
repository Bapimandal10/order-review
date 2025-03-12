</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Summary with Reviews</title>

    <!-- Google Fonts: Poppins and Montserrat -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@300;400;500;600&display=swap"
        rel="stylesheet">

    <style>
        /* General Styles */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: space-between;
            width: 100%;
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 50px;
            gap: 30px;
            box-sizing: border-box;
        }

        h2,
        h3 {
            font-family: 'Montserrat', sans-serif;
            font-size: 20px;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        h3 {
            color: #4CAF50;
            margin-top: 0px;
        }

        /* Order Summary Styles */
        .order-summary {
            width: 60%;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            box-sizing: border-box;
            margin-bottom: auto;

        }

        /* Review Section Styles */
        .review-section {
            width: 40%;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            box-sizing: border-box;
            margin-bottom: auto;


        }

        .order-summary .cart-table {
            margin-top: 25px;
        }

        .cost-summary {
            margin-top: 25px;
        }

        .cart-table,
        .cost-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
            margin-top: 10px;

        }

        .cost-table tr {
            display: flex;
            justify-content: space-between;
        }

        .cart-table th,
        .cart-table td,
        .cost-table tr {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #e0e0e0;
        }

        .cart-table th {
            background-color: #4CAF50;
            color: #f0f0f0;
            font-weight: 600;
        }

        .cart-table td {
            color: #666;
        }

        .product-image img {
            max-width: 60px;
            border-radius: 8px;
        }

        .cost-item {
            font-weight: 600;
        }

        .cost-value {
            font-weight: 500;
            text-align: right;
            color: #333;
        }

        /* Star Rating Styles */
        .star-rating-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: -15px;
        }

        .star-rating {
            display: flex;
            gap: 6px;
            cursor: pointer;
        }

        .star-rating .star {
            font-size: 30px;
            color: #d3d3d3;
        }

        .star-rating .star.selected,
        .star-rating .star:hover {
            color: #ff9800;
        }

        /* Review Form Styling */
        .review-form textarea {
            width: 100%;
            padding: 12px;
            border-radius: 5px;
            border: 1px solid #ccc;
            height: 120px;
            font-size: 14px;
            color: #333;
            resize: none;
            margin: 20px 0px;
            outline: none;
        }

        .review-form button {
            background-color: #4CAF50;
            color: #f0f0f0;
            font-weight: 600;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        .review-form button:hover {
            background-color: #45a049;
        }


        /* Container styling */
        .order-not-found {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
            text-align: center;
        }

        /* Icon styling */
        .order-not-found .icon {
            margin-bottom: 20px;
        }

        .order-not-found .icon img {
            width: 100px;
            height: 100px;
        }

        /* Heading styling */
        .order-not-found h3 {
            font-size: 1.8rem;
            color: #333;
            font-weight: bold;
            margin-bottom: 15px;
        }

        /* Paragraph styling */
        .order-not-found p {
            font-size: 1rem;
            color: #666;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        /* Button styling */
        .order-not-found .btn {
            padding: 10px 20px;
            font-size: 1rem;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        }

        /* Button hover effect */
        .order-not-found .btn:hover {
            background-color: #45a049;
        }

        /* Container for the entire "Already Reviewed" section */
        .reviewed-container {
            text-align: center;
            /* Center the content */
            background-color: #f9f9f9;
            /* Light background for contrast */
            padding: 20px;
            border-radius: 10px;
            margin-top: 25px;
        }

        /* Icon for the order */
        .reviewed-icon img {
            width: 80px;
            /* Adjust the size of the icon */
            height: 80px;
            margin-bottom: 15px;
        }

        /* Container for the star rating */
        .reviewed-star-rating {
            font-size: 35px;
            /* Adjust the size of the stars */
            margin-bottom: 20px;
            /* Space below the stars */
        }

        /* Styling for the filled stars (yellow color) */
        .reviewed-star.filled {
            color: #FFD700;
            /* Yellow color for filled stars */
        }

        /* Message styles */
        .reviewed-message {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            /* Dark color for the heading */
            margin-bottom: 10px;
        }

        /* Text description below the message */
        .reviewed-text {
            font-size: 16px;
            color: #666;
            /* Light gray text for the description */
            line-height: 1.6;
            /* Adjust line spacing for readability */
        }


        /* Responsive design */
        @media (max-width: 768px) {
            .order-not-found {
                padding: 20px;
            }

            .order-not-found h3 {
                font-size: 1.5rem;
            }

            .order-not-found p {
                font-size: 0.9rem;
            }
        }

        /* Responsive Design */
        @media (max-width: 967px) {
            .container {
                flex-direction: column;
                gap: 30px;
            }

            .order-summary,
            .review-section {
                width: 100%;
            }

            .cart-table th,
            .cart-table td {
                font-size: 14px;
            }

            .cost-table td {
                font-size: 14px;
            }

            .product-image img {
                max-width: 50px;
            }

            .review-form button {
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .review-form textarea {
                height: 100px;
            }

            .cart-table th,
            .cart-table td {
                font-size: 12px;
            }
        }
    </style>
</head>

<body>

    <?php
    
    // Example data (This could be retrieved from a database or session)
    $order_data = json_decode($order->order_data, 1);
    $review_types = ['Seller', 'Product', 'Delivery', 'Process'];
    // $order = false;
    // dd($order_data);
    ?>

    <div class="container">
        <?php if ($order): ?>
        <!-- Order Summary Section -->
        <div class="order-summary">
            <h3>Order Summary</h3>
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Name</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order_data['line_items'] as $item)
                        <tr>
                            <td class="product-image">
                                {{-- <img src="{{ $item['image_link'] }}" alt="{{ $item['name'] }}"> --}}
                            </td>
                            <td class="product-description">
                                {{ $item['title'] }}
                                <p><?php echo 'Quantity ' . $item['quantity']; ?></p>
                            </td>
                            <td class="product-price">₹<?php echo number_format($item['quantity'] * $item['price'], 2); ?></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="cost-summary">
                <h3>Cost Summary</h3>
                <table class="cost-table">
                    <tbody>
                        <tr>
                            <td class="cost-item">Subtotal · <?php echo count($order_data['line_items']); ?> items</td>
                            <td class="cost-value">₹<?php echo number_format($order_data['subtotal_price'], 2); ?></td>
                        </tr>

                        <tr>
                            <td class="cost-item">Tax </td> <!-- Since it's just one tax amount -->
                            <td class="cost-value">₹<?php echo number_format($order_data['total_tax'], 2); ?></td>
                        </tr>

                        <tr>
                            <td class="cost-item">Shipping</td>
                            <td class="cost-value">
                                {{ $order_data['total_shipping_price_set']['shop_money']['amount'] ?? 'free' }}</td>
                        </tr>
                        <tr>
                            <td class="cost-item" style="font-weight: 700; color: #333;">Total</td>
                            <td class="cost-value" style="font-weight: 700; color: #333;">₹<?php echo number_format($order_data['total_price'], 2); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Check if user has reviewed the products -->
        <?php
        // Simulate checking if the user has reviewed. In practice, this could be done by checking the database.
        $user_has_reviewed = false;
        ?>

        <!-- Review Section -->
        <div class="review-section">
            <h3>Order Review</h3>
            <?php if ($order_data && $user_has_reviewed): ?>

            <div class="reviewed-container">
                <div class="reviewed-icon">
                    <img src="https://img.icons8.com/color/96/000000/box--v1.png" alt="Order Icon">
                </div>

                <!-- Star Rating Display (Top 5 yellow stars) -->
                <div class="reviewed-star-rating">
                    <?php
                    // Dynamically set the rating, here it's set to 5 stars
                    $rating = 5;
                    for ($i = 1; $i <= 5; $i++) {
                        echo '<span class="reviewed-star filled">&#9733;</span>'; // Display filled (yellow) stars
                    }
                    ?>
                </div>

                <h3 class="reviewed-message">Already Reviewed</h3>
                <p class="reviewed-text">You have already reviewed this order. Thank you for your feedback!</p>
            </div>

            <?php else: ?>
            <p>Leave your feedback about the products you've purchased.</p>

            <!-- Review form -->
            <form class="review-form" id="reviewForm" method="POST" action="{{ route('review.submit') }}">
                <input type="hidden" name="order_id" value="{{ $order_data['id'] }}">
                <!-- Customer Review -->
                @foreach ($review_types as $type)
                    <div style="padding-bottom:15px;">
                        <div class="star-rating-container">
                            <p>{{ $type }}</p>
                            <div class="star-rating" id="star-rating-{{ $type }}">
                                @for ($i = 1; $i <= 5; $i++)
                                    <span class="star" data-value="{{ $i }}">&#9733;</span>
                                @endfor
                            </div>
                        </div>

                        <!-- Hidden Input to store rating -->
                        <input type="hidden" name="rating[{{ $type }}]" id="rating-{{ $type }}"
                            value="0">

                        <!-- Error message container for each type -->
                        <div class="error-message-{{ $type }}"
                            style="color: red; display: none; font-size:12px;"></div>
                    </div>
                @endforeach

                <!-- Review Comment -->
                <textarea name="comment" placeholder="Write your review..." required></textarea>

                <!-- Submit Button -->
                <button type="submit">Submit Review</button>
            </form>
            <?php endif; ?>
        </div>

        <?php else: ?>
        <!-- If the order is not completed, display a message -->
        <div class="order-not-found">
            <div class="icon">
                <img src="https://img.icons8.com/color/96/000000/box--v1.png" alt="Order Icon">
            </div>
            <h3>Order Not Found</h3>
            <p>Sorry, the order is not completed yet or it doesn't exist. Please check your order status.</p>
        </div>
        <?php endif; ?>
    </div>


    <?php if ($order): ?>
    <!-- Ensure the order exists -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Check if the user has already reviewed
            const userHasReviewed = <?php echo json_encode($user_has_reviewed); ?>; // Assuming `user_has_reviewed` is a boolean value

            // If the user has already reviewed, stop further script execution
            if (userHasReviewed) {
                return; // Do nothing, stop running the rest of the review script
            }

            // Continue with the review form logic if the user has not reviewed
            const reviewForm = document.getElementById('reviewForm');

            @foreach ($review_types as $type)
                const stars{{ $type }} = document.querySelectorAll(
                    '#star-rating-{{ $type }} .star');
                const hiddenInput{{ $type }} = document.getElementById('rating-{{ $type }}');
                const errorMessage{{ $type }} = document.querySelector(
                    '.error-message-{{ $type }}'); // Target error message container for this review type

                // Initialize the stars based on the value in the hidden input
                const rating{{ $type }} = hiddenInput{{ $type }} ? hiddenInput{{ $type }}
                    .value : 0;
                updateStars{{ $type }}(rating{{ $type }});

                stars{{ $type }}.forEach(star => {
                    star.addEventListener('mouseover', function() {
                        let value = star.getAttribute('data-value');
                        // Highlight the stars up to and including the hovered one
                        updateStars{{ $type }}(value);
                    });

                    star.addEventListener('mouseout', function() {
                        let selectedValue = hiddenInput{{ $type }} ?
                            hiddenInput{{ $type }}.value : 0;
                        // Reset to the selected rating if the mouse is out
                        updateStars{{ $type }}(selectedValue);
                    });

                    star.addEventListener('click', function() {
                        let value = star.getAttribute('data-value');
                        if (hiddenInput{{ $type }}) {
                            hiddenInput{{ $type }}.value =
                                value; // Update hidden input with the rating
                        }
                        updateStars{{ $type }}(value); // Update stars visually
                    });
                });

                function updateStars{{ $type }}(value) {
                    stars{{ $type }}.forEach(star => {
                        if (parseInt(star.getAttribute('data-value')) <= value) {
                            star.style.color = 'gold'; // Highlight the star
                        } else {
                            star.style.color = 'gray'; // Reset the star to gray
                        }
                    });
                }
            @endforeach

            // Form validation on submit
            reviewForm.addEventListener('submit', function(event) {
                let formIsValid = true;

                @foreach ($review_types as $type)
                    // Check if any rating is not selected (value is still 0)
                    if (hiddenInput{{ $type }}.value === '0') {
                        formIsValid = false;
                        errorMessage{{ $type }}.style.display =
                            'block'; // Show the error message for this specific type
                        errorMessage{{ $type }}.innerHTML = 'Please fill {{ $type }}.';
                    } else {
                        errorMessage{{ $type }}.style.display =
                            'none'; // Hide the error message if rating is selected
                    }
                @endforeach

                // If the form is not valid, prevent submission
                if (!formIsValid) {
                    event.preventDefault(); // Prevent form submission
                }
            });
        });
    </script>
    <?php else: ?>
    <script>
        // Order is not found, so we don't run the review script
        console.log("Order not found or incomplete.");
    </script>
    <?php endif; ?>


</body>

</html>
