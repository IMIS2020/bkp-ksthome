<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
   <div class="container">
   <!-- <h3>Message Ticket Number : {{$data['msgTicketId']}}</h3> -->
   
   <br>
   <h2>
   <b>Subject:</b> {{$data['msgSubject']}} <br>
   </h3>
   <br>
   <h2>
   <b>Message:</b> {{$data['msgBody']}} <br>
   </h3>
   <h2>
   <b>
   <h4>Thank You <br></h4>
   <h3>
   {{$data['name']}} <br>
   {{$data['email']}} <br>
   {{$data['contactNumber']}}
   </h3>
   </b>
   </h2>
    </div>
   </body>
  </html>