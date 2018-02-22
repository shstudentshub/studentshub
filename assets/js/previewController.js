

function preview(event){
  var link = $('img').attr('src');
  //console.log(link);

  var reader = new FileReader();
	reader.onload = function (e) {
	    $(".item-detail-img").attr('src', e.target.result);
	}

	reader.readAsDataURL(link);
}
