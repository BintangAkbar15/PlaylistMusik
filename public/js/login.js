let checkbox = document.getElementById('showpass');
let seepass = document.getElementById('password-field');
let seecpass = document.getElementById('c_password-field');

document.getElementById('container-showpass').addEventListener('click', function() {
    // Directly check the state of the checkbox
    if(checkbox.checked) {
        seepass.setAttribute('type', 'text');
        seecpass.setAttribute('type', 'text');
    } else {
        seepass.setAttribute('type', 'password');
        seecpass.setAttribute('type', 'password');
    }
});
