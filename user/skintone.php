<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Determine Your Skin Tone - Localuxe</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<header>
    <div class="header-container">
        <div class="logo">
            <h1>LOCALUXE</h1>
        </div>
        <div class="header-icons">
            <div class="search-icon" onclick="toggleSearch()">
                <img src="search.png" alt="Search">
            </div>
            <div class="search-container" id="search-container">
                <input type="text" placeholder="Search for products, brands, tutorials..." id="search-input">
                <button>Search</button>
            </div>
            <div class="cart-icon">
                <a href="cart.php"></a>
                <img src="trolli.png" alt="Cart">
            </div>
        </div>
    </div>
</header>

<!-- Navigation Bar -->
<nav class="navbar">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="makeup.php">Makeup</a></li>
        <li><a href="tutorial.php">Tuts</a></li>
        <li><a href="skintone.php">Skin Tone</a></li>
        <li><a href="purchase.php">Your Order</a></li>

    </ul>
</nav>

<div class="main-container">


    <!-- Explanation Container -->
    <div class="explanation-container">
        <!-- Skin Tone Explanation -->
        <div class="explanation-box">
            <h3>Skin Tone</h3>
            <p>Skin tone refers to the color of the surface of your skin, which is typically categorized as fair, medium, or dark. Understanding your skin tone can help you choose products and shades that suit you best.</p>
            <img src="skintones.png" alt="Skin Tone Image" class="explanation-image">
        </div>

        <!-- Under Tone Explanation -->
        <div class="explanation-box">
            <h3>Skin Undertone</h3>
            <p>Skin undertone is the subtle hue that lies beneath the surface of your skin. It is usually categorized as cool, warm, or neutral. Knowing your undertone is essential for selecting foundation and other makeup products that blend well.</p>
            <img src="undertone.webp" alt="Undertone Image" class="explanation-image">
        </div>
    </div>


    <!-- Quiz Title -->
<h2 class="quiz-title">Determine Your Skin Undertone</h2>

<!-- Quiz Container -->
<div class="quiz-container" id="quiz-container">
    <div class="quiz-question active" data-question="1">
        <p>What color do your veins appear when you look at your wrist?</p>
        <button class="quiz-answer" data-answer="blue">Blue or purple</button>
        <button class="quiz-answer" data-answer="green">Green</button>
        <button class="quiz-answer" data-answer="mix">A mix of both</button>
    </div>

    <div class="quiz-question" data-question="2">
        <p>How does your skin react to the sun?</p>
        <button class="quiz-answer" data-answer="burns">It burns easily</button>
        <button class="quiz-answer" data-answer="tans">It tans easily</button>
        <button class="quiz-answer" data-answer="mix">It burns and tans</button>
    </div>

    <div class="quiz-question" data-question="3">
        <p>Which jewelry looks better on you?</p>
        <button class="quiz-answer" data-answer="silver">Silver</button>
        <button class="quiz-answer" data-answer="gold">Gold</button>
        <button class="quiz-answer" data-answer="both">Both look good</button>
    </div>

    <div class="quiz-question" data-question="4">
        <p>What colors do you feel make your skin look more radiant?</p>
        <button class="quiz-answer" data-answer="cool">Cool colors (blues, purples)</button>
        <button class="quiz-answer" data-answer="warm">Warm colors (oranges, yellows)</button>
        <button class="quiz-answer" data-answer="both">Both look good</button>
    </div>

    <div class="quiz-question" data-question="5">
        <p>How does your skin appear when holding a piece of white paper next to it?</p>
        <button class="quiz-answer" data-answer="pink">Looks pinkish</button>
        <button class="quiz-answer" data-answer="yellow">Looks yellowish</button>
        <button class="quiz-answer" data-answer="gray">Looks grayish</button>
    </div>

    <div id="quiz-result">
        <h3>Your Skin Undertone Is:</h3>
        <p id="skin-tone-result"></p>
        <button class="reanswer-button" id="reanswer-button">Reanswer</button>
    </div>

</div>



