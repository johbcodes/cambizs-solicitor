!(function (t) {
	var s = { set: { colors: 1, values: 1, backgroundColor: 1, scaleColors: 1, normalizeFunction: 1, focus: 1 }, get: { selectedRegions: 1, selectedMarkers: 1, mapObject: 1, regionName: 1 } };
	t.fn.vectorMap = function (t) {
		var e,
			a = this.children(".jvectormap-container").data("mapObject");
		if ("addMap" === t) jvm.Map.maps[arguments[1]] = arguments[2];
		else {
			if (("set" === t || "get" === t) && s[t][arguments[1]]) return (e = arguments[1].charAt(0).toUpperCase() + arguments[1].substr(1)), a[t + e].apply(a, Array.prototype.slice.call(arguments, 2));
			((t = t || {}).container = this), (a = new jvm.Map(t));
		}
		return this;
	};
})(jQuery),
	(function (t) {
		"function" == typeof define && define.amd ? define(["jquery"], t) : "object" == typeof exports ? (module.exports = t) : t(jQuery);
	})(function (h) {
		var o,
			l,
			t = ["wheel", "mousewheel", "DOMMouseScroll", "MozMousePixelScroll"],
			e = "onwheel" in document || 9 <= document.documentMode ? ["wheel"] : ["mousewheel", "DomMouseScroll", "MozMousePixelScroll"],
			m = Array.prototype.slice;
		if (h.event.fixHooks) for (var a = t.length; a; ) h.event.fixHooks[t[--a]] = h.event.mouseHooks;
		var s = (h.event.special.mousewheel = {
			version: "3.1.9",
			setup: function () {
				if (this.addEventListener) for (var t = e.length; t; ) this.addEventListener(e[--t], i, !1);
				else this.onmousewheel = i;
				h.data(this, "mousewheel-line-height", s.getLineHeight(this)), h.data(this, "mousewheel-page-height", s.getPageHeight(this));
			},
			teardown: function () {
				if (this.removeEventListener) for (var t = e.length; t; ) this.removeEventListener(e[--t], i, !1);
				else this.onmousewheel = null;
			},
			getLineHeight: function (t) {
				return parseInt(h(t)["offsetParent" in h.fn ? "offsetParent" : "parent"]().css("fontSize"), 10);
			},
			getPageHeight: function (t) {
				return h(t).height();
			},
			settings: { adjustOldDeltas: !0 },
		});
		function i(t) {
			var e,
				a = t || window.event,
				s = m.call(arguments, 1),
				i = 0,
				n = 0,
				r = 0;
			if ((((t = h.event.fix(a)).type = "mousewheel"), "detail" in a && (r = -1 * a.detail), "wheelDelta" in a && (r = a.wheelDelta), "wheelDeltaY" in a && (r = a.wheelDeltaY), "wheelDeltaX" in a && (n = -1 * a.wheelDeltaX), "axis" in a && a.axis === a.HORIZONTAL_AXIS && ((n = -1 * r), (r = 0)), (i = 0 === r ? n : r), "deltaY" in a && (i = r = -1 * a.deltaY), "deltaX" in a && ((n = a.deltaX), 0 === r && (i = -1 * n)), 0 !== r || 0 !== n)) return 1 === a.deltaMode ? ((i *= e = h.data(this, "mousewheel-line-height")), (r *= e), (n *= e)) : 2 === a.deltaMode && ((i *= e = h.data(this, "mousewheel-page-height")), (r *= e), (n *= e)), (e = Math.max(Math.abs(r), Math.abs(n))), (!l || e < l) && p(a, (l = e)) && (l /= 40), p(a, e) && ((i /= 40), (n /= 40), (r /= 40)), (i = Math[1 <= i ? "floor" : "ceil"](i / l)), (n = Math[1 <= n ? "floor" : "ceil"](n / l)), (r = Math[1 <= r ? "floor" : "ceil"](r / l)), (t.deltaX = n), (t.deltaY = r), (t.deltaFactor = l), (t.deltaMode = 0), s.unshift(t, i, n, r), o && clearTimeout(o), (o = setTimeout(c, 200)), (h.event.dispatch || h.event.handle).apply(this, s);
		}
		function c() {
			l = null;
		}
		function p(t, e) {
			return s.settings.adjustOldDeltas && "mousewheel" === t.type && e % 120 == 0;
		}
		h.fn.extend({
			mousewheel: function (t) {
				return t ? this.bind("mousewheel", t) : this.trigger("mousewheel");
			},
			unmousewheel: function (t) {
				return this.unbind("mousewheel", t);
			},
		});
	});
