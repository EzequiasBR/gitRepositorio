<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Upload</title>
</head>
<body>
   <form action="upload.php" method="post" enctype="multipart/form-data">
      <input type="file" name="ficheiro" accept="application/pdf,image/jpg,image/jpeg"><br>
      <input type="submit" value="Enviar">
   </form>
</body>
</html>