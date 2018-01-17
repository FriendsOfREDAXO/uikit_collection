<style>
* mform tab style by Thomas Skerbis */
.rex-slice-input .nav-tabs {
    margin-bottom: 0px
}

.do.nav-tabs,  .rex-slice-input .do.nav-tabs {
	border-bottom: 0px!important;
	margin: 0px!important;
        padding-bottom: 0;

}

.doedit .form-control.parsley-success:focus {
	color: #468847;
	background-color: #DFF0D8;
	border: 1px solid #D6E9C6;
}

.doedit .form-control.parsley-error:focus {
	color: #B94A48;
	background-color: #F2DEDE;
	border: 1px solid #EED3D7;
}

.doedit select.form-control {
	height: 34px;
}

.doedit select[multiple],
.doedit select[size] {
	height: auto;
}

.doedit .form-horizontal .mform-headline,
.doedit .form-horizontal .mform-description {
	margin-left: 0;
	margin-right: 0;
}
/* mform tab style by Thomas Skerbis */

.doedit .nav-tabs > li.active > a,
.doedit .nav-tabs > li.active > a:focus,
.doedit .nav-tabs > li.active > a:hover {
	border-width: 0;
}

.doedit .nav-tabs > li > a {
	border: none;
	color: #283541;
	background: rgba(163, 163, 163, 0.22);
}

.doedit .nav-tabs > li.active > a,
.doedit .nav-tabs > li > a:hover {
	border: none;
	color: #000;
	background: #FFF;
}

.doedit .nav-tabs > li > a::before {
	content: "";
	background: #000;
	background: rgba(0, 0, 0, 0.18);
	height: 4px;
	position: absolute;
	width: 100%;
	left: 0px;
	top: -2px;
	transition: all 250ms ease 0s;
	transform: scale(0);
}

.doedit .nav-tabs > li.active > a::before,
.doedit .nav-tabs > li:hover > a::after {
	transform: scale(1);
}

.doedit .tab-nav > li > a::after {
	background: #4285F4 none repeat scroll 0% 0%;
	color: #fff;
}

.doedit .tab-pane {
	padding: 15px 0;
}

.doedit .tab-content {
	padding: 20px;
	background: #fff;
	margin-bottom: 20px;
}
</style>
<div class="doedit">
  <!-- Nav tabs -->
  <ul class="nav do nav-tabs " role="tablist">
    <li role="presentation" class="active"><a href="#text" aria-controls="text" role="tab" data-toggle="tab">Text</a></li>
    <li role="presentation"><a href="#bild" aria-controls="bild" role="tab" data-toggle="tab">Bild</a></li>
    <li role="presentation"><a href="#extras" aria-controls="extras" role="tab" data-toggle="tab">Extras</a></li>
       
    </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="text">
	    
	
   
 <textarea  class="form-control ckeditor" data-ckeditor-profile="standard" name="REX_INPUT_VALUE[10]">REX_VALUE[10]</textarea>  	    
	    
    </div>
    <div role="tabpanel" class="tab-pane" id="bild">
	    
	   ....
	    
	    
	   
   
   
   
   
   
   
 <script language="JavaScript" type="text/javascript"> 
