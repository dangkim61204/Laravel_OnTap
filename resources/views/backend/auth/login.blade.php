<form method="POST" action="{{ url('/login') }}">
    @csrf
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Mật khẩu" required>
    <button type="submit">Đăng nhập</button>
</form>