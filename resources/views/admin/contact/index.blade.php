@extends ('admin/layout_admin')

@section('content')
    <div class="container">
        <h1>contact</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Tin Nhắn</th>
                    <th>Số Điện Thoại</th>
                    <th>Ngày Gửi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($contact as $contact)
                    <tr>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->comment }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>{{ $contact->created_at }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No contact found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection