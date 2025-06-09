<style>
    .login-form {
        max-width: 400px;
        margin: 50px auto;
        padding: 30px;
        background: #f8f8f8;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        font-family: Arial, sans-serif;
    }

    .login-form h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .login-form input {
        width: 100%;
        padding: 10px;
        margin-top: 10px;
        margin-bottom: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    .login-form .text-danger {
        color: red;
        font-size: 0.9em;
        margin-bottom: 10px;
    }

    .login-form button {
        width: 100%;
        padding: 10px;
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 5px;
        font-weight: bold;
        cursor: pointer;
        margin-top: 15px;
    }

    .login-form button:hover {
        background-color: #218838;
    }
</style>

 
<form method="POST" action="{{ route('postlogin') }}" class="login-form">
    <h2>Đăng nhap</h2>
    @csrf
  @if (session('message'))
    <div style="color: red; margin-bottom: 10px;">
        {{ session('message') }}
    </div>
@endif
 
    <input type="email" name="email"  placeholder="Email" >
    @error('email')
        <div class="text-danger">{{ $message }}</div>
    @enderror
    <input type="password" name="password"  placeholder="Mật khẩu" >
    @error('password')
        <div class="text-danger">{{ $message }}</div>
    @enderror


    <button type="submit">Đăng nhap</button>
</form>
