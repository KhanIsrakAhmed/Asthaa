<?php
session_start(); 

include('../config/db_connect.php');

$empmsg = $empmsg2 = $empmsg3 = $empmsg4 = $empmsg5 = '';
$sum_insured = 0;
$insertSuccess = false;

if (isset($_POST['submit'])) {
    $vehicle_model = $_POST['vehicle_model'];
    $vehicle_type = $_POST['vehicle_type'];
    $cc_or_ton_or_seat = $_POST['cc_or_ton_or_seat'];
    $value = $_POST['value'];
    $vehicle_reg_no = $_POST['vehicle_reg_no'];


    $customer_id = $_SESSION['customer_id'];


    if (empty($empmsg) && empty($empmsg2) && empty($empmsg3) && empty($empmsg4) && empty($empmsg5)) {
        $cc_value = $cc_or_ton_or_seat . '-' . $value;

        $exclude_riot_strike = isset($_POST['excludeRiotStrike']) ? 1 : 0;
        $exclude_earthquake = isset($_POST['excludeEarthquake']) ? 1 : 0;
        $exclude_flood_cyclone = isset($_POST['excludeFloodCyclone']) ? 1 : 0;

  
        $sql = "INSERT INTO car_insurance_quotes (customer_id, vehicle_model, vehicle_type, cc_or_ton_or_seat, sum_insured, exclude_riot_strike, exclude_earthquake, exclude_flood_cyclone, vehicle_reg_no) 
                VALUES ('$customer_id', '$vehicle_model', '$vehicle_type', '$cc_value', $sum_insured, $exclude_riot_strike, $exclude_earthquake, $exclude_flood_cyclone, '$vehicle_reg_no')";

        if ($conn->query($sql) === TRUE) {
            $insertSuccess = true;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>


<?php include "user-includes/userheader.php"; ?>

<div id="wrapper">

    <?php include "user-includes/usernav.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <div class="row" style="padding-top: 20px;">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        
                        <small></small>
                    </h1>
                </div>
            </div>

            <div class="form-container" style="margin-top: 8%;  margin-left: 35%; padding-top: 5%; display: flex; flex-direction: column; align-items: center; width: 100%; max-width: 600px; margin: 50px auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px;">
                <h1 class="title" style="text-align: center; font-size: 24px; margin-bottom: 20px;">Home Insurance Quote Form</h1>

                <form action="" method="post">
                    <div class="veh_model" style="margin: 5px; padding-bottom: 20px;">
                        <label for="vehicle_model" class="label">Enter Vehicle Model</label>
                        <input type="text" name="vehicle_model" id="vehicle_model" class="input" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 3px;" placeholder="Enter Your Vehicle Model" value="<?php echo isset($_POST['vehicle_model']) ? $_POST['vehicle_model'] : ''; ?>">
                        <span class="text-danger" style="color: red;"><?php echo $empmsg; ?></span>
                    </div>
                    <div class="vehicle_reg_no" style="margin: 5px; padding-bottom: 20px;">
                        <label for="vehicle_reg_no" class="label">Enter Vehicle Registration Number</label>
                        <input type="text" name="vehicle_reg_no" id="vehicle_reg_no" class="input" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 3px;" placeholder="Enter Vehicle Registration Number" value="<?php echo isset($_POST['vehicle_reg_no']) ? $_POST['vehicle_reg_no'] : ''; ?>">
                        <span class="text-danger" style="color: red;"><?php echo $empmsg5; ?></span>
                    </div>
                    <div class="veh_type" style="margin: 5px; padding-bottom: 20px;">
                        <label for="vehicle_type" class="label">Select Vehicle Type</label>
                        <select name="vehicle_type" id="vehicle_type" class="select" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 3px;">
                            <option value="">Select Vehicle Type</option>
                            <option value="car" <?php if (isset($_POST['vehicle_type']) && $_POST['vehicle_type'] == 'car') echo 'selected'; ?>>Car</option>
                            <option value="truck" <?php if (isset($_POST['vehicle_type']) && $_POST['vehicle_type'] == 'truck') echo 'selected'; ?>>Truck</option>
                            <option value="motorcycle" <?php if (isset($_POST['vehicle_type']) && $_POST['vehicle_type'] == 'motorcycle') echo 'selected'; ?>>Motorcycle</option>
                        </select>
                        <span class="text-danger" style="color: red;"><?php echo $empmsg2; ?></span>
                    </div>
                    <div class="cc_or_ton" style="margin: 5px; padding-bottom: 20px;">
                        <label for="cc_or_ton_or_seat" class="label">Select Your CC, Ton, Seat</label>
                        <select name="cc_or_ton_or_seat" id="cc_or_ton_or_seat" class="select" onchange="updatevaluecst()" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 3px;">
                            <option value="">Select cc ton seat</option>
                            <option value="cc" <?php if (isset($_POST['cc_or_ton_or_seat']) && $_POST['cc_or_ton_or_seat'] == 'cc') echo 'selected'; ?>>CC</option>
                            <option value="ton" <?php if (isset($_POST['cc_or_ton_or_seat']) && $_POST['cc_or_ton_or_seat'] == 'ton') echo 'selected'; ?>>Ton</option>
                            <option value="seat" <?php if (isset($_POST['cc_or_ton_or_seat']) && $_POST['cc_or_ton_or_seat'] == 'seat') echo 'selected'; ?>>Seat</option>
                        </select>
                        <span class="text-danger" style="color: red;"><?php echo $empmsg3; ?></span>
                    </div>
                    <div class="value" style="margin: 5px; padding-bottom: 20px;">
                        <label id="valuecst" for="value" class="label">
                            <?php
                            if (isset($_POST['cc_or_ton_or_seat'])) {
                                switch ($_POST['cc_or_ton_or_seat']) {
                                    case 'cc':
                                        echo 'Enter Your CC';
                                        break;
                                    case 'ton':
                                        echo 'Enter Your Ton';
                                        break;
                                    case 'seat':
                                        echo 'Enter Your Seat';
                                        break;
                                    default:
                                        echo 'Enter Your Value';
                                        break;
                                }
                            } else {
                                echo 'Enter Your Value';
                            }
                            ?>
                        </label>
                        <input type="text" name="value" id="value" class="input" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 3px;" placeholder="Value">
                        <span class="text-danger" style="color: red;"><?php echo $empmsg4; ?></span>
                    </div>

                    <div class="sum_insured" style="margin: 5px; padding-bottom: 20px;">
                        <label for="sum_insured" class="label">Sum Insured</label>
                        <span id="sum_insured" class="input" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 3px;"><?php echo $sum_insured; ?></span>
                    </div>
                    <div class="checkbox-exc" style="margin: 5px; padding-bottom: 20px;">
                        <div class="Strike checkbox-group">
                            <input type="checkbox" id="excludeRiotStrike" name="excludeRiotStrike" value="10000" onchange="updateSumInsured()" <?php if (isset($_POST['excludeRiotStrike'])) echo 'checked'; ?>>
                            <label for="excludeRiotStrike">Exclude Riot And Strike</label>
                            <input type="checkbox" id="excludeEarthquake" name="excludeEarthquake" value="5000" onchange="updateSumInsured()" <?php if (isset($_POST['excludeEarthquake'])) echo 'checked'; ?>>
                            <label for="excludeEarthquake">Exclude Earthquake</label>
                        </div>
                        <div class="exclude checkbox-group">
                            <input type="checkbox" id="excludeFloodCyclone" name="excludeFloodCyclone" value="5000" onchange="updateSumInsured()" <?php if (isset($_POST['excludeFloodCyclone'])) echo 'checked'; ?>>
                            <label for="excludeFloodCyclone">Exclude Flood And Cyclone</label>
                        </div>
                    </div>
                    <input type="submit" name="submit" value="Submit" class="button" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                </form>
            </div>

            <script>
                function updatevaluecst() {
                    const selectElement = document.querySelector('#cc_or_ton_or_seat');
                    const valuecst = document.querySelector('#valuecst');
                    const selectedOption = selectElement.options[selectElement.selectedIndex].text.toLowerCase();

                    switch (selectedOption) {
                        case 'cc':
                            valuecst.textContent = 'Enter Your CC';
                            break;
                        case 'ton':
                            valuecst.textContent = 'Enter Your Ton';
                            break;
                        case 'seat':
                            valuecst.textContent = 'Enter Your Seat';
                            break;
                        default:
                            valuecst.textContent = 'Enter Your Value';
                            break;
                    }
                }

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

            <?php include "user-includes/userfooter.php"; ?>