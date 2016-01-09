/*

SkinnyTip JavaScript Tooltip Library

The first version SkinnyTip was written in 2006 by Elliott Brueggeman to allow
easy creation of tooltips on sites and applications. The library was modernized
and rewritten first in 2007, and again in 2015 when it was open-sourced under 
the MIT License. Please visit http://www.ebrueggeman.com/skinnytip for more 
information.

---

The MIT License (MIT)

Copyright (c) 2015 Elliott Brueggeman

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.

*/

var SkinnyTip = SkinnyTip || {
	divId: 'skinnytip-layer',
	mouseX: null,
	mouseY: null,
	zIndexLayer: 10000,
	text: null,
	title: null,
	xOffset:15,
	yOffset: 15
};

SkinnyTip.reset = function() {
	this.xOffset = 15;
	this.yOffset = 15;
	this.width = '300px';
	this.titlePadding = '1px';
	this.textPadding = '1px 3px';
	this.fontSize = '14px';
	this.titleFontSize = '14px';
	this.layer = null;
	this.zIndex = 0;
	this.visible = false;
};

SkinnyTip.init = function() {
	var targets = document.querySelectorAll(".skinnytip");
	var targetCount = targets.length;
	for (var i = 0; i < targetCount; i++) {
		targets[i].addEventListener('mouseover', function() {
			var title, text, options;
			if (this.hasAttribute('data-title')) {
				title = this.getAttribute('data-title');
			}
			if (this.hasAttribute('data-text')) {
				text = this.getAttribute('data-text');
			}
			if (this.hasAttribute('data-options')) {
				options = this.getAttribute('data-options');
			}
			SkinnyTip.tooltip(text, title, options);
		});
		targets[i].addEventListener('mouseout', function() {
			SkinnyTip.hideTip();
		});
	}
	targets = null;
	this.captureMouse();
};

SkinnyTip.tooltip = function(text, title, options) {
	if (!text & !title) {
		return false;
	}
	//Reset variables for this tool tip
	this.reset();
	this.title = title;
	this.text = text;

	if (!(this.layer = self.document.getElementById(this.divId))) {
		var div = document.createElement("div");
		div.id = this.divId;
		div.style.visibility = "hidden";
		div.style['z-index'] = "10000";
		div.style.position = "absolute";
		document.body.appendChild(div);
		this.layer = div;
	}

	//if we have mouse coords, create and show tooltip
	if (this.mouseX && this.mouseY) {
		this.parseOptions(options);
		this.assemble(this.getMarkup(this.text, this.title));
		this.position();
		this.layer.style.visibility = 'visible';
		this.visible = true;
	}
};

// Set mouse handler callback.
SkinnyTip.captureMouse = function() {
	var self = this;
	document.onmousemove = SkinnyTip.mouseMoveHandler.bind(this);
};

// Callback for document.onmousemove
SkinnyTip.mouseMoveHandler = function(e) {
	if (!e) {
		e = event;
	}
	// if there is an x pos property, get mouse location
	this.mouseX = this.getMouseX(e);
	this.mouseY = this.getMouseY(e);
	if (this.visible) {
		this.position();
	}
};

//get mouse x coords
SkinnyTip.getMouseX = function(e) {
	if (e.pageX) {
		return e.pageX;
	}
	return e.clientX ? e.clientX + 
		(document.documentElement.scrollLeft ?
		document.documentElement.scrollLeft :
		document.body.scrollLeft) : this.mouseX;
};

//get mouse y coords
SkinnyTip.getMouseY = function(e) {
	if (e.pageY) { 
		return e.pageY; 
	}
	return e.clientY ? e.clientY + 
		(document.documentElement.scrollTop ?
		document.documentElement.scrollTop :
		document.body.scrollTop) : this.mouseY;
};

SkinnyTip.parseOptions = function(options) {
	if (options) {
		var optArr = options.split(',');
		for (var i = 0; i < optArr.length; i++) {
			var args = optArr[i].split(':');
			eval('this.' + this.trimWhitespace(args[0]) + '="' +
				this.trimWhitespace(args[1]) + '"');
		}
	}
};

SkinnyTip.hideTip = function() {
	if (this.visible && this.layer) {
		this.layer.style.visibility = 'hidden';
		this.visible = false;
	}
};

SkinnyTip.getMarkup = function(text, title) {
	var containerStyle = 'width:' + this.width + ';' +
		'border:' + this.border + ' solid ' + this.borderColor + ';' +
		'background-color:' + this.backColor + ';' +
		'font-family:' + this.fontFace + ';' +
		'font-size:' + this.fontSize + ';';
	
	var titleStyle = 'background-color:' + this.borderColor + ';' +
		'padding:' + this.titlePadding + ';' +
		'color:' + this.titleTextColor + ';' +
		'font-size:' + this.titleFontSize + ';';
	
	var contentStyle = 'padding:' + this.textPadding + ';' +
		'color:' + this.textColor + ';';
	
	var txt = '<div id="skinnytip-container" style="' + containerStyle + '">';
	if (title) {
		txt += '<div id="skinnytip-title" style="' + titleStyle + '">' + title + '</div>';
	}
	if (text) {
		txt += '<div id="skinnytip-content" style="' + contentStyle + '">' + text + '</div>';
	}
	txt += '</div>';
	return txt;
};

//Positions popup according to mouse input
SkinnyTip.position = function() {
	this.layer.style.left = this.getXPlacement() + 'px';
	this.layer.style.top = this.getYPlacement() + 'px';
};

//get horizontal box placement
SkinnyTip.getXPlacement = function() {
	return this.mouseX + parseInt(this.xOffset);
};

//get vertical box placement
SkinnyTip.getYPlacement = function() {
	return this.mouseY + parseInt(this.yOffset);
};

//Creates the popup
SkinnyTip.assemble = function(input) {
	if (typeof this.layer.innerHTML != 'undefined') {
		this.layer.innerHTML = '<div style="position: absolute; top: 0; left: 0; width: ' + 
			this.width + '; z-index: ' + (this.zIndex+1) + ';">' + input + '</div>';
	}
};

SkinnyTip.trimWhitespace = function(str) {
	return str.replace(/^\s+|\s+$/gm, '');
};

// Credit to Douglas Crockford for this
if (!Function.prototype.bind) {
	Function.prototype.bind = function (oThis) {
		if (typeof this !== "function") {
			// closest thing possible to the ECMAScript 5 internal IsCallable functionâ€‹
			throw new TypeError ("Function.prototype.bind - is not callable");
		}
		var aArgs = Array.prototype.slice.call (arguments, 1),
			fToBind = this,
			fNOP = function () {
			},
			fBound = function () {
				return fToBind.apply (this instanceof fNOP && oThis
					? this
					: oThis,
					aArgs.concat (Array.prototype.slice.call (arguments)));
			};
		fNOP.prototype = this.prototype;
		fBound.prototype = new fNOP ();
		return fBound;
	};
}