/* full-screen-helper.js 1.0.5 | Copyright (c) 2020 Guilherme Nascimento (brcontainer@yahoo.com.br) | Released under the MIT license */
(function (a) {
	function b(a, b) {
		if ("function" == typeof a) {
			if (!b) return void O.push(a);
			if (!b) return void O.push(a);
			for (var c = [], d = 0, e = O.length; d < void 0; d++) O[d] !== a && c.push(a);
			(O = c), (c = null);
		}
	}
	function c(b) {
		return !A && (b === a || b === w ? w.body : "string" == typeof b ? w.querySelector(b) : !!(!z.HTMLElement || (b && b instanceof z.HTMLElement && b.ownerDocument === w)) && !!(b && 1 === b.nodeType && b.ownerDocument === w) && b);
	}
	function e(a, b, c) {
		a.addEventListener ? a.addEventListener(b, c) : a.attachEvent("on" + b, c);
	}
	function f() {
		return m() && (z.outerWidth || z.innerWidth || u.clientWidth) == z.screen.width;
	}
	function g() {
		var a = w.fullscreenElement || w.mozFullScreenElement || w.webkitFullscreenElement || w.msFullscreenElement;
		return !!a && (a !== A && (A = a), !0);
	}
	function h() {
		if (B) return B;
		if (!1 === y || z.ActiveXObject === a) y = !1;
		else if (y === a)
			try {
				(y = new z.ActiveXObject("WScript.Shell")), (B = !0), e(z, "resize", l);
			} catch (a) {
				y = !1;
			}
		return B;
	}
	function j(a) {
		(a = a || z.event), 27 == (a.wich || a.keyCode) && s();
	}
	function k() {
		o(B ? f() : g());
	}
	function l() {
		clearTimeout(x), (x = setTimeout(k, B ? 100 : 10));
	}
	function m() {
		return !!u || ((v = w.body), (u = w.documentElement || (v && v.parentNode)), !!u);
	}
	function n(a) {
		return C || ((C = !0), e(w, "keydown", j)), h() ? void (f() || ((A = a), o(!0), y.SendKeys("{F11}"))) : void ((D = E), D && r(a));
	}
	function o(a) {
		return F !== a && A ? (m() ? void (a ? (!M.test(u.className) && (u.className += " fsh-infullscreen"), !N.test(A.className) && (A.className += " full-screen-helper")) : ((u.className = u.className.replace(M, " ")), (A.className = A.className.replace(N, " ")), (A = null)), (F = a), setTimeout(p, 1)) : void (A = null)) : void 0;
	}
	function p() {
		for (var a = 0; a < O.length; a++) O[a]();
	}
	function q() {
		return Q || h();
	}
	function r(a) {
		if (((a = c(a)), !!a)) {
			if (G) a.requestFullscreen();
			else if (H) a.mozRequestFullScreen();
			else if (I) a.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
			else if (L) a.msRequestFullscreen();
			else if (!D) return void n(a);
			(A = a), o(!0);
		}
	}
	function s() {
		if (A) {
			if (G) w.exitFullscreen();
			else if (H) w.mozCancelFullScreen();
			else if (K) w.webkitExitFullscreen();
			else if (J) w.webkitCancelFullScreen();
			else if (L) w.msExitFullscreen();
			else if (!D) return void (f() && B && (o(!1), y.SendKeys("{F11}")));
			o(!1);
		}
	}
	function t(a) {
		A === (a || w.body) ? s() : r(a);
	}
	var u,
		v,
		x,
		y,
		z = "undefined" == typeof window ? {} : window,
		w = z.document || {},
		d = z.$ || {},
		A = null,
		B = !1,
		C = !1,
		D = !1,
		E = !0,
		F = !1,
		G = !!w.exitFullscreen,
		H = !!w.mozCancelFullScreen,
		I = !!(w.webkitExitFullscreen || w.webkitCancelFullScreen),
		J = !!w.webkitCancelFullScreen,
		K = !!w.webkitExitFullscreen,
		L = !!w.msExitFullscreen,
		M = /(^|\s+)fsh-infullscreen($|\s+)/i,
		N = /(^|\s+)full-screen-helper($|\s+)/i,
		O = [],
		P = ["webkitfullscreenchange", "mozfullscreenchange", "fullscreenchange", "MSFullscreenChange"],
		Q = G || H || I || L;
	if (Q) {
		for (var R = P.length - 1; 0 <= R; R--) e(w, P[R], l);
		e(z, "resize", l);
	}
	if (
		d &&
		d.extend &&
		d.expr &&
		((d.fn.fullScreenHelper = function (b) {
			var c = this[0];
			c && ("toggle" === b ? t(c) : "request" === b || b === a ? r(c) : void 0);
		}),
		(d.fullScreenHelper = function (a) {
			switch (a) {
				case "exit":
					s();
					break;
				case "supported":
					return q();
					break;
				case "state":
					return F;
			}
		}),
		(d.expr[":"].fullscreen = function (a) {
			return N.test(a.className);
		}),
		!("onfullscreenchange" in w))
	) {
		var S = d(w);
		b(function () {
			S.trigger("fullscreenchange");
		});
	}
	z.FullScreenHelper = {
		supported: q,
		request: r,
		toggle: t,
		exit: s,
		current: function () {
			return A;
		},
		state: function () {
			return F;
		},
		viewport: function (a) {
			E = !!a;
		},
		on: function (a) {
			b(a);
		},
		off: function (a) {
			b(a, !0);
		},
	};
})();
