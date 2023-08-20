<?php
# Initialize the session
session_start();

# If the user is not logged in, redirect them to the login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== TRUE) {
  echo "<script>" . "window.location.href='./login.php';" . "</script>";
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kalinga International Model United Nations Organising Committee Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/main.css">

  <style>
    .spinner {
      animation: spin 3s infinite linear;
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    .hide {
      display: none;
    }

    .red-text {
      color: red;
    }
  </style>
</head>

<body>
  <div class="container">
  
  
    <div class="alert alert-success  alert-dismissible fade show my-5" role="alert"><div id="timer-text"><b>...<b></div><strong>Welcome!</strong> to Kalinga International Model United Nations Organising Committee Dashboard.

    </div>

    
    <!-- User profile -->
    <div class="row justify-content-center">
      <div class="col-lg-5 text-center"><img src="https://media.discordapp.net/attachments/761829352056422440/1115933409114603603/Frame_5_1.png?width=670&height=670" width="80" height="79">
        <h4 class="my-4">Welcome, <b><?= htmlspecialchars($_SESSION["username"]); ?> </b>to Kalinga International Model United Nations</h4>
          <br>

        

        <div class="container">
    <div class="text-center">    <div id="event-info" class="text-center mt-3">
      <h7>Current Session: <span id="current-event">Reporting Time</span></h7><br>
      <h7>Time Left: <span id="time-left">00:00:00</span></h7>
    </div>
    
      
</h4>




</div>
</div><br><br>
   <a href="./strength.php" class="btn btn-success">Conference Strength</a><br><br>
    <a href="./attend.php" class="btn btn-success">Attendence Kiosk</a>
    <a href="./accpt.php" class="btn btn-success"> <span style="color:#FF0000">N</span><span style="color:#00FF00">e</span><span style="color:#0000FF">w</span> Appointment Letter</a>






  <br><br>

  <a href="./logout.php" class="btn btn-danger">Log Out</a><br><br><br>
      </div>



    </div>
  </div>

    <script>
    setTimeout(function() {
      document.getElementById("spinner").classList.add("hide");
      document.getElementById("noResults").classList.remove("hide");
    }, 3000);
  </script>
    <script>
    const button = document.getElementById("myButton");
    const countdown = document.getElementById("countdown");
    const activeDateTime = new Date("2023-06-06T21:50:00"); // Set the desired date and time for the button to be active
    const linkURL = "https://meet.google.com/ont-nhqu-itp"; // Set the desired link URL

    button.addEventListener("click", function() {
      const currentDateTime = new Date();
      if (currentDateTime >= activeDateTime) {
        window.location.href = linkURL;
      } else {
        alert("Link is not active yet.");
      }
    });

    // Calculate and display the remaining time until the button is enabled
    function updateCountdown() {
      const currentDateTime = new Date();
      const timeDiff = activeDateTime.getTime() - currentDateTime.getTime();
      if (timeDiff > 0) {
        const days = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
        const hours = Math.floor((timeDiff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((timeDiff % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((timeDiff % (1000 * 60)) / 1000);
        countdown.innerHTML = `Time remaining: ${days} days, ${hours} hours, ${minutes} minutes, ${seconds} seconds`;
      } else {
        countdown.innerHTML = "Link is now active!";
        button.removeAttribute("disabled");
      }
    }

    // Enable the button if the current date and time is equal to or later than the activeDateTime
    const currentDateTime = new Date();
    if (currentDateTime >= activeDateTime) {
      button.removeAttribute("disabled");
    } else {
      setInterval(updateCountdown, 1000); // Update the countdown every second
    }
  </script>  <script>
    // Set the target day and time (year, month (0-11), day, hour, minute, second)
    const targetDate = new Date(2023, 6, 16, 12, 0, 0);

    // Update the timer text every second
    setInterval(updateTimerText, 1000);

    function updateTimerText() {
      // Get the current date and time
      const currentDate = new Date();

      // Calculate the time difference in milliseconds
      const timeDiff = targetDate.getTime() - currentDate.getTime();

      // Calculate the remaining days, hours, minutes, and seconds
      const daysLeft = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
      const hoursLeft = Math.floor((timeDiff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      const minutesLeft = Math.floor((timeDiff % (1000 * 60 * 60)) / (1000 * 60));
      const secondsLeft = Math.floor((timeDiff % (1000 * 60)) / 1000);

      // Format the timer text
      const timerText = `Dates to Go: ${daysLeft} days, ${hoursLeft} hours, ${minutesLeft} minutes, ${secondsLeft} seconds`;

      // Update the timer text with the remaining time
      document.getElementById("timer-text").textContent = timerText;
    }
  </script>
<script>
    // Update current event and time left
    function updateEventInfo() {
      const currentEventElement = document.getElementById('current-event');
      const timeLeftElement = document.getElementById('time-left');

      // Current event and time left logic goes here
      const currentTime = new Date(); // Get current time
      const reportingTime = new Date('2023-07-16T07:30:00'); // Replace with the actual reporting time
      const dispersalTime = new Date('2023-07-16T18:45:00'); // Replace with the actual dispersal time

      if (currentTime < reportingTime) {
        // Before reporting time
        currentEventElement.textContent = 'Reporting Time';
        timeLeftElement.textContent = calculateTimeDiff(currentTime, reportingTime);
      } else if (currentTime >= reportingTime && currentTime < dispersalTime) {
        // Between reporting time and dispersal time
        const events = [
          { time: reportingTime, name: 'Reporting Time' },
          { time: new Date('2023-07-16T07:30:00'), name: 'Delegate Registrations' },
          { time: new Date('2023-07-16T08:30:00'), name: 'Opening Ceremony' },
          { time: new Date('2023-07-16T09:45:00'), name: 'Session 0 (Orientation)' },
          { time: new Date('2023-07-16T10:30:00'), name: 'Session 1' },
          { time: new Date('2023-07-16T13:00:00'), name: 'Lunch' },
          { time: new Date('2023-07-16T14:00:00'), name: 'Session 2' },
          { time: new Date('2023-07-16T16:15:00'), name: 'Break' },
          { time: new Date('2023-07-16T16:30:00'), name: 'Session 3 (Drafting Session)' },
          { time: new Date('2023-07-16T17:15:00'), name: 'Comedy Night and Valedictory Ceremony' },
          { time: dispersalTime, name: 'Dispersal Time' }
        ];

        for (let i = 0; i < events.length - 1; i++) {
          if (currentTime >= events[i].time && currentTime < events[i + 1].time) {
            currentEventElement.textContent = events[i].name;
            timeLeftElement.textContent = calculateTimeDiff(currentTime, events[i + 1].time);
            break;
          }
        }
      } else {
        // After dispersal time
        currentEventElement.textContent = 'Conference Concluded';
        timeLeftElement.textContent = '00:00:00';
      }
    }

    // Calculate time difference
    function calculateTimeDiff(startTime, endTime) {
      const timeDiff = endTime - startTime;
      const hours = Math.floor(timeDiff / (1000 * 60 * 60));
      const minutes = Math.floor((timeDiff % (1000 * 60 * 60)) / (1000 * 60));
      const seconds = Math.floor((timeDiff % (1000 * 60)) / 1000);

      return `${padZero(hours)}:${padZero(minutes)}:${padZero(seconds)}`;
    }

    // Pad single digit numbers with leading zero
    function padZero(number) {
      return number.toString().padStart(2, '0');
    }

    // Update event info every second
    setInterval(updateEventInfo, 1000);
  </script>  
   <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
  <script>
    function generateMarkdown() {
      const markdownTable = `
| Time            | Event                             |
| --------------- | --------------------------------- |
| **7:30 am**     | **Reporting Time**                |
| 7:30 am onwards | Delegate Registrations            |
| 8:30 am - 9:30 am| Opening Ceremony                  |
| 9:45 am - 10:30 am| Session 0 (Orientation)           |
| 10:30 am - 1:00 pm| Session 1                          |
| 1:00 pm - 2:00 pm| Lunch                             |
| 2:00 pm - 4:15 pm| Session 2                          |
| 4:15 pm - 4:30 pm| Break                             |
| 4:30 pm - 5:30 pm| Session 3 (Drafting Session)       |
| 5:30 pm onwards | Comedy Night and Valedictory Ceremony |
| **6:45 pm**     | **Dispersal Time**                 |
`;

      const markdownPreview = document.getElementById('markdown-preview');
      const htmlTable = marked(markdownTable.trim());
      markdownPreview.innerHTML = htmlTable;
    }
  </script>

</body>


</html>
