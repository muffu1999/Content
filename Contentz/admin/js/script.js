function check(){
document.getElementById('select').onclick = function() {
  var checkboxes = document.getElementsByClassName('boxes');
  for (var checkbox of checkboxes) {
    checkbox.checked = this.checked;
  }
}
}