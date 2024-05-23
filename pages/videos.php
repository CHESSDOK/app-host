<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/videos.css"/>
    <title>Video Management</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="../icons/lslogo.png" alt="Logo"/>
        </div>
        <div class="burger-menu">
            <button id="burger-btn">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <div id="side-menu" class="side-menu">
            <button id="close-btn">&times;</button>
            <ul>
                <li><a href="#">Profile</a></li>
                <li><a href="home.php">Home</a></li>
                <li><a href="../index.html" id="logout">Logout</a></li>
            </ul>
        </div>
    </header>

    <div class="search-container">
        <input type="text" class="search-box" placeholder="Search...">
        <button class="search-button">Search</button>
    </div>

    <div class="categ">
        <label for="Categ"><p>Category:</p></label>
        <select name="Categ" id="Categ">
            <option value="" disabled selected>Select an option...</option>
            <option value="English">English</option>
            <option value="Filipino">Filipino</option>
            <option value="Mathematics">Mathematics</option>
            <option value="Science">Science</option>
            <option value="Humanities">Humanities</option>
            <option value="Communication">Communication</option>
            <option value="ICT">ICT</option>
        </select>
    </div>

    <h1 id="output" style="margin-left: 100px; margin-top: 20px;">ㅤ</h1>

    <div class="link-container">
        <button id="add-video-btn" class="plus-button">+</button>
    </div>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Add Video</h2>
            <label for="youtube-url">YouTube URL:</label>
            <input type="text" id="youtube-url" name="youtube-url">
            <button id="submit-btn" onclick="convertToEmbed()">Add Video</button>
        </div>
    </div>

    <div id="video-container">
        <iframe id="video-iframe" width="250" height="140" frameborder="0" allowfullscreen style="display: none;"></iframe>
    </div>

    <script src="../js/video.js"></script>
</body>
</html>
