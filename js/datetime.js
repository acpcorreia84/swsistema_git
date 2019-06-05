/**
 * Created by sistema on 02/09/16.
 */
$('.timepicker').datetimepicker({
    datepicker:false,
    format:'H:i',
    step:5
});

var logic = function( currentDateTime ){
    if (currentDateTime && currentDateTime.getDay() == 6){
        this.setOptions({
            minTime:'11:00'
        });
    }else
        this.setOptions({
            minTime:'8:00'
        });
};

$('.datetimepicker').datetimepicker({
    //dayOfWeekStart : 1,
    lang:'pt-BR',
    //disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
    //startDate:	'1986/01/05',
    format:'d/m/Y H:i',
    formatTime:'H:i',
    formatDate:'Y-m-d',
    minDate:'-2016/01/01', // yesterday is minimum date
    onChangeDateTime:logic,
    onShow:logic,
    onGenerate:function( ct ){
        $(this).find('.xdsoft_date.xdsoft_weekend')
            .addClass('xdsoft_disabled');
    },
});