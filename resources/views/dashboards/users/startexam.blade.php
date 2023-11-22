<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Exam</title>
    <style>
        *{
    box-sizing: border-box;
}
body {
    margin: 0;
    font-family: Arial, sans-serif;
  }
  
  .navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    border-bottom: 1px solid black;
  }
  
  .nav-links {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
  }
  
  .nav-links li {
    margin-right: 20px;
  }
  
  .nav-links li a {
    text-decoration: none;
    color: #000;
  }
  
  @media (max-width: 768px) {
    .navbar {
      flex-direction: column;
      align-items: flex-start;
    }
  
    .nav-links {
      margin-top: 20px;
      flex-direction: column;
    }
  
    .nav-links li {
      margin-right: 0;
      margin-bottom: 10px;
    }
  }
  .choseBtn{
    display: flex;
  }
  .choseBtn button{
    width: 10em;
    padding: 3%;
    margin: 5% 0% 5% 7%;
    border: 1px solid gray;
    border-radius: 5px;
  }
  .mainContent{
    height: 73vh;
    overflow-y: scroll;
  }
  .subMainContent{
    margin: 0% 2%;
    display: flex;
    justify-content: space-between;
    border-bottom: 1px solid gray;
  }
  .subMainContent1 p{
    margin: 1% 2%;
  }
  .subMainContent1 form{
    margin: 1% 2%;
  }
  .footerContent{
    display: flex;
    justify-content: space-between;
    background-color: rgb(232, 229, 229);
    border-top: 1px solid gray;
  }
  .footerContent .footerText{
    padding: 0% 1%;
  }
  .footerContent .footerForm{
    padding: 1% 1%;
  }
  .footerBtn{
    display: flex;
    justify-content: space-between;
    background-color: rgb(232, 229, 229);
    border-top: 1px solid gray;
    padding: 0% 1%;
  }
  .footerBtn button{
    width: fit-content;
    height: 2em;
    margin: 3% 0%;
  }
  .footerBtn select{
    width: fit-content;
    height: 2em;
  }

    </style>
</head>
<body>
    <nav>
        <div class="navbar">
            <form action="/">
                <input type="checkbox"><label for="mark">Mark</label>
            </form>
          <ul class="nav-links">
            <li><a href="#">Time Remaining:</a> <span id="timer" style="color:red;">

             {{$data['categories']->timer}} 

            </span></li>
          </ul>
        </div>
    </nav>
    <div class="mainContent">
        <div class="subMainContent">
            <p>Item 2 of 691 (Exam A, Q7)</p>
            <ul class="nav-links">
                <li class="choseBtn">
                    <button>Show Answer</button>
                    <button>Calculator</button>
                </li>
            </ul>
        </div>
        <div class="subMainContent1">
        @foreach($data['Questions'] as $Question)
            <p> {{$Question->question}} </p>
            <form action="/">
                <input type="radio" value="1" name="valueone"><label for="a"> A. {{$Question->answerone}} </label><br>
                <input type="radio" value="2" name="valueone"><label for="a"> B. {{$Question->answertow}} </label><br>
                <input type="radio" value="3" name="valueone"><label for="a"> C. {{$Question->answerthree}} </label><br>
                <input type="radio" value="4" name="valueone"><label for="a"> D. {{$Question->answerfour}} </label><br>
            </form>
            @endforeach
        </div>
    </div>
    <footer style="position: sticky;">
        <div class="footerContent">
            <div class="footerText">
                <p>Select the best choice</p>
            </div>
            <div class="footerForm">
                <form action="/">
                    <label for="100">100%</label><input type="range" value="50">
                </form>
            </div>
        </div>
        <div class="footerBtn">
            <div>
                <button>Previous</button>
                <button>Next</button>
                <select name="review" id="review">
                    <option value="reviewAll">Review All</option>
                    <option value="reviewAll">Review just once</option>
                </select>
            </div>
            <div>
                <button>Pause</button>
                <button>Save Session</button>
                <button>End Exam</button>
            </div>
        </div>
    </footer>
    <script>
    function startTimer(duration, display) {
        var timer = duration, minutes, seconds;
        setInterval(function () {
            minutes = parseInt(timer / 60, 10)
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;

            if (--timer < 0) {
                timer = 0;
            }
        }, 1000);
    }

    window.onload = function () {
        var display = document.querySelector('#timer');
        var duration = parseInt(display.textContent, 10);

        startTimer(duration, display);
    };
</script>
</body>
</html>