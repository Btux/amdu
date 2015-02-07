bkLib.onDomLoaded(function() { nicEditors.allTextAreas({uploadURI : 'uploadmedia.php'}) });
$(document).ready(function(){
	$('.portfolio').click(function (e) {
		
		if($('.open').length){

			var opened = $('.open');

			opened.removeClass('open').removeClass('col-md-6').addClass('col-md-3');
			opened.children('.portfolio-entry').removeClass('row');
			var portfolioBody = opened.children('.portfolio-entry').children('.portfolio-img');
			portfolioBody.removeClass('col-md-6');

			var portfolioDesc = opened.children('.portfolio-entry').children('.portfolio-desc');
			portfolioDesc.hide().removeClass('col-md-6');
		}
		

		if(!$(this).hasClass('open')){
			
			$(this).addClass('open').addClass('col-md-6').removeClass('col-md-3');
			$(this).children('.portfolio-entry').addClass('row');
			var portfolioBody = $(this).children('.portfolio-entry').children('.portfolio-img');
			portfolioBody.addClass('col-md-6');

			var portfolioDesc = $(this).children('.portfolio-entry').children('.portfolio-desc');
			portfolioDesc.show().addClass('col-md-6');
		}
		
	});
});