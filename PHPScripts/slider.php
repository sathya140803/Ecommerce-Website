
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Slider with Backgrounds</title>
        <link rel="stylesheet" href="../CSS/styles.css">
    </head>
    <body>
        <div class="slider">
            <div class="slide" style="background-image: url('image/god2.jpg');">
                <div class="content">
                    <h2>Page 1</h2>
                    <p>This is the first page.</p>
                </div>
                <div class="video-container">
                    <video src="https://youtu.be/Lq594XmpPBg" controls></video>
                </div>
            </div>
            <div class="slide" style="background-image: url('image/modern.wep.webp');">
                <div class="content">
                    <h2>Page 2</h2>
                    <p>This is the second page.</p>
                </div>
                <div class="video-container">
                    <video src="video2.mp4" controls></video>
                </div>
            </div>
            <div class="slide" style="background-image: url('background3.jpg');">
                <div class="content">
                    <h2>Page 3</h2>
                    <p>This is the third page.</p>
                </div>
                <div class="video-container">
                    <video src="video3.mp4" controls></video>
                </div>
            </div>
            <a class="prev" onclick="changeSlide(-1)">❮</a>
            <a class="next" onclick="changeSlide(1)">❯</a>
        </div>
        <script src="script.js"></script>
    </body>
    </html>