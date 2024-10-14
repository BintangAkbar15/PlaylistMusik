
@if ($errors->any())
@foreach ($errors->all() as $item)
    <div class="alert alert-danger">
        {{ $item }}
    </div>
@endforeach
<script>
    const alert = document.querySelector('.alert');
    setTimeout(() => {
    alert.style.display = 'none';
    }, 3000);
</script>
@endif
@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
<script>
    const alert = document.querySelector('.alert');
    setTimeout(() => {
    alert.style.display = 'none';
    }, 3000);
</script>
@endif
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
<script>
    const alert = document.querySelector('.alert');
    setTimeout(() => {
    alert.style.display = 'none';
    }, 3000);
</script>
@endif