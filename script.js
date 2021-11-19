
function openForm() {
    document.getElementById("myForm").style.display = "block";
    document.getElementById('form_tab2').style.display= "none";
  }
  
function closeForm() {
    document.getElementById("myForm").style.display = "none";
  }

function select_tab(selectobj){
    let v = selectobj.value;
    t1 = document.getElementById("form_tab1");
    t2 = document.getElementById("form_tab2");
    if (v == "1"){
        document.getElementById("form_tab2").style.display = "none";
       document.getElementById("form_tab1").style.display = "block";
    }
    if(v == "2"){
        document.getElementById("form_tab1").style.display = "none";
        document.getElementById("form_tab2").style.display = "block";
    }
}  
/*
function add(){
    let form =document.getElementById("form");
    if (form.elements['0'].value == "1"){
        culture = form.elements["culture"].value;
        superficie = form.elements["superficie"].value;
        production = form.elements["production"].value;

        let tabl1 = document.getElementById("tab1");

        let row = tabl1.insertRow(1);
        let u = document.createElement('u');
        let cell1 = document.createElement('th');
        cell1.appendChild(u);
        row.appendChild(cell1);
        cell1.setAttribute("scope","Row")

        let cell2 = row.insertCell(1);
        let cell3 = row.insertCell(2);

        u.innerHTML = culture;
        cell2.innerHTML = superficie;
        cell3.innerHTML = production;
        let tot = parseFloat( document.getElementById('total0').innerText) ;
        document.getElementById('total0').innerHTML = tot + parseFloat(superficie);
        
        tot = parseFloat( document.getElementById('total1').innerText) ;
        document.getElementById('total1').innerHTML = tot + parseFloat(production);
        
    }else{
        espece = form.elements["espece"].value;
        nombre = form.elements["nombre"].value;
        let tabl2 = document.getElementById("tab2");

        let row = tabl2.insertRow(1);
        let u = document.createElement('u');
        let cell1 = document.createElement('th');
        cell1.appendChild(u);
        row.appendChild(cell1);
        cell1.setAttribute("scope","Row")

        let cell2 = row.insertCell(1);

        u.innerHTML = espece;
        cell2.innerHTML = nombre;
        
        let tot = parseFloat( document.getElementById('total2').innerText) ;
        document.getElementById('total2').innerHTML = tot + parseFloat(nombre);
    }
    return false;
   }
   */