<!-- 
function doIt(theValue) 
{ 
    var divs=document.getElementsByTagName("DIV"); 
    for (var i=0;i<divs.length;i++) 
    { 
        if (divs[i].className=="myDivs") 
        { 
        divs[i].style.display=(( theValue=="every" || divs[i].id==theValue)?"block":"none"); 
        }; 
    } 
} 
//--> 
</script>

  
  
  <div class="form-horizontal">
	
	        <div class="form-group">
	            <label class="col-sm-3 control-label">Bild</label>
	            <div class="col-sm-9">
	           REX_MEDIA[id=1 widget=1 preview=1]
	            </div>
	        </div>
	        
			
			
			<div class="form-group">
	            <label class="col-sm-3 control-label">Beschreibung</label>
	            <div class="col-sm-6">
	            <input type="text" name="REX_INPUT_VALUE[1]" value="REX_VALUE[1]" placeholder="Beschreibung eingeben" class="form-control"  />
	            </div>
	             <div class="col-sm-3">
				 	<select id="REX_INPUT_VALUE[12]" class="selectpicker form-control" name="REX_INPUT_VALUE[12]">
				 	<option value="nein">nicht anzeigen</option>
				 	<option value='ja' <?php if ("REX_VALUE[12]" == 'ja') echo 'selected'; ?>>anzeigen </option >
			 	</select>	
			 	</div>
	  		</div>


	        
	        
	        <div class="form-group">
	            <label class="col-sm-3 control-label">Bildgröße</label>
	            <div class="col-sm-9">
	              <select class="selectpicker form-control" name="REX_INPUT_VALUE[2]">
      
			      <option value='klein' <?php  if ("REX_VALUE[2]" == 'klein') echo 'selected'; ?>>klein</option>
			      <option value='mittel' <?php  if ("REX_VALUE[2]" == 'mittel') echo 'selected'; ?>>mittel</option>
			      <option value='gross' <?php  if ("REX_VALUE[2]" == 'gross') echo 'selected'; ?>>groß</option>
			      <option value='komplett' <?php  if ("REX_VALUE[2]" == 'komplett') echo 'selected'; ?>>maximal</option>
			      <option value='symbol' <?php  if ("REX_VALUE[2]" == 'symbol') echo 'selected'; ?>>Symbol</option>  
			      
      
				  </select>	           
     			</div>
	        </div>
	        
	
	
	        
	        <div class="form-group">
	            <label class="col-sm-3 control-label">Design</label>
	            <div class="col-sm-9">
				<select name="REX_INPUT_VALUE[6]" class="selectpicker form-control">
      		     <option value='pic_border' <?php  if ("REX_VALUE[6]" == 'pic_border') echo 'selected'; ?>>Rahmen</option>
			     <option value='pic_round' <?php  if ("REX_VALUE[6]" == 'pic_round') echo 'selected'; ?>>Als Kreis ( aus Quadrat)</option>
			     <option value='' <?php  if ("REX_VALUE[6]" == '') echo 'selected'; ?>>ohne Rahmen</option>
    			</select>	            
    			</div>
	        </div>
	        
	        
	        <div class="form-group">
	            <label class="col-sm-3 control-label">Ausrichtung des Mediums</label>
	            <div class="col-sm-9">
	             <select name="REX_INPUT_VALUE[7]" class="selectpicker form-control">
				    <option value='pnormal' <?php if ("REX_VALUE[7]" == 'pnormal') echo 'selected'; ?>>Standard</option>
				    <option value='pleft' <?php if ("REX_VALUE[7]" == 'pleft') echo 'selected'; ?>>links vom Text</option>
				    <option value='pright' <?php if ("REX_VALUE[7]" == 'pright') echo 'selected'; ?>>rechts vom Text</option>
			    </select>
   	            </div>
	        </div>
	        
	        

			<div class="form-group">
	            <label class="col-sm-3 control-label">Animation</label>
	            <div class="col-sm-9">
	              <select name="REX_INPUT_VALUE[20]"class="selectpicker form-control" >
				  	<option value='' <?php  if ("REX_VALUE[20]" == '') echo 'selected'; ?>>Nein</option>
				  	<option value='pani' <?php  if ("REX_VALUE[20]" == 'pani') echo 'selected'; ?>>Ja</option>
				  </select>
                </div>
	        </div>
	      

			
			


