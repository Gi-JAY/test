
function publishTip(publish, info) {
	let newInfo = info.split(","); //將公司資訊以逗號分開為電話和地址
	a = document.querySelectorAll('.publish');
	for (let i = 0; i < a.length; i++) {
		a[i].addEventListener("mouseover", function () {//移入顯示資訊
			if (a[i].textContent == publish) {
				a[i].classList.add('publishTip');
				let span = document.createElement('span');
				span.innerHTML = newInfo[0] + "</br>" + newInfo[1];
				span.classList.add('pbTip');
				a[i].appendChild(span);
				a[i].addEventListener("mouseout", function () {//移出隱藏資訊
					a[i].classList.remove('publishTip');
					child = document.querySelector('.pbTip');
					if (child) {
						a[i].removeChild(child);
					}
				});
			}
		});
	}
}

function selectAll(source) {
	checkboxes = document.getElementsByClassName('check');
	for (var i = 0; i < checkboxes.length; i++) {
		checkboxes[i].checked = source.checked;
	}
}
function checkAll(source) { //判斷是否全勾
	checkboxes = document.querySelectorAll('.check');
	if (!source.checked) {
		document.getElementsByName('all')[0].checked = source.checked;
	} else{
		let check = 0;
		for (let i = 0; i < checkboxes.length; i++) {
			if (checkboxes[i].checked) {
				check++;
			}
		}
		if (check == checkboxes.length) {
			document.getElementsByName('all')[0].checked = true;
		}
	}
}