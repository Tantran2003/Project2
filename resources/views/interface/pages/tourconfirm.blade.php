@extends ('interface/layout_interface')
@section('content')
<div class="ao-tour-availability__filters">
    <div class="ao-tour-availability__filters-title" data-cy="tdp-availability--select-a-departure-month">Select a departure month</div>
    <ul class="ao-tour-availability__filters-button-container" data-cy="tdp-availability--departure-months">
        <li data-val="0" class="ao-tour-availability__filters-button js-ao-tour-availability__filters-button">Upcoming departures</li>
        <!-- List items for each month -->
        <li data-val="01-2024" class="ao-tour-availability__filters-button js-ao-tour-availability__filters-button ao-tour-availability__filters-button--active" data-month-name="January 2024">
            January 2024
        </li>
        <li data-val="02-2024" class="ao-tour-availability__filters-button js-ao-tour-availability__filters-button" data-month-name="February 2024">
            February 2024
        </li>
        <li data-val="03-2024" class="ao-tour-availability__filters-button js-ao-tour-availability__filters-button" data-month-name="March 2024">
            March 2024
        </li>
        <li data-val="04-2024" class="ao-tour-availability__filters-button js-ao-tour-availability__filters-button" data-month-name="April 2024">
            April 2024
        </li>
        <li data-val="05-2024" class="ao-tour-availability__filters-button js-ao-tour-availability__filters-button" data-month-name="May 2024">
            May 2024
        </li>
        <li data-val="06-2024" class="ao-tour-availability__filters-button js-ao-tour-availability__filters-button" data-month-name="June 2024">
            June 2024
        </li>
        <li data-val="07-2024" class="ao-tour-availability__filters-button js-ao-tour-availability__filters-button" data-month-name="July 2024">
            July 2024
        </li>
        <li data-val="08-2024" class="ao-tour-availability__filters-button js-ao-tour-availability__filters-button" data-month-name="August 2024">
            August 2024
        </li>
        <li data-val="09-2024" class="ao-tour-availability__filters-button js-ao-tour-availability__filters-button" data-month-name="September 2024">
            September 2024
        </li>
        <li data-val="10-2024" class="ao-tour-availability__filters-button js-ao-tour-availability__filters-button" data-month-name="October 2024">
            October 2024
        </li>
        <li data-val="11-2024" class="ao-tour-availability__filters-button js-ao-tour-availability__filters-button" data-month-name="November 2024">
            November 2024
        </li>
        <li data-val="12-2024" class="ao-tour-availability__filters-button js-ao-tour-availability__filters-button" data-month-name="December 2024">
            December 2024
        </li>
        <!-- Add more list items for other years and months -->
    </ul>
    <div class="am-tour-availability__select-container ao-tour-availability__select--departure js-ao-tour-availability__select--departure">
        <div class="am-tour-availability__select-title">Select The Travel Month</div>
        <select class="js-aa-dropdown aa-dropdown aa-dropdown--xl" data-cy="tdp-availability--select-departure-month">
            <option value="0" selected="">Upcoming departures</option>
            <!-- Options for each month -->
            <option value="01-2024">January 2024</option>
            <option value="02-2024">February 2024</option>
            <option value="03-2024">March 2024</option>
            <option value="04-2024">April 2024</option>
            <option value="05-2024">May 2024</option>
            <option value="06-2024">June 2024</option>
            <option value="07-2024">July 2024</option>
            <option value="08-2024">August 2024</option>
            <option value="09-2024">September 2024</option>
            <option value="10-2024">October 2024</option>
            <option value="11-2024">November 2024</option>
            <option value="12-2024">December 2024</option>
            <!-- Add more options for other years and months -->
        </select>
    </div>
</div>
@endsection