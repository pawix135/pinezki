<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <title>Hello, world!</title>
    <style media="screen">

      /* .saveButton, .removeButton, .textEditor, .cancelButton{
        display: none;
      } */

      .pins{
        width: 15px;
        height: 15px;
        background-color: rgb(164, 25, 25);
        border-radius: 50%;
        transform: translate(-50%, -50%);
        position: absolute;
      }

      .pins:hover{
        background-color: rgb(71, 19, 19);
      }

      .pin-editing{
        background-color: rgb(236, 173, 13);
      }

      .pin-editing:hover{
        background-color: rgb(198, 144, 8);
      }

      figure{
        position: relative;
        display: inline-block;
        max-width: auto;
        height: auto;
      }

      img{
        max-width: 100%;
        height: auto;
        position: relative;
        -khtml-user-select: none;
        -o-user-select: none;
        -moz-user-select: none;
        -webkit-user-select: none;
        user-select: none;
      }
    </style>
  </head>
  <body>
    <div id="testy">
      <div class="input-group btn-group-lg">
        <button type="button" class='addButton btn btn-success'>Dodaj</button>
        <button type="button" class='saveButton btn btn-primary'>Zapisz</button>
        <button type="button" class='removeButton btn btn-danger'>Usuń</button>
        <button type="button" class="cancelButton btn btn-light" name="button">Anuluj</button>
        <textarea class="textEditor form-control" rows="2" cols="80"></textarea>
      </div>
    </div>
    <a class="h1" href="dokumentacja.txt">Dokumentacja</a>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js"></script>
    <script src="http://localhost:35729/livereload.js" charset="utf-8"></script>
    <script src="app.js?v=<?php rand(); ?>" charset="utf-8"></script>
  </body>
</html>
