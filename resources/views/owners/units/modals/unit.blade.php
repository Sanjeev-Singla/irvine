<!---Units Modal Start-->
<div class="custom-model-main-units">
    <div class="custom-model-inner">
        <div class="close-btn">
            <i class="fas fa-times"></i>
        </div>
        <div class="custom-model-wrap">
            <div class="pop-up-content-wrap">
                <div class="form-wrap">
                    <div class="img-company-name" style="max-width: 300px;">
                        <img src="{{ $item->upload_image }}">
                        <p style="color: white">
                            {{ $item->address }}
                            <br>
                            <a href="#">List Units</a>
                        </p>
                    </div>
                    <p id="message"></p>
                    <form>
                        <div class="form-group">
                            <label for="status">Status: Payment Up to Date</label>
                        </div>
                        <div class="form-group">
                            <label for="bedandbath">Bedroom</label>
                            <input
                                type="text"
                                class="form-control"
                                placeholder=""
                                name="bedroom"
                                value="{{ $item->bedroom }}"
                                readonly
                            >
                        </div>
                        <div class="form-group">
                            <label for="bedandbath">Bathroom</label>
                            <input
                                type="text"
                                class="form-control"
                                placeholder=""
                                name="bathroom"
                                value="{{ $item->bathroom }}"
                                readonly
                            >
                        </div>
                        <div class="form-group">
                            <label for="sqft">Sq. Ft.</label>
                            <input
                                type="text"
                                class="form-control"
                                placeholder=""
                                name="square_footage"
                                value="{{ $item->square_footage	 }}"
                                readonly
                            >
                        </div>
                        <div class="form-group">
                            <label for="rent">Rent / Month</label>
                            <input
                                type="text"
                                class="form-control"
                                placeholder=""
                                name="rent"
                                value="{{ $item->rent }}"
                                readonly
                            >
                        </div>
                        <div class="form-group">
                            <label for="leaseend">Lease End: 2/4/23</label>
                            {{-- <input
                                type="text"
                                class="form-control"
                                placeholder=""
                                name="leaseend"
                                value="2/4/23"
                                readonly
                            > --}}
                        </div>
                        <div class="form-group">
                            <label for="maintenance">Maintenance Requests: None Active</label>
                            {{-- <input
                                type="text"
                                class="form-control"
                                placeholder=""
                                name="maintenance"
                                value="None Active"
                                readonly
                            > --}}
                        </div>
                        <p class="see-history">
                            <a href="">See History</a>
                        </p>
                    </form>
                    <div class="sub-buttons-group">
                        <button class="closebut">Close</button>
                        <button class="edit-button" id="editUnit">Edit</button>
                        <button class="edit-button" id="updateUnit" hidden></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-overlay"></div>
</div>