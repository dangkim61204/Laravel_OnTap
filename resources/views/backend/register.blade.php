<form method="POST" action="{{ url('/register') }}">
    <h2>form dang ky </h2>
    @csrf
    <input type="text" name="name" placeholder="name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Mật khẩu" required>
    <button type="submit">Đăng kys</button>
</form>
<a href="/login"><button>Đăng nhập</button></a>