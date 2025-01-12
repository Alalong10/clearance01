jQuery(function($){
    var base_url = $('body').attr('data-base-url');

    $('body').on('click','.login-toggle', function(){
        var $this = $(this);
        $('.login-toggle').removeClass('active');
        $this.addClass('active');
    });
    $('#loginForm').on('submit', function(e){
        e.preventDefault();
        window.location.href = base_url + 'admin';
    })
})