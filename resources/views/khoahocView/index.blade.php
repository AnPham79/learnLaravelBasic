@include('layout.header')

<div class="container mt-5">

    <h4 class="title my-5">{{ $title }}</h4>

    @if (session('danger'))
        <div class="alert alert-danger">
            {{ session('danger') }}
        </div>
    @endif
    
    <a href="{{ route('logout') }}" style="float: right">Đăng xuất</a>
    <span style="float: right" class="account-user-name">Xin chào: {{ session()->get('name') }}</span>
    {{-- <span style="float: right" class="account-position">{{ session()->get('level') ? 'Super Admin' : 'Admin' }}</span> --}}


    <a href="{{ route('courses.create') }}" class="btn btn-primary mb-3">Thêm khóa học tại đây</a>

    <caption>
        <form action="">
            <div class="input-group">
                <span class="input-group-text">Tìm kiếm khóa học</span>
                <input type="search" name="q" class="form-control" value="{{ $search }}">
            </div>
        </form>
    </caption>

    <br>

    <table class="table table-bordered">
        <table class="table table-bordered">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Tên khóa học</th>
                    <th>Thời gian tạo</th>
                    <th>Xóa</th>
                    <th>Sửa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $each)
                    <tr>
                        <td>{{ $each->id }}</td>
                        <td>{{ $each->name }}</td>
                        <td>{{ $each->getTimeCreate() }}</td>
                        <td>
                            <form action="{{ route('courses.destroy', ['courses' => $each->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Xóa khóa học</button>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('courses.edit', ['courses' => $each->id]) }}"
                                class="btn btn-warning">Sửa</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </table>

    {{ $data->links() }}

</div>


@include('layout.footer')
