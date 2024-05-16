<?php
include('../config/db_connect.php');


if($conn){
    echo"dassad";
}


$empmsg2 = $empmsg3 = '';
$property_value = '';
$sum_insured = 0;
$house_name = $holding_number = '';

if (isset($_POST['submit'])) {
    if (empty($_POST['property_type'])) {
        $empmsg2 = "Please select a property type.";
    }

    if (empty($_POST['property_value'])) {
        $empmsg3 = "Please enter the property value.";
    } else {
        $property_value = htmlspecialchars($_POST['property_value']);
    }

    if (empty($_POST['house_name'])) {
        $house_name = "Please enter the house name.";
    } else {
        $house_name = htmlspecialchars($_POST['house_name']);
    }

    if (empty($_POST['holding_number'])) {
        $holding_number = "Please enter the holding number.";
    } else {
        $holding_number = htmlspecialchars($_POST['holding_number']);
    }

    if (empty($empmsg2) && empty($empmsg3)) {
        if (isset($_POST['exclude_fire'])) {
            $sum_insured += (int)$_POST['exclude_fire'];
        }

        if (isset($_POST['exclude_theft'])) {
            $sum_insured += (int)$_POST['exclude_theft'];
        }

        $holding_number = mysqli_real_escape_string($conn, $holding_number);
        $property_type = mysqli_real_escape_string($conn, $_POST['property_type']);
        $property_value = (int)$property_value;
        $sum_insured = (int)$sum_insured;
        $exclude_fire = isset($_POST['exclude_fire']) ? 1 : 0;
        $exclude_theft = isset($_POST['exclude_theft']) ? 1 : 0;
        $house_name = mysqli_real_escape_string($conn, $house_name);

        $sql = "INSERT INTO home_insurance_quotes (holding_number, property_type, property_value, sum_insured, house_name, exclude_fire, exclude_theft) 
                VALUES ('$holding_number', '$property_type', $property_value, $sum_insured, '$house_name', $exclude_fire, $exclude_theft)";



        if (mysqli_query($conn, $sql)) {
            echo 'Data inserted successfully!';
            //   header('location: homepage.php');
            exit();
        } else {
            echo 'query error: ' . mysqli_error($conn);
        }
    }
}
?>


<?php  include "user-includes/userheader.php";?>

<?php  include "user-includes/usernav.php";?>

<div class="row" style="padding-top: 20px;" >
    <div class="col-lg-12">
        <h1 class="page-header">
         
            <small>Purchase your policy</small>
        </h1>
    </div>
</div>

    <div class="form-container" style="     margin-top: 8%;  margin-left: 35%; padding-top: 5%; display: flex; flex-direction: column; align-items: center; width: 100%; max-width: 600px; margin: 50px auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px;">
        <h1 class="title" style="text-align: center; font-size: 24px; margin-bottom: 20px;">Home Insurance Quote Form</h1>
        <form action="" method="post">
            <div class="property_type" style="margin: 5px; padding-bottom: 20px;">
                <label for="property_type" class="label">Select Property Type</label>
                <select name="property_type" id="property_type" class="select" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 3px;">
                    <option value="">Select Property Type</option>
                    <option value="house" <?php if (isset($_POST['property_type']) && $_POST['property_type'] == 'house') echo 'selected'; ?>>House</option>
                    <option value="apartment" <?php if (isset($_POST['property_type']) && $_POST['property_type'] == 'apartment') echo 'selected'; ?>>Apartment</option>
                    <option value="condo" <?php if (isset($_POST['property_type']) && $_POST['property_type'] == 'condo') echo 'selected'; ?>>Condo</option>
                </select>
                <span class="text-danger" style="color: red;"><?php echo $empmsg2; ?></span>
            </div>

            <div class="house_name" style="margin: 5px; padding-bottom: 20px;">
                <label for="house_name" class="label">House Name</label>
                <input type="text" name="house_name" id="house_name" class="input" placeholder="Enter Your House Name" value="<?php echo $house_name; ?>" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 3px;">
                <span class="text-danger" style="color: red;"><?php echo $house_name; ?></span>
            </div>

            <div class="holding_number" style="margin: 5px; padding-bottom: 20px;">
                <label for="holding_number" class="label">Holding Number</label>
                <input type="text" name="holding_number" id="holding_number" class="input" placeholder="Enter Holding Number" value="<?php echo $holding_number; ?>" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 3px;">
                <span class="text-danger" style="color: red;"><?php echo $holding_number; ?></span>
            </div>

            <div class="property_value" style="margin: 5px; padding-bottom: 20px;">
                <label for="property_value" class="label">Enter Property Value</label>
                <input type="text" name="property_value" id="property_value" class="input" placeholder="Enter Your Property Value" value="<?php echo $property_value; ?>" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 3px;">
                <span class="text-danger" style="color: red;"><?php echo $empmsg3; ?></span>
            </div>

            <div class="sum_insured" style="margin: 5px; padding-bottom: 20px;">
                <label for="sum_insured" class="label">Sum Insured</label>
                <span id="sum_insured" class="input" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 3px;"><?php echo $sum_insured; ?></span>
            </div>

            <div class="checkbox-exc" style="margin: 5px; padding-bottom: 20px;">
                <div class="fire-theft checkbox-group">
                    <input type="checkbox" id="exclude_fire" name="exclude_fire" value="50000" <?php if (isset($_POST['exclude_fire'])) echo 'checked'; ?>>
                    <label for="exclude_fire">Exclude Fire</label>
                    <input type="checkbox" id="exclude_theft" name="exclude_theft" value="30000" <?php if (isset($_POST['exclude_theft'])) echo 'checked'; ?>>
                    <label for="exclude_theft">Exclude Theft</label>
                </div>
            </div>
            <div class="form-group" style="margin: 5px;">
                <button type="submit" name="submit" class="button" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Get Quote</button>
            </div>
        </form>
    </div>

<script>
    function updateSumInsured() {
        const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
        let sum = 0;
        checkboxes.forEach(function(checkbox) {
            sum += parseInt(checkbox.value);
        });

        document.getElementById('sum_insured').textContent = sum;
    }

    document.querySelectorAll('input[type="checkbox"]').forEach(function(checkbox) {
        checkbox.addEventListener('change', updateSumInsured);
    });

    window.addEventListener('load', function() {
        updateSumInsured();
    });
</script>

<?php  include "user-includes/userfooter.php";?>