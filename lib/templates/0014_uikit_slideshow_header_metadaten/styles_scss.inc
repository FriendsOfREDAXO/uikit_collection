// CSS für die Einbindung von Videos

/* FLOATIN BUTTONS */
.gallery_container_start {
	position: relative;
}
.floating_buttons {
	position: absolute;
	top: 60px;
	right: 0;
	z-index: 2;
}
.floating_buttons li {
	margin-bottom: 2px;
	list-style: none;
}
.floating_buttons li button {
/*	background: rgb(114,152,210);*/
	text-align: center;
	line-height: 0;
	padding: 10px 10px;
}
.floating_buttons li button i {
	color: white;
}
#floating_buttons_phone_field {
	position: absolute;
	right: 36px;	
	top: 0px;
	background: rgba(29, 135, 240, 0.8);
	color: white;
	font-weight: 600;
	transition: all 1s;
}
#floating_buttons_info_field {
	position: absolute;
	right: 36px;	
	top: 38px;
	background: rgba(29, 135, 240, 0.8);
	color: white;
	transition: all 1s;
}
.floating_buttons_info a {
	color: white;
	font-weight: 600;
}
#floating_buttons_search_field {
	position: absolute;
	right: 36px;	
	top: 76px;
	background: rgba(29, 135, 240, 0.8);
	color: white;
	transition: all 1s;
}
.floating_buttons_invisible {
	overflow: hidden;
	opacity: 0;
	width: 0px;
	height: 0px;
}
.floating_buttons_phone_visible {
	opacity: 1;
	width: 300px;
	height: 200px;
	padding: 10px 10px;
	transition: all 2s;
}
.floating_buttons_info_visible {
	opacity: 1;
	width: 150px;
	height: 16px;
	padding: 10px 10px;
	transition: all 2s;
}
.floating_buttons_search_visible {
	opacity: 1;
	width: 150px;
	height: 40px;
	padding: 10px 10px;
	transition: all 2s;
}
@media (max-width: 960px) {
	#floating_buttons_phone_field {
		font-size: .9em;
	}
}