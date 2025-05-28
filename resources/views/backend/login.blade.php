<form method="POST" action="{{ url('/login') }}">
     <h2>form dang nhap </h2>
    @csrf
 @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Mật khẩu" required>
    <button type="submit">Đăng nhập</button>
    
</form>
<a href="/register"><button>Đăng ky</button></a>
