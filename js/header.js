 /* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
     $(document).ready(function () {
            $("#header").hide();
            $(window).scroll(function () {
                var window_scroll = $(this).scrollTop();
                var head = $("#header");
                var h2 = head.height();
                //if window is scroll down to height of navbar fadein navbar
                if (window_scroll > h2) {
                //$('#header').load('header.php');
                $("#header").fadeIn("slow");
                    
        } else {
                    $("#header").fadeOut(2000);
                }
            });
        });
   

