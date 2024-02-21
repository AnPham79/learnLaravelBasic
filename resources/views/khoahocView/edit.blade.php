@include('layout.header')

@section('title')

Thêm sinh viên tại đây
<br>
<form action="{{ route('courses.update', $courses)}}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ $courses->name }}">
    <br>
    <button>Sửa</button>
</form>

@include('layout.footer')