<script>
    const answersCount = {
        blue: 0,
        green: 0,
        mix: 0,
        burns: 0,
        tans: 0,
        silver: 0,
        gold: 0,
        both: 0,
        cool: 0,
        warm: 0,
        pink: 0,
        yellow: 0,
        gray: 0
    };

    let currentQuestion = 0;

    const quizQuestions = document.querySelectorAll('.quiz-question');
    const resultContainer = document.getElementById('quiz-result');
    const skinToneResult = document.getElementById('skin-tone-result');
    const reanswerButton = document.getElementById('reanswer-button'); // Define the reanswer button

    document.querySelectorAll('.quiz-answer').forEach(button => {
        button.addEventListener('click', function() {
            // Count the answer selected
            answersCount[this.dataset.answer]++;

            // Move to the next question
            quizQuestions[currentQuestion].classList.remove('active');
            currentQuestion++;

            if (currentQuestion < quizQuestions.length) {
                quizQuestions[currentQuestion].classList.add('active');
            } else {
                displayResult();
            }
        });
    });

    function displayResult() {
        // Determine undertone based on most selected answers
        const maxAnswer = Object.keys(answersCount).reduce((a, b) => answersCount[a] > answersCount[b] ? a : b);

        // Determine undertone based on the most selected answer
        let result;
        if (['blue', 'burns', 'silver', 'cool', 'pink'].includes(maxAnswer)) {
            result = "Cool Undertone";
        } else if (['green', 'tans', 'gold', 'warm', 'yellow'].includes(maxAnswer)) {
            result = "Warm Undertone";
        } else {
            result = "Neutral Undertone";
        }

        // Display the result
        skinToneResult.textContent = result;
        resultContainer.style.display = 'block';
        reanswerButton.style.display = 'inline-block'; // Show reanswer button
    }

    // Reset the quiz when the reanswer button is clicked
    reanswerButton.addEventListener('click', function() {
        // Reset variables
        currentQuestion = 0;
        Object.keys(answersCount).forEach(key => answersCount[key] = 0);

        // Hide result and reanswer button
        resultContainer.style.display = 'none';
        reanswerButton.style.display = 'none';

        // Reset quiz questions
        quizQuestions.forEach(question => question.classList.remove('active'));
        quizQuestions[0].classList.add('active');
    });
</script>


<style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #f5f5f5;
    cursor: url('cursorr.png'), auto !important;
    
}

/* Header Section */
.header-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    background-color: white;
    position: relative; /* Keep it relative for absolute positioning */
}

.header-icons {
    display: flex; /* Ensure icons are aligned horizontally */
    align-items: center; /* Center vertically */
}


.logo h1 {
    margin: 0;
    font-size: 36px;
    color: black;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    margin-left: 15px;
}

.search-container {
    display: none; /* Hidden by default */
    position: absolute; /* Position absolutely */
    left: 50%; /* Center horizontally */
    top: 50%; /* Center vertically */
    transform: translate(-50%, -50%); /* Adjust for centering */
    z-index: 1000; /* Keep it above other elements */
}

/* Show the search bar when the class 'active' is added */
.search-container.active {
    display: flex; /* Change to flex to make it clickable */
    align-items: center; /* Center items inside */
}

/* Style for input and button */
#search-input {
    padding: 8px; /* Add padding */
    border: 1px solid #ccc; /* Add border */
    border-radius: 4px; /* Rounded corners */
    margin-right: 5px; /* Space between input and button */
}

.search-icon img {
    width: 25px;
    height: 25px;
}

.love-icon {
    margin-left: 10px; /* Adjust spacing as needed */
    cursor: pointer; /* Change cursor to pointer */
}

.love-icon img {
    width: 20px; /* Adjust the size of the love icon */
    height: 20px; /* Keep the height consistent with other icons */
}

.sign-in-icon {
    margin-left: 5px;
    position: relative; /* Required for dropdown positioning */
    cursor: pointer; /* Change cursor to pointer */
}

/* Sign In and Cart Icons */
.cart-icon {
    margin-left: 5px;
    cursor: pointer;
}

