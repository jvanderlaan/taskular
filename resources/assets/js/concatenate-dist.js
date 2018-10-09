!function(t) {
    "function" == typeof define && define.amd ? define("datepicker", [ "jquery" ], t) : t("object" == typeof exports ? require("jquery") : jQuery);
}(function(t) {
    "use strict";
    function e(t) {
        return "string" == typeof t;
    }
    function i(t) {
        return "number" == typeof t && !isNaN(t);
    }
    function a(t) {
        return void 0 === t;
    }
    function s(t) {
        return "date" === function(t) {
            return C.call(t).slice(8, -1).toLowerCase();
        }(t);
    }
    function n(t, e) {
        var a = [];
        return Array.from ? Array.from(t).slice(e || 0) : (i(e) && a.push(e), a.slice.apply(t, a));
    }
    function o(t, e) {
        var i = n(arguments, 2);
        return function() {
            return t.apply(e, i.concat(n(arguments)));
        };
    }
    function r(t, e) {
        return [ 31, function(t) {
            return t % 4 == 0 && t % 100 != 0 || t % 400 == 0;
        }(t) ? 29 : 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ][e];
    }
    function l(e, i) {
        (i = t.isPlainObject(i) ? i : {}).language && (i = t.extend({}, l.LANGUAGES[i.language], i)), 
        this.$element = t(e), this.options = t.extend({}, l.DEFAULTS, i), this.isBuilt = !1, 
        this.isShown = !1, this.isInput = !1, this.isInline = !1, this.initialValue = "", 
        this.initialDate = null, this.startDate = null, this.endDate = null, this.init();
    }
    var h = t(window), d = window.document, c = t(d), u = window.Number, g = "click.datepicker", p = /(y|m|d)+/g, f = /\d+/g, m = /^\d{2,4}$/, v = [ "datepicker-top-left", "datepicker-top-right", "datepicker-bottom-left", "datepicker-bottom-right" ].join(" "), w = "datepicker-hide", y = 0, $ = 1, k = 2, D = Math.min, C = Object.prototype.toString;
    l.prototype = {
        constructor: l,
        init: function() {
            var e = this.options, i = this.$element, a = e.startDate, s = e.endDate, n = e.date;
            this.$trigger = t(e.trigger), this.isInput = i.is("input") || i.is("textarea"), 
            this.isInline = e.inline && (e.container || !this.isInput), this.format = function(t) {
                var e, i, a = String(t).toLowerCase(), s = a.match(p);
                if (!s || 0 === s.length) throw new Error("Invalid date format.");
                for (t = {
                    source: a,
                    parts: s
                }, e = s.length, i = 0; i < e; i++) switch (s[i]) {
                  case "dd":
                  case "d":
                    t.hasDay = !0;
                    break;

                  case "mm":
                  case "m":
                    t.hasMonth = !0;
                    break;

                  case "yyyy":
                  case "yy":
                    t.hasYear = !0;
                }
                return t;
            }(e.format), this.oldValue = this.initialValue = this.getValue(), n = this.parseDate(n || this.initialValue), 
            a && (a = this.parseDate(a), n.getTime() < a.getTime() && (n = new Date(a)), this.startDate = a), 
            s && (s = this.parseDate(s), a && s.getTime() < a.getTime() && (s = new Date(a)), 
            n.getTime() > s.getTime() && (n = new Date(s)), this.endDate = s), this.date = n, 
            this.viewDate = new Date(n), this.initialDate = new Date(this.date), this.bind(), 
            (e.autoShow || this.isInline) && this.show(), e.autoPick && this.pick();
        },
        build: function() {
            var e, i = this.options, a = this.$element;
            this.isBuilt || (this.isBuilt = !0, this.$picker = e = t(i.template), this.$week = e.find('[data-view="week"]'), 
            this.$yearsPicker = e.find('[data-view="years picker"]'), this.$yearsPrev = e.find('[data-view="years prev"]'), 
            this.$yearsNext = e.find('[data-view="years next"]'), this.$yearsCurrent = e.find('[data-view="years current"]'), 
            this.$years = e.find('[data-view="years"]'), this.$monthsPicker = e.find('[data-view="months picker"]'), 
            this.$yearPrev = e.find('[data-view="year prev"]'), this.$yearNext = e.find('[data-view="year next"]'), 
            this.$yearCurrent = e.find('[data-view="year current"]'), this.$months = e.find('[data-view="months"]'), 
            this.$daysPicker = e.find('[data-view="days picker"]'), this.$monthPrev = e.find('[data-view="month prev"]'), 
            this.$monthNext = e.find('[data-view="month next"]'), this.$monthCurrent = e.find('[data-view="month current"]'), 
            this.$days = e.find('[data-view="days"]'), this.isInline ? t(i.container || a).append(e.addClass("datepicker-inline")) : (t(d.body).append(e.addClass("datepicker-dropdown")), 
            e.addClass(w)), this.fillWeek());
        },
        unbuild: function() {
            this.isBuilt && (this.isBuilt = !1, this.$picker.remove());
        },
        bind: function() {
            var e = this.options, i = this.$element;
            t.isFunction(e.show) && i.on("show.datepicker", e.show), t.isFunction(e.hide) && i.on("hide.datepicker", e.hide), 
            t.isFunction(e.pick) && i.on("pick.datepicker", e.pick), this.isInput && i.on("keyup.datepicker", t.proxy(this.keyup, this)), 
            this.isInline || (e.trigger ? this.$trigger.on(g, t.proxy(this.toggle, this)) : this.isInput ? i.on("focus.datepicker", t.proxy(this.show, this)) : i.on(g, t.proxy(this.show, this)));
        },
        unbind: function() {
            var e = this.options, i = this.$element;
            t.isFunction(e.show) && i.off("show.datepicker", e.show), t.isFunction(e.hide) && i.off("hide.datepicker", e.hide), 
            t.isFunction(e.pick) && i.off("pick.datepicker", e.pick), this.isInput && i.off("keyup.datepicker", this.keyup), 
            this.isInline || (e.trigger ? this.$trigger.off(g, this.toggle) : this.isInput ? i.off("focus.datepicker", this.show) : i.off(g, this.show));
        },
        showView: function(t) {
            var e = this.$yearsPicker, i = this.$monthsPicker, a = this.$daysPicker, s = this.format;
            if (s.hasYear || s.hasMonth || s.hasDay) switch (u(t)) {
              case k:
              case "years":
                i.addClass(w), a.addClass(w), s.hasYear ? (this.fillYears(), e.removeClass(w), this.place()) : this.showView(y);
                break;

              case $:
              case "months":
                e.addClass(w), a.addClass(w), s.hasMonth ? (this.fillMonths(), i.removeClass(w), 
                this.place()) : this.showView(k);
                break;

              default:
                e.addClass(w), i.addClass(w), s.hasDay ? (this.fillDays(), a.removeClass(w), this.place()) : this.showView($);
            }
        },
        hideView: function() {
            !this.isInline && this.options.autoHide && this.hide();
        },
        place: function() {
            if (!this.isInline) {
                var t = this.options, e = this.$element, i = this.$picker, a = c.outerWidth(), s = c.outerHeight(), n = e.outerWidth(), o = e.outerHeight(), r = i.width(), l = i.height(), h = e.offset(), d = h.left, u = h.top, g = parseFloat(t.offset) || 10, p = "datepicker-top-left";
                u > l && u + o + l > s ? (u -= l + g, p = "datepicker-bottom-left") : u += o + g, 
                d + r > a && (d = d + n - r, p = p.replace("left", "right")), i.removeClass(v).addClass(p).css({
                    top: u,
                    left: d,
                    zIndex: parseInt(t.zIndex, 10)
                });
            }
        },
        trigger: function(e, i) {
            var a = t.Event(e, i);
            return this.$element.trigger(a), a;
        },
        createItem: function(e) {
            var i = this.options, a = i.itemTag, s = {
                text: "",
                view: "",
                muted: !1,
                picked: !1,
                disabled: !1,
                highlighted: !1
            }, n = [];
            return t.extend(s, e), s.muted && n.push(i.mutedClass), s.highlighted && n.push(i.highlightedClass), 
            s.picked && n.push(i.pickedClass), s.disabled && n.push(i.disabledClass), "<" + a + ' class="' + n.join(" ") + '"' + (s.view ? ' data-view="' + s.view + '"' : "") + ">" + s.text + "</" + a + ">";
        },
        fillAll: function() {
            this.fillYears(), this.fillMonths(), this.fillDays();
        },
        fillWeek: function() {
            var e, i = this.options, a = parseInt(i.weekStart, 10) % 7, s = i.daysMin, n = "";
            for (s = t.merge(s.slice(a), s.slice(0, a)), e = 0; e <= 6; e++) n += this.createItem({
                text: s[e]
            });
            this.$week.html(n);
        },
        fillYears: function() {
            var e, i = this.options, a = i.disabledClass || "", s = i.yearSuffix || "", n = t.isFunction(i.filter) && i.filter, o = this.startDate, r = this.endDate, l = this.viewDate, h = l.getFullYear(), d = l.getMonth(), c = l.getDate(), u = new Date().getFullYear(), g = this.date, p = g.getFullYear(), f = !1, m = !1, v = !1, w = !1, y = !1, $ = "";
            for (e = -5; e <= 6; e++) g = new Date(h + e, d, c), y = -5 === e || 6 === e, w = h + e === p, 
            v = !1, o && (v = g.getFullYear() < o.getFullYear(), -5 === e && (f = v)), !v && r && (v = g.getFullYear() > r.getFullYear(), 
            6 === e && (m = v)), !v && n && (v = !1 === n.call(this.$element, g)), $ += this.createItem({
                text: h + e,
                view: v ? "year disabled" : w ? "year picked" : "year",
                muted: y,
                picked: w,
                disabled: v,
                highlighted: g.getFullYear() === u
            });
            this.$yearsPrev.toggleClass(a, f), this.$yearsNext.toggleClass(a, m), this.$yearsCurrent.toggleClass(a, !0).html(h + -5 + s + " - " + (h + 6) + s), 
            this.$years.html($);
        },
        fillMonths: function() {
            var e, i = this.options, a = i.disabledClass || "", s = i.monthsShort, n = t.isFunction(i.filter) && i.filter, o = this.startDate, r = this.endDate, l = this.viewDate, h = l.getFullYear(), d = l.getDate(), c = new Date(), u = c.getFullYear(), g = c.getMonth(), p = this.date, f = p.getFullYear(), m = p.getMonth(), v = !1, w = !1, y = !1, $ = !1, k = "";
            for (e = 0; e <= 11; e++) p = new Date(h, e, d), $ = h === f && e === m, y = !1, 
            o && (y = (v = p.getFullYear() === o.getFullYear()) && p.getMonth() < o.getMonth()), 
            !y && r && (y = (w = p.getFullYear() === r.getFullYear()) && p.getMonth() > r.getMonth()), 
            !y && n && (y = !1 === n.call(this.$element, p)), k += this.createItem({
                index: e,
                text: s[e],
                view: y ? "month disabled" : $ ? "month picked" : "month",
                picked: $,
                disabled: y,
                highlighted: h === u && p.getMonth() === g
            });
            this.$yearPrev.toggleClass(a, v), this.$yearNext.toggleClass(a, w), this.$yearCurrent.toggleClass(a, v && w).html(h + i.yearSuffix || ""), 
            this.$months.html(k);
        },
        fillDays: function() {
            var e, i, a, s = this.options, n = s.disabledClass || "", o = s.yearSuffix || "", l = s.monthsShort, h = parseInt(s.weekStart, 10) % 7, d = t.isFunction(s.filter) && s.filter, c = this.startDate, u = this.endDate, g = this.viewDate, p = g.getFullYear(), f = g.getMonth(), m = p, v = f, w = p, y = new Date(), $ = y.getFullYear(), k = y.getMonth(), D = y.getDate(), C = f, b = this.date, x = b.getFullYear(), S = b.getMonth(), F = b.getDate(), I = !1, T = !1, M = !1, V = !1, P = [], Y = [], A = [];
            for (0 === f ? (m -= 1, v = 11) : v -= 1, e = r(m, v), (a = (b = new Date(p, f, 1)).getDay() - h) <= 0 && (a += 7), 
            c && (I = b.getTime() <= c.getTime()), i = e - (a - 1); i <= e; i++) b = new Date(m, v, i), 
            V = m === x && v === S && i === F, M = !1, c && (M = b.getTime() < c.getTime()), 
            !M && d && (M = !1 === d.call(this.$element, b)), P.push(this.createItem({
                text: i,
                view: "day prev",
                muted: !0,
                picked: V,
                disabled: M,
                highlighted: m === $ && v === k && b.getDate() === D
            }));
            for (11 === f ? (w += 1, C = 0) : C += 1, e = r(p, f), a = 42 - (P.length + e), 
            b = new Date(p, f, e), u && (T = b.getTime() >= u.getTime()), i = 1; i <= a; i++) b = new Date(w, C, i), 
            V = w === x && C === S && i === F, M = !1, u && (M = b.getTime() > u.getTime()), 
            !M && d && (M = !1 === d.call(this.$element, b)), Y.push(this.createItem({
                text: i,
                view: "day next",
                muted: !0,
                picked: V,
                disabled: M,
                highlighted: w === $ && C === k && b.getDate() === D
            }));
            for (i = 1; i <= e; i++) b = new Date(p, f, i), V = p === x && f === S && i === F, 
            M = !1, c && (M = b.getTime() < c.getTime()), !M && u && (M = b.getTime() > u.getTime()), 
            !M && d && (M = !1 === d.call(this.$element, b)), A.push(this.createItem({
                text: i,
                view: M ? "day disabled" : V ? "day picked" : "day",
                picked: V,
                disabled: M,
                highlighted: p === $ && f === k && b.getDate() === D
            }));
            this.$monthPrev.toggleClass(n, I), this.$monthNext.toggleClass(n, T), this.$monthCurrent.toggleClass(n, I && T).html(s.yearFirst ? p + o + " " + l[f] : l[f] + " " + p + o), 
            this.$days.html(P.join("") + A.join(" ") + Y.join(""));
        },
        click: function(e) {
            var i, a, s, n, o, r, l = t(e.target), h = this.options, d = this.viewDate;
            if (e.stopPropagation(), e.preventDefault(), !l.hasClass("disabled")) switch (i = d.getFullYear(), 
            a = d.getMonth(), s = d.getDate(), r = l.data("view")) {
              case "years prev":
              case "years next":
                i = "years prev" === r ? i - 10 : i + 10, o = l.text(), (n = m.test(o)) && (i = parseInt(o, 10), 
                this.date = new Date(i, a, D(s, 28))), this.viewDate = new Date(i, a, D(s, 28)), 
                this.fillYears(), n && (this.showView($), this.pick("year"));
                break;

              case "year prev":
              case "year next":
                i = "year prev" === r ? i - 1 : i + 1, this.viewDate = new Date(i, a, D(s, 28)), 
                this.fillMonths();
                break;

              case "year current":
                this.format.hasYear && this.showView(k);
                break;

              case "year picked":
                this.format.hasMonth ? this.showView($) : (l.addClass(h.pickedClass).siblings().removeClass(h.pickedClass), 
                this.hideView()), this.pick("year");
                break;

              case "year":
                i = parseInt(l.text(), 10), this.date = new Date(i, a, D(s, 28)), this.format.hasMonth ? (this.viewDate = new Date(i, a, D(s, 28)), 
                this.showView($)) : (l.addClass(h.pickedClass).siblings().removeClass(h.pickedClass), 
                this.hideView()), this.pick("year");
                break;

              case "month prev":
              case "month next":
                a = "month prev" === r ? a - 1 : "month next" === r ? a + 1 : a, this.viewDate = new Date(i, a, D(s, 28)), 
                this.fillDays();
                break;

              case "month current":
                this.format.hasMonth && this.showView($);
                break;

              case "month picked":
                this.format.hasDay ? this.showView(y) : (l.addClass(h.pickedClass).siblings().removeClass(h.pickedClass), 
                this.hideView()), this.pick("month");
                break;

              case "month":
                a = t.inArray(l.text(), h.monthsShort), this.date = new Date(i, a, D(s, 28)), this.format.hasDay ? (this.viewDate = new Date(i, a, D(s, 28)), 
                this.showView(y)) : (l.addClass(h.pickedClass).siblings().removeClass(h.pickedClass), 
                this.hideView()), this.pick("month");
                break;

              case "day prev":
              case "day next":
              case "day":
                a = "day prev" === r ? a - 1 : "day next" === r ? a + 1 : a, s = parseInt(l.text(), 10), 
                this.date = new Date(i, a, s), this.viewDate = new Date(i, a, s), this.fillDays(), 
                "day" === r && this.hideView(), this.pick("day");
                break;

              case "day picked":
                this.hideView(), this.pick("day");
            }
        },
        clickDoc: function(t) {
            for (var e, i = t.target, a = this.$element[0], s = this.$trigger[0]; i !== d; ) {
                if (i === s || i === a) {
                    e = !0;
                    break;
                }
                i = i.parentNode;
            }
            e || this.hide();
        },
        keyup: function() {
            this.update();
        },
        keyupDoc: function(t) {
            this.isInput && t.target !== this.$element[0] && this.isShown && ("Tab" === t.key || 9 === t.keyCode) && this.hide();
        },
        getValue: function() {
            var t = this.$element, e = "";
            return this.isInput ? e = t.val() : this.isInline ? this.options.container && (e = t.text()) : e = t.text(), 
            e;
        },
        setValue: function(t) {
            var i = this.$element;
            t = e(t) ? t : "", this.isInput ? i.val(t) : this.isInline ? this.options.container && i.text(t) : i.text(t);
        },
        show: function() {
            this.isBuilt || this.build(), this.isShown || this.trigger("show.datepicker").isDefaultPrevented() || (this.isShown = !0, 
            this.$picker.removeClass(w).on(g, t.proxy(this.click, this)), this.showView(this.options.startView), 
            this.isInline || (h.on("resize.datepicker", this._place = o(this.place, this)), 
            c.on(g, this._clickDoc = o(this.clickDoc, this)), c.on("keyup.datepicker", this._keyupDoc = o(this.keyupDoc, this)), 
            this.place()));
        },
        hide: function() {
            this.isShown && (this.trigger("hide.datepicker").isDefaultPrevented() || (this.isShown = !1, 
            this.$picker.addClass(w).off(g, this.click), this.isInline || (h.off("resize.datepicker", this._place), 
            c.off(g, this._clickDoc), c.off("keyup.datepicker", this._keyupDoc))));
        },
        toggle: function() {
            this.isShown ? this.hide() : this.show();
        },
        update: function() {
            var t = this.getValue();
            t !== this.oldValue && (this.setDate(t, !0), this.oldValue = t);
        },
        pick: function(t) {
            var e = this.$element, i = this.date;
            this.trigger("pick.datepicker", {
                view: t || "",
                date: i
            }).isDefaultPrevented() || (this.setValue(i = this.formatDate(this.date)), this.isInput && e.trigger("change"));
        },
        reset: function() {
            this.setDate(this.initialDate, !0), this.setValue(this.initialValue), this.isShown && this.showView(this.options.startView);
        },
        getMonthName: function(e, s) {
            var n = this.options, o = n.months;
            return t.isNumeric(e) ? e = u(e) : a(s) && (s = e), !0 === s && (o = n.monthsShort), 
            o[i(e) ? e : this.date.getMonth()];
        },
        getDayName: function(e, s, n) {
            var o = this.options, r = o.days;
            return t.isNumeric(e) ? e = u(e) : (a(n) && (n = s), a(s) && (s = e)), (r = !0 === n ? o.daysMin : !0 === s ? o.daysShort : r)[i(e) ? e : this.date.getDay()];
        },
        getDate: function(t) {
            var e = this.date;
            return t ? this.formatDate(e) : new Date(e);
        },
        setDate: function(i, a) {
            var n = this.options.filter;
            if (s(i) || e(i)) {
                if (i = this.parseDate(i), t.isFunction(n) && !1 === n.call(this.$element, i)) return;
                this.date = i, this.viewDate = new Date(i), a || this.pick(), this.isBuilt && this.fillAll();
            }
        },
        setStartDate: function(t) {
            (s(t) || e(t)) && (this.startDate = this.parseDate(t), this.isBuilt && this.fillAll());
        },
        setEndDate: function(t) {
            (s(t) || e(t)) && (this.endDate = this.parseDate(t), this.isBuilt && this.fillAll());
        },
        parseDate: function(t) {
            var i, a, n, o, r, l, h = this.format, d = [];
            if (s(t)) return new Date(t.getFullYear(), t.getMonth(), t.getDate());
            if (e(t) && (d = t.match(f) || []), t = new Date(), a = t.getFullYear(), n = t.getDate(), 
            o = t.getMonth(), i = h.parts.length, d.length === i) for (l = 0; l < i; l++) switch (r = parseInt(d[l], 10) || 1, 
            h.parts[l]) {
              case "dd":
              case "d":
                n = r;
                break;

              case "mm":
              case "m":
                o = r - 1;
                break;

              case "yy":
                a = 2e3 + r;
                break;

              case "yyyy":
                a = r;
            }
            return new Date(a, o, n);
        },
        formatDate: function(t) {
            var e, i, a, n, o, r = this.format, l = "";
            if (s(t)) for (l = r.source, i = t.getFullYear(), (n = {
                d: t.getDate(),
                m: t.getMonth() + 1,
                yy: i.toString().substring(2),
                yyyy: i
            }).dd = (n.d < 10 ? "0" : "") + n.d, n.mm = (n.m < 10 ? "0" : "") + n.m, e = r.parts.length, 
            o = 0; o < e; o++) a = r.parts[o], l = l.replace(a, n[a]);
            return l;
        },
        destroy: function() {
            this.unbind(), this.unbuild(), this.$element.removeData("datepicker");
        }
    }, l.LANGUAGES = {}, l.DEFAULTS = {
        autoShow: !1,
        autoHide: !1,
        autoPick: !1,
        inline: !1,
        container: null,
        trigger: null,
        language: "",
        format: "mm/dd/yyyy",
        date: null,
        startDate: null,
        endDate: null,
        startView: 0,
        weekStart: 0,
        yearFirst: !1,
        yearSuffix: "",
        days: [ "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday" ],
        daysShort: [ "Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat" ],
        daysMin: [ "Su", "Mo", "Tu", "We", "Th", "Fr", "Sa" ],
        months: [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ],
        monthsShort: [ "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec" ],
        itemTag: "li",
        mutedClass: "muted",
        pickedClass: "picked",
        disabledClass: "disabled",
        highlightedClass: "highlighted",
        template: '<div class="datepicker-container"><div class="datepicker-panel" data-view="years picker"><ul><li data-view="years prev">&lsaquo;</li><li data-view="years current"></li><li data-view="years next">&rsaquo;</li></ul><ul data-view="years"></ul></div><div class="datepicker-panel" data-view="months picker"><ul><li data-view="year prev">&lsaquo;</li><li data-view="year current"></li><li data-view="year next">&rsaquo;</li></ul><ul data-view="months"></ul></div><div class="datepicker-panel" data-view="days picker"><ul><li data-view="month prev">&lsaquo;</li><li data-view="month current"></li><li data-view="month next">&rsaquo;</li></ul><ul data-view="week"></ul><ul data-view="days"></ul></div></div>',
        offset: 10,
        zIndex: 1e3,
        filter: null,
        show: null,
        hide: null,
        pick: null
    }, l.setDefaults = function(e) {
        (e = t.isPlainObject(e) ? e : {}).language && (e = t.extend({}, l.LANGUAGES[e.language], e)), 
        t.extend(l.DEFAULTS, e);
    }, l.other = t.fn.datepicker, t.fn.datepicker = function(i) {
        var s, o = n(arguments, 1);
        return this.each(function() {
            var a, n, r = t(this), h = r.data("datepicker");
            if (!h) {
                if (/destroy/.test(i)) return;
                a = t.extend({}, r.data(), t.isPlainObject(i) && i), r.data("datepicker", h = new l(this, a));
            }
            e(i) && t.isFunction(n = h[i]) && (s = n.apply(h, o));
        }), a(s) ? this : s;
    }, t.fn.datepicker.Constructor = l, t.fn.datepicker.languages = l.LANGUAGES, t.fn.datepicker.setDefaults = l.setDefaults, 
    t.fn.datepicker.noConflict = function() {
        return t.fn.datepicker = l.other, this;
    };
});

