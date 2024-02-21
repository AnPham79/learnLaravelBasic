@include('layout.header')

Thêm sinh viên tại đây

<br>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<br>
<form action="{{ route('sinhvien.store') }}" method="POST">
    @csrf
    tên sinh viên
    <br>
    <input type="text" name="tensinhvien" value="{{ old('tensinhvien') }}">
    <br>
    giới tính
    <br>
    <input type="radio" name="gioitinh" value="0" checked>Nam
    <input type="radio" name="gioitinh" value="1">Nữ
    <br>
    Sinh nhật
    <br>
    <input type="date" name="ngaysinh">
    <br>
    trạng thái
    <br>
    @foreach ($arrtrangthaisinhvien as $option => $value)
        <input type="radio" name="trangthai" value="{{ $option }}"
            @if ($loop->first) checked @endif>

        {{ $value }}
        <br>
    @endforeach
    Khóa học
    {{-- ví dụ 1 --}}
    <select name="FK_ma_khoahoc" id="">
        @foreach ($course as $row)
            <option value="{{ $row->id }}">
                {{ $row->name }}
            </option>
        @endforeach
    </select>
    {{-- ví dụ 2
    {{ Form::select('FK_ma_khoahoc', $course, 1) }} --}}
    <br>
    <br>
    <button>Thêm sinh viên</button>
</form>

@include('layout.footer')