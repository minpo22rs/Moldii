<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Facebook Post Box Clone | CodingNepal</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FontAweome CDN Link for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  </head>
  <style>
      /* Import Google Font - Poppins */
      * {
  box-sizing: border-box;
}
body {
  padding: 0 1em;
  font-family: sans-serif;
}


/* * Post widget * */

input[type="file"] {
  display: none;
}
ul {
  list-style-type: none;
}

.btn {
  padding: .5em 1em;

  background-color: transparent;
  color: #6b7270;

  border: none;
  cursor: pointer;
}

.widget-post {
  width: 600px;
  min-height: 100px;
  height: auto;

  border: 1px solid #eaeaea;
  border-radius: 6px;
  box-shadow: 0 1px 2px 1px rgba(130, 130, 130, 0.1);

  background-color: #fff;

  margin: auto;
  overflow: hidden;
}

.widget-post__header {
  padding: .2em .5em;

  background-color: #eaeaea;
  color: #3f5563;
}
.widget-post__title {
  font-size: 18px;
}

.widget-post__content {
  width: 100%;
  height: 50%;
}
.widget-post__textarea {
  width: 100%;
  height: 100%;
  padding: .5em;

  border: none;
  resize: none;
}
.widget-post__textarea:focus {
  outline: none;
}

.widget-post__options {
  padding: .5em;
}
.widget-post___input {
  display: inline-block;

  width: 24%;
  padding: .2em .5em;

  border: 1px solid #eaeaea;
  border-radius: 1.5em;
}
.post-actions__label {
  cursor: pointer;
}

.widget-post__actions {
  width: 100%;
  padding: .5em;
}
.post--actions {
  position: relative;
  padding: .5em;

  background-color: #f5f5f5;
  color: #a2a6a7;
}
.post-actions__attachments {
  display: inline-block;
  width: 60%;
}
.attachments--btn {
  background-color: #eaeaea;
  color: #007582;

  border-radius: 1.5em;
}

.post-actions__widget {
  display: inline-block;
  width: 38%;
  text-align: right;
}
.post-actions__publish {
  width: 120px;

  background-color: #008391;
  color: #fff;

  border-radius: 1.5em;
}

.scroller::-webkit-scrollbar {
  display: none;
}

.is--hidden {
  display: none;
}

.sr-only {
  width: 1px;
  height: 1px;

  clip: rect(1px, 1px, 1px, 1px);
  -webkit-clip-path: inset(50%);
  clip-path: inset(50%);

  overflow: hidden;
  white-space: nowrap;

  position: absolute;
  top: 0;

}


/* *  Placeholder contrast * */
::-webkit-input-placeholder {
  color: #666;
}
::-moz-placeholder {
  color: #666;
}
:-ms-input-placeholder {
  color: #666;
}
:-moz-placeholder {
  color: #666;
}
  </style>
  <body>
    <div class="widget-post" aria-labelledby="post-header-title">
        <div class="widget-post__header">
          <h2 class="widget-post__title" id="post-header-title">
             <i class="fa fa-pencil" aria-hidden="true"></i>
            Write Me
          </h2>
        </div>
        <form id="widget-form" class="widget-post__form" name="form" aria-label="post widget">
          <div class="widget-post__content">
            <label for="post-content" class="sr-only">Share</label>
            <textarea name="post" id="post-content" class="widget-post__textarea scroller" placeholder="What's wrong with r00tme?"></textarea>
          </div>
          <div class="widget-post__options is--hidden" id="stock-options">
          </div>
          <div class="widget-post__actions post--actions">
            <div class="post-actions__attachments">
              <button type="button" class="btn post-actions__stock attachments--btn" aria-controls="stock-options" aria-haspopup="true">
                <i class="fa fa-usd" aria-hidden="true"></i>
                stock
              </button>
              <button type="button" class="btn post-actions__upload attachments--btn">
                <label for="upload-image" class="post-actions__label">
                   <i class="fa fa-upload" aria-hidden="true"></i> 
                  upload image
                </label>
              </button>
              <input type="file" id="upload-image" accept="image/*" accept="image/*;capture=camera">
            </div>
            <div class="post-actions__widget">
              <button class="btn post-actions__publish">publish</button>
            </div>
          </div>
        </form>
  </body>
  <script>
      var myInput = document.getElementById('upload-image');

        function sendPic() {
            var file = myInput.files[0];

            // Send file here either by adding it to a `FormData` object 
            // and sending that via XHR, or by simply passing the file into 
            // the `send` method of an XHR instance.
        }

        myInput.addEventListener('change', sendPic, false);
  </script>
</html>