 function saveToLocalStorage() {
    var hn_no = document.getElementById("hn").value;
    localStorage.setItem('hn', hn_no);
  }

  function updateVariableValueDisplay() {
    var hn_no = localStorage.getItem('hn');
    document.getElementById("hn").value = hn_no;
  }
  