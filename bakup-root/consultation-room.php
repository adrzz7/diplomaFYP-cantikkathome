<html>
<head>
    <title> Consultation Room </title>
</head>
<body>

  <?php include 'header.php';



  $id = $_GET['id'];


  ?>


          <iframe
            src="https://tokbox.com/embed/embed/ot-embed.js?embedId=59da1a0d-1f94-4983-8913-787f9418a0fe&room=<?php echo $id; ?>&iframe=true"
            width="100%"
            height="100%"
            scrolling="auto"
            allow="microphone; camera"
          ></iframe>

    <script type="text/javascript" src="js/app.js"></script>

    <?php include 'footer.php'; ?>

</body>
</html>
