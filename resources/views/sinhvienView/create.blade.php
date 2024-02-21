@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('student.store')}}" method="POST">
    @csrf
    Thêm sinh viên tại đây
    <br>
    Họ sinh viên
    <br>
    <input type="text" name="hosinhvien">
    <br>
    Tên sinh viên
    <br>
    <input type="text" name="tensinhvien">
    <br>
    Ngày sinh
    <br>
    <input type="date" name="ngaysinh">
    <br>
    Giới tính
    <br>
    <input type="radio" name="gioitinh" value="1">Nam
    <input type="radio" name="gioitinh" value="2">Nữ
    <br>
    <button>Thêm</button>
</form>