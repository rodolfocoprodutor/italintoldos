document.querySelector("#celular").addEventListener("input", function(event) {
  var x = this.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,5})(\d{0,4})/);
  this.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
});

document.querySelector("form").addEventListener("submit", function(event) {
    event.preventDefault();
  
    var nome = document.querySelector("#nome").value;
    var email = document.querySelector("#email").value;
    var ddi = document.querySelector("#ddi").value;
    var celular = document.querySelector("#celular").value;
  
    if (nome == "") {
      alert("Por favor, preencha o nome.");
      return;
    }
  
    if (email == "") {
      alert("Por favor, preencha o email.");
      return;
    }
  
    if (ddi == "") {
      alert("Por favor, selecione o DDI.");
      return;
    }
  
    if (celular == "") {
      alert("Por favor, preencha o número de celular.");
      return;
    }
  
    alert("Dados enviados com sucesso!");
  });
  