/* 
Textblock-Defintiion 
Stand: 05.12.2012
*/

.kblock:after {
    content: ".";
    display: block;
    height: 0;
    visibility: hidden;
    font-size: 0;
}


.textblock0 {display: block;
padding: 15px;
margin-top: 1em;
margin-bottom: 1em;
background-color: #FFF;
border: 4px solid #2B84C6;
text-align: left;
}


.textblock2 {
    display: block;
    padding: 10px;
    float: left;
    width: 43%;
    margin-right: 30px;
    margin-top: 0.2em;
    margin-bottom: 15px;
    background-color: #FFF;
    border: 1px solid #000;

}



.textblock1 {
    display: block;
    padding: 10px;
    float: right;
    width: 43%;
    margin-left: 30px;
    margin-top: 0.2em;
    margin-bottom: 15px;
    background-color: #FFF;
    border: 1px solid #000;
}

.textblock3
{
	width: 24%;
	display: inline-block;
	max-width: 280px;
	vertical-align: top;
	padding: 15px;
	text-align: center;
}


/* 
Spalten und Initialialbuchstabe
*/


.textcontainer.tcol3 {column-count: 3;   -moz-column-count:3; -ms-hyphens: auto;
        -moz-hyphens: auto;
        -webkit-hyphens: auto;
        hyphens: auto;  }
.textcontainer.tcol2 {column-count: 2;   -moz-column-count:2; -ms-hyphens: auto;
        -moz-hyphens: auto;
        -webkit-hyphens: auto;
        hyphens: auto;  }
.textcontainer.tinitial:first-letter { float: left; color: #000; font-size: 2.9em; line-height: 0.9em; padding-top: 4px; padding-right: 8px; padding-left: 3px; }





/* 
Bilddfinitionen + Animate CSS Defaults
Stand: 05.12.2012
*/

.pani, .hero2 h2.animated, .gallery-item, .gpleft, .textblock3,.wp1,
.wp2, .wp3, .wp4, .wp5, .wp6, .textblock0 {
    visibility: hidden
}

.bounceIn, .bounceInLeft, .bounceInUp, .slideInRight, .slideInUp,  .slideInLeft, .bounceInRight, 
.fadeInUp, .fadeInUpDelay, .fadeInDown, .fadeInUpD, .fadeInLeft, .fadeInRight, .fadeIn,
.bounceInDown, .hero2 h2.animated {
    visibility: visible
}







/* Standard-Gröe der Bilder (nicht ?ndern) */
.dopic {
    height: auto;
    width: 100%;
}

/* Standard-Anzeige für alle Viewports */
.pic_symbol {
    width: 10%;
}

.pic_klein {
    width: 25%;
}

.pic_mittel {
    width: 33%;
}

.pic_gross {
    width: 50%;
}

.pic_komplett {
    width: 100%;
    margin-bottom: 20px;
}

/* Bilder mit Rahmen */
.pic_border, .pic_border2 {
    padding: 2px;

    line-height: 0.9em;
    background-color: #fff;
    box-sizing: border-box;
}

.pic_border2  {
	border: 2px solid rgb(129,41,78);
}


.pic_border img {
    border: 1px solid #000;
}

.pic_round img {
    
    border-radius: 50%;
}

/* Bildausrichtung */
.pleft {
    float: left;
    margin-right: 1.8em;
    margin-bottom: 0.5em;
margin-top: 0.4em;

}

.pright {
    float: right;
    margin-left: 1em;
    margin-bottom: 0.5em;
	margin-top: 0.4em;

}

.pcenter {
    margin-right: auto;
    margin-bottom: 1em;
    margin-left: auto;
}

.pnormal {
    clear: both;
    margin-bottom: 1em;
    margin-left: auto;
    margin-right: auto;
}


.pnormal, .pcenter, .pright, .pleft
{
position: relative;
}
	

/* Untertitel */

/* allgemeiner Untertitel */
.pcaption {
    font-size: 0.8em;
    color: rgba(153, 153, 153, 1);
    padding-right: 5px;
    padding-left: 5px;
}

/* 2. Stil  Untertitel */
.pcaption2 {
    display: block;
    margin-bottom: 8px;
    border-bottom-width: 1px;
    border-bottom-style: solid;
    border-bottom-color: #CCC;
    font-size: 0.8em;
}

