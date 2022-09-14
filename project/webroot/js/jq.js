$(function () {
    $("#start_time").mask("9999-99-99? 99:99:99", {placeholder: "гггг-мм-дд чч:мм:сс" });
    $(".mask_period").mask("9999-99-99", {placeholder: "гггг-мм-дд" });
    $(".mask_phone").mask("+9(999) 999-9999");
});