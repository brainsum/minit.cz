function menuItemIdName(index) {
	return 'product-menu-' + index;
};
function getBlockElement(index) {
	var contentIdNames = ['mini', 'xxl', 'pizza'];
	return document.getElementById(contentIdNames[index]);
}
function show(element) {
	element.style.display = 'block';
}
function hide(element) {
	element.style.display = 'none';
}
var menus = document.querySelectorAll('.product-category-menu');
var pageVisibleIndex = 0;

//first menu is white
menus[0].querySelector('svg').style.fill = '#fff';	

for (var i = 0; i<menus.length; i++) {
	menus[i].addEventListener("click", function(){
		//product-menu-2
		var id = parseInt(this.id.split('-')[2]);
		//console.log(id);
		if(pageVisibleIndex != id) {
			var blockVisible = getBlockElement(pageVisibleIndex);
			var blockToShow = getBlockElement(id);

			hide(blockVisible);
			show(blockToShow);
			pageVisibleIndex = id;



			//svg make white
			//make all svgs black
			for (var j = 0; j<menus.length; j++) {
				if (j != id) {
					menus[j].querySelector('svg').style.fill = '#000';
				}
			}
			//make the chosen one white
			this.querySelector('svg').style.fill = '#fff';
		}
	});
}