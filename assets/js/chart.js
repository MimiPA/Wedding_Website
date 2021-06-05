let options = {
    startAngle: -1.55,
    size: 150,
    value: 0.85,
    fill: { gradient: ['#a445b2', '#fa4299'] }
}
$(".tpp-chartCirlce .tpp-chartBar").circleProgress(options).on('circle-animation-progress',
    function (event, progress, stepValue) {
        $(this).parent().find("span").text(String(stepValue.toFixed(2).substr(2)) + "%");
    });
$(".chartB .tpp-chartBar").circleProgress({
    value: 0.70
});
$(".chartC .tpp-chartBar").circleProgress({
    value: 0.60
});