var dropdowns = function() {
    "use strict";
    function t(t) {
        0 == s ? ($("#" + $(this).data("id")).toggleClass("toggled"), s = !0, t.stopPropagation()) : 1 == s && ($("#" + $(this).data("id")).toggleClass("toggled"), 
        s = !1, t.stopPropagation());
    }
    function e() {
        0 != s && ($(".dropdown-content.toggled").toggleClass("toggled"), s = !1);
    }
    function i(t) {
        t.stopPropagation();
    }
    var a = {}, s = !1;
    return {
        init: function() {
            a.$document = $(document), a.$dropdownToggle = $(".dropdown-toggle"), a.$dropdownContent = $(".dropdown-content"), 
            a.$dropdownToggle.click(t), a.$document.on("click", e), a.$dropdownContent.on("click", i);
        }
    };
}(), modals = function() {
    "use strict";
    function t(t) {
        $(this).attr("id");
        s.$modal.toggleClass("toggled"), s.$body.height() > $(window).height() && (s.$body.toggleClass("modal-active"), 
        s.$nav.toggleClass("modal-active")), n = !0, t.stopPropagation();
    }
    function e(t) {
        s.$modal.toggleClass("toggled"), s.$body.height() > $(window).height() && (s.$body.toggleClass("modal-active"), 
        s.$nav.toggleClass("modal-active")), n = !1, t.stopPropagation();
    }
    function i() {
        0 != n && (s.$modal.toggleClass("toggled"), s.$body.height() > $(window).height() && (s.$body.toggleClass("modal-active"), 
        s.$nav.toggleClass("modal-active")), n = !1);
    }
    function a(t) {
        t.stopPropagation();
    }
    var s = {}, n = !1;
    return {
        init: function() {
            s.$modal = $(".modal"), s.$modalToggle = $(".modal-toggle"), s.$modalClose = $(".modal-close"), 
            s.$modalBackground = $(".modal-background"), s.$modalContent = $(".modal-content"), 
            s.$body = $("body"), s.$nav = $(".nav"), s.$modalToggle.click(t), s.$modalClose.click(e), 
            s.$modalBackground.on("click", i), s.$modalContent.on("click", a);
        }
    };
}(), navDetachable = function() {
    "use strict";
    function t(t) {
        t.preventDefault();
        var e = $(this).attr("href").slice(1), i = $('.section[id="' + e + '"]').offset().top;
        return $("html, body").animate({
            scrollTop: i
        }, 600), !1;
    }
    function e() {
        var t = $(this).scrollTop();
        t >= 500 ? (a.$navAside.addClass("detached"), a.$section.each(function(e) {
            $(this).position().top <= t - 500 && ($(".scroll-anchor.active").removeClass("active"), 
            $(".scroll-anchor").eq(e).addClass("active"));
        })) : a.$navAside.removeClass("detached");
    }
    function i() {
        a.$document.scrollTop() > 500 ? a.$navAside.addClass("detached") : $(".scroll-anchor:first").addClass("active");
    }
    var a = {};
    return {
        init: function() {
            a.$document = $(document), a.$window = $(window), a.$scrollAnchor = $(".scroll-anchor"), 
            a.$navAside = $(".nav-aside"), a.$section = $(".section"), a.$scrollAnchor.click(t), 
            a.$window.scroll(e), a.$document.ready(i);
        }
    };
}(), navSide = function() {
    "use strict";
    function t(t) {
        0 == s ? (a.$navSide.toggleClass("toggled"), s = !0, t.stopPropagation()) : 1 == s && (a.$navSide.toggleClass("toggled"), 
        s = !1, t.stopPropagation());
    }
    function e() {
        0 != s && (a.$navSide.toggleClass("toggled"), s = !1);
    }
    function i(t) {
        t.stopPropagation();
    }
    var a = {}, s = !1;
    return {
        init: function() {
            a.$document = $(document), a.$navToggle = $(".nav-toggle"), a.$navSide = $(".nav-side"), 
            a.$navToggle.click(t), a.$document.on("click", e), a.$navSide.on("click", i);
        }
    };
}(), notifications = function() {
    "use strict";
    function t(t) {
        t.preventDefault(), $(this).parent().hide();
    }
    var e = {};
    return {
        init: function() {
            e.$dismissNotification = $(".dismiss-notification"), e.$dismissNotification.click(t);
        }
    };
}(), slider = function() {
    "use strict";
    function t() {
        var t = i.$sliderOuter.scrollLeft();
        i.$sliderOuter.animate({
            scrollLeft: t - 400
        }, 400);
    }
    function e() {
        var t = i.$sliderOuter.scrollLeft();
        i.$sliderOuter.animate({
            scrollLeft: t + 400
        }, 400);
    }
    var i = {};
    return {
        init: function() {
            i.$sliderChevronLeft = $(".slider-chevron.left"), i.$sliderChevronRight = $(".slider-chevron.right"), 
            i.$sliderOuter = $(".slider-outer"), i.$sliderChevronLeft.click(t), i.$sliderChevronRight.click(e);
        }
    };
}(), tabs = function() {
    "use strict";
    function t(t) {
        t.preventDefault();
        var i = $(this).children("a").attr("href");
        1 != $(this).hasClass("tab-active") && (e.$tab.removeClass("tab-active"), e.$tabContent.removeClass("tab-active").css("opacity", "0"), 
        $(this).addClass("tab-active"), $(i).addClass("tab-active").animate({
            opacity: 1
        }, 600, "linear"));
    }
    var e = {};
    return {
        init: function() {
            e.$tab = $(".tab"), e.$tabContent = $(".tab-content"), e.$tab.click(t);
        }
    };
}(), wysiwyg = function() {
    "use strict";
    function t() {
        CKEDITOR.replace("wysiwyg"), CKEDITOR.config.codeSnippet_theme = "monokai_sublime";
    }
    var e = {};
    return {
        init: function() {
            e.$document = $(document), e.$document.ready(t);
        }
    };
}();

$(document).ready(function() {
    wysiwyg.init(), dropdowns.init(), modals.init(), navDetachable.init(), navSide.init(), 
    navTop.init(), notifications.init(), slider.init(), tabs.init();
});