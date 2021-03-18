$(document).ready(function () {

  //Name
  $('#name').keyup(function () {

    var input = $(this);
    var is_name = input.val();

    if (is_name.length < 3) {
      input.removeClass("valid").addClass("invalid");
      input.next().removeClass("error").addClass("error_show").text("Should be more than 3 Characters");
    }

    else if (is_name.length >= 3) {
      if (/^[A-Za-z ]+$/.test(is_name)) {
        input.removeClass("invalid").addClass("valid");
        input.next().removeClass("error_show").addClass("error");
      }

      else {
        input.removeClass("valid").addClass("invalid");
        input.next().removeClass("error").addClass("error_show").text("Should not contain any number");
      }

    }

    else {
      input.removeClass("valid").addClass("invalid");
      input.next().removeClass("error").addClass("error_show").text("Should be less than 10 Characters");

    }

  });

  //Email
  $('#email').keyup(function () {
    var input = $(this);
    var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    var is_email = re.test(input.val());
    if (is_email) {
      input.removeClass("invalid").addClass("valid");
      input.next().removeClass('error_show').addClass('error');
    }

    else {
      input.removeClass("valid").addClass("invalid");
      input.next().removeClass('error').addClass('error_show');
    }
  });
  /*
  //Gender
  $('#male').prop("checked",true);
  $('#gender').removeClass("invalid").addClass("valid");*/

  //Contact Number
  $('#phone').keyup(function () {

    var input = $(this);
    var is_phone = input.val();


    if (is_phone.match(/^[0-9]+$/) == null) {
      input.removeClass("valid").addClass("invalid");
      input.next().removeClass('error').addClass('error_show').text("There should be only numbers");
    }

    else if (is_phone.length != 10) {
      input.removeClass("valid").addClass("invalid");
      input.next().removeClass('error').addClass('error_show').text("Contact number should be of 10 digits");
    }

    else {
      input.removeClass("invalid").addClass("valid");
      input.next().removeClass("error_show").addClass("error");
    }

  });


  //Address
  $('#addr').keyup(function () {

    var input = $(this);
    var is_name = input.val();
    if (is_name.length < 10) {
      input.removeClass("valid").addClass("invalid");
      input.next().removeClass('error').addClass('error_show').text("Should be more than 10 Characters");
    }

    else {
      input.removeClass("invalid").addClass("valid");
      input.next().removeClass("error_show").addClass("error");
    }

  });


  //Educational Qualification
  $('#education').change(function () {

    var education = $(this);
    var education_value = education.val();

    if (education_value == 0) {

      education.removeClass("valid").addClass("invalid");
      education.next().removeClass("error").addClass("error_show");
    }

    else {

      education.removeClass("invalid").addClass("valid");
      education.next().removeClass("error_show").addClass("error");
    }

  });

  //About
  $('#about').keyup(function () {

    var about = $(this);
    var is_about = about.val();

    if (is_about.length >= 10) {
      about.removeClass("invalid").addClass("valid");
      about.next().removeClass("error_show").addClass("error");
    }

    else {
      about.removeClass("valid").addClass("invalid");
      about.next().removeClass("error").addClass("error_show").text("Should be more than 10 Characters");
    }

  });





  $("#submit").click(function (event) {

    // Skills
    /*
    var checked = false;
    $(".checkboxvar").each(function(index){
      skills = $('.checkboxvar');
      
      if($(this).is(':checked'))
      {
        checked = true;
      } 
    });
  
    if (checked == false) {
  
      skills.removeClass("valid").addClass("invalid");
      skills.next().removeClass("error").addClass("error_show");
    }
  
    else
    {
      skills.removeClass("invalid").addClass("valid");
      skills.next().removeClass("error_show").addClass("error");
    }
    console.log(skills);*/

    //File
    var file = $('#file');
    var is_file = file.val();

    if (is_file) {
      file.removeClass("invalid").addClass("valid");
      file.next().removeClass("error_show").addClass("error");
    }

    else {
      file.removeClass("valid").addClass("invalid");
      file.next().removeClass('error').addClass('error_show');

    }

    // Validation on submit
    var form_data = $("#signup").serializeArray();
    //console.log(form_data);
    var error_free = true;


    for (var input in form_data) {
      var element = $('#' + form_data[input]['name']);
      var valid = element.hasClass("valid");
      var error_element = $("span", element.parent());
      if (!valid) { error_element.removeClass("error").addClass("error_show"); error_free = false; }
      if (error_free == false)
        console.log(element);
      else { error_element.removeClass("error_show").addClass("error"); }

    }
    if (!error_free) {
      console.log("error_show");
      event.preventDefault();
    }
    else {
      console.log("submitted");
      alert('No errors: Form will be submitted');
    }

  });
});




