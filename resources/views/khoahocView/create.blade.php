Thêm khóa học tại đây
 
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
<form action="{{ route('courses.store')}}" method="POST">
    @csrf
    <input type="text" name="name" value="{{ old('name') }}">
    <br>
    <button>Thêm khóa học</button>
</form>
