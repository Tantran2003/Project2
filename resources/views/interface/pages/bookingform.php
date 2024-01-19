@extends('interface.layout_interface')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Book Your Adventure - {{ $tourPackage->Name }}</h2>
                    </div>

                    <div class="card-body">
                         <form method="POST" action="{{ route('gd.createform', ['key' => $tourPackage->id, 'name' => $tourPackage->name]) }}">

                            @csrf

                            <!-- Hidden field to store the PackageID -->
                            <input type="hidden" name="PackageID" value="{{ $tourPackage->PackageID }}">

                            <!-- Booking Date -->
                            <div class="form-group row">
                                <label for="bookingdate" class="col-md-4 col-form-label text-md-right">Booking Date</label>
                                <div class="col-md-6">
                                    <input type="date" id="bookingdate" name="bookingdate" class="form-control" required>
                                </div>
                            </div>

                            <!-- Participants Section -->
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Number of Participants</label>
                                <div class="col-md-6">
                                    <input type="number" id="totalParticipants" name="totalParticipants" class="form-control" value="1" min="1" max="10" required>
                                </div>
                            </div>

                            <!-- Loop through participants for participant details -->
                            <div id="participantsContainer">
                                @for ($i = 1; $i <= 1; $i++)
                                    @include('components.participant-details', [
                                        'index' => $i,
                                        'fieldPrefix' => "Participant{$i}"
                                    ])
                                @endfor
                            </div>

                            <!-- Additional Passenger Details -->
                            <h5><strong class="text-muted">Passenger</strong></h5>
                            <div class="row p-3">
                                <div class="col-sm-6">
                                    Adults<input type="number" min="1" value="1" class="form-control" placeholder="Enter Adults" name="person1">
                                </div>
                                <div class="col-sm-6">
                                    Children<input type="number" min="0" value="0" class="form-control" placeholder="Enter Children" name="person2">
                                </div>
                            </div>
                            <div class="row p-3">
                                <div class="col-sm-6 mt-3">
                                    Young Children<input type="number" min="0" value="0" class="form-control" placeholder="Enter Young Children" name="person3">
                                </div>
                                <div class="col-sm-6 mt-3">
                                    Baby<input type="number" min="0" value="0" class="form-control" placeholder="Enter Baby" name="person4">
                                </div>
                            </div>
                            <div class="row mt-3 alert alert-secondary">
                        <div style="font-size: 15px" class="col-sm-6">. Adults born before <strong>July 23, 2010
                            </strong></div>
                        <div style="font-size: 15px" class="col-sm-6">. Children born from<strong> July 23, 2017 to July
                                23, 2020</strong></div>
                        <div style="font-size: 15px" class="col-sm-6">. Young Children born from<strong> July 23, 2010
                                to July
                                24, 2017</strong></div>
                        <div style="font-size: 15px" class="col-sm-6">. Baby born from<strong> 23/07/2020 to
                                24/07/2022</strong></div>

                    </div>

                    <div class="row my-4">
                        <div class="col-sm-4">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radio1" name="payment" value="direct"
                                    checked>
                                <label class="form-check-label" for="radio1">Direct Payment</label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radio2" name="payment" value="card">
                                <label class="form-check-label" for="radio2">Credit Card Payment</label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radio3" name="payment"
                                    value="transfer">
                                <label class="form-check-label" for="radio3">Transfer Payments</label>
                            </div>
                        </div>
                    </div>               
                            <!-- Add/Remove Participant Buttons -->
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <button type="button" id="addParticipant" class="btn btn-primary">Add Participant</button>
                                    <button type="button" id="removeParticipant" class="btn btn-danger">Remove Participant</button>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success btn-block">Submit Booking</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Participant Details Template -->
    <div id="participantDetailsTemplate" style="display: none;">
        @include('components.participant-details', [
            'index' => '__INDEX__',
            'fieldPrefix' => '__PREFIX__'
        ])
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const participantsContainer = document.getElementById('participantsContainer');
            const participantDetailsTemplate = document.getElementById('participantDetailsTemplate').innerHTML;

            // Function to add a new participant
            function addParticipant() {
                const totalParticipantsInput = document.getElementById('totalParticipants');
                const totalParticipants = parseInt(totalParticipantsInput.value);

                if (totalParticipants < 10) {
                    totalParticipantsInput.value = totalParticipants + 1;

                    const newIndex = totalParticipants + 1;
                    const newParticipant = participantDetailsTemplate
                        .replace(/__INDEX__/g, newIndex)
                        .replace(/__PREFIX__/g, `Participant${newIndex}`);

                    participantsContainer.insertAdjacentHTML('beforeend', newParticipant);
                }
            }

            // Function to remove the last participant
            function removeParticipant() {
                const totalParticipantsInput = document.getElementById('totalParticipants');
                const totalParticipants = parseInt(totalParticipantsInput.value);

                if (totalParticipants > 1) {
                    totalParticipantsInput.value = totalParticipants - 1;

                    const lastParticipant = participantsContainer.lastElementChild;
                    participantsContainer.removeChild(lastParticipant);
                }
            }

            // Event listeners for add and remove buttons
            document.getElementById('addParticipant').addEventListener('click', addParticipant);
            document.getElementById('removeParticipant').addEventListener('click', removeParticipant);
        });
    </script>
@endsection
