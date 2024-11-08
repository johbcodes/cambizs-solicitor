/*! DataTables Bootstrap 5 integration
 * 2020 SpryMedia Ltd - datatables.net/license
 */
!(function (t) {
	"function" == typeof define && define.amd
		? define(["jquery", "datatables.net"], function (e) {
				return t(e, window, document);
		  })
		: "object" == typeof exports
		? (module.exports = function (e, a) {
				return (e = e || window), (a = a || ("undefined" != typeof window ? require("jquery") : require("jquery")(e))).fn.dataTable || require("datatables.net")(e, a), t(a, 0, e.document);
		  })
		: t(jQuery, window, document);
})(function (x, e, r, s) {
	"use strict";
	var o = x.fn.dataTable;
	return (
		x.extend(!0, o.defaults, { dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>><'row dt-row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>", renderer: "bootstrap" }),
		x.extend(o.ext.classes, { sWrapper: "dataTables_wrapper dt-bootstrap5", sFilterInput: "form-control form-control-sm", sLengthSelect: "form-select form-select-sm", sProcessing: "dataTables_processing card", sPageButton: "paginate_button page-item" }),
		(o.ext.renderer.pageButton.bootstrap = function (i, e, d, a, l, c) {
			function u(e, a) {
				for (
					var t,
						n,
						r = function (e) {
							e.preventDefault(), x(e.currentTarget).hasClass("disabled") || b.page() == e.data.action || b.page(e.data.action).draw("page");
						},
						s = 0,
						o = a.length;
					s < o;
					s++
				)
					if (((n = a[s]), Array.isArray(n))) u(e, n);
					else {
						switch (((f = p = ""), n)) {
							case "ellipsis":
								(p = "&#x2026;"), (f = "disabled");
								break;
							case "first":
								(p = m.sFirst), (f = n + (0 < l ? "" : " disabled"));
								break;
							case "previous":
								(p = m.sPrevious), (f = n + (0 < l ? "" : " disabled"));
								break;
							case "next":
								(p = m.sNext), (f = n + (l < c - 1 ? "" : " disabled"));
								break;
							case "last":
								(p = m.sLast), (f = n + (l < c - 1 ? "" : " disabled"));
								break;
							default:
								(p = n + 1), (f = l === n ? "active" : "");
						}
						p &&
							((t = x("<li>", { class: g.sPageButton + " " + f, id: 0 === d && "string" == typeof n ? i.sTableId + "_" + n : null })
								.append(x("<a>", { href: "#", "aria-controls": i.sTableId, "aria-label": w[n], "data-dt-idx": n, tabindex: i.iTabIndex, class: "page-link" }).html(p))
								.appendTo(e)),
							i.oApi._fnBindAction(t, { action: n }, r));
					}
			}
			var p,
				f,
				t,
				b = new o.Api(i),
				g = i.oClasses,
				m = i.oLanguage.oPaginate,
				w = i.oLanguage.oAria.paginate || {},
				e = x(e);
			try {
				t = e.find(r.activeElement).data("dt-idx");
			} catch (e) {}
			var n = e.children("ul.pagination");
			n.length ? n.empty() : (n = e.html("<ul/>").children("ul").addClass("pagination")), u(n, a), t !== s && e.find("[data-dt-idx=" + t + "]").trigger("focus");
		}),
		o
	);
});
