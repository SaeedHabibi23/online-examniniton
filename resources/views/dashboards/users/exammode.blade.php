<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            display: flex;
            justify-content: center;
        }
        section{
            padding: 2%;
        }
        #CandidateName{
            width: 80%;
            padding: 1%;
            border: none;
            border-bottom: 2px solid gray;
        }
        fieldset{
            padding: 3%;
        }
        #exam{
            width: 40%;
            padding: 1%;
            margin-bottom: 3%;
        }
        textarea{
            resize: none;
            margin: 1% 0% 1% 0%;
            width: 95%;
            float: right;
        }
        .choseableBtn{
            margin-left: 5%;
            padding: 1%;
            border: 1px solid rgb(186, 182, 182);
            border-radius: 5px;
            background: #fff;
            margin-bottom: 2%;
        }
        .selectBtn{
            float: right;
            margin: 2% 0% 0% 1%;
            padding: 1% 4%;
        }
    </style>
</head>
<body>
    <section>
        <div>
            <form action="#">
                <label for="name">Candidate name :</label>
                <input type="text" id="CandidateName" name="CandidateName" placeholder="Candidate Name">
            </form>
        </div>
        <form action="/">
            <fieldset>
              <legend>Exam Mode</legend>
              <input type="radio">Take selected exam :
              <select name="exam" id="exam">
                <option value="examA">Exam A</option>
                <option value="examA">Exam B</option>
                <option value="examA">Exam C</option>
                <option value="examA">Exam D</option>
                <option value="examA">Exam E</option>
              </select><br>
              <input type="radio" id="question" name="question"> Take questions from selected sections only: <br>
              <textarea name="" id="" cols="35" rows="10" placeholder="There are no sections in the exam."></textarea><br>
              <div>
                <button class="choseableBtn">Select All</button>
                <button class="choseableBtn">Deselect All</button>
              </div>
              <input type="radio"> Take
              <input type="number" value="691"> questions from entire exam file <br><br>
              <input type="radio"> Take question range from 
              <input type="number" value="1" style="width:40px;"> to <input type="number" style="width:40px;" value="691"><br><br>
              <input type="radio"> Take question that I have answered incorrectly 
              <input type="number" value="1"> or more times <br><br>
              <input type="radio"> Training mode <br>
            </fieldset>
            <fieldset>
                <legend>Timer</legend>
                <div style="display: flex;justify-content: space-between;">
                    <div>
                        <input type="checkbox"><label for="timer">Timer on</label>
                    </div>
                    <div>
                        <label for="limit">Time limit (minutes): </label><input type="number" value="120">
                    </div>
                </div>
              </fieldset>
              <div >
                <button class="selectBtn">
                    <a href="{{route('user.startexam')}}" style="text-decoration:none;"> OK </a>
                </button>
                <button class="selectBtn">Cancle</button>
              </div>
          </form>
    </section>
</body>
</html>