$ = jQuery.noConflict();


function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#output_banner').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

  $("#input_banner").change(function() {
    readURL(this);
  });

  $("#btn_cancel").click(function() {
    $("#output_banner").attr("src", "http://via.placeholder.com/520x295")
  });
  