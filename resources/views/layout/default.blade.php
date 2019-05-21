<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Black Dashboard by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  @include('style.blade.php')
</head>

<body class="">
  <div class="wrapper">
    @include('sidebar.blade.php')
    
    @include('main.blade.php')
    
  </div>
  @include('plugin.blade.php')
  
  <!--   Core JS Files   -->
  
</body>
@include('script.blade.php')
</html>