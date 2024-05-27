<!doctype html>
<html lang="en">
  <head>
    <title>Frame</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
  <header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="navbar-brand" href="<?=dirname($_SERVER['SCRIPT_NAME'])?>/articles">Articles <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=dirname($_SERVER['SCRIPT_NAME'])?>/article/create">Create article</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=dirname($_SERVER['SCRIPT_NAME'])?>/hello/Tim">Hello</a>
      </li>
    </ul>
  </div>
</nav>
  </header>
  <main>
    <div class="container">

    