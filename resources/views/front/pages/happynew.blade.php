<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gallery Page</title>
  <style>
/* General Reset */
body {
  margin: 0;
  font-family: Arial, sans-serif;
  line-height: 1.6;
  color: #333;
}

/* Header Section */
.gallery-header {
  text-align: center;
  background-color: #f4f4f4;
  padding: 20px 10px;
}

.gallery-header h1 {
  font-size: 2.5rem;
  margin: 0;
}

.gallery-header p {
  font-size: 1.2rem;
  color: #666;
}

/* Gallery Section */
.gallery {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 20px;
  padding: 20px;
  margin: 0 auto;
  max-width: 1200px;
}

.gallery-item {
  text-align: center;
  border: 1px solid #ddd;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s, box-shadow 0.3s;
}

.gallery-item img {
  width: 100%;
  height: auto;
  display: block;
}

.gallery-item p {
  margin: 10px 0;
  font-size: 1rem;
  color: #444;
}

.gallery-item:hover {
  transform: scale(1.05);
  box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
}

/* Responsive Design */
@media (max-width: 768px) {
  .gallery-header h1 {
    font-size: 2rem;
  }

  .gallery-header p {
    font-size: 1rem;
  }
}




  </style>
</head>
<body>
  <header class="gallery-header">
    <h1>Photo Gallery</h1>
    <p>Explore our beautiful collection of stunning images!</p>
  </header>
  <section class="gallery">
    <div class="gallery-item">
      <img src="https://via.placeholder.com/300" alt="Sample Image 1">
      <p>Image Caption 1</p>
    </div>
    <div class="gallery-item">
      <img src="https://via.placeholder.com/300" alt="Sample Image 2">
      <p>Image Caption 2</p>
    </div>
    <div class="gallery-item">
      <img src="https://via.placeholder.com/300" alt="Sample Image 3">
      <p>Image Caption 3</p>
    </div>
    <div class="gallery-item">
      <img src="https://via.placeholder.com/300" alt="Sample Image 4">
      <p>Image Caption 4</p>
    </div>
  </section>
</body>
</html>
