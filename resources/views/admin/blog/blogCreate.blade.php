@extends ('admin.layout_admin')

@section('content')

<div class="container">
<h1>Create Blog</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" required>
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" required>{{ old('content') }}</textarea>
        </div>
        <div>
            <label for="image">Image</label>
            <input type="file" name="image" id="image">
        </div>
        <div>
            <button type="submit">Create</button>
        </div>
    </form>

</div>
@endsection