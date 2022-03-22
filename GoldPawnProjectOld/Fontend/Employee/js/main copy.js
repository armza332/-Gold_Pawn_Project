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
        $("#title").val() +
        $("#firstname").val() +
        " " +
        $("#lastname").val();
      var Password = $("#password").val();
      var idcard = $("#idcard").val();
      var Email = $("#email").val();
      var Address = $("#address").val();
      var birthday = $("#birthday").val();
      var phone = $("#phonenumber").val();
      
      $("#fullname_val").text(fullname);
      $("#idcard_val").text(idcard);
      $("#password_val").text(Password);
      $("#email_val").text(Email);
      $("#address_val").text(Address);
      $("#birthday_val").text(birthday);
      $("#phonenumber_val").text(phone);
      

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
