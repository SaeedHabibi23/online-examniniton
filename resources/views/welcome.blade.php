<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Examinition</title>

        <style>
            .conyainer{
                display:flex; 
                justify-content:center;
                align-items:center;
                height:100vh;
                width:100%;
                /* background-color:red; */
                background-image:url("{{asset('exam.jpg')}}");
                background-size:cover;
            }
            .button a{
                text-decoration:none;
                padding:20px;
                background-color:blue;
                color:white;
                font-size:23px;
            }
        </style>
      
    </head>
    <body class="antialiased">
       <section>
        <div class="conyainer" style="">
            <div class="button">
                <a href="{{route('login')}}"> Login </a>
            </div>
        </div>
       </section>
    </body>
</html>
