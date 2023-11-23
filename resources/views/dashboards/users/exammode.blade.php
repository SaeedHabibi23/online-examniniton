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
        <form action="{{route('user.startexam')}}" method="get">
            @csrf
            <fieldset>
              <legend>Exam Mode</legend>
              <input type="radio">Take selected exam :
              <select name="cat_id" id="exam">
                @foreach($categories as $categorie)
                <option value="{{$categorie->cat_id}}"> {{$categorie->name}} </option>
                @endforeach
              </select><br>
              <input type="radio" id="question" name="question"> Take questions from selected sections only: <br>
              <textarea name="" id="" cols="35" rows="10" placeholder="There are no sections in the exam."></textarea><br>
              <div>
                <button class="choseableBtn" disabled>Select All</button>
                <button class="choseableBtn" disabled>Deselect All</button>
              </div>
              <input type="radio"> Take
              <input type="number" style="width:40px;" value="691" disabled> questions from entire exam file <br><br>
              <input type="radio"> Take question range from 
              <input type="number" value="1" style="width:40px;" disabled> to <input type="number" style="width:40px;" disabled value="691"><br><br>
              <input type="radio"> Take question that I have answered incorrectly 
              <input type="number" value="1" style="width:40px;"> or more times <br><br>
              <input type="checkbox"> Training mode <br>
            </fieldset>
            <fieldset>
                <legend>Timer</legend>
                <div style="display: flex;justify-content: space-between;">
                    <div>
                        <input type="checkbox"><label for="timer">Timer on</label>
                    </div>
                    <div>
                        <label for="limit">Time limit (minutes): </label><input type="number"  style="width:70px;" value="120">
                    </div>
                </div>
              </fieldset>
              <div >
                <input type="submit" value="Start Exam" class="selectBtn">
                    
                
                <button class="selectBtn">Cancle</button>
              </div>
          </form>
    </section>
</body>
</html>