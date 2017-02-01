$(document).ready(function(){

  //Change color of navbar when scroler reach < 765px
  $(window).scroll(function(){
    if ($(document).scrollTop()>765){
      $("#nav").css('background','#286090').css("border","1px solid #286090");
    }else{
      $("#nav").css('background','black').css("border", "1px solid black");
    }
  });

  // Scroll to section bellow when click button
  $(".link").click(function() {
    var offset = 20; //Offset of 20px
    $('html, body').animate({
        scrollTop: $("#scroll-point").offset().top + offset
    }, 800);

  });

//APPLICATION FUNCTIONS AND EVENT HANDLERS//

function clearAll(){
  $.ajax({
    type:'GET',
    url:'clearAllItems.php'

  }).done(function(response){
    var res = JSON.parse(response);
    if(res.success){
      $('#display-alert-success').html(res.info).removeClass('hidden');
      setTimeout(function(){
        $('#display-alert-success').html("").addClass('hidden');
      },3000);
    }else if(!res.success){
      $('#display-alert-error').html(res.info).removeClass('hidden');
      setTimeout(function(){
        $('#display-alert-error').html("").addClass('hidden');
      },3000);
    }
  }).fail(function(response){
    $('#display-alert-error').html("Clear all items unsuccessful, please try again!").removeClass('hidden');
      setTimeout(function(){
      $('#display-alert-error').html("").addClass('hidden');
    },3000);
  }).always(function(){
    $('#modal-clear-all').modal('hide');
  });
  getAllTodos();
}

function showDeleteModal(id){
  //Fetched item id and set attribute value to id
  $('#modal-delete-id').attr('value',id);
  $('#modal-delete').modal('show');
}

function deleteItem(id){

  $.ajax({
    url:"deleteItem.php",
    type:"POST",
    data:{item: id}
  }).done(function(response){
    var res = JSON.parse(response);
    if(res.success){
      getAllTodos();

      $('#display-alert-success').html(res.info).removeClass('hidden');
      setTimeout(function(){
        $('#display-alert-success').html("").addClass('hidden');
      },3000);

    }else if(!res.success){
      $('#display-alert-error').html(res.info).removeClass('hidden');
      setTimeout(function(){
        $('#display-alert-error').html("").addClass('hidden');
      },3000);
    }

  }).fail(function(response){
    $('#display-alert-error').html("Delete process unsuccessful, please try again!").removeClass('hidden');
      setTimeout(function(){
      $('#display-alert-error').html("").addClass('hidden');
    },3000);
  }).always(function(){
    $('#modal-delete').modal('hide');
  });
}

function editItem(object){
  $.ajax({
    type:'POST',
    url:'editItem.php',
    data: object
  }).done(function(response){
    var res = JSON.parse(response);
    if(res.success == true){
      getAllTodos();
      $('#display-alert-success').html(res.info).removeClass('hidden');
      setTimeout(function(){
        $('#display-alert-success').html("").addClass('hidden');
      },3000);
    }else if(res.success == false){
      $('#display-alert-error').html(res.info).removeClass('hidden');
      setTimeout(function(){
        $('#display-alert-error').html("").addClass('hidden');
      },3000);
    }
  }).fail(function(response){
    $('#display-alert-error').html("An expected error, please try again!").removeClass('hidden');
    setTimeout(function(){
      $('#display-alert-error').html("").addClass('hidden');
    },3000);
  }).always(function(){
    $('#modal-edit').modal('hide');
  });

}


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

function activaTab(tab){
  $('.nav-tabs a[href="#' + tab + '"]').tab('show');
};

function getAllTodos(){

  $.ajax({
    type:'GET',
    url:'getItems.php'

  }).done(function(response){
    var res = JSON.parse(response);
    if(res.success){
      //console.log(res.items);
      var items = res.items;
      var text ="";
      for(var i=0; i < items.length; i++ ){
        //items[i]
        // console.log(items[i].id);
        // console.log(items[i].title);
        // console.log(items[i].description);
       text += "<div class='panel panel-primary'>"
       + "<div class='panel-heading'>"
       + "<h3 class='panel-title' data-id='"+items[i].id+"''>"+items[i].title+"</h3>"
       + "</div>"
       + "<div class='panel-body' data-id='"+items[i].id+"'>"+items[i].description
       + "</div>"
       + "<div class='panel-footer panel-primary'>"
       + "<button data-id='"+items[i].id+"' class='btn btn-success todo-item-edit '>Edit</button>&nbsp;"
       + "<button data-id='"+items[i].id+"' class='btn btn-danger todo-item-delete '>Delete</button>"
       + "</div>"
       + "</div>";
      }
       $('#all-todos-display').html(text);

    }else if(!res.success){
      var info = "<div class='alert alert-info text-center' role='alert'>"
        +  "<strong>You don't have any added task yet. <br />Why not to add one?</strong>"
        +  " Click New todo!"
        +  "</div>";
      $('#all-todos-display').html(info);
    }

  }).fail(function(response){
    $('#display-alert-error').html("An expected error, please try again!").removeClass('hidden');
    setTimeout(function(){
      $('#display-alert-error').html("").addClass('hidden');
    },3000);
  });
}

  getAllTodos();

//Click Delete ITEM button - event handler, get item id and call out function showDeleteModal() wchich store item id in hidden modal field
$(document).on('click', '.todo-item-delete', function(){
  var id = $(this).attr('data-id');
  showDeleteModal(id);
});
//Click delete modal button - event handler,get item id from hidden field form modal and call out function deleteItem()
$('#modal-delete-button').click(function(){
    var id = $('#modal-delete-id').attr('value');
    deleteItem(id);
});

//Click Edit ITEM button - event handler, fetch id, title and description from panel and store them in hidden modal fields, show modal
$(document).on('click','.todo-item-edit', function(){
  var id = $(this).attr('data-id');
  var title = $('.panel-title[data-id="'+id+'"]').html();
  var description = $('.panel-body[data-id="'+id+'"]').html();
  $('#modal-edit-id').attr('value',id);
  $('#modal-edit-title').attr('value',title);
  $('#modal-edit-description').attr('value',description);
  $('#modal-edit').modal('show');
});
//Click Edit Item button in modal - event handler, fetch value of id, title, description and pass it to function
$('#modal-edit-button').click(function(){
  var id = $('#modal-edit-id').val();
  var title = $('#modal-edit-title').val();
  var description = $('#modal-edit-description').val();
  var object = {id: id, title: title, description: description};
  editItem(object);
});

//Click CLEAR ALL ITEMS button - event handler
$('#btn-clear').click(function(){
  clearAll();
});


//Click ADD ITEM button - event handler//
$('#new-todo-submit').click(function(){
 var title = $('#new-todo-title').val();
 var description = $('#new-todo-description').val();

 if(isEmpty(title) == true || isEmpty(description) == true){
   $("#new-todo-info-error").html("Please complete your form prior submitting!").removeClass("hidden");

   setTimeout(function(){
     $("#new-todo-info-error").html("").addClass("hidden");
   }, 3000);

 }else{

  $.ajax({
    url:"addNewItem.php",
    type:"POST",
    data:{title: title, description: description}
  }).done(function(response){
    var res = JSON.parse(response);
    if(res.success){
    activaTab("all-todos-tab");
    resetForm('#new-todo-form');
    getAllTodos();

    } else if(!res.success){
       $('#display-alert-error').html(res.info).removeClass('hidden');
       setTimeout(function(){
         $('#display-alert-error').html("").addClass('hidden');
       },3000);
    }

  }).fail(function(response){
    $('#display-alert-error').html("An expected error, please try again!").removeClass('hidden');
    setTimeout(function(){
      $('#display-alert-error').html("").addClass('hidden');
    },3000);
  });
 }

});

//Click RESET button - event handler
$('#new-todo-reset').click(function(){
  resetForm('#new-todo-form');

});

});
