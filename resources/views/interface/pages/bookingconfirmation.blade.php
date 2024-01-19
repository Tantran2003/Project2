@extends('interface.layout_interface')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Booking Confirmation</h2>
                    </div>

                    <div class="card-body">
                        <!-- Display Booking Information -->

                        <!-- Update Booking Form (Similar to Booking Form View) -->
                        <form method="POST" action="{{ route('booking.update', ['bookingId' => $booking->id]) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="totalParticipants" class="col-md-4 col-form-label text-md-right">
                                    Number of Participants
                                </label>
                                <div class="col-md-6">
                                    <input id="totalParticipants" type="number" class="form-control" name="totalParticipants" value="{{ $booking->participants->count() }}" required>
                                </div>
                            </div>
                            @foreach ($booking->participants as $participant)
                                @include('components.participant-details', [
                                    'index' => $participant->id,
                                    'fieldPrefix' => "participant{$participant->id}",
                                    'participant' => $participant
                                ])
                            @endforeach

                            <button type="submit" class="btn btn-primary btn-block">Update Booking</button>
                        </form>
                        <a href="{{ route('booking.form', ['packageId' => $booking->packageID]) }}" class="btn btn-secondary btn-block mt-3">
                            Back to Booking Form
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
