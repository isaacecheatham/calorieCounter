 
    $('#inputNew').on('click', function(e) { 
      $('.form-horizontal').addClass('hide')
      $('.form-horizontal').removeClass('content')
      $('#inputForm').addClass('content')
      $('#inputForm').removeClass('hide')
      e.preventDefault();
    });

    $('#update').on('click', function(e) { 
      $('.form-horizontal').addClass('hide')
      $('.form-horizontal').removeClass('content')
      $('#updForm').addClass('content')
      $('#updForm').removeClass('hide')
      e.preventDefault();
    });

    $('#history').on('click', function(e) {
      $('.form-horizontal').addClass('hide')
      $('.form-horizontal').removeClass('content')
      $('#histForm').addClass('content')
      $('#histForm').removeClass('hide')
      e.preventDefault();
    });

