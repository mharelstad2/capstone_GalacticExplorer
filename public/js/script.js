function openModal () {
  if (document.getElementById ('modalImage').src != undefined) {
    document.getElementById ('myModal').style.display = 'block';
    document.getElementById ('modalImage').src = event.target.src;

    // Show the close span
    document.getElementById('close').style.display = 'block';
  }
}


function closeModal () {
  document.getElementById('myModal').style.display = 'none';
}

// JavaScript function for the back button
function goBack () {
  window.history.back ();
}
