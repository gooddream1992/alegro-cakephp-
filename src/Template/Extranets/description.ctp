<style>
    /* Rating Star Widgets Style */
    .rating-stars ul {
        list-style-type:none;
        padding:0;

        -moz-user-select:none;
        -webkit-user-select:none;
    }
    .rating-stars ul > li.star {
        display:inline-block;

    }

    /* Idle State of the stars */
    .rating-stars ul > li.star > i.fa {
        font-size: 1.5em; /* Change the size of the stars */
        color:#eee; /* Color on idle state */
    }

    /* Hover state of the stars */
    .rating-stars ul > li.star.hover > i.fa {
        color: #f9d749;
        cursor:pointer;
    }

    /* Selected state of the stars */
    .rating-stars ul > li.star.selected > i.fa {
        color: #f9d749;
    }
</style>
<section class="basics">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <?= $this->element('extranet/sidebar'); ?>
            </div>

            <div class="col-md-10">
                <?= $this->Form->create('', ['class' => "form-section", 'type' => 'post', 'id' => 'description']); ?>
                <div class="head-section">
                    <h1><?php echo __('What’s unique and wonderful about your property?'); ?><span><?php echo __('Every room and home is unique. Tell us why yours stands out.'); ?><br/><br/></span>
                    </h1>

                    <img src="<?= $this->Url->image('extranet/ec-description@2x.png'); ?>">
                    <div class="m-t-8 m-b-8">
                        <h2><?php echo __('Name your property'); ?></h2>
                        <span><?php echo __('Make it count, and make it sound inviting! Please enter in English. Don’t worry, we’ll generate other languages using a standard translation template. If you want a custom title in a different language, please reach out to us through the help center.'); ?></span>
                        <div class="m-b-8 panel panel-default">
                            <div class="panel-body">
                                <div class="form-group">
                                    <div>
                                        <input placeholder="<?php echo __('Ex. Romantic beach getaway, perfect for honeymooners'); ?>" name="propertyName" type="text" id="propertyName" class="form-control" maxlength="50" onkeypress="getcount('propertyName', 'first', 50)" value="<?= @$properDes->propertyName; ?>">
                                        <small id="first" class="form-control-counter-text pull-right m-t-1 p-l-3">50</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="m-t-8 m-b-8">
                        <h2><?php echo __('Describe your place'); ?></h2>
                        <span><?php echo __('Why should a guest choose to stay at your property?'); ?></span>
                        <div class="m-b-8 panel panel-default">
                            <div class="panel-body">
                                <div class="form-group">
                                    <div>
                                        <textarea rows="5" placeholder="<?php echo __('describeYourPlace'); ?>" name="describeYourPlace" type="text" id="describeYourPlace" class="form-control" maxlength="2000" onkeypress="getcount('describeYourPlace', 'second', 2000)"><?= @$properDes->describeYourPlace; ?></textarea>
                                        <small id="second" class="form-control-counter-text pull-right m-t-1 p-l-3">2000</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="m-t-8 m-b-8">
                        <h2><?php echo __('Local Attractions'); ?></h2>
                        <span><?php echo __('What popular attractions, restaurants, or activities can be found nearby?'); ?></span>
                        <div class="m-b-8 panel panel-default">
                            <div class="panel-body">
                                <div class="form-group">
                                    <div>
                                        <textarea rows="5" placeholder="<?php echo __('thingsNearby'); ?>" name="recommendations" type="text" id="thingsNearby" class="form-control" maxlength="2000" onkeypress="getcount('thingsNearby', 'thrid', 2000)"><?= @$properDes->recommendations; ?></textarea>
                                        <small class="form-control-counter-text pull-right m-t-1 p-l-3" id="thrid">2000</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="m-t-8 m-b-8">
                        <h2><?php echo __('House rules'); ?></h2>
                        <span><?php echo __('Let guests know what rules they should follow when staying at your property.'); ?></span>
                        <div class="m-b-8 panel panel-default">
                            <div class="panel-body">
                                <div class="form-group">
                                    <div>
                                        <textarea rows="5" placeholder="<?php echo __('houseRules'); ?>" name="houseRules" type="text" id="houseRules" class="form-control" maxlength="2000" onkeypress="getcount('houseRules', 'fourth', 2000)"><?= @$properDes->houseRules; ?></textarea>
                                        <small class="form-control-counter-text pull-right m-t-1 p-l-3" id="fourth">2000</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="m-t-8 m-b-8">
                        <h2><?php echo __('When arriving, how can guests get to your property? (Optional)'); ?></h2>
                        <span><?php echo __('It is important to make it very clear for guests. Many times, this is a brand new place to them and getting lost is a frustrating way to start their trip. We’ll automatically send these instructions to guests once the booking is confirmed, but don’t hesitate to reach out again!'); ?></span>
                        <div class="m-b-8 panel panel-default">
                            <div class="panel-body">
                                <div class="form-group">
                                    <div>
                                        <textarea rows="5" placeholder="<?php echo __('howToGetThere'); ?>" name="howToGetThere" type="text" id="howToGetThere" class="form-control" maxlength="2000" onkeypress="getcount('howToGetThere', 'fifth', 2000)"><?= @$properDes->howToGetThere; ?></textarea>
                                        <small class="form-control-counter-text pull-right m-t-1 p-l-3" id="fifth">2000</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="m-t-8 m-b-8">
                        <h2><?php echo __('Guest Policy'); ?></h2>
                        <p class="m-b-4">
                            <span><?php echo __('Specify the exact timing your guests can show up and must leave your property'); ?></span>
                        </p>
                        <div class="m-b-8 panel panel-default">
                            <div class="panel-body">
                                <div class="form-group ">
                                    <span class="input-group input-group">
                                        <span><?php echo __('Check-in after'); ?> &nbsp;</span>
                                        <input type="text" style="height: 35px;width: 21%;float: left;padding: 13px;" class="form-control" placeholder="12:00" name="checkin" value="<?= @$properDes->checkin; ?>" required>
                                    </span>
                                </div>

                                <div class="form-group ">
                                    <span class="input-group input-group">
                                        <span><?php echo __('Check-out before'); ?> &nbsp;</span>
                                        <input type="text" style="height: 35px;width: 21%;float: left;padding: 13px;" class="form-control" placeholder="14:00" name="checkout" value="<?= @$properDes->checkout; ?>" required>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="m-t-8 m-b-8">
                        <h2><?php echo __('Star rating'); ?></h2>
                        <p class="m-b-4">
                            <span><?php echo __('Give your home a rating to help set expectations for travelers stay.'); ?></span>
                        </p>
                        <div class="m-b-8 panel panel-default">
                            <div class="panel-body">
                                <section class='rating-widget'>
                                    <div class='rating-stars'>
                                        <ul id='stars'>
                                            <li class='star one two three four five' title='<?php echo __('Poor'); ?>' data-value='1'>
                                                <i class='fa fa-star fa-fw'></i>
                                            </li>
                                            <li class='star two three four five' title='<?php echo __('Fair'); ?>' data-value='2'>
                                                <i class='fa fa-star fa-fw'></i>
                                            </li>
                                            <li class='star three four five' title='<?php echo __('Good'); ?>' data-value='3'>
                                                <i class='fa fa-star fa-fw'></i>
                                            </li>
                                            <li class='star four five' title='<?php echo __('Excellent'); ?>' data-value='4'>
                                                <i class='fa fa-star fa-fw'></i>
                                            </li>
                                            <li class='star five' title='<?php echo __('WOW!!!'); ?>' data-value='5'>
                                                <i class='fa fa-star fa-fw'></i>
                                            </li>
                                        </ul>
                                    </div>
                                    <input type="text" id="rating" name="rating" style="opacity: 0;position: absolute;" value="<?= @$properDes->rating; ?>" required>
                                </section>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="saveexit" id='saveexit'>
                    <div class="last-section">

                        <ul>
                            <li><span class='btn-next-save' onclick="gettForm()"><?php echo __('SAVE AND EXIT'); ?></span></li>
                            <li onclick="$('#saveexit').val('next');">
                                <button class='btn-next-save' type="submit"><?php echo __('NEXT'); ?></button>
                            </li>
                            <li><a href="<?= HTTP_ROOT; ?>extranets/location/<?= $id; ?>" style="font-size: 15px;padding: 8px 28px;"><?php echo __('PREVIOUS'); ?></a></li>
                        </ul>
                    </div>

                </div>
                <?= $this->Form->end(); ?>
            </div>

        </div>
    </div>
