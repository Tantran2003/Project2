@extends ('interface/layout_interface')
@section('content')

<div class="tour-list">
  <h2>Tours for {{ $month }}</h2>
  @foreach($tours as $tour)
  <div class="tour-item">
    <h3>{{ $tour->name }}</h3>
    <!-- Display other tour details as needed -->
  </div>
  @endforeach
</div>
@endsection