<h1>Đây là danh sách sinh viên</h1>

<table border="1" width="100%">
    <tr>
        <td>#</td>
        <td>Tên</td>
        <td>Ngày sinh</td>
        <td>giới tính</td>
    </tr>
    @foreach ($student as $each)
    <tr>
        <td>{{ $each->id }}</td>
        <td>{{ $each->getFullNameAttribute() }}</td>
        <td>{{ $each->getAgeAttribute() }}</td>
        <td>{{ $each->gioitinh }}</td>
    </tr>
    @endforeach   
</table>