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
            <p>Item {{$data['fromfirst']}} of {{$data['valuetwo']}} (Exam A, Q7)</p>
            <ul class="nav-links">
                <li class="choseBtn">
                    <button>Show Answer</button>
                    <button>Calculator</button>
                </li>
            </ul>
        </div>
        <div class="subMainContent1">
            <p> {{$data['Questions']->question}} </p>

            <p>
            @error('valueone')
                    <span style="color:red;">{{$message}}</span>
              @enderror
              @if(session('status'))
              <span style="color:red;">{{session('status')}}</span>
              @endif
              </p>
            <form action="{{ route('user.nextquestion' , Crypt::encryptString($data['Questions']->question_id))}}" method="get">
                <input type="radio" value="1" name="valueone"><label for="a"> A. {{$data['Questions']->answerone}} </label><br>
                <input type="radio" value="2" name="valueone"><label for="a"> B. {{$data['Questions']->answertow}} </label><br>
                <input type="radio" value="3" name="valueone"><label for="a"> C. {{$data['Questions']->answerthree}} </label><br>
                <input type="radio" value="4" name="valueone"><label for="a"> D. {{$data['Questions']->answerfour}} </label><br>
           
                <input type="hidden" name="valuemax" id="" value="{{$data['valuetwo']}}">
                <input type="hidden" name="fromfirst" id="" value="{{$data['fromfirst']}}">
                
        </div>
    </div>
    <footer style="position: sticky;">
        <div class="footerContent">
            <div class="footerText">
                <p>Select the best choice</p>
            </div>
            <div class="footerForm">
                <label for="resolution">50%</label>
                  <input type="range" id="resolution" value="50" min="0" max="100" step="1">
            </div>
        </div>
        <div class="footerBtn">
            <div>
                <button> 
                <a style="text-decoration:none; color:black;" href="{{ route('user.previousquestion', ['question_id' => Crypt::encryptString($data['Questions']->question_id), 'fromfirst' => $data['fromfirst'], 'valuetwo' => $data['valuetwo']]) }}">Previous</a>


                </button>
                
                <input type="submit" class="newxt" style="height:28px; cursor:pointer;" value="Next"> 
                </form>
                <select name="review" id="review">
                    <option value="reviewAll">Review All</option>
                    <option value="reviewAll">Review just once</option>
                </select>
            </div>
            <div>
            <button id="timerButton">Pause</button>
                <button>Save Session</button>
                <button> 
                  <a href="{{route('user.checkresult')}}" class="endexaminate" style="text-decoration:none;color:black;"> End Exam </a>
                  
                </button>
            </div>
        </div>
    </footer>
   
<script>
var isPaused = false;
var interval;
var timer;

function startTimer(duration, display) {
    var minutes, seconds;
    interval = setInterval(function () {
        if (isPaused) {
            clearInterval(interval);
            return;
        }

        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            timer = duration;
            clearInterval(interval);
            disableRadioButtons(); // فراخوانی تابع برای غیرفعال کردن رادیو باتن‌ها
        }
        localStorage.setItem('timer', timer); // ذخیره‌ی مقدار تایمر در localStorage
    }, 1000);
}

function disableRadioButtons() {
    var radioButtons = document.querySelectorAll('input[type="radio"]');
    radioButtons.forEach(function(radio) {
        radio.disabled = true; // غیرفعال کردن همه‌ی رادیو باتن‌ها
    });
}

window.onload = function () {
    var display = document.querySelector('#timer');
    var storedTimer = localStorage.getItem('timer');
    if (storedTimer) {
        timer = parseInt(storedTimer, 10);
    } else {
        timer = parseInt(display.textContent, 10);
    }
    startTimer(timer, display);
};

document.getElementById('timerButton').addEventListener('click', function() {
    if (isPaused) {
        isPaused = false;
        this.textContent = 'Pause';
        startTimer(timer, document.querySelector('#timer'));
    } else {
        isPaused = true;
        this.textContent = 'Start';
    }
});

document.querySelector('.endexaminate').addEventListener('click', function() {
    localStorage.removeItem('timer'); // حذف مقدار تایمر از localStorage
});
   
</script>
<script>
  const range = document.getElementById('resolution');
  const label = document.querySelector('label[for="resolution"]');

  range.addEventListener('input', function() {
    label.innerText = `${this.value}%`;
  });
</script>
<script>
    // Get the range input and register an input event listener
    var resolutionInput = document.getElementById('resolution');
    
    resolutionInput.addEventListener('input', function() {
        // Get the current value of the range input
        var resolutionValue = resolutionInput.value;
        
        // Adjust the resolution based on the range input value
        document.body.style.fontSize = resolutionValue + 'px';
    });
</script>
</body>
</html>