</section>
<style>
    .error{
        color: red;
    }
</style>
<script>
    function gettForm() {
        $('#saveexit').val('save exit');
        $('#description').submit();
    }
    function getcount(name, count_id, count) {
        if ($('#' + name).val().length >= count - 1) {
            $('#' + name).val($('#' + name).val().substr(0, count));
            $("#" + count_id).text(0);
        } else {
            $("#" + count_id).text(count - $('#' + name).val().length);

        }
    }
    $('#description').validate({
        rules: {
            rating: {
                required: true,
            },
            propertyName: "required",
            describeYourPlace: "required",
            howToGetThere: "required",
        },
        messages: {

        }
    });
</script>

<script>
    $(document).ready(function() {
<?php if (!empty(@$properDes->rating)) { ?>
            if (<?= @$properDes->rating; ?> == 5) {
                $('.five').addClass('selected');
            }
            if (<?= @$properDes->rating; ?> == 4) {
                $('.four').addClass('selected');
            }
            if (<?= @$properDes->rating; ?> == 3) {
                $('.three').addClass('selected');
            }
            if (<?= @$properDes->rating; ?> == 2) {
                $('.two').addClass('selected');
            }
            if (<?= @$properDes->rating; ?> == 1) {
                $('.one').addClass('selected');
            }
<?php } ?>

        getcount('propertyName', 'first', 50);
        getcount('describeYourPlace', 'second', 2000);
        getcount('thingsNearby', 'thrid', 2000);
        getcount('houseRules', 'fourth', 2000);
        getcount('howToGetThere', 'fifth', 2000);

        /* 1. Visualizing things on Hover - See next part for action on click */
        $('#stars li').on('mouseover', function() {
            var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

            // Now highlight all the stars that's not after the current hovered star
            $(this).parent().children('li.star').each(function(e) {
                if (e < onStar) {
                    $(this).addClass('hover');
                } else {
                    $(this).removeClass('hover');
                }
            });

        }).on('mouseout', function() {
            $(this).parent().children('li.star').each(function(e) {
                $(this).removeClass('hover');
            });
        });


        /* 2. Action to perform on click */
        $('#stars li').on('click', function() {
            var onStar = parseInt($(this).data('value'), 10); // The star currently selected
            var stars = $(this).parent().children('li.star');

            for (i = 0; i < stars.length; i++) {
                $(stars[i]).removeClass('selected');
            }

            for (i = 0; i < onStar; i++) {
                $(stars[i]).addClass('selected');
            }

            // JUST RESPONSE (Not needed)
            var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
            var msg = "";
            if (ratingValue > 0) {
                msg = ratingValue;
            }
            responseMessage(msg);

        });


    });


    function responseMessage(msg) {
        $('#rating').val(msg);
    }
</script>