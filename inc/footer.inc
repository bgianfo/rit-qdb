<div id="dialog">
<form id="form">
<strong>User:</strong></br> <input size="10" id="user-input" name="user" type="text"></br>
    <strong>Quote</strong></br>
    <textarea id="quote-input" rows="4" cols="60" name="quote">
    </textarea></br>
</form>
</div>
<div id="result">
</div>
<script>
     
$("#dialog").dialog({
        bgiframe: true,
        autoOpen: false,
        height: 250,
        width: 465,
        title: "Add Quote",
        modal: true,
        buttons: { 'Post Quote': function () {
            $.post('post.php',
                $("#form").serialize(),
                function(data,status){
                    $("#result").html(data)
                }

            );
            $('#quote-input').val('');
            $('#user-input').val('');
            $(this).dialog('close');
            },Cancel: function() {
                $(this).dialog('close');
            }
        },
        close: function() {
        }
});



$('#add-quote').click(function() {
    $('#dialog').dialog('open');
    }).hover(
          function(){ 
             $(this).addClass("ui-state-hover"); 
          },
          function(){ 
             $(this).removeClass("ui-state-hover"); 
          }
      ).mousedown(function(){
         $(this).addClass("ui-state-active"); 
      })
       .mouseup(function(){
         $(this).removeClass("ui-state-active");
      });
$(document).ready( function(){
    $('.q-container').corners("4px");
    $('.quote-title').corners("3px top");
    $('.ui-icon').click( function() {
        var urlstring = "vote.php?id="+$(this).attr("id");
        console.log(urlstring);
        $.ajax({ url: urlstring,
                 type: "POST",
                 data: "id="+$(this).attr("id"),
                 success: function(html) {
                    $("#score").html("score: "+(parseInt($('#score').attr("class"))+1));
                 }
        });
        $(this).addClass('ui-icon-check');
        $(this).unbind('click');
    });
});
</script>

<div id="footer">
    No &copy; just love.
</div>
</body>
</html>
