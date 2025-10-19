<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <main>
      <form action="formhandler.php" method="post">
        <label for="name">Product Name:</label><br />
        <input type="text" id="name" name="name" /><br /><br />

        <label for="price">Price:</label><br />
        <input type="text" id="price" name="price" /><br /><br />

        <label for="quantity">Quantity:</label><br />
        <input type="number" id="quantity" name="quantity" /><br /><br />

        <button type="submit" name="submit" value="submit" />
      </form>
    </main>
  </body>
</html>
