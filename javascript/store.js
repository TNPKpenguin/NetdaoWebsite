 function saveToLocalStorage() {
    var hn_no = document.getElementById("hn").value;
    var name = document.getElementById("name").value;
    var lastname = document.getElementById("lastname").value;
    localStorage.setItem('hn', hn_no);
    localStorage.setItem('name', name);
    localStorage.setItem('lastname', lastname);
  }

  function updateVariableValueDisplay() {
    var hn_no = localStorage.getItem('hn');
    var name = localStorage.getItem("name");
    var lastname = localStorage.getItem("lastname");

    document.getElementById("hn").value = hn_no;
    document.getElementById("name").value = name;
    document.getElementById("lastname").value = lastname;
  }
  