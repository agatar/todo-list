$(document).ready(function(){

  //Change color of navbar when scroler reach 50
  $(window).scroll(function(){
    if ($(document).scrollTop()>765){
      $("#nav").css('background','#286090').css("border","1px solid #286090");
    }else{
      $("#nav").css('background','black').css("border", "1px solid black");
    }
  });

  // Scroll to section bellow when click button
  $(".link").click(function() {
    var offset = 5; //Offset of 20px
    $('html, body').animate({
        scrollTop: $("#con-icons").offset().top + offset
    }, 800);

});

//APPLICATION FUNCTIONS AND EVENT HANDLERS//

function isEmpty(value){
  if(value == ""){
    return true;
  }else{
    return false;
  }
}

function resetForm(formId){
  $(formId)[0].reset();
}

//Click ADD ITTEM button - event handler//
$('#new-todo-submit').click(function(){
 var title = $('#new-todo-title').val();
 var description = $('#new-todo-description').val();

 if(isEmpty(title) == true || isEmpty(description) == true){
   console.log('Wypelnij pola formularza');
   $("#new-todo-info-error").html("Please complete your form prior submitting!").removeClass("hidden");

   setTimeout(function(){
     $("#new-todo-info-error").html("").addClass("hidden");
   }, 3000);

 }else{
   console.log('ajax');

 }
});

//RESET event handler//
$('#new-todo-reset').click(function(){
  resetForm('#new-todo-form');

});

});
