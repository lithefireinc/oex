Vue.directive('datetimepicker', {
    bind: function(){
        var vm = this.vm;
        var key = this.expression;
        $(this.el).datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss'
        }).on("dp.change", function (e){
            vm.$set(key, e.date.format("YYYY-MM-DD HH:mm:ss"));
        });
    }
});
