    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
<h1>welcome</h1>

<form action="{{ route('auth.logout') }}" method="POST" style="display: inline;">
    @csrf
    <button type="submit">Thoát</button>
</form>