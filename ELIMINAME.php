<!DOCTYPE html>
<html>
<head>
<style>
div.gallery {
    border: 1px solid #ccc;
}

div.gallery:hover {
    border: 1px solid #777;
}

div.gallery img {
    width: 100%;
    height: auto;
}

div.desc {
    padding: 15px;
    text-align: center;
}

* {
    box-sizing: border-box;
}

.responsive {
    padding: 0 6px;
    float: left;
    width: 24.99999%;
}

@media only screen and (max-width: 700px){
    .responsive {
        width: 49.99999%;
        margin: 6px 0;
    }
}

@media only screen and (max-width: 500px){
    .responsive {
        width: 100%;
    }
}

.clearfix:after {
    content: "";
    display: table;
    clear: both;
}
</style>
</head>
<body>

<h2>Responsive Image Gallery</h2>
<h4>Resize the browser window to see the effect.</h4>

<div class="responsive">
  <div class="gallery">

      <img src="imagenes/vestido1.jpeg" alt="Vestido 1" width="300" height="200">
    
    <div class="desc">Add a description of the image here</div>
  </div>
</div>


<div class="responsive">
  <div class="gallery">

      <img src="imagenes/vestido1.jpeg" alt="Vestido 2" width="600" height="400">
    <div class="desc">Add a description of the image here</div>
  </div>
</div>

<div class="responsive">
  <div class="gallery">

      <img src="imagenes/vestido1.jpeg" alt="Vestido 3" width="600" height="400">
    <div class="desc">Add a description of the image here</div>
  </div>
</div>

<div class="responsive">
  <div class="gallery">

      <img src="imagenes/vestido1.jpeg" alt="Vestido 4" width="600" height="400">
    <div class="desc">Add a description of the image here</div>
  </div>
</div>

<div class="clearfix"></div>



</body>
</html>