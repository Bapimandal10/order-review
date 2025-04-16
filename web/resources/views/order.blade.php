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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <style>
        .error-message {
            color: red;
            font-size: 14px;
            position: absolute;
            right: 35px;
            margin-top: 50px;
            display: none;
        }

        .star-rating {
            display: inline-flex;
            gap: 5px;
        }

        .star-rating input[type="radio"] {
            display: none;
        }

        .star-rating label {
            font-size: 30px;
            color: #d3d3d3;
            cursor: pointer;
            transition: color 0.2s;
        }

        .star-rating input[type="radio"]:checked~label {
            color: #FFD700;
        }

        .star-rating label:hover,
        .star-rating label:hover~label {
            color: #FFD700;
        }

        .row-reverse {
            flex-direction: row-reverse;
        }

        .review-container {
            display: flex;
            justify-content: space-between;
            width: 100%;
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 50px;
            gap: 30px;
            box-sizing: border-box;
        }

        .review-container h2,
        .review-container h3 {
            font-family: 'Montserrat', sans-serif;
            font-size: 20px;
            font-weight: bold;
            /* color: #333; */
            margin-bottom: 5px;
        }

        .review-container h3 {
            margin-top: 0px;
            padding-bottom: 10px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            margin-bottom: 0;
        }

        .star-rating-container h3 {
            border: none;
        }

        /* Order Summary Styles */
        .order-summary {
            width: 60%;
            /* background-color: #fff; */
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
            /* background-color: #fff; */
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
            /* background-color: #4CAF50; */
            /* color: #f0f0f0; */
            font-weight: 600;
        }

        .cart-table td {
            /* color: #666; */
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
            /* color: #333; */
        }

        /* Star Rating Styles */
        .star-rating-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: -18px;
        }

        .star-rating {
            display: flex;
            gap: 6px;
            /* cursor: pointer; */
            margin-bottom: 10px;
        }

        .star-rating .star {
            font-size: 30px;
            /* color: #d3d3d3; */
        }

        .star-rating .star.selected,
        .star-rating .star:hover {
            /* color: #ff9800; */
        }

        /* Review Form Styling */
        .review-form textarea {
            width: 100%;
            padding: 12px;
            border-radius: 5px;
            border: 1px solid #ccc;
            height: 120px;
            font-size: 14px;
            /* color: #333; */
            resize: none;
            margin: 20px 0px;
            outline: none;
        }

        .review-form button {
            /* background-color: #4CAF50;
            color: #f0f0f0; */
            font-weight: 600;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        .review-form button:hover {
            /* background-color: #45a049; */
        }


        /* Container styling */
        .order-not-found {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px;
            /* background-color: #fff; */
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
            /* color: #333; */
            font-weight: bold;
            margin-bottom: 15px;
        }

        /* Paragraph styling */
        .order-not-found p {
            font-size: 1rem;
            /* color: #666; */
            line-height: 1.5;
            margin-bottom: 20px;
        }

        /* Button styling */
        .order-not-found .btn {
            padding: 10px 20px;
            font-size: 1rem;
            /* background-color: #4CAF50;
            color: white; */
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        }

        /* Button hover effect */
        .order-not-found .btn:hover {
            /* background-color: #45a049; */
        }

        /* Container for the entire "Already Reviewed" section */
        .reviewed-container {
            text-align: center;
            /* Center the content */
            /* background-color: #f9f9f9; */
            /* Light background for contrast */
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
            /* color: #333; */
            /* Dark color for the heading */
            margin-bottom: 10px;
        }

        /* Text description below the message */
        .reviewed-text {
            font-size: 16px;
            /* color: #666; */
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
            .review-container {
                gap: 30px;
                padding: 0 20px;
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

            .star-rating-container {
                align-items: center;
            }
        }

        @media(max-width: 480px) {
            .review-container {
                flex-direction: column;
                align-items: start;
            }
        }

        @media (max-width: 720px) {
            .review-container {
                flex-direction: column;
                align-items: start;
            }
        }
    </style>
</head>

<body>
    <?php $order_data = json_decode($order->order_data, 1); ?>
    <div class="review-container">
        <?php if ($order_data): ?>
        <div class="order-summary">
            <h3>Order Summary</h3>
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order_data['line_items'] as $item)
                        <tr>
                            <td class="product-description">
                                {{ $item['title'] }}
                            </td>
                            <td>
                                <p>{{ $item['quantity'] }}</p>
                            </td>
                            <td class="product-price">
                                {{ $item['price_set']['shop_money']['currency_code'] }}&nbsp;<?php echo number_format($item['quantity'] * $item['price'], 2); ?>
                            </td>
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
                            <td class="cost-value">
                                {{ $item['price_set']['shop_money']['currency_code'] }}&nbsp;<?php echo number_format($order_data['subtotal_price'], 2); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="cost-item">Tax </td> <!-- Since it's just one tax amount -->
                            <td class="cost-value">
                                {{ $item['price_set']['shop_money']['currency_code'] }}&nbsp;<?php echo number_format($order_data['total_tax'], 2); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="cost-item">Shipping</td>
                            <td class="cost-value">
                                {{ $order_data['total_shipping_price_set']['shop_money']['amount'] ?? 'free' }}
                            </td>
                        </tr>
                        <tr>
                            <td class="cost-item" style="font-weight: 700; ">Total</td>
                            <td class="cost-value" style="font-weight: 700; ">
                                {{ $item['price_set']['shop_money']['currency_code'] }}&nbsp;<?php echo number_format($order_data['total_price'], 2); ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Review Section -->
        <div class="review-section">
            <h3>Order Review</h3>
            <?php if ($order->reviews->count() > 0 ): ?>
            <div class="reviewed-star-rating">
                <div style="padding-bottom:15px;">
                    <div class="star-rating-container">
                        <h3 style="font-size: 18px;">Avg:</h3>
                        <div class="star-rating" id="star-rating" style="display: inline-block;">
                            @for ($i = 1; $i <= 5; $i++)
                                @php
                                    $avg = $order->reviews->avg('rating');
                                    $full = floor($avg); // integer part
                                    $decimal = $avg - $full; // decimal part
                                @endphp

                                @if ($i <= $full)
                                    <span class="star" style="color: yellow;">&#9733;</span>
                                @elseif ($i == $full + 1 && $decimal > 0)
                                    <span class="star"
                                        style="position: relative; display: inline-block; color: #d3d3d3;">
                                        <span
                                            style="position: absolute; width: {{ $decimal * 100 }}%; overflow: hidden; color: yellow;">&#9733;</span>
                                        &#9733;
                                    </span>
                                @else
                                    <span class="star" style="color: #d3d3d3;">&#9733;</span>
                                @endif
                            @endfor
                        </div>

                    </div>
                </div>
            </div>
            <div class="reviewed-container">
                <div class="reviewed-icon">
                    <img src="{{ asset('images/review-image.png') }}" alt="Order review image">
                </div>
                <div class="reviewed-star-rating">
                    @foreach ($order->reviews as $review)
                        @if (!empty($review->review_type->title))
                            <div style="padding-bottom:15px;">
                                <div class="star-rating-container">
                                    <h3 style="font-size: 18px;">{{ $review->review_type->title }}</h3>
                                    <div class="star-rating" id="star-rating-{{ $review->rating }}">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($review->rating >= $i)
                                                <span class="star" data-value="{{ $i <= $review->rating }}"
                                                    style="color: yellow;">&#9733;</span>
                                            @else
                                                <span class="star" data-value="{{ $i }}"
                                                    style="color: #d3d3d3;">&#9733;</span>
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <label for="feedback" class="cost-item" style="padding-top: 27px;">Feedback:</label>
                <p style="margin-top: 0px;">{{ $order->review }}</p>
                <p class="reviewed-text" style="padding-top: 10px">You have already reviewed. Thank you for your
                    feedback!</p>
            </div>
            <?php else: ?>
            <p>Leave your feedback about the products you've purchased.</p>
            <!-- Review form -->
            <form class="review-form" id="reviewForm" method="POST" action="{{ route('review.submit') }}">
                @csrf
                <input type="hidden" name="order_id" value="{{ $order_data['id'] }}">
                @foreach ($review_types as $type)
                    <div style="padding-bottom:15px;" class="review-group" data-type-id="{{ $type->id }}">
                        <div class="star-rating-container">
                            <p style="font-size: 18px;">{{ $type->title }}</p>
                            <div class="star-rating row-reverse" id="star-rating">
                                @for ($i = 5; $i >= 1; $i--)
                                    <input type="radio" name="rating[{{ $type->id }}]"
                                        id="star{{ $i }}-{{ $type->id }}"
                                        value="{{ $i }}" />
                                    <label for="star{{ $i }}-{{ $type->id }}">&#9733;</label>
                                @endfor
                            </div>
                            <div class="error-message" style="display:none;">Please select rating before submit.</div>
                        </div>
                    </div>
                @endforeach
                <textarea name="comment" placeholder="Write your review..."></textarea>
                <button type="submit" style="border: 2px solid #dfdfdf;">Submit Review</button>
            </form>
            <?php endif; ?>
        </div>
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

    <?php if ($order): ?>
    <!-- Ensure the order exists -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Continue with the review form logic if the user has not reviewed
            const reviewForm = document.getElementById('reviewForm');

            @foreach ($review_types as $type)
                const stars{{ $type->title }} = document.querySelectorAll(
                    '#star-rating-{{ $type->title }} .star');
                const hiddenInput{{ $type->title }} = document.getElementById('rating-{{ $type->title }}');
                const errorMessage{{ $type->title }} = document.querySelector(
                    '.error-message-{{ $type->title }}'); // Target error message container for this review type

                // Initialize the stars based on the value in the hidden input
                const rating{{ $type->title }} = hiddenInput{{ $type->title }} ? hiddenInput{{ $type->title }}
                    .value : 0;
                updateStars{{ $type->title }}(rating{{ $type->title }});

                stars{{ $type->title }}.forEach(star => {
                    star.addEventListener('mouseover', function() {
                        let value = star.getAttribute('data-value');
                        // Highlight the stars up to and including the hovered one
                        updateStars{{ $type->title }}(value);
                    });

                    star.addEventListener('mouseout', function() {
                        let selectedValue = hiddenInput{{ $type->title }} ?
                            hiddenInput{{ $type->title }}.value : 0;
                        // Reset to the selected rating if the mouse is out
                        updateStars{{ $type->title }}(selectedValue);
                    });

                    star.addEventListener('click', function() {
                        let value = star.getAttribute('data-value');
                        if (hiddenInput{{ $type->title }}) {
                            hiddenInput{{ $type->title }}.value =
                                value; // Update hidden input with the rating
                        }
                        updateStars{{ $type->title }}(value); // Update stars visually
                    });
                });

                function updateStars{{ $type->title }}(value) {
                    stars{{ $type->title }}.forEach(star => {
                        if (parseInt(star.getAttribute('data-value')) <= value) {
                            star.style.color = 'gold'; // Highlight the star
                        } else {
                            star.style.color = 'gray'; // Reset the star to gray
                        }
                    });
                }
            @endforeach
        });

        $(document).ready(function() {
            $('#reviewForm').on('submit', function(e) {
                e.preventDefault();
                let formIsValid = true;
                // Validate all rating groups 
                document.querySelectorAll('.review-group').forEach(group => {
                    const typeId = group.getAttribute('data-type-id');
                    const checked = group.querySelector(`input[name="rating[${typeId}]"]:checked`);
                    const errorDiv = group.querySelector('.error-message');

                    if (!checked) {
                        errorDiv.style.display = 'block';
                        formIsValid = false;
                    } else {
                        errorDiv.style.display = 'none';
                    }
                });

                // If not valid, stop here
                if (!formIsValid) return;
                var formData = $(this).serialize();
                $.ajax({
                    url: $(this).attr('action'),
                    method: $(this).attr('method'),
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            window.location.href = document.referrer; // Optionally redirect
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('An error occurred: ' + error);
                    }
                });
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
