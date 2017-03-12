<?php
require_once './connection.php';
$con = connect();

session_start();
if (!isset($_SESSION["username"])) {
    header("Location:http://localhost/health1/index.php");
}
?>
<html lang="en" xmlns="http://www.w3.org/1999/html">
    <head>

        <meta charset="utf-8">
            <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
            <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                <script src = "//cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js" ></script><script>new WOW().init();</script>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
                    <script type="text/javascript" src="js/header.js"></script>
                    <link rel="stylesheet" type="text/css" href="src/css/footer.css">
                        <script type="text/javascript" src="js/threshold.js"></script>          
                        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

                            </head>
                            <script>
                        $(document).ready(function () {
                            $("#article_div1").click(function () {
                                $("article").toggle();
                            });
                        });
                        wow = new WOW(
                                {
                                    animateClass: 'animated',
                                });
                        wow.init();
                            </script>
                            <body onload="load_file();">
                                <div id="header"></div>
                                <section style="background-color: whitesmoke;z-index: 5">
                                    <section style="background-color: whitesmoke;z-index: 5">
                                        <h1 style="text-align: center" class="wow flip" id="article_div1">How It Is Useful?</h1>
                                        <article class="text-muted text-justify wow fadeInDown" style="width: 80%; margin-left:10%; margin-right:10%;display: none">
                                            The lovely little town of Knittlingen, near the Black Forrest in West Germany, is noted far-and-wide as the original residence of the famed Dr. Johannes Faustus. A plaque in the small but exquisite museum devoted to the facts and legends concerning Dr. Faust tells us that, although alchemy has often been considered a pseudo-science based on the pretense that gold could be made from other metals, it is now known that, in reality, it was a spiritual art having as its aim the psychological transformation of the alchemist himself. This public statement, viewed daily by large numbers of visitors, demonstrates most impressively the rehabilitated image alchemy has acquired in recent decades. This positive change is due in large measure to the work of one remarkable man: Carl Gustav Jung.

                                            When Jung published his first major work on alchemy at the end of World War II, most reference books described this discipline as nothing more than a fraudulent and inefficient forerunner of modern chemistry. Today, more than twenty-five years after Jung's death, alchemy is once again a respected subject of both academic and popular interest, and alchemical terminology is used with great frequency in textbooks of depth-psychology and other disciplines. It may be said without exaggeration that the contemporary status of alchemy owes its very existence to the psychological wizard of Küsnacht. Take away the monumental contribution of C.G. Jung, and most modern research concerning this fascinating subject falls like a house of cards; to speak of alchemy in our age and not mention him could be likened to discoursing on Occultism without noting the importance of Helena P. Blavatsky, or discussing religious studies in contemporary American universities without paying homage to Mircea Eliade.

                                            Jung's "first love" among esoteric systems was Gnosticism. From the earliest days of his scientific career until the time of his death, his dedication to the subject of Gnosticism was relentless. As early as August, 1912, Jung intimated in a letter to Freud that he had an intuition that the essentially feminine-toned archaic wisdom of the Gnostics, symbolically called Sophia, was destined to re-enter modern Western culture by way of depth-psychology. Subsequently, he stated to Barbara Hannah that when he discovered the writings of the ancient Gnostics, "I felt as if I had at last found a circle of friends who understood me."

                                            The circle of little reliable, first-hand information was available to Jung within which he could have found the world and spirit of such past Gnostic luminaries as Valentinus, Basilides, and others. The fragmentary, and possibly mendacious, accounts of Gnostic teachings and practices appearing in the works of such heresy-hunting church fathers as Irenaeus and Hippolytus were a far cry from the wealth of archetypal lore available to us today in the Nag Hammadi collection. Of primary sources, the remarkable Pistis Sophia was one of very few available to Jung in translation, and his appreciation of this work was so great that he made a special effort to seek out the translator, the then aged and impecunious George R. S. Mead, in London to convey to him his great gratitude.1 Jung continued to explore Gnostic lore with great diligence, and his own personal matrix of inner experience became so affinitized to Gnostic imagery that he wrote the only published document of his great transformational crisis, The Seven Sermons to the Dead, using purely Gnostic terminology and mythologems of the system of Basilides.2
                                        </article>
                                    </section>
                                    <form action="#" method="get" class="form-horizontal" role="form" style="margin-bottom: 300px; padding: 5%; position: relative;left: 10%;width: 60%">

                                        <div class="form-group">
                                            <div class="col-sm-10 col-sm-offset-2" >
                                                <legend class="wow pulse" data-wow-iteration="infinite" data-wow-duration="2000ms" style="font-weight: bolder">Insert Value</legend>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-10 col-sm-offset-2">
                                                <select name="table_selection" id="table_selection" onchange="fun2(this.value);">
                                                    <option name="body_temprature" selected >body_temperature</option>
                                                    <option name="humidity" >humidity</option>
                                                    <option name="heartbit" >heartbit</option>
                                                    <option name="So2">So2</option>
                                                    <option name="Co2" >Co2</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-10 col-sm-offset-2">

                                                <input type="number"  name="user_input" id="user_input" required>
                                                    <input type="text" disabled id="val_in" value="&deg C" >
                                                        </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-sm-10 col-sm-offset-2">
                                                                <button type="button" class="wow pulse btn btn-primary" data-wow-iteration="infinite" data-wow-duration="2000ms" name="submit" onclick="fun3()">submit</button>
                                                            </div>
                                                        </div>

                                                        </form>
                                                        </section>
                                                        <footer></footer>
                                                        </body>
                                                        </html>