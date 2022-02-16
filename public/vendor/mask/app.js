
$(function () {
   // $('.money').mask('#.##0,00', {reverse: true});
  //  $('.money2').mask('#,##0.00', {reverse: true});
    $('.post_code').mask('0000-000');
    $('.nin').mask('000-000-0000', {reverse: true});
  //  $('.pis').mask('000.00000.00-0', {reverse: true});
    $('.tin').mask('000-000-000', {reverse: true});
    $('.phone_with_ddd').mask('(00) 0000-000000');
    $('.st').mask('AAA');
    $('.selectonfocus').mask("00000000", {selectOnFocus: true});

    var SPMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
            spOptions = {
                onKeyPress: function (val, e, field, options) {
                    field.mask(SPMaskBehavior.apply({}, arguments), options);
                }
            };

    $('.sp_celphones').mask(SPMaskBehavior, spOptions);
})