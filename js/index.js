$(document).ready(
    function(){
        console.clear();
        // new WOW().init();
        $('.contact_form').submit(function(event){
            event.preventDefault();
            var form_name = $('.contact_name').val();
            var form_mail = $('.contact_mail').val();
            var form_msg = $('.contact_msg').val();
            var _subject = $('._subject').val();
            var _language = $('._language').val();
            var _gotcha = $('._gotcha').val();
            $.ajax({
                url: "https://formspree.io/cba46532@gmail.com",
                method: "POST",
                dataType: "json",
                data: {
                    'Name': form_name,
                    'E-mail': form_mail,
                    'Messages': form_msg,
                    '_subject': _subject,
                    '_language': _language,
                    '_gotcha': _gotcha
                },
                success: function(resp){
                    $('.contact_name').val('');
                    $('.contact_mail').val('');
                    $('.contact_msg').val('');
                    $('.contact_name').focus();
                    console.log(resp);
                    alert('傳送成功');
                },
                error: function(resp){
                    console.log(resp);
                    alert('傳送失敗');
            }}); //ajax end
        }); // submit end
        // $('.owl-carousel').owlCarousel({
        //     items: 2,
        //     lazyLoad: true,
        //     loop: true,
        //     dots: true,
        //     autoplay: true,
        //     margin: 10
        // });
        var skills = [
            {'name': 'html', 'percentage':'80'},
            {'name': 'css', 'percentage':'80'},
            {'name': 'jquery', 'percentage':'80'},
            {'name': 'bootstrap', 'percentage':'80'},
            {'name': 'vuejs', 'percentage':'80'}
        ];
        for( var i=0 ; i<skills.length ; i++ ){
            var ctx = $('.'+skills[i].name+'');
            var myDoughnutChart = new Chart(ctx,{
                type: 'doughnut',
                data: {
                    datasets: [{
                        data: [
                            skills[i].percentage,100 - skills[i].percentage 
                        ],
                        backgroundColor: ['#f9cb44', '#373946'],
                    }],
                    labels: ['熟練',' '],
                },
                options: {
                    legend: {
                        display: false
                }}
            });
        }});
