// user input varaibles from form to check for errors 
const email = document.getElementById('email');
const form = document.getElementById('form');

// waits until user clicks submit to do following code
form.addEventListener('submit', (e) => {
    // errors will be used to count all errors if any
    var errors = 0

    // checks to make sure that user input an email
    if (email.value === '' || email.value == null) {
      errors = errors +1
      alert("Email is required!");
    }

    // checks to make sure that user input correct email
    else if ((!email.value.includes('mail.fresnostate.edu')) && (!email.value.includes('csufresno.edu'))) {
      errors = errors +1
      alert("Please use Fresno State Email.");
    }
    
    // preventDefault() stops page where .js code was called from refreshing until form is complete
    if (errors > 0) {
      e.preventDefault();
    }
})