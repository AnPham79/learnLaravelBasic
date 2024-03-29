@include('layout.header')

<div class="container">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <span style="float: right" class="account-user-name">Xin chào: {{ session()->get('name') }}</span>
    {{-- <span style="float: right" class="account-position">{{ session()->get('level') ? 'Super Admin' : 'Admin' }}</span> --}}

    <h1 class="mt-5">Danh sách sinh viên</h1>

    <a href="{{ route('sinhvien.create') }}">
        <button class="btn btn-primary mt-3">
            Thêm sinh viên tại đây
        </button>
    </a>

    <table class="table table-bordered table-striped mt-3">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên sinh viên</th>
                <th scope="col">Ảnh đại diện</th>
                <th scope="col">Giới tính</th>
                <th scope="col">Tuổi</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Khóa học</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->tensinhvien }}</td>
                    <td><img src="{{ asset($item->anhdaidien) }}" alt="lỗi"></td>
                    <td>{{ $item->getGenderAttribute() }}</td>
                    <td>{{ $item->getAgeAttribute() }}</td>
                    <td>{{ $item->getStatus() }}</td> <!-- Sử dụng getStatus() ở đây -->
                    <td>{{ $item->getNameCourse() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $data->links() }}
</div>

@include('layout.footer')
