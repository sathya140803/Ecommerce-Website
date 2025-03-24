<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Game</title>
    
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body style="background-image: url('https://img.freepik.com/free-vector/paper-style-white-monochrome-background_52683-66443.jpg'); background-size: cover; background-position: center;">
    <div class="container mt-3">
        <h1 class="text-center">Insert Game</h1>
        <form id="insertGameForm" enctype="multipart/form-data">
            <!-- Game Details Fields... (as you had before) -->
            <!-- Add the other input fields like game_title, description, images, etc. -->
            
            <div class="form-outline mb-4">
                <label for="game_title" class="form-label">Game title</label>
                <input type="text" name="game_title" id="game_title" class="form-control" placeholder="Enter game title" autocomplete="off" required="required">
            </div>

            <!-- Other form fields... -->
             <!-- Description -->
    <div class="form-outline mb-4">
                <label for="description" class="form-label">Game description</label>
                <input type="text" name="description" id="description" class="form-control"
                 placeholder="Enter game description" autocomplete="off" required="required">
            </div>
            <!-- Second Description -->
            <div class="form-outline mb-4">
                <label for="long_description" class="form-label">Game long description</label>
                <input type="text" name="long_description" id="long_description" class="form-control"
                 placeholder="Enter game long description" autocomplete="off" required="required">
            </div>
            <!-- Keywords -->
            <div class="form-outline mb-4 w-50">
                <label for="game_keywords" class="form-label">Game keywords</label>
                <input type="text" name="game_keywords" id="game_keywords" class="form-control"
                 placeholder="Enter game keywords" autocomplete="off" required="required">
            </div>
            <!-- Categories -->
            <div class="form-outline mb-4 w-50">
                <select name="game_category" id="game_category" class="form-select" required>
                    <option value="">Select a category</option>
                    <option value="Action">Action game</option>
                    <option value="Strategy">Strategy game</option>
                    <option value="Sport">Sport game</option>
                    <option value="Puzzle">Puzzle game</option>
                </select>
            </div>
            <!-- Image 1 -->
            <div class="form-outline mb-4 w-50">
                <label for="game_image1" class="form-label">Game image 1</label>
                <input type="file" name="game_image1" id="game_image1" class="form-control" required="required">
            </div>
            <!-- Image 2 -->
            <div class="form-outline mb-4 w-50">
                <label for="game_image2" class="form-label">Game image 2</label>
                <input type="file" name="game_image2" id="game_image2" class="form-control" required="required">
            </div>
            <!-- Image 3 -->
            <div class="form-outline mb-4 w-50">
                <label for="game_image3" class="form-label">Game image 3</label>
                <input type="file" name="game_image3" id="game_image3" class="form-control" required="required">
            </div>
            <!-- Image 4 -->
            <div class="form-outline mb-4 w-50">
                <label for="game_image4" class="form-label">Game image 4</label>
                <input type="file" name="game_image4" id="game_image4" class="form-control" required="required">
            </div>
            <!-- Price -->
            <div class="form-outline mb-4 w-50">
                <label for="game_price" class="form-label">Game price</label>
                <input type="text" name="game_price" id="game_price" class="form-control"
                 placeholder="Enter game price" autocomplete="off" required="required">
            </div>
            <!-- Rating -->
            <div class="form-outline mb-4">
                <label for="game_rating" class="form-label">Game Rating</label>
                <input type="number" name="game_rating" id="game_rating" class="form-control"
                 placeholder="Enter game rating (e.g., 4.5)" step="0.1" min="0" max="5" required>
            </div>
            <!-- Size -->
            <div class="form-outline mb-4">
                <label for="game_size" class="form-label">Game Size (GB)</label>
                <input type="text" name="game_size" id="game_size" class="form-control"
                 placeholder="Enter game size in GB" required>
            </div>
            <!-- Company -->
            <div class="form-outline mb-4">
                <label for="company" class="form-label">Created by Company</label>
                <input type="text" name="company" id="company" class="form-control"
                 placeholder="Enter company name" required>
            </div>
            <!-- Age Restriction -->
            <div class="form-outline mb-4">
                <label for="age_restriction" class="form-label">Age Restriction</label>
                <input type="text" name="age_restriction" id="age_restriction" class="form-control"
                 placeholder="Enter age restriction (e.g., 18+)" required>
            </div>
            <!-- Supported Platforms -->
            <div class="form-outline mb-4">
                <label for="platforms" class="form-label">Supported Platforms</label>
                <select name="platforms[]" id="platforms" class="form-select" multiple required>
                    <option value="PS4">PS4</option>
                    <option value="PS5">PS5</option>
                    <option value="Xbox">Xbox</option>
                    <option value="PC">PC</option>
                </select>
            </div>
            
            <div class="form-outline mb-4 w-50">
                <input type="submit" class="btn btn-info mb-3 px-3" value="Insert game">
            </div>
        </form>

        <!-- Inserted games will be displayed here -->
        <div id="gamesList"></div>
    </div>
    <script src = "script.js"></script>

</body>
</html>