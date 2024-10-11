<script>
    let c_pass = document.getElementById('c_password-field');
    let pass = document.getElementById('password-field');
    let email = document.getElementById('email') ? document.getElementById('email') : '';
    let phone = document.getElementById('phone') ? document.getElementById('phone') : '';
    let name = document.getElementById('name');

    let passRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;
    let emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
    let phoneRegex = /^08[0-9]{9,10}$/;
    let timeoutId;
    let pawot = '';

    function validateConfirmPassword() {
        // Reset pesan error
        document.getElementById('checkMessage').classList.add('d-none');

        if (c_pass.value) {
            // Validasi konfirmasi password
            if (!passRegex.test(c_pass.value)) {
                c_pass.classList.add('border-danger');
                document.getElementById('checkMessage').classList.remove('d-none');
                document.getElementById('checkMessage').innerHTML = "Password minimal 8 huruf dan harus mengandung 1 huruf besar dan simbol";
            } 
            else if (c_pass.value.length < 8) {
                c_pass.classList.add('border-danger');
                document.getElementById('checkMessage').classList.remove('d-none');
                document.getElementById('checkMessage').innerHTML = "Minimal 8 huruf";
            } 
            else if (c_pass.value !== pawot) {
                c_pass.classList.add('border-danger');
                document.getElementById('checkMessage').classList.remove('d-none');
                document.getElementById('checkMessage').innerHTML = "Password dan konfirmasi password berbeda";
            } 
            else {
                // Jika validasi sukses
                c_pass.classList.remove('border-danger');
                c_pass.classList.add('border-success');
                document.getElementById('checkMessage').classList.add('d-none');
            }
        } else {
            // Jika input kosong
            c_pass.classList.remove('border-danger', 'border-success');
            document.getElementById('checkMessage').classList.add('d-none');
        }
    }

    c_pass.addEventListener('input', e => {
        clearTimeout(timeoutId);
        timeoutId = setTimeout(validateConfirmPassword, 500);
    });

    pass.addEventListener('input', e => {
        clearTimeout(timeoutId);
        timeoutId = setTimeout(() => {
            document.getElementById('passMessage').classList.add('d-none');

            if (pass.value) {
                pawot = pass.value;  // Update pawot dengan nilai terbaru dari password

                // Validasi password
                if (!passRegex.test(pass.value)) {
                    pass.classList.add('border-danger');
                    document.getElementById('passMessage').classList.remove('d-none');
                    document.getElementById('passMessage').innerHTML = "Password minimal 8 huruf dan harus mengandung 1 huruf besar dan simbol";
                } 
                else if (pass.value.length < 8) {
                    pass.classList.add('border-danger');
                    document.getElementById('passMessage').classList.remove('d-none');
                    document.getElementById('passMessage').innerHTML = "Minimal 8 huruf";
                } 
                else {
                    pass.classList.remove('border-danger');
                    pass.classList.add('border-success');
                    document.getElementById('passMessage').classList.add('d-none');
                }

                // Validasi ulang untuk c_pass setiap kali pass diubah
                validateConfirmPassword();
            } else {
                pass.classList.remove('border-danger', 'border-success');
                document.getElementById('passMessage').classList.add('d-none');
            }
        }, 500);
    });

    email.addEventListener('input', e => {
        clearTimeout(timeoutId);
        timeoutId = setTimeout(() => {
            document.getElementById('emailMessage').classList.add('d-none');

            if (email.value) {
                // Validasi email
                if (!emailRegex.test(email.value)) {
                    email.classList.add('border-danger');
                    document.getElementById('emailMessage').classList.remove('d-none');
                    document.getElementById('emailMessage').innerHTML = "Format email salah";
                } 
                else {
                    email.classList.remove('border-danger');
                    email.classList.add('border-success');
                    document.getElementById('emailMessage').classList.add('d-none');
                }
            } else {
                email.classList.remove('border-danger', 'border-success');
                document.getElementById('emailMessage').classList.add('d-none');
            }
        }, 500);
    });

    phone.addEventListener('input', e => {
        clearTimeout(timeoutId);
        timeoutId = setTimeout(() => {
            document.getElementById('phoneMessage').classList.add('d-none');

            if (phone.value) {
                // Validasi phone
                if (!phoneRegex.test(phone.value)) {
                    phone.classList.add('border-danger');
                    document.getElementById('phoneMessage').classList.remove('d-none');
                    document.getElementById('phoneMessage').innerHTML = "Mohon masukkan Nomor telepon anda dengan benar";
                } 
                else {
                    phone.classList.remove('border-danger');
                    phone.classList.add('border-success');
                    document.getElementById('phoneMessage').classList.add('d-none');
                }
            } else {
                phone.classList.remove('border-danger', 'border-success');
                document.getElementById('phoneMessage').classList.add('d-none');
            }
        }, 500);
    });
</script>  