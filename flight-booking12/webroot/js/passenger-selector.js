$(function () {
    var typeArray = ["adult", "children", "infant"];

    var counterBinder = function (type) {
        var addCounterSelector = "." + type + "-add-counter";
        var decreaseCounterSelector = "." + type + "-decrease-counter";
        var counter = "#" + type + "-counter";
        $(addCounterSelector).click(function () {
            $(counter).html(parseInt($(counter).html()) + 1);
            updatePassengers();
        });
        $(decreaseCounterSelector).click(function () {
            if ($(counter).html() > 0) {
                $(counter).html(parseInt($(counter).html()) - 1);
            }
            updatePassengers();
        });

    }

    var updatePassengers = function () {
        var num = parseInt($("#adult-counter").html()) + parseInt($("#children-counter").html()) + parseInt($("#infant-counter").html());
        if (num == 1) {
            $(".passenger-selector-toggle").html(num + " Passenger");
        } else {
            $(".passenger-selector-toggle").html(num + " Passengers");
        }
    };
    $(".passenger-selector-toggle").click(function () {
        $(".passenger-selector").toggleClass("active");
    });

    typeArray.forEach(function (element) {
        counterBinder(element);
    });



});