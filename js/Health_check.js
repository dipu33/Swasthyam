/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 $(document).ready(function () {
     $("#article_div").click(function(){
    $("article").toggle();
});
            $('#search_deases_form').submit(function (e) {
                e.preventDefault(); // Prevent Default Submission
                $.ajax({
                    url: 'get_deases.php',
                    type: 'get',
                    data: $(this).serialize(), // it will serialize the form data
                    dataType: 'html'
                })
                        .done(function (data) {
                            console.log(data);
                            if (data == 1) {
                                alert("enter symptoms please");
                            } else {
                                console.log(data);
//                              var br = document.createElement("br");
                                var myDiv = document.getElementById("main_div");
                                var frm = document.getElementById("search_deases_form");
                                myDiv.removeChild(frm);
                                myDiv.style.border = "3px solid black";
                                var text_node_header = document.createTextNode("Please enter symptoms from given list");
                                myDiv.append(text_node_header);
                                //  myDiv.appendChild(br);
                                myDiv.appendChild(document.createElement("br"));
                                var br = document.createElement("br");

                                $.each(JSON.parse(data), function (k, v) {
                                    var br = document.createElement("br");
                                    var checkBox = document.createElement("input");
                                    var label = document.createElement("label");
                                    checkBox.type = "checkbox";
                                    checkBox.className = "disease_checked";
                                    checkBox.value = v;
                                    myDiv.appendChild(checkBox);
                                    myDiv.appendChild(label);
                                    label.appendChild(document.createTextNode(v));
                                    myDiv.appendChild(br);

                                });
                                var checkBox = document.createElement("input");
                                var label = document.createElement("label");
                                checkBox.type = "checkbox";
                                checkBox.className = "disease_checked";
                                checkBox.value = "nothing";
                                myDiv.appendChild(checkBox);
                                myDiv.appendChild(label);
                                label.appendChild(document.createTextNode("I Don't Know"));
                                myDiv.appendChild(br);
                                var sub_btn = document.createElement("button");
                                var t = document.createTextNode("Search");
                                //   sub_btn.value="Search11";
                                sub_btn.id = "final_submit";
                                sub_btn.type = "button";
                                sub_btn.appendChild(t);
                                sub_btn.addEventListener("click", function () {
                                btn_click();
                                })
                                myDiv.append(sub_btn);
                                //window.location="health_check.php";
                                //});  
                            }
                        })
                        .fail(function () {
                            alert('Submition  Failed ...');
                        });
            });
            function btn_click() {
                var checkedValue = [];
                var inputElements = document.getElementsByClassName('disease_checked');
                var cnt = 0;
                for (var i = 0; inputElements[i]; ++i) {
                    if (inputElements[i].checked) {
                        checkedValue.push(inputElements[i].value);
                        cnt++;
                    }
                }
                if (cnt == 0) {

                    alert("please select any symptoms or select 'I Don't Know' ");
                } else {
                    //    e.preventDefault();
                    $.ajax({
                        url: 'get_final_diseases.php',
                        type: 'get',
                        data: {res: checkedValue}, // it will serialize the form data
                        dataType: 'html'
                    })
                            .done(function (data) {
                                    
                                var br = document.createElement("br");
                                var myDiv = document.getElementById("main_div");
                                myDiv.innerHTML = "";
                                myDiv.style.border = "3px solid black";
                                myDiv.append(document.createTextNode("You May Have This Diseases"));
                                var table = document.createElement('table');
                                $.each(JSON.parse(data), function (k, v) {
                                    var tr = document.createElement('tr');
                                    tr.style.border = "1px solid black";
                                    table.style.width = 100 + "%";
                                    var td1 = document.createElement('td');
                                    td1.innerHTML = k;
                                    tr.appendChild(td1);
                                    table.appendChild(tr);

                                });
                                myDiv.append(table);
                            });




                }
            }
        });
 

        $(function () {

            // applied typeahead to the text input box
            $('#2,#1,#3,#4,#5,#6,#7,#8,#9,#10').typeahead({
                // data source

                source: function (query, process) {
                    $.ajax({
                        url: 'typeahead_json.php',
                        type: 'get',
                        data: 'query=' + query,
                        dataType: 'JSON',
                        async: true,
                        success: function (data) {

                            //console.log(JSON.parse(data));
                            process(data);
                        }
                    })
                }
                // max item numbers list in the dropdown

            });

        });

        function load_file() {
            $("footer").load("footer.html");
            $("#header").load("header.php");
        }