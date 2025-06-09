<style>
    .register-form {
        max-width: 400px;
        margin: 50px auto;
        padding: 30px;
        background: #f8f8f8;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        font-family: Arial, sans-serif;
    }

    .register-form h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .register-form input {
        width: 100%;
        padding: 10px;
        margin-top: 10px;
        margin-bottom: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    .register-form .text-danger {
        color: red;
        font-size: 0.9em;
        margin-bottom: 10px;
    }

    .register-form button {
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

    .register-form button:hover {
        background-color: #218838;
    }
</style>
 @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    
    @endif

<form method="POST" action="{{ route('postregister') }}" class="register-form">
    <h2>Đăng ký tài khoản</h2>
    @csrf
   
    <input type="text" name="name" value="{{ old('name') }}" placeholder="Tên đầy đủ" >
    @error('name')
        <div class="text-danger">{{ $message }}</div>
    @enderror

    <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" >
    @error('email')
        <div class="text-danger">{{ $message }}</div>
    @enderror

    <input type="password" name="password"  placeholder="Mật khẩu" >
    @error('password')
        <div class="text-danger">{{ $message }}</div>
    @enderror

    <input type="password" name="password_confirmation" placeholder="Xác nhận mật khẩu" >
    @error('password_confirmation')
        <div class="text-danger">{{ $message }}</div>
    @enderror

    <button type="submit">Đăng ký</button>
</form>
