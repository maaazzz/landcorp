   $('#frmAdd').on('submit', function(event) {
       var form = $('#frmAdd');

       if (form[0].checkValidity() === false) {
           event.preventDefault()
           event.stopPropagation()
           form.addClass('was-validated');
           $('html,body').animate({ scrollTop: $('.was-validated .form-control:invalid').first().offset().top - 50 }, 'slow');
       }

   });