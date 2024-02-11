<h1>Đây là danh sách sinh viên</h1>

<br>

<a href="{{ route('student.create') }}">
    Thêm sinh viên
</a>

<br>

<table border="1" width="100%">
    <tr>
        <td>#</td>
        <td>Tên</td>
        <td>Ngày sinh</td>
        <td>giới tính</td>
        <td>Xóa</td>
    </tr>
    @foreach ($student as $each)
    <tr>
        <td>{{ $each->id }}</td>
        <td>{{ $each->getFullNameAttribute() }}</td>
        <td>{{ $each->getAgeAttribute() }}</td>
        <td>{{ $each->getGender() }}</td>
        <td>
            <form action="{{ route('student.destroy',['student' => $each->id] ) }}" method="POST">
                @csrf
                @method('DELETE')
                <button>Xóa sinh viên</button>
            </form>
        </td>
    </tr>
    @endforeach   
</table>