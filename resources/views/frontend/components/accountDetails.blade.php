<div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
    <div class="card">
        <div class="card-header">
            <h3>Account Details</h3>
        </div>
        <div class="card-body">

            <form>
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label>Customer Name <span class="required">*</span></label>
                        <input  class="form-control" id="cus_name" type="text" required>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label>Customer Address<span class="required">*</span></label>
                        <input class="form-control" id="cus_add" type="text" required>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label>Customer City<span class="required">*</span></label>
                        <input class="form-control" id="cus_city" type="text" required>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label>Customer Postcode <span class="required">*</span></label>
                        <input class="form-control" id="cus_postcode" type="number" required>
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label>Customer Country <span class="required">*</span></label>
                        <input class="form-control" id="cus_country" type="text" required>
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label>Customer Phone <span class="required">*</span></label>
                        <input class="form-control" id="cus_phone" type="number" required>
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label>Customer Fax <span class="required">*</span></label>
                        <input class="form-control" id="cus_fax" type="number" required>
                    </div>

                </div>
                <hr>
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label>Ship Name <span class="required">*</span></label>
                        <input class="form-control" id="ship_name" type="text" required>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label>Ship Address<span class="required">*</span></label>
                        <input class="form-control" id="ship_add" type="text" required>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label>Ship City<span class="required">*</span></label>
                        <input class="form-control" id="ship_city" type="text" required>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label>Ship State<span class="required">*</span></label>
                        <input class="form-control" id="ship_state" type="text" required>
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label>Ship Postcode <span class="required">*</span></label>
                        <input class="form-control" id="ship_postcode" type="number" required>
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label>Ship Country <span class="required">*</span></label>
                        <input class="form-control" id="ship_country" type="text" required>
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label>Ship Phone <span class="required">*</span></label>
                        <input class="form-control" id="ship_phone" type="number" required>
                    </div>
                    <div class="col-md-12">
                        <button type="button" onclick="saveCustomerProfile()" class="btn btn-fill-out">Save</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>

    async function customerProfileRead() {
        let res = await axios.get("/readProfile");

        const customer = res.data.data[0]; // Access the first (and only) object

        if (customer) {
            document.getElementById('cus_name').value = customer.cus_name ?? '';
            document.getElementById('cus_add').value = customer.cus_add ?? '';
            document.getElementById('cus_city').value = customer.cus_city ?? '';
            document.getElementById('cus_postcode').value = customer.cus_postcode ?? '';
            document.getElementById('cus_country').value = customer.cus_country ?? '';
            document.getElementById('cus_phone').value = customer.cus_phone ?? '';
            document.getElementById('cus_fax').value = customer.cus_fax ?? '';

            document.getElementById('ship_name').value = customer.ship_name ?? '';
            document.getElementById('ship_add').value = customer.ship_add ?? '';
            document.getElementById('ship_city').value = customer.ship_city ?? '';
            document.getElementById('ship_state').value = customer.ship_state ?? '';
            document.getElementById('ship_postcode').value = customer.ship_postcode ?? '';
            document.getElementById('ship_country').value = customer.ship_country ?? '';
            document.getElementById('ship_phone').value = customer.ship_phone ?? '';
        }
    }

    async function saveCustomerProfile() {
        let customerName = document.getElementById('cus_name').value;
        let customerAdd = document.getElementById('cus_add').value;
        let customerCity = document.getElementById('cus_city').value;
        let customerPostCode = document.getElementById('cus_postcode').value;
        let customerCountry = document.getElementById('cus_country').value;
        let customerPhone = document.getElementById('cus_phone').value;
        let customerFax = document.getElementById('cus_fax').value;

        let shipName = document.getElementById('ship_name').value;
        let shipAddress = document.getElementById('ship_add').value;
        let shipCity = document.getElementById('ship_city').value;
        let shipState = document.getElementById('ship_state').value;
        let shipPostCode = document.getElementById('ship_postcode').value;
        let shipCountry = document.getElementById('ship_country').value;
        let shipPhone = document.getElementById('ship_phone').value;


        let postBody={
            cus_name: customerName,
            cus_add: customerAdd,
            cus_city: customerCity,
            cus_postcode: customerPostCode,
            cus_country: customerCountry,
            cus_phone: customerPhone,
            cus_fax: customerFax,
            ship_name: shipName,
            ship_add: shipAddress,
            ship_city: shipCity,
            ship_state: shipState,
            ship_postcode: shipPostCode,
            ship_country: shipCountry,
            ship_phone: shipPhone
        }

            $(".preloader").delay(90).fadeIn(100).removeClass('loaded');
            let res = await axios.post("/customer-profile",postBody);
            $(".preloader").delay(90).fadeOut(100).addClass('loaded');
            if(res.data['msg']==="success"){
                successToast("Request Successful")
            }
            else{
                errorToast("Request Fail")
            }


    }


</script>
