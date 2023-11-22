<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('exammode/style.css')}}">
    <title>VCE Player</title>
    <style>

    </style>
</head>
<body>
    <nav>
        <div class="navbar">
          <ul class="nav-links">
            <li><a href="#">File</a></li>
            <li><a href="#">Exam</a></li>
            <li><a href="#">Help</a></li>
          </ul>
        </div>
    </nav>
    <div class="flex-container">
        <div class="flex-item-left">
            <div style="overflow-x: auto;">
                <table>
                  <tr>
                    <th style="width: 80%;">Title</th>
                    <th style="border-left: 1px solid gray;">File Name</th>
                  </tr>
                  <tr>
                    <td>200-301 Passleader.200-301.Premium.VCE.691q</td>
                    <td>C:\Users\Download\one\first_file.txt</td>
                  </tr>
                </table>
              </div>
        </div>
        <div class="flex-item-right">
            <div class="buttons">
                <button>Start...</button>
                <button>Add...</button>
                <button>Change...</button>
                <button>Remove</button>
                <button>Properties</button>
                <button>History</button>
            </div>
        </div>
      </div>
    <!-- <div class="menu">
        <div style="overflow-x: auto;">
            <table>
              <tr>
                <th style="width: 80%;">Title</th>
                <th style="border-left: 1px solid gray;">File Name</th>
              </tr>
              <tr>
                <td>200-301 Passleader.200-301.Premium.VCE.691q</td>
                <td>C:\Users\Download\one\first_file.txt</td>
              </tr>
            </table>
          </div>
    </div>
      
    <div class="main">
        <div class="buttons">
            <button>Start...</button>
            <button>Add...</button>
            <button>Change...</button>
            <button>Remove</button>
            <button>Properties</button>
            <button>History</button>
        </div>
    </div> -->

    <script src="{{ asset('exammode/script.js')}}"></script>
</body>
</html>