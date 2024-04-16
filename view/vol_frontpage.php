<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" summary="width=device-width, initial-scale=1.0">
    <title>Blog Main Page</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #1e4620;
            margin: 0;
            padding: 20px;
            color: white;
        }
        h1 {
            text-align: center;
            font-size: 36px;
            color: white;
            margin-bottom: 50px; /* Space for navbar */
        }
        .navbar-placeholder {
            height: 60px; /* Placeholder for navbar height */
        }
        .article {
            position: relative; /* Allows absolute positioning of children */
            margin-bottom: 40px;
            padding: 20px;
            background-color: white;
            color: #333;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: box-shadow 0.3s ease, transform 0.3s ease; /* Smooth transition for hover effect */
        }
        .article:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }
        .article-title {
            font-size: 24px;
            color: #1e4620;
            margin-bottom: 15px;
            transition: color 0.3s ease; /* Smooth transition for hover effect */
        }
        .article-title:hover {
            color: #3c8f47;
        }
        .article-summary, .article-author {
            font-size: 16px;
            line-height: 1.6;
        }
        .button, .add-article-btn, #searchForm button, #sortForm button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #2a6b30;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .button:hover, .add-article-btn:hover, #searchForm button:hover, #sortForm button:hover {
            background-color: #3c8f47;
        }
        .add-article-btn {
            display: block;
            width: 200px;
            margin: 40px auto; /* Center button */
        }
        form {
            margin-bottom: 20px;
        }
        input[type="text"], select {
            padding: 10px;
            margin-right: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            box-sizing: border-box; /* Makes sure padding doesn't affect overall width */
        }
        .article-actions {
            position: absolute;
            right: 20px;
            bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="navbar-placeholder"></div>
    <h1>vols</h1>
<!-- Search form -->
    <form id="searchForm">
        <input type="text" id="searchBox" placeholder="Search vols by  id...">
        <button type="button" onclick="filterArticles()">Search</button>
    </form>
<!-- Sorting form -->
    <form id="sortForm">
        <select id="sortOptions" onchange="sortArticles()">
            <option value="mostRecent">Most recent vols</option>
            <option value="leastRecent">Least recent vols</option>
            <option value="alphabetically">Alphabetically</option>
        </select>
        <button type="button" onclick="sortArticles()">Sort</button>
    </form>

<?php
require_once '../Controller/volC.php';

$blogController = new volC();
$sortOption = isset($_GET['sort']) ? $_GET['sort'] : 'mostRecent';
$posts = $blogController->listVol($sortOption); 

if (!empty($posts)) {
    foreach ($posts as $post) {
        echo '<div class="article">';
        echo '<h2 class="article-title"><a href="vol_details.php?id=:' . htmlspecialchars($post['id']) . '">' . htmlspecialchars($post['company']) . '</a></h2>';
        echo '<p class="article-summary">' . nl2br(htmlspecialchars($post['departure_city'])) . '</p>';
        echo '<p class="article-summary">' . nl2br(htmlspecialchars($post['destination_city'])) . '</p>';
        echo '<p class="article-summary">' . nl2br(htmlspecialchars($post['check_in'])) . '</p>';
        echo '<p class="article-summary">' . nl2br(htmlspecialchars($post['check_out'])) . '</p>';
        echo '<p class="article-summary">' . nl2br(htmlspecialchars($post['check_out'])) . '</p>';
        echo '<input type="hidden" name="id" value="' . htmlspecialchars($post['id']) . '"/>';
       
       
      
     
     
      
        echo '<form action="delete_vol.php" method="post"  >';
        echo '<input type="hidden" name="vol" value="' . htmlspecialchars($post['id']) . '"/>';
        echo '<input type="submit" value="Delete vol"/>';
        echo '<a href="delete_vol.php?ID_vol=' . htmlspecialchars($post['id']) . '" class="add-article-btn">delete</a>';
        echo '</form>';
        echo '<a href="modify_vol.php?ID_vol=' . htmlspecialchars($post['id']) . '" class="add-article-btn">Modify</a>';
        echo '</div>';
    }
} else {
    echo '<p>No posts found.</p>';
}
?>

<!-- Button to add a vol -->
    <a href="add_vol.php" class="add-article-btn">Ajouter vol</a>
<!--Search bar thing -->
    <script>
    document.getElementById('searchBox').addEventListener('keypress', function(event) {
        // Check if the Enter key is pressed
        if (event.key === "Enter") {
            event.preventDefault();
            filterVol(); 
        }
    });

    function filterArticles() {
        var searchTerm = document.getElementById('searchBox').value.toLowerCase();
        var articles = document.querySelectorAll('.article');
        let found = false; // Flag to track if any articles are found

        articles.forEach(function(article) {
            var title = article.querySelector('.article-title').textContent.toLowerCase();
            if (title.includes(searchTerm)) {
                article.style.display = '';
                found = true;
            } else {
                article.style.display = 'none';
            }
        });

        document.getElementById('noResultsMessage').style.display = found ? 'none' : 'block';
    }

    function sortArticles() {
        var sortOption = document.getElementById('sortOptions').value;
        // Redirect to the same page with the sort option as a query parameter
        window.location.href = 'blogs_frontpage.php?sort=' + sortOption;
    }
    </script>
</body>
</html>