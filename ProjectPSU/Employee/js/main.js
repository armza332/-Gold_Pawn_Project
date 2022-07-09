$(function () {
  $("#form-total").steps({
    headerTag: "h2",
    bodyTag: "section",
    transitionEffect: "fade",
    enableAllSteps: true,
    autoFocus: true,
    transitionEffectSpeed: 500,
    titleTemplate: '<div class="title">#title#</div>',
    labels: {
      previous: "Back",
      next: "Next",
      finish: "Confirm",
      current: "",
    },
    onStepChanging: function (event, currentIndex, newIndex) {
      var fullname =
        $("#title_name").val() +
        $("#first_name").val() +
        " " +
        $("#last_name").val();
      var Username = $("#iduser").val();
      var Password = $("#pass").val();
      var idcard = $("#citizen_id").val();
      var Email = $("#your_email_1").val();
      var Address = $("#address").val();
      var birthday = $("#birthday").val();
      var phone = $("#phone").val();
      
      $("#fullname_val").text(fullname);
      $("#citizen_val").text(idcard);
      $("#Username_val").text(Username);
      $("#Password_val").text(Password);
      $("#Emailuser").text(Email);
      $("#address_val").text(Address);
      $("#birthday_val").text(birthday);
      $("#phone_val").text(phone);
      

      return true;
    },
  });
  $("#day").datepicker({
    dateFormat: "mm - dd - yy",
    showOn: "both",
    buttonText: '<i class="zmdi zmdi-chevron-down"></i>',
  });
  $(".default_option").click(function(){
    $(".dropdown ul").addClass("active");
  });
  
});
