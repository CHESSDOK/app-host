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

function convertToEmbed() {
  var url = document.getElementById('youtube-url').value;
  var videoId = url.split('v=')[1];
  if (videoId) {
      var ampersandPosition = videoId.indexOf('&');
      if (ampersandPosition != -1) {
          videoId = videoId.substring(0, ampersandPosition);
      }
      var embedUrl = "https://www.youtube.com/embed/" + videoId;
      document.getElementById('video-iframe').src = embedUrl;
      document.getElementById('video-iframe').style.display = "block";
      modal.style.display = "none";
  } else {
      alert("Invalid YouTube URL");
  }
}

// Burger menu functionality
document.getElementById('burger-btn').addEventListener('click', function() {
  document.getElementById('side-menu').style.right = "0";
});

document.getElementById('close-btn').addEventListener('click', function() {
  document.getElementById('side-menu').style.right = "-250px";
});