<div class="form-group">
	           <label class="col-sm-3 control-label">Bild-Typ</label>
	           <div class="col-sm-9">
	           		<select class="selectpicker form-control" id="mySelect" name="REX_INPUT_VALUE[5]" onChange="doIt(this.value)">
			   		<option value='normal' <?php  if ("REX_VALUE[5]" == 'normal') echo 'selected'; ?>>Normal</option>
			   		<option value='pic_big' <?php  if ("REX_VALUE[5]" == 'pic_big') echo 'selected'; ?>>Bildvergrößerung / Slideshow </option  >
			   		<option value='extern' <?php  if ("REX_VALUE[5]" == 'extern') echo 'selected'; ?>>Externer Link/ Video-Link</option >
			   		<option value='intern' <?php  if ("REX_VALUE[5]" == 'intern') echo 'selected'; ?>>Interner Link</option >
			   		<option value='datei' <?php  if ("REX_VALUE[5]" == 'datei') echo 'selected'; ?>>Datei-Link</option >
    				</select>	            
    			
    			
    			
    			
    			
    			
    			
    			
							    			<div id="pic_big" <?php  if ("REX_VALUE[5]" == 'pic_big'){ echo 'style="display:block;"'; } else echo 'style="display:none;"'; ?> class="myDivs">
							      
							<div class="textinfo">  <strong>Bilder werden bei Click vergrößert
							  </strong></div>
							  
							  <strong>Galerie anfügen</strong><br>(Die Titel dieser Bilder werden aus dem Medienpool ausgelesen)<br>
							  REX_MEDIALIST[id=1 preview=1 widget=1]<br>
							  
							        </div>
							      
							      
							      <div id="extern" <?php  if ("REX_VALUE[5]" == 'extern'){ echo 'style="display:block;"'; } else echo 'style="display:none;"'; ?> class="myDivs"><div class="ui-state-default ui-corner-all"> <strong>Externer Link </strong><br />
							        (vollst&auml;ndige Url inkl http://) :<br />
							        <input name="REX_INPUT_VALUE[4]" type="text" class="form-control" value="REX_VALUE[4]" size="30" /><select class="selectpicker" id="VALUE[16]" name="REX_INPUT_VALUE[16]">
							  <option value="">Standard-Link</option>
							  <option value='video' <?php if ("REX_VALUE[16]" == 'video') echo 'selected'; ?>>Video-Link </option >
							</select>
							        <br />
							        </div>
							      </div>
							      <div id="intern" <?php if ("REX_VALUE[5]" == 'intern'){ echo 'style="display:block;"'; } else echo 'style="display:none;"'; ?> class="myDivs"><div class="ui-state-default ui-corner-all"> <strong>        interner Link:</strong><br />
							        REX_LINK[id=1 widget=1]
						
							      </div>
							     
							  </div>
							  <br />
							 <div id="datei" <?php  if ("REX_VALUE[5]" == 'datei'){ echo 'style="display:block;"'; } else echo 'style="display:none;"'; ?> class="myDivs"> <strong> Datei-Link:</strong><br />
							          REX_MEDIA[id=2 widget=1 preview=1]</div>

    			
    			
    			
    			</div>
	        </div>



</div>
  

	    
    </div>
    <div role="tabpanel" class="tab-pane" id="extras">
	    
	    
	    
	    
	    <h4>Zusätzlichen Inhalt einbinden:</h4><br><br>
Sie können zusätzliche Inhalte nach dem Hauptblock einbinden. Hierzu erstellen Sie einen separaten Artikel den Sie einbinden möchten. <br>
Nach Klick auf einen &quot;Mehr&quot;-Link kann dieser Artikel durch den Benutzer eingeblendet werden. <br>
<strong><br>
Artikel<br>
REX_LINK[id=4 widget=1]<br>
<br>
Mehr-Link-Bezeichnung</strong><br>
<input class="form-control" name="REX_INPUT_VALUE[18]" type="text" value="REX_VALUE[18]" size="35">
<br>
<strong><br>
Zuklappen-Bezeichnung</strong><br>
<input class="form-control" name="REX_INPUT_VALUE[17]" type="text" value="REX_VALUE[17]" size="35">

<br>
        <br>
        <p><a href="http://manual.klxm.com/25-0-bild-3-x.html" target="_blank"></a></p>
          <p>&nbsp;</p>  


    </div>
  </div>
  
<div class="top-content">
<div class="form-group">
	            <label class="col-sm-2 control-label">Design</label>
	            <div class="col-sm-4">
<select class="form-control selectpicker" name="REX_INPUT_VALUE[11]">
<option value='' <?php  if ("REX_VALUE[11]" == '') echo 'selected'; ?>>Normal</option>
<option value=' ctext' <?php  if ("REX_VALUE[11]" == ' ctext') echo 'selected'; ?>>Zentrierter Text</option>
<option value='0' <?php  if ("REX_VALUE[11]" == '0') echo 'selected'; ?>>Kasten</option>
<option value='0 cetext' <?php  if ("REX_VALUE[11]" == '0 ctext') echo 'selected'; ?>>Kasten zentr. Text </option>
</select>	            </div>
<div class="col-sm-3">
	            <select class="form-control selectpicker" name="REX_INPUT_VALUE[8]">
 <option value='' <?php  if ("REX_VALUE[8]" == '') echo 'selected'; ?>>1 Spalte</option>
 <option value=' tcol3 ' <?php  if ("REX_VALUE[8]" == ' tcol3 ') echo 'selected'; ?>>3 Spalten</option>
 <option value=' tcol2 ' <?php  if ("REX_VALUE[8]" == ' tcol2 ') echo 'selected'; ?>>2 Spalten</option>
 </select>
	            </div>

<div class="col-sm-3">
	            <select class="form-control selectpicker" name="REX_INPUT_VALUE[9]">
 <option value='' <?php  if ("REX_VALUE[9]" == '') echo 'selected'; ?>>1 Buchstabe normal</option>
 <option value=' tinitial ' <?php  if ("REX_VALUE[9]" == ' tinitial ') echo 'selected'; ?>>Initial</option>
 
 </select>
	            </div>


	        </div> 

</div>
 </div>   