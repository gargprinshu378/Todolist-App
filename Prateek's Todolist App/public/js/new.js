$(document).ready(function() {
  // Event handler for keyup event on #Email input
  $('#Email').on('keyup', function() {
      var Email = $(this).val();

      // AJAX call to validate email using /Account/validateEmailAction endpoint
      $.get('/Account/validateEmailAction?Email=' + Email, function(data) {
          if (data) {
              $('#Email').removeClass('is-invalid');
          } else {
              $('#Email').addClass('is-invalid');
          }
      });
  });

  // Event handler for form submit event
  $('form').submit(function(event) {
      var Name = $('#Name').val();
      var Password = $('#Password').val();
      var Confirm_Password = $('#Confirm_Password').val();
      var Email = $('#Email').val();

      // Validate name input: allow only letters
      if (!/^[A-Za-z ]+$/.test(Name)) {
          event.preventDefault();
          alert('Name must contain only letters');
          return;
      }

      // Validate password input: at least 6 characters with one letter and one number
      if (!/(?=.*[A-Za-z])(?=.*\d).{6,}/.test(Password)) {
          event.preventDefault();
          alert('Password must be at least 6 characters long and contain at least one letter and one number');
          return;
      }

      // Validate repeat password input: must match password
      if (Password !== Confirm_Password) {
          event.preventDefault();
          alert('Passwords do not match');
          return;
      }

      // Check if email is valid by checking for 'is-invalid' class
      if ($('#Email').hasClass('is-invalid')) {
          event.preventDefault();
          alert('Email is already taken');
          return;
      }
  });
});
