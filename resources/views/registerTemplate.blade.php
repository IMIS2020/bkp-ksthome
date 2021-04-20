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
      <div class="col-md-10 m-auto">
         <!-- <div style="background-color:#702e2e; color:#fff; padding-top:10px; padding-bottom:10px; text-align:center">
          <h1> I-MIS-APP </h1>
          </div>
         -->
         <img src="{{asset('assets/img/mail-image.png')}}" alt="">
          <div class="col-xl-10 m-auto">
            <div class="card-body card-adjust bg-white pb-4">
            <h5 style=" font-size:20px;
             font-style:bold;margin-left:30px;">Dear Applicant,
            </h5>
              <p style="margin-left:30px; font-size:20px;
              ">Thank you for registering on the S-ILF Scholarship portal.<br>
              Kindly use the following 6 Digit OTP (One Time Password) to verify your identity in the registration screen.
              </p>

              <!-- <p style=" margin-left:30px; font-size:20px;
             ">
              </p> -->
            
             <h2 style="color:#702e2e; margin-left:30px; font-size:20px; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;" >OTP : {{$code}}</h2>

             <p style=" margin-left:30px; font-size:20px;
             ">Once you have verified your identity correctly with the OTP, your account will be created and you can login with your email and password.
              </p>

              <p style=" margin-left:30px; font-size:20px; color:red
              ">
              This is an automated no-reply mail. Please do not reply to this message as this mail id is unattended, and cannot help with questions or requests.<br>
              <span style="color: #000">For any clarifications kindly call us at 9990503759/9891572290 or email us at  scholarships@silf.in .</span>
              </p>

              <!-- <p style=" margin-left:30px; font-size:20px;
              ">
              </p> -->

             <h5 style=" font-size:20px;
             font-style:bold;margin-left:30px;">Thank you, <br>
             Team S-ILF</h5>
          </div>
         </div>
      </div>
    </div>
  </body>
  </html>