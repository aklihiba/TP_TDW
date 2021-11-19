function add(){

}
 $(document).ready(function(){
    $("#sub").click(
        function(){
            if($("select").val() == 1){
               let culture= $("#form_tab1>#culture").val();
               let superficie= $("#form_tab1>#superficie").val();
               let production= $("#form_tab1>#production").val();
                console.log(superficie);
                //insertion d'un nouvelle element
                $("#tab1_body").append(
                    `<tr>
                    <th scope="row"><u>${culture}<u></th>
                    <td>${superficie}</td>
                    <td>${production}</td>
                </tr>`
                );
                // calcule du totale
                let total0 = parseFloat($("#total0").text())+parseFloat(superficie);
                console.log(total0);
                $("#total0").text(total0);

                let total1= parseFloat($("#total1").text())+parseFloat(production);
                $("#total1").text(total1);
                                
            }
            if($("select").val() == 2){
                let culture= $("#form_tab2>#espece").val();
                let superficie= $("#form_tab2>#nombre").val();
                
                 $("#tab2_body").append(
                     `<tr>
                     <th scope="row"><u>${culture}<u></th>
                     <td>${superficie}</td>
                  
                 </tr>`
                 );
                 let total2 = parseFloat($("#total2").text())+parseFloat(superficie);
                console.log(total2);
                $("#total2").text(total2);
             }
        }
    );
 });


 let agri = [];
 let animaux = [];
 $(document).ready(function(){
     get_data();
 });

 function get_data(){
    // get the data
    $.ajax({
		method: "GET",
		url: "produits.json",
		dataType: "json",
		async: false,
    	}).done(function (data) {
		agri = data.agriculture;
		animaux = data.animaux;
        creer_tableaux();
	});
 }
 function creer_tableaux(){
    let total0 = 0;
    let total1 = 0;
    let total2 = 0;

    $("#tab1_body").empty();
	$.each(agri, (index, a) => {
        total0 =  parseFloat(total0) +  parseFloat(a.superficie);
        total1 =  parseFloat(total1) +  parseFloat(a.production);
		$("#tab1_body").append(
			`<tr>
							<th scope="row"><u>${a.type}<u></th>
							<td>${a.superficie}</td>
                            <td>${a.production}</td>
						</tr>`
		);
	});
    // insertion du total
    $("#tab1>tfoot").empty();
    $("#tab1>tfoot").append(
        `<th scope="row"><u>total</u></th>
        <td id="total0">${total0}</td>
        <td id="total1">${total1}</td>`

    );
    $("#tab2_body").empty();
	$.each(animaux, (index, a) => {
        total2 =  parseFloat(total2) +  parseFloat(a.nombre);
		$("#tab2_body").append(
			`<tr>
                    <th scope="row"><u>${a.espece}<u></th>
                    <td>${a.nombre}</td>
						</tr>`
		);
	});
    $("#tab2>tfoot").empty();
    $("#tab2>tfoot").append(
        `<th scope="row"><u>total</u></th>
        <td id="total2">${total2}</td>`

    );
	
 } 

setInterval(function () {
	get_data();
}, 3000);

 

