<h2>Đăng kí</h2>
<form action="{{ route('process_register') }}" method="POST">
    @csrf
    name
    <br>
    <input type="text" name="name">
    email
    <br>
    <input type="text" name="email">
    <br>
    <input type="text" name="password">
    <br>
    <button>Đăng kí</button>
</form>