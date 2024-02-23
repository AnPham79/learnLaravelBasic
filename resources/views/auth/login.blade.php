@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('process_login') }}" method="POST">
    @csrf
    email
    <br>
    <input type="text" name="email">
    <br>
    mật khẩu
    <br>
    <input type="password" name="password">
    <br>
    <button>Đăng nhập</button>
</form>