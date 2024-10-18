<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Dashboard - Bara FM</title>
    
        <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">  
        <link rel="stylesheet" href="{{ asset('dist/assets/compiled/css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/assets/compiled/css/app-dark.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/assets/compiled/css/iconly.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

        <style>
            textarea{
                color: black
            }

            #like-btn:focus {
                outline: none; /* Hilangkan outline saat elemen fokus */
                box-shadow: none; /* Hilangkan efek shadow */
            }

            .add-to-like, .option {
                color: transparent;
            }
    
            .hoverbutton:hover .add-to-like, .hoverbutton:hover .option {
                color: white;
            }

            .hoverbutton{
                transition: all 0.2s ease-in;
            }

            .hoverbutton:hover {
                background: rgb(70, 70, 70);
                transform: scale(1.02);
            }

        </style>
    </head>
    <body class="bg-dark">
        {{ $slot }}


        </script>
        <script src="{{ asset('dist/assets/static/js/components/dark.js') }}"></script>
        <script src="{{ asset('dist/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('dist/assets/compiled/js/app.js') }}"></script>
        <script src="{{ asset('dist/assets/static/js/pages/dashboard.js') }}"></script>
        <script>
            document.getElementById('like-btn').addEventListener('click',function(){
                let id = document.getElementById('likedsong').value;
                console.log(id)
                fetch('/user/like', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        song_id: id  // Kirim song_id sebagai song_id, bukan 'like'
                    })
                }).then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                }).then(data => {
                    console.log('Song like status updated:', data);
                }).catch(error => {
                    console.error('Error:', error.message);
                });
            })
        </script>
    </body>
</html>