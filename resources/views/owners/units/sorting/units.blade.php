@forelse ($units as $item)
    <ul>
        <li><img src="{{ $item->upload_image }}"></li>
        <li>
            <h5>{{ $item->address }}</h5>
            <a href="#">list units</a>
        </li>
        <li><strong>B & B</strong>
            <p>{{ $item->bedroom . ' & ' . $item->bathroom }}</p>
        </li>
        <li><strong>SqFt</strong>
            <p>{{ $item->square_footage }}</p>
        </li>
        <li><strong>Rent</strong>
            <p>{{ '$ ' . $item->rent }}</p>
        </li>
        <li><strong>Lease End</strong>
            <p>London is the capital</p>
        </li>
        <li><strong>Payment Status</strong>
            <p>London is the capital</p>
        </li>
        <li>
            <center>
                <strong>Delete</strong>
                <p class="text-danger"><i unit-id='{{ $item->id }}' id="deleteUnit" class="fa fa-trash fa-2x"></i></p>
            </center>
        </li>
    </ul>
@empty
    <ul>
        <li>no unit is available</li>
    </ul>
@endforelse