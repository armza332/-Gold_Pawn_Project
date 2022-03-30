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
        var asset1 = $("#pawn_type_1").val();
        var returnqty = $("#return_qty").val()+' '+'ชิ้น';
        var weight1 = $("#pawn_weight_1").val()+' '+'กรัม';
        var empid = $("#emp_id").val();
        var cusid = $("#cus_id").val();
        var pawnid = $("#pawn_id").val();
        var redate = $("#re_date").val(); 
        var pawnnet1 = $("#pawn_net_1").val()+' '+'บาท';
        var asset2 = $("#pawn_type_2").val();
        var pawnqty2 = $("#pawn_qty_2").val()+' '+'ชิ้น';
        var weight2 = $("#pawn_weight_2").val()+' '+'กรัม';
        var pawnnet2 = $("#pawn_net_2").val()+' '+'บาท';
        var pawndate = $("#pawn_date").val();
        var expdate = $("#exp_date").val();
        var pawnannotation = $("#pawn_annotation").val();
        
        $("#asset1_val").text(asset1);
        $("#empid_val").text(empid);
        $("#cusid_val").text(cusid);
        $("#pawnid_val").text(pawnid);
        $("#redate_val").text(redate);
        $("#returnqty_val").text(returnqty);
        $("#weight1_val").text(weight1);
        $("#pawnnet1_val").text(pawnnet1);
        $("#asset2_val").text(asset2);
        $("#pawnqty2_val").text(pawnqty2);
        $("#weight2_val").text(weight2);
        $("#pawnnet2_val").text(pawnnet2);
        $("#pawndate_val").text(pawndate);
        $("#expdate_val").text(expdate);
        $("#pawnannotation_val").text(pawnannotation);
        
  
        return true;
      },
    });
    $("#re_date").datepicker({
      dateFormat: "mm - dd - yy",
      showOn: "both",
      buttonText: '<i class="zmdi zmdi-chevron-down"></i>',
    });
    $("#exp_date").datepicker({
        dateFormat: "mm - dd - yy",
        showOn: "both",
        buttonText: '<i class="zmdi zmdi-chevron-down"></i>',
      });
  });
 