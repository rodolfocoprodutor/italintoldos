document.querySelector("#celular").addEventListener("input", function(event) {
  var x = this.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,5})(\d{0,4})/);
  this.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
});
  