.sign-in-icon img {
    width: 40px; /* Adjust the size of the icons */
    height: 40px;
}

.dropdown-menu {
    display: none; /* Initially hidden */
    position: absolute; /* Position it below the sign-in icon */
    top: 100%; /* Align it directly under the icon */
    left: 50%; /* Center it */
    transform: translateX(-50%); /* Center alignment */
    background-color: white; /* Background color */
    border: 1px solid black; /* Border for visibility */
    border-radius: 4px; /* Rounded corners */
    z-index: 100; /* Ensure it appears above other elements */
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Optional shadow */
}

.dropdown-item {
    padding: 10px 15px; /* Add padding for items */
    cursor: pointer; /* Pointer cursor */
}

.dropdown-item:hover {
    background-color: #f0f0f0; /* Hover effect */
}

.cart-icon img {
    width: 30px;
    height: 30px;
}

/* Centering and Styling the Navigation Bar */
.navbar {
    background-color: rgba(187, 115, 73, 0.993);
    padding: 15px;
    display: flex;
    justify-content: center; /* Center the nav items */
    align-items: center; /* Vertically align the items */
}

.navbar ul {
    list-style-type: none;
    display: flex;
}

.navbar ul li {
    margin: 0 20px;
}

.navbar ul li a {
    color: black;
    text-decoration: none;
    font-size: 18px;
    padding: 8px 16px;
    font-family: 'Courier New', Courier, monospace;
}

.navbar ul li a:hover {
    background-color: antiquewhite;
    border-radius: 4px;
}

/* Center alignment for main content */
.main-container {
            max-width: 1200px;
            margin: 50px auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            background-color: tan;
        }

        /* Section for explanation */
        .explanation-container {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-top: 20px;
        }

        /* Style for each explanation box */
        .explanation-box {
            flex: 1;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 0 10px;
        }

        .explanation-box h3 {
            color: #b16c59;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .explanation-box p {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        /* Image under explanation */
        .explanation-image {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin-top: 10px;
        }

        .explanation-box:last-child .explanation-image {
    width: 300px; /* Adjust size for the second image */
}


        /* Quiz title and button styling */
        .quiz-title {
            font-size: 28px;
            color: #b16c59;
            margin-top: 40px;
        }

        /* Quiz styling */
        .quiz-container {
            width: 100%;
            max-width: 600px;
            margin-top: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .quiz-question {
            display: none;
        }

        .quiz-question.active {
            display: block;
        }

        .quiz-answer {
            display: block;
            margin: 10px auto;
            padding: 10px 20px;
            background-color: #b16c59;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            width: 80%;
        }

        .quiz-answer:hover {
            background-color: #d18b75;
        }

        #quiz-result {
            display: none;
            text-align: center;
            padding: 20px;
            border: 1px solid #28a745;
            border-radius: 10px;
            background-color: #d4edda;
            color: #155724;
            margin-top: 20px;
        }
        #quiz-result h3 {
            margin: 0;
        }
        #quiz-result p {
            font-size: 1.5em;
            font-weight: bold;
            margin: 10px 0 0;
        }

        .reanswer-button {
            margin-top: 20px;
            padding: 10px;
            background-color: #ffc107;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 16px;
            display: none; /* Hidden initially */
        }
        .reanswer-button:hover {
            background-color: #e0a800;
        }
        
/* Footer Styling */
footer {
    background-color: #f8f8f8;
    padding: 40px 20px;
    /* Make sure footer takes full width */
    width: 100%;
}

/* Main footer container using flexbox */
.footer-container {
    display: flex;
    justify-content: space-between; /* Even spacing between sections */
    flex-wrap: wrap; /* Allow wrapping on smaller screens */
    gap: 20px; /* Space between items */
    max-width: 1200px; /* Ensure container has a max width */
    margin: 0 auto; /* Center the footer */
}

/* Individual sections take up equal space */
.footer-section {
    flex: 1;
    min-width: 200px; /* Ensure minimum width for smaller screens */
}



</style>

</body>
</html>
