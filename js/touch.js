'use strict';
/***************
* TouchScaler Class / Constructor
***************/
function TouchScaler(targetlist) {
	this.targetlist=[]; // List of event listening elements
	this.buildTargetList(targetlist); // Builds element list
	this.minsize=6; // Minimum font size to prevent 'overshrinking'
	this.maxsize=30; // Maximum font size
	this.targetstyletype="font-size"; // Style property being scaled
	this.targetstyle=null; // element whose property will be scaled
	this.currentvalue=10; // initialising scale attribute
	this.linestart=0;  
	this.linecurrent=0;
	this.linechange=0;
	this.newsize=0;
	this.multitouch=false; // true if more than one point of touch
	this.cookie=new CookieHandler("fontsize"); // initialise Cookie
	this.setFromCookie();
	this.refreshStyle();
	this.cookie.setValue(this.currentvalue);
	this.cookie.setCookie();
	// Registers eventlisteners for touch start, move, and end for all targets
	for(var i=0;i<this.targetlist.length;i++) {
		this.targetlist[i].addEventListener("touchstart", this.startTouch.bind(this), false);
		this.targetlist[i].addEventListener("touchmove", this.moveTouch.bind(this), false);
		this.targetlist[i].addEventListener("touchend", this.endTouch.bind(this), false);
	}

}
	/************
	* Iterates through the target list supplied by userAgent
	************/
	TouchScaler.prototype.buildTargetList=function(targetlist) {
		for(var i=0;i<targetlist.length;i++) {
			var temptarget=this.getTarget(targetlist[i]);
			for(var j=0;j<temptarget.length;j++) {
				this.targetlist.push(temptarget[j]);
			}
		}
	}
	/************
	* Returns an array of targets dependent on selector type
	************/
	TouchScaler.prototype.getTarget=function(target) {
		var targetlist=[];
		if(target.indexOf('#')!==-1) {
			// id passed
			targetlist.push(document.getElementById(target.substr(1)));
		} else if(target.indexOf('.')!==-1) {
			// class passed
			targetlist= document.getElementsByClassName(target.substr(1));
		} else {
			//tagname passed   
			targetlist= document.getElementsByTagName(target);
		}
		return targetlist;
	};
	
	/***********
	* Called on each new touch event
	***********/
	TouchScaler.prototype.startTouch=function(e) {

		if(e.touches.length>1 && !this.multitouch) {
			this.multitouch=true;
			this.refreshStyle();
			var sx1=e.touches[0].clientX;
			var sy1=e.touches[0].clientY;
			var sx2=e.touches[1].clientX;
			var sy2=e.touches[1].clientY;
			this.linestart=Math.sqrt(Math.pow(Math.abs(sx1-sx2),2)+Math.pow(Math.abs(sy1-sy2),2));
			e.preventDefault();
		}
		
	};
	
	/************
	* Called when a point of touch moves
	************/
	TouchScaler.prototype.moveTouch=function(e) {
		if(e.touches.length>1 && this.multitouch) {
			var cx1=e.changedTouches[0].clientX;
			var cy1=e.changedTouches[0].clientY;
			var cx2=e.changedTouches[1].clientX;
			var cy2=e.changedTouches[1].clientY;
			this.linecurrent=Math.sqrt(Math.pow(Math.abs(cx1-cx2),2)+Math.pow(Math.abs(cy1-cy2),2));
			this.linechange=(this.linecurrent-this.linestart)/10;
			
			this.newsize=this.currentvalue+this.linechange;
			if(this.newsize<this.minsize){this.newsize=this.minsize;}
			if(this.newsize>this.maxsize){this.newsize=this.maxsize;}

			document.documentElement.style.setProperty(this.targetstyletype,this.newsize+"px",null);
			e.preventDefault();
		}
		
	};
	
	/************
	* Called when a point of touch ceases
	************/
	TouchScaler.prototype.endTouch=function(e) {
		if(this.multitouch) {
			this.multitouch=false;
			this.currentvalue=this.newsize;
			if(this.currentvalue==0){this.currentvalue=this.minsize;}
			this.cookie.setValue(this.currentvalue);
			this.cookie.setCookie();
		}

	};

	/**********
	* Called when TouchScaler is instatiated
	* ********/
	TouchScaler.prototype.setFromCookie=function() {
		if(this.cookie.getValue()!==null) {
			document.documentElement.style.setProperty(this.targetstyletype,this.cookie.value+"px",null);
		}
	};
	
	/**********
	* Updates the current style properties of the targetstyle
	**********/
	TouchScaler.prototype.refreshStyle=function() {
		this.targetstyle=window.getComputedStyle(document.documentElement);
		this.currentvalue=parseFloat(this.targetstyle.getPropertyValue(this.targetstyletype));
	};

/***********
* Simple cookie handler class
***********/
function CookieHandler(cookiename) {
	this.name=cookiename;
	this.days=7;
	this.value=this.getCookie();
	
};
	CookieHandler.prototype.getCookie=function() {
		return this.gc(this.name);
	};
	// Get cookie
	CookieHandler.prototype.gc = function(name) {
		if (document.cookie.length>0) {
			var c_start=document.cookie.indexOf(name+"=");
			if (c_start!=-1) {
				c_start=c_start+name.length+1;
				var c_end=document.cookie.indexOf(";",c_start);
				if (c_end==-1) { c_end=document.cookie.length; }
				return unescape(document.cookie.substring(c_start,c_end));
			}
		}
		return null;
	};
	
	// Set Cookie
	CookieHandler.prototype.setCookie=function() {
		this.sc(this.value,this.name,this.days);
	};
	
	CookieHandler.prototype.sc= function(value, name, days) {
		var expires = "";
		if (days) {
			var thedate = new Date();
			thedate.setTime(thedate.getTime()+(days*24*60*60*1000));
			var expires = "; expires="+thedate.toUTCString();
		}
		document.cookie = name+"="+escape(value)+((days==null) ? "" : expires+"; path=/");
	};
	
	CookieHandler.prototype.getValue=function() {return this.value;}
	CookieHandler.prototype.setValue=function(value){this.value=value;}
	