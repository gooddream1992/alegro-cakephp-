<link rel="stylesheet" href="<?php echo HTTP_ROOT . 'backend/' ?>css/normalize.css">
<link rel="stylesheet" href="<?php echo HTTP_ROOT . 'backend/' ?>css/stylesheet.css">
<link rel="stylesheet" href="<?php echo HTTP_ROOT . 'backend/' ?>distt/css/selectize.default.css">
<script src="<?php echo HTTP_ROOT . 'backend/' ?>js/jquery.min.js"></script>
<script src="<?php echo HTTP_ROOT . 'backend/' ?>distt/js/standalone/selectize.js"></script>
<script src="<?php echo HTTP_ROOT . 'backend/' ?>js/index.js"></script>
<style>
    .selectize-dropdown-content .label{ font-size: 12px; color:#000; padding:0px;}
    .selectize-control.contacts .selectize-input [data-value] .email {opacity: 0.5;}
    .selectize-control.contacts .selectize-input [data-value] .name + .email {margin-left: 5px;}
    .selectize-control.contacts .selectize-input [data-value] .email:before {content: '<';}
    .selectize-control.contacts .selectize-input [data-value] .email:after {content: '>';}
    .selectize-control.contacts .selectize-dropdown .caption {font-size: 12px;display: block;opacity: 0.5;}
    .selectize-dropdown [data-selectable], .selectize-dropdown .optgroup-header {padding: 5px 8px;}
    .selectize-control.multi .selectize-input [data-value].active {
        color:#000;
        background-image: -moz-linear-gradient(top, #008fd8, #0075cf);
        background-image: -o-linear-gradient(top, #008fd8, #0075cf);
        background-image: linear-gradient(to bottom, #f9e9a6, #f9e9a6);
        background-repeat: repeat-x;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff008fd8', endColorstr='#ff0075cf', GradientType=0);
    }
    </style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header no-padding">
        <div class="topBread">
            <div class="">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Create a Push Notification</h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="javascript:void(0)" class="btn btn-primary hvr-grow btn-fillbtn-primary hvr-grow btn-fill">New Push <i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <div class="leftBoxNotify">
                    <?= $this->Form->create($user, array('id' => 'profile_data', 'data-toggle' => "validator")) ?>
                    <div class="row">
                        <div class="col-md-7">
                            <label>Destination</label>
                            <select class="form-control" name="notifi_type" id="select_val" onchange="select_get(this)">
                                <option value="1" selected>Global</option>
                                <option value="2">User</option>
                            </select>
                            <script>
                                function select_get(x) {

                                    if (x.value == 2) {
                                        $('#select_user').show();
                                    }
                                    if (x.value == 1) {
                                        $('#select_user').hide();
                                    }
                                }
                            </script>

                        </div>
                        <div class="col-md-12" id="select_user" style="display: none;">
                            <label>Select Users</label>
                            <div id="example" >
                                <div class="demo-section k-content">
                                    <select id="select-to" class="contacts" name="users[]" ></select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label>Subject</label>
                            <input type="text" class="form-control" name="notification_subject" placeholder="Enter Text" required>
                        </div>




                        <div class="col-md-12">
                            <label>Enter text</label>
                            <textarea placeholder="Text" class="form-control" rows="4"  name="notifi_msg" required></textarea>
                        </div>
                        <div class="col-md-12 text-right">
                            <?= $this->Form->submit('Send', ['type' => 'submit', 'class' => 'btn btn-primary hvr-grow btn-fill']) ?>
                        </div>

                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
            <div class="col-md-5">
                <div class="rightBoxNotify">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Notification history</label>
                        </div>
                        <div class="col-md-6 text-right">
                            <form>
                                <input type="text" class="form-control" name="" placeholder="Depart">
                            </form>
                        </div>
                        <div class="col-md-12">
                            <p>10.11.2018   -   12:00</p>
                        </div>
                        <div class="col-md-8">
                            <div class="bluebbox">
                                <img src="<?php echo HTTP_ROOT ?>backend/images/plane.png" class="img-responsive">
                                <h2>Lorem ipsum </h2>
                                <p>Lorem ipsum dolor sit amet, consectetur 
                                    adipiscing elit, sed do eiusmod tempor incididunt ut labore et magna aliqua.
                                    Ut enim ad minim veniam, nostrud exercitation.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Main content -->
    <section class="content">

    </section><!-- /.content -->
</div>
<script>
    // <select id="select-to"></select>

    var REGEX_EMAIL = '([a-z0-9!#$%&\'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&\'*+/=?^_`{|}~-]+)*@' +
            '(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?)';

    var formatName = function (item) {
        return $.trim((item.first_name || '') + ' ' + (item.last_name || ''));
    };

    $('#select-to').selectize({
        persist: false,
        maxItems: null,
        valueField: 'email',
        labelField: 'name',
        searchField: ['first_name', 'last_name', 'email'],
        sortField: [
            {field: 'first_name', direction: 'asc'},
            {field: 'last_name', direction: 'asc'}
        ],
        options: <?php echo $successDetails;?>,
        render: {
            item: function (item, escape) {
                var name = formatName(item);
                return '<div>' +
                        (name ? '<span class="name">' + escape(name) + '</span>' : '') +
                        (item.email ? '<span class="email">' + escape(item.email) + '</span>' : '') +
                        '</div>';
            },
            option: function (item, escape) {
                var name = formatName(item);
                var label = name || item.email;
                var caption = name ? item.email : null;
                return '<div>' +
                        '<span class="label">' + escape(label) + '</span>' +
                        (caption ? '<span class="caption">' + escape(caption) + '</span>' : '') +
                        '</div>';
            }
        },
        createFilter: function (input) {
            var regexpA = new RegExp('^' + REGEX_EMAIL + '$', 'i');
            var regexpB = new RegExp('^([^<]*)\<' + REGEX_EMAIL + '\>$', 'i');
            return regexpA.test(input) || regexpB.test(input);
        },
        create: function (input) {
            if ((new RegExp('^' + REGEX_EMAIL + '$', 'i')).test(input)) {
                return {email: input};
            }
            var match = input.match(new RegExp('^([^<]*)\<' + REGEX_EMAIL + '\>$', 'i'));
            if (match) {
                var name = $.trim(match[1]);
                var pos_space = name.indexOf(' ');
                var first_name = name.substring(0, pos_space);
                var last_name = name.substring(pos_space + 1);

                return {
                    email: match[2],
                    first_name: first_name,
                    last_name: last_name
                };
            }
            alert('Invalid email address.');
            return false;
        }
    });
</script>