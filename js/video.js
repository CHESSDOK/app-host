document.getElementById('Categ').addEventListener('change', function() {
  var selectedOption = this.options[this.selectedIndex].text;
  document.getElementById('output').innerText = selectedOption;
});

// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("add-video-btn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

function closeModal() {
  document.getElementById('myModal').style.display = "none";
}

function convertToEmbed() {
  var youtubeUrl = document.getElementById('youtube-url').value;
  var embedUrl = youtubeUrl.replace("watch?v=", "embed/");

  // Create or get the table
  var table = document.getElementById("video-table");
  if (!table) {
    table = document.createElement("table");
    table.id = "video-table";
    document.getElementById("video-container").appendChild(table);
  }

  // Check if new row needed
  var rowCount = table.rows.length;
  if (rowCount == 0 || table.rows[rowCount - 1].cells.length >= 5) {
    // Create a new row
    var newRow = table.insertRow(rowCount);
  } else {
    // Use the last row
    var newRow = table.rows[rowCount - 1];
  }

  // Create a new cell for the video
  var newCell = newRow.insertCell();
  newCell.innerHTML = '<iframe src="' + embedUrl + '" width="250" height="140" frameborder="0" allowfullscreen></iframe>';

  // Send AJAX request to PHP script
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "../php/videos.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      console.log(xhr.responseText); // Handle response from the server
    }
  };

  // Data to send in the request
  var params = "category=" + encodeURIComponent(document.getElementById('output').innerText) +
               "&youtube_url=" + encodeURIComponent(youtubeUrl);
  xhr.send(params);

  closeModal();
}

function fetchVideos() {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "../php/vidfet.php", true);
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      var videos = JSON.parse(xhr.responseText);
      var videoContainer = document.getElementById("video-container");

      var table = document.createElement("table");
      table.id = "video-table";

      videos.forEach(function(video, index) {
        if (index % 5 === 0) {
          var row = table.insertRow();
        } else {
          var row = table.rows[table.rows.length - 1];
        }

        var cell = row.insertCell();
        cell.innerHTML = '<iframe src="' + video.embed_url + '" width="250" height="140" frameborder="0" allowfullscreen></iframe>';
      });

      videoContainer.appendChild(table);
    }
  };
  xhr.send();
}

// Fetch and display videos when the page loads
window.onload = function() {
  fetchVideos();
};
// menu
document.addEventListener("DOMContentLoaded", function () {
  const burgerBtn = document.getElementById("burger-btn");
  const sideMenu = document.getElementById("side-menu");
  const closeBtn = document.getElementById("close-btn");
  const logoutBtn = document.getElementById("logout");

  burgerBtn.addEventListener("click", function () {
    sideMenu.style.right = "0";
  });

  closeBtn.addEventListener("click", function () {
    sideMenu.style.right = "-250px";
  });

  logoutBtn.addEventListener("click", function () {
    // Add your logout functionality here
    console.log("Logout clicked");
  });
});
