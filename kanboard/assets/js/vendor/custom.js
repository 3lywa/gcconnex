!function(){
$('.makeLink').on('click', function() {
	alert('test');
    self.location = $(this).attr('href');
});
};