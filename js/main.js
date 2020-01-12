window.addEventListener('DOMContentLoaded', (event) => {
    refreshRules();
    console.log('event: DOMContentLoaded, importing initial rules');
});

refreshRules = function () {
    $('.rules-list').empty();
    $.each(rulesJson, function (k, v) {
        $(".rules-list").append('<p>[' + k + '] ' + v + ' <button type="button" data-id="' + k + '" onclick="removeRule(this)"> remove </button></p>');
    });
    updateRules();
};

removeRule = function (el) {
    let id = $(el).data('id');
    rulesJson.splice(id, 1);
    refreshRules();
};

updateRules = function () {
    let rules = $('.rules');
    rules.val(JSON.stringify(rulesJson));
};

$('.update-button').click(function () {
    rulesJson = JSON.parse($('.rules').val());
    refreshRules();
});

$('.refresh-button').click(function () {
    refreshRules();
});

$('.add-button').click(function () {
    let first = $('.first-part').val();
    let second = $('.second-part').val();
    rulesJson.push([first, second]);
    refreshRules();
});
