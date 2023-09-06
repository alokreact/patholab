<div class="avatar checkout-icon p-1">
    <div class="avatar-title rounded-circle bg-primary">
        <i class="bx bxs-wallet-alt text-white font-size-20"></i>
    </div>
</div>

<div class="feed-item-list">
    <div>
        <h5 class="font-size-16 mb-1">Select Slots</h5>
        <p class="text-muted text-truncate mb-4">Check for avaialble slots</p>
    </div>
    <div>
        {{-- <h5 class="font-size-14 mb-3">Payment method :</h5> --}}
        <div class="row">
        <?php
            $today = new DateTime(); 
            $interval = new DateInterval('P1D'); 
            //Create a 1-day interval
            $dateRange = new DatePeriod($today, $interval, 3); // Generate the next 4 days

            foreach ($dateRange as $date) {
                //echo $formattedDate . "<br>";
        ?>
            <div class="col-lg-3 col-sm-6">
                <div data-bs-toggle="collapse">
                    <label class="card-radio-label">
                        <input type="radio" name="slot_day" id="slot_day"
                            class="card-radio-input" value="<?php echo $date->format('Y-m-d');?>">
                        <span class="card-radio py-3 text-center text-truncate">
                            {{-- <i class="bx bx-credit-card d-block h2 mb-3"></i> --}}
                            <?php
                                echo $date->format('l') . '<br>';
                                echo $date->format('d') . '<br>'; // Day of the month (e.g., 01)
                                echo $date->format('F') . '<br>';
                            ?>

                        </span>
                    </label>
                </div>
            </div>
            <?php }?>

          

        </div>
    </div>
<div class="row">
    <?php
$startTime = new DateTime('6:00 AM');
$endTime = new DateTime('6:00 PM');

$currentInterval = new DateInterval('PT1H'); 

while ($startTime < $endTime) {
$rangeStart = $startTime->format('g A');
$rangeEnd = $startTime->add($currentInterval)->format('g A');
?>
    <div class="col-lg-3 col-sm-6">
        <div>
            <label class="card-radio-label">
                <input type="radio" name="slot_time" id="slot_time"
                    class="card-radio-input" value="<?php echo $rangeStart . ' - ' . $rangeEnd;?>">
                <span class="card-radio py-3 text-center text-truncate">
                    <i class="bx bxl-clock d-block h2 mb-3"></i>
                    <?php echo $rangeStart . ' - ' . $rangeEnd; ?>
                </span>
            </label>
        </div>
    </div>

    <?php
    }
?>

</div>