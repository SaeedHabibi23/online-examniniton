<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Your Result</title>
</head>
<body>
    <h1 style="text-align:center; margin-top:100px;">
        <a href="#" style="width:100px;height:40px;padding:20px; background-color:red;color:white;text-decoration:none;"> Your Result: </a>
    </h1>
    <h1 style="text-align:center; margin-top:100px;">
        <a href="#" style="width:100px;height:40px;padding:20px; background-color:green;color:white;text-decoration:none;">  Correct Answer: {{$Result->correctanswer}} </a>
    </h1>
    <h1 style="text-align:center; margin-top:100px;">
        <a href="#" style="width:100px;height:40px;padding:20px; background-color:red;color:white;text-decoration:none;">  Incorrect Answer: {{$Result->incorrectanswer}}</a>
    </h1>
    <h1 style="text-align:center; margin-top:100px;">
        <a href="{{route('user.dashboard')}}" style="width:100px;height:40px;padding:20px; background-color:blue;color:white;text-decoration:none;">  Back </a>
    </h1>
</body>
</html>