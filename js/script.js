$(document).ready(function() {
  $('#form').submit(function(e) {
    e.preventDefault();

    if($('#message').val() == '' || $('#name').val() == '') {
      $('.errormsg').html('<p id="error">Please fill in both fields</p>');
    } else {
      var message = $('#message').val();
      var name = $('#name').val();
  
      $.ajax({
        url: 'src/post.php',
        type: 'POST',
        data: "message=" + message + "&name=" + name,
        cache: false,
        success: function() {
          $('#message').val('');
          $('#name').val('');
          $('.errormsg').html('');
        }
      });
    }
  });

  function getPosts() {
    $.ajax({
      url: 'src/get.php',
      type: 'GET',
      cache: false,
      success: function(html) {
        if(html.trim() == '') {
          $('.posts').html('<p id="notice">No posts</p>');
        } else {
          $('.posts').html(html);
        }
      }
    });
  }

  setInterval(getPosts, 10);
});