<form action="{{ route('student.update', ['student' => $student->id ])}}" method="POST">
    @csrf
    @method('PUT')
    <br>
    Họ sinh viên
    <br>
    <input type="text" name="hosinhvien" value="{{ $student->hosinhvien }}">
    <br>
    Tên sinh viên
    <br>
    <input type="text" name="tensinhvien" value="{{ $student->tensinhvien }}">
    <br>
    Ngày sinh
    <br>
    <input type="date" name="ngaysinh" value="{{ $student->ngaysinh }}">
    <br>
    Giới tính
    <br>
    <input type="radio" name="gioitinh" value="1" {{ $student->gioitinh == 1 ? 'checked' : '' }}> Nam
    <input type="radio" name="gioitinh" value="2" {{ $student->gioitinh == 2 ? 'checked' : '' }}> Nữ
    <br>

    <button>Sửa</button>
</form>