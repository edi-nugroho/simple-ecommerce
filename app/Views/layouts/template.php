<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/img/po.png">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <!-- Bootstraps -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  </head>
  <body>

    <?= $this->include('layouts/navbar'); ?>
    
    <?= $this->renderSection('content'); ?>

    <?= $this->include('layouts/footer'); ?>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/b0f01835ff.js" crossorigin="anonymous"></script>

    <!-- Custom JS -->
    <script>
      function previewImg () {

        const img = document.querySelector('#user_image');
        const imgLabel = document.querySelector('.custom-file-label');
        const imgPreview = document.querySelector('.img-preview');

        imgLabel.textContent = img.files[0].name;

        const fileSampul = new FileReader();
        fileSampul.readAsDataURL(img.files[0]);

        fileSampul.onload = function (e) {
          imgPreview.src = e.target.result;
        }
      }

    </script>
  </body>
</html>