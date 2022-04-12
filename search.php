<?php

//include header file
include('include/header.php');

?>
<style>
.size {
    min-height: 0px;
    padding: 60px 0 40px 0;

}

.loader {
    display: none;
    width: 69px;
    height: 89px;
    position: absolute;
    top: 25%;
    left: 50%;
    padding: 2px;
    z-index: 1;
}

.loader .fa {
    color: #e74c3c;
    font-size: 52px !important;
}

.form-group {
    text-align: left;
}

h1 {
    color: white;
}

h3 {
    color: #e74c3c;
    text-align: center;
}

.red-bar {
    width: 25%;
}

span {
    display: block;
}

.name {
    color: #e74c3c;
    font-size: 22px;
    font-weight: 700;
}

.donors_data {
    background-color: white;
    border-radius: 5px;
    margin: 25px;
    -webkit-box-shadow: 0px 2px 5px -2px rgba(89, 89, 89, 0.95);
    -moz-box-shadow: 0px 2px 5px -2px rgba(89, 89, 89, 0.95);
    box-shadow: 0px 2px 5px -2px rgba(89, 89, 89, 0.95);
    padding: 20px 10px 20px 30px;
}
</style>
<div class="container-fluid red-background size">
    <div class="row">
        <div class="ccol-md-6 offset-md-3">
            <h1 class="text-center">Search Donors</h1>
            <hr class="white-bar">
            <br>
            <div class="form-inline text-center" style="padding: 40px 0px 0px 5px;">
                <div class="form-group text-center center-aligned">
                    <select style="width: 220px; height: 45px;" name="city" id="city" class="form-control demo-default"
                        required>
                        <option value="">-- Select --</option>
                        <option value="Ahmedabad">Ahmedabad</option>
                        <option value="Amreli">Amreli</option>
                        <option value="Anand">Anand</option>
                        <option value="Aravalli">Aravalli</option>
                        <option value="Banaskantha">Banaskantha</option>
                        <option value="Bharuch">Bharuch</option>
                        <option value="Bhavnagar">Bhavnagar</option>
                        <option value="Botad">Botad</option>
                        <option value="Chhota Udepur">Chhota Udepur</option>
                        <option value="Dahod">Dahod</option>
                        <option value="Dangs">Dangs</option>
                        <option value="Devbhoomi Dwarka">Devbhoomi Dwarka</option>
                        <option value="Gandhinagar">Gandhinagar</option>
                        <option value="Gir Somnath">Gir Somnath</option>
                        <option value="Godhra">Godhra</option>
                        <option value="Jamnagar">Jamnagar</option>
                        <option value="Junagadh">Junagadh</option>
                        <option value="Kachchh">Kachchh</option>
                        <option value="Mahinagar">Mahinagar</option>
                        <option value="Mehsana">Mehsana</option>
                        <option value="Morbi">Morbi</option>
                        <option value="Nadiad">Nadiad</option>
                        <option value="Navsari">Navsari</option>
                        <option value="Patan">Patan</option>
                        <option value="Porbandar">Porbandar</option>
                        <option value="Rajkot">Rajkot</option>
                        <option value="Rajpipla">Rajpipla</option>
                        <option value="Sabarkantha(Himmatnagar)">Sabarkantha(Himmatnagar)</option>
                        <option value="Surat">Surat</option>
                        <option value="Surendranagar">Surendranagar</option>
                        <option value="Vadodara">Vadodara</option>
                        <option value="Valsad">Valsad</option>
                    </select>
                </div>
                <div class="form-group center-aligned">
                    <select name="blood_group" id="blood_group" style="padding: 0 20px; width: 220px; height: 45px;"
                        class="form-control demo-default text-center margin10px">

                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>

                    </select>
                </div>
                <div class="form-group center-aligned">
                    <button type="button" class="btn btn-lg btn-default" id="search">Search</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container" style="padding: 60px 0 60px 0;">
    <div class="row " id="data">

        <!-- Display The Search Result -->

        <?php

        if ((isset($_GET['city']) && !empty($_GET['city'])) && (isset($_GET['blood_group']) && !empty($_GET['blood_group']))) {

            $city = $_GET['city'];
            $blood_group = $_GET['blood_group'];
            $sql = "SELECT * FROM donor WHERE city='$city' OR blood_group='$blood_group'";
            $result = mysqli_query($connection, $sql);

            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['save_life_date'] == '0') {

                        echo '<div class="col-md-3 col-sm-12 col-lg-3  donors_data">
                    <span class="name">' . $row['name'] . '</span>
                    <span>' . $row['city'] . '</span>
                    <span>' . $row['blood_group'] . '</span>
                    <span>' . $row['gender'] . '</span>
                    <span>' . $row['email'] . '</span>
                    <span>' . $row['contact_no'] . '</span>
                    
                    </div>';
                    } else {
                        echo '<div class="col-md-3 col-sm-12 col-lg-3  donors_data">
             <span class="name">' . $row['name'] . '</span>
             <span>' . $row['city'] . '</span>
             <span>' . $row['blood_group'] . '</span>
             <span>' . $row['gender'] . '</span>
             <h4 class="name text-center">Donated</h4>
             </div> ';
                    }
                }
            } else {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data not Found</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
            }
        }
        ?>
    </div>
</div>
<div class="loader" id="wait">
    <i class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></i>
</div>
<?php

//include footer file
include('include/footer.php');

?>

<script type="text/javascript">
$(function() {

    $("#search").on('click', function() {

        var city = $("#city").val();
        var blood_group = $("#blood_group").val();

        $.ajax({

            type: 'GET',
            url: 'ajaxsearch.php',
            data: {
                city: city,
                blood_group,
                blood_group
            },
            success: function(data) {
                if (!data.error) {
                    $("data").html(data);
                }
            }


        });

    });


});
</script>