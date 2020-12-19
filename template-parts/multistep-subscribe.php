<div class="subscription_process">
    <div class="mb_0">
        <label data-transkey="subscriptionPlan">Subscription plan</label>
        <div id="sub-error" class="hide"></div>
    </div>
    <div class="form-group inner-form">
        <div class="row">
            <div class="col-12">
                <div class="card text-center mb_30 subscription-plan">
                   <div class="card-body d-flex justify-content-between align-items-center plan">
                        <div class="plan-details text-left">
                            <?php 
                                $payment_status = get_user_meta( get_current_user_id(), 'payment_info' , true); 
                                $_SESSION['payment_info'] =  $payment_status; 
                                
                            ?>
                            <div id="planinfo" class="plan-title">
                                <span data-transkey="basicPlan">Basic Plan </span>
                                <?php 
                                    if( $todays_date > $plan_expery_date ){

                                        echo ' - <span class="plan-active" data-transkey="planActive">Active</span>';

                                    }else if($payment_status){

                                        echo ' - <span class="text-danger" data-transkey="planExpired">Plan Expired</span>'; 
                                        
                                    } 
                                ?>
                            </div>
                            <div id="planamount" class="plan-amount"><span>$</span><span>100</span><span data-transkey="perDay">/day</span></div>
                            <?php 
                            if($payment_status){ 
                                 $newDate = date("j M Y g:i a", strtotime($payment_status['subscriber_plan_end_date'])); 
                                 ?>
                                    <div class="plan-expiry-date">
                                        Expiry: <?php echo $newDate; ?>
                                    </div>
                                    <?php 
                                     $todays_date= date("j M Y g:i a", strtotime("today"));
                                     $plan_expery_date = date('j M Y g:i a', strtotime($payment_status['subscriber_plan_end_date']));
                                     $subscriber_status = $payment_status['subscriber_status']; 
                                     
                                        if(($todays_date <= $plan_expery_date) && ($subscriber_status == 'canceled') ){
                                    ?>
                                    <div class="cancle-info">
                                        <span class="f12" data-transkey="planCancleMessage">Your recurring payment has been cancelled and active plan will cancel on expiry date.</span>
                                     </div>
                                    <?php } ?>
                                    <a href="javascript:void(0);" id="recurring-section" data-toggle="modal" data-target="#recurring-info" data-transkey="moreDetails">More Details</a>
                                 <?php  
                                } 
                                ?>
                        </div>
                        <input type="hidden" name="payment_status" id="payment_status" value="<?php echo $subscriber_status ?: $payment_status['subscriber_status'] ?: '' ; ?>" />
                        <div class="actions d-flex align-items-center justify-content-center plan-button">
                            <?php if( $todays_date > $plan_expery_date  ){
                                ?>
                                 
                                 <button id="paymentButton" type="button" class="btn btn-primary bg-green" data-toggle="modal" data-target="#paynow" data-transkey="renewPlan">Renew </button>
                                    <?php 
                            }else if(!empty($payment_status) && ($subscriber_status == 'active')){ ?>
                                <!-- TODO: If client asks for cancel plan option -->
                                 <input type="hidden" name="subscriber_id" id="subscriber_id" value="<?php echo $payment_status['subscriber_id']; ?>" />
                                 <button type="button" class="btn btn-primary bg-green" id="cancle_plan" onclick="canclePlan()" data-transkey="cancelPlan">Cancel Plan</button> 
                            <?php }else if(!empty($payment_status) && ($subscriber_status == 'canceled') ){
                                 ?>
                                <button type="button" class="btn btn-primary bg-green disabled" data-transkey="cancelled">Cancelled</button> 
                            <?php }else{ ?>
                                <button id="paymentButton" type="button" class="btn btn-primary bg-green" data-toggle="modal" data-target="#paynow" data-transkey="payNow">Pay Now</button>
                           <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
