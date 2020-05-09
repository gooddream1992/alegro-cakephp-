<section class="banner">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="baneer-text">
                    <ul>
                        <li><?php echo __('No Fees, Ever.'); ?></li>
                        <li><?php echo __('Earn More on'); ?></li>
                        <li><?php echo __('Alegro Homes.'); ?></li>
                        <li><button data-toggle="modal" data-target="#loginModal" style="width:auto;"><?php echo __('List your place now'); ?></button></li>
                        <li><a href="javascript:void(0);"><?php echo __('No account?'); ?> </a><button data-toggle="modal" data-target="#registerModal" style="width:auto;"><?php echo __('Continue here'); ?></button></li>

                    </ul>
                </div>
            </div>					
        </div>				
    </div>
</section>

<section class="here">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h1><?php echo __('Here’s what we give you'); ?></h1>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
                <img src="<?= $this->Url->image('extranet/free-listing.png'); ?>">
                <h5><?php echo __('Free listings, with no fine print'); ?></h5>
                <p><?php echo __('No sign up fee, no membership cost, no cut of your room rate. No, really.'); ?></p>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
                <img src="<?= $this->Url->image('extranet/wide-exposure.png'); ?>">
                <h5><?php echo __('Wide exposure'); ?></h5>
                <p><?php echo __('We get millions of bookings each month from travelers in 200+ countries, all looking for unique accommodation like yours.'); ?></p>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
                <img src="<?= $this->Url->image('extranet/customer-support.png'); ?>">
                <h5><?php echo __('24/7 help in your language'); ?></h5>
                <p><?php echo __('Our support team is always available for you or your guests, in 17 languages.'); ?></p>
            </div>
        </div>
    </div>
</section>

<section class="you-have">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h5><?php echo __('All you have to do'); ?></h5>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                <img src="<?= $this->Url->image('extranet/sign-in-sign-up.png'); ?>">
                <p><?php echo __('Sign in or sign up for an Alegro account'); ?></p>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                <img src="<?= $this->Url->image('extranet/upload-details.png'); ?>">
                <p><?php echo __('Upload your property details and pictures'); ?></p>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                <img src="<?= $this->Url->image('extranet/go-live.png'); ?>">
                <p><?php echo __('Set your prices and available dates'); ?></p>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                <img src="<?= $this->Url->image('extranet/set-prices.png'); ?>">
                <p><?php echo __('See your listing go live in front of millions of travelers'); ?></p>
            </div>
        </div></div>
</section>

<section class="properties">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h4><?php echo __('Small properties deserve a big audience.'); ?></h4>
            </div>
            <button type="button" data-toggle="modal" data-target="#loginModal" class="btn btn-info"><?php echo __('LIST YOUR PROPERTY'); ?></button>
        </div>
    </div>
</section>