var jvm = {
	inherits: function (t, e) {
		function a() {}
		(a.prototype = e.prototype), (t.prototype = new a()), ((t.prototype.constructor = t).parentClass = e);
	},
	mixin: function (t, e) {
		for (var a in e.prototype) e.prototype.hasOwnProperty(a) && (t.prototype[a] = e.prototype[a]);
	},
	min: function (t) {
		var e,
			a = Number.MAX_VALUE;
		if (t instanceof Array) for (e = 0; e < t.length; e++) t[e] < a && (a = t[e]);
		else for (e in t) t[e] < a && (a = t[e]);
		return a;
	},
	max: function (t) {
		var e,
			a = Number.MIN_VALUE;
		if (t instanceof Array) for (e = 0; e < t.length; e++) t[e] > a && (a = t[e]);
		else for (e in t) t[e] > a && (a = t[e]);
		return a;
	},
	keys: function (t) {
		var e,
			a = [];
		for (e in t) a.push(e);
		return a;
	},
	values: function (t) {
		for (var e, a = [], s = 0; s < arguments.length; s++) for (e in (t = arguments[s])) a.push(t[e]);
		return a;
	},
	whenImageLoaded: function (t) {
		var e = new jvm.$.Deferred(),
			a = jvm.$("<img/>");
		return (
			a
				.error(function () {
					e.reject();
				})
				.load(function () {
					e.resolve(a);
				}),
			a.attr("src", t),
			e
		);
	},
	isImageUrl: function (t) {
		return /\.\w{3,4}$/.test(t);
	},
};
(jvm.$ = jQuery),
	Array.prototype.indexOf ||
		(Array.prototype.indexOf = function (t, e) {
			var a;
			if (null == this) throw new TypeError('"this" is null or not defined');
			var s = Object(this),
				i = s.length >>> 0;
			if (0 == i) return -1;
			if (((e = +e || 0), i <= (e = Math.abs(e) === 1 / 0 ? 0 : e))) return -1;
			for (a = Math.max(0 <= e ? e : i - Math.abs(e), 0); a < i; ) {
				if (a in s && s[a] === t) return a;
				a++;
			}
			return -1;
		}),
	(jvm.AbstractElement = function (t, e) {
		(this.node = this.createElement(t)), (this.name = t), (this.properties = {}), e && this.set(e);
	}),
	(jvm.AbstractElement.prototype.set = function (t, e) {
		if ("object" == typeof t) for (var a in t) (this.properties[a] = t[a]), this.applyAttr(a, t[a]);
		else (this.properties[t] = e), this.applyAttr(t, e);
	}),
	(jvm.AbstractElement.prototype.get = function (t) {
		return this.properties[t];
	}),
	(jvm.AbstractElement.prototype.applyAttr = function (t, e) {
		this.node.setAttribute(t, e);
	}),
	(jvm.AbstractElement.prototype.remove = function () {
		jvm.$(this.node).remove();
	}),
	(jvm.AbstractCanvasElement = function (t, e, a) {
		(this.container = t), this.setSize(e, a), (this.rootElement = new jvm[this.classPrefix + "GroupElement"]()), this.node.appendChild(this.rootElement.node), this.container.appendChild(this.node);
	}),
	(jvm.AbstractCanvasElement.prototype.add = function (t, e) {
		(e = e || this.rootElement).add(t), (t.canvas = this);
	}),
	(jvm.AbstractCanvasElement.prototype.addPath = function (t, e, a) {
		return (e = new jvm[this.classPrefix + "PathElement"](t, e)), this.add(e, a), e;
	}),
	(jvm.AbstractCanvasElement.prototype.addCircle = function (t, e, a) {
		return (e = new jvm[this.classPrefix + "CircleElement"](t, e)), this.add(e, a), e;
	}),
	(jvm.AbstractCanvasElement.prototype.addImage = function (t, e, a) {
		return (e = new jvm[this.classPrefix + "ImageElement"](t, e)), this.add(e, a), e;
	}),
	(jvm.AbstractCanvasElement.prototype.addText = function (t, e, a) {
		return (e = new jvm[this.classPrefix + "TextElement"](t, e)), this.add(e, a), e;
	}),
	(jvm.AbstractCanvasElement.prototype.addGroup = function (t) {
		var e = new jvm[this.classPrefix + "GroupElement"]();
		return (t || this).node.appendChild(e.node), (e.canvas = this), e;
	}),
	(jvm.AbstractShapeElement = function (t, e, a) {
		(this.style = a || {}), (this.style.current = this.style.current || {}), (this.isHovered = !1), (this.isSelected = !1), this.updateStyle();
	}),
	(jvm.AbstractShapeElement.prototype.setStyle = function (t, e) {
		var a = {};
		"object" == typeof t ? (a = t) : (a[t] = e), jvm.$.extend(this.style.current, a), this.updateStyle();
	}),
	(jvm.AbstractShapeElement.prototype.updateStyle = function () {
		var t = {};
		jvm.AbstractShapeElement.mergeStyles(t, this.style.initial), jvm.AbstractShapeElement.mergeStyles(t, this.style.current), this.isHovered && jvm.AbstractShapeElement.mergeStyles(t, this.style.hover), this.isSelected && (jvm.AbstractShapeElement.mergeStyles(t, this.style.selected), this.isHovered && jvm.AbstractShapeElement.mergeStyles(t, this.style.selectedHover)), this.set(t);
	}),
	(jvm.AbstractShapeElement.mergeStyles = function (t, e) {
		for (var a in (e = e || {})) null === e[a] ? delete t[a] : (t[a] = e[a]);
	}),
	(jvm.SVGElement = function (t, e) {
		jvm.SVGElement.parentClass.apply(this, arguments);
	}),
	jvm.inherits(jvm.SVGElement, jvm.AbstractElement),
	(jvm.SVGElement.svgns = "http://www.w3.org/2000/svg"),
	(jvm.SVGElement.prototype.createElement = function (t) {
		return document.createElementNS(jvm.SVGElement.svgns, t);
	}),
	(jvm.SVGElement.prototype.addClass = function (t) {
		this.node.setAttribute("class", t);
	}),
	(jvm.SVGElement.prototype.getElementCtr = function (t) {
		return jvm["SVG" + t];
	}),
	(jvm.SVGElement.prototype.getBBox = function () {
		return this.node.getBBox();
	}),
	(jvm.SVGGroupElement = function () {
		jvm.SVGGroupElement.parentClass.call(this, "g");
	}),
	jvm.inherits(jvm.SVGGroupElement, jvm.SVGElement),
	(jvm.SVGGroupElement.prototype.add = function (t) {
		this.node.appendChild(t.node);
	}),
	(jvm.SVGCanvasElement = function (t, e, a) {
		(this.classPrefix = "SVG"), jvm.SVGCanvasElement.parentClass.call(this, "svg"), (this.defsElement = new jvm.SVGElement("defs")), this.node.appendChild(this.defsElement.node), jvm.AbstractCanvasElement.apply(this, arguments);
	}),
	jvm.inherits(jvm.SVGCanvasElement, jvm.SVGElement),
	jvm.mixin(jvm.SVGCanvasElement, jvm.AbstractCanvasElement),
	(jvm.SVGCanvasElement.prototype.setSize = function (t, e) {
		(this.width = t), (this.height = e), this.node.setAttribute("width", t), this.node.setAttribute("height", e);
	}),
	(jvm.SVGCanvasElement.prototype.applyTransformParams = function (t, e, a) {
		(this.scale = t), (this.transX = e), (this.transY = a), this.rootElement.node.setAttribute("transform", "scale(" + t + ") translate(" + e + ", " + a + ")");
	}),
	(jvm.SVGShapeElement = function (t, e, a) {
		jvm.SVGShapeElement.parentClass.call(this, t, e), jvm.AbstractShapeElement.apply(this, arguments);
	}),
	jvm.inherits(jvm.SVGShapeElement, jvm.SVGElement),
	jvm.mixin(jvm.SVGShapeElement, jvm.AbstractShapeElement),
	(jvm.SVGShapeElement.prototype.applyAttr = function (t, e) {
		var a,
			s,
			i = this;
		"fill" === t && jvm.isImageUrl(e)
			? jvm.SVGShapeElement.images[e]
				? this.applyAttr("fill", "url(#image" + jvm.SVGShapeElement.images[e] + ")")
				: jvm.whenImageLoaded(e).then(function (t) {
						(s = new jvm.SVGElement("image")).node.setAttributeNS("http://www.w3.org/1999/xlink", "href", e), s.applyAttr("x", "0"), s.applyAttr("y", "0"), s.applyAttr("width", t[0].width), s.applyAttr("height", t[0].height), (a = new jvm.SVGElement("pattern")).applyAttr("id", "image" + jvm.SVGShapeElement.imageCounter), a.applyAttr("x", 0), a.applyAttr("y", 0), a.applyAttr("width", t[0].width / 2), a.applyAttr("height", t[0].height / 2), a.applyAttr("viewBox", "0 0 " + t[0].width + " " + t[0].height), a.applyAttr("patternUnits", "userSpaceOnUse"), a.node.appendChild(s.node), i.canvas.defsElement.node.appendChild(a.node), (jvm.SVGShapeElement.images[e] = jvm.SVGShapeElement.imageCounter++), i.applyAttr("fill", "url(#image" + jvm.SVGShapeElement.images[e] + ")");
				  })
			: jvm.SVGShapeElement.parentClass.prototype.applyAttr.apply(this, arguments);
	}),
	(jvm.SVGShapeElement.imageCounter = 1),
	(jvm.SVGShapeElement.images = {}),
	(jvm.SVGPathElement = function (t, e) {
		jvm.SVGPathElement.parentClass.call(this, "path", t, e), this.node.setAttribute("fill-rule", "evenodd");
	}),
	jvm.inherits(jvm.SVGPathElement, jvm.SVGShapeElement),
	(jvm.SVGCircleElement = function (t, e) {
		jvm.SVGCircleElement.parentClass.call(this, "circle", t, e);
	}),
	jvm.inherits(jvm.SVGCircleElement, jvm.SVGShapeElement),
	(jvm.SVGImageElement = function (t, e) {
		jvm.SVGImageElement.parentClass.call(this, "image", t, e);
	}),
	jvm.inherits(jvm.SVGImageElement, jvm.SVGShapeElement),
	(jvm.SVGImageElement.prototype.applyAttr = function (t, e) {
		var a = this;
		"image" == t
			? jvm.whenImageLoaded(e).then(function (t) {
					a.node.setAttributeNS("http://www.w3.org/1999/xlink", "href", e), (a.width = t[0].width), (a.height = t[0].height), a.applyAttr("width", a.width), a.applyAttr("height", a.height), a.applyAttr("x", a.cx - a.width / 2), a.applyAttr("y", a.cy - a.height / 2), jvm.$(a.node).trigger("imageloaded", [t]);
			  })
			: "cx" == t
			? ((this.cx = e), this.width && this.applyAttr("x", e - this.width / 2))
			: "cy" == t
			? ((this.cy = e), this.height && this.applyAttr("y", e - this.height / 2))
			: jvm.SVGImageElement.parentClass.prototype.applyAttr.apply(this, arguments);
	}),
	(jvm.SVGTextElement = function (t, e) {
		jvm.SVGTextElement.parentClass.call(this, "text", t, e);
	}),
	jvm.inherits(jvm.SVGTextElement, jvm.SVGShapeElement),
	(jvm.SVGTextElement.prototype.applyAttr = function (t, e) {
		"text" === t ? (this.node.textContent = e) : jvm.SVGTextElement.parentClass.prototype.applyAttr.apply(this, arguments);
	}),
	(jvm.VMLElement = function (t, e) {
		jvm.VMLElement.VMLInitialized || jvm.VMLElement.initializeVML(), jvm.VMLElement.parentClass.apply(this, arguments);
	}),
	jvm.inherits(jvm.VMLElement, jvm.AbstractElement),
	(jvm.VMLElement.VMLInitialized = !1),
	(jvm.VMLElement.initializeVML = function () {
		try {
			document.namespaces.rvml || document.namespaces.add("rvml", "urn:schemas-microsoft-com:vml"),
				(jvm.VMLElement.prototype.createElement = function (t) {
					return document.createElement("<rvml:" + t + ' class="rvml">');
				});
		} catch (t) {
			jvm.VMLElement.prototype.createElement = function (t) {
				return document.createElement("<" + t + ' xmlns="urn:schemas-microsoft.com:vml" class="rvml">');
			};
		}
		document.createStyleSheet().addRule(".rvml", "behavior:url(#default#VML)"), (jvm.VMLElement.VMLInitialized = !0);
	}),
	(jvm.VMLElement.prototype.getElementCtr = function (t) {
		return jvm["VML" + t];
	}),
	(jvm.VMLElement.prototype.addClass = function (t) {
		jvm.$(this.node).addClass(t);
	}),
	(jvm.VMLElement.prototype.applyAttr = function (t, e) {
		this.node[t] = e;
	}),
	(jvm.VMLElement.prototype.getBBox = function () {
		var t = jvm.$(this.node);
		return { x: t.position().left / this.canvas.scale, y: t.position().top / this.canvas.scale, width: t.width() / this.canvas.scale, height: t.height() / this.canvas.scale };
	}),
	(jvm.VMLGroupElement = function () {
		jvm.VMLGroupElement.parentClass.call(this, "group"), (this.node.style.left = "0px"), (this.node.style.top = "0px"), (this.node.coordorigin = "0 0");
	}),
	jvm.inherits(jvm.VMLGroupElement, jvm.VMLElement),
	(jvm.VMLGroupElement.prototype.add = function (t) {
		this.node.appendChild(t.node);
	}),
	(jvm.VMLCanvasElement = function (t, e, a) {
		(this.classPrefix = "VML"), jvm.VMLCanvasElement.parentClass.call(this, "group"), jvm.AbstractCanvasElement.apply(this, arguments), (this.node.style.position = "absolute");
	}),
	jvm.inherits(jvm.VMLCanvasElement, jvm.VMLElement),
	jvm.mixin(jvm.VMLCanvasElement, jvm.AbstractCanvasElement),
	(jvm.VMLCanvasElement.prototype.setSize = function (t, e) {
		var a, s, i, n;
		if (((this.width = t), (this.height = e), (this.node.style.width = t + "px"), (this.node.style.height = e + "px"), (this.node.coordsize = t + " " + e), (this.node.coordorigin = "0 0"), this.rootElement)) {
			for (i = 0, n = (a = this.rootElement.node.getElementsByTagName("shape")).length; i < n; i++) (a[i].coordsize = t + " " + e), (a[i].style.width = t + "px"), (a[i].style.height = e + "px");
			for (i = 0, n = (s = this.node.getElementsByTagName("group")).length; i < n; i++) (s[i].coordsize = t + " " + e), (s[i].style.width = t + "px"), (s[i].style.height = e + "px");
		}
	}),
	(jvm.VMLCanvasElement.prototype.applyTransformParams = function (t, e, a) {
		(this.scale = t), (this.transX = e), (this.transY = a), (this.rootElement.node.coordorigin = this.width - e - this.width / 100 + "," + (this.height - a - this.height / 100)), (this.rootElement.node.coordsize = this.width / t + "," + this.height / t);
	}),
	(jvm.VMLShapeElement = function (t, e) {
		jvm.VMLShapeElement.parentClass.call(this, t, e), (this.fillElement = new jvm.VMLElement("fill")), (this.strokeElement = new jvm.VMLElement("stroke")), this.node.appendChild(this.fillElement.node), this.node.appendChild(this.strokeElement.node), (this.node.stroked = !1), jvm.AbstractShapeElement.apply(this, arguments);
	}),
	jvm.inherits(jvm.VMLShapeElement, jvm.VMLElement),
	jvm.mixin(jvm.VMLShapeElement, jvm.AbstractShapeElement),
	(jvm.VMLShapeElement.prototype.applyAttr = function (t, e) {
		switch (t) {
			case "fill":
				this.node.fillcolor = e;
				break;
			case "fill-opacity":
				this.fillElement.node.opacity = Math.round(100 * e) + "%";
				break;
			case "stroke":
				(this.node.stroked = "none" !== e), (this.node.strokecolor = e);
				break;
			case "stroke-opacity":
				this.strokeElement.node.opacity = Math.round(100 * e) + "%";
				break;
			case "stroke-width":
				0 === parseInt(e, 10) ? (this.node.stroked = !1) : (this.node.stroked = !0), (this.node.strokeweight = e);
				break;
			case "d":
				this.node.path = jvm.VMLPathElement.pathSvgToVml(e);
				break;
			default:
				jvm.VMLShapeElement.parentClass.prototype.applyAttr.apply(this, arguments);
		}
	}),
	(jvm.VMLPathElement = function (t, e) {
		var a = new jvm.VMLElement("skew");
		jvm.VMLPathElement.parentClass.call(this, "shape", t, e), (this.node.coordorigin = "0 0"), (a.node.on = !0), (a.node.matrix = "0.01,0,0,0.01,0,0"), (a.node.offset = "0,0"), this.node.appendChild(a.node);
	}),
	jvm.inherits(jvm.VMLPathElement, jvm.VMLShapeElement),
	(jvm.VMLPathElement.prototype.applyAttr = function (t, e) {
		"d" === t ? (this.node.path = jvm.VMLPathElement.pathSvgToVml(e)) : jvm.VMLShapeElement.prototype.applyAttr.call(this, t, e);
	}),
	(jvm.VMLPathElement.pathSvgToVml = function (t) {
		var r,
			h,
			o = 0,
			l = 0;
		return (t = t.replace(/(-?\d+)e(-?\d+)/g, "0"))
			.replace(/([MmLlHhVvCcSs])\s*((?:-?\d*(?:\.\d+)?\s*,?\s*)+)/g, function (t, e, a, s) {
				(a = a.replace(/(\d)-/g, "$1,-").replace(/^\s+/g, "").replace(/\s+$/g, "").replace(/\s+/g, ",").split(","))[0] || a.shift();
				for (var i = 0, n = a.length; i < n; i++) a[i] = Math.round(100 * a[i]);
				switch (e) {
					case "m":
						return (o += a[0]), (l += a[1]), "t" + a.join(",");
					case "M":
						return (o = a[0]), (l = a[1]), "m" + a.join(",");
					case "l":
						return (o += a[0]), (l += a[1]), "r" + a.join(",");
					case "L":
						return (o = a[0]), (l = a[1]), "l" + a.join(",");
					case "h":
						return (o += a[0]), "r" + a[0] + ",0";
					case "H":
						return "l" + (o = a[0]) + "," + l;
					case "v":
						return (l += a[0]), "r0," + a[0];
					case "V":
						return (l = a[0]), "l" + o + "," + l;
					case "c":
						return (r = o + a[a.length - 4]), (h = l + a[a.length - 3]), (o += a[a.length - 2]), (l += a[a.length - 1]), "v" + a.join(",");
					case "C":
						return (r = a[a.length - 4]), (h = a[a.length - 3]), (o = a[a.length - 2]), (l = a[a.length - 1]), "c" + a.join(",");
					case "s":
						return a.unshift(l - h), a.unshift(o - r), (r = o + a[a.length - 4]), (h = l + a[a.length - 3]), (o += a[a.length - 2]), (l += a[a.length - 1]), "v" + a.join(",");
					case "S":
						return a.unshift(l + l - h), a.unshift(o + o - r), (r = a[a.length - 4]), (h = a[a.length - 3]), (o = a[a.length - 2]), (l = a[a.length - 1]), "c" + a.join(",");
				}
				return "";
			})
			.replace(/z/g, "e");
	}),
	(jvm.VMLCircleElement = function (t, e) {
		jvm.VMLCircleElement.parentClass.call(this, "oval", t, e);
	}),
	jvm.inherits(jvm.VMLCircleElement, jvm.VMLShapeElement),
	(jvm.VMLCircleElement.prototype.applyAttr = function (t, e) {
		switch (t) {
			case "r":
				(this.node.style.width = 2 * e + "px"), (this.node.style.height = 2 * e + "px"), this.applyAttr("cx", this.get("cx") || 0), this.applyAttr("cy", this.get("cy") || 0);
				break;
			case "cx":
				if (!e) return;
				this.node.style.left = e - (this.get("r") || 0) + "px";
				break;
			case "cy":
				if (!e) return;
				this.node.style.top = e - (this.get("r") || 0) + "px";
				break;
			default:
				jvm.VMLCircleElement.parentClass.prototype.applyAttr.call(this, t, e);
		}
	}),
	(jvm.VectorCanvas = function (t, e, a) {
		return (this.mode = window.SVGAngle ? "svg" : "vml"), "svg" == this.mode ? (this.impl = new jvm.SVGCanvasElement(t, e, a)) : (this.impl = new jvm.VMLCanvasElement(t, e, a)), (this.impl.mode = this.mode), this.impl;
	}),
	(jvm.SimpleScale = function (t) {
		this.scale = t;
	}),
	(jvm.SimpleScale.prototype.getValue = function (t) {
		return t;
	}),
	(jvm.OrdinalScale = function (t) {
		this.scale = t;
	}),
	(jvm.OrdinalScale.prototype.getValue = function (t) {
		return this.scale[t];
	}),
	(jvm.OrdinalScale.prototype.getTicks = function () {
		var t,
			e = [];
		for (t in this.scale) e.push({ label: t, value: this.scale[t] });
		return e;
	}),
	(jvm.NumericScale = function (t, e, a, s) {
		(this.scale = []), (e = e || "linear"), t && this.setScale(t), e && this.setNormalizeFunction(e), void 0 !== a && this.setMin(a), void 0 !== s && this.setMax(s);
	}),
	(jvm.NumericScale.prototype = {
		setMin: function (t) {
			(this.clearMinValue = t), "function" == typeof this.normalize ? (this.minValue = this.normalize(t)) : (this.minValue = t);
		},
		setMax: function (t) {
			(this.clearMaxValue = t), "function" == typeof this.normalize ? (this.maxValue = this.normalize(t)) : (this.maxValue = t);
		},
		setScale: function (t) {
			var e;
			for (this.scale = [], e = 0; e < t.length; e++) this.scale[e] = [t[e]];
		},
		setNormalizeFunction: function (t) {
			"polynomial" === t
				? (this.normalize = function (t) {
						return Math.pow(t, 0.2);
				  })
				: "linear" === t
				? delete this.normalize
				: (this.normalize = t),
				this.setMin(this.clearMinValue),
				this.setMax(this.clearMaxValue);
		},
		getValue: function (t) {
			var e,
				a,
				s = [],
				i = 0,
				n = 0;
			for ("function" == typeof this.normalize && (t = this.normalize(t)), n = 0; n < this.scale.length - 1; n++) (e = this.vectorLength(this.vectorSubtract(this.scale[n + 1], this.scale[n]))), s.push(e), (i += e);
			for (a = (this.maxValue - this.minValue) / i, n = 0; n < s.length; n++) s[n] *= a;
			for (n = 0, t -= this.minValue; 0 <= t - s[n]; ) (t -= s[n]), n++;
			return n == this.scale.length - 1 ? this.vectorToNum(this.scale[n]) : this.vectorToNum(this.vectorAdd(this.scale[n], this.vectorMult(this.vectorSubtract(this.scale[n + 1], this.scale[n]), t / s[n])));
		},
		vectorToNum: function (t) {
			for (var e = 0, a = 0; a < t.length; a++) e += Math.round(t[a]) * Math.pow(256, t.length - a - 1);
			return e;
		},
		vectorSubtract: function (t, e) {
			for (var a = [], s = 0; s < t.length; s++) a[s] = t[s] - e[s];
			return a;
		},
		vectorAdd: function (t, e) {
			for (var a = [], s = 0; s < t.length; s++) a[s] = t[s] + e[s];
			return a;
		},
		vectorMult: function (t, e) {
			for (var a = [], s = 0; s < t.length; s++) a[s] = t[s] * e;
			return a;
		},
		vectorLength: function (t) {
			for (var e = 0, a = 0; a < t.length; a++) e += t[a] * t[a];
			return Math.sqrt(e);
		},
		getTicks: function () {
			var t,
				e,
				a = [this.clearMinValue, this.clearMaxValue],
				s = a[1] - a[0],
				i = Math.pow(10, Math.floor(Math.log(s / 5) / Math.LN10)),
				n = [];
			for ((s = (5 / s) * i) <= 0.15 ? (i *= 10) : s <= 0.35 ? (i *= 5) : s <= 0.75 && (i *= 2), a[0] = Math.floor(a[0] / i) * i, a[1] = Math.ceil(a[1] / i) * i, t = a[0]; t <= a[1]; ) (e = t == a[0] ? this.clearMinValue : t == a[1] ? this.clearMaxValue : t), n.push({ label: t, value: this.getValue(e) }), (t += i);
			return n;
		},
	}),
	(jvm.ColorScale = function (t, e, a, s) {
		jvm.ColorScale.parentClass.apply(this, arguments);
	}),
	jvm.inherits(jvm.ColorScale, jvm.NumericScale),
	(jvm.ColorScale.prototype.setScale = function (t) {
		for (var e = 0; e < t.length; e++) this.scale[e] = jvm.ColorScale.rgbToArray(t[e]);
	}),
	(jvm.ColorScale.prototype.getValue = function (t) {
		return jvm.ColorScale.numToRgb(jvm.ColorScale.parentClass.prototype.getValue.call(this, t));
	}),
	(jvm.ColorScale.arrayToRgb = function (t) {
		for (var e, a = "#", s = 0; s < t.length; s++) a += 1 == (e = t[s].toString(16)).length ? "0" + e : e;
		return a;
	}),
	(jvm.ColorScale.numToRgb = function (t) {
		for (t = t.toString(16); t.length < 6; ) t = "0" + t;
		return "#" + t;
	}),
	(jvm.ColorScale.rgbToArray = function (t) {
		return (t = t.substr(1)), [parseInt(t.substr(0, 2), 16), parseInt(t.substr(2, 2), 16), parseInt(t.substr(4, 2), 16)];
	}),
	(jvm.Legend = function (t) {
		(this.params = t || {}), (this.map = this.params.map), (this.series = this.params.series), (this.body = jvm.$("<div/>")), this.body.addClass("jvectormap-legend"), this.params.cssClass && this.body.addClass(this.params.cssClass), (t.vertical ? this.map.legendCntVertical : this.map.legendCntHorizontal).append(this.body), this.render();
	}),
	(jvm.Legend.prototype.render = function () {
		var t,
			e,
			a,
			s,
			i = this.series.scale.getTicks(),
			n = jvm.$("<div/>").addClass("jvectormap-legend-inner");
		for (this.body.html(""), this.params.title && this.body.append(jvm.$("<div/>").addClass("jvectormap-legend-title").html(this.params.title)), this.body.append(n), t = 0; t < i.length; t++) {
			switch (((e = jvm.$("<div/>").addClass("jvectormap-legend-tick")), (a = jvm.$("<div/>").addClass("jvectormap-legend-tick-sample")), this.series.params.attribute)) {
				case "fill":
					jvm.isImageUrl(i[t].value) ? a.css("background", "url(" + i[t].value + ")") : a.css("background", i[t].value);
					break;
				case "stroke":
					a.css("background", i[t].value);
					break;
				case "image":
					a.css("background", "url(" + i[t].value + ") no-repeat center center");
					break;
				case "r":
					jvm.$("<div/>")
						.css({ "border-radius": i[t].value, border: this.map.params.markerStyle.initial["stroke-width"] + "px " + this.map.params.markerStyle.initial.stroke + " solid", width: 2 * i[t].value + "px", height: 2 * i[t].value + "px", background: this.map.params.markerStyle.initial.fill })
						.appendTo(a);
			}
			e.append(a), (s = i[t].label), this.params.labelRender && (s = this.params.labelRender(s)), e.append(jvm.$("<div>" + s + " </div>").addClass("jvectormap-legend-tick-text")), n.append(e);
		}
		n.append(jvm.$("<div/>").css("clear", "both"));
	}),
	(jvm.DataSeries = function (t, e, a) {
		((t = t || {}).attribute = t.attribute || "fill"), (this.elements = e), (this.params = t), (this.map = a), t.attributes && this.setAttributes(t.attributes), jvm.$.isArray(t.scale) ? ((a = "fill" === t.attribute || "stroke" === t.attribute ? jvm.ColorScale : jvm.NumericScale), (this.scale = new a(t.scale, t.normalizeFunction, t.min, t.max))) : t.scale ? (this.scale = new jvm.OrdinalScale(t.scale)) : (this.scale = new jvm.SimpleScale(t.scale)), (this.values = t.values || {}), this.setValues(this.values), this.params.legend && (this.legend = new jvm.Legend($.extend({ map: this.map, series: this }, this.params.legend)));
	}),
	(jvm.DataSeries.prototype = {
		setAttributes: function (t, e) {
			var a,
				s = t;
			if ("string" == typeof t) this.elements[t] && this.elements[t].setStyle(this.params.attribute, e);
			else for (a in s) this.elements[a] && this.elements[a].element.setStyle(this.params.attribute, s[a]);
		},
		setValues: function (t) {
			var e,
				a,
				s = -Number.MAX_VALUE,
				i = Number.MAX_VALUE,
				n = {};
			if (this.scale instanceof jvm.OrdinalScale || this.scale instanceof jvm.SimpleScale) for (a in t) t[a] ? (n[a] = this.scale.getValue(t[a])) : (n[a] = this.elements[a].element.style.initial[this.params.attribute]);
			else {
				if (void 0 === this.params.min || void 0 === this.params.max) for (a in t) s < (e = parseFloat(t[a])) && (s = e), e < i && (i = e);
				for (a in (void 0 === this.params.min ? (this.scale.setMin(i), (this.params.min = i)) : this.scale.setMin(this.params.min), void 0 === this.params.max ? (this.scale.setMax(s), (this.params.max = s)) : this.scale.setMax(this.params.max), t)) "indexOf" != a && ((e = parseFloat(t[a])), isNaN(e) ? (n[a] = this.elements[a].element.style.initial[this.params.attribute]) : (n[a] = this.scale.getValue(e)));
			}
			this.setAttributes(n), jvm.$.extend(this.values, t);
		},
		clear: function () {
			var t,
				e = {};
			for (t in this.values) this.elements[t] && (e[t] = this.elements[t].element.shape.style.initial[this.params.attribute]);
			this.setAttributes(e), (this.values = {});
		},
		setScale: function (t) {
			this.scale.setScale(t), this.values && this.setValues(this.values);
		},
		setNormalizeFunction: function (t) {
			this.scale.setNormalizeFunction(t), this.values && this.setValues(this.values);
		},
	}),
	(jvm.Proj = {
		degRad: 180 / Math.PI,
		radDeg: Math.PI / 180,
		radius: 6381372,
		sgn: function (t) {
			return 0 < t ? 1 : t < 0 ? -1 : t;
		},
		mill: function (t, e, a) {
			return { x: this.radius * (e - a) * this.radDeg, y: (-this.radius * Math.log(Math.tan((45 + 0.4 * t) * this.radDeg))) / 0.8 };
		},
		mill_inv: function (t, e, a) {
			return { lat: (2.5 * Math.atan(Math.exp((0.8 * e) / this.radius)) - (5 * Math.PI) / 8) * this.degRad, lng: (a * this.radDeg + t / this.radius) * this.degRad };
		},
		merc: function (t, e, a) {
			return { x: this.radius * (e - a) * this.radDeg, y: -this.radius * Math.log(Math.tan(Math.PI / 4 + (t * Math.PI) / 360)) };
		},
		merc_inv: function (t, e, a) {
			return { lat: (2 * Math.atan(Math.exp(e / this.radius)) - Math.PI / 2) * this.degRad, lng: (a * this.radDeg + t / this.radius) * this.degRad };
		},
		aea: function (t, e, a) {
			var s = a * this.radDeg,
				i = 29.5 * this.radDeg,
				a = 45.5 * this.radDeg,
				t = t * this.radDeg,
				e = e * this.radDeg,
				a = (Math.sin(i) + Math.sin(a)) / 2,
				i = Math.cos(i) * Math.cos(i) + 2 * a * Math.sin(i),
				s = a * (e - s),
				t = Math.sqrt(i - 2 * a * Math.sin(t)) / a,
				a = Math.sqrt(i - 2 * a * Math.sin(0)) / a;
			return { x: t * Math.sin(s) * this.radius, y: -(a - t * Math.cos(s)) * this.radius };
		},
		aea_inv: function (t, e, a) {
			var s = t / this.radius,
				i = e / this.radius,
				n = a * this.radDeg,
				r = 29.5 * this.radDeg,
				t = 45.5 * this.radDeg,
				e = (Math.sin(r) + Math.sin(t)) / 2,
				a = Math.cos(r) * Math.cos(r) + 2 * e * Math.sin(r),
				t = Math.sqrt(a - 2 * e * Math.sin(0)) / e,
				r = Math.sqrt(s * s + (t - i) * (t - i)),
				i = Math.atan(s / (t - i));
			return { lat: Math.asin((a - r * r * e * e) / (2 * e)) * this.degRad, lng: (n + i / e) * this.degRad };
		},
		lcc: function (t, e, a) {
			var s = a * this.radDeg,
				i = e * this.radDeg,
				a = 33 * this.radDeg,
				e = 45 * this.radDeg,
				t = t * this.radDeg,
				e = Math.log(Math.cos(a) * (1 / Math.cos(e))) / Math.log(Math.tan(Math.PI / 4 + e / 2) * (1 / Math.tan(Math.PI / 4 + a / 2))),
				t = (a = (Math.cos(a) * Math.pow(Math.tan(Math.PI / 4 + a / 2), e)) / e) * Math.pow(1 / Math.tan(Math.PI / 4 + t / 2), e),
				a = a * Math.pow(1 / Math.tan(Math.PI / 4 + 0), e);
			return { x: t * Math.sin(e * (i - s)) * this.radius, y: -(a - t * Math.cos(e * (i - s))) * this.radius };
		},
		lcc_inv: function (t, e, a) {
			var s = t / this.radius,
				i = e / this.radius,
				n = a * this.radDeg,
				r = 33 * this.radDeg,
				t = 45 * this.radDeg,
				e = Math.log(Math.cos(r) * (1 / Math.cos(t))) / Math.log(Math.tan(Math.PI / 4 + t / 2) * (1 / Math.tan(Math.PI / 4 + r / 2))),
				t = (a = (Math.cos(r) * Math.pow(Math.tan(Math.PI / 4 + r / 2), e)) / e) * Math.pow(1 / Math.tan(Math.PI / 4 + 0), e),
				r = this.sgn(e) * Math.sqrt(s * s + (t - i) * (t - i)),
				i = Math.atan(s / (t - i));
			return { lat: (2 * Math.atan(Math.pow(a / r, 1 / e)) - Math.PI / 2) * this.degRad, lng: (n + i / e) * this.degRad };
		},
	}),
	(jvm.MapObject = function (t) {}),
	(jvm.MapObject.prototype.getLabelText = function (t) {
		return this.config.label ? ("function" == typeof this.config.label.render ? this.config.label.render(t) : t) : null;
	}),
	(jvm.MapObject.prototype.getLabelOffsets = function (t) {
		var e;
		return this.config.label && ("function" == typeof this.config.label.offsets ? (e = this.config.label.offsets(t)) : "object" == typeof this.config.label.offsets && (e = this.config.label.offsets[t])), e || [0, 0];
	}),
	(jvm.MapObject.prototype.setHovered = function (t) {
		this.isHovered !== t && ((this.isHovered = t), (this.shape.isHovered = t), this.shape.updateStyle(), this.label && ((this.label.isHovered = t), this.label.updateStyle()));
	}),
	(jvm.MapObject.prototype.setSelected = function (t) {
		this.isSelected !== t && ((this.isSelected = t), (this.shape.isSelected = t), this.shape.updateStyle(), this.label && ((this.label.isSelected = t), this.label.updateStyle()), jvm.$(this.shape).trigger("selected", [t]));
	}),
	(jvm.MapObject.prototype.setStyle = function () {
		this.shape.setStyle.apply(this.shape, arguments);
	}),
	(jvm.MapObject.prototype.remove = function () {
		this.shape.remove(), this.label && this.label.remove();
	}),
	(jvm.Region = function (t) {
		var e, a, s;
		(this.config = t), (this.map = this.config.map), (this.shape = t.canvas.addPath({ d: t.path, "data-code": t.code }, t.style, t.canvas.rootElement)), this.shape.addClass("jvectormap-region jvectormap-element"), (e = this.shape.getBBox()), (a = this.getLabelText(t.code)), this.config.label && a && ((s = this.getLabelOffsets(t.code)), (this.labelX = e.x + e.width / 2 + s[0]), (this.labelY = e.y + e.height / 2 + s[1]), (this.label = t.canvas.addText({ text: a, "text-anchor": "middle", "alignment-baseline": "central", x: this.labelX, y: this.labelY, "data-code": t.code }, t.labelStyle, t.labelsGroup)), this.label.addClass("jvectormap-region jvectormap-element"));
	}),
	jvm.inherits(jvm.Region, jvm.MapObject),
	(jvm.Region.prototype.updateLabelPosition = function () {
		this.label && this.label.set({ x: this.labelX * this.map.scale + this.map.transX * this.map.scale, y: this.labelY * this.map.scale + this.map.transY * this.map.scale });
	}),
	(jvm.Marker = function (t) {
		var e;
		(this.config = t), (this.map = this.config.map), (this.isImage = !!this.config.style.initial.image), this.createShape(), (e = this.getLabelText(t.index)), this.config.label && e && ((this.offsets = this.getLabelOffsets(t.index)), (this.labelX = t.cx / this.map.scale - this.map.transX), (this.labelY = t.cy / this.map.scale - this.map.transY), (this.label = t.canvas.addText({ text: e, "data-index": t.index, dy: "0.6ex", x: this.labelX, y: this.labelY }, t.labelStyle, t.labelsGroup)), this.label.addClass("jvectormap-marker jvectormap-element"));
	}),
	jvm.inherits(jvm.Marker, jvm.MapObject),
	(jvm.Marker.prototype.createShape = function () {
		var t = this;
		this.shape && this.shape.remove(),
			(this.shape = this.config.canvas[this.isImage ? "addImage" : "addCircle"]({ "data-index": this.config.index, cx: this.config.cx, cy: this.config.cy }, this.config.style, this.config.group)),
			this.shape.addClass("jvectormap-marker jvectormap-element"),
			this.isImage &&
				jvm.$(this.shape.node).on("imageloaded", function () {
					t.updateLabelPosition();
				});
	}),
	(jvm.Marker.prototype.updateLabelPosition = function () {
		this.label && this.label.set({ x: this.labelX * this.map.scale + this.offsets[0] + this.map.transX * this.map.scale + 5 + (this.isImage ? (this.shape.width || 0) / 2 : this.shape.properties.r), y: this.labelY * this.map.scale + this.map.transY * this.map.scale + this.offsets[1] });
	}),
	(jvm.Marker.prototype.setStyle = function (t, e) {
		var a;
		jvm.Marker.parentClass.prototype.setStyle.apply(this, arguments), "r" === t && this.updateLabelPosition(), (a = !!this.shape.get("image")) != this.isImage && ((this.isImage = a), (this.config.style = jvm.$.extend(!0, {}, this.shape.style)), this.createShape());
	}),
	(jvm.Map = function (t) {
		var e,
			a = this;
		if (((this.params = jvm.$.extend(!0, {}, jvm.Map.defaultParams, t)), !jvm.Map.maps[this.params.map])) throw new Error("Attempt to use map which was not loaded: " + this.params.map);
		for (e in ((this.mapData = jvm.Map.maps[this.params.map]),
		(this.markers = {}),
		(this.regions = {}),
		(this.regionsColors = {}),
		(this.regionsData = {}),
		(this.container = jvm.$("<div>").addClass("jvectormap-container")),
		this.params.container && this.params.container.append(this.container),
		this.container.data("mapObject", this),
		(this.defaultWidth = this.mapData.width),
		(this.defaultHeight = this.mapData.height),
		this.setBackgroundColor(this.params.backgroundColor),
		(this.onResize = function () {
			a.updateSize();
		}),
		jvm.$(window).resize(this.onResize),
		jvm.Map.apiEvents))
			this.params[e] && this.container.bind(jvm.Map.apiEvents[e] + ".jvectormap", this.params[e]);
		(this.canvas = new jvm.VectorCanvas(this.container[0], this.width, this.height)), ("ontouchstart" in window || (window.DocumentTouch && document instanceof DocumentTouch)) && this.params.bindTouchEvents && this.bindContainerTouchEvents(), this.bindContainerEvents(), this.bindElementEvents(), this.createTip(), this.params.zoomButtons && this.bindZoomButtons(), this.createRegions(), this.createMarkers(this.params.markers || {}), this.updateSize(), this.params.focusOn && ("string" == typeof this.params.focusOn ? (this.params.focusOn = { region: this.params.focusOn }) : jvm.$.isArray(this.params.focusOn) && (this.params.focusOn = { regions: this.params.focusOn }), this.setFocus(this.params.focusOn)), this.params.selectedRegions && this.setSelectedRegions(this.params.selectedRegions), this.params.selectedMarkers && this.setSelectedMarkers(this.params.selectedMarkers), (this.legendCntHorizontal = jvm.$("<div/>").addClass("jvectormap-legend-cnt jvectormap-legend-cnt-h")), (this.legendCntVertical = jvm.$("<div/>").addClass("jvectormap-legend-cnt jvectormap-legend-cnt-v")), this.container.append(this.legendCntHorizontal), this.container.append(this.legendCntVertical), this.params.series && this.createSeries();
	}),
	(jvm.Map.prototype = {
		transX: 0,
		transY: 0,
		scale: 1,
		baseTransX: 0,
		baseTransY: 0,
		baseScale: 1,
		width: 0,
		height: 0,
		setBackgroundColor: function (t) {
			this.container.css("background-color", t);
		},
		resize: function () {
			var t = this.baseScale;
			this.width / this.height > this.defaultWidth / this.defaultHeight ? ((this.baseScale = this.height / this.defaultHeight), (this.baseTransX = Math.abs(this.width - this.defaultWidth * this.baseScale) / (2 * this.baseScale))) : ((this.baseScale = this.width / this.defaultWidth), (this.baseTransY = Math.abs(this.height - this.defaultHeight * this.baseScale) / (2 * this.baseScale))), (this.scale *= this.baseScale / t), (this.transX *= this.baseScale / t), (this.transY *= this.baseScale / t);
		},
		updateSize: function () {
			(this.width = this.container.width()), (this.height = this.container.height()), this.resize(), this.canvas.setSize(this.width, this.height), this.applyTransform();
		},
		reset: function () {
			var t, e;
			for (t in this.series) for (e = 0; e < this.series[t].length; e++) this.series[t][e].clear();
			(this.scale = this.baseScale), (this.transX = this.baseTransX), (this.transY = this.baseTransY), this.applyTransform();
		},
		applyTransform: function () {
			var t,
				e,
				a = this.defaultWidth * this.scale <= this.width ? ((t = (this.width - this.defaultWidth * this.scale) / (2 * this.scale)), (this.width - this.defaultWidth * this.scale) / (2 * this.scale)) : ((t = 0), (this.width - this.defaultWidth * this.scale) / this.scale),
				s = this.defaultHeight * this.scale <= this.height ? ((e = (this.height - this.defaultHeight * this.scale) / (2 * this.scale)), (this.height - this.defaultHeight * this.scale) / (2 * this.scale)) : ((e = 0), (this.height - this.defaultHeight * this.scale) / this.scale);
			this.transY > e ? (this.transY = e) : this.transY < s && (this.transY = s), this.transX > t ? (this.transX = t) : this.transX < a && (this.transX = a), this.canvas.applyTransformParams(this.scale, this.transX, this.transY), this.markers && this.repositionMarkers(), this.repositionLabels(), this.container.trigger("viewportChange", [this.scale / this.baseScale, this.transX, this.transY]);
		},
		bindContainerEvents: function () {
			var e,
				a,
				s = !1,
				h = this;
			this.params.panOnDrag &&
				(this.container
					.mousemove(function (t) {
						return s && ((h.transX -= (e - t.pageX) / h.scale), (h.transY -= (a - t.pageY) / h.scale), h.applyTransform(), (e = t.pageX), (a = t.pageY)), !1;
					})
					.mousedown(function (t) {
						return (s = !0), (e = t.pageX), (a = t.pageY), !1;
					}),
				(this.onContainerMouseUp = function () {
					s = !1;
				}),
				jvm.$("body").mouseup(this.onContainerMouseUp)),
				this.params.zoomOnScroll &&
					this.container.mousewheel(function (t, e, a, s) {
						var i = jvm.$(h.container).offset(),
							n = t.pageX - i.left,
							r = t.pageY - i.top,
							i = Math.pow(1 + h.params.zoomOnScrollSpeed / 1e3, t.deltaFactor * t.deltaY);
						h.tip.hide(), h.setScale(h.scale * i, n, r), t.preventDefault();
					});
		},
		bindContainerTouchEvents: function () {
			function t(t) {
				var e,
					a,
					s = t.originalEvent.touches;
				"touchstart" == t.type && (m = 0), 1 == s.length ? (1 == m && ((e = c.transX), (a = c.transY), (c.transX -= (r - s[0].pageX) / c.scale), (c.transY -= (h - s[0].pageY) / c.scale), c.applyTransform(), c.tip.hide(), (e == c.transX && a == c.transY) || t.preventDefault()), (r = s[0].pageX), (h = s[0].pageY)) : 2 == s.length && (2 == m ? ((a = Math.sqrt(Math.pow(s[0].pageX - s[1].pageX, 2) + Math.pow(s[0].pageY - s[1].pageY, 2)) / n), c.setScale(i * a, o, l), c.tip.hide(), t.preventDefault()) : ((t = jvm.$(c.container).offset()), (o = s[0].pageX > s[1].pageX ? s[1].pageX + (s[0].pageX - s[1].pageX) / 2 : s[0].pageX + (s[1].pageX - s[0].pageX) / 2), (l = s[0].pageY > s[1].pageY ? s[1].pageY + (s[0].pageY - s[1].pageY) / 2 : s[0].pageY + (s[1].pageY - s[0].pageY) / 2), (o -= t.left), (l -= t.top), (i = c.scale), (n = Math.sqrt(Math.pow(s[0].pageX - s[1].pageX, 2) + Math.pow(s[0].pageY - s[1].pageY, 2))))), (m = s.length);
			}
			var i,
				n,
				r,
				h,
				o,
				l,
				m,
				c = this;
			jvm.$(this.container).bind("touchstart", t), jvm.$(this.container).bind("touchmove", t);
		},
		bindElementEvents: function () {
			var i,
				h = this;
			this.container.mousemove(function () {
				i = !0;
			}),
				this.container.delegate("[class~='jvectormap-element']", "mouseover mouseout", function (t) {
					var e = -1 === (jvm.$(this).attr("class").baseVal || jvm.$(this).attr("class")).indexOf("jvectormap-region") ? "marker" : "region",
						a = "region" == e ? jvm.$(this).attr("data-code") : jvm.$(this).attr("data-index"),
						s = ("region" == e ? h.regions : h.markers)[a].element,
						i = "region" == e ? h.mapData.paths[a].name : h.markers[a].config.name || "",
						n = jvm.$.Event(e + "TipShow.jvectormap"),
						r = jvm.$.Event(e + "Over.jvectormap");
					"mouseover" == t.type ? (h.container.trigger(r, [a]), r.isDefaultPrevented() || s.setHovered(!0), h.tip.text(i), h.container.trigger(n, [h.tip, a]), n.isDefaultPrevented() || (h.tip.show(), (h.tipWidth = h.tip.width()), (h.tipHeight = h.tip.height()))) : (s.setHovered(!1), h.tip.hide(), h.container.trigger(e + "Out.jvectormap", [a]));
				}),
				this.container.delegate("[class~='jvectormap-element']", "mousedown", function () {
					i = !1;
				}),
				this.container.delegate("[class~='jvectormap-element']", "mouseup", function () {
					var t = -1 === (jvm.$(this).attr("class").baseVal ? jvm.$(this).attr("class").baseVal : jvm.$(this).attr("class")).indexOf("jvectormap-region") ? "marker" : "region",
						e = "region" == t ? jvm.$(this).attr("data-code") : jvm.$(this).attr("data-index"),
						a = jvm.$.Event(t + "Click.jvectormap"),
						s = ("region" == t ? h.regions : h.markers)[e].element;
					i || (h.container.trigger(a, [e]), (("region" == t && h.params.regionsSelectable) || ("marker" == t && h.params.markersSelectable)) && (a.isDefaultPrevented() || (h.params[t + "sSelectableOne"] && h.clearSelected(t + "s"), s.setSelected(!s.isSelected))));
				});
		},
		bindZoomButtons: function () {
			var t = this;
			jvm.$("<div/>").addClass("jvectormap-zoomin").text("+").appendTo(this.container),
				jvm.$("<div/>").addClass("jvectormap-zoomout").html("&#x2212;").appendTo(this.container),
				this.container.find(".jvectormap-zoomin").click(function () {
					t.setScale(t.scale * t.params.zoomStep, t.width / 2, t.height / 2, !1, t.params.zoomAnimate);
				}),
				this.container.find(".jvectormap-zoomout").click(function () {
					t.setScale(t.scale / t.params.zoomStep, t.width / 2, t.height / 2, !1, t.params.zoomAnimate);
				});
		},
		createTip: function () {
			var s = this;
			(this.tip = jvm.$("<div/>").addClass("jvectormap-tip").appendTo(jvm.$("body"))),
				this.container.mousemove(function (t) {
					var e = t.pageX - 15 - s.tipWidth,
						a = t.pageY - 15 - s.tipHeight;
					e < 5 && (e = t.pageX + 15), a < 5 && (a = t.pageY + 15), s.tip.css({ left: e, top: a });
				});
		},
		setScale: function (t, e, a, s, i) {
			var n,
				r,
				h,
				o,
				l,
				m,
				c,
				p,
				d,
				v = jvm.$.Event("zoom.jvectormap"),
				u = this,
				g = 0,
				f = Math.abs(Math.round((60 * (t - this.scale)) / Math.max(t, this.scale))),
				j = new jvm.$.Deferred();
			return (
				t > this.params.zoomMax * this.baseScale ? (t = this.params.zoomMax * this.baseScale) : t < this.params.zoomMin * this.baseScale && (t = this.params.zoomMin * this.baseScale),
				void 0 !== e && void 0 !== a && ((zoomStep = t / this.scale), (d = s ? ((p = e + (this.defaultWidth * (this.width / (this.defaultWidth * t))) / 2), a + (this.defaultHeight * (this.height / (this.defaultHeight * t))) / 2) : ((p = this.transX - ((zoomStep - 1) / t) * e), this.transY - ((zoomStep - 1) / t) * a))),
				i && 0 < f
					? ((r = this.scale),
					  (h = (t - r) / f),
					  (o = this.transX * this.scale),
					  (m = this.transY * this.scale),
					  (l = (p * t - o) / f),
					  (c = (d * t - m) / f),
					  (n = setInterval(function () {
							(g += 1), (u.scale = r + h * g), (u.transX = (o + l * g) / u.scale), (u.transY = (m + c * g) / u.scale), u.applyTransform(), g == f && (clearInterval(n), u.container.trigger(v, [t / u.baseScale]), j.resolve());
					  }, 10)))
					: ((this.transX = p), (this.transY = d), (this.scale = t), this.applyTransform(), this.container.trigger(v, [t / this.baseScale]), j.resolve()),
				j
			);
		},
		setFocus: function (t) {
			var e, a, s, i, n;
			if (((t = t || {}).region ? (s = [t.region]) : t.regions && (s = t.regions), s)) {
				for (i = 0; i < s.length; i++) this.regions[s[i]] && (a = this.regions[s[i]].element.shape.getBBox()) && (e = void 0 === e ? a : { x: Math.min(e.x, a.x), y: Math.min(e.y, a.y), width: Math.max(e.x + e.width, a.x + a.width) - Math.min(e.x, a.x), height: Math.max(e.y + e.height, a.y + a.height) - Math.min(e.y, a.y) });
				return this.setScale(Math.min(this.width / e.width, this.height / e.height), -(e.x + e.width / 2), -(e.y + e.height / 2), !0, t.animate);
			}
			return t.lat && t.lng ? ((n = this.latLngToPoint(t.lat, t.lng)), (t.x = this.transX - n.x / this.scale), (t.y = this.transY - n.y / this.scale)) : t.x && t.y && ((t.x *= -this.defaultWidth), (t.y *= -this.defaultHeight)), this.setScale(t.scale * this.baseScale, t.x, t.y, !0, t.animate);
		},
		getSelected: function (t) {
			var e,
				a = [];
			for (e in this[t]) this[t][e].element.isSelected && a.push(e);
			return a;
		},
		getSelectedRegions: function () {
			return this.getSelected("regions");
		},
		getSelectedMarkers: function () {
			return this.getSelected("markers");
		},
		setSelected: function (t, e) {
			if (("object" != typeof e && (e = [e]), jvm.$.isArray(e))) for (a = 0; a < e.length; a++) this[t][e[a]].element.setSelected(!0);
			else for (var a in e) this[t][a].element.setSelected(!!e[a]);
		},
		setSelectedRegions: function (t) {
			this.setSelected("regions", t);
		},
		setSelectedMarkers: function (t) {
			this.setSelected("markers", t);
		},
		clearSelected: function (t) {
			for (var e = {}, a = this.getSelected(t), s = 0; s < a.length; s++) e[a[s]] = !1;
			this.setSelected(t, e);
		},
		clearSelectedRegions: function () {
			this.clearSelected("regions");
		},
		clearSelectedMarkers: function () {
			this.clearSelected("markers");
		},
		getMapObject: function () {
			return this;
		},
		getRegionName: function (t) {
			return this.mapData.paths[t].name;
		},
		createRegions: function () {
			var t,
				e,
				a = this;
			for (t in ((this.regionLabelsGroup = this.regionLabelsGroup || this.canvas.addGroup()), this.mapData.paths))
				(e = new jvm.Region({ map: this, path: this.mapData.paths[t].path, code: t, style: jvm.$.extend(!0, {}, this.params.regionStyle), labelStyle: jvm.$.extend(!0, {}, this.params.regionLabelStyle), canvas: this.canvas, labelsGroup: this.regionLabelsGroup, label: "vml" != this.canvas.mode ? this.params.labels && this.params.labels.regions : null })),
					jvm.$(e.shape).bind("selected", function (t, e) {
						a.container.trigger("regionSelected.jvectormap", [jvm.$(this.node).attr("data-code"), e, a.getSelectedRegions()]);
					}),
					(this.regions[t] = { element: e, config: this.mapData.paths[t] });
		},
		createMarkers: function (t) {
			var e,
				a,
				s,
				i,
				n = this;
			if (((this.markersGroup = this.markersGroup || this.canvas.addGroup()), (this.markerLabelsGroup = this.markerLabelsGroup || this.canvas.addGroup()), jvm.$.isArray(t))) for (i = t.slice(), t = {}, e = 0; e < i.length; e++) t[e] = i[e];
			for (e in t)
				(s = t[e] instanceof Array ? { latLng: t[e] } : t[e]),
					!1 !== (a = this.getMarkerPosition(s)) &&
						((a = new jvm.Marker({ map: this, style: jvm.$.extend(!0, {}, this.params.markerStyle, { initial: s.style || {} }), labelStyle: jvm.$.extend(!0, {}, this.params.markerLabelStyle), index: e, cx: a.x, cy: a.y, group: this.markersGroup, canvas: this.canvas, labelsGroup: this.markerLabelsGroup, label: "vml" != this.canvas.mode ? this.params.labels && this.params.labels.markers : null })),
						jvm.$(a.shape).bind("selected", function (t, e) {
							n.container.trigger("markerSelected.jvectormap", [jvm.$(this.node).attr("data-index"), e, n.getSelectedMarkers()]);
						}),
						this.markers[e] && this.removeMarkers([e]),
						(this.markers[e] = { element: a, config: s }));
		},
		repositionMarkers: function () {
			var t, e;
			for (t in this.markers) !1 !== (e = this.getMarkerPosition(this.markers[t].config)) && this.markers[t].element.setStyle({ cx: e.x, cy: e.y });
		},
		repositionLabels: function () {
			for (var t in this.regions) this.regions[t].element.updateLabelPosition();
			for (t in this.markers) this.markers[t].element.updateLabelPosition();
		},
		getMarkerPosition: function (t) {
			return jvm.Map.maps[this.params.map].projection ? this.latLngToPoint.apply(this, t.latLng || [0, 0]) : { x: t.coords[0] * this.scale + this.transX * this.scale, y: t.coords[1] * this.scale + this.transY * this.scale };
		},
		addMarker: function (t, e, a) {
			var s,
				i,
				n = {},
				r = [],
				a = a || [];
			for (n[t] = e, i = 0; i < a.length; i++) (s = {}), void 0 !== a[i] && (s[t] = a[i]), r.push(s);
			this.addMarkers(n, r);
		},
		addMarkers: function (t, e) {
			var a;
			for (e = e || [], this.createMarkers(t), a = 0; a < e.length; a++) this.series.markers[a].setValues(e[a] || {});
		},
		removeMarkers: function (t) {
			for (var e = 0; e < t.length; e++) this.markers[t[e]].element.remove(), delete this.markers[t[e]];
		},
		removeAllMarkers: function () {
			var t,
				e = [];
			for (t in this.markers) e.push(t);
			this.removeMarkers(e);
		},
		latLngToPoint: function (t, e) {
			var a = jvm.Map.maps[this.params.map].projection,
				s = a.centralMeridian;
			return e < -180 + s && (e += 360), (t = jvm.Proj[a.type](t, e, s)), !!(e = this.getInsetForPoint(t.x, t.y)) && ((s = e.bbox), (t.x = ((t.x - s[0].x) / (s[1].x - s[0].x)) * e.width * this.scale), (t.y = ((t.y - s[0].y) / (s[1].y - s[0].y)) * e.height * this.scale), { x: t.x + this.transX * this.scale + e.left * this.scale, y: t.y + this.transY * this.scale + e.top * this.scale });
		},
		pointToLatLng: function (t, e) {
			for (var a, s, i, n, r = jvm.Map.maps[this.params.map].projection, h = r.centralMeridian, o = jvm.Map.maps[this.params.map].insets, l = 0; l < o.length; l++) if (((s = (a = o[l]).bbox), (i = t - (this.transX * this.scale + a.left * this.scale)), (n = e - (this.transY * this.scale + a.top * this.scale)), (i = (i / (a.width * this.scale)) * (s[1].x - s[0].x) + s[0].x), (n = (n / (a.height * this.scale)) * (s[1].y - s[0].y) + s[0].y), i > s[0].x && i < s[1].x && n > s[0].y && n < s[1].y)) return jvm.Proj[r.type + "_inv"](i, -n, h);
			return !1;
		},
		getInsetForPoint: function (t, e) {
			for (var a, s = jvm.Map.maps[this.params.map].insets, i = 0; i < s.length; i++) if (t > (a = s[i].bbox)[0].x && t < a[1].x && e > a[0].y && e < a[1].y) return s[i];
		},
		createSeries: function () {
			var t, e;
			for (e in ((this.series = { markers: [], regions: [] }), this.params.series)) for (t = 0; t < this.params.series[e].length; t++) this.series[e][t] = new jvm.DataSeries(this.params.series[e][t], this[e], this);
		},
		remove: function () {
			this.tip.remove(), this.container.remove(), jvm.$(window).unbind("resize", this.onResize), jvm.$("body").unbind("mouseup", this.onContainerMouseUp);
		},
	}),
	(jvm.Map.maps = {}),
	(jvm.Map.defaultParams = { map: "world_mill_en", backgroundColor: "#505050", zoomButtons: !0, zoomOnScroll: !0, zoomOnScrollSpeed: 3, panOnDrag: !0, zoomMax: 8, zoomMin: 1, zoomStep: 1.6, zoomAnimate: !0, regionsSelectable: !1, markersSelectable: !1, bindTouchEvents: !0, regionStyle: { initial: { fill: "white", "fill-opacity": 1, stroke: "none", "stroke-width": 0, "stroke-opacity": 1 }, hover: { "fill-opacity": 0.8, cursor: "pointer" }, selected: { fill: "yellow" }, selectedHover: {} }, regionLabelStyle: { initial: { "font-family": "Verdana", "font-size": "12", "font-weight": "bold", cursor: "default", fill: "black" }, hover: { cursor: "pointer" } }, markerStyle: { initial: { fill: "grey", stroke: "#505050", "fill-opacity": 1, "stroke-width": 1, "stroke-opacity": 1, r: 5 }, hover: { stroke: "black", "stroke-width": 2, cursor: "pointer" }, selected: { fill: "blue" }, selectedHover: {} }, markerLabelStyle: { initial: { "font-family": "Verdana", "font-size": "12", "font-weight": "bold", cursor: "default", fill: "black" }, hover: { cursor: "pointer" } } }),
	(jvm.Map.apiEvents = { onRegionTipShow: "regionTipShow", onRegionOver: "regionOver", onRegionOut: "regionOut", onRegionClick: "regionClick", onRegionSelected: "regionSelected", onMarkerTipShow: "markerTipShow", onMarkerOver: "markerOver", onMarkerOut: "markerOut", onMarkerClick: "markerClick", onMarkerSelected: "markerSelected", onViewportChange: "viewportChange" }),
	(jvm.MultiMap = function (t) {
		var e = this;
		(this.maps = {}),
			(this.params = jvm.$.extend(!0, {}, jvm.MultiMap.defaultParams, t)),
			(this.params.maxLevel = this.params.maxLevel || Number.MAX_VALUE),
			(this.params.main = this.params.main || {}),
			(this.params.main.multiMapLevel = 0),
			(this.history = [this.addMap(this.params.main.map, this.params.main)]),
			(this.defaultProjection = this.history[0].mapData.projection.type),
			(this.mapsLoaded = {}),
			this.params.container.css({ position: "relative" }),
			(this.backButton = jvm.$("<div/>").addClass("jvectormap-goback").text("Back").appendTo(this.params.container)),
			this.backButton.hide(),
			this.backButton.click(function () {
				e.goBack();
			}),
			(this.spinner = jvm.$("<div/>").addClass("jvectormap-spinner").appendTo(this.params.container)),
			this.spinner.hide();
	}),
	(jvm.MultiMap.prototype = {
		addMap: function (t, e) {
			var a = jvm.$("<div/>").css({ width: "100%", height: "100%" });
			return (
				this.params.container.append(a),
				(this.maps[t] = new jvm.Map(jvm.$.extend(e, { container: a }))),
				this.params.maxLevel > e.multiMapLevel &&
					this.maps[t].container.on("regionClick.jvectormap", { scope: this }, function (t, e) {
						var a = t.data.scope,
							t = a.params.mapNameByCode(e, a);
						(a.drillDownPromise && "pending" === a.drillDownPromise.state()) || a.drillDown(t, e);
					}),
				this.maps[t]
			);
		},
		downloadMap: function (t) {
			var e = this,
				a = jvm.$.Deferred();
			return (
				this.mapsLoaded[t]
					? a.resolve()
					: jvm.$.get(this.params.mapUrlByCode(t, this)).then(
							function () {
								(e.mapsLoaded[t] = !0), a.resolve();
							},
							function () {
								a.reject();
							}
					  ),
				a
			);
		},
		drillDown: function (t, e) {
			var a = this.history[this.history.length - 1],
				s = this,
				i = a.setFocus({ region: e, animate: !0 }),
				n = this.downloadMap(e);
			i.then(function () {
				"pending" === n.state() && s.spinner.show();
			}),
				n.always(function () {
					s.spinner.hide();
				}),
				(this.drillDownPromise = jvm.$.when(n, i)),
				this.drillDownPromise.then(function () {
					a.params.container.hide(), s.maps[t] ? s.maps[t].params.container.show() : s.addMap(t, { map: t, multiMapLevel: a.params.multiMapLevel + 1 }), s.history.push(s.maps[t]), s.backButton.show();
				});
		},
		goBack: function () {
			var t = this.history.pop(),
				e = this.history[this.history.length - 1],
				a = this;
			t.setFocus({ scale: 1, x: 0.5, y: 0.5, animate: !0 }).then(function () {
				t.params.container.hide(), e.params.container.show(), e.updateSize(), 1 === a.history.length && a.backButton.hide(), e.setFocus({ scale: 1, x: 0.5, y: 0.5, animate: !0 });
			});
		},
	}),
	(jvm.MultiMap.defaultParams = {
		mapNameByCode: function (t, e) {
			return t.toLowerCase() + "_" + e.defaultProjection + "_en";
		},
		mapUrlByCode: function (t, e) {
			return "jquery-jvectormap-data-" + t.toLowerCase() + "-" + e.defaultProjection + "-en.js";
		},
	});
