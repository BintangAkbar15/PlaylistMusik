let checkbox = document.getElementById('showpass');
let seepass = document.getElementById('password-field');
document.getElementById('container-showpass').addEventListener('click', function(){
    checkbox.checked != checkbox.checked
    
    if(checkbox.checked == 1){
        seepass.setAttribute('type', 'text');
    }else{
        seepass.setAttribute('type', 'password');
    }
})