var chat={};
/////////////////////////////////////////////
chat.entry = $('.chat .entry');
chat.entry.bind('keydown' , function(e) {
//  console.log(e.keyCode);
    if(e.keyCode === 13 && e.shiftKey === false){  //enter = 13 // placeholder>> textarea
      chat.throwMessage($(this).val());
      e.preventDefault();
    }
});
//////////////////////

chat.fetchMessages = function(){
  $.ajax({
    url:'js/ajax/ajax_chat.php', //who to contact?
    type: 'POST',
    data: {method: 'getMyData'}, // send variable ?method=getMyData by POST
    success: function(data){ // if success
          $('.chat .messages').html(data); // where to inport the data
    }
  });
}

chat.throwMessage = function(message){
  if($.trim(message).lenght!=0){
        $.ajax({
          url:'js/ajax/ajax_chat.php',  //who to contact?
          type: 'POST',
          data: {method: 'posalji', poruka: message}, // send variable ?method=getMyData by POST
          success: function(data){ // if success
            chat.fetchMessages(); // refresh
            chat.entry.val('');
          }
        });
  }
}

chat.fetchMessages(); //da preuzme odma, ne da ceka interval pa posle
chat.interval = setInterval(chat.fetchMessages, 5000);//svakih 5 sekundi
