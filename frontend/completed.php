<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RSVP Received - Thank You</title>
  <style>
    body {
      font-family: 'Helvetica', sans-serif;
      background-color: #f7f7f7;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }
    .container {
      text-align: center;
      padding: 30px;
      background-color: #fff;
      box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
    }
    h1 {
      font-size: 2.5rem;
      margin-bottom: 15px;
      color: #e74c3c;
    }
    p {
      font-size: 1.2rem;
      margin-bottom: 20px;
      color: #333;
    }
    .message {
      font-size: 1.2rem;
      margin-bottom: 20px;
    }
    .heart {
      color: #e74c3c;
      font-size: 2.5rem;
      animation: heartbeat 1s infinite;
    }
    @keyframes heartbeat {
      0%, 100% {
        transform: scale(1);
      }
      50% {
        transform: scale(1.2);
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>RSVP Received - Thank You!</h1>
    <p>Thank you for confirming your attendance to our wedding.</p>
    <p class="message">
      <span class="heart">&hearts;</span>
      <!-- Toont een bericht op basis van de RSVP-status -->
      <?php
        if(isset($_GET['rsvp'])){
          $rsvp_status = $_GET['rsvp'];
        if ($rsvp_status === 'true') {
          echo '<p>We are excited to share this special day with you.</p>';
        } elseif ($rsvp_status === 'false') {
          echo '<p>We will miss your presence.</p>';
        } else {
          echo 'We will miss your presence.';
        }
      }else{
        die();;
      }
      ?>
    </p>
  </div>
</body>
</html>
