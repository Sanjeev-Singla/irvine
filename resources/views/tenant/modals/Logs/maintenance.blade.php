<div class="mytbl-view">
    <div id="myModal2" class="modal2">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close2">&times;</span>
            <div class="container">
                <h3>Maintenance Requests</h3>
                <div class="row">
                    <table id="payment-history-tbl">
                        <tbody>
                            <tr>
                                <th scope="col" class="tb-left">Date</th>
                                <th scope="col">Status</th>
                            </tr>
                            @forelse ($maintenanceRequests as $maintenanceRequest)
                                <tr>
                                    <th scope="col" class="tb-left">{{ date_format(date_create($maintenanceRequest->created_at), 'd-m-Y') }}</th>
                                    <th scope="col">{{ $maintenanceRequest->status }}</th>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">No Requests Available</td>
                                </tr>
                            @endforelse
                            
                        </tbody>
                    </table>
                </div>
                <button class="done-btn">
                    <a href="#">Done</a>
                </button>
            </div>
        </div>
    </div>
</div>