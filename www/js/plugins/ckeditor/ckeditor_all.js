/*   粘贴你代码到这里并点击格式化按钮   */
/*   例如格式化以下这段代码   */
/*
Copyright (c) 2003-2010, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

(function() {
    if (!window.CKEDITOR) window.CKEDITOR = (function() {
        var a = {
            timestamp: 'A06B',
            version: '3.1',
            revision: '4891',
            _: {},
            status: 'unloaded',
            basePath: (function() {
                var d = window.CKEDITOR_BASEPATH || '';
                if (!d) {
                    var e = document.getElementsByTagName('script');
                    for (var f = 0; f < e.length; f++) {
                        var g = e[f].src.match(/(^|.*[\\\/])ckeditor(?:_basic)?(?:_source)?.js(?:\?.*)?$/i);
                        if (g) {
                            d = g[1];
                            break;
                        }
                    }
                }
                if (d.indexOf('://') == -1) if (d.indexOf('/') === 0) d = location.href.match(/^.*?:\/\/[^\/]*/)[0] + d;
                else d = location.href.match(/^[^\?]*\/(?:)/)[0] + d;
                return d;
            })(),
            getUrl: function(d) {
                if (d.indexOf('://') == -1 && d.indexOf('/') !== 0) d = this.basePath + d;
                if (this.timestamp && d.charAt(d.length - 1) != '/') d += (d.indexOf('?') >= 0 ? '&': '?') + 't=' + this.timestamp;
                return d;
            }
        },
        b = window.CKEDITOR_GETURL;
        if (b) {
            var c = a.getUrl;
            a.getUrl = function(d) {
                return b.call(a, d) || c.call(a, d);
            };
        }
        return a;
    })();
    var a = CKEDITOR;
    if (!a.event) {
        a.event = function() {};
        a.event.implementOn = function(b, c) {
            var d = a.event.prototype;
            for (var e in d) {
                if (b[e] == undefined) b[e] = d[e];
            }
        };
        a.event.prototype = (function() {
            var b = function(d) {
                var e = d.getPrivate && d.getPrivate() || d._ || (d._ = {});
                return e.events || (e.events = {});
            },
            c = function(d) {
                this.name = d;
                this.listeners = [];
            };
            c.prototype = {
                getListenerIndex: function(d) {
                    for (var e = 0, f = this.listeners; e < f.length; e++) {
                        if (f[e].fn == d) return e;
                    }
                    return - 1;
                }
            };
            return {
                on: function(d, e, f, g, h) {
                    var i = b(this),
                    j = i[d] || (i[d] = new c(d));
                    if (j.getListenerIndex(e) < 0) {
                        var k = j.listeners;
                        if (!f) f = this;
                        if (isNaN(h)) h = 10;
                        var l = this,
                        m = function(o, p, q, r) {
                            var s = {
                                name: d,
                                sender: this,
                                editor: o,
                                data: p,
                                listenerData: g,
                                stop: q,
                                cancel: r,
                                removeListener: function() {
                                    l.removeListener(d, e);
                                }
                            };
                            e.call(f, s);
                            return s.data;
                        };
                        m.fn = e;
                        m.priority = h;
                        for (var n = k.length - 1; n >= 0; n--) {
                            if (k[n].priority <= h) {
                                k.splice(n + 1, 0, m);
                                return;
                            }
                        }
                        k.unshift(m);
                    }
                },
                fire: (function() {
                    var d = false,
                    e = function() {
                        d = true;
                    },
                    f = false,
                    g = function() {
                        f = true;
                    };
                    return function(h, i, j) {
                        var k = b(this)[h],
                        l = d,
                        m = f;
                        d = f = false;
                        if (k) {
                            var n = k.listeners;
                            if (n.length) {
                                n = n.slice(0);
                                for (var o = 0; o < n.length; o++) {
                                    var p = n[o].call(this, j, i, e, g);
                                    if (typeof p != 'undefined') i = p;
                                    if (d || f) break;
                                }
                            }
                        }
                        var q = f || (typeof i == 'undefined' ? false: i);
                        d = l;
                        f = m;
                        return q;
                    };
                })(),
                fireOnce: function(d, e, f) {
                    var g = this.fire(d, e, f);
                    delete b(this)[d];
                    return g;
                },
                removeListener: function(d, e) {
                    var f = b(this)[d];
                    if (f) {
                        var g = f.getListenerIndex(e);
                        if (g >= 0) f.listeners.splice(g, 1);
                    }
                },
                hasListeners: function(d) {
                    var e = b(this)[d];
                    return e && e.listeners.length > 0;
                }
            };
        })();
    }
    if (!a.editor) {
        a.ELEMENT_MODE_NONE = 0;
        a.ELEMENT_MODE_REPLACE = 1;
        a.ELEMENT_MODE_APPENDTO = 2;
        a.editor = function(b, c, d) {
            var e = this;
            e._ = {
                instanceConfig: b,
                element: c
            };
            e.elementMode = d || 0;
            a.event.call(e);
            e._init();
        };
        a.editor.replace = function(b, c) {
            var d = b;
            if (typeof d != 'object') {
                d = document.getElementById(b);
                if (!d) {
                    var e = 0,
                    f = document.getElementsByName(b);
                    while ((d = f[e++]) && d.tagName.toLowerCase() != 'textarea') {}
                }
                if (!d) throw '[CKEDITOR.editor.replace] The element with id or name "' + b + '" was not found.';
            }
            d.style.visibility = 'hidden';
            return new a.editor(c, d, 1);
        };
        a.editor.appendTo = function(b, c) {
            var d = b;
            if (typeof d != 'object') {
                d = document.getElementById(b);
                if (!d) throw '[CKEDITOR.editor.appendTo] The element with id "' + b + '" was not found.';
            }
            return new a.editor(c, d, 2);
        };
        a.editor.prototype = {
            _init: function() {
                var b = a.editor._pending || (a.editor._pending = []);
                b.push(this);
            },
            fire: function(b, c) {
                return a.event.prototype.fire.call(this, b, c, this);
            },
            fireOnce: function(b, c) {
                return a.event.prototype.fireOnce.call(this, b, c, this);
            }
        };
        a.event.implementOn(a.editor.prototype, true);
    }
    if (!a.env) a.env = (function() {
        var b = navigator.userAgent.toLowerCase(),
        c = window.opera,
        d = {
            ie:
            /*@cc_on!@*/
            false,
            opera: !!c && c.version,
            webkit: b.indexOf(' applewebkit/') > -1,
            air: b.indexOf(' adobeair/') > -1,
            mac: b.indexOf('macintosh') > -1,
            quirks: document.compatMode == 'BackCompat',
            isCustomDomain: function() {
                return this.ie && document.domain != window.location.hostname;
            }
        };
        d.gecko = navigator.product == 'Gecko' && !d.webkit && !d.opera;
        var e = 0;
        if (d.ie) {
            e = parseFloat(b.match(/msie (\d+)/)[1]);
            d.ie8 = !!document.documentMode;
            d.ie8Compat = document.documentMode == 8;
            d.ie7Compat = e == 7 && !document.documentMode || document.documentMode == 7;
            d.ie6Compat = e < 7 || d.quirks;
        }
        if (d.gecko) {
            var f = b.match(/rv:([\d\.]+)/);
            if (f) {
                f = f[1].split('.');
                e = f[0] * 10000 + (f[1] || 0) * 100 + +(f[2] || 0);
            }
        }
        if (d.opera) e = parseFloat(c.version());
        if (d.air) e = parseFloat(b.match(/ adobeair\/(\d+)/)[1]);
        if (d.webkit) e = parseFloat(b.match(/ applewebkit\/(\d+)/)[1]);
        d.version = e;
        d.isCompatible = d.ie && e >= 6 || d.gecko && e >= 10801 || d.opera && e >= 9.5 || d.air && e >= 1 || d.webkit && e >= 522 || false;
        d.cssClass = 'cke_browser_' + (d.ie ? 'ie': d.gecko ? 'gecko': d.opera ? 'opera': d.air ? 'air': d.webkit ? 'webkit': 'unknown');
        if (d.quirks) d.cssClass += ' cke_browser_quirks';
        if (d.ie) {
            d.cssClass += ' cke_browser_ie' + (d.version < 7 ? '6': d.version >= 8 ? '8': '7');
            if (d.quirks) d.cssClass += ' cke_browser_iequirks';
        }
        if (d.gecko && e < 10900) d.cssClass += ' cke_browser_gecko18';
        return d;
    })();
    var b = a.env;
    var c = b.ie;
    if (a.status == 'unloaded')(function() {
        a.event.implementOn(a);
        a.loadFullCore = function() {
            if (a.status != 'basic_ready') {
                a.loadFullCore._load = true;
                return;
            }
            delete a.loadFullCore;
            var e = document.createElement('script');
            e.type = 'text/javascript';
            e.src = a.basePath + 'ckeditor.js';
            document.getElementsByTagName('head')[0].appendChild(e);
        };
        a.loadFullCoreTimeout = 0;
        a.replaceClass = 'ckeditor';
        a.replaceByClassEnabled = true;
        var d = function(e, f, g) {
            if (b.isCompatible) {
                if (a.loadFullCore) a.loadFullCore();
                var h = g(e, f);
                a.add(h);
                return h;
            }
            return null;
        };
        a.replace = function(e, f) {
            return d(e, f, a.editor.replace);
        };
        a.appendTo = function(e, f) {
            return d(e, f, a.editor.appendTo);
        };
        a.add = function(e) {
            var f = this._.pending || (this._.pending = []);
            f.push(e);
        };
        a.replaceAll = function() {
            var e = document.getElementsByTagName('textarea');
            for (var f = 0; f < e.length; f++) {
                var g = null,
                h = e[f],
                i = h.name;
                if (!h.name && !h.id) continue;
                if (typeof arguments[0] == 'string') {
                    var j = new RegExp('(?:^| )' + arguments[0] + '(?:$| )');
                    if (!j.test(h.className)) continue;
                } else if (typeof arguments[0] == 'function') {
                    g = {};
                    if (arguments[0](h, g) === false) continue;
                }
                this.replace(h, g);
            }
        };
        (function() {
            var e = function() {
                var f = a.loadFullCore,
                g = a.loadFullCoreTimeout;
                if (a.replaceByClassEnabled) a.replaceAll(a.replaceClass);
                a.status = 'basic_ready';
                if (f && f._load) f();
                else if (g) setTimeout(function() {
                    if (a.loadFullCore) a.loadFullCore();
                },
                g * 1000);
            };
            if (window.addEventListener) window.addEventListener('load', e, false);
            else if (window.attachEvent) window.attachEvent('onload', e);
        })();
        a.status = 'basic_loaded';
    })();
    a.dom = {};
    var d = a.dom;
    (function() {
        var e = [];
        a.tools = {
            arrayCompare: function(f, g) {
                if (!f && !g) return true;
                if (!f || !g || f.length != g.length) return false;
                for (var h = 0; h < f.length; h++) {
                    if (f[h] != g[h]) return false;
                }
                return true;
            },
            clone: function(f) {
                var g;
                if (f && f instanceof Array) {
                    g = [];
                    for (var h = 0; h < f.length; h++) g[h] = this.clone(f[h]);
                    return g;
                }
                if (f === null || typeof f != 'object' || f instanceof String || f instanceof Number || f instanceof Boolean || f instanceof Date || f instanceof RegExp) return f;
                g = new f.constructor();
                for (var i in f) {
                    var j = f[i];
                    g[i] = this.clone(j);
                }
                return g;
            },
            capitalize: function(f) {
                return f.charAt(0).toUpperCase() + f.substring(1).toLowerCase();
            },
            extend: function(f) {
                var g = arguments.length,
                h, i;
                if (typeof(h = arguments[g - 1]) == 'boolean') g--;
                else if (typeof(h = arguments[g - 2]) == 'boolean') {
                    i = arguments[g - 1];
                    g -= 2;
                }
                for (var j = 1; j < g; j++) {
                    var k = arguments[j];
                    for (var l in k) {
                        if (h === true || f[l] == undefined) if (!i || l in i) f[l] = k[l];
                    }
                }
                return f;
            },
            prototypedCopy: function(f) {
                var g = function() {};
                g.prototype = f;
                return new g();
            },
            isArray: function(f) {
                return !! f && f instanceof Array;
            },
            isEmpty: function(f) {
                for (var g in f) {
                    if (f.hasOwnProperty(g)) return false;
                }
                return true;
            },
            cssStyleToDomStyle: (function() {
                var f = document.createElement('div').style,
                g = typeof f.cssFloat != 'undefined' ? 'cssFloat': typeof f.styleFloat != 'undefined' ? 'styleFloat': 'float';
                return function(h) {
                    if (h == 'float') return g;
                    else return h.replace(/-./g,
                    function(i) {
                        return i.substr(1).toUpperCase();
                    });
                };
            })(),
            buildStyleHtml: function(f) {
                f = [].concat(f);
                var g, h = [];
                for (var i = 0; i < f.length; i++) {
                    g = f[i];
                    if (/@import|[{}]/.test(g)) h.push('<style>' + g + '</style>');
                    else h.push('<link type="text/css" rel=stylesheet href="' + g + '">');
                }
                return h.join('');
            },
            htmlEncode: function(f) {
                var g = function(k) {
                    var l = new d.element('span');
                    l.setText(k);
                    return l.getHtml();
                },
                h = g('\n').toLowerCase() == '<br>' ?
                function(k) {
                    return g(k).replace(/<br>/gi, '\n');
                }: g,
                i = g('>') == '>' ?
                function(k) {
                    return h(k).replace(/>/g, '&gt;');
                }: h,
                j = g('  ') == '&nbsp; ' ?
                function(k) {
                    return i(k).replace(/&nbsp;/g, ' ');
                }: i;
                this.htmlEncode = j;
                return this.htmlEncode(f);
            },
            escapeCssSelector: function(f) {
                return f.replace(/[\s#:.,$*^\[\]()~=+>]/g, '\\$&');
            },
            getNextNumber: (function() {
                var f = 0;
                return function() {
                    return++f;
                };
            })(),
            override: function(f, g) {
                return g(f);
            },
            setTimeout: function(f, g, h, i, j) {
                if (!j) j = window;
                if (!h) h = j;
                return j.setTimeout(function() {
                    if (i) f.apply(h, [].concat(i));
                    else f.apply(h);
                },
                g || 0);
            },
            trim: (function() {
                var f = /(?:^[ \t\n\r]+)|(?:[ \t\n\r]+$)/g;
                return function(g) {
                    return g.replace(f, '');
                };
            })(),
            ltrim: (function() {
                var f = /^[ \t\n\r]+/g;
                return function(g) {
                    return g.replace(f, '');
                };
            })(),
            rtrim: (function() {
                var f = /[ \t\n\r]+$/g;
                return function(g) {
                    return g.replace(f, '');
                };
            })(),
            indexOf: Array.prototype.indexOf ?
            function(f, g) {
                return f.indexOf(g);
            }: function(f, g) {
                for (var h = 0, i = f.length; h < i; h++) {
                    if (f[h] === g) return h;
                }
                return - 1;
            },
            bind: function(f, g) {
                return function() {
                    return f.apply(g, arguments);
                };
            },
            createClass: function(f) {
                var g = f.$,
                h = f.base,
                i = f.privates || f._,
                j = f.proto,
                k = f.statics;
                if (i) {
                    var l = g;
                    g = function() {
                        var p = this;
                        var m = p._ || (p._ = {});
                        for (var n in i) {
                            var o = i[n];
                            m[n] = typeof o == 'function' ? a.tools.bind(o, p) : o;
                        }
                        l.apply(p, arguments);
                    };
                }
                if (h) {
                    g.prototype = this.prototypedCopy(h.prototype);
                    g.prototype['constructor'] = g;
                    g.prototype.base = function() {
                        this.base = h.prototype.base;
                        h.apply(this, arguments);
                        this.base = arguments.callee;
                    };
                }
                if (j) this.extend(g.prototype, j, true);
                if (k) this.extend(g, k, true);
                return g;
            },
            addFunction: function(f, g) {
                return e.push(function() {
                    f.apply(g || this, arguments);
                }) - 1;
            },
            callFunction: function(f) {
                var g = e[f];
                return g && g.apply(window, Array.prototype.slice.call(arguments, 1));
            },
            cssLength: (function() {
                var f = /^\d+(?:\.\d+)?$/;
                return function(g) {
                    return g + (f.test(g) ? 'px': '');
                };
            })(),
            repeat: function(f, g) {
                return new Array(g + 1).join(f);
            },
            tryThese: function() {
                var f;
                for (var g = 0, h = arguments.length; g < h; g++) {
                    var i = arguments[g];
                    try {
                        f = i();
                        break;
                    } catch(j) {}
                }
                return f;
            }
        };
    })();
    var e = a.tools;
    a.dtd = (function() {
        var f = e.extend,
        g = {
            isindex: 1,
            fieldset: 1
        },
        h = {
            input: 1,
            button: 1,
            select: 1,
            textarea: 1,
            label: 1
        },
        i = f({
            a: 1
        },
        h),
        j = f({
            iframe: 1
        },
        i),
        k = {
            hr: 1,
            ul: 1,
            menu: 1,
            div: 1,
            blockquote: 1,
            noscript: 1,
            table: 1,
            center: 1,
            address: 1,
            dir: 1,
            pre: 1,
            h5: 1,
            dl: 1,
            h4: 1,
            noframes: 1,
            h6: 1,
            ol: 1,
            h1: 1,
            h3: 1,
            h2: 1
        },
        l = {
            ins: 1,
            del: 1,
            script: 1
        },
        m = f({
            b: 1,
            acronym: 1,
            bdo: 1,
            'var': 1,
            '#': 1,
            abbr: 1,
            code: 1,
            br: 1,
            i: 1,
            cite: 1,
            kbd: 1,
            u: 1,
            strike: 1,
            s: 1,
            tt: 1,
            strong: 1,
            q: 1,
            samp: 1,
            em: 1,
            dfn: 1,
            span: 1
        },
        l),
        n = f({
            sub: 1,
            img: 1,
            object: 1,
            sup: 1,
            basefont: 1,
            map: 1,
            applet: 1,
            font: 1,
            big: 1,
            small: 1
        },
        m),
        o = f({
            p: 1
        },
        n),
        p = f({
            iframe: 1
        },
        n, h),
        q = {
            img: 1,
            noscript: 1,
            br: 1,
            kbd: 1,
            center: 1,
            button: 1,
            basefont: 1,
            h5: 1,
            h4: 1,
            samp: 1,
            h6: 1,
            ol: 1,
            h1: 1,
            h3: 1,
            h2: 1,
            form: 1,
            font: 1,
            '#': 1,
            select: 1,
            menu: 1,
            ins: 1,
            abbr: 1,
            label: 1,
            code: 1,
            table: 1,
            script: 1,
            cite: 1,
            input: 1,
            iframe: 1,
            strong: 1,
            textarea: 1,
            noframes: 1,
            big: 1,
            small: 1,
            span: 1,
            hr: 1,
            sub: 1,
            bdo: 1,
            'var': 1,
            div: 1,
            object: 1,
            sup: 1,
            strike: 1,
            dir: 1,
            map: 1,
            dl: 1,
            applet: 1,
            del: 1,
            isindex: 1,
            fieldset: 1,
            ul: 1,
            b: 1,
            acronym: 1,
            a: 1,
            blockquote: 1,
            i: 1,
            u: 1,
            s: 1,
            tt: 1,
            address: 1,
            q: 1,
            pre: 1,
            p: 1,
            em: 1,
            dfn: 1
        },
        r = f({
            a: 1
        },
        p),
        s = {
            tr: 1
        },
        t = {
            '#': 1
        },
        u = f({
            param: 1
        },
        q),
        v = f({
            form: 1
        },
        g, j, k, o),
        w = {
            li: 1
        },
        x = {
            style: 1,
            script: 1
        },
        y = {
            base: 1,
            link: 1,
            meta: 1,
            title: 1
        },
        z = f(y, x),
        A = {
            head: 1,
            body: 1
        },
        B = {
            html: 1
        },
        C = {
            address: 1,
            blockquote: 1,
            center: 1,
            dir: 1,
            div: 1,
            dl: 1,
            fieldset: 1,
            form: 1,
            h1: 1,
            h2: 1,
            h3: 1,
            h4: 1,
            h5: 1,
            h6: 1,
            hr: 1,
            isindex: 1,
            menu: 1,
            noframes: 1,
            ol: 1,
            p: 1,
            pre: 1,
            table: 1,
            ul: 1
        };
        return {
            $nonBodyContent: f(B, A, y),
            $block: C,
            $blockLimit: {
                body: 1,
                div: 1,
                td: 1,
                th: 1,
                caption: 1,
                form: 1
            },
            $inline: r,
            $body: f({
                script: 1,
                style: 1
            },
            C),
            $cdata: {
                script: 1,
                style: 1
            },
            $empty: {
                area: 1,
                base: 1,
                br: 1,
                col: 1,
                hr: 1,
                img: 1,
                input: 1,
                link: 1,
                meta: 1,
                param: 1
            },
            $listItem: {
                dd: 1,
                dt: 1,
                li: 1
            },
            $list: {
                ul: 1,
                ol: 1,
                dl: 1
            },
            $nonEditable: {
                applet: 1,
                button: 1,
                embed: 1,
                iframe: 1,
                map: 1,
                object: 1,
                option: 1,
                script: 1,
                textarea: 1,
                param: 1
            },
            $removeEmpty: {
                abbr: 1,
                acronym: 1,
                address: 1,
                b: 1,
                bdo: 1,
                big: 1,
                cite: 1,
                code: 1,
                del: 1,
                dfn: 1,
                em: 1,
                font: 1,
                i: 1,
                ins: 1,
                label: 1,
                kbd: 1,
                q: 1,
                s: 1,
                samp: 1,
                small: 1,
                span: 1,
                strike: 1,
                strong: 1,
                sub: 1,
                sup: 1,
                tt: 1,
                u: 1,
                'var': 1
            },
            $tabIndex: {
                a: 1,
                area: 1,
                button: 1,
                input: 1,
                object: 1,
                select: 1,
                textarea: 1
            },
            $tableContent: {
                caption: 1,
                col: 1,
                colgroup: 1,
                tbody: 1,
                td: 1,
                tfoot: 1,
                th: 1,
                thead: 1,
                tr: 1
            },
            html: A,
            head: z,
            style: t,
            script: t,
            body: v,
            base: {},
            link: {},
            meta: {},
            title: t,
            col: {},
            tr: {
                td: 1,
                th: 1
            },
            img: {},
            colgroup: {
                col: 1
            },
            noscript: v,
            td: v,
            br: {},
            th: v,
            center: v,
            kbd: r,
            button: f(o, k),
            basefont: {},
            h5: r,
            h4: r,
            samp: r,
            h6: r,
            ol: w,
            h1: r,
            h3: r,
            option: t,
            h2: r,
            form: f(g, j, k, o),
            select: {
                optgroup: 1,
                option: 1
            },
            font: r,
            ins: r,
            menu: w,
            abbr: r,
            label: r,
            table: {
                thead: 1,
                col: 1,
                tbody: 1,
                tr: 1,
                colgroup: 1,
                caption: 1,
                tfoot: 1
            },
            code: r,
            script: t,
            tfoot: s,
            cite: r,
            li: v,
            input: {},
            iframe: v,
            strong: r,
            textarea: t,
            noframes: v,
            big: r,
            small: r,
            span: r,
            hr: {},
            dt: r,
            sub: r,
            optgroup: {
                option: 1
            },
            param: {},
            bdo: r,
            'var': r,
            div: v,
            object: u,
            sup: r,
            dd: v,
            strike: r,
            area: {},
            dir: w,
            map: f({
                area: 1,
                form: 1,
                p: 1
            },
            g, l, k),
            applet: u,
            dl: {
                dt: 1,
                dd: 1
            },
            del: r,
            isindex: {},
            fieldset: f({
                legend: 1
            },
            q),
            thead: s,
            ul: w,
            acronym: r,
            b: r,
            a: p,
            blockquote: v,
            caption: r,
            i: r,
            u: r,
            tbody: s,
            s: r,
            address: f(j, o),
            tt: r,
            legend: r,
            q: r,
            pre: f(m, i),
            p: r,
            em: r,
            dfn: r
        };
    })();
    var f = a.dtd;
    d.event = function(g) {
        this.$ = g;
    };
    d.event.prototype = {
        getKey: function() {
            return this.$.keyCode || this.$.which;
        },
        getKeystroke: function() {
            var h = this;
            var g = h.getKey();
            if (h.$.ctrlKey || h.$.metaKey) g += 1000;
            if (h.$.shiftKey) g += 2000;
            if (h.$.altKey) g += 4000;
            return g;
        },
        preventDefault: function(g) {
            var h = this.$;
            if (h.preventDefault) h.preventDefault();
            else h.returnValue = false;
            if (g) this.stopPropagation();
        },
        stopPropagation: function() {
            var g = this.$;
            if (g.stopPropagation) g.stopPropagation();
            else g.cancelBubble = true;
        },
        getTarget: function() {
            var g = this.$.target || this.$.srcElement;
            return g ? new d.node(g) : null;
        }
    };
    a.CTRL = 1000;
    a.SHIFT = 2000;
    a.ALT = 4000;
    d.domObject = function(g) {
        if (g) this.$ = g;
    };
    d.domObject.prototype = (function() {
        var g = function(h, i) {
            return function(j) {
                if (typeof a != 'undefined') h.fire(i, new d.event(j));
            };
        };
        return {
            getPrivate: function() {
                var h;
                if (! (h = this.getCustomData('_'))) this.setCustomData('_', h = {});
                return h;
            },
            on: function(h) {
                var k = this;
                var i = k.getCustomData('_cke_nativeListeners');
                if (!i) {
                    i = {};
                    k.setCustomData('_cke_nativeListeners', i);
                }
                if (!i[h]) {
                    var j = i[h] = g(k, h);
                    if (k.$.addEventListener) k.$.addEventListener(h, j, !!a.event.useCapture);
                    else if (k.$.attachEvent) k.$.attachEvent('on' + h, j);
                }
                return a.event.prototype.on.apply(k, arguments);
            },
            removeListener: function(h) {
                var k = this;
                a.event.prototype.removeListener.apply(k, arguments);
                if (!k.hasListeners(h)) {
                    var i = k.getCustomData('_cke_nativeListeners'),
                    j = i && i[h];
                    if (j) {
                        if (k.$.removeEventListener) k.$.removeEventListener(h, j, false);
                        else if (k.$.detachEvent) k.$.detachEvent('on' + h, j);
                        delete i[h];
                    }
                }
            }
        };
    })();
    (function(g) {
        var h = {};
        g.equals = function(i) {
            return i && i.$ === this.$;
        };
        g.setCustomData = function(i, j) {
            var k = this.getUniqueId(),
            l = h[k] || (h[k] = {});
            l[i] = j;
            return this;
        };
        g.getCustomData = function(i) {
            var j = this.$._cke_expando,
            k = j && h[j];
            return k && k[i];
        };
        g.removeCustomData = function(i) {
            var j = this.$._cke_expando,
            k = j && h[j],
            l = k && k[i];
            if (typeof l != 'undefined') delete k[i];
            return l || null;
        };
        g.getUniqueId = function() {
            return this.$._cke_expando || (this.$._cke_expando = e.getNextNumber());
        };
        a.event.implementOn(g);
    })(d.domObject.prototype);
    d.window = function(g) {
        d.domObject.call(this, g);
    };
    d.window.prototype = new d.domObject();
    e.extend(d.window.prototype, {
        focus: function() {
            if (b.webkit && this.$.parent) this.$.parent.focus();
            this.$.focus();
        },
        getViewPaneSize: function() {
            var g = this.$.document,
            h = g.compatMode == 'CSS1Compat';
            return {
                width: (h ? g.documentElement.clientWidth: g.body.clientWidth) || 0,
                height: (h ? g.documentElement.clientHeight: g.body.clientHeight) || 0
            };
        },
        getScrollPosition: function() {
            var g = this.$;
            if ('pageXOffset' in g) return {
                x: g.pageXOffset || 0,
                y: g.pageYOffset || 0
            };
            else {
                var h = g.document;
                return {
                    x: h.documentElement.scrollLeft || h.body.scrollLeft || 0,
                    y: h.documentElement.scrollTop || h.body.scrollTop || 0
                };
            }
        }
    });
    d.document = function(g) {
        d.domObject.call(this, g);
    };
    var g = d.document;
    g.prototype = new d.domObject();
    e.extend(g.prototype, {
        appendStyleSheet: function(h) {
            if (this.$.createStyleSheet) this.$.createStyleSheet(h);
            else {
                var i = new d.element('link');
                i.setAttributes({
                    rel: 'stylesheet',
                    type: 'text/css',
                    href: h
                });
                this.getHead().append(i);
            }
        },
        appendStyleText: function(h) {
            var k = this;
            if (k.$.createStyleSheet) {
                var i = k.$.createStyleSheet('');
                i.cssText = h;
            } else {
                var j = new d.element('style', k);
                j.append(new d.text(h, k));
                k.getHead().append(j);
            }
        },
        createElement: function(h, i) {
            var j = new d.element(h, this);
            if (i) {
                if (i.attributes) j.setAttributes(i.attributes);
                if (i.styles) j.setStyles(i.styles);
            }
            return j;
        },
        createText: function(h) {
            return new d.text(h, this);
        },
        focus: function() {
            this.getWindow().focus();
        },
        getById: function(h) {
            var i = this.$.getElementById(h);
            return i ? new d.element(i) : null;
        },
        getByAddress: function(h, i) {
            var j = this.$.documentElement;
            for (var k = 0; j && k < h.length; k++) {
                var l = h[k];
                if (!i) {
                    j = j.childNodes[l];
                    continue;
                }
                var m = -1;
                for (var n = 0; n < j.childNodes.length; n++) {
                    var o = j.childNodes[n];
                    if (i === true && o.nodeType == 3 && o.previousSibling && o.previousSibling.nodeType == 3) continue;
                    m++;
                    if (m == l) {
                        j = o;
                        break;
                    }
                }
            }
            return j ? new d.node(j) : null;
        },
        getElementsByTag: function(h, i) {
            if (!c && i) h = i + ':' + h;
            return new d.nodeList(this.$.getElementsByTagName(h));
        },
        getHead: function() {
            var h = this.$.getElementsByTagName('head')[0];
            h = new d.element(h);
            return (this.getHead = function() {
                return h;
            })();
        },
        getBody: function() {
            var h = new d.element(this.$.body);
            return (this.getBody = function() {
                return h;
            })();
        },
        getDocumentElement: function() {
            var h = new d.element(this.$.documentElement);
            return (this.getDocumentElement = function() {
                return h;
            })();
        },
        getWindow: function() {
            var h = new d.window(this.$.parentWindow || this.$.defaultView);
            return (this.getWindow = function() {
                return h;
            })();
        }
    });
    d.node = function(h) {
        if (h) {
            switch (h.nodeType) {
            case 1:
                return new d.element(h);
            case 3:
                return new d.text(h);
            }
            d.domObject.call(this, h);
        }
        return this;
    };
    d.node.prototype = new d.domObject();
    a.NODE_ELEMENT = 1;
    a.NODE_TEXT = 3;
    a.NODE_COMMENT = 8;
    a.NODE_DOCUMENT_FRAGMENT = 11;
    a.POSITION_IDENTICAL = 0;
    a.POSITION_DISCONNECTED = 1;
    a.POSITION_FOLLOWING = 2;
    a.POSITION_PRECEDING = 4;
    a.POSITION_IS_CONTAINED = 8;
    a.POSITION_CONTAINS = 16;
    e.extend(d.node.prototype, {
        appendTo: function(h, i) {
            h.append(this, i);
            return h;
        },
        clone: function(h, i) {
            var j = this.$.cloneNode(h);
            if (!i) {
                var k = function(l) {
                    if (l.nodeType != 1) return;
                    l.removeAttribute('id', false);
                    l.removeAttribute('_cke_expando', false);
                    var m = l.childNodes;
                    for (var n = 0; n < m.length; n++) k(m[n]);
                };
                k(j);
            }
            return new d.node(j);
        },
        hasPrevious: function() {
            return !! this.$.previousSibling;
        },
        hasNext: function() {
            return !! this.$.nextSibling;
        },
        insertAfter: function(h) {
            h.$.parentNode.insertBefore(this.$, h.$.nextSibling);
            return h;
        },
        insertBefore: function(h) {
            h.$.parentNode.insertBefore(this.$, h.$);
            return h;
        },
        insertBeforeMe: function(h) {
            this.$.parentNode.insertBefore(h.$, this.$);
            return h;
        },
        getAddress: function(h) {
            var i = [],
            j = this.getDocument().$.documentElement,
            k = this.$;
            while (k && k != j) {
                var l = k.parentNode,
                m = -1;
                for (var n = 0; n < l.childNodes.length; n++) {
                    var o = l.childNodes[n];
                    if (h && o.nodeType == 3 && o.previousSibling && o.previousSibling.nodeType == 3) continue;
                    m++;
                    if (o == k) break;
                }
                i.unshift(m);
                k = k.parentNode;
            }
            return i;
        },
        getDocument: function() {
            var h = new g(this.$.ownerDocument || this.$.parentNode.ownerDocument);
            return (this.getDocument = function() {
                return h;
            })();
        },
        getIndex: function() {
            var h = this.$,
            i = h.parentNode && h.parentNode.firstChild,
            j = -1;
            while (i) {
                j++;
                if (i == h) return j;
                i = i.nextSibling;
            }
            return - 1;
        },
        getNextSourceNode: function(h, i, j) {
            if (j && !j.call) {
                var k = j;
                j = function(n) {
                    return ! n.equals(k);
                };
            }
            var l = !h && this.getFirst && this.getFirst(),
            m;
            if (!l) {
                if (this.type == 1 && j && j(this, true) === false) return null;
                l = this.getNext();
            }
            while (!l && (m = (m || this).getParent())) {
                if (j && j(m, true) === false) return null;
                l = m.getNext();
            }
            if (!l) return null;
            if (j && j(l) === false) return null;
            if (i && i != l.type) return l.getNextSourceNode(false, i, j);
            return l;
        },
        getPreviousSourceNode: function(h, i, j) {
            if (j && !j.call) {
                var k = j;
                j = function(n) {
                    return ! n.equals(k);
                };
            }
            var l = !h && this.getLast && this.getLast(),
            m;
            if (!l) {
                if (this.type == 1 && j && j(this, true) === false) return null;
                l = this.getPrevious();
            }
            while (!l && (m = (m || this).getParent())) {
                if (j && j(m, true) === false) return null;
                l = m.getPrevious();
            }
            if (!l) return null;
            if (j && j(l) === false) return null;
            if (i && l.type != i) return l.getPreviousSourceNode(false, i, j);
            return l;
        },
        getPrevious: function(h) {
            var i = this.$,
            j;
            do {
                i = i.previousSibling;
                j = i && new d.node(i);
            } while ( j && h && ! h ( j )) return j;
        },
        getNext: function(h) {
            var i = this.$,
            j;
            do {
                i = i.nextSibling;
                j = i && new d.node(i);
            } while ( j && h && ! h ( j )) return j;
        },
        getParent: function() {
            var h = this.$.parentNode;
            return h && h.nodeType == 1 ? new d.node(h) : null;
        },
        getParents: function(h) {
            var i = this,
            j = [];
            do j[h ? 'push': 'unshift'](i);
            while (i = i.getParent()) return j;
        },
        getCommonAncestor: function(h) {
            var j = this;
            if (h.equals(j)) return j;
            if (h.contains && h.contains(j)) return h;
            var i = j.contains ? j: j.getParent();
            do {
                if (i.contains(h)) return i;
            } while ( i = i . getParent ()) return null;
        },
        getPosition: function(h) {
            var i = this.$,
            j = h.$;
            if (i.compareDocumentPosition) return i.compareDocumentPosition(j);
            if (i == j) return 0;
            if (this.type == 1 && h.type == 1) {
                if (i.contains) {
                    if (i.contains(j)) return 16 + 4;
                    if (j.contains(i)) return 8 + 2;
                }
                if ('sourceIndex' in i) return i.sourceIndex < 0 || j.sourceIndex < 0 ? 1 : i.sourceIndex < j.sourceIndex ? 4 : 2;
            }
            var k = this.getAddress(),
            l = h.getAddress(),
            m = Math.min(k.length, l.length);
            for (var n = 0; n <= m - 1; n++) {
                if (k[n] != l[n]) {
                    if (n < m) return k[n] < l[n] ? 4 : 2;
                    break;
                }
            }
            return k.length < l.length ? 16 + 4 : 8 + 2;
        },
        getAscendant: function(h, i) {
            var j = this.$;
            if (!i) j = j.parentNode;
            while (j) {
                if (j.nodeName && j.nodeName.toLowerCase() == h) return new d.node(j);
                j = j.parentNode;
            }
            return null;
        },
        hasAscendant: function(h, i) {
            var j = this.$;
            if (!i) j = j.parentNode;
            while (j) {
                if (j.nodeName && j.nodeName.toLowerCase() == h) return true;
                j = j.parentNode;
            }
            return false;
        },
        move: function(h, i) {
            h.append(this.remove(), i);
        },
        remove: function(h) {
            var i = this.$,
            j = i.parentNode;
            if (j) {
                if (h) for (var k; k = i.firstChild;) j.insertBefore(i.removeChild(k), i);
                j.removeChild(i);
            }
            return this;
        },
        replace: function(h) {
            this.insertBefore(h);
            h.remove();
        },
        trim: function() {
            this.ltrim();
            this.rtrim();
        },
        ltrim: function() {
            var k = this;
            var h;
            while (k.getFirst && (h = k.getFirst())) {
                if (h.type == 3) {
                    var i = e.ltrim(h.getText()),
                    j = h.getLength();
                    if (!i) {
                        h.remove();
                        continue;
                    } else if (i.length < j) {
                        h.split(j - i.length);
                        k.$.removeChild(k.$.firstChild);
                    }
                }
                break;
            }
        },
        rtrim: function() {
            var k = this;
            var h;
            while (k.getLast && (h = k.getLast())) {
                if (h.type == 3) {
                    var i = e.rtrim(h.getText()),
                    j = h.getLength();
                    if (!i) {
                        h.remove();
                        continue;
                    } else if (i.length < j) {
                        h.split(i.length);
                        k.$.lastChild.parentNode.removeChild(k.$.lastChild);
                    }
                }
                break;
            }
            if (!c && !b.opera) {
                h = k.$.lastChild;
                if (h && h.type == 1 && h.nodeName.toLowerCase() == 'br') h.parentNode.removeChild(h);
            }
        }
    });
    d.nodeList = function(h) {
        this.$ = h;
    };
    d.nodeList.prototype = {
        count: function() {
            return this.$.length;
        },
        getItem: function(h) {
            var i = this.$[h];
            return i ? new d.node(i) : null;
        }
    };
    d.element = function(h, i) {
        if (typeof h == 'string') h = (i ? i.$: document).createElement(h);
        d.domObject.call(this, h);
    };
    var h = d.element;
    h.get = function(i) {
        return i && (i.$ ? i: new h(i));
    };
    h.prototype = new d.node();
    h.createFromHtml = function(i, j) {
        var k = new h('div', j);
        k.setHtml(i);
        return k.getFirst().remove();
    };
    h.setMarker = function(i, j, k, l) {
        var m = j.getCustomData('list_marker_id') || j.setCustomData('list_marker_id', e.getNextNumber()).getCustomData('list_marker_id'),
        n = j.getCustomData('list_marker_names') || j.setCustomData('list_marker_names', {}).getCustomData('list_marker_names');
        i[m] = j;
        n[k] = 1;
        return j.setCustomData(k, l);
    };
    h.clearAllMarkers = function(i) {
        for (var j in i) h.clearMarkers(i, i[j], true);
    };
    h.clearMarkers = function(i, j, k) {
        var l = j.getCustomData('list_marker_names'),
        m = j.getCustomData('list_marker_id');
        for (var n in l) j.removeCustomData(n);
        j.removeCustomData('list_marker_names');
        if (k) {
            j.removeCustomData('list_marker_id');
            delete i[m];
        }
    };
    e.extend(h.prototype, {
        type: 1,
        addClass: function(i) {
            var j = this.$.className;
            if (j) {
                var k = new RegExp('(?:^|\\s)' + i + '(?:\\s|$)', '');
                if (!k.test(j)) j += ' ' + i;
            }
            this.$.className = j || i;
        },
        removeClass: function(i) {
            var j = this.getAttribute('class');
            if (j) {
                var k = new RegExp('(?:^|\\s+)' + i + '(?=\\s|$)', 'i');
                if (k.test(j)) {
                    j = j.replace(k, '').replace(/^\s+/, '');
                    if (j) this.setAttribute('class', j);
                    else this.removeAttribute('class');
                }
            }
        },
        hasClass: function(i) {
            var j = new RegExp('(?:^|\\s+)' + i + '(?=\\s|$)', '');
            return j.test(this.getAttribute('class'));
        },
        append: function(i, j) {
            var k = this;
            if (typeof i == 'string') i = k.getDocument().createElement(i);
            if (j) k.$.insertBefore(i.$, k.$.firstChild);
            else k.$.appendChild(i.$);
            return i;
        },
        appendHtml: function(i) {
            var k = this;
            if (!k.$.childNodes.length) k.setHtml(i);
            else {
                var j = new h('div', k.getDocument());
                j.setHtml(i);
                j.moveChildren(k);
            }
        },
        appendText: function(i) {
            if (this.$.text != undefined) this.$.text += i;
            else this.append(new d.text(i));
        },
        appendBogus: function() {
            var j = this;
            var i = j.getLast();
            while (i && i.type == 3 && !e.rtrim(i.getText())) i = i.getPrevious();
            if (!i || !i.is || !i.is('br')) j.append(b.opera ? j.getDocument().createText('') : j.getDocument().createElement('br'));
        },
        breakParent: function(i) {
            var l = this;
            var j = new d.range(l.getDocument());
            j.setStartAfter(l);
            j.setEndAfter(i);
            var k = j.extractContents();
            j.insertNode(l.remove());
            k.insertAfterNode(l);
        },
        contains: c || b.webkit ?
        function(i) {
            var j = this.$;
            return i.type != 1 ? j.contains(i.getParent().$) : j != i.$ && j.contains(i.$);
        }: function(i) {
            return !! (this.$.compareDocumentPosition(i.$) & 16);
        },
        focus: function() {
            try {
                this.$.focus();
            } catch(i) {}
        },
        getHtml: function() {
            var i = this.$.innerHTML;
            return c ? i.replace(/<\?[^>]*>/g, '') : i;
        },
        getOuterHtml: function() {
            var j = this;
            if (j.$.outerHTML) return j.$.outerHTML.replace(/<\?[^>]*>/, '');
            var i = j.$.ownerDocument.createElement('div');
            i.appendChild(j.$.cloneNode(true));
            return i.innerHTML;
        },
        setHtml: function(i) {
            return this.$.innerHTML = i;
        },
        setText: function(i) {
            h.prototype.setText = this.$.innerText != undefined ?
            function(j) {
                return this.$.innerText = j;
            }: function(j) {
                return this.$.textContent = j;
            };
            return this.setText(i);
        },
        getAttribute: (function() {
            var i = function(j) {
                return this.$.getAttribute(j, 2);
            };
            if (c && (b.ie7Compat || b.ie6Compat)) return function(j) {
                var n = this;
                switch (j) {
                case 'class':
                    j = 'className';
                    break;
                case 'tabindex':
                    var k = i.call(n, j);
                    if (k !== 0 && n.$.tabIndex === 0) k = null;
                    return k;
                    break;
                case 'checked':
                    var l = n.$.attributes.getNamedItem(j),
                    m = l.specified ? l.nodeValue: n.$.checked;
                    return m ? 'checked': null;
                case 'hspace':
                    return n.$.hspace;
                case 'style':
                    return n.$.style.cssText;
                }
                return i.call(n, j);
            };
            else return i;
        })(),
        getChildren: function() {
            return new d.nodeList(this.$.childNodes);
        },
        getComputedStyle: c ?
        function(i) {
            return this.$.currentStyle[e.cssStyleToDomStyle(i)];
        }: function(i) {
            return this.getWindow().$.getComputedStyle(this.$, '').getPropertyValue(i);
        },
        getDtd: function() {
            var i = f[this.getName()];
            this.getDtd = function() {
                return i;
            };
            return i;
        },
        getElementsByTag: g.prototype.getElementsByTag,
        getTabIndex: c ?
        function() {
            var i = this.$.tabIndex;
            if (i === 0 && !f.$tabIndex[this.getName()] && parseInt(this.getAttribute('tabindex'), 10) !== 0) i = -1;
            return i;
        }: b.webkit ?
        function() {
            var i = this.$.tabIndex;
            if (i == undefined) {
                i = parseInt(this.getAttribute('tabindex'), 10);
                if (isNaN(i)) i = -1;
            }
            return i;
        }: function() {
            return this.$.tabIndex;
        },
        getText: function() {
            return this.$.textContent || this.$.innerText || '';
        },
        getWindow: function() {
            return this.getDocument().getWindow();
        },
        getId: function() {
            return this.$.id || null;
        },
        getNameAtt: function() {
            return this.$.name || null;
        },
        getName: function() {
            var i = this.$.nodeName.toLowerCase();
            if (c) {
                var j = this.$.scopeName;
                if (j != 'HTML') i = j.toLowerCase() + ':' + i;
            }
            return (this.getName = function() {
                return i;
            })();
        },
        getValue: function() {
            return this.$.value;
        },
        getFirst: function(i) {
            var j = this.$.firstChild,
            k = j && new d.node(j);
            if (k && i && !i(k)) k = k.getNext(i);
            return k;
        },
        getLast: function(i) {
            var j = this.$.lastChild,
            k = j && new d.node(j);
            if (k && i && !i(k)) k = k.getPrevious(i);
            return k;
        },
        getStyle: function(i) {
            return this.$.style[e.cssStyleToDomStyle(i)];
        },
        is: function() {
            var i = this.getName();
            for (var j = 0; j < arguments.length; j++) {
                if (arguments[j] == i) return true;
            }
            return false;
        },
        isEditable: function() {
            var i = this.getName(),
            j = !f.$nonEditable[i] && (f[i] || f.span);
            return j && j['#'];
        },
        isIdentical: function(i) {
            if (this.getName() != i.getName()) return false;
            var j = this.$.attributes,
            k = i.$.attributes,
            l = j.length,
            m = k.length;
            if (!c && l != m) return false;
            for (var n = 0; n < l; n++) {
                var o = j[n];
                if ((!c || o.specified && o.nodeName != '_cke_expando') && o.nodeValue != i.getAttribute(o.nodeName)) return false;
            }
            if (c) for (n = 0; n < m; n++) {
                o = k[n];
                if (o.specified && o.nodeName != '_cke_expando' && o.nodeValue != this.getAttribute(o.nodeName)) return false;
            }
            return true;
        },
        isVisible: function() {
            var i = !!this.$.offsetHeight && this.getComputedStyle('visibility') != 'hidden',
            j,
            k;
            if (i && (b.webkit || b.opera)) {
                j = this.getWindow();
                if (!j.equals(a.document.getWindow()) && (k = j.$.frameElement)) i = new h(k).isVisible();
            }
            return i;
        },
        hasAttributes: c && (b.ie7Compat || b.ie6Compat) ?
        function() {
            var i = this.$.attributes;
            for (var j = 0; j < i.length; j++) {
                var k = i[j];
                switch (k.nodeName) {
                case 'class':
                    if (this.getAttribute('class')) return true;
                case '_cke_expando':
                    continue;
                default:
                    if (k.specified) return true;
                }
            }
            return false;
        }:
        function() {
            var i = this.$.attributes;
            return i.length > 1 || i.length == 1 && i[0].nodeName != '_cke_expando';
        },
        hasAttribute: function(i) {
            var j = this.$.attributes.getNamedItem(i);
            return !! (j && j.specified);
        },
        hide: function() {
            this.setStyle('display', 'none');
        },
        moveChildren: function(i, j) {
            var k = this.$;
            i = i.$;
            if (k == i) return;
            var l;
            if (j) while (l = k.lastChild) i.insertBefore(k.removeChild(l), i.firstChild);
            else while (l = k.firstChild) i.appendChild(k.removeChild(l));
        },
        show: function() {
            this.setStyles({
                display: '',
                visibility: ''
            });
        },
        setAttribute: (function() {
            var i = function(j, k) {
                this.$.setAttribute(j, k);
                return this;
            };
            if (c && (b.ie7Compat || b.ie6Compat)) return function(j, k) {
                var l = this;
                if (j == 'class') l.$.className = k;
                else if (j == 'style') l.$.style.cssText = k;
                else if (j == 'tabindex') l.$.tabIndex = k;
                else if (j == 'checked') l.$.checked = k;
                else i.apply(l, arguments);
                return l;
            };
            else return i;
        })(),
        setAttributes: function(i) {
            for (var j in i) this.setAttribute(j, i[j]);
            return this;
        },
        setValue: function(i) {
            this.$.value = i;
            return this;
        },
        removeAttribute: (function() {
            var i = function(j) {
                this.$.removeAttribute(j);
            };
            if (c && (b.ie7Compat || b.ie6Compat)) return function(j) {
                if (j == 'class') j = 'className';
                else if (j == 'tabindex') j = 'tabIndex';
                i.call(this, j);
            };
            else return i;
        })(),
        removeAttributes: function(i) {
            for (var j = 0; j < i.length; j++) this.removeAttribute(i[j]);
        },
        removeStyle: function(i) {
            var j = this;
            j.setStyle(i, '');
            if (j.$.style.removeAttribute) j.$.style.removeAttribute(e.cssStyleToDomStyle(i));
            if (!j.$.style.cssText) j.removeAttribute('style');
        },
        setStyle: function(i, j) {
            this.$.style[e.cssStyleToDomStyle(i)] = j;
            return this;
        },
        setStyles: function(i) {
            for (var j in i) this.setStyle(j, i[j]);
            return this;
        },
        setOpacity: function(i) {
            if (c) {
                i = Math.round(i * 100);
                this.setStyle('filter', i >= 100 ? '': 'progid:DXImageTransform.Microsoft.Alpha(opacity=' + i + ')');
            } else this.setStyle('opacity', i);
        },
        unselectable: b.gecko ?
        function() {
            this.$.style.MozUserSelect = 'none';
        }: b.webkit ?
        function() {
            this.$.style.KhtmlUserSelect = 'none';
        }: function() {
            if (c || b.opera) {
                var i = this.$,
                j, k = 0;
                i.unselectable = 'on';
                while (j = i.all[k++]) switch (j.tagName.toLowerCase()) {
                case 'iframe':
                case 'textarea':
                case 'input':
                case 'select':
                    break;
                default:
                    j.unselectable = 'on';
                }
            }
        },
        getPositionedAncestor: function() {
            var i = this;
            while (i.getName() != 'html') {
                if (i.getComputedStyle('position') != 'static') return i;
                i = i.getParent();
            }
            return null;
        },
        getDocumentPosition: function(i) {
            var D = this;
            var j = 0,
            k = 0,
            l = D.getDocument().getBody(),
            m = D.getDocument().$.compatMode == 'BackCompat',
            n = D.getDocument();
            if (document.documentElement.getBoundingClientRect) {
                var o = D.$.getBoundingClientRect(),
                p = n.$,
                q = p.documentElement,
                r = q.clientTop || l.$.clientTop || 0,
                s = q.clientLeft || l.$.clientLeft || 0,
                t = true;
                if (c) {
                    var u = n.getDocumentElement().contains(D),
                    v = n.getBody().contains(D);
                    t = m && v || !m && u;
                }
                if (t) {
                    j = o.left + (!m && q.scrollLeft || l.$.scrollLeft);
                    j -= s;
                    k = o.top + (!m && q.scrollTop || l.$.scrollTop);
                    k -= r;
                }
            } else {
                var w = D,
                x = null,
                y;
                while (w && !(w.getName() == 'body' || w.getName() == 'html')) {
                    j += w.$.offsetLeft - w.$.scrollLeft;
                    k += w.$.offsetTop - w.$.scrollTop;
                    if (!w.equals(D)) {
                        j += w.$.clientLeft || 0;
                        k += w.$.clientTop || 0;
                    }
                    var z = x;
                    while (z && !z.equals(w)) {
                        j -= z.$.scrollLeft;
                        k -= z.$.scrollTop;
                        z = z.getParent();
                    }
                    x = w;
                    w = (y = w.$.offsetParent) ? new h(y) : null;
                }
            }
            if (i) {
                var A = D.getWindow(),
                B = i.getWindow();
                if (!A.equals(B) && A.$.frameElement) {
                    var C = new h(A.$.frameElement).getDocumentPosition(i);
                    j += C.x;
                    k += C.y;
                }
            }
            if (!document.documentElement.getBoundingClientRect) if (b.gecko && !m) {
                j += D.$.clientLeft ? 1 : 0;
                k += D.$.clientTop ? 1 : 0;
            }
            return {
                x: j,
                y: k
            };
        },
        scrollIntoView: function(i) {
            var o = this;
            var j = o.getWindow(),
            k = j.getViewPaneSize().height,
            l = k * -1;
            if (i) l += k;
            else {
                l += o.$.offsetHeight || 0;
                l += parseInt(o.getComputedStyle('marginBottom') || 0, 10) || 0;
            }
            var m = o.getDocumentPosition();
            l += m.y;
            l = l < 0 ? 0 : l;
            var n = j.getScrollPosition().y;
            if (l > n || l < n - k) j.$.scrollTo(0, l);
        },
        setState: function(i) {
            var j = this;
            switch (i) {
            case 1:
                j.addClass('cke_on');
                j.removeClass('cke_off');
                j.removeClass('cke_disabled');
                break;
            case 0:
                j.addClass('cke_disabled');
                j.removeClass('cke_off');
                j.removeClass('cke_on');
                break;
            default:
                j.addClass('cke_off');
                j.removeClass('cke_on');
                j.removeClass('cke_disabled');
                break;
            }
        },
        getFrameDocument: function() {
            var i = this.$;
            try {
                i.contentWindow.document;
            } catch(j) {
                i.src = i.src;
                if (c && b.version < 7) window.showModalDialog('javascript:document.write("<script>window.setTimeout(function(){window.close();},50);</script>")');
            }
            return i && new g(i.contentWindow.document);
        },
        copyAttributes: function(i, j) {
            var p = this;
            var k = p.$.attributes;
            j = j || {};
            for (var l = 0; l < k.length; l++) {
                var m = k[l],
                n = m.nodeName.toLowerCase(),
                o;
                if (n in j) continue;
                if (n == 'checked' && (o = p.getAttribute(n))) i.setAttribute(n, o);
                else if (m.specified || c && m.nodeValue && n == 'value') {
                    o = p.getAttribute(n);
                    if (o === null) o = m.nodeValue;
                    i.setAttribute(n, o);
                }
            }
            if (p.$.style.cssText !== '') i.$.style.cssText = p.$.style.cssText;
        },
        renameNode: function(i) {
            var l = this;
            if (l.getName() == i) return;
            var j = l.getDocument(),
            k = new h(i, j);
            l.copyAttributes(k);
            l.moveChildren(k);
            l.$.parentNode.replaceChild(k.$, l.$);
            k.$._cke_expando = l.$._cke_expando;
            l.$ = k.$;
        },
        getChild: function(i) {
            var j = this.$;
            if (!i.slice) j = j.childNodes[i];
            else while (i.length > 0 && j) j = j.childNodes[i.shift()];
            return j ? new d.node(j) : null;
        },
        getChildCount: function() {
            return this.$.childNodes.length;
        },
        disableContextMenu: function() {
            this.on('contextmenu',
            function(i) {
                if (!i.data.getTarget().hasClass('cke_enable_context_menu')) i.data.preventDefault();
            });
        }
    });
    a.command = function(i, j) {
        this.uiItems = [];
        this.exec = function(k) {
            if (this.state == 0) return false;
            if (this.editorFocus) i.focus();
            return j.exec.call(this, i, k) !== false;
        };
        e.extend(this, j, {
            modes: {
                wysiwyg: 1
            },
            editorFocus: true,
            state: 2
        });
        a.event.call(this);
    };
    a.command.prototype = {
        enable: function() {
            var i = this;
            if (i.state == 0) i.setState(!i.preserveState || typeof i.previousState == 'undefined' ? 2 : i.previousState);
        },
        disable: function() {
            this.setState(0);
        },
        setState: function(i) {
            var j = this;
            if (j.state == i) return false;
            j.previousState = j.state;
            j.state = i;
            j.fire('state');
            return true;
        },
        toggleState: function() {
            var i = this;
            if (i.state == 2) i.setState(1);
            else if (i.state == 1) i.setState(2);
        }
    };
    a.event.implementOn(a.command.prototype, true);
    a.ENTER_P = 1;
    a.ENTER_BR = 2;
    a.ENTER_DIV = 3;
    a.config = {
        customConfig: 'config.js',
        autoUpdateElement: true,
        baseHref: '',
        contentsCss: a.basePath + 'contents.css',
        contentsLangDirection: 'ltr',
        language: '',
        defaultLanguage: 'en',
        enterMode: 1,
        shiftEnterMode: 2,
        corePlugins: '',
        docType: '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">',
        bodyId: '',
        bodyClass: '',
        fullPage: false,
        height: 200,
        plugins: 'about,basicstyles,blockquote,button,clipboard,colorbutton,colordialog,contextmenu,div,elementspath,enterkey,entities,filebrowser,find,flash,font,format,forms,horizontalrule,htmldataprocessor,image,indent,justify,keystrokes,link,list,maximize,newpage,pagebreak,pastefromword,pastetext,popup,preview,print,removeformat,resize,save,scayt,smiley,showblocks,showborders,sourcearea,stylescombo,table,tabletools,specialchar,tab,templates,toolbar,undo,wysiwygarea,wsc',
        extraPlugins: '',
        removePlugins: '',
        protectedSource: [],
        tabIndex: 0,
        theme: 'default',
        skin: 'kama',
        width: '',
        baseFloatZIndex: 10000
    };
    var i = a.config;
    a.focusManager = function(j) {
        if (j.focusManager) return j.focusManager;
        this.hasFocus = false;
        this._ = {
            editor: j
        };
        return this;
    };
    a.focusManager.prototype = {
        focus: function() {
            var k = this;
            if (k._.timer) clearTimeout(k._.timer);
            if (!k.hasFocus) {
                if (a.currentInstance) a.currentInstance.focusManager.forceBlur();
                var j = k._.editor;
                j.container.getFirst().addClass('cke_focus');
                k.hasFocus = true;
                j.fire('focus');
            }
        },
        blur: function() {
            var j = this;
            if (j._.timer) clearTimeout(j._.timer);
            j._.timer = setTimeout(function() {
                delete j._.timer;
                j.forceBlur();
            },
            100);
        },
        forceBlur: function() {
            if (this.hasFocus) {
                var j = this._.editor;
                j.container.getFirst().removeClass('cke_focus');
                this.hasFocus = false;
                j.fire('blur');
            }
        }
    };
    (function() {
        var j = {};
        a.lang = {
            languages: {
                af: 1,
                ar: 1,
                bg: 1,
                bn: 1,
                bs: 1,
                ca: 1,
                cs: 1,
                da: 1,
                de: 1,
                el: 1,
                'en-au': 1,
                'en-ca': 1,
                'en-uk': 1,
                en: 1,
                eo: 1,
                es: 1,
                et: 1,
                eu: 1,
                fa: 1,
                fi: 1,
                fo: 1,
                'fr-ca': 1,
                fr: 1,
                gl: 1,
                gu: 1,
                he: 1,
                hi: 1,
                hr: 1,
                hu: 1,
                is: 1,
                it: 1,
                ja: 1,
                km: 1,
                ko: 1,
                lt: 1,
                lv: 1,
                mn: 1,
                ms: 1,
                nb: 1,
                nl: 1,
                no: 1,
                pl: 1,
                'pt-br': 1,
                pt: 1,
                ro: 1,
                ru: 1,
                sk: 1,
                sl: 1,
                'sr-latn': 1,
                sr: 1,
                sv: 1,
                th: 1,
                tr: 1,
                uk: 1,
                vi: 1,
                'zh-cn': 1,
                zh: 1
            },
            load: function(k, l, m) {
                if (!k || !a.lang.languages[k]) k = this.detect(l, k);
                if (!this[k]) a.scriptLoader.load(a.getUrl('lang/' + k + '.js'),
                function() {
                    m(k, this[k]);
                },
                this);
                else m(k, this[k]);
            },
            detect: function(k, l) {
                var m = this.languages;
                l = l || navigator.userLanguage || navigator.language;
                var n = l.toLowerCase().match(/([a-z]+)(?:-([a-z]+))?/),
                o = n[1],
                p = n[2];
                if (m[o + '-' + p]) o = o + '-' + p;
                else if (!m[o]) o = null;
                a.lang.detect = o ?
                function() {
                    return o;
                }: function(q) {
                    return q;
                };
                return o || k;
            }
        };
    })();
    a.scriptLoader = (function() {
        var j = {},
        k = {};
        return {
            load: function(l, m, n, o, p) {
                var q = typeof l == 'string';
                if (q) l = [l];
                if (!n) n = a;
                var r = l.length,
                s = [],
                t = [],
                u = function(z) {
                    if (m) if (q) m.call(n, z);
                    else m.call(n, s, t);
                };
                if (r === 0) {
                    u(true);
                    return;
                }
                var v = function(z, A) { (A ? s: t).push(z);
                    if (--r <= 0) {
                        p && a.document.getDocumentElement().removeStyle('cursor');
                        u(A);
                    }
                },
                w = function(z, A) {
                    j[z] = 1;
                    var B = k[z];
                    delete k[z];
                    for (var C = 0; C < B.length; C++) B[C](z, A);
                },
                x = function(z) {
                    if (o !== true && j[z]) {
                        v(z, true);
                        return;
                    }
                    var A = k[z] || (k[z] = []);
                    A.push(v);
                    if (A.length > 1) return;
                    var B = new h('script');
                    B.setAttributes({
                        type: 'text/javascript',
                        src: z
                    });
                    if (m) if (c) B.$.onreadystatechange = function() {
                        if (B.$.readyState == 'loaded' || B.$.readyState == 'complete') {
                            B.$.onreadystatechange = null;
                            w(z, true);
                        }
                    };
                    else {
                        B.$.onload = function() {
                            setTimeout(function() {
                                w(z, true);
                            },
                            0);
                        };
                        B.$.onerror = function() {
                            w(z, false);
                        };
                    }
                    B.appendTo(a.document.getHead());
                };
                p && a.document.getDocumentElement().setStyle('cursor', 'wait');
                for (var y = 0; y < r; y++) x(l[y]);
            },
            loadCode: function(l) {
                var m = new h('script');
                m.setAttribute('type', 'text/javascript');
                m.appendText(l);
                m.appendTo(a.document.getHead());
            }
        };
    })();
    a.resourceManager = function(j, k) {
        var l = this;
        l.basePath = j;
        l.fileName = k;
        l.registered = {};
        l.loaded = {};
        l.externals = {};
        l._ = {
            waitingList: {}
        };
    };
    a.resourceManager.prototype = {
        add: function(j, k) {
            if (this.registered[j]) throw '[CKEDITOR.resourceManager.add] The resource name "' + j + '" is already registered.';
            a.fire(j + e.capitalize(this.fileName) + 'Ready', this.registered[j] = k || {});
        },
        get: function(j) {
            return this.registered[j] || null;
        },
        getPath: function(j) {
            var k = this.externals[j];
            return a.getUrl(k && k.dir || this.basePath + j + '/');
        },
        getFilePath: function(j) {
            var k = this.externals[j];
            return a.getUrl(this.getPath(j) + (k && k.file || this.fileName + '.js'));
        },
        addExternal: function(j, k, l) {
            j = j.split(',');
            for (var m = 0; m < j.length; m++) {
                var n = j[m];
                this.externals[n] = {
                    dir: k,
                    file: l
                };
            }
        },
        load: function(j, k, l) {
            if (!e.isArray(j)) j = j ? [j] : [];
            var m = this.loaded,
            n = this.registered,
            o = [],
            p = {},
            q = {};
            for (var r = 0; r < j.length; r++) {
                var s = j[r];
                if (!s) continue;
                if (!m[s] && !n[s]) {
                    var t = this.getFilePath(s);
                    o.push(t);
                    if (! (t in p)) p[t] = [];
                    p[t].push(s);
                } else q[s] = this.get(s);
            }
            a.scriptLoader.load(o,
            function(u, v) {
                if (v.length) throw '[CKEDITOR.resourceManager.load] Resource name "' + p[v[0]].join(',') + '" was not found at "' + v[0] + '".';
                for (var w = 0; w < u.length; w++) {
                    var x = p[u[w]];
                    for (var y = 0; y < x.length; y++) {
                        var z = x[y];
                        q[z] = this.get(z);
                        m[z] = 1;
                    }
                }
                k.call(l, q);
            },
            this);
        }
    };
    a.plugins = new a.resourceManager('plugins/', 'plugin');
    var j = a.plugins;
    j.load = e.override(j.load,
    function(k) {
        return function(l, m, n) {
            var o = {},
            p = function(q) {
                k.call(this, q,
                function(r) {
                    e.extend(o, r);
                    var s = [];
                    for (var t in r) {
                        var u = r[t],
                        v = u && u.requires;
                        if (v) for (var w = 0; w < v.length; w++) {
                            if (!o[v[w]]) s.push(v[w]);
                        }
                    }
                    if (s.length) p.call(this, s);
                    else {
                        for (t in o) {
                            u = o[t];
                            if (u.onLoad && !u.onLoad._called) {
                                u.onLoad();
                                u.onLoad._called = 1;
                            }
                        }
                        if (m) m.call(n || window, o);
                    }
                },
                this);
            };
            p.call(this, l);
        };
    });
    j.setLang = function(k, l, m) {
        var n = this.get(k);
        n.lang[l] = m;
    };
    (function() {
        var k = {},
        l = function(m, n) {
            var o = function() {
                k[m] = 1;
                n();
            },
            p = new h('img');
            p.on('load', o);
            p.on('error', o);
            p.setAttribute('src', m);
        };
        a.imageCacher = {
            load: function(m, n) {
                var o = m.length,
                p = function() {
                    if (--o === 0) n();
                };
                for (var q = 0; q < m.length; q++) {
                    var r = m[q];
                    if (k[r]) p();
                    else l(r, p);
                }
            }
        };
    })();
    a.skins = (function() {
        var k = {},
        l = {},
        m = {},
        n = function(o, p, q, r) {
            var s = k[p];
            if (!o.skin) {
                o.skin = s;
                if (s.init) s.init(o);
            }
            var t = function(D) {
                for (var E = 0; E < D.length; E++) D[E] = a.getUrl(m[p] + D[E]);
            };
            function u(D, E) {
                return D.replace(/url\s*\(([\s'"]*)(.*?)([\s"']*)\)/g,
                function(F, G, H, I) {
                    if (/^\/|^\w?:/.test(H)) return F;
                    else return 'url(' + E + G + H + I + ')';
                });
            };
            if (!l[p]) {
                var v = s.preload;
                if (v && v.length > 0) {
                    t(v);
                    a.imageCacher.load(v,
                    function() {
                        l[p] = 1;
                        n(o, p, q, r);
                    });
                    return;
                }
                l[p] = 1;
            }
            q = s[q];
            var w = !q || !!q._isLoaded;
            if (w) r && r();
            else {
                var x = q._pending || (q._pending = []);
                x.push(r);
                if (x.length > 1) return;
                var y = !q.css || !q.css.length,
                z = !q.js || !q.js.length,
                A = function() {
                    if (y && z) {
                        q._isLoaded = 1;
                        for (var D = 0; D < x.length; D++) {
                            if (x[D]) x[D]();
                        }
                    }
                };
                if (!y) {
                    var B = q.css;
                    if (e.isArray(B)) {
                        t(B);
                        for (var C = 0; C < B.length; C++) a.document.appendStyleSheet(B[C]);
                    } else {
                        B = u(B, a.getUrl(m[p]));
                        a.document.appendStyleText(B);
                    }
                    q.css = B;
                    y = 1;
                }
                if (!z) {
                    t(q.js);
                    a.scriptLoader.load(q.js,
                    function() {
                        z = 1;
                        A();
                    });
                }
                A();
            }
        };
        return {
            add: function(o, p) {
                k[o] = p;
                p.skinPath = m[o] || (m[o] = a.getUrl('skins/' + o + '/'));
            },
            load: function(o, p, q) {
                var r = o.skinName,
                s = o.skinPath;
                if (k[r]) n(o, r, p, q);
                else {
                    m[r] = s;
                    a.scriptLoader.load(s + 'skin.js',
                    function() {
                        n(o, r, p, q);
                    });
                }
            }
        };
    })();
    a.themes = new a.resourceManager('themes/', 'theme');
    a.ui = function(k) {
        if (k.ui) return k.ui;
        this._ = {
            handlers: {},
            items: {},
            editor: k
        };
        return this;
    };
    var k = a.ui;
    k.prototype = {
        add: function(l, m, n) {
            this._.items[l] = {
                type: m,
                command: n.command || null,
                args: Array.prototype.slice.call(arguments, 2)
            };
        },
        create: function(l) {
            var q = this;
            var m = q._.items[l],
            n = m && q._.handlers[m.type],
            o = m && m.command && q._.editor.getCommand(m.command),
            p = n && n.create.apply(q, m.args);
            if (o) o.uiItems.push(p);
            return p;
        },
        addHandler: function(l, m) {
            this._.handlers[l] = m;
        }
    };
    (function() {
        var l = 0,
        m = function() {
            var x = 'editor' + ++l;
            return a.instances && a.instances[x] ? m() : x;
        },
        n = {},
        o = function(x) {
            var y = x.config.customConfig;
            if (!y) return false;
            y = a.getUrl(y);
            var z = n[y] || (n[y] = {});
            if (z.fn) {
                z.fn.call(x, x.config);
                if (a.getUrl(x.config.customConfig) == y || !o(x)) x.fireOnce('customConfigLoaded');
            } else a.scriptLoader.load(y,
            function() {
                if (a.editorConfig) z.fn = a.editorConfig;
                else z.fn = function() {};
                o(x);
            });
            return true;
        },
        p = function(x, y) {
            x.on('customConfigLoaded',
            function() {
                if (y) {
                    if (y.on) for (var z in y.on) x.on(z, y.on[z]);
                    e.extend(x.config, y, true);
                    delete x.config.on;
                }
                q(x);
            });
            if (y && y.customConfig != undefined) x.config.customConfig = y.customConfig;
            if (!o(x)) x.fireOnce('customConfigLoaded');
        },
        q = function(x) {
            var y = x.config.skin.split(','),
            z = y[0],
            A = a.getUrl(y[1] || 'skins/' + z + '/');
            x.skinName = z;
            x.skinPath = A;
            x.skinClass = 'cke_skin_' + z;
            x.fireOnce('configLoaded');
            t(x);
        },
        r = function(x) {
            a.lang.load(x.config.language, x.config.defaultLanguage,
            function(y, z) {
                x.langCode = y;
                x.lang = e.prototypedCopy(z);
                if (b.gecko && b.version < 10900 && x.lang.dir == 'rtl') x.lang.dir = 'ltr';
                s(x);
            });
        },
        s = function(x) {
            var y = x.config,
            z = y.plugins,
            A = y.extraPlugins,
            B = y.removePlugins;
            if (A) {
                var C = new RegExp('(?:^|,)(?:' + A.replace(/\s*,\s*/g, '|') + ')(?=,|$)', 'g');
                z = z.replace(C, '');
                z += ',' + A;
            }
            if (B) {
                C = new RegExp('(?:^|,)(?:' + B.replace(/\s*,\s*/g, '|') + ')(?=,|$)', 'g');
                z = z.replace(C, '');
            }
            j.load(z.split(','),
            function(D) {
                var E = [],
                F = [],
                G = [];
                x.plugins = D;
                for (var H in D) {
                    var I = D[H],
                    J = I.lang,
                    K = j.getPath(H),
                    L = null;
                    I.path = K;
                    if (J) {
                        L = e.indexOf(J, x.langCode) >= 0 ? x.langCode: J[0];
                        if (!I.lang[L]) G.push(a.getUrl(K + 'lang/' + L + '.js'));
                        else {
                            e.extend(x.lang, I.lang[L]);
                            L = null;
                        }
                    }
                    F.push(L);
                    E.push(I);
                }
                a.scriptLoader.load(G,
                function() {
                    var M = ['beforeInit', 'init', 'afterInit'];
                    for (var N = 0; N < M.length; N++) for (var O = 0; O < E.length; O++) {
                        var P = E[O];
                        if (N === 0 && F[O] && P.lang) e.extend(x.lang, P.lang[F[O]]);
                        if (P[M[N]]) P[M[N]](x);
                    }
                    x.fire('pluginsLoaded');
                    u(x);
                });
            });
        },
        t = function(x) {
            a.skins.load(x, 'editor',
            function() {
                r(x);
            });
        },
        u = function(x) {
            var y = x.config.theme;
            a.themes.load(y,
            function() {
                var z = x.theme = a.themes.get(y);
                z.path = a.themes.getPath(y);
                z.build(x);
                if (x.config.autoUpdateElement) v(x);
            });
        },
        v = function(x) {
            var y = x.element;
            if (x.elementMode == 1 && y.is('textarea')) {
                var z = y.$.form && new h(y.$.form);
                if (z) {
                    function A() {
                        x.updateElement();
                    };
                    z.on('submit', A);
                    if (!z.$.submit.nodeName) z.$.submit = e.override(z.$.submit,
                    function(B) {
                        return function() {
                            x.updateElement();
                            if (B.apply) B.apply(this, arguments);
                            else B();
                        };
                    });
                    x.on('destroy',
                    function() {
                        z.removeListener('submit', A);
                    });
                }
            }
        };
        function w() {
            var x, y = this._.commands,
            z = this.mode;
            for (var A in y) {
                x = y[A];
                x[x.modes[z] ? 'enable': 'disable']();
            }
        };
        a.editor.prototype._init = function() {
            var z = this;
            var x = h.get(z._.element),
            y = z._.instanceConfig;
            delete z._.element;
            delete z._.instanceConfig;
            z._.commands = {};
            z._.styles = [];
            z.element = x;
            z.name = x && z.elementMode == 1 && (x.getId() || x.getNameAtt()) || m();
            if (z.name in a.instances) throw '[CKEDITOR.editor] The instance "' + z.name + '" already exists.';
            z.config = e.prototypedCopy(i);
            z.ui = new k(z);
            z.focusManager = new a.focusManager(z);
            a.fire('instanceCreated', null, z);
            z.on('mode', w, null, null, 1);
            p(z, y);
        };
    })();
    e.extend(a.editor.prototype, {
        addCommand: function(l, m) {
            return this._.commands[l] = new a.command(this, m);
        },
        addCss: function(l) {
            this._.styles.push(l);
        },
        destroy: function(l) {
            var m = this;
            if (!l) m.updateElement();
            m.theme.destroy(m);
            m.fire('destroy');
            a.remove(m);
            a.fire('instanceDestroyed', null, m);
        },
        execCommand: function(l, m) {
            var n = this.getCommand(l),
            o = {
                name: l,
                commandData: m,
                command: n
            };
            if (n && n.state != 0) if (this.fire('beforeCommandExec', o) !== true) {
                o.returnValue = n.exec(o.commandData);
                if (!n.async && this.fire('afterCommandExec', o) !== true) return o.returnValue;
            }
            return false;
        },
        getCommand: function(l) {
            return this._.commands[l];
        },
        getData: function() {
            var n = this;
            n.fire('beforeGetData');
            var l = n._.data;
            if (typeof l != 'string') {
                var m = n.element;
                if (m && n.elementMode == 1) l = m.is('textarea') ? m.getValue() : m.getHtml();
                else l = '';
            }
            l = {
                dataValue: l
            };
            n.fire('getData', l);
            return l.dataValue;
        },
        getSnapshot: function() {
            var l = this.fire('getSnapshot');
            if (typeof l != 'string') {
                var m = this.element;
                if (m && this.elementMode == 1) l = m.is('textarea') ? m.getValue() : m.getHtml();
            }
            return l;
        },
        loadSnapshot: function(l) {
            this.fire('loadSnapshot', l);
        },
        setData: function(l, m) {
            if (m) this.on('dataReady',
            function(o) {
                o.removeListener();
                m.call(o.editor);
            });
            var n = {
                dataValue: l
            };
            this.fire('setData', n);
            this._.data = n.dataValue;
            this.fire('afterSetData', n);
        },
        insertHtml: function(l) {
            this.fire('insertHtml', l);
        },
        insertElement: function(l) {
            this.fire('insertElement', l);
        },
        checkDirty: function() {
            return this.mayBeDirty && this._.previousValue !== this.getSnapshot();
        },
        resetDirty: function() {
            if (this.mayBeDirty) this._.previousValue = this.getSnapshot();
        },
        updateElement: function() {
            var n = this;
            var l = n.element;
            if (l && n.elementMode == 1) {
                var m = n.getData();
                if (n.config.htmlEncodeOutput) m = e.htmlEncode(m);
                if (l.is('textarea')) l.setValue(m);
                else l.setHtml(m);
            }
        }
    });
    a.on('loaded',
    function() {
        var l = a.editor._pending;
        if (l) {
            delete a.editor._pending;
            for (var m = 0; m < l.length; m++) l[m]._init();
        }
    });
    a.htmlParser = function() {
        this._ = {
            htmlPartsRegex: new RegExp("<(?:(?:\\/([^>]+)>)|(?:!--([\\S|\\s]*?)-->)|(?:([^\\s>]+)\\s*((?:(?:[^\"'>]+)|(?:\"[^\"]*\")|(?:'[^']*'))*)\\/?>))", 'g')
        };
    };
    (function() {
        var l = /([\w\-:.]+)(?:(?:\s*=\s*(?:(?:"([^"]*)")|(?:'([^']*)')|([^\s>]+)))|(?=\s|$))/g,
        m = {
            checked: 1,
            compact: 1,
            declare: 1,
            defer: 1,
            disabled: 1,
            ismap: 1,
            multiple: 1,
            nohref: 1,
            noresize: 1,
            noshade: 1,
            nowrap: 1,
            readonly: 1,
            selected: 1
        };
        a.htmlParser.prototype = {
            onTagOpen: function() {},
            onTagClose: function() {},
            onText: function() {},
            onCDATA: function() {},
            onComment: function() {},
            parse: function(n) {
                var A = this;
                var o, p, q = 0,
                r;
                while (o = A._.htmlPartsRegex.exec(n)) {
                    var s = o.index;
                    if (s > q) {
                        var t = n.substring(q, s);
                        if (r) r.push(t);
                        else A.onText(t);
                    }
                    q = A._.htmlPartsRegex.lastIndex;
                    if (p = o[1]) {
                        p = p.toLowerCase();
                        if (r && f.$cdata[p]) {
                            A.onCDATA(r.join(''));
                            r = null;
                        }
                        if (!r) {
                            A.onTagClose(p);
                            continue;
                        }
                    }
                    if (r) {
                        r.push(o[0]);
                        continue;
                    }
                    if (p = o[3]) {
                        p = p.toLowerCase();
                        var u = {},
                        v, w = o[4],
                        x = !!(w && w.charAt(w.length - 1) == '/');
                        if (w) while (v = l.exec(w)) {
                            var y = v[1].toLowerCase(),
                            z = v[2] || v[3] || v[4] || '';
                            if (!z && m[y]) u[y] = y;
                            else u[y] = z;
                        }
                        A.onTagOpen(p, u, x);
                        if (!r && f.$cdata[p]) r = [];
                        continue;
                    }
                    if (p = o[2]) A.onComment(p);
                }
                if (n.length > q) A.onText(n.substring(q, n.length));
            }
        };
    })();
    a.htmlParser.comment = function(l) {
        this.value = l;
        this._ = {
            isBlockLike: false
        };
    };
    a.htmlParser.comment.prototype = {
        type: 8,
        writeHtml: function(l, m) {
            var n = this.value;
            if (m) {
                if (! (n = m.onComment(n, this))) return;
                if (typeof n != 'string') {
                    n.parent = this.parent;
                    n.writeHtml(l, m);
                    return;
                }
            }
            l.comment(n);
        }
    };
    (function() {
        var l = /[\t\r\n ]{2,}|[\t\r\n]/g;
        a.htmlParser.text = function(m) {
            this.value = m;
            this._ = {
                isBlockLike: false
            };
        };
        a.htmlParser.text.prototype = {
            type: 3,
            writeHtml: function(m, n) {
                var o = this.value;
                if (n && !(o = n.onText(o, this))) return;
                m.text(o);
            }
        };
    })();
    (function() {
        a.htmlParser.cdata = function(l) {
            this.value = l;
        };
        a.htmlParser.cdata.prototype = {
            type: 3,
            writeHtml: function(l) {
                l.write(this.value);
            }
        };
    })();
    a.htmlParser.fragment = function() {
        this.children = [];
        this.parent = null;
        this._ = {
            isBlockLike: true,
            hasInlineStarted: false
        };
    };
    (function() {
        var l = {
            colgroup: 1,
            dd: 1,
            dt: 1,
            li: 1,
            option: 1,
            p: 1,
            td: 1,
            tfoot: 1,
            th: 1,
            thead: 1,
            tr: 1
        },
        m = e.extend({
            table: 1,
            ul: 1,
            ol: 1,
            dl: 1
        },
        f.table, f.ul, f.ol, f.dl),
        n = f.$list,
        o = f.$listItem;
        a.htmlParser.fragment.fromHtml = function(p, q) {
            var r = new a.htmlParser(),
            s = [],
            t = new a.htmlParser.fragment(),
            u = [],
            v = t,
            w = false,
            x;
            function y(C) {
                if (u.length > 0) for (var D = 0; D < u.length; D++) {
                    var E = u[D],
                    F = E.name,
                    G = f[F],
                    H = v.name && f[v.name];
                    if ((!H || H[F]) && (!C || !G || G[C] || !f[C])) {
                        E = E.clone();
                        E.parent = v;
                        v = E;
                        u.splice(D, 1);
                        D--;
                    }
                }
            };
            function z(C, D, E) {
                D = D || v || t;
                if (q && !D.type) {
                    var F, G;
                    if (C.attributes && (G = C.attributes._cke_real_element_type)) F = G;
                    else F = C.name;
                    if (F && !(F in f.$body) && !(F in f.$nonBodyContent)) {
                        var H = v;
                        v = D;
                        r.onTagOpen(q, {});
                        D = v;
                        if (E) v = H;
                    }
                }
                if (C._.isBlockLike && C.name != 'pre') {
                    var I = C.children.length,
                    J = C.children[I - 1],
                    K;
                    if (J && J.type == 3) if (! (K = e.rtrim(J.value))) C.children.length = I - 1;
                    else J.value = K;
                }
                D.add(C);
                if (C.returnPoint) {
                    v = C.returnPoint;
                    delete C.returnPoint;
                }
            };
            r.onTagOpen = function(C, D, E) {
                var F = new a.htmlParser.element(C, D);
                if (F.isUnknown && E) F.isEmpty = true;
                if (f.$removeEmpty[C]) {
                    u.push(F);
                    return;
                } else if (C == 'pre') w = true;
                else if (C == 'br' && w) {
                    v.add(new a.htmlParser.text('\n'));
                    return;
                }
                var G = v.name,
                H = G && (f[G] || (v._.isBlockLike ? f.div: f.span));
                if (H && !F.isUnknown && !v.isUnknown && !H[C]) {
                    var I = false,
                    J;
                    if (C in n && G in n) {
                        var K = v.children,
                        L = K[K.length - 1];
                        if (! (L && L.name in o)) z(L = new a.htmlParser.element('li'), v);
                        x = v,
                        J = L;
                    } else if (C == G) z(v, v.parent);
                    else {
                        if (m[G]) {
                            if (!x) x = v;
                        } else {
                            z(v, v.parent, true);
                            if (!l[G]) u.unshift(v);
                        }
                        I = true;
                    }
                    if (J) v = J;
                    else v = v.returnPoint || v.parent;
                    if (I) {
                        r.onTagOpen.apply(this, arguments);
                        return;
                    }
                }
                y(C);
                F.parent = v;
                F.returnPoint = x;
                x = 0;
                if (F.isEmpty) z(F);
                else v = F;
            };
            r.onTagClose = function(C) {
                for (var D = u.length - 1; D >= 0; D--) {
                    if (C == u[D].name) {
                        u.splice(D, 1);
                        return;
                    }
                }
                var E = [],
                F = [],
                G = v;
                while (G.type && G.name != C) {
                    if (!G._.isBlockLike) F.unshift(G);
                    E.push(G);
                    G = G.parent;
                }
                if (G.type) {
                    for (D = 0; D < E.length;
                    D++) {
                        var H = E[D];
                        z(H, H.parent);
                    }
                    v = G;
                    if (v.name == 'pre') w = false;
                    z(G, G.parent);
                    if (G == v) v = v.parent;
                    u = u.concat(F);
                }
                if (C == 'body') q = false;
            };
            r.onText = function(C) {
                if (!v._.hasInlineStarted && !w) {
                    C = e.ltrim(C);
                    if (C.length === 0) return;
                }
                y();
                if (q && (!v.type || v.name == 'body') && e.trim(C)) this.onTagOpen(q, {});
                if (!w) C = C.replace(/[\t\r\n ]{2,}|[\t\r\n]/g, ' ');
                v.add(new a.htmlParser.text(C));
            };
            r.onCDATA = function(C) {
                v.add(new a.htmlParser.cdata(C));
            };
            r.onComment = function(C) {
                v.add(new a.htmlParser.comment(C));
            };
            r.parse(p);
            while (v.type) {
                var A = v.parent,
                B = v;
                if (q && (!A.type || A.name == 'body') && !f.$body[B.name]) {
                    v = A;
                    r.onTagOpen(q, {});
                    A = v;
                }
                A.add(B);
                v = A;
            }
            return t;
        };
        a.htmlParser.fragment.prototype = {
            add: function(p) {
                var s = this;
                var q = s.children.length,
                r = q > 0 && s.children[q - 1] || null;
                if (r) {
                    if (p._.isBlockLike && r.type == 3) {
                        r.value = e.rtrim(r.value);
                        if (r.value.length === 0) {
                            s.children.pop();
                            s.add(p);
                            return;
                        }
                    }
                    r.next = p;
                }
                p.previous = r;
                p.parent = s;
                s.children.push(p);
                s._.hasInlineStarted = p.type == 3 || p.type == 1 && !p._.isBlockLike;
            },
            writeHtml: function(p, q) {
                var r;
                this.filterChildren = function() {
                    var s = new a.htmlParser.basicWriter();
                    this.writeChildrenHtml.call(this, s, q, true);
                    var t = s.getHtml();
                    this.children = new a.htmlParser.fragment.fromHtml(t).children;
                    r = 1;
                }; ! this.name && q && q.onFragment(this);
                this.writeChildrenHtml(p, r ? null: q);
            },
            writeChildrenHtml: function(p, q) {
                for (var r = 0; r < this.children.length; r++) this.children[r].writeHtml(p, q);
            }
        };
    })();
    a.htmlParser.element = function(l, m) {
        var r = this;
        r.name = l;
        r.attributes = m || (m = {});
        r.children = [];
        var n = m._cke_real_element_type || l,
        o = f,
        p = !!(o.$nonBodyContent[n] || o.$block[n] || o.$listItem[n] || o.$tableContent[n] || o.$nonEditable[n] || n == 'br'),
        q = !!o.$empty[l];
        r.isEmpty = q;
        r.isUnknown = !o[l];
        r._ = {
            isBlockLike: p,
            hasInlineStarted: q || !p
        };
    };
    (function() {
        var l = function(m, n) {
            m = m[0];
            n = n[0];
            return m < n ? -1 : m > n ? 1 : 0;
        };
        a.htmlParser.element.prototype = {
            type: 1,
            add: a.htmlParser.fragment.prototype.add,
            clone: function() {
                return new a.htmlParser.element(this.name, this.attributes);
            },
            writeHtml: function(m, n) {
                var o = this.attributes,
                p = this,
                q = p.name,
                r, s, t, u;
                p.filterChildren = function() {
                    if (!u) {
                        var z = new a.htmlParser.basicWriter();
                        a.htmlParser.fragment.prototype.writeChildrenHtml.call(p, z, n);
                        p.children = new a.htmlParser.fragment.fromHtml(z.getHtml()).children;
                        u = 1;
                    }
                };
                if (n) {
                    for (;;) {
                        if (! (q = n.onElementName(q))) return;
                        p.name = q;
                        if (! (p = n.onElement(p))) return;
                        p.parent = this.parent;
                        if (p.name == q) break;
                        if (p.type != 1) {
                            p.writeHtml(m, n);
                            return;
                        }
                        q = p.name;
                        if (!q) {
                            this.writeChildrenHtml.call(p, m, u ? null: n);
                            return;
                        }
                    }
                    o = p.attributes;
                }
                m.openTag(q, o);
                var v = [];
                for (var w = 0;
                w < 2; w++) for (r in o) {
                    s = r;
                    t = o[r];
                    if (w == 1) v.push([r, t]);
                    else if (n) {
                        for (;;) {
                            if (! (s = n.onAttributeName(r))) {
                                delete o[r];
                                break;
                            } else if (s != r) {
                                delete o[r];
                                r = s;
                                continue;
                            } else break;
                        }
                        if (s) if ((t = n.onAttribute(p, s, t)) === false) delete o[s];
                        else o[s] = t;
                    }
                }
                if (m.sortAttributes) v.sort(l);
                var x = v.length;
                for (w = 0; w < x; w++) {
                    var y = v[w];
                    m.attribute(y[0], y[1]);
                }
                m.openTagClose(q, p.isEmpty);
                if (!p.isEmpty) {
                    this.writeChildrenHtml.call(p, m, u ? null: n);
                    m.closeTag(q);
                }
            },
            writeChildrenHtml: function(m, n) {
                a.htmlParser.fragment.prototype.writeChildrenHtml.apply(this, arguments);
            }
        };
    })();
    (function() {
        a.htmlParser.filter = e.createClass({
            $: function(q) {
                this._ = {
                    elementNames: [],
                    attributeNames: [],
                    elements: {
                        $length: 0
                    },
                    attributes: {
                        $length: 0
                    }
                };
                if (q) this.addRules(q, 10);
            },
            proto: {
                addRules: function(q, r) {
                    var s = this;
                    if (typeof r != 'number') r = 10;
                    m(s._.elementNames, q.elementNames, r);
                    m(s._.attributeNames, q.attributeNames, r);
                    n(s._.elements, q.elements, r);
                    n(s._.attributes, q.attributes, r);
                    s._.text = o(s._.text, q.text, r) || s._.text;
                    s._.comment = o(s._.comment, q.comment, r) || s._.comment;
                    s._.root = o(s._.root, q.root, r) || s._.root;
                },
                onElementName: function(q) {
                    return l(q, this._.elementNames);
                },
                onAttributeName: function(q) {
                    return l(q, this._.attributeNames);
                },
                onText: function(q) {
                    var r = this._.text;
                    return r ? r.filter(q) : q;
                },
                onComment: function(q, r) {
                    var s = this._.comment;
                    return s ? s.filter(q, r) : q;
                },
                onFragment: function(q) {
                    var r = this._.root;
                    return r ? r.filter(q) : q;
                },
                onElement: function(q) {
                    var v = this;
                    var r = [v._.elements['^'], v._.elements[q.name], v._.elements.$],
                    s,
                    t;
                    for (var u = 0; u < 3; u++) {
                        s = r[u];
                        if (s) {
                            t = s.filter(q, v);
                            if (t === false) return null;
                            if (t && t != q) return v.onNode(t);
                            if (q.parent && !q.name) break;
                        }
                    }
                    return q;
                },
                onNode: function(q) {
                    var r = q.type;
                    return r == 1 ? this.onElement(q) : r == 3 ? new a.htmlParser.text(this.onText(q.value)) : r == 8 ? new a.htmlParser.comment(this.onComment(q.value)) : null;
                },
                onAttribute: function(q, r, s) {
                    var t = this._.attributes[r];
                    if (t) {
                        var u = t.filter(s, q, this);
                        if (u === false) return false;
                        if (typeof u != 'undefined') return u;
                    }
                    return s;
                }
            }
        });
        function l(q, r) {
            for (var s = 0; q && s < r.length; s++) {
                var t = r[s];
                q = q.replace(t[0], t[1]);
            }
            return q;
        };
        function m(q, r, s) {
            if (typeof r == 'function') r = [r];
            var t, u, v = q.length,
            w = r && r.length;
            if (w) {
                for (t = 0; t < v && q[t].pri < s; t++) {}
                for (u = w - 1; u >= 0; u--) {
                    var x = r[u];
                    if (x) {
                        x.pri = s;
                        q.splice(t, 0, x);
                    }
                }
            }
        };
        function n(q, r, s) {
            if (r) for (var t in r) {
                var u = q[t];
                q[t] = o(u, r[t], s);
                if (!u) q.$length++;
            }
        };
        function o(q, r, s) {
            if (r) {
                r.pri = s;
                if (q) {
                    if (!q.splice) {
                        if (q.pri > s) q = [r, q];
                        else q = [q, r];
                        q.filter = p;
                    } else m(q, r, s);
                    return q;
                } else {
                    r.filter = r;
                    return r;
                }
            }
        };
        function p(q) {
            var r = typeof q == 'object';
            for (var s = 0; s < this.length; s++) {
                var t = this[s],
                u = t.apply(window, arguments);
                if (typeof u != 'undefined') {
                    if (u === false) return false;
                    if (r && u != q) return u;
                }
            }
            return null;
        };
    })();
    a.htmlParser.basicWriter = e.createClass({
        $: function() {
            this._ = {
                output: []
            };
        },
        proto: {
            openTag: function(l, m) {
                this._.output.push('<', l);
            },
            openTagClose: function(l, m) {
                if (m) this._.output.push(' />');
                else this._.output.push('>');
            },
            attribute: function(l, m) {
                this._.output.push(' ', l, '="', m, '"');
            },
            closeTag: function(l) {
                this._.output.push('</', l, '>');
            },
            text: function(l) {
                this._.output.push(l);
            },
            comment: function(l) {
                this._.output.push('<!--', l, '-->');
            },
            write: function(l) {
                this._.output.push(l);
            },
            reset: function() {
                this._.output = [];
                this._.indent = false;
            },
            getHtml: function(l) {
                var m = this._.output.join('');
                if (l) this.reset();
                return m;
            }
        }
    });
    delete a.loadFullCore;
    a.instances = {};
    a.document = new g(document);
    a.add = function(l) {
        a.instances[l.name] = l;
        l.on('focus',
        function() {
            if (a.currentInstance != l) {
                a.currentInstance = l;
                a.fire('currentInstance');
            }
        });
        l.on('blur',
        function() {
            if (a.currentInstance == l) {
                a.currentInstance = null;
                a.fire('currentInstance');
            }
        });
    };
    a.remove = function(l) {
        delete a.instances[l.name];
    };
    a.TRISTATE_ON = 1;
    a.TRISTATE_OFF = 2;
    a.TRISTATE_DISABLED = 0;
    d.comment = e.createClass({
        base: d.node,
        $: function(l, m) {
            if (typeof l == 'string') l = (m ? m.$: document).createComment(l);
            this.base(l);
        },
        proto: {
            type: 8,
            getOuterHtml: function() {
                return '<!--' + this.$.nodeValue + '-->';
            }
        }
    });
    (function() {
        var l = {
            address: 1,
            blockquote: 1,
            dl: 1,
            h1: 1,
            h2: 1,
            h3: 1,
            h4: 1,
            h5: 1,
            h6: 1,
            p: 1,
            pre: 1,
            li: 1,
            dt: 1,
            de: 1
        },
        m = {
            body: 1,
            div: 1,
            table: 1,
            tbody: 1,
            tr: 1,
            td: 1,
            th: 1,
            caption: 1,
            form: 1
        },
        n = function(o) {
            var p = o.getChildren();
            for (var q = 0, r = p.count(); q < r; q++) {
                var s = p.getItem(q);
                if (s.type == 1 && f.$block[s.getName()]) return true;
            }
            return false;
        };
        d.elementPath = function(o) {
            var u = this;
            var p = null,
            q = null,
            r = [],
            s = o;
            while (s) {
                if (s.type == 1) {
                    if (!u.lastElement) u.lastElement = s;
                    var t = s.getName();
                    if (c && s.$.scopeName != 'HTML') t = s.$.scopeName.toLowerCase() + ':' + t;
                    if (!q) {
                        if (!p && l[t]) p = s;
                        if (m[t]) if (!p && t == 'div' && !n(s)) p = s;
                        else q = s;
                    }
                    r.push(s);
                    if (t == 'body') break;
                }
                s = s.getParent();
            }
            u.block = p;
            u.blockLimit = q;
            u.elements = r;
        };
    })();
    d.elementPath.prototype = {
        compare: function(l) {
            var m = this.elements,
            n = l && l.elements;
            if (!n || m.length != n.length) return false;
            for (var o = 0; o < m.length; o++) {
                if (!m[o].equals(n[o])) return false;
            }
            return true;
        }
    };
    d.text = function(l, m) {
        if (typeof l == 'string') l = (m ? m.$: document).createTextNode(l);
        this.$ = l;
    };
    d.text.prototype = new d.node();
    e.extend(d.text.prototype, {
        type: 3,
        getLength: function() {
            return this.$.nodeValue.length;
        },
        getText: function() {
            return this.$.nodeValue;
        },
        split: function(l) {
            var q = this;
            if (c && l == q.getLength()) {
                var m = q.getDocument().createText('');
                m.insertAfter(q);
                return m;
            }
            var n = q.getDocument(),
            o = new d.text(q.$.splitText(l), n);
            if (b.ie8) {
                var p = new d.text('', n);
                p.insertAfter(o);
                p.remove();
            }
            return o;
        },
        substring: function(l, m) {
            if (typeof m != 'number') return this.$.nodeValue.substr(l);
            else return this.$.nodeValue.substring(l, m);
        }
    });
    d.documentFragment = function(l) {
        l = l || a.document;
        this.$ = l.$.createDocumentFragment();
    };
    e.extend(d.documentFragment.prototype, h.prototype, {
        type: 11,
        insertAfterNode: function(l) {
            l = l.$;
            l.parentNode.insertBefore(this.$, l.nextSibling);
        }
    },
    true, {
        append: 1,
        appendBogus: 1,
        getFirst: 1,
        getLast: 1,
        appendTo: 1,
        moveChildren: 1,
        insertBefore: 1,
        insertAfterNode: 1,
        replace: 1,
        trim: 1,
        type: 1,
        ltrim: 1,
        rtrim: 1,
        getDocument: 1,
        getChildCount: 1,
        getChild: 1,
        getChildren: 1
    });
    (function() {
        function l(t, u) {
            if (this._.end) return null;
            var v, w = this.range,
            x, y = this.guard,
            z = this.type,
            A = t ? 'getPreviousSourceNode': 'getNextSourceNode';
            if (!this._.start) {
                this._.start = 1;
                w.trim();
                if (w.collapsed) {
                    this.end();
                    return null;
                }
            }
            if (!t && !this._.guardLTR) {
                var B = w.endContainer,
                C = B.getChild(w.endOffset);
                this._.guardLTR = function(G, H) {
                    return (!H || !B.equals(G)) && (!C || !G.equals(C)) && (G.type != 1 || !H || G.getName() != 'body');
                };
            }
            if (t && !this._.guardRTL) {
                var D = w.startContainer,
                E = w.startOffset > 0 && D.getChild(w.startOffset - 1);
                this._.guardRTL = function(G, H) {
                    return (!H || !D.equals(G)) && (!E || !G.equals(E)) && (G.type != 1 || !H || G.getName() != 'body');
                };
            }
            var F = t ? this._.guardRTL: this._.guardLTR;
            if (y) x = function(G, H) {
                if (F(G, H) === false) return false;
                return y(G, H);
            };
            else x = F;
            if (this.current) v = this.current[A](false, z, x);
            else if (t) {
                v = w.endContainer;
                if (w.endOffset > 0) {
                    v = v.getChild(w.endOffset - 1);
                    if (x(v) === false) v = null;
                } else v = x(v) === false ? null: v.getPreviousSourceNode(true, z, x);
            } else {
                v = w.startContainer;
                v = v.getChild(w.startOffset);
                if (v) {
                    if (x(v) === false) v = null;
                } else v = x(w.startContainer) === false ? null: w.startContainer.getNextSourceNode(true, z, x);
            }
            while (v && !this._.end) {
                this.current = v;
                if (!this.evaluator || this.evaluator(v) !== false) {
                    if (!u) return v;
                } else if (u && this.evaluator) return false;
                v = v[A](false, z, x);
            }
            this.end();
            return this.current = null;
        };
        function m(t) {
            var u, v = null;
            while (u = l.call(this, t)) v = u;
            return v;
        };
        d.walker = e.createClass({
            $: function(t) {
                this.range = t;
                this._ = {};
            },
            proto: {
                end: function() {
                    this._.end = 1;
                },
                next: function() {
                    return l.call(this);
                },
                previous: function() {
                    return l.call(this, true);
                },
                checkForward: function() {
                    return l.call(this, false, true) !== false;
                },
                checkBackward: function() {
                    return l.call(this, true, true) !== false;
                },
                lastForward: function() {
                    return m.call(this);
                },
                lastBackward: function() {
                    return m.call(this, true);
                },
                reset: function() {
                    delete this.current;
                    this._ = {};
                }
            }
        });
        var n = {
            block: 1,
            'list-item': 1,
            table: 1,
            'table-row-group': 1,
            'table-header-group': 1,
            'table-footer-group': 1,
            'table-row': 1,
            'table-column-group': 1,
            'table-column': 1,
            'table-cell': 1,
            'table-caption': 1
        },
        o = {
            hr: 1
        };
        h.prototype.isBlockBoundary = function(t) {
            var u = e.extend({},
            o, t || {});
            return n[this.getComputedStyle('display')] || u[this.getName()];
        };
        d.walker.blockBoundary = function(t) {
            return function(u, v) {
                return ! (u.type == 1 && u.isBlockBoundary(t));
            };
        };
        d.walker.listItemBoundary = function() {
            return this.blockBoundary({
                br: 1
            });
        };
        d.walker.bookmarkContents = function(t) {},
        d.walker.bookmark = function(t, u) {
            function v(w) {
                return w && w.getName && w.getName() == 'span' && w.hasAttribute('_fck_bookmark');
            };
            return function(w) {
                var x, y;
                x = w && !w.getName && (y = w.getParent()) && v(y);
                x = t ? x: x || v(w);
                return u ^ x;
            };
        };
        d.walker.whitespaces = function(t) {
            return function(u) {
                var v = u && u.type == 3 && !e.trim(u.getText());
                return t ^ v;
            };
        };
        d.walker.invisible = function(t) {
            var u = d.walker.whitespaces();
            return function(v) {
                var w = u(v) || v.is && !v.$.offsetHeight;
                return t ^ w;
            };
        };
        var p = /^[\t\r\n ]*(?:&nbsp;|\xa0)$/,
        q = d.walker.whitespaces(true),
        r = d.walker.bookmark(false, true),
        s = function(t) {
            return r(t) && q(t);
        };
        h.prototype.getBogus = function() {
            var t = this.getLast(s);
            if (t && (!c ? t.is && t.is('br') : t.getText && p.test(t.getText()))) return t;
            return false;
        };
    })();
    d.range = function(l) {
        var m = this;
        m.startContainer = null;
        m.startOffset = null;
        m.endContainer = null;
        m.endOffset = null;
        m.collapsed = true;
        m.document = l;
    };
    (function() {
        var l = function(t) {
            t.collapsed = t.startContainer && t.endContainer && t.startContainer.equals(t.endContainer) && t.startOffset == t.endOffset;
        },
        m = function(t, u, v) {
            t.optimizeBookmark();
            var w = t.startContainer,
            x = t.endContainer,
            y = t.startOffset,
            z = t.endOffset,
            A, B;
            if (x.type == 3) x = x.split(z);
            else if (x.getChildCount() > 0) if (z >= x.getChildCount()) {
                x = x.append(t.document.createText(''));
                B = true;
            } else x = x.getChild(z);
            if (w.type == 3) {
                w.split(y);
                if (w.equals(x)) x = w.getNext();
            } else if (!y) {
                w = w.getFirst().insertBeforeMe(t.document.createText(''));
                A = true;
            } else if (y >= w.getChildCount()) {
                w = w.append(t.document.createText(''));
                A = true;
            } else w = w.getChild(y).getPrevious();
            var C = w.getParents(),
            D = x.getParents(),
            E,
            F,
            G;
            for (E = 0; E < C.length; E++) {
                F = C[E];
                G = D[E];
                if (!F.equals(G)) break;
            }
            var H = v,
            I, J, K, L;
            for (var M = E; M < C.length; M++) {
                I = C[M];
                if (H && !I.equals(w)) J = H.append(I.clone());
                K = I.getNext();
                while (K) {
                    if (K.equals(D[M]) || K.equals(x)) break;
                    L = K.getNext();
                    if (u == 2) H.append(K.clone(true));
                    else {
                        K.remove();
                        if (u == 1) H.append(K);
                    }
                    K = L;
                }
                if (H) H = J;
            }
            H = v;
            for (var N = E; N < D.length; N++) {
                I = D[N];
                if (u > 0 && !I.equals(x)) J = H.append(I.clone());
                if (!C[N] || I.$.parentNode != C[N].$.parentNode) {
                    K = I.getPrevious();
                    while (K) {
                        if (K.equals(C[N]) || K.equals(w)) break;
                        L = K.getPrevious();
                        if (u == 2) H.$.insertBefore(K.$.cloneNode(true), H.$.firstChild);
                        else {
                            K.remove();
                            if (u == 1) H.$.insertBefore(K.$, H.$.firstChild);
                        }
                        K = L;
                    }
                }
                if (H) H = J;
            }
            if (u == 2) {
                var O = t.startContainer;
                if (O.type == 3) {
                    O.$.data += O.$.nextSibling.data;
                    O.$.parentNode.removeChild(O.$.nextSibling);
                }
                var P = t.endContainer;
                if (P.type == 3 && P.$.nextSibling) {
                    P.$.data += P.$.nextSibling.data;
                    P.$.parentNode.removeChild(P.$.nextSibling);
                }
            } else {
                if (F && G && (w.$.parentNode != F.$.parentNode || x.$.parentNode != G.$.parentNode)) {
                    var Q = G.getIndex();
                    if (A && G.$.parentNode == w.$.parentNode) Q--;
                    t.setStart(G.getParent(), Q);
                }
                t.collapse(true);
            }
            if (A) w.remove();
            if (B && x.$.parentNode) x.remove();
        },
        n = {
            abbr: 1,
            acronym: 1,
            b: 1,
            bdo: 1,
            big: 1,
            cite: 1,
            code: 1,
            del: 1,
            dfn: 1,
            em: 1,
            font: 1,
            i: 1,
            ins: 1,
            label: 1,
            kbd: 1,
            q: 1,
            samp: 1,
            small: 1,
            span: 1,
            strike: 1,
            strong: 1,
            sub: 1,
            sup: 1,
            tt: 1,
            u: 1,
            'var': 1
        };
        function o(t) {
            var u = false,
            v = d.walker.bookmark(true);
            return function(w) {
                if (v(w)) return true;
                if (w.type == 3) {
                    if (e.trim(w.getText()).length) return false;
                } else if (w.type == 1) if (!n[w.getName()]) if (!t && !c && w.getName() == 'br' && !u) u = true;
                else return false;
                return true;
            };
        };
        function p(t) {
            return t.type != 3 && t.getName() in f.$removeEmpty || !e.trim(t.getText()) || t.getParent().hasAttribute('_fck_bookmark');
        };
        var q = new d.walker.whitespaces(),
        r = new d.walker.bookmark();
        function s(t) {
            return ! q(t) && !r(t);
        };
        d.range.prototype = {
            clone: function() {
                var u = this;
                var t = new d.range(u.document);
                t.startContainer = u.startContainer;
                t.startOffset = u.startOffset;
                t.endContainer = u.endContainer;
                t.endOffset = u.endOffset;
                t.collapsed = u.collapsed;
                return t;
            },
            collapse: function(t) {
                var u = this;
                if (t) {
                    u.endContainer = u.startContainer;
                    u.endOffset = u.startOffset;
                } else {
                    u.startContainer = u.endContainer;
                    u.startOffset = u.endOffset;
                }
                u.collapsed = true;
            },
            cloneContents: function() {
                var t = new d.documentFragment(this.document);
                if (!this.collapsed) m(this, 2, t);
                return t;
            },
            deleteContents: function() {
                if (this.collapsed) return;
                m(this, 0);
            },
            extractContents: function() {
                var t = new d.documentFragment(this.document);
                if (!this.collapsed) m(this, 1, t);
                return t;
            },
            createBookmark: function(t) {
                var y = this;
                var u, v, w, x;
                u = y.document.createElement('span');
                u.setAttribute('_fck_bookmark', 1);
                u.setStyle('display', 'none');
                u.setHtml('&nbsp;');
                if (t) {
                    w = 'cke_bm_' + e.getNextNumber();
                    u.setAttribute('id', w + 'S');
                }
                if (!y.collapsed) {
                    v = u.clone();
                    v.setHtml('&nbsp;');
                    if (t) v.setAttribute('id', w + 'E');
                    x = y.clone();
                    x.collapse();
                    x.insertNode(v);
                }
                x = y.clone();
                x.collapse(true);
                x.insertNode(u);
                if (v) {
                    y.setStartAfter(u);
                    y.setEndBefore(v);
                } else y.moveToPosition(u, 4);
                return {
                    startNode: t ? w + 'S': u,
                    endNode: t ? w + 'E': v,
                    serializable: t
                };
            },
            createBookmark2: function(t) {
                var A = this;
                var u = A.startContainer,
                v = A.endContainer,
                w = A.startOffset,
                x = A.endOffset,
                y, z;
                if (!u || !v) return {
                    start: 0,
                    end: 0
                };
                if (t) {
                    if (u.type == 1) {
                        y = u.getChild(w);
                        if (y && y.type == 3 && w > 0 && y.getPrevious().type == 3) {
                            u = y;
                            w = 0;
                        }
                    }
                    while (u.type == 3 && (z = u.getPrevious()) && z.type == 3) {
                        u = z;
                        w += z.getLength();
                    }
                    if (!A.isCollapsed) {
                        if (v.type == 1) {
                            y = v.getChild(x);
                            if (y && y.type == 3 && x > 0 && y.getPrevious().type == 3) {
                                v = y;
                                x = 0;
                            }
                        }
                        while (v.type == 3 && (z = v.getPrevious()) && z.type == 3) {
                            v = z;
                            x += z.getLength();
                        }
                    }
                }
                return {
                    start: u.getAddress(t),
                    end: A.isCollapsed ? null: v.getAddress(t),
                    startOffset: w,
                    endOffset: x,
                    normalized: t,
                    is2: true
                };
            },
            moveToBookmark: function(t) {
                var B = this;
                if (t.is2) {
                    var u = B.document.getByAddress(t.start, t.normalized),
                    v = t.startOffset,
                    w = t.end && B.document.getByAddress(t.end, t.normalized),
                    x = t.endOffset;
                    B.setStart(u, v);
                    if (w) B.setEnd(w, x);
                    else B.collapse(true);
                } else {
                    var y = t.serializable,
                    z = y ? B.document.getById(t.startNode) : t.startNode,
                    A = y ? B.document.getById(t.endNode) : t.endNode;
                    B.setStartBefore(z);
                    z.remove();
                    if (A) {
                        B.setEndBefore(A);
                        A.remove();
                    } else B.collapse(true);
                }
            },
            getBoundaryNodes: function() {
                var y = this;
                var t = y.startContainer,
                u = y.endContainer,
                v = y.startOffset,
                w = y.endOffset,
                x;
                if (t.type == 1) {
                    x = t.getChildCount();
                    if (x > v) t = t.getChild(v);
                    else if (x < 1) t = t.getPreviousSourceNode();
                    else {
                        t = t.$;
                        while (t.lastChild) t = t.lastChild;
                        t = new d.node(t);
                        t = t.getNextSourceNode() || t;
                    }
                }
                if (u.type == 1) {
                    x = u.getChildCount();
                    if (x > w) u = u.getChild(w).getPreviousSourceNode(true);
                    else if (x < 1) u = u.getPreviousSourceNode();
                    else {
                        u = u.$;
                        while (u.lastChild) u = u.lastChild;
                        u = new d.node(u);
                    }
                }
                if (t.getPosition(u) & 2) t = u;
                return {
                    startNode: t,
                    endNode: u
                };
            },
            getCommonAncestor: function(t, u) {
                var y = this;
                var v = y.startContainer,
                w = y.endContainer,
                x;
                if (v.equals(w)) {
                    if (t && v.type == 1 && y.startOffset == y.endOffset - 1) x = v.getChild(y.startOffset);
                    else x = v;
                } else x = v.getCommonAncestor(w);
                return u && !x.is ? x.getParent() : x;
            },
            optimize: function() {
                var v = this;
                var t = v.startContainer,
                u = v.startOffset;
                if (t.type != 1) if (!u) v.setStartBefore(t);
                else if (u >= t.getLength()) v.setStartAfter(t);
                t = v.endContainer;
                u = v.endOffset;
                if (t.type != 1) if (!u) v.setEndBefore(t);
                else if (u >= t.getLength()) v.setEndAfter(t);
            },
            optimizeBookmark: function() {
                var v = this;
                var t = v.startContainer,
                u = v.endContainer;
                if (t.is && t.is('span') && t.hasAttribute('_fck_bookmark')) v.setStartAt(t, 3);
                if (u && u.is && u.is('span') && u.hasAttribute('_fck_bookmark')) v.setEndAt(u, 4);
            },
            trim: function(t, u) {
                var B = this;
                var v = B.startContainer,
                w = B.startOffset,
                x = B.collapsed;
                if ((!t || x) && v && v.type == 3) {
                    if (!w) {
                        w = v.getIndex();
                        v = v.getParent();
                    } else if (w >= v.getLength()) {
                        w = v.getIndex() + 1;
                        v = v.getParent();
                    } else {
                        var y = v.split(w);
                        w = v.getIndex() + 1;
                        v = v.getParent();
                        if (!x && B.startContainer.equals(B.endContainer)) B.setEnd(y, B.endOffset - B.startOffset);
                    }
                    B.setStart(v, w);
                    if (x) B.collapse(true);
                }
                var z = B.endContainer,
                A = B.endOffset;
                if (! (u || x) && z && z.type == 3) {
                    if (!A) {
                        A = z.getIndex();
                        z = z.getParent();
                    } else if (A >= z.getLength()) {
                        A = z.getIndex() + 1;
                        z = z.getParent();
                    } else {
                        z.split(A);
                        A = z.getIndex() + 1;
                        z = z.getParent();
                    }
                    B.setEnd(z, A);
                }
            },
            enlarge: function(t) {
                switch (t) {
                case 1:
                    if (this.collapsed) return;
                    var u = this.getCommonAncestor(),
                    v = this.document.getBody(),
                    w,
                    x,
                    y,
                    z,
                    A,
                    B = false,
                    C,
                    D,
                    E = this.startContainer,
                    F = this.startOffset;
                    if (E.type == 3) {
                        if (F) {
                            E = !e.trim(E.substring(0, F)).length && E;
                            B = !!E;
                        }
                        if (E) if (! (z = E.getPrevious())) y = E.getParent();
                    } else {
                        if (F) z = E.getChild(F - 1) || E.getLast();
                        if (!z) y = E;
                    }
                    while (y || z) {
                        if (y && !z) {
                            if (!A && y.equals(u)) A = true;
                            if (!v.contains(y)) break;
                            if (!B || y.getComputedStyle('display') != 'inline') {
                                B = false;
                                if (A) w = y;
                                else this.setStartBefore(y);
                            }
                            z = y.getPrevious();
                        }
                        while (z) {
                            C = false;
                            if (z.type == 3) {
                                D = z.getText();
                                if (/[^\s\ufeff]/.test(D)) z = null;
                                C = /[\s\ufeff]$/.test(D);
                            } else if (z.$.offsetWidth > 0 && !z.getAttribute('_fck_bookmark')) if (B && f.$removeEmpty[z.getName()]) {
                                D = z.getText();
                                if (!/[^\s\ufeff]/.test(D)) z = null;
                                else {
                                    var G = z.$.all || z.$.getElementsByTagName('*');
                                    for (var H = 0, I; I = G[H++];) {
                                        if (!f.$removeEmpty[I.nodeName.toLowerCase()]) {
                                            z = null;
                                            break;
                                        }
                                    }
                                }
                                if (z) C = !!D.length;
                            } else z = null;
                            if (C) if (B) {
                                if (A) w = y;
                                else if (y) this.setStartBefore(y);
                            } else B = true;
                            if (z) {
                                var J = z.getPrevious();
                                if (!y && !J) {
                                    y = z;
                                    z = null;
                                    break;
                                }
                                z = J;
                            } else y = null;
                        }
                        if (y) y = y.getParent();
                    }
                    E = this.endContainer;
                    F = this.endOffset;
                    y = z = null;
                    A = B = false;
                    if (E.type == 3) {
                        E = !e.trim(E.substring(F)).length && E;
                        B = !(E && E.getLength());
                        if (E) if (! (z = E.getNext())) y = E.getParent();
                    } else {
                        z = E.getChild(F);
                        if (!z) y = E;
                    }
                    while (y || z) {
                        if (y && !z) {
                            if (!A && y.equals(u)) A = true;
                            if (!v.contains(y)) break;
                            if (!B || y.getComputedStyle('display') != 'inline') {
                                B = false;
                                if (A) x = y;
                                else if (y) this.setEndAfter(y);
                            }
                            z = y.getNext();
                        }
                        while (z) {
                            C = false;
                            if (z.type == 3) {
                                D = z.getText();
                                if (/[^\s\ufeff]/.test(D)) z = null;
                                C = /^[\s\ufeff]/.test(D);
                            } else if (z.$.offsetWidth > 0 && !z.getAttribute('_fck_bookmark')) if (B && f.$removeEmpty[z.getName()]) {
                                D = z.getText();
                                if (!/[^\s\ufeff]/.test(D)) z = null;
                                else {
                                    G = z.$.all || z.$.getElementsByTagName('*');
                                    for (H = 0; I = G[H++];) {
                                        if (!f.$removeEmpty[I.nodeName.toLowerCase()]) {
                                            z = null;
                                            break;
                                        }
                                    }
                                }
                                if (z) C = !!D.length;
                            } else z = null;
                            if (C) if (B) if (A) x = y;
                            else this.setEndAfter(y);
                            if (z) {
                                J = z.getNext();
                                if (!y && !J) {
                                    y = z;
                                    z = null;
                                    break;
                                }
                                z = J;
                            } else y = null;
                        }
                        if (y) y = y.getParent();
                    }
                    if (w && x) {
                        u = w.contains(x) ? x: w;
                        this.setStartBefore(u);
                        this.setEndAfter(u);
                    }
                    break;
                case 2:
                case 3:
                    var K = new d.range(this.document);
                    v = this.document.getBody();
                    K.setStartAt(v, 1);
                    K.setEnd(this.startContainer, this.startOffset);
                    var L = new d.walker(K),
                    M,
                    N,
                    O = d.walker.blockBoundary(t == 3 ? {
                        br: 1
                    }: null),
                    P = function(R) {
                        var S = O(R);
                        if (!S) M = R;
                        return S;
                    },
                    Q = function(R) {
                        var S = P(R);
                        if (!S && R.is && R.is('br')) N = R;
                        return S;
                    };
                    L.guard = P;
                    y = L.lastBackward();
                    M = M || v;
                    this.setStartAt(M, !M.is('br') && (!y && this.checkStartOfBlock() || y && M.contains(y)) ? 1 : 4);
                    K = this.clone();
                    K.collapse();
                    K.setEndAt(v, 2);
                    L = new d.walker(K);
                    L.guard = t == 3 ? Q: P;
                    M = null;
                    y = L.lastForward();
                    M = M || v;
                    this.setEndAt(M, !y && this.checkEndOfBlock() || y && M.contains(y) ? 2 : 3);
                    if (N) this.setEndAfter(N);
                }
            },
            insertNode: function(t) {
                var x = this;
                x.optimizeBookmark();
                x.trim(false, true);
                var u = x.startContainer,
                v = x.startOffset,
                w = u.getChild(v);
                if (w) t.insertBefore(w);
                else u.append(t);
                if (t.getParent().equals(x.endContainer)) x.endOffset++;
                x.setStartBefore(t);
            },
            moveToPosition: function(t, u) {
                this.setStartAt(t, u);
                this.collapse(true);
            },
            selectNodeContents: function(t) {
                this.setStart(t, 0);
                this.setEnd(t, t.type == 3 ? t.getLength() : t.getChildCount());
            },
            setStart: function(t, u) {
                var v = this;
                v.startContainer = t;
                v.startOffset = u;
                if (!v.endContainer) {
                    v.endContainer = t;
                    v.endOffset = u;
                }
                l(v);
            },
            setEnd: function(t, u) {
                var v = this;
                v.endContainer = t;
                v.endOffset = u;
                if (!v.startContainer) {
                    v.startContainer = t;
                    v.startOffset = u;
                }
                l(v);
            },
            setStartAfter: function(t) {
                this.setStart(t.getParent(), t.getIndex() + 1);
            },
            setStartBefore: function(t) {
                this.setStart(t.getParent(), t.getIndex());
            },
            setEndAfter: function(t) {
                this.setEnd(t.getParent(), t.getIndex() + 1);
            },
            setEndBefore: function(t) {
                this.setEnd(t.getParent(), t.getIndex());
            },
            setStartAt: function(t, u) {
                var v = this;
                switch (u) {
                case 1:
                    v.setStart(t, 0);
                    break;
                case 2:
                    if (t.type == 3) v.setStart(t, t.getLength());
                    else v.setStart(t, t.getChildCount());
                    break;
                case 3:
                    v.setStartBefore(t);
                    break;
                case 4:
                    v.setStartAfter(t);
                }
                l(v);
            },
            setEndAt: function(t, u) {
                var v = this;
                switch (u) {
                case 1:
                    v.setEnd(t, 0);
                    break;
                case 2:
                    if (t.type == 3) v.setEnd(t, t.getLength());
                    else v.setEnd(t, t.getChildCount());
                    break;
                case 3:
                    v.setEndBefore(t);
                    break;
                case 4:
                    v.setEndAfter(t);
                }
                l(v);
            },
            fixBlock: function(t, u) {
                var x = this;
                var v = x.createBookmark(),
                w = x.document.createElement(u);
                x.collapse(t);
                x.enlarge(2);
                x.extractContents().appendTo(w);
                w.trim();
                if (!c) w.appendBogus();
                x.insertNode(w);
                x.moveToBookmark(v);
                return w;
            },
            splitBlock: function(t) {
                var D = this;
                var u = new d.elementPath(D.startContainer),
                v = new d.elementPath(D.endContainer),
                w = u.blockLimit,
                x = v.blockLimit,
                y = u.block,
                z = v.block,
                A = null;
                if (!w.equals(x)) return null;
                if (t != 'br') {
                    if (!y) {
                        y = D.fixBlock(true, t);
                        z = new d.elementPath(D.endContainer).block;
                    }
                    if (!z) z = D.fixBlock(false, t);
                }
                var B = y && D.checkStartOfBlock(),
                C = z && D.checkEndOfBlock();
                D.deleteContents();
                if (y && y.equals(z)) if (C) {
                    A = new d.elementPath(D.startContainer);
                    D.moveToPosition(z, 4);
                    z = null;
                } else if (B) {
                    A = new d.elementPath(D.startContainer);
                    D.moveToPosition(y, 3);
                    y = null;
                } else {
                    z = D.splitElement(y);
                    if (!c && !y.is('ul', 'ol')) y.appendBogus();
                }
                return {
                    previousBlock: y,
                    nextBlock: z,
                    wasStartOfBlock: B,
                    wasEndOfBlock: C,
                    elementPath: A
                };
            },
            splitElement: function(t) {
                var w = this;
                if (!w.collapsed) return null;
                w.setEndAt(t, 2);
                var u = w.extractContents(),
                v = t.clone(false);
                u.appendTo(v);
                v.insertAfter(t);
                w.moveToPosition(t, 4);
                return v;
            },
            checkBoundaryOfElement: function(t, u) {
                var v = this.clone();
                v[u == 1 ? 'setStartAt': 'setEndAt'](t, u == 1 ? 1 : 2);
                var w = new d.walker(v),
                x = false;
                w.evaluator = p;
                return w[u == 1 ? 'checkBackward': 'checkForward']();
            },
            checkStartOfBlock: function() {
                var z = this;
                var t = z.startContainer,
                u = z.startOffset;
                if (u && t.type == 3) {
                    var v = e.ltrim(t.substring(0, u));
                    if (v.length) return false;
                }
                z.trim();
                var w = new d.elementPath(z.startContainer),
                x = z.clone();
                x.collapse(true);
                x.setStartAt(w.block || w.blockLimit, 1);
                var y = new d.walker(x);
                y.evaluator = o(true);
                return y.checkBackward();
            },
            checkEndOfBlock: function() {
                var z = this;
                var t = z.endContainer,
                u = z.endOffset;
                if (t.type == 3) {
                    var v = e.rtrim(t.substring(u));
                    if (v.length) return false;
                }
                z.trim();
                var w = new d.elementPath(z.endContainer),
                x = z.clone();
                x.collapse(false);
                x.setEndAt(w.block || w.blockLimit, 2);
                var y = new d.walker(x);
                y.evaluator = o(false);
                return y.checkForward();
            },
            moveToElementEditablePosition: function(t, u) {
                var v;
                while (t && t.type == 1) {
                    v = t.isEditable();
                    if (v) this.moveToPosition(t, u ? 2 : 1);
                    else if (f.$inline[t.getName()]) {
                        this.moveToPosition(t, u ? 4 : 3);
                        return true;
                    }
                    if (f.$empty[t.getName()]) t = t[u ? 'getPrevious': 'getNext'](s);
                    else t = t[u ? 'getLast': 'getFirst'](s);
                    if (t && t.type == 3) {
                        this.moveToPosition(t, u ? 4 : 3);
                        return true;
                    }
                }
                return v;
            },
            moveToElementEditStart: function(t) {
                return this.moveToElementEditablePosition(t);
            },
            moveToElementEditEnd: function(t) {
                return this.moveToElementEditablePosition(t, true);
            },
            getEnclosedNode: function() {
                var t = this.clone(),
                u = new d.walker(t),
                v = d.walker.bookmark(true),
                w = d.walker.whitespaces(true),
                x = function(z) {
                    return w(z) && v(z);
                };
                t.evaluator = x;
                var y = u.next();
                u.reset();
                return y && y.equals(u.previous()) ? y: null;
            },
            getTouchedStartNode: function() {
                var t = this.startContainer;
                if (this.collapsed || t.type != 1) return t;
                return t.getChild(this.startOffset) || t;
            },
            getTouchedEndNode: function() {
                var t = this.endContainer;
                if (this.collapsed || t.type != 1) return t;
                return t.getChild(this.endOffset - 1) || t;
            }
        };
    })();
    a.POSITION_AFTER_START = 1;
    a.POSITION_BEFORE_END = 2;
    a.POSITION_BEFORE_START = 3;
    a.POSITION_AFTER_END = 4;
    a.ENLARGE_ELEMENT = 1;
    a.ENLARGE_BLOCK_CONTENTS = 2;
    a.ENLARGE_LIST_ITEM_CONTENTS = 3;
    a.START = 1;
    a.END = 2;
    a.STARTEND = 3;
    (function() {
        var l = c && b.version < 7,
        m = c && b.version == 7,
        n = l ? a.basePath + 'images/spacer.gif': m ? 'about:blank': 'data:image/png;base64,',
        o = h.createFromHtml('<div style="width:0px;height:0px;position:absolute;left:-10000px;background-image:url(' + n + ')"></div>', a.document);
        o.appendTo(a.document.getHead());
        try {
            b.hc = o.getComputedStyle('background-image') == 'none';
        } catch(p) {
            b.hc = false;
        }
        if (b.hc) b.cssClass += ' cke_hc';
        o.remove();
    })();
    j.load(i.corePlugins.split(','),
    function() {
        a.status = 'loaded';
        a.fire('loaded');
        var l = a._.pending;
        if (l) {
            delete a._.pending;
            for (var m = 0; m < l.length; m++) a.add(l[m]);
        }
    });
    a.skins.add('kama', (function() {
        var l = [],
        m = 'cke_ui_color';
        if (c && b.version < 7) l.push('icons.png', 'images/sprites_ie6.png', 'images/dialog_sides.gif');
        return {
            preload: l,
            editor: {
                css: ['editor.css']
            },
            dialog: {
                css: ['dialog.css']
            },
            templates: {
                css: ['templates.css']
            },
            margins: [0, 0, 0, 0],
            init: function(n) {
                if (n.config.width && !isNaN(n.config.width)) n.config.width -= 12;
                var o = [],
                p = /\$color/g,
                q = '/* UI Color Support */.cke_skin_kama .cke_menuitem .cke_icon_wrapper{\tbackground-color: $color !important;\tborder-color: $color !important;}.cke_skin_kama .cke_menuitem a:hover .cke_icon_wrapper,.cke_skin_kama .cke_menuitem a:focus .cke_icon_wrapper,.cke_skin_kama .cke_menuitem a:active .cke_icon_wrapper{\tbackground-color: $color !important;\tborder-color: $color !important;}.cke_skin_kama .cke_menuitem a:hover .cke_label,.cke_skin_kama .cke_menuitem a:focus .cke_label,.cke_skin_kama .cke_menuitem a:active .cke_label{\tbackground-color: $color !important;}.cke_skin_kama .cke_menuitem a.cke_disabled:hover .cke_label,.cke_skin_kama .cke_menuitem a.cke_disabled:focus .cke_label,.cke_skin_kama .cke_menuitem a.cke_disabled:active .cke_label{\tbackground-color: transparent !important;}.cke_skin_kama .cke_menuitem a.cke_disabled:hover .cke_icon_wrapper,.cke_skin_kama .cke_menuitem a.cke_disabled:focus .cke_icon_wrapper,.cke_skin_kama .cke_menuitem a.cke_disabled:active .cke_icon_wrapper{\tbackground-color: $color !important;\tborder-color: $color !important;}.cke_skin_kama .cke_menuitem a.cke_disabled .cke_icon_wrapper{\tbackground-color: $color !important;\tborder-color: $color !important;}.cke_skin_kama .cke_menuseparator{\tbackground-color: $color !important;}.cke_skin_kama .cke_menuitem a:hover,.cke_skin_kama .cke_menuitem a:focus,.cke_skin_kama .cke_menuitem a:active{\tbackground-color: $color !important;}';
                if (b.webkit) {
                    q = q.split('}').slice(0, -1);
                    for (var r = 0; r < q.length; r++) q[r] = q[r].split('{');
                }
                function s(v) {
                    var w = v.getById(m);
                    if (!w) {
                        w = v.getHead().append('style');
                        w.setAttribute('id', m);
                        w.setAttribute('type', 'text/css');
                    }
                    return w;
                };
                function t(v, w, x) {
                    var y, z, A;
                    for (var B = 0; B < v.length; B++) {
                        if (b.webkit) for (z = 0; z < w.length; z++) {
                            A = w[z][1];
                            for (y = 0; y < x.length; y++) A = A.replace(x[y][0], x[y][1]);
                            v[B].$.sheet.addRule(w[z][0], A);
                        } else {
                            A = w;
                            for (y = 0; y < x.length; y++) A = A.replace(x[y][0], x[y][1]);
                            if (c) v[B].$.styleSheet.cssText += A;
                            else v[B].$.innerHTML += A;
                        }
                    }
                };
                var u = /\$color/g;
                e.extend(n, {
                    uiColor: null,
                    getUiColor: function() {
                        return this.uiColor;
                    },
                    setUiColor: function(v) {
                        var w, x = s(a.document),
                        y = '.cke_editor_' + e.escapeCssSelector(n.name),
                        z = [y + ' .cke_wrapper', y + '_dialog .cke_dialog_contents', y + '_dialog a.cke_dialog_tab', y + '_dialog .cke_dialog_footer'].join(','),
                        A = 'background-color: $color !important;';
                        if (b.webkit) w = [[z, A]];
                        else w = z + '{' + A + '}';
                        return (this.setUiColor = function(B) {
                            var C = [[u, B]];
                            n.uiColor = B;
                            t([x], w, C);
                            t(o, q, C);
                        })(v);
                    }
                });
                n.on('menuShow',
                function(v) {
                    var w = v.data[0],
                    x = w.element.getElementsByTag('iframe').getItem(0).getFrameDocument();
                    if (!x.getById('cke_ui_color')) {
                        var y = s(x);
                        o.push(y);
                        var z = n.getUiColor();
                        if (z) t([y], q, [[u, z]]);
                    }
                });
                if (n.config.uiColor) n.setUiColor(n.config.uiColor);
            }
        };
    })());
    (function() {
        a.dialog ? l() : a.on('dialogPluginReady', l);
        function l() {
            a.dialog.on('resize',
            function(m) {
                var n = m.data,
                o = n.width,
                p = n.height,
                q = n.dialog,
                r = q.parts.contents;
                if (n.skin != 'kama') return;
                r.setStyles({
                    width: o + 'px',
                    height: p + 'px'
                });
                setTimeout(function() {
                    var s = q.parts.dialog.getChild([0, 0, 0]),
                    t = s.getChild(0),
                    u = s.getChild(2);
                    u.setStyle('width', t.$.offsetWidth + 'px');
                    u = s.getChild(7);
                    u.setStyle('width', t.$.offsetWidth - 28 + 'px');
                    u = s.getChild(4);
                    u.setStyle('height', t.$.offsetHeight - 31 - 14 + 'px');
                    u = s.getChild(5);
                    u.setStyle('height', t.$.offsetHeight - 31 - 14 + 'px');
                },
                100);
            });
        };
    })();
    j.add('about', {
        init: function(l) {
            var m = l.addCommand('about', new a.dialogCommand('about'));
            m.modes = {
                wysiwyg: 1,
                source: 1
            };
            m.canUndo = false;
            l.ui.addButton('About', {
                label: l.lang.about.title,
                command: 'about'
            });
            a.dialog.add('about', this.path + 'dialogs/about.js');
        }
    });
    j.add('basicstyles', {
        requires: ['styles', 'button'],
        init: function(l) {
            var m = function(p, q, r, s) {
                var t = new a.style(s);
                l.attachStyleStateChange(t,
                function(u) {
                    l.getCommand(r).setState(u);
                });
                l.addCommand(r, new a.styleCommand(t));
                l.ui.addButton(p, {
                    label: q,
                    command: r
                });
            },
            n = l.config,
            o = l.lang;
            m('Bold', o.bold, 'bold', n.coreStyles_bold);
            m('Italic', o.italic, 'italic', n.coreStyles_italic);
            m('Underline', o.underline, 'underline', n.coreStyles_underline);
            m('Strike', o.strike, 'strike', n.coreStyles_strike);
            m('Subscript', o.subscript, 'subscript', n.coreStyles_subscript);
            m('Superscript', o.superscript, 'superscript', n.coreStyles_superscript);
        }
    });
    i.coreStyles_bold = {
        element: 'strong',
        overrides: 'b'
    };
    i.coreStyles_italic = {
        element: 'em',
        overrides: 'i'
    };
    i.coreStyles_underline = {
        element: 'u'
    };
    i.coreStyles_strike = {
        element: 'strike'
    };
    i.coreStyles_subscript = {
        element: 'sub'
    };
    i.coreStyles_superscript = {
        element: 'sup'
    };
    (function() {
        function l(p, q) {
            var r = q.block || q.blockLimit;
            if (!r || r.getName() == 'body') return 2;
            if (r.getAscendant('blockquote', true)) return 1;
            return 2;
        };
        function m(p) {
            var q = p.editor,
            r = q.getCommand('blockquote');
            r.state = l(q, p.data.path);
            r.fire('state');
        };
        function n(p) {
            for (var q = 0, r = p.getChildCount(), s; q < r && (s = p.getChild(q)); q++) {
                if (s.type == 1 && s.isBlockBoundary()) return false;
            }
            return true;
        };
        var o = {
            exec: function(p) {
                var q = p.getCommand('blockquote').state,
                r = p.getSelection(),
                s = r && r.getRanges()[0];
                if (!s) return;
                var t = r.createBookmarks();
                if (c) {
                    var u = t[0].startNode,
                    v = t[0].endNode,
                    w;
                    if (u && u.getParent().getName() == 'blockquote') {
                        w = u;
                        while (w = w.getNext()) {
                            if (w.type == 1 && w.isBlockBoundary()) {
                                u.move(w, true);
                                break;
                            }
                        }
                    }
                    if (v && v.getParent().getName() == 'blockquote') {
                        w = v;
                        while (w = w.getPrevious()) {
                            if (w.type == 1 && w.isBlockBoundary()) {
                                v.move(w);
                                break;
                            }
                        }
                    }
                }
                var x = s.createIterator(),
                y;
                if (q == 2) {
                    var z = [];
                    while (y = x.getNextParagraph()) z.push(y);
                    if (z.length < 1) {
                        var A = p.document.createElement(p.config.enterMode == 1 ? 'p': 'div'),
                        B = t.shift();
                        s.insertNode(A);
                        A.append(new d.text('﻿', p.document));
                        s.moveToBookmark(B);
                        s.selectNodeContents(A);
                        s.collapse(true);
                        B = s.createBookmark();
                        z.push(A);
                        t.unshift(B);
                    }
                    var C = z[0].getParent(),
                    D = [];
                    for (var E = 0; E < z.length; E++) {
                        y = z[E];
                        C = C.getCommonAncestor(y.getParent());
                    }
                    var F = {
                        table: 1,
                        tbody: 1,
                        tr: 1,
                        ol: 1,
                        ul: 1
                    };
                    while (F[C.getName()]) C = C.getParent();
                    var G = null;
                    while (z.length > 0) {
                        y = z.shift();
                        while (!y.getParent().equals(C)) y = y.getParent();
                        if (!y.equals(G)) D.push(y);
                        G = y;
                    }
                    while (D.length > 0) {
                        y = D.shift();
                        if (y.getName() == 'blockquote') {
                            var H = new d.documentFragment(p.document);
                            while (y.getFirst()) {
                                H.append(y.getFirst().remove());
                                z.push(H.getLast());
                            }
                            H.replace(y);
                        } else z.push(y);
                    }
                    var I = p.document.createElement('blockquote');
                    I.insertBefore(z[0]);
                    while (z.length > 0) {
                        y = z.shift();
                        I.append(y);
                    }
                } else if (q == 1) {
                    var J = [],
                    K = {};
                    while (y = x.getNextParagraph()) {
                        var L = null,
                        M = null;
                        while (y.getParent()) {
                            if (y.getParent().getName() == 'blockquote') {
                                L = y.getParent();
                                M = y;
                                break;
                            }
                            y = y.getParent();
                        }
                        if (L && M && !M.getCustomData('blockquote_moveout')) {
                            J.push(M);
                            h.setMarker(K, M, 'blockquote_moveout', true);
                        }
                    }
                    h.clearAllMarkers(K);
                    var N = [],
                    O = [];
                    K = {};
                    while (J.length > 0) {
                        var P = J.shift();
                        I = P.getParent();
                        if (!P.getPrevious()) P.remove().insertBefore(I);
                        else if (!P.getNext()) P.remove().insertAfter(I);
                        else {
                            P.breakParent(P.getParent());
                            O.push(P.getNext());
                        }
                        if (!I.getCustomData('blockquote_processed')) {
                            O.push(I);
                            h.setMarker(K, I, 'blockquote_processed', true);
                        }
                        N.push(P);
                    }
                    h.clearAllMarkers(K);
                    for (E = O.length - 1; E >= 0; E--) {
                        I = O[E];
                        if (n(I)) I.remove();
                    }
                    if (p.config.enterMode == 2) {
                        var Q = true;
                        while (N.length) {
                            P = N.shift();
                            if (P.getName() == 'div') {
                                H = new d.documentFragment(p.document);
                                var R = Q && P.getPrevious() && !(P.getPrevious().type == 1 && P.getPrevious().isBlockBoundary());
                                if (R) H.append(p.document.createElement('br'));
                                var S = P.getNext() && !(P.getNext().type == 1 && P.getNext().isBlockBoundary());
                                while (P.getFirst()) P.getFirst().remove().appendTo(H);
                                if (S) H.append(p.document.createElement('br'));
                                H.replace(P);
                                Q = false;
                            }
                        }
                    }
                }
                r.selectBookmarks(t);
                p.focus();
            }
        };
        j.add('blockquote', {
            init: function(p) {
                p.addCommand('blockquote', o);
                p.ui.addButton('Blockquote', {
                    label: p.lang.blockquote,
                    command: 'blockquote'
                });
                p.on('selectionChange', m);
            },
            requires: ['domiterator']
        });
    })();
    j.add('button', {
        beforeInit: function(l) {
            l.ui.addHandler(1, k.button.handler);
        }
    });
    a.UI_BUTTON = 1;
    k.button = function(l) {
        e.extend(this, l, {
            title: l.label,
            className: l.className || l.command && 'cke_button_' + l.command || '',
            click: l.click || (function(m) {
                m.execCommand(l.command);
            })
        });
        this._ = {};
    };
    k.button.handler = {
        create: function(l) {
            return new k.button(l);
        }
    };
    k.button.prototype = {
        canGroup: true,
        render: function(l, m) {
            var n = b,
            o = this._.id = 'cke_' + e.getNextNumber();
            this._.editor = l;
            var p = {
                id: o,
                button: this,
                editor: l,
                focus: function() {
                    var v = a.document.getById(o);
                    v.focus();
                },
                execute: function() {
                    this.button.click(l);
                }
            },
            q = e.addFunction(p.execute, p),
            r = k.button._.instances.push(p) - 1,
            s = '',
            t = this.command;
            if (this.modes) l.on('mode',
            function() {
                this.setState(this.modes[l.mode] ? 2 : 0);
            },
            this);
            else if (t) {
                t = l.getCommand(t);
                if (t) {
                    t.on('state',
                    function() {
                        this.setState(t.state);
                    },
                    this);
                    s += 'cke_' + (t.state == 1 ? 'on': t.state == 0 ? 'disabled': 'off');
                }
            }
            if (!t) s += 'cke_off';
            if (this.className) s += ' ' + this.className;
            m.push('<span class="cke_button">', '<a id="', o, '" class="', s, '" href="javascript:void(\'', (this.title || '').replace("'", ''), '\')" title="', this.title, '" tabindex="-1" hidefocus="true"');
            if (n.opera || n.gecko && n.mac) m.push(' onkeypress="return false;"');
            if (n.gecko) m.push(' onblur="this.style.cssText = this.style.cssText;"');
            m.push(' onkeydown="return CKEDITOR.ui.button._.keydown(', r, ', event);" onfocus="return CKEDITOR.ui.button._.focus(', r, ', event);" onclick="CKEDITOR.tools.callFunction(', q, ', this); return false;"><span class="cke_icon"');
            if (this.icon) {
                var u = (this.iconOffset || 0) * -16;
                m.push(' style="background-image:url(', a.getUrl(this.icon), ');background-position:0 ' + u + 'px;"');
            }
            m.push('></span><span class="cke_label">', this.label, '</span>');
            if (this.hasArrow) m.push('<span class="cke_buttonarrow"></span>');
            m.push('</a>', '</span>');
            if (this.onRender) this.onRender();
            return p;
        },
        setState: function(l) {
            var q = this;
            if (q._.state == l) return;
            var m = a.document.getById(q._.id);
            if (m) {
                m.setState(l);
                var n = q.title,
                o = q._.editor.lang.common.unavailable,
                p = m.getChild(1);
                if (l == 0) n = o.replace('%1', q.title);
                p.setHtml(n);
            }
            q._.state = l;
        }
    };
    k.button._ = {
        instances: [],
        keydown: function(l, m) {
            var n = k.button._.instances[l];
            if (n.onkey) {
                m = new d.event(m);
                return n.onkey(n, m.getKeystroke()) !== false;
            }
        },
        focus: function(l, m) {
            var n = k.button._.instances[l],
            o;
            if (n.onfocus) o = n.onfocus(n, new d.event(m)) !== false;
            if (b.gecko && b.version < 10900) m.preventBubble();
            return o;
        }
    };
    k.prototype.addButton = function(l, m) {
        this.add(l, 1, m);
    };
    (function() {
        var l = function(r, s) {
            var t = r.document,
            u = t.getBody(),
            v = false,
            w = function() {
                v = true;
            };
            u.on(s, w);
            t.$.execCommand(s);
            u.removeListener(s, w);
            return v;
        },
        m = c ?
        function(r, s) {
            return l(r, s);
        }: function(r, s) {
            try {
                return r.document.$.execCommand(s);
            } catch(t) {
                return false;
            }
        },
        n = function(r) {
            this.type = r;
            this.canUndo = this.type == 'cut';
        };
        n.prototype = {
            exec: function(r, s) {
                var t = m(r, this.type);
                if (!t) alert(r.lang.clipboard[this.type + 'Error']);
                return t;
            }
        };
        var o = {
            canUndo: false,
            exec: c ?
            function(r) {
                r.focus();
                if (!r.document.getBody().fire('beforepaste') && !l(r, 'paste')) {
                    r.fire('pasteDialog');
                    return false;
                }
            }: function(r) {
                try {
                    if (!r.document.getBody().fire('beforepaste') && !r.document.$.execCommand('Paste', false, null)) throw 0;
                } catch(s) {
                    setTimeout(function() {
                        r.fire('pasteDialog');
                    },
                    0);
                    return false;
                }
            }
        },
        p = function(r) {
            if (this.mode != 'wysiwyg') return;
            switch (r.data.keyCode) {
            case 1000 + 86 : case 2000 + 45 : var s = this.document.getBody();
                if (!c && s.fire('beforepaste')) r.cancel();
                else if (b.opera || b.gecko && b.version < 10900) s.fire('paste');
                return;
            case 1000 + 88 : case 2000 + 46 : var t = this;
                this.fire('saveSnapshot');
                setTimeout(function() {
                    t.fire('saveSnapshot');
                },
                0);
            }
        };
        function q(r, s, t) {
            var u = this.document;
            if (c && u.getById('cke_pastebin')) return;
            var v = this.getSelection(),
            w = new d.range(u),
            x = new h(s == 'text' ? 'textarea': 'div', u);
            x.setAttribute('id', 'cke_pastebin');
            b.webkit && x.append(u.createText('\xa0'));
            u.getBody().append(x);
            if (!c && s != 'html') x.setStyles({
                position: 'absolute',
                left: '-1000px',
                top: v.getStartElement().getDocumentPosition().y + 'px',
                width: '1px',
                height: '1px',
                overflow: 'hidden'
            });
            var y = v.createBookmarks();
            if (s == 'text') {
                if (c) {
                    var z = u.getBody().$.createTextRange();
                    z.moveToElementText(x.$);
                    z.execCommand('Paste');
                    r.data.preventDefault();
                } else {
                    u.$.designMode = 'off';
                    x.$.focus();
                }
            } else {
                w.setStartAt(x, 1);
                w.setEndAt(x, 2);
                w.select(true);
            }
            window.setTimeout(function() {
                s == 'text' && !c && (u.$.designMode = 'on');
                x.remove();
                var A;
                x = b.webkit && (A = x.getFirst()) && A.is && A.hasClass('Apple-style-span') ? A: x;
                v.selectBookmarks(y);
                t(x['get' + (s == 'text' ? 'Value': 'Html')]());
            },
            0);
        };
        j.add('clipboard', {
            requires: ['htmldataprocessor'],
            init: function(r) {
                r.on('paste',
                function(w) {
                    var x = w.data;
                    if (x.html) r.insertHtml(x.html);
                    else if (x.text) r.insertText(x.text);
                },
                null, null, 1000);
                r.on('pasteDialog',
                function(w) {
                    setTimeout(function() {
                        r.openDialog('paste');
                    },
                    0);
                });
                function s(w, x, y, z) {
                    var A = r.lang[x];
                    r.addCommand(x, y);
                    r.ui.addButton(w, {
                        label: A,
                        command: x
                    });
                    if (r.addMenuItems) r.addMenuItem(x, {
                        label: A,
                        command: x,
                        group: 'clipboard',
                        order: z
                    });
                };
                s('Cut', 'cut', new n('cut'), 1);
                s('Copy', 'copy', new n('copy'), 4);
                s('Paste', 'paste', o, 8);
                a.dialog.add('paste', a.getUrl(this.path + 'dialogs/paste.js'));
                r.on('key', p, r);
                var t = r.config.forcePasteAsPlainText ? 'text': 'html';
                r.on('contentDom',
                function() {
                    var w = r.document.getBody();
                    w.on(t == 'text' && c ? 'paste': 'beforepaste',
                    function(x) {
                        if (u) return;
                        q.call(r, x, t,
                        function(y) {
                            if (!y) return;
                            var z = {};
                            z[t] = y;
                            r.fire('paste', z);
                        });
                    });
                });
                if (r.contextMenu) {
                    var u;
                    function v(w) {
                        c && w == 'Paste' && (u = 1);
                        var x = r.document.$.queryCommandEnabled(w) ? 2 : 0;
                        u = 0;
                        return x;
                    };
                    r.contextMenu.addListener(function() {
                        return {
                            cut: v('Cut'),
                            copy: v('Cut'),
                            paste: b.webkit ? 2 : v('Paste')
                        };
                    });
                }
            }
        });
    })();
    j.add('colorbutton', {
        requires: ['panelbutton', 'floatpanel', 'styles'],
        init: function(l) {
            var m = l.config,
            n = l.lang.colorButton,
            o;
            if (!b.hc) {
                p('TextColor', 'fore', n.textColorTitle);
                p('BGColor', 'back', n.bgColorTitle);
            }
            function p(r, s, t) {
                l.ui.add(r, 4, {
                    label: t,
                    title: t,
                    className: 'cke_button_' + r.toLowerCase(),
                    modes: {
                        wysiwyg: 1
                    },
                    panel: {
                        css: l.skin.editor.css
                    },
                    onBlock: function(u, v) {
                        var w = u.addBlock(v);
                        w.autoSize = true;
                        w.element.addClass('cke_colorblock');
                        w.element.setHtml(q(u, s));
                        var x = w.keys;
                        x[39] = 'next';
                        x[9] = 'next';
                        x[37] = 'prev';
                        x[2000 + 9] = 'prev';
                        x[32] = 'click';
                    }
                });
            };
            function q(r, s) {
                var t = [],
                u = m.colorButton_colors.split(','),
                v = e.addFunction(function(z, A) {
                    if (z == '?') {
                        var B = arguments.callee;
                        function C(E) {
                            this.removeListener('ok', C);
                            this.removeListener('cancel', C);
                            E.name == 'ok' && B(this.getContentElement('picker', 'selectedColor').getValue(), A);
                        };
                        l.openDialog('colordialog',
                        function() {
                            this.on('ok', C);
                            this.on('cancel', C);
                        });
                        return;
                    }
                    l.focus();
                    r.hide();
                    var D = new a.style(m['colorButton_' + A + 'Style'], z && {
                        color: z
                    });
                    l.fire('saveSnapshot');
                    if (z) D.apply(l.document);
                    else D.remove(l.document);
                    l.fire('saveSnapshot');
                });
                t.push('<a class="cke_colorauto" _cke_focus=1 hidefocus=true title="', n.auto, '" onclick="CKEDITOR.tools.callFunction(', v, ",null,'", s, "');return false;\" href=\"javascript:void('", n.auto, '\')"><table cellspacing=0 cellpadding=0 width="100%"><tr><td><span class="cke_colorbox" style="background-color:#000"></span></td><td colspan=7 align=center>', n.auto, '</td></tr></table></a><table cellspacing=0 cellpadding=0 width="100%">');
                for (var w = 0; w < u.length; w++) {
                    if (w % 8 === 0) t.push('</tr><tr>');
                    var x = u[w],
                    y = l.lang.colors[x] || x;
                    t.push('<td><a class="cke_colorbox" _cke_focus=1 hidefocus=true title="', y, '" onclick="CKEDITOR.tools.callFunction(', v, ",'#", x, "','", s, "'); return false;\" href=\"javascript:void('", y, '\')"><span class="cke_colorbox" style="background-color:#', x, '"></span></a></td>');
                }
                if (m.colorButton_enableMore) t.push('</tr><tr><td colspan=8 align=center><a class="cke_colormore" _cke_focus=1 hidefocus=true title="', n.more, '" onclick="CKEDITOR.tools.callFunction(', v, ",'?','", s, "');return false;\" href=\"javascript:void('", n.more, "')\">", n.more, '</a></td>');
                t.push('</tr></table>');
                return t.join('');
            };
        }
    });
    i.colorButton_enableMore = true;
    i.colorButton_colors = '000,800000,8B4513,2F4F4F,008080,000080,4B0082,696969,B22222,A52A2A,DAA520,006400,40E0D0,0000CD,800080,808080,F00,FF8C00,FFD700,008000,0FF,00F,EE82EE,A9A9A9,FFA07A,FFA500,FFFF00,00FF00,AFEEEE,ADD8E6,DDA0DD,D3D3D3,FFF0F5,FAEBD7,FFFFE0,F0FFF0,F0FFFF,F0F8FF,E6E6FA,FFF';
    i.colorButton_foreStyle = {
        element: 'span',
        styles: {
            color: '#(color)'
        },
        overrides: [{
            element: 'font',
            attributes: {
                color: null
            }
        }]
    };
    i.colorButton_backStyle = {
        element: 'span',
        styles: {
            'background-color': '#(color)'
        }
    };
    (function() {
        j.colordialog = {
            init: function(l) {
                l.addCommand('colordialog', new a.dialogCommand('colordialog'));
                a.dialog.add('colordialog', this.path + 'dialogs/colordialog.js');
            }
        };
        j.add('colordialog', j.colordialog);
    })();
    j.add('contextmenu', {
        requires: ['menu'],
        beforeInit: function(l) {
            l.contextMenu = new j.contextMenu(l);
            l.addCommand('contextMenu', {
                exec: function() {
                    l.contextMenu.show(l.document.getBody());
                }
            });
        }
    });
    j.contextMenu = e.createClass({
        $: function(l) {
            this.id = 'cke_' + e.getNextNumber();
            this.editor = l;
            this._.listeners = [];
            this._.functionId = e.addFunction(function(m) {
                this._.panel.hide();
                l.focus();
                l.execCommand(m);
            },
            this);
        },
        _: {
            onMenu: function(l, m, n, o) {
                var p = this._.menu,
                q = this.editor;
                if (p) {
                    p.hide();
                    p.removeAll();
                } else {
                    p = this._.menu = new a.menu(q);
                    p.onClick = e.bind(function(z) {
                        var A = true;
                        p.hide();
                        if (c) p.onEscape();
                        if (z.onClick) z.onClick();
                        else if (z.command) q.execCommand(z.command);
                        A = false;
                    },
                    this);
                    p.onEscape = function() {
                        q.focus();
                        if (c) q.getSelection().unlock(true);
                    };
                }
                var r = this._.listeners,
                s = [],
                t = this.editor.getSelection(),
                u = t && t.getStartElement();
                p.onHide = e.bind(function() {
                    p.onHide = null;
                    if (c) {
                        var z = q.getSelection();
                        z && z.unlock();
                    }
                    this.onHide && this.onHide();
                },
                this);
                for (var v = 0; v < r.length; v++) {
                    var w = r[v](u, t);
                    if (w) for (var x in w) {
                        var y = this.editor.getMenuItem(x);
                        if (y) {
                            y.state = w[x];
                            p.add(y);
                        }
                    }
                }
                p.items.length && p.show(l, m || (q.lang.dir == 'rtl' ? 2 : 1), n, o);
            }
        },
        proto: {
            addTarget: function(l, m) {
                if (b.opera) {
                    var n;
                    l.on('mousedown',
                    function(r) {
                        r = r.data;
                        if (r.$.button != 2) {
                            if (r.getKeystroke() == 1000 + 1) l.fire('contextmenu', r);
                            return;
                        }
                        if (m && (r.$.ctrlKey || r.$.metaKey)) return;
                        var s = r.getTarget();
                        if (!n) {
                            var t = s.getDocument();
                            n = t.createElement('input');
                            n.$.type = 'button';
                            t.getBody().append(n);
                        }
                        n.setAttribute('style', 'position:absolute;top:' + (r.$.clientY - 2) + 'px;left:' + (r.$.clientX - 2) + 'px;width:5px;height:5px;opacity:0.01');
                    });
                    l.on('mouseup',
                    function(r) {
                        if (n) {
                            n.remove();
                            n = undefined;
                            l.fire('contextmenu', r.data);
                        }
                    });
                }
                l.on('contextmenu',
                function(r) {
                    var s = r.data;
                    if (m && (b.webkit ? o: s.$.ctrlKey || s.$.metaKey)) return;
                    if (c) {
                        var t = this.editor.getSelection();
                        t && t.lock();
                    }
                    s.preventDefault();
                    var u = s.getTarget().getDocument().getDocumentElement(),
                    v = s.$.clientX,
                    w = s.$.clientY;
                    e.setTimeout(function() {
                        this._.onMenu(u, null, v, w);
                    },
                    0, this);
                },
                this);
                if (b.webkit) {
                    var o, p = function(r) {
                        o = r.data.$.ctrlKey || r.data.$.metaKey;
                    },
                    q = function() {
                        o = 0;
                    };
                    l.on('keydown', p);
                    l.on('keyup', q);
                    l.on('contextmenu', q);
                }
            },
            addListener: function(l) {
                this._.listeners.push(l);
            },
            show: function(l, m, n, o) {
                this.editor.focus();
                this._.onMenu(l || a.document.getDocumentElement(), m, n || 0, o || 0);
            }
        }
    });
    (function() {
        j.add('div', {
            requires: ['editingblock', 'domiterator'],
            init: function(l) {
                var m = l.lang.div;
                l.addCommand('creatediv', new a.dialogCommand('creatediv'));
                l.addCommand('editdiv', new a.dialogCommand('editdiv'));
                l.addCommand('removediv', {
                    exec: function(n) {
                        var o = n.getSelection(),
                        p = o && o.getRanges(),
                        q,
                        r = o.createBookmarks(),
                        s,
                        t = [];
                        function u(w) {
                            var x = new d.elementPath(w),
                            y = x.blockLimit,
                            z = y.is('div') && y;
                            if (z && !z.getAttribute('_cke_div_added')) {
                                t.push(z);
                                z.setAttribute('_cke_div_added');
                            }
                        };
                        for (var v = 0; v < p.length; v++) {
                            q = p[v];
                            if (q.collapsed) u(o.getStartElement());
                            else {
                                s = new d.walker(q);
                                s.evaluator = u;
                                s.lastForward();
                            }
                        }
                        for (v = 0; v < t.length; v++) t[v].remove(true);
                        o.selectBookmarks(r);
                    }
                });
                l.ui.addButton('CreateDiv', {
                    label: m.toolbar,
                    command: 'creatediv'
                });
                if (l.addMenuItems) {
                    l.addMenuItems({
                        editdiv: {
                            label: m.edit,
                            command: 'editdiv',
                            group: 'div',
                            order: 1
                        },
                        removediv: {
                            label: m.remove,
                            command: 'removediv',
                            group: 'div',
                            order: 5
                        }
                    });
                    if (l.contextMenu) l.contextMenu.addListener(function(n, o) {
                        if (!n) return null;
                        var p = new d.elementPath(n),
                        q = p.blockLimit;
                        if (q && q.getAscendant('div', true)) return {
                            editdiv: 2,
                            removediv: 2
                        };
                        return null;
                    });
                }
                a.dialog.add('creatediv', this.path + 'dialogs/div.js');
                a.dialog.add('editdiv', this.path + 'dialogs/div.js');
            }
        });
    })();
    (function() {
        var l = {
            toolbarFocus: {
                exec: function(n) {
                    var o = n._.elementsPath.idBase,
                    p = a.document.getById(o + '0');
                    if (p) p.focus();
                }
            }
        },
        m = '<span class="cke_empty">&nbsp;</span>';
        j.add('elementspath', {
            requires: ['selection'],
            init: function(n) {
                var o = 'cke_path_' + n.name,
                p, q = function() {
                    if (!p) p = a.document.getById(o);
                    return p;
                },
                r = 'cke_elementspath_' + e.getNextNumber() + '_';
                n._.elementsPath = {
                    idBase: r
                };
                n.on('themeSpace',
                function(s) {
                    if (s.data.space == 'bottom') s.data.html += '<div id="' + o + '" class="cke_path">' + m + '</div>';
                });
                n.on('selectionChange',
                function(s) {
                    var t = b,
                    u = s.data.selection,
                    v = u.getStartElement(),
                    w = [],
                    x = this._.elementsPath.list = [];
                    while (v) {
                        var y = x.push(v) - 1,
                        z;
                        if (v.getAttribute('_cke_real_element_type')) z = v.getAttribute('_cke_real_element_type');
                        else z = v.getName();
                        var A = '';
                        if (t.opera || t.gecko && t.mac) A += ' onkeypress="return false;"';
                        if (t.gecko) A += ' onblur="this.style.cssText = this.style.cssText;"';
                        w.unshift('<a id="', r, y, '" href="javascript:void(\'', z, '\')" tabindex="-1" title="', n.lang.elementsPath.eleTitle.replace(/%1/, z), '"' + (b.gecko && b.version < 10900 ? ' onfocus="event.preventBubble();"': '') + ' hidefocus="true" ' + " onkeydown=\"return CKEDITOR._.elementsPath.keydown('", this.name, "',", y, ', event);"' + A, " onclick=\"return CKEDITOR._.elementsPath.click('", this.name, "',", y, ');">', z, '</a>');
                        if (z == 'body') break;
                        v = v.getParent();
                    }
                    q().setHtml(w.join('') + m);
                });
                n.on('contentDomUnload',
                function() {
                    q().setHtml(m);
                });
                n.addCommand('elementsPathFocus', l.toolbarFocus);
            }
        });
    })();
    a._.elementsPath = {
        click: function(l, m) {
            var n = a.instances[l];
            n.focus();
            var o = n._.elementsPath.list[m];
            n.getSelection().selectElement(o);
            return false;
        },
        keydown: function(l, m, n) {
            var o = k.button._.instances[m],
            p = a.instances[l],
            q = p._.elementsPath.idBase,
            r;
            n = new d.event(n);
            switch (n.getKeystroke()) {
            case 37:
            case 9:
                r = a.document.getById(q + (m + 1));
                if (!r) r = a.document.getById(q + '0');
                r.focus();
                return false;
            case 39:
            case 2000 + 9 : r = a.document.getById(q + (m - 1));
                if (!r) r = a.document.getById(q + (p._.elementsPath.list.length - 1));
                r.focus();
                return false;
            case 27:
                p.focus();
                return false;
            case 13:
            case 32:
                this.click(l, m);
                return false;
            }
            return true;
        }
    };
    (function() {
        j.add('enterkey', {
            requires: ['keystrokes', 'indent'],
            init: function(s) {
                var t = s.specialKeys;
                t[13] = q;
                t[2000 + 13] = p;
            }
        });
        j.enterkey = {
            enterBlock: function(s, t, u, v) {
                u = u || r(s);
                var w = u.document,
                x = t == 3 ? 'div': 'p',
                y = u.splitBlock(x);
                if (!y) return;
                var z = y.previousBlock,
                A = y.nextBlock,
                B = y.wasStartOfBlock,
                C = y.wasEndOfBlock,
                D;
                if (A) {
                    D = A.getParent();
                    if (D.is('li')) {
                        A.breakParent(D);
                        A.move(A.getNext(), true);
                    }
                } else if (z && (D = z.getParent()) && D.is('li')) {
                    z.breakParent(D);
                    u.moveToElementEditStart(z.getNext());
                    z.move(z.getPrevious());
                }
                if (!B && !C) {
                    if (A.is('li') && (D = A.getFirst(d.walker.invisible(true))) && D.is && D.is('ul', 'ol'))(c ? w.createText('\xa0') : w.createElement('br')).insertBefore(D);
                    if (A) u.moveToElementEditStart(A);
                } else {
                    if (B && C && z.is('li')) {
                        s.execCommand('outdent');
                        return;
                    }
                    var E;
                    if (z) {
                        if (!v && !o.test(z.getName())) E = z.clone();
                    } else if (A) E = A.clone();
                    if (!E) E = w.createElement(x);
                    var F = y.elementPath;
                    if (F) for (var G = 0, H = F.elements.length; G < H; G++) {
                        var I = F.elements[G];
                        if (I.equals(F.block) || I.equals(F.blockLimit)) break;
                        if (f.$removeEmpty[I.getName()]) {
                            I = I.clone();
                            E.moveChildren(I);
                            E.append(I);
                        }
                    }
                    if (!c) E.appendBogus();
                    u.insertNode(E);
                    if (c && B && (!C || !z.getChildCount())) {
                        u.moveToElementEditStart(C ? z: E);
                        u.select();
                    }
                    u.moveToElementEditStart(B && !C ? A: E);
                }
                if (!c) if (A) {
                    var J = w.createElement('span');
                    J.setHtml('&nbsp;');
                    u.insertNode(J);
                    J.scrollIntoView();
                    u.deleteContents();
                } else E.scrollIntoView();
                u.select();
            },
            enterBr: function(s, t, u, v) {
                u = u || r(s);
                var w = u.document,
                x = t == 3 ? 'div': 'p',
                y = u.checkEndOfBlock(),
                z = new d.elementPath(s.getSelection().getStartElement()),
                A = z.block,
                B = A && z.block.getName(),
                C = false;
                if (!v && B == 'li') {
                    n(s, t, u, v);
                    return;
                }
                if (!v && y && o.test(B)) {
                    w.createElement('br').insertAfter(A);
                    if (b.gecko) w.createText('').insertAfter(A);
                    u.setStartAt(A.getNext(), c ? 3 : 1);
                } else {
                    var D;
                    C = B == 'pre';
                    if (C) D = w.createText(c ? '\r': '\n');
                    else D = w.createElement('br');
                    u.deleteContents();
                    u.insertNode(D);
                    if (!c) w.createText('﻿').insertAfter(D);
                    if (y && !c) D.getParent().appendBogus();
                    if (!c) D.getNext().$.nodeValue = '';
                    if (c) u.setStartAt(D, 4);
                    else u.setStartAt(D.getNext(), 1);
                    if (!c) {
                        var E = null;
                        if (!b.gecko) {
                            E = w.createElement('span');
                            E.setHtml('&nbsp;');
                        } else E = w.createElement('br');
                        E.insertBefore(D.getNext());
                        E.scrollIntoView();
                        E.remove();
                    }
                }
                u.collapse(true);
                u.select(C);
            }
        };
        var l = j.enterkey,
        m = l.enterBr,
        n = l.enterBlock,
        o = /^h[1-6]$/;
        function p(s) {
            return q(s, s.config.shiftEnterMode, true);
        };
        function q(s, t, u) {
            if (s.mode != 'wysiwyg') return false;
            if (!t) t = s.config.enterMode;
            setTimeout(function() {
                s.fire('saveSnapshot');
                if (t == 2 || s.getSelection().getStartElement().hasAscendant('pre', true)) m(s, t, null, u);
                else n(s, t, null, u);
            },
            0);
            return true;
        };
        function r(s) {
            var t = s.getSelection().getRanges();
            for (var u = t.length - 1; u > 0; u--) t[u].deleteContents();
            return t[0];
        };
    })();
    (function() {
        var l = 'nbsp,gt,lt,quot,iexcl,cent,pound,curren,yen,brvbar,sect,uml,copy,ordf,laquo,not,shy,reg,macr,deg,plusmn,sup2,sup3,acute,micro,para,middot,cedil,sup1,ordm,raquo,frac14,frac12,frac34,iquest,times,divide,fnof,bull,hellip,prime,Prime,oline,frasl,weierp,image,real,trade,alefsym,larr,uarr,rarr,darr,harr,crarr,lArr,uArr,rArr,dArr,hArr,forall,part,exist,empty,nabla,isin,notin,ni,prod,sum,minus,lowast,radic,prop,infin,ang,and,or,cap,cup,int,there4,sim,cong,asymp,ne,equiv,le,ge,sub,sup,nsub,sube,supe,oplus,otimes,perp,sdot,lceil,rceil,lfloor,rfloor,lang,rang,loz,spades,clubs,hearts,diams,circ,tilde,ensp,emsp,thinsp,zwnj,zwj,lrm,rlm,ndash,mdash,lsquo,rsquo,sbquo,ldquo,rdquo,bdquo,dagger,Dagger,permil,lsaquo,rsaquo,euro',
        m = 'Agrave,Aacute,Acirc,Atilde,Auml,Aring,AElig,Ccedil,Egrave,Eacute,Ecirc,Euml,Igrave,Iacute,Icirc,Iuml,ETH,Ntilde,Ograve,Oacute,Ocirc,Otilde,Ouml,Oslash,Ugrave,Uacute,Ucirc,Uuml,Yacute,THORN,szlig,agrave,aacute,acirc,atilde,auml,aring,aelig,ccedil,egrave,eacute,ecirc,euml,igrave,iacute,icirc,iuml,eth,ntilde,ograve,oacute,ocirc,otilde,ouml,oslash,ugrave,uacute,ucirc,uuml,yacute,thorn,yuml,OElig,oelig,Scaron,scaron,Yuml',
        n = 'Alpha,Beta,Gamma,Delta,Epsilon,Zeta,Eta,Theta,Iota,Kappa,Lambda,Mu,Nu,Xi,Omicron,Pi,Rho,Sigma,Tau,Upsilon,Phi,Chi,Psi,Omega,alpha,beta,gamma,delta,epsilon,zeta,eta,theta,iota,kappa,lambda,mu,nu,xi,omicron,pi,rho,sigmaf,sigma,tau,upsilon,phi,chi,psi,omega,thetasym,upsih,piv';
        function o(p) {
            var q = {},
            r = [],
            s = {
                nbsp: '\xa0',
                shy: '­',
                gt: '>',
                lt: '<'
            };
            p = p.replace(/\b(nbsp|shy|gt|lt|amp)(?:,|$)/g,
            function(x, y) {
                q[s[y]] = '&' + y + ';';
                r.push(s[y]);
                return '';
            });
            p = p.split(',');
            var t = document.createElement('div'),
            u;
            t.innerHTML = '&' + p.join(';&') + ';';
            u = t.innerHTML;
            t = null;
            for (var v = 0; v < u.length; v++) {
                var w = u.charAt(v);
                q[w] = '&' + p[v] + ';';
                r.push(w);
            }
            q.regex = r.join('');
            return q;
        };
        j.add('entities', {
            afterInit: function(p) {
                var q = p.config;
                if (!q.entities) return;
                var r = p.dataProcessor,
                s = r && r.htmlFilter;
                if (s) {
                    var t = l;
                    if (q.entities_latin) t += ',' + m;
                    if (q.entities_greek) t += ',' + n;
                    if (q.entities_additional) t += ',' + q.entities_additional;
                    var u = o(t),
                    v = '[' + u.regex + ']';
                    delete u.regex;
                    if (q.entities_processNumerical) v = '[^ -~]|' + v;
                    v = new RegExp(v, 'g');
                    function w(x) {
                        return u[x] || '&#' + x.charCodeAt(0) + ';';
                    };
                    s.addRules({
                        text: function(x) {
                            return x.replace(v, w);
                        }
                    });
                }
            }
        });
    })();
    i.entities = true;
    i.entities_latin = true;
    i.entities_greek = true;
    i.entities_processNumerical = false;
    i.entities_additional = '#39';
    (function() {
        function l(u, v) {
            var w = [];
            if (!v) return u;
            else for (var x in v) w.push(x + '=' + encodeURIComponent(v[x]));
            return u + (u.indexOf('?') != -1 ? '&': '?') + w.join('&');
        };
        function m(u) {
            u += '';
            var v = u.charAt(0).toUpperCase();
            return v + u.substr(1);
        };
        function n(u) {
            var B = this;
            var v = B.getDialog(),
            w = v.getParentEditor();
            w._.filebrowserSe = B;
            var x = w.config['filebrowser' + m(v.getName()) + 'WindowWidth'] || w.config.filebrowserWindowWidth || '80%',
            y = w.config['filebrowser' + m(v.getName()) + 'WindowHeight'] || w.config.filebrowserWindowHeight || '70%',
            z = B.filebrowser.params || {};
            z.CKEditor = w.name;
            z.CKEditorFuncNum = w._.filebrowserFn;
            if (!z.langCode) z.langCode = w.langCode;
            var A = l(B.filebrowser.url, z);
            w.popup(A, x, y);
        };
        function o(u) {
            var x = this;
            var v = x.getDialog(),
            w = v.getParentEditor();
            w._.filebrowserSe = x;
            if (!v.getContentElement(x['for'][0], x['for'][1]).getInputElement().$.value) return false;
            if (!v.getContentElement(x['for'][0], x['for'][1]).getAction()) return false;
            return true;
        };
        function p(u, v, w) {
            var x = w.params || {};
            x.CKEditor = u.name;
            x.CKEditorFuncNum = u._.filebrowserFn;
            if (!x.langCode) x.langCode = u.langCode;
            v.action = l(w.url, x);
            v.filebrowser = w;
        };
        function q(u, v, w, x) {
            var y, z;
            for (var A in x) {
                y = x[A];
                if (y.type == 'hbox' || y.type == 'vbox') q(u, v, w, y.children);
                if (!y.filebrowser) continue;
                if (typeof y.filebrowser == 'string') {
                    var B = {
                        action: y.type == 'fileButton' ? 'QuickUpload': 'Browse',
                        target: y.filebrowser
                    };
                    y.filebrowser = B;
                }
                if (y.filebrowser.action == 'Browse') {
                    var C = y.filebrowser.url || u.config['filebrowser' + m(v) + 'BrowseUrl'] || u.config.filebrowserBrowseUrl;
                    if (C) {
                        y.onClick = n;
                        y.filebrowser.url = C;
                        y.hidden = false;
                    }
                } else if (y.filebrowser.action == 'QuickUpload' && y['for']) {
                    C = y.filebrowser.url || u.config['filebrowser' + m(v) + 'UploadUrl'] || u.config.filebrowserUploadUrl;
                    if (C) {
                        y.onClick = o;
                        y.filebrowser.url = C;
                        y.hidden = false;
                        p(u, w.getContents(y['for'][0]).get(y['for'][1]), y.filebrowser);
                    }
                }
            }
        };
        function r(u, v) {
            var w = v.getDialog(),
            x = v.filebrowser.target || null;
            u = u.replace(/#/g, '%23');
            if (x) {
                var y = x.split(':'),
                z = w.getContentElement(y[0], y[1]);
                if (z) {
                    z.setValue(u);
                    w.selectPage(y[0]);
                }
            }
        };
        function s(u, v, w) {
            if (w.indexOf(';') !== -1) {
                var x = w.split(';');
                for (var y = 0; y < x.length; y++) {
                    if (s(u, v, x[y])) return true;
                }
                return false;
            }
            return u.getContents(v).get(w).filebrowser && u.getContents(v).get(w).filebrowser.url;
        };
        function t(u, v) {
            var z = this;
            var w = z._.filebrowserSe.getDialog(),
            x = z._.filebrowserSe['for'],
            y = z._.filebrowserSe.filebrowser.onSelect;
            if (x) w.getContentElement(x[0], x[1]).reset();
            if (y && y.call(z._.filebrowserSe, u, v) === false) return;
            if (typeof v == 'string' && v) alert(v);
            if (u) r(u, z._.filebrowserSe);
        };
        j.add('filebrowser', {
            init: function(u, v) {
                u._.filebrowserFn = e.addFunction(t, u);
                a.on('dialogDefinition',
                function(w) {
                    for (var x in w.data.definition.contents) {
                        q(w.editor, w.data.name, w.data.definition, w.data.definition.contents[x].elements);
                        if (w.data.definition.contents[x].hidden && w.data.definition.contents[x].filebrowser) w.data.definition.contents[x].hidden = !s(w.data.definition, w.data.definition.contents[x].id, w.data.definition.contents[x].filebrowser);
                    }
                });
            }
        });
    })();
    j.add('find', {
        init: function(l) {
            var m = j.find;
            l.ui.addButton('Find', {
                label: l.lang.findAndReplace.find,
                command: 'find'
            });
            var n = l.addCommand('find', new a.dialogCommand('find'));
            n.canUndo = false;
            l.ui.addButton('Replace', {
                label: l.lang.findAndReplace.replace,
                command: 'replace'
            });
            var o = l.addCommand('replace', new a.dialogCommand('replace'));
            o.canUndo = false;
            a.dialog.add('find', this.path + 'dialogs/find.js');
            a.dialog.add('replace', this.path + 'dialogs/find.js');
        },
        requires: ['styles']
    });
    i.find_highlight = {
        element: 'span',
        styles: {
            'background-color': '#004',
            color: '#fff'
        }
    };
    (function() {
        var l = /\.swf(?:$|\?)/i,
        m = /^\d+(?:\.\d+)?$/;
        function n(q) {
            if (m.test(q)) return q + 'px';
            return q;
        };
        function o(q) {
            var r = q.attributes;
            return r.type == 'application/x-shockwave-flash' || l.test(r.src || '');
        };
        function p(q, r) {
            var s = q.createFakeParserElement(r, 'cke_flash', 'flash', true),
            t = s.attributes.style || '',
            u = r.attributes.width,
            v = r.attributes.height;
            if (typeof u != 'undefined') t = s.attributes.style = t + 'width:' + n(u) + ';';
            if (typeof v != 'undefined') t = s.attributes.style = t + 'height:' + n(v) + ';';
            return s;
        };
        j.add('flash', {
            init: function(q) {
                q.addCommand('flash', new a.dialogCommand('flash'));
                q.ui.addButton('Flash', {
                    label: q.lang.common.flash,
                    command: 'flash'
                });
                a.dialog.add('flash', this.path + 'dialogs/flash.js');
                q.addCss('img.cke_flash{background-image: url(' + a.getUrl(this.path + 'images/placeholder.png') + ');' + 'background-position: center center;' + 'background-repeat: no-repeat;' + 'border: 1px solid #a9a9a9;' + 'width: 80px;' + 'height: 80px;' + '}');
                if (q.addMenuItems) q.addMenuItems({
                    flash: {
                        label: q.lang.flash.properties,
                        command: 'flash',
                        group: 'flash'
                    }
                });
                if (q.contextMenu) q.contextMenu.addListener(function(r, s) {
                    if (r && r.is('img') && r.getAttribute('_cke_real_element_type') == 'flash') return {
                        flash: 2
                    };
                });
            },
            afterInit: function(q) {
                var r = q.dataProcessor,
                s = r && r.dataFilter;
                if (s) s.addRules({
                    elements: {
                        'cke:object': function(t) {
                            var u = t.attributes,
                            v = u.classid && String(u.classid).toLowerCase();
                            if (!v) {
                                for (var w = 0; w < t.children.length; w++) {
                                    if (t.children[w].name == 'cke:embed') {
                                        if (!o(t.children[w])) return null;
                                        return p(q, t);
                                    }
                                }
                                return null;
                            }
                            return p(q, t);
                        },
                        'cke:embed': function(t) {
                            if (!o(t)) return null;
                            return p(q, t);
                        }
                    }
                },
                5);
            },
            requires: ['fakeobjects']
        });
    })();
    e.extend(i, {
        flashEmbedTagOnly: false,
        flashAddEmbedTag: true,
        flashConvertOnEdit: false
    });
    (function() {
        function l(m, n, o, p, q, r, s) {
            var t = m.config,
            u = q.split(';'),
            v = [],
            w = {};
            for (var x = 0; x < u.length; x++) {
                var y = {},
                z = u[x].split('/'),
                A = u[x] = z[0];
                y[o] = v[x] = z[1] || A;
                w[A] = new a.style(s, y);
            }
            m.ui.addRichCombo(n, {
                label: p.label,
                title: p.panelTitle,
                voiceLabel: p.voiceLabel,
                className: 'cke_' + (o == 'size' ? 'fontSize': 'font'),
                multiSelect: false,
                panel: {
                    css: m.skin.editor.css.concat(t.contentsCss),
                    voiceLabel: p.panelVoiceLabel
                },
                init: function() {
                    this.startGroup(p.panelTitle);
                    for (var B = 0; B < u.length; B++) {
                        var C = u[B];
                        this.add(C, '<span style="font-' + o + ':' + v[B] + '">' + C + '</span>', C);
                    }
                },
                onClick: function(B) {
                    m.focus();
                    m.fire('saveSnapshot');
                    var C = w[B];
                    if (this.getValue() == B) C.remove(m.document);
                    else C.apply(m.document);
                    m.fire('saveSnapshot');
                },
                onRender: function() {
                    m.on('selectionChange',
                    function(B) {
                        var C = this.getValue(),
                        D = B.data.path,
                        E = D.elements;
                        for (var F = 0, G; F < E.length; F++) {
                            G = E[F];
                            for (var H in w) {
                                if (w[H].checkElementRemovable(G, true)) {
                                    if (H != C) this.setValue(H);
                                    return;
                                }
                            }
                        }
                        this.setValue('', r);
                    },
                    this);
                }
            });
        };
        j.add('font', {
            requires: ['richcombo', 'styles'],
            init: function(m) {
                var n = m.config;
                l(m, 'Font', 'family', m.lang.font, n.font_names, n.font_defaultLabel, n.font_style);
                l(m, 'FontSize', 'size', m.lang.fontSize, n.fontSize_sizes, n.fontSize_defaultLabel, n.fontSize_style);
            }
        });
    })();
    i.font_names = 'Arial/Arial, Helvetica, sans-serif;Comic Sans MS/Comic Sans MS, cursive;Courier New/Courier New, Courier, monospace;Georgia/Georgia, serif;Lucida Sans Unicode/Lucida Sans Unicode, Lucida Grande, sans-serif;Tahoma/Tahoma, Geneva, sans-serif;Times New Roman/Times New Roman, Times, serif;Trebuchet MS/Trebuchet MS, Helvetica, sans-serif;Verdana/Verdana, Geneva, sans-serif';
    i.font_defaultLabel = '';
    i.font_style = {
        element: 'span',
        styles: {
            'font-family': '#(family)'
        },
        overrides: [{
            element: 'font',
            attributes: {
                face: null
            }
        }]
    };
    i.fontSize_sizes = '8/8px;9/9px;10/10px;11/11px;12/12px;14/14px;16/16px;18/18px;20/20px;22/22px;24/24px;26/26px;28/28px;36/36px;48/48px;72/72px';
    i.fontSize_defaultLabel = '';
    i.fontSize_style = {
        element: 'span',
        styles: {
            'font-size': '#(size)'
        },
        overrides: [{
            element: 'font',
            attributes: {
                size: null
            }
        }]
    };
    j.add('format', {
        requires: ['richcombo', 'styles'],
        init: function(l) {
            var m = l.config,
            n = l.lang.format,
            o = m.format_tags.split(';'),
            p = {};
            for (var q = 0; q < o.length; q++) {
                var r = o[q];
                p[r] = new a.style(m['format_' + r]);
            }
            l.ui.addRichCombo('Format', {
                label: n.label,
                title: n.panelTitle,
                voiceLabel: n.voiceLabel,
                className: 'cke_format',
                multiSelect: false,
                panel: {
                    css: l.skin.editor.css.concat(m.contentsCss),
                    voiceLabel: n.panelVoiceLabel
                },
                init: function() {
                    this.startGroup(n.panelTitle);
                    for (var s in p) {
                        var t = n['tag_' + s];
                        this.add(s, '<' + s + '>' + t + '</' + s + '>', t);
                    }
                },
                onClick: function(s) {
                    l.focus();
                    l.fire('saveSnapshot');
                    p[s].apply(l.document);
                    setTimeout(function() {
                        l.fire('saveSnapshot');
                    },
                    0);
                },
                onRender: function() {
                    l.on('selectionChange',
                    function(s) {
                        var t = this.getValue(),
                        u = s.data.path;
                        for (var v in p) {
                            if (p[v].checkActive(u)) {
                                if (v != t) this.setValue(v, l.lang.format['tag_' + v]);
                                return;
                            }
                        }
                        this.setValue('');
                    },
                    this);
                }
            });
        }
    });
    i.format_tags = 'p;h1;h2;h3;h4;h5;h6;pre;address;div';
    i.format_p = {
        element: 'p'
    };
    i.format_div = {
        element: 'div'
    };
    i.format_pre = {
        element: 'pre'
    };
    i.format_address = {
        element: 'address'
    };
    i.format_h1 = {
        element: 'h1'
    };
    i.format_h2 = {
        element: 'h2'
    };
    i.format_h3 = {
        element: 'h3'
    };
    i.format_h4 = {
        element: 'h4'
    };
    i.format_h5 = {
        element: 'h5'
    };
    i.format_h6 = {
        element: 'h6'
    };
    j.add('forms', {
        init: function(l) {
            var m = l.lang;
            l.addCss('form{border: 1px dotted #FF0000;padding: 2px;}');
            var n = function(p, q, r) {
                l.addCommand(q, new a.dialogCommand(q));
                l.ui.addButton(p, {
                    label: m.common[p.charAt(0).toLowerCase() + p.slice(1)],
                    command: q
                });
                a.dialog.add(q, r);
            },
            o = this.path + 'dialogs/';
            n('Form', 'form', o + 'form.js');
            n('Checkbox', 'checkbox', o + 'checkbox.js');
            n('Radio', 'radio', o + 'radio.js');
            n('TextField', 'textfield', o + 'textfield.js');
            n('Textarea', 'textarea', o + 'textarea.js');
            n('Select', 'select', o + 'select.js');
            n('Button', 'button', o + 'button.js');
            n('ImageButton', 'imagebutton', j.getPath('image') + 'dialogs/image.js');
            n('HiddenField', 'hiddenfield', o + 'hiddenfield.js');
            if (l.addMenuItems) l.addMenuItems({
                form: {
                    label: m.form.menu,
                    command: 'form',
                    group: 'form'
                },
                checkbox: {
                    label: m.checkboxAndRadio.checkboxTitle,
                    command: 'checkbox',
                    group: 'checkbox'
                },
                radio: {
                    label: m.checkboxAndRadio.radioTitle,
                    command: 'radio',
                    group: 'radio'
                },
                textfield: {
                    label: m.textfield.title,
                    command: 'textfield',
                    group: 'textfield'
                },
                hiddenfield: {
                    label: m.hidden.title,
                    command: 'hiddenfield',
                    group: 'hiddenfield'
                },
                imagebutton: {
                    label: m.image.titleButton,
                    command: 'imagebutton',
                    group: 'imagebutton'
                },
                button: {
                    label: m.button.title,
                    command: 'button',
                    group: 'button'
                },
                select: {
                    label: m.select.title,
                    command: 'select',
                    group: 'select'
                },
                textarea: {
                    label: m.textarea.title,
                    command: 'textarea',
                    group: 'textarea'
                }
            });
            if (l.contextMenu) {
                l.contextMenu.addListener(function(p) {
                    if (p && p.hasAscendant('form', true)) return {
                        form: 2
                    };
                });
                l.contextMenu.addListener(function(p) {
                    if (p) {
                        var q = p.getName();
                        if (q == 'select') return {
                            select: 2
                        };
                        if (q == 'textarea') return {
                            textarea: 2
                        };
                        if (q == 'input') {
                            var r = p.getAttribute('type');
                            if (r == 'text' || r == 'password') return {
                                textfield: 2
                            };
                            if (r == 'button' || r == 'submit' || r == 'reset') return {
                                button: 2
                            };
                            if (r == 'checkbox') return {
                                checkbox: 2
                            };
                            if (r == 'radio') return {
                                radio: 2
                            };
                            if (r == 'image') return {
                                imagebutton: 2
                            };
                        }
                        if (q == 'img' && p.getAttribute('_cke_real_element_type') == 'hiddenfield') return {
                            hiddenfield: 2
                        };
                    }
                });
            }
        },
        afterInit: function(l) {
            if (c) {
                var m = l.dataProcessor,
                n = m && m.htmlFilter;
                n && n.addRules({
                    elements: {
                        input: function(o) {
                            var p = o.attributes,
                            q = p.type;
                            if (q == 'checkbox' || q == 'radio') p.value == 'on' && delete p.value;
                        }
                    }
                });
            }
        },
        requires: ['image']
    });
    if (c) h.prototype.hasAttribute = function(l) {
        var o = this;
        var m = o.$.attributes.getNamedItem(l);
        if (o.getName() == 'input') switch (l) {
        case 'class':
            return o.$.className.length > 0;
        case 'checked':
            return !! o.$.checked;
        case 'value':
            var n = o.getAttribute('type');
            if (n == 'checkbox' || n == 'radio') return o.$.value != 'on';
            break;
        default:
        }
        return !! (m && m.specified);
    };
    (function() {
        var l = {
            canUndo: false,
            exec: function(n) {
                n.insertElement(n.document.createElement('hr'));
            }
        },
        m = 'horizontalrule';
        j.add(m, {
            init: function(n) {
                n.addCommand(m, l);
                n.ui.addButton('HorizontalRule', {
                    label: n.lang.horizontalrule,
                    command: m
                });
            }
        });
    })();
    (function() {
        var l = /^[\t\r\n ]*(?:&nbsp;|\xa0)$/,
        m = '{cke_protected}';
        function n(O) {
            var P = O.children.length,
            Q = O.children[P - 1];
            while (Q && Q.type == 3 && !e.trim(Q.value)) Q = O.children[--P];
            return Q;
        };
        function o(O, P) {
            var Q = O.children,
            R = n(O);
            if (R) {
                if ((P || !c) && R.type == 1 && R.name == 'br') Q.pop();
                if (R.type == 3 && l.test(R.value)) Q.pop();
            }
        };
        function p(O) {
            var P = n(O);
            return ! P || P.type == 1 && P.name == 'br';
        };
        function q(O) {
            o(O, true);
            if (p(O)) if (c) O.add(new a.htmlParser.text('\xa0'));
            else O.add(new a.htmlParser.element('br', {}));
        };
        function r(O) {
            o(O);
            if (p(O)) O.add(new a.htmlParser.text('\xa0'));
        };
        var s = f,
        t = e.extend({},
        s.$block, s.$listItem, s.$tableContent);
        for (var u in t) {
            if (! ('br' in s[u])) delete t[u];
        }
        delete t.pre;
        var v = {
            attributeNames: [[/^on/, '_cke_pa_on']]
        },
        w = {
            elements: {}
        };
        for (u in t) w.elements[u] = q;
        var x = {
            elementNames: [[/^cke:/, ''], [/^\?xml:namespace$/, '']],
            attributeNames: [[/^_cke_(saved|pa)_/, ''], [/^_cke.*/, ''], ['hidefocus', '']],
            elements: {
                $: function(O) {
                    var P = O.attributes;
                    if (P) {
                        if (P.cke_temp) return false;
                        var Q = ['name', 'href', 'src'],
                        R;
                        for (var S = 0; S < Q.length; S++) {
                            R = '_cke_saved_' + Q[S];
                            R in P && delete P[Q[S]];
                        }
                    }
                    return O;
                },
                embed: function(O) {
                    var P = O.parent;
                    if (P && P.name == 'object') {
                        var Q = P.attributes.width,
                        R = P.attributes.height;
                        Q && (O.attributes.width = Q);
                        R && (O.attributes.height = R);
                    }
                },
                param: function(O) {
                    O.children = [];
                    O.isEmpty = true;
                    return O;
                },
                a: function(O) {
                    if (! (O.children.length || O.attributes.name || O.attributes._cke_saved_name)) return false;
                },
                body: function(O) {
                    delete O.attributes.spellcheck;
                    delete O.attributes.contenteditable;
                },
                style: function(O) {
                    var P = O.children[0];
                    P && P.value && (P.value = e.trim(P.value));
                    if (!O.attributes.type) O.attributes.type = 'text/css';
                }
            },
            attributes: {
                'class': function(O, P) {
                    return e.ltrim(O.replace(/(?:^|\s+)cke_[^\s]*/g, '')) || false;
                }
            },
            comment: function(O) {
                if (O.substr(0, m.length) == m) {
                    if (O.substr(m.length, 3) == '{C}') O = O.substr(m.length + 3);
                    else O = O.substr(m.length);
                    return new a.htmlParser.cdata(decodeURIComponent(O));
                }
                return O;
            }
        },
        y = {
            elements: {}
        };
        for (u in t) y.elements[u] = r;
        if (c) x.attributes.style = function(O, P) {
            return O.toLowerCase();
        };
        var z = /<(?:a|area|img|input)[\s\S]*?\s((?:href|src|name)\s*=\s*(?:(?:"[^"]*")|(?:'[^']*')|(?:[^ "'>]+)))/gi,
        A = /(?:<style(?=[ >])[^>]*>[\s\S]*<\/style>)|(?:<(:?link|meta|base)[^>]*>)/gi,
        B = /<cke:encoded>([^<]*)<\/cke:encoded>/gi,
        C = /(<\/?)((?:object|embed|param|html|body|head|title)[^>]*>)/gi,
        D = /(<\/?)cke:((?:html|body|head|title)[^>]*>)/gi,
        E = /<cke:(param|embed)([^>]*?)\/?>(?!\s*<\/cke:\1)/gi;
        function F(O) {
            return O.replace(z, '$& _cke_saved_$1');
        };
        function G(O) {
            return O.replace(A,
            function(P) {
                return '<cke:encoded>' + encodeURIComponent(P) + '</cke:encoded>';
            });
        };
        function H(O) {
            return O.replace(B,
            function(P, Q) {
                return decodeURIComponent(Q);
            });
        };
        function I(O) {
            return O.replace(C, '$1cke:$2');
        };
        function J(O) {
            return O.replace(D, '$1$2');
        };
        function K(O) {
            return O.replace(E, '<cke:$1$2></cke:$1>');
        };
        function L(O) {
            return O.replace(/<!--(?!{cke_protected})[\s\S]+?-->/g,
            function(P) {
                return '<!--' + m + '{C}' + encodeURIComponent(P).replace(/--/g, '%2D%2D') + '-->';
            });
        };
        function M(O) {
            return O.replace(/<!--\{cke_protected\}\{C\}([\s\S]+?)-->/g,
            function(P, Q) {
                return decodeURIComponent(Q);
            });
        };
        function N(O, P) {
            var Q = [],
            R = /<\!--\{cke_temp(comment)?\}(\d*?)-->/g,
            S = [/<script[\s\S]*?<\/script>/gi, /<noscript[\s\S]*?<\/noscript>/gi].concat(P);
            O = O.replace(/<!--[\s\S]*?-->/g,
            function(U) {
                return '<!--{cke_tempcomment}' + (Q.push(U) - 1) + '-->';
            });
            for (var T = 0; T < S.length; T++) O = O.replace(S[T],
            function(U) {
                U = U.replace(R,
                function(V, W, X) {
                    return Q[X];
                });
                return '<!--{cke_temp}' + (Q.push(U) - 1) + '-->';
            });
            O = O.replace(R,
            function(U, V, W) {
                return '<!--' + m + (V ? '{C}': '') + encodeURIComponent(Q[W]).replace(/--/g, '%2D%2D') + '-->';
            });
            return O;
        };
        j.add('htmldataprocessor', {
            requires: ['htmlwriter'],
            init: function(O) {
                var P = O.dataProcessor = new a.htmlDataProcessor(O);
                P.writer.forceSimpleAmpersand = O.config.forceSimpleAmpersand;
                P.dataFilter.addRules(v);
                P.dataFilter.addRules(w);
                P.htmlFilter.addRules(x);
                P.htmlFilter.addRules(y);
            }
        });
        a.htmlDataProcessor = function(O) {
            var P = this;
            P.editor = O;
            P.writer = new a.htmlWriter();
            P.dataFilter = new a.htmlParser.filter();
            P.htmlFilter = new a.htmlParser.filter();
        };
        a.htmlDataProcessor.prototype = {
            toHtml: function(O, P) {
                O = N(O, this.editor.config.protectedSource);
                O = F(O);
                O = G(O);
                O = I(O);
                O = K(O);
                var Q = new h('div');
                Q.setHtml('a' + O);
                O = Q.getHtml().substr(1);
                O = J(O);
                O = H(O);
                O = M(O);
                var R = a.htmlParser.fragment.fromHtml(O, P),
                S = new a.htmlParser.basicWriter();
                R.writeHtml(S, this.dataFilter);
                O = S.getHtml(true);
                O = L(O);
                return O;
            },
            toDataFormat: function(O, P) {
                var Q = this.writer,
                R = a.htmlParser.fragment.fromHtml(O, P);
                Q.reset();
                R.writeHtml(Q, this.htmlFilter);
                return Q.getHtml(true);
            }
        };
    })();
    i.forceSimpleAmpersand = false;
    j.add('image', {
        init: function(l) {
            var m = 'image';
            a.dialog.add(m, this.path + 'dialogs/image.js');
            l.addCommand(m, new a.dialogCommand(m));
            l.ui.addButton('Image', {
                label: l.lang.common.image,
                command: m
            });
            if (l.addMenuItems) l.addMenuItems({
                image: {
                    label: l.lang.image.menu,
                    command: 'image',
                    group: 'image'
                }
            });
            if (l.contextMenu) l.contextMenu.addListener(function(n, o) {
                if (!n || !n.is('img') || n.getAttribute('_cke_realelement')) return null;
                return {
                    image: 2
                };
            });
        }
    });
    i.image_removeLinkByEmptyURL = true;
    (function() {
        var l = {
            ol: 1,
            ul: 1
        };
        function m(r, s) {
            r.getCommand(this.name).setState(s);
        };
        function n(r) {
            var C = this;
            var s = r.data.path.elements,
            t, u, v = r.editor;
            for (var w = 0; w < s.length; w++) {
                if (s[w].getName() == 'li') {
                    u = s[w];
                    continue;
                }
                if (l[s[w].getName()]) {
                    t = s[w];
                    break;
                }
            }
            if (t) if (C.name == 'outdent') return m.call(C, v, 2);
            else {
                while (u && (u = u.getPrevious(d.walker.whitespaces(true)))) {
                    if (u.getName && u.getName() == 'li') return m.call(C, v, 2);
                }
                return m.call(C, v, 0);
            }
            if (!C.useIndentClasses && C.name == 'indent') return m.call(C, v, 2);
            var x = r.data.path,
            y = x.block || x.blockLimit;
            if (!y) return m.call(C, v, 0);
            if (C.useIndentClasses) {
                var z = y.$.className.match(C.classNameRegex),
                A = 0;
                if (z) {
                    z = z[1];
                    A = C.indentClassMap[z];
                }
                if (C.name == 'outdent' && !A || C.name == 'indent' && A == v.config.indentClasses.length) return m.call(C, v, 0);
                return m.call(C, v, 2);
            } else {
                var B = parseInt(y.getStyle(C.indentCssProperty), 10);
                if (isNaN(B)) B = 0;
                if (B <= 0) return m.call(C, v, 0);
                return m.call(C, v, 2);
            }
        };
        function o(r, s, t) {
            var u = s.startContainer,
            v = s.endContainer;
            while (u && !u.getParent().equals(t)) u = u.getParent();
            while (v && !v.getParent().equals(t)) v = v.getParent();
            if (!u || !v) return;
            var w = u,
            x = [],
            y = false;
            while (!y) {
                if (w.equals(v)) y = true;
                x.push(w);
                w = w.getNext();
            }
            if (x.length < 1) return;
            var z = t.getParents(true);
            for (var A = 0; A < z.length; A++) {
                if (z[A].getName && l[z[A].getName()]) {
                    t = z[A];
                    break;
                }
            }
            var B = this.name == 'indent' ? 1 : -1,
            C = x[0],
            D = x[x.length - 1],
            E = {},
            F = j.list.listToArray(t, E),
            G = F[D.getCustomData('listarray_index')].indent;
            for (A = C.getCustomData('listarray_index'); A <= D.getCustomData('listarray_index');
            A++) F[A].indent += B;
            for (A = D.getCustomData('listarray_index') + 1; A < F.length && F[A].indent > G; A++) F[A].indent += B;
            var H = j.list.arrayToList(F, E, null, r.config.enterMode, 0);
            if (this.name == 'outdent') {
                var I;
                if ((I = t.getParent()) && I.is('li')) {
                    var J = H.listNode.getChildren(),
                    K = [],
                    L = J.count(),
                    M;
                    for (A = L - 1; A >= 0; A--) {
                        if ((M = J.getItem(A)) && M.is && M.is('li')) K.push(M);
                    }
                }
            }
            if (H) H.listNode.replace(t);
            if (K && K.length) for (A = 0; A < K.length; A++) {
                var N = K[A],
                O = N;
                while ((O = O.getNext()) && O.is && O.getName() in l) N.append(O);
                N.insertAfter(I);
            }
            h.clearAllMarkers(E);
        };
        function p(r, s) {
            var A = this;
            var t = s.createIterator(),
            u = r.config.enterMode;
            t.enforceRealBlocks = true;
            t.enlargeBr = u != 2;
            var v;
            while (v = t.getNextParagraph()) {
                if (A.useIndentClasses) {
                    var w = v.$.className.match(A.classNameRegex),
                    x = 0;
                    if (w) {
                        w = w[1];
                        x = A.indentClassMap[w];
                    }
                    if (A.name == 'outdent') x--;
                    else x++;
                    x = Math.min(x, r.config.indentClasses.length);
                    x = Math.max(x, 0);
                    var y = e.ltrim(v.$.className.replace(A.classNameRegex, ''));
                    if (x < 1) v.$.className = y;
                    else v.addClass(r.config.indentClasses[x - 1]);
                } else {
                    var z = parseInt(v.getStyle(A.indentCssProperty), 10);
                    if (isNaN(z)) z = 0;
                    z += (A.name == 'indent' ? 1 : -1) * r.config.indentOffset;
                    z = Math.max(z, 0);
                    z = Math.ceil(z / r.config.indentOffset) * r.config.indentOffset;
                    v.setStyle(A.indentCssProperty, z ? z + r.config.indentUnit: '');
                    if (v.getAttribute('style') === '') v.removeAttribute('style');
                }
            }
        };
        function q(r, s) {
            var u = this;
            u.name = s;
            u.useIndentClasses = r.config.indentClasses && r.config.indentClasses.length > 0;
            if (u.useIndentClasses) {
                u.classNameRegex = new RegExp('(?:^|\\s+)(' + r.config.indentClasses.join('|') + ')(?=$|\\s)');
                u.indentClassMap = {};
                for (var t = 0; t < r.config.indentClasses.length; t++) u.indentClassMap[r.config.indentClasses[t]] = t + 1;
            } else u.indentCssProperty = r.config.contentsLangDirection == 'ltr' ? 'margin-left': 'margin-right';
        };
        q.prototype = {
            exec: function(r) {
                var s = r.getSelection(),
                t = s && s.getRanges()[0];
                if (!s || !t) return;
                var u = s.createBookmarks(true),
                v = t.getCommonAncestor();
                while (v && !(v.type == 1 && l[v.getName()])) v = v.getParent();
                if (v) o.call(this, r, t, v);
                else p.call(this, r, t);
                r.focus();
                r.forceNextSelectionCheck();
                s.selectBookmarks(u);
            }
        };
        j.add('indent', {
            init: function(r) {
                var s = new q(r, 'indent'),
                t = new q(r, 'outdent');
                r.addCommand('indent', s);
                r.addCommand('outdent', t);
                r.ui.addButton('Indent', {
                    label: r.lang.indent,
                    command: 'indent'
                });
                r.ui.addButton('Outdent', {
                    label: r.lang.outdent,
                    command: 'outdent'
                });
                r.on('selectionChange', e.bind(n, s));
                r.on('selectionChange', e.bind(n, t));
            },
            requires: ['domiterator', 'list']
        });
    })();
    e.extend(i, {
        indentOffset: 40,
        indentUnit: 'px',
        indentClasses: null
    });
    (function() {
        var l = /(-moz-|-webkit-|start|auto)/i;
        function m(p, q) {
            var r = q.block || q.blockLimit;
            if (!r || r.getName() == 'body') return 2;
            var s = r.getComputedStyle('text-align').replace(l, '');
            if (!s && this.isDefaultAlign || s == this.value) return 1;
            return 2;
        };
        function n(p) {
            var q = p.editor.getCommand(this.name);
            q.state = m.call(this, p.editor, p.data.path);
            q.fire('state');
        };
        function o(p, q, r) {
            var u = this;
            u.name = q;
            u.value = r;
            var s = p.config.contentsLangDirection;
            u.isDefaultAlign = r == 'left' && s == 'ltr' || r == 'right' && s == 'rtl';
            var t = p.config.justifyClasses;
            if (t) {
                switch (r) {
                case 'left':
                    u.cssClassName = t[0];
                    break;
                case 'center':
                    u.cssClassName = t[1];
                    break;
                case 'right':
                    u.cssClassName = t[2];
                    break;
                case 'justify':
                    u.cssClassName = t[3];
                    break;
                }
                u.cssClassRegex = new RegExp('(?:^|\\s+)(?:' + t.join('|') + ')(?=$|\\s)');
            }
        };
        o.prototype = {
            exec: function(p) {
                var y = this;
                var q = p.getSelection();
                if (!q) return;
                var r = q.createBookmarks(),
                s = q.getRanges(),
                t = y.cssClassName,
                u,
                v;
                for (var w = s.length - 1; w >= 0; w--) {
                    u = s[w].createIterator();
                    while (v = u.getNextParagraph()) {
                        v.removeAttribute('align');
                        if (t) {
                            var x = v.$.className = e.ltrim(v.$.className.replace(y.cssClassRegex, ''));
                            if (y.state == 2 && !y.isDefaultAlign) v.addClass(t);
                            else if (!x) v.removeAttribute('class');
                        } else if (y.state == 2 && !y.isDefaultAlign) v.setStyle('text-align', y.value);
                        else v.removeStyle('text-align');
                    }
                }
                p.focus();
                p.forceNextSelectionCheck();
                q.selectBookmarks(r);
            }
        };
        j.add('justify', {
            init: function(p) {
                var q = new o(p, 'justifyleft', 'left'),
                r = new o(p, 'justifycenter', 'center'),
                s = new o(p, 'justifyright', 'right'),
                t = new o(p, 'justifyblock', 'justify');
                p.addCommand('justifyleft', q);
                p.addCommand('justifycenter', r);
                p.addCommand('justifyright', s);
                p.addCommand('justifyblock', t);
                p.ui.addButton('JustifyLeft', {
                    label: p.lang.justify.left,
                    command: 'justifyleft'
                });
                p.ui.addButton('JustifyCenter', {
                    label: p.lang.justify.center,
                    command: 'justifycenter'
                });
                p.ui.addButton('JustifyRight', {
                    label: p.lang.justify.right,
                    command: 'justifyright'
                });
                p.ui.addButton('JustifyBlock', {
                    label: p.lang.justify.block,
                    command: 'justifyblock'
                });
                p.on('selectionChange', e.bind(n, q));
                p.on('selectionChange', e.bind(n, s));
                p.on('selectionChange', e.bind(n, r));
                p.on('selectionChange', e.bind(n, t));
            },
            requires: ['domiterator']
        });
    })();
    e.extend(i, {
        justifyClasses: null
    });
    j.add('keystrokes', {
        beforeInit: function(l) {
            l.keystrokeHandler = new a.keystrokeHandler(l);
            l.specialKeys = {};
        },
        init: function(l) {
            var m = l.config.keystrokes,
            n = l.config.blockedKeystrokes,
            o = l.keystrokeHandler.keystrokes,
            p = l.keystrokeHandler.blockedKeystrokes;
            for (var q = 0; q < m.length; q++) o[m[q][0]] = m[q][1];
            for (q = 0;
            q < n.length; q++) p[n[q]] = 1;
        }
    });
    a.keystrokeHandler = function(l) {
        var m = this;
        if (l.keystrokeHandler) return l.keystrokeHandler;
        m.keystrokes = {};
        m.blockedKeystrokes = {};
        m._ = {
            editor: l
        };
        return m;
    };
    (function() {
        var l, m = function(o) {
            o = o.data;
            var p = o.getKeystroke(),
            q = this.keystrokes[p],
            r = this._.editor;
            l = r.fire('key', {
                keyCode: p
            }) === true;
            if (!l) {
                if (q) {
                    var s = {
                        from: 'keystrokeHandler'
                    };
                    l = r.execCommand(q, s) !== false;
                }
                if (!l) {
                    var t = r.specialKeys[p];
                    l = t && t(r) === true;
                    if (!l) l = !!this.blockedKeystrokes[p];
                }
            }
            if (l) o.preventDefault(true);
            return ! l;
        },
        n = function(o) {
            if (l) {
                l = false;
                o.data.preventDefault(true);
            }
        };
        a.keystrokeHandler.prototype = {
            attach: function(o) {
                o.on('keydown', m, this);
                if (b.opera || b.gecko && b.mac) o.on('keypress', n, this);
            }
        };
    })();
    i.blockedKeystrokes = [1000 + 66, 1000 + 73, 1000 + 85];
    i.keystrokes = [[4000 + 121, 'toolbarFocus'], [4000 + 122, 'elementsPathFocus'], [2000 + 121, 'contextMenu'], [1000 + 2000 + 121, 'contextMenu'], [1000 + 90, 'undo'], [1000 + 89, 'redo'], [1000 + 2000 + 90, 'redo'], [1000 + 76, 'link'], [1000 + 66, 'bold'], [1000 + 73, 'italic'], [1000 + 85, 'underline'], [4000 + 109, 'toolbarCollapse']];
    j.add('link', {
        init: function(l) {
            l.addCommand('link', new a.dialogCommand('link'));
            l.addCommand('anchor', new a.dialogCommand('anchor'));
            l.addCommand('unlink', new a.unlinkCommand());
            l.ui.addButton('Link', {
                label: l.lang.link.toolbar,
                command: 'link'
            });
            l.ui.addButton('Unlink', {
                label: l.lang.unlink,
                command: 'unlink'
            });
            l.ui.addButton('Anchor', {
                label: l.lang.anchor.toolbar,
                command: 'anchor'
            });
            a.dialog.add('link', this.path + 'dialogs/link.js');
            a.dialog.add('anchor', this.path + 'dialogs/anchor.js');
            l.addCss('img.cke_anchor{background-image: url(' + a.getUrl(this.path + 'images/anchor.gif') + ');' + 'background-position: center center;' + 'background-repeat: no-repeat;' + 'border: 1px solid #a9a9a9;' + 'width: 18px;' + 'height: 18px;' + '}\n' + 'a.cke_anchor' + '{' + 'background-image: url(' + a.getUrl(this.path + 'images/anchor.gif') + ');' + 'background-position: 0 center;' + 'background-repeat: no-repeat;' + 'border: 1px solid #a9a9a9;' + 'padding-left: 18px;' + '}');
            l.on('selectionChange',
            function(m) {
                var n = l.getCommand('unlink'),
                o = m.data.path.lastElement.getAscendant('a', true);
                if (o && o.getName() == 'a' && o.getAttribute('href')) n.setState(2);
                else n.setState(0);
            });
            if (l.addMenuItems) l.addMenuItems({
                anchor: {
                    label: l.lang.anchor.menu,
                    command: 'anchor',
                    group: 'anchor'
                },
                link: {
                    label: l.lang.link.menu,
                    command: 'link',
                    group: 'link',
                    order: 1
                },
                unlink: {
                    label: l.lang.unlink,
                    command: 'unlink',
                    group: 'link',
                    order: 5
                }
            });
            if (l.contextMenu) l.contextMenu.addListener(function(m, n) {
                if (!m) return null;
                var o = m.is('img') && m.getAttribute('_cke_real_element_type') == 'anchor';
                if (!o) {
                    if (! (m = m.getAscendant('a', true))) return null;
                    o = m.getAttribute('name') && !m.getAttribute('href');
                }
                return o ? {
                    anchor: 2
                }: {
                    link: 2,
                    unlink: 2
                };
            });
        },
        afterInit: function(l) {
            var m = l.dataProcessor,
            n = m && m.dataFilter;
            if (n) n.addRules({
                elements: {
                    a: function(o) {
                        var p = o.attributes;
                        if (p.name && !p.href) return l.createFakeParserElement(o, 'cke_anchor', 'anchor');
                    }
                }
            });
        },
        requires: ['fakeobjects']
    });
    a.unlinkCommand = function() {};
    a.unlinkCommand.prototype = {
        exec: function(l) {
            var m = l.getSelection(),
            n = m.createBookmarks(),
            o = m.getRanges(),
            p,
            q;
            for (var r = 0; r < o.length; r++) {
                p = o[r].getCommonAncestor(true);
                q = p.getAscendant('a', true);
                if (!q) continue;
                o[r].selectNodeContents(q);
            }
            m.selectRanges(o);
            l.document.$.execCommand('unlink', false, null);
            m.selectBookmarks(n);
        }
    };
    e.extend(i, {
        linkShowAdvancedTab: true,
        linkShowTargetTab: true
    });
    (function() {
        var l = {
            ol: 1,
            ul: 1
        },
        m = /^[\n\r\t ]*$/;
        j.list = {
            listToArray: function(A, B, C, D, E) {
                if (!l[A.getName()]) return [];
                if (!D) D = 0;
                if (!C) C = [];
                for (var F = 0, G = A.getChildCount(); F < G; F++) {
                    var H = A.getChild(F);
                    if (H.$.nodeName.toLowerCase() != 'li') continue;
                    var I = {
                        parent: A,
                        indent: D,
                        contents: []
                    };
                    if (!E) {
                        I.grandparent = A.getParent();
                        if (I.grandparent && I.grandparent.$.nodeName.toLowerCase() == 'li') I.grandparent = I.grandparent.getParent();
                    } else I.grandparent = E;
                    if (B) h.setMarker(B, H, 'listarray_index', C.length);
                    C.push(I);
                    for (var J = 0, K = H.getChildCount(); J < K; J++) {
                        var L = H.getChild(J);
                        if (L.type == 1 && l[L.getName()]) j.list.listToArray(L, B, C, D + 1, I.grandparent);
                        else I.contents.push(L);
                    }
                }
                return C;
            },
            arrayToList: function(A, B, C, D) {
                if (!C) C = 0;
                if (!A || A.length < C + 1) return null;
                var E = A[C].parent.getDocument(),
                F = new d.documentFragment(E),
                G = null,
                H = C,
                I = Math.max(A[C].indent, 0),
                J = null,
                K = D == 1 ? 'p': 'div';
                for (;;) {
                    var L = A[H];
                    if (L.indent == I) {
                        if (!G || A[H].parent.getName() != G.getName()) {
                            G = A[H].parent.clone(false, true);
                            F.append(G);
                        }
                        J = G.append(E.createElement('li'));
                        for (var M = 0; M < L.contents.length; M++) J.append(L.contents[M].clone(true, true));
                        H++;
                    } else if (L.indent == Math.max(I, 0) + 1) {
                        var N = j.list.arrayToList(A, null, H, D);
                        J.append(N.listNode);
                        H = N.nextIndex;
                    } else if (L.indent == -1 && !C && L.grandparent) {
                        J;
                        if (l[L.grandparent.getName()]) J = E.createElement('li');
                        else if (D != 2 && L.grandparent.getName() != 'td') J = E.createElement(K);
                        else J = new d.documentFragment(E);
                        for (M = 0; M < L.contents.length; M++) J.append(L.contents[M].clone(true, true));
                        if (J.type == 11 && H != A.length - 1) {
                            if (J.getLast() && J.getLast().type == 1 && J.getLast().getAttribute('type') == '_moz') J.getLast().remove();
                            J.appendBogus();
                        }
                        if (J.type == 1 && J.getName() == K && J.$.firstChild) {
                            J.trim();
                            var O = J.getFirst();
                            if (O.type == 1 && O.isBlockBoundary()) {
                                var P = new d.documentFragment(E);
                                J.moveChildren(P);
                                J = P;
                            }
                        }
                        var Q = J.$.nodeName.toLowerCase();
                        if (!c && (Q == 'div' || Q == 'p')) J.appendBogus();
                        F.append(J);
                        G = null;
                        H++;
                    } else return null;
                    if (A.length <= H || Math.max(A[H].indent, 0) < I) break;
                }
                if (B) {
                    var R = F.getFirst();
                    while (R) {
                        if (R.type == 1) h.clearMarkers(B, R);
                        R = R.getNextSourceNode();
                    }
                }
                return {
                    listNode: F,
                    nextIndex: H
                };
            }
        };
        function n(A, B) {
            A.getCommand(this.name).setState(B);
        };
        function o(A) {
            var B = A.data.path,
            C = B.blockLimit,
            D = B.elements,
            E;
            for (var F = 0; F < D.length && (E = D[F]) && !E.equals(C); F++) {
                if (l[D[F].getName()]) return n.call(this, A.editor, this.type == D[F].getName() ? 1 : 2);
            }
            return n.call(this, A.editor, 2);
        };
        function p(A, B, C, D) {
            var E = j.list.listToArray(B.root, C),
            F = [];
            for (var G = 0; G < B.contents.length; G++) {
                var H = B.contents[G];
                H = H.getAscendant('li', true);
                if (!H || H.getCustomData('list_item_processed')) continue;
                F.push(H);
                h.setMarker(C, H, 'list_item_processed', true);
            }
            var I = B.root.getDocument().createElement(this.type);
            for (G = 0; G < F.length; G++) {
                var J = F[G].getCustomData('listarray_index');
                E[J].parent = I;
            }
            var K = j.list.arrayToList(E, C, null, A.config.enterMode),
            L,
            M = K.listNode.getChildCount();
            for (G = 0; G < M && (L = K.listNode.getChild(G)); G++) {
                if (L.getName() == this.type) D.push(L);
            }
            K.listNode.replace(B.root);
        };
        function q(A, B, C) {
            var D = B.contents,
            E = B.root.getDocument(),
            F = [];
            if (D.length == 1 && D[0].equals(B.root)) {
                var G = E.createElement('div');
                D[0].moveChildren && D[0].moveChildren(G);
                D[0].append(G);
                D[0] = G;
            }
            var H = B.contents[0].getParent();
            for (var I = 0; I < D.length; I++) H = H.getCommonAncestor(D[I].getParent());
            for (I = 0; I < D.length; I++) {
                var J = D[I],
                K;
                while (K = J.getParent()) {
                    if (K.equals(H)) {
                        F.push(J);
                        break;
                    }
                    J = K;
                }
            }
            if (F.length < 1) return;
            var L = F[F.length - 1].getNext(),
            M = E.createElement(this.type);
            C.push(M);
            while (F.length) {
                var N = F.shift(),
                O = E.createElement('li');
                N.moveChildren(O);
                N.remove();
                O.appendTo(M);
                if (!c) O.appendBogus();
            }
            if (L) M.insertBefore(L);
            else M.appendTo(H);
        };
        function r(A, B, C) {
            var D = j.list.listToArray(B.root, C),
            E = [];
            for (var F = 0; F < B.contents.length; F++) {
                var G = B.contents[F];
                G = G.getAscendant('li', true);
                if (!G || G.getCustomData('list_item_processed')) continue;
                E.push(G);
                h.setMarker(C, G, 'list_item_processed', true);
            }
            var H = null;
            for (F = 0; F < E.length; F++) {
                var I = E[F].getCustomData('listarray_index');
                D[I].indent = -1;
                H = I;
            }
            for (F = H + 1; F < D.length; F++) {
                if (D[F].indent > D[F - 1].indent + 1) {
                    var J = D[F - 1].indent + 1 - D[F].indent,
                    K = D[F].indent;
                    while (D[F] && D[F].indent >= K) {
                        D[F].indent += J;
                        F++;
                    }
                    F--;
                }
            }
            var L = j.list.arrayToList(D, C, null, A.config.enterMode),
            M = L.listNode,
            N,
            O;
            function P(Q) {
                if ((N = M[Q ? 'getFirst': 'getLast']()) && !(N.is && N.isBlockBoundary()) && (O = B.root[Q ? 'getPrevious': 'getNext'](d.walker.whitespaces(true))) && !(O.is && O.isBlockBoundary({
                    br: 1
                }))) A.document.createElement('br')[Q ? 'insertBefore': 'insertAfter'](N);
            };
            P(true);
            P();
            M.replace(B.root);
        };
        function s(A, B) {
            this.name = A;
            this.type = B;
        };
        s.prototype = {
            exec: function(A) {
                A.focus();
                var B = A.document,
                C = A.getSelection(),
                D = C && C.getRanges();
                if (!D || D.length < 1) return;
                if (this.state == 2) {
                    var E = B.getBody();
                    E.trim();
                    if (!E.getFirst()) {
                        var F = B.createElement(A.config.enterMode == 1 ? 'p': A.config.enterMode == 3 ? 'div': 'br');
                        F.appendTo(E);
                        D = [new d.range(B)];
                        if (F.is('br')) {
                            D[0].setStartBefore(F);
                            D[0].setEndAfter(F);
                        } else D[0].selectNodeContents(F);
                        C.selectRanges(D);
                    } else {
                        var G = D.length == 1 && D[0],
                        H = G && G.getEnclosedNode();
                        if (H && H.is && this.type == H.getName()) n.call(this, A, 1);
                    }
                }
                var I = C.createBookmarks(true),
                J = [],
                K = {};
                while (D.length > 0) {
                    G = D.shift();
                    var L = G.getBoundaryNodes(),
                    M = L.startNode,
                    N = L.endNode;
                    if (M.type == 1 && M.getName() == 'td') G.setStartAt(L.startNode, 1);
                    if (N.type == 1 && N.getName() == 'td') G.setEndAt(L.endNode, 2);
                    var O = G.createIterator(),
                    P;
                    O.forceBrBreak = this.state == 2;
                    while (P = O.getNextParagraph()) {
                        var Q = new d.elementPath(P),
                        R = Q.elements,
                        S = R.length,
                        T = null,
                        U = false,
                        V = Q.blockLimit,
                        W;
                        for (var X = S - 1; X >= 0 && (W = R[X]); X--) {
                            if (l[W.getName()] && V.contains(W)) {
                                V.removeCustomData('list_group_object');
                                var Y = W.getCustomData('list_group_object');
                                if (Y) Y.contents.push(P);
                                else {
                                    Y = {
                                        root: W,
                                        contents: [P]
                                    };
                                    J.push(Y);
                                    h.setMarker(K, W, 'list_group_object', Y);
                                }
                                U = true;
                                break;
                            }
                        }
                        if (U) continue;
                        var Z = V;
                        if (Z.getCustomData('list_group_object')) Z.getCustomData('list_group_object').contents.push(P);
                        else {
                            Y = {
                                root: Z,
                                contents: [P]
                            };
                            h.setMarker(K, Z, 'list_group_object', Y);
                            J.push(Y);
                        }
                    }
                }
                var aa = [];
                while (J.length > 0) {
                    Y = J.shift();
                    if (this.state == 2) {
                        if (l[Y.root.getName()]) p.call(this, A, Y, K, aa);
                        else q.call(this, A, Y, aa);
                    } else if (this.state == 1 && l[Y.root.getName()]) r.call(this, A, Y, K);
                }
                for (X = 0; X < aa.length; X++) {
                    T = aa[X];
                    var ab, ac = this;
                    (ab = function(ad) {
                        var ae = T[ad ? 'getPrevious': 'getNext'](d.walker.whitespaces(true));
                        if (ae && ae.getName && ae.getName() == ac.type) {
                            ae.remove();
                            ae.moveChildren(T, ad ? true: false);
                        }
                    })();
                    ab(true);
                }
                h.clearAllMarkers(K);
                C.selectBookmarks(I);
                A.focus();
            }
        };
        var t = f,
        u = /[\t\r\n ]*(?:&nbsp;|\xa0)$/;
        function v(A, B) {
            var C, D = A.children,
            E = D.length;
            for (var F = 0; F < E; F++) {
                C = D[F];
                if (C.name && C.name in B) return F;
            }
            return E;
        };
        function w(A) {
            return function(B) {
                var C = B.children,
                D = v(B, t.$list),
                E = C[D],
                F = E && E.previous,
                G;
                if (F && (F.name && F.name == 'br' || F.value && (G = F.value.match(u)))) {
                    var H = F;
                    if (! (G && G.index) && H == C[0]) C[0] = A || c ? new a.htmlParser.text('\xa0') : new a.htmlParser.element('br', {});
                    else if (H.name == 'br') C.splice(D - 1, 1);
                    else H.value = H.value.replace(u, '');
                }
            };
        };
        var x = {
            elements: {}
        };
        for (var y in t.$listItem) x.elements[y] = w();
        var z = {
            elements: {}
        };
        for (y in t.$listItem) z.elements[y] = w(true);
        j.add('list', {
            init: function(A) {
                var B = new s('numberedlist', 'ol'),
                C = new s('bulletedlist', 'ul');
                A.addCommand('numberedlist', B);
                A.addCommand('bulletedlist', C);
                A.ui.addButton('NumberedList', {
                    label: A.lang.numberedlist,
                    command: 'numberedlist'
                });
                A.ui.addButton('BulletedList', {
                    label: A.lang.bulletedlist,
                    command: 'bulletedlist'
                });
                A.on('selectionChange', e.bind(o, B));
                A.on('selectionChange', e.bind(o, C));
            },
            afterInit: function(A) {
                var B = A.dataProcessor;
                if (B) {
                    B.dataFilter.addRules(x);
                    B.htmlFilter.addRules(z);
                }
            },
            requires: ['domiterator']
        });
    })();
    (function() {
        function l(q) {
            if (!q || q.type != 1 || q.getName() != 'form') return [];
            var r = [],
            s = ['style', 'className'];
            for (var t = 0; t < s.length; t++) {
                var u = s[t],
                v = q.$.elements.namedItem(u);
                if (v) {
                    var w = new h(v);
                    r.push([w, w.nextSibling]);
                    w.remove();
                }
            }
            return r;
        };
        function m(q, r) {
            if (!q || q.type != 1 || q.getName() != 'form') return;
            if (r.length > 0) for (var s = r.length - 1; s >= 0; s--) {
                var t = r[s][0],
                u = r[s][1];
                if (u) t.insertBefore(u);
                else t.appendTo(q);
            }
        };
        function n(q, r) {
            var s = l(q),
            t = {},
            u = q.$;
            if (!r) {
                t['class'] = u.className || '';
                u.className = '';
            }
            t.inline = u.style.cssText || '';
            if (!r) u.style.cssText = 'position: static; overflow: visible';
            m(s);
            return t;
        };
        function o(q, r) {
            var s = l(q),
            t = q.$;
            if ('class' in r) t.className = r['class'];
            if ('inline' in r) t.style.cssText = r.inline;
            m(s);
        };
        function p(q, r) {
            return function() {
                var s = q.getViewPaneSize();
                r.resize(s.width, s.height, null, true);
            };
        };
        j.add('maximize', {
            init: function(q) {
                var r = q.lang,
                s = a.document,
                t = s.getWindow(),
                u,
                v,
                w,
                x = p(t, q),
                y = 2;
                q.addCommand('maximize', {
                    modes: {
                        wysiwyg: 1,
                        source: 1
                    },
                    editorFocus: false,
                    exec: function() {
                        var z = q.container.getChild(0),
                        A = q.getThemeSpace('contents');
                        if (q.mode == 'wysiwyg') {
                            var B = q.getSelection();
                            u = B && B.getRanges();
                            v = t.getScrollPosition();
                        } else {
                            var C = q.textarea.$;
                            u = !c && [C.selectionStart, C.selectionEnd];
                            v = [C.scrollLeft, C.scrollTop];
                        }
                        if (this.state == 2) {
                            t.on('resize', x);
                            w = t.getScrollPosition();
                            var D = q.container;
                            while (D = D.getParent()) {
                                D.setCustomData('maximize_saved_styles', n(D));
                                D.setStyle('z-index', q.config.baseFloatZIndex - 1);
                            }
                            A.setCustomData('maximize_saved_styles', n(A, true));
                            z.setCustomData('maximize_saved_styles', n(z, true));
                            if (c) s.$.documentElement.style.overflow = s.getBody().$.style.overflow = 'hidden';
                            else s.getBody().setStyles({
                                overflow: 'hidden',
                                width: '0px',
                                height: '0px'
                            });
                            c ? setTimeout(function() {
                                t.$.scrollTo(0, 0);
                            },
                            0) : t.$.scrollTo(0, 0);
                            var E = t.getViewPaneSize();
                            z.setStyle('position', 'absolute');
                            z.$.offsetLeft;
                            z.setStyles({
                                'z-index': q.config.baseFloatZIndex - 1,
                                left: '0px',
                                top: '0px'
                            });
                            q.resize(E.width, E.height, null, true);
                            var F = z.getDocumentPosition();
                            z.setStyles({
                                left: -1 * F.x + 'px',
                                top: -1 * F.y + 'px'
                            });
                            z.addClass('cke_maximized');
                        } else if (this.state == 1) {
                            t.removeListener('resize', x);
                            var G = [A, z];
                            for (var H = 0; H < G.length; H++) {
                                o(G[H], G[H].getCustomData('maximize_saved_styles'));
                                G[H].removeCustomData('maximize_saved_styles');
                            }
                            D = q.container;
                            while (D = D.getParent()) {
                                o(D, D.getCustomData('maximize_saved_styles'));
                                D.removeCustomData('maximize_saved_styles');
                            }
                            c ? setTimeout(function() {
                                t.$.scrollTo(w.x, w.y);
                            },
                            0) : t.$.scrollTo(w.x, w.y);
                            z.removeClass('cke_maximized');
                            q.fire('resize');
                        }
                        this.toggleState();
                        var I = this.uiItems[0],
                        J = this.state == 2 ? r.maximize: r.minimize,
                        K = q.element.getDocument().getById(I._.id);
                        K.getChild(1).setHtml(J);
                        K.setAttribute('title', J);
                        K.setAttribute('href', 'javascript:void("' + J + '");');
                        if (q.mode == 'wysiwyg') {
                            if (u) {
                                q.getSelection().selectRanges(u);
                                var L = q.getSelection().getStartElement();
                                L && L.scrollIntoView(true);
                            } else t.$.scrollTo(v.x, v.y);
                        } else {
                            if (u) {
                                C.selectionStart = u[0];
                                C.selectionEnd = u[1];
                            }
                            C.scrollLeft = v[0];
                            C.scrollTop = v[1];
                        }
                        u = v = null;
                        y = this.state;
                    },
                    canUndo: false
                });
                q.ui.addButton('Maximize', {
                    label: r.maximize,
                    command: 'maximize'
                });
                q.on('mode',
                function() {
                    q.getCommand('maximize').setState(y);
                },
                null, null, 100);
            }
        });
    })();
    j.add('newpage', {
        init: function(l) {
            l.addCommand('newpage', {
                modes: {
                    wysiwyg: 1,
                    source: 1
                },
                exec: function(m) {
                    var n = this;
                    m.setData(m.config.newpage_html,
                    function() {
                        setTimeout(function() {
                            m.fire('afterCommandExec', {
                                name: n.name,
                                command: n
                            });
                        },
                        200);
                    });
                    m.focus();
                },
                async: true
            });
            l.ui.addButton('NewPage', {
                label: l.lang.newPage,
                command: 'newpage'
            });
        }
    });
    i.newpage_html = '';
    j.add('pagebreak', {
        init: function(l) {
            l.addCommand('pagebreak', j.pagebreakCmd);
            l.ui.addButton('PageBreak', {
                label: l.lang.pagebreak,
                command: 'pagebreak'
            });
            l.addCss('img.cke_pagebreak{background-image: url(' + a.getUrl(this.path + 'images/pagebreak.gif') + ');' + 'background-position: center center;' + 'background-repeat: no-repeat;' + 'clear: both;' + 'display: block;' + 'float: none;' + 'width: 100%;' + 'border-top: #999999 1px dotted;' + 'border-bottom: #999999 1px dotted;' + 'height: 5px;' + '}');
        },
        afterInit: function(l) {
            var m = l.dataProcessor,
            n = m && m.dataFilter;
            if (n) n.addRules({
                elements: {
                    div: function(o) {
                        var p = o.attributes,
                        q = p && p.style,
                        r = q && o.children.length == 1 && o.children[0],
                        s = r && r.name == 'span' && r.attributes.style;
                        if (s && /page-break-after\s*:\s*always/i.test(q) && /display\s*:\s*none/i.test(s)) return l.createFakeParserElement(o, 'cke_pagebreak', 'div');
                    }
                }
            });
        },
        requires: ['fakeobjects']
    });
    j.pagebreakCmd = {
        exec: function(l) {
            var m = h.createFromHtml('<div style="page-break-after: always;"><span style="display: none;">&nbsp;</span></div>');
            m = l.createFakeElement(m, 'cke_pagebreak', 'div');
            var n = l.getSelection().getRanges();
            for (var o, p = 0; p < n.length; p++) {
                o = n[p];
                if (p > 0) m = m.clone(true);
                o.splitBlock('p');
                o.insertNode(m);
            }
        }
    };
    (function() {
        j.add('pastefromword', {
            init: function(l) {
                var m = 0,
                n = function() {
                    setTimeout(function() {
                        m = 0;
                    },
                    0);
                };
                l.addCommand('pastefromword', {
                    canUndo: false,
                    exec: function() {
                        m = 1;
                        if (l.execCommand('paste') === false) l.on('dialogHide',
                        function(o) {
                            o.removeListener();
                            n();
                        });
                    }
                });
                l.ui.addButton('PasteFromWord', {
                    label: l.lang.pastefromword.toolbar,
                    command: 'pastefromword'
                });
                l.on('paste',
                function(o) {
                    var p = o.data,
                    q;
                    if ((q = p.html) && (m || /(class=\"?Mso|style=\"[^\"]*\bmso\-|w:WordDocument)/.test(q))) {
                        var r = this.loadFilterRules(function() {
                            if (r) l.fire('paste', p);
                            else if (!l.config.pasteFromWordPromptCleanup || m || confirm(l.lang.pastefromword.confirmCleanup)) p.html = a.cleanWord(q, l);
                        });
                        r && o.cancel();
                    }
                },
                this);
            },
            loadFilterRules: function(l) {
                var m = a.cleanWord;
                if (m) l();
                else {
                    var n = a.getUrl(i.pasteFromWordCleanupFile || this.path + 'filter/default.js');
                    a.scriptLoader.load(n, l, null, false, true);
                }
                return ! m;
            }
        });
    })();
    (function() {
        var l = {
            exec: function(o) {
                var p = e.tryThese(function() {
                    var q = window.clipboardData.getData('Text');
                    if (!q) throw 0;
                    return q;
                },
                function() {
                    window.netscape.security.PrivilegeManager.enablePrivilege('UniversalXPConnect');
                    var q = window.Components.classes['@mozilla.org/widget/clipboard;1'].getService(window.Components.interfaces.nsIClipboard),
                    r = window.Components.classes['@mozilla.org/widget/transferable;1'].createInstance(window.Components.interfaces.nsITransferable);
                    r.addDataFlavor('text/unicode');
                    q.getData(r, q.kGlobalClipboard);
                    var s = {},
                    t = {},
                    u;
                    r.getTransferData('text/unicode', s, t);
                    s = s.value.QueryInterface(window.Components.interfaces.nsISupportsString);
                    u = s.data.substring(0, t.value / 2);
                    return u;
                });
                if (!p) {
                    o.openDialog('pastetext');
                    return false;
                } else o.fire('paste', {
                    text: p
                });
                return true;
            }
        };
        function m(o, p) {
            if (c) {
                var q = o.selection;
                if (q.type == 'Control') q.clear();
                q.createRange().pasteHTML(p);
            } else o.execCommand('inserthtml', false, p);
        };
        j.add('pastetext', {
            init: function(o) {
                var p = 'pastetext',
                q = o.addCommand(p, l);
                o.ui.addButton('PasteText', {
                    label: o.lang.pasteText.button,
                    command: p
                });
                a.dialog.add(p, a.getUrl(this.path + 'dialogs/pastetext.js'));
                if (o.config.forcePasteAsPlainText) o.on('beforeCommandExec',
                function(r) {
                    if (r.data.name == 'paste') {
                        o.execCommand('pastetext');
                        r.cancel();
                    }
                },
                null, null, 0);
            },
            requires: ['clipboard']
        });
        function n(o, p, q, r) {
            while (q--) j.enterkey[p == 2 ? 'enterBr': 'enterBlock'](o, p, null, r);
        };
        a.editor.prototype.insertText = function(o) {
            this.focus();
            this.fire('saveSnapshot');
            var p = this.getSelection().getStartElement().hasAscendant('pre', true) ? 2 : this.config.enterMode,
            q = p == 2,
            r = this.document.$,
            s = this,
            t;
            o = e.htmlEncode(o.replace(/\r\n|\r/g, '\n'));
            var u = 0;
            o.replace(/\n+/g,
            function(v, w) {
                t = o.substring(u, w);
                u = w + v.length;
                t.length && m(r, t);
                var x = v.length,
                y = q ? 0 : Math.floor(x / 2),
                z = q ? x: x % 2;
                n(s, p, y);
                n(s, 2, z, q ? false: true);
            });
            t = o.substring(u, o.length);
            t.length && m(r, t);
            this.fire('saveSnapshot');
        };
    })();
    j.add('popup');
    e.extend(a.editor.prototype, {
        popup: function(l, m, n) {
            m = m || '80%';
            n = n || '70%';
            if (typeof m == 'string' && m.length > 1 && m.substr(m.length - 1, 1) == '%') m = parseInt(window.screen.width * parseInt(m, 10) / 100, 10);
            if (typeof n == 'string' && n.length > 1 && n.substr(n.length - 1, 1) == '%') n = parseInt(window.screen.height * parseInt(n, 10) / 100, 10);
            if (m < 640) m = 640;
            if (n < 420) n = 420;
            var o = parseInt((window.screen.height - n) / 2, 10),
            p = parseInt((window.screen.width - m) / 2, 10),
            q = 'location=no,menubar=no,toolbar=no,dependent=yes,minimizable=no,modal=yes,alwaysRaised=yes,resizable=yes,width=' + m + ',height=' + n + ',top=' + o + ',left=' + p,
            r = window.open('', null, q, true);
            if (!r) return false;
            try {
                r.moveTo(p, o);
                r.resizeTo(m, n);
                r.focus();
                r.location.href = l;
            } catch(s) {
                r = window.open(l, null, q, true);
            }
            return true;
        }
    });
    (function() {
        var l = {
            modes: {
                wysiwyg: 1,
                source: 1
            },
            canUndo: false,
            exec: function(n) {
                var o, p = n.config,
                q = p.baseHref ? '<base href="' + p.baseHref + '"/>': '',
                r = b.isCustomDomain();
                if (p.fullPage) o = n.getData().replace(/<head>/, '$&' + q).replace(/[^>]*(?=<\/title>)/, n.lang.preview);
                else {
                    var s = '<body ',
                    t = n.document && n.document.getBody();
                    if (t) {
                        if (t.getAttribute('id')) s += 'id="' + t.getAttribute('id') + '" ';
                        if (t.getAttribute('class')) s += 'class="' + t.getAttribute('class') + '" ';
                    }
                    s += '>';
                    o = n.config.docType + '<html dir="' + n.config.contentsLangDirection + '">' + '<head>' + q + '<title>' + n.lang.preview + '</title>' + e.buildStyleHtml(n.config.contentsCss) + '</head>' + s + n.getData() + '</body></html>';
                }
                var u = 640,
                v = 420,
                w = 80;
                try {
                    var x = window.screen;
                    u = Math.round(x.width * 0.8);
                    v = Math.round(x.height * 0.7);
                    w = Math.round(x.width * 0.1);
                } catch(A) {}
                var y = '';
                if (r) {
                    window._cke_htmlToLoad = o;
                    y = 'javascript:void( (function(){document.open();document.domain="' + document.domain + '";' + 'document.write( window.opener._cke_htmlToLoad );' + 'document.close();' + 'window.opener._cke_htmlToLoad = null;' + '})() )';
                }
                var z = window.open(y, null, 'toolbar=yes,location=no,status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=' + u + ',height=' + v + ',left=' + w);
                if (!r) {
                    z.document.open();
                    z.document.write(o);
                    z.document.close();
                }
            }
        },
        m = 'preview';
        j.add(m, {
            init: function(n) {
                n.addCommand(m, l);
                n.ui.addButton('Preview', {
                    label: n.lang.preview,
                    command: m
                });
            }
        });
    })();
    j.add('print', {
        init: function(l) {
            var m = 'print',
            n = l.addCommand(m, j.print);
            l.ui.addButton('Print', {
                label: l.lang.print,
                command: m
            });
        }
    });
    j.print = {
        exec: function(l) {
            if (b.opera) return;
            else if (b.gecko) l.window.$.print();
            else l.document.$.execCommand('Print');
        },
        canUndo: false,
        modes: {
            wysiwyg: !b.opera
        }
    };
    j.add('removeformat', {
        requires: ['selection'],
        init: function(l) {
            l.addCommand('removeFormat', j.removeformat.commands.removeformat);
            l.ui.addButton('RemoveFormat', {
                label: l.lang.removeFormat,
                command: 'removeFormat'
            });
        }
    });
    j.removeformat = {
        commands: {
            removeformat: {
                exec: function(l) {
                    var m = l._.removeFormatRegex || (l._.removeFormatRegex = new RegExp('^(?:' + l.config.removeFormatTags.replace(/,/g, '|') + ')$', 'i')),
                    n = l._.removeAttributes || (l._.removeAttributes = l.config.removeFormatAttributes.split(',')),
                    o = l.getSelection().getRanges();
                    for (var p = 0, q; q = o[p]; p++) {
                        if (q.collapsed) continue;
                        q.enlarge(1);
                        var r = q.createBookmark(),
                        s = r.startNode,
                        t = r.endNode,
                        u = function(x) {
                            var y = new d.elementPath(x),
                            z = y.elements;
                            for (var A = 1, B; B = z[A]; A++) {
                                if (B.equals(y.block) || B.equals(y.blockLimit)) break;
                                if (m.test(B.getName())) x.breakParent(B);
                            }
                        };
                        u(s);
                        u(t);
                        var v = s.getNextSourceNode(true, 1);
                        while (v) {
                            if (v.equals(t)) break;
                            var w = v.getNextSourceNode(false, 1);
                            if (! (v.getName() == 'img' && v.getAttribute('_cke_realelement'))) if (m.test(v.getName())) v.remove(true);
                            else v.removeAttributes(n);
                            v = w;
                        }
                        q.moveToBookmark(r);
                    }
                    l.getSelection().selectRanges(o);
                }
            }
        }
    };
    i.removeFormatTags = 'b,big,code,del,dfn,em,font,i,ins,kbd,q,samp,small,span,strike,strong,sub,sup,tt,u,var';
    i.removeFormatAttributes = 'class,style,lang,width,height,align,hspace,valign';
    j.add('resize', {
        init: function(l) {
            var m = l.config;
            if (m.resize_enabled) {
                var n = null,
                o, p;
                function q(t) {
                    var u = t.data.$.screenX - o.x,
                    v = t.data.$.screenY - o.y,
                    w = p.width + u * (l.lang.dir == 'rtl' ? -1 : 1),
                    x = p.height + v;
                    l.resize(Math.max(m.resize_minWidth, Math.min(w, m.resize_maxWidth)), Math.max(m.resize_minHeight, Math.min(x, m.resize_maxHeight)));
                };
                function r(t) {
                    a.document.removeListener('mousemove', q);
                    a.document.removeListener('mouseup', r);
                    if (l.document) {
                        l.document.removeListener('mousemove', q);
                        l.document.removeListener('mouseup', r);
                    }
                };
                var s = e.addFunction(function(t) {
                    if (!n) n = l.getResizable();
                    p = {
                        width: n.$.offsetWidth || 0,
                        height: n.$.offsetHeight || 0
                    };
                    o = {
                        x: t.screenX,
                        y: t.screenY
                    };
                    a.document.on('mousemove', q);
                    a.document.on('mouseup', r);
                    if (l.document) {
                        l.document.on('mousemove', q);
                        l.document.on('mouseup', r);
                    }
                });
                l.on('themeSpace',
                function(t) {
                    if (t.data.space == 'bottom') t.data.html += '<div class="cke_resizer" title="' + e.htmlEncode(l.lang.resize) + '"' + ' onmousedown="CKEDITOR.tools.callFunction(' + s + ', event)"' + '></div>';
                },
                l, null, 100);
            }
        }
    });
    i.resize_minWidth = 750;
    i.resize_minHeight = 250;
    i.resize_maxWidth = 3000;
    i.resize_maxHeight = 3000;
    i.resize_enabled = true;
    (function() {
        var l = {
            modes: {
                wysiwyg: 1,
                source: 1
            },
            exec: function(n) {
                var o = n.element.$.form;
                if (o) try {
                    o.submit();
                } catch(p) {
                    if (o.submit.click) o.submit.click();
                }
            }
        },
        m = 'save';
        j.add(m, {
            init: function(n) {
                var o = n.addCommand(m, l);
                o.modes = {
                    wysiwyg: !!n.element.$.form
                };
                n.ui.addButton('Save', {
                    label: n.lang.save,
                    command: m
                });
            }
        });
    })();
    (function() {
        var l = 'scaytcheck',
        m = '',
        n = null;
        function o(t, u) {
            var v = false,
            w;
            for (w in u) {
                if (u[w] === t || u[w] == t) {
                    v = true;
                    break;
                }
            }
            return v;
        };
        var p = function() {
            var t = this,
            u = function() {
                var x = {};
                x.srcNodeRef = t.document.getWindow().$.frameElement;
                x.assocApp = 'CKEDITOR.' + a.version + '@' + a.revision;
                x.customerid = t.config.scayt_customerid || '1:WvF0D4-UtPqN1-43nkD4-NKvUm2-daQqk3-LmNiI-z7Ysb4-mwry24-T8YrS3-Q2tpq2';
                x.customDictionaryIds = t.config.scayt_customDictionaryIds;
                x.userDictionaryName = t.config.scayt_userDictionaryName;
                x.sLang = t.config.scayt_sLang || 'en_US';
                if (a._scaytParams) for (var y in a._scaytParams) x[y] = a._scaytParams[y];
                var z = new window.scayt(x),
                A = q.instances[t.name];
                if (A) {
                    z.sLang = A.sLang;
                    z.option(A.option());
                    z.paused = A.paused;
                }
                q.instances[t.name] = z;
                var B = 'scaytButton',
                C = window.scayt.uiTags,
                D = [];
                for (var E = 0, F = 4; E < F; E++) D.push(C[E] && q.uiTabs[E]);
                q.uiTabs = D;
                try {
                    z.setDisabled(n === false);
                } catch(G) {}
                t.fire('showScaytState');
            };
            t.on('contentDom', u);
            t.on('contentDomUnload',
            function() {
                var x = a.document.getElementsByTag('script'),
                y = /^dojoIoScript(\d+)$/i,
                z = /^https?:\/\/svc\.spellchecker\.net\/spellcheck\/script\/ssrv\.cgi/i;
                for (var A = 0; A < x.count(); A++) {
                    var B = x.getItem(A),
                    C = B.getId(),
                    D = B.getAttribute('src');
                    if (C && D && C.match(y) && D.match(z)) B.remove();
                }
            });
            t.on('beforeCommandExec',
            function(x) {
                if ((x.data.name == 'source' || x.data.name == 'newpage') && t.mode == 'wysiwyg') {
                    var y = q.getScayt(t);
                    if (y) {
                        n = y.paused = !y.disabled;
                        y.destroy();
                        delete q.instances[t.name];
                    }
                }
            });
            t.on('destroy',
            function() {
                q.getScayt(t).destroy();
            });
            t.on('afterSetData',
            function() {
                if (q.isScaytEnabled(t)) q.getScayt(t).refresh();
            });
            t.on('insertElement',
            function() {
                var x = q.getScayt(t);
                if (q.isScaytEnabled(t)) {
                    if (c) t.getSelection().unlock(true);
                    try {
                        x.refresh();
                    } catch(y) {}
                }
            },
            this, null, 50);
            t.on('insertHtml',
            function() {
                var x = q.getScayt(t);
                if (q.isScaytEnabled(t)) {
                    if (c) t.getSelection().unlock(true);
                    try {
                        x.refresh();
                    } catch(y) {}
                }
            },
            this, null, 50);
            t.on('scaytDialog',
            function(x) {
                x.data.djConfig = window.djConfig;
                x.data.scayt_control = q.getScayt(t);
                x.data.tab = m;
                x.data.scayt = window.scayt;
            });
            var v = t.dataProcessor,
            w = v && v.htmlFilter;
            if (w) w.addRules({
                elements: {
                    span: function(x) {
                        if (x.attributes.scayt_word && x.attributes.scaytid) {
                            delete x.name;
                            return x;
                        }
                    }
                }
            });
            if (t.document) u();
        };
        j.scayt = {
            engineLoaded: false,
            instances: {},
            getScayt: function(t) {
                return this.instances[t.name];
            },
            isScaytReady: function(t) {
                return this.engineLoaded === true && 'undefined' !== typeof window.scayt && this.getScayt(t);
            },
            isScaytEnabled: function(t) {
                var u = this.getScayt(t);
                return u ? u.disabled === false: false;
            },
            loadEngine: function(t) {
                if (this.engineLoaded === true) return p.apply(t);
                else if (this.engineLoaded == -1) return a.on('scaytReady',
                function() {
                    p.apply(t);
                });
                a.on('scaytReady', p, t);
                a.on('scaytReady',
                function() {
                    this.engineLoaded = true;
                },
                this, null, 0);
                this.engineLoaded = -1;
                var u = document.location.protocol;
                u = u.search(/https?:/) != -1 ? u: 'http:';
                var v = 'svc.spellchecker.net/spellcheck3/lf/scayt/scayt21.js',
                w = t.config.scayt_srcUrl || u + '//' + v,
                x = q.parseUrl(w).path + '/';
                a._djScaytConfig = {
                    baseUrl: x,
                    addOnLoad: [function() {
                        a.fireOnce('scaytReady');
                    }],
                    isDebug: false
                };
                a.document.getHead().append(a.document.createElement('script', {
                    attributes: {
                        type: 'text/javascript',
                        src: w
                    }
                }));
                return null;
            },
            parseUrl: function(t) {
                var u;
                if (t.match && (u = t.match(/(.*)[\/\\](.*?\.\w+)$/))) return {
                    path: u[1],
                    file: u[2]
                };
                else return t;
            }
        };
        var q = j.scayt,
        r = function(t, u, v, w, x, y, z) {
            t.addCommand(w, x);
            t.addMenuItem(w, {
                label: v,
                command: w,
                group: y,
                order: z
            });
        },
        s = {
            preserveState: true,
            editorFocus: false,
            exec: function(t) {
                if (q.isScaytReady(t)) {
                    var u = q.isScaytEnabled(t);
                    this.setState(u ? 2 : 1);
                    var v = q.getScayt(t);
                    v.setDisabled(u);
                } else if (!t.config.scayt_autoStartup && q.engineLoaded >= 0) {
                    this.setState(0);
                    t.on('showScaytState',
                    function() {
                        this.removeListener();
                        this.setState(q.isScaytEnabled(t) ? 1 : 2);
                    },
                    this);
                    q.loadEngine(t);
                }
            }
        };
        j.add('scayt', {
            requires: ['menubutton'],
            beforeInit: function(t) {
                t.config.menu_groups = 'scayt_suggest,scayt_moresuggest,scayt_control,' + t.config.menu_groups;
            },
            init: function(t) {
                var u = {},
                v = {},
                w = t.addCommand(l, s);
                a.dialog.add(l, a.getUrl(this.path + 'dialogs/options.js'));
                var x = t.config.scayt_uiTabs || '1,1,1',
                y = [];
                x = x.split(',');
                for (var z = 0, A = 3; z < A; z++) {
                    var B = parseInt(x[z] || '1', 10);
                    y.push(B);
                }
                var C = 'scaytButton';
                t.addMenuGroup(C);
                var D = {};
                D.scaytToggle = {
                    label: t.lang.scayt.enable,
                    command: l,
                    group: C
                };
                if (y[0] == 1) D.scaytOptions = {
                    label: t.lang.scayt.options,
                    group: C,
                    onClick: function() {
                        m = 'options';
                        t.openDialog(l);
                    }
                };
                if (y[1] == 1) D.scaytLangs = {
                    label: t.lang.scayt.langs,
                    group: C,
                    onClick: function() {
                        m = 'langs';
                        t.openDialog(l);
                    }
                };
                if (y[2] == 1) D.scaytDict = {
                    label: t.lang.scayt.dictionariesTab,
                    group: C,
                    onClick: function() {
                        m = 'dictionaries';
                        t.openDialog(l);
                    }
                };
                D.scaytAbout = {
                    label: t.lang.scayt.about,
                    group: C,
                    onClick: function() {
                        m = 'about';
                        t.openDialog(l);
                    }
                };
                y[3] = 1;
                q.uiTabs = y;
                t.addMenuItems(D);
                t.ui.add('Scayt', 5, {
                    label: t.lang.scayt.title,
                    title: t.lang.scayt.title,
                    className: 'cke_button_scayt',
                    onRender: function() {
                        w.on('state',
                        function() {
                            this.setState(w.state);
                        },
                        this);
                    },
                    onMenu: function() {
                        var F = q.isScaytEnabled(t);
                        t.getMenuItem('scaytToggle').label = t.lang.scayt[F ? 'disable': 'enable'];
                        return {
                            scaytToggle: 2,
                            scaytOptions: F && q.uiTabs[0] ? 2 : 0,
                            scaytLangs: F && q.uiTabs[1] ? 2 : 0,
                            scaytDict: F && q.uiTabs[2] ? 2 : 0,
                            scaytAbout: F && q.uiTabs[3] ? 2 : 0
                        };
                    }
                });
                if (t.contextMenu && t.addMenuItems) t.contextMenu.addListener(function(F) {
                    if (! (q.isScaytEnabled(t) && F)) return null;
                    var G = q.getScayt(t),
                    H = G.getWord(F.$);
                    if (!H) return null;
                    var I = G.getLang(),
                    J = {},
                    K = window.scayt.getSuggestion(H, I);
                    if (!K || !K.length) return null;
                    for (z in u) {
                        delete t._.menuItems[z];
                        delete t._.commands[z];
                    }
                    for (z in v) {
                        delete t._.menuItems[z];
                        delete t._.commands[z];
                    }
                    u = {};
                    v = {};
                    var L = t.config.scayt_moreSuggestions || 'on',
                    M = false,
                    N = t.config.scayt_maxSuggestions;
                    typeof N != 'number' && (N = 5); ! N && (N = K.length);
                    var O = t.config.scayt_contextCommands || 'all';
                    O = O.split('|');
                    for (var P = 0, Q = K.length; P < Q; P += 1) {
                        var R = 'scayt_suggestion_' + K[P].replace(' ', '_'),
                        S = (function(W, X) {
                            return {
                                exec: function() {
                                    G.replace(W, X);
                                }
                            };
                        })(F.$, K[P]);
                        if (P < N) {
                            r(t, 'button_' + R, K[P], R, S, 'scayt_suggest', P + 1);
                            J[R] = 2;
                            v[R] = 2;
                        } else if (L == 'on') {
                            r(t, 'button_' + R, K[P], R, S, 'scayt_moresuggest', P + 1);
                            u[R] = 2;
                            M = true;
                        }
                    }
                    if (M) {
                        t.addMenuItem('scayt_moresuggest', {
                            label: t.lang.scayt.moreSuggestions,
                            group: 'scayt_moresuggest',
                            order: 10,
                            getItems: function() {
                                return u;
                            }
                        });
                        v.scayt_moresuggest = 2;
                    }
                    if (o('all', O) || o('ignore', O)) {
                        var T = {
                            exec: function() {
                                G.ignore(F.$);
                            }
                        };
                        r(t, 'ignore', t.lang.scayt.ignore, 'scayt_ignore', T, 'scayt_control', 1);
                        v.scayt_ignore = 2;
                    }
                    if (o('all', O) || o('ignoreall', O)) {
                        var U = {
                            exec: function() {
                                G.ignoreAll(F.$);
                            }
                        };
                        r(t, 'ignore_all', t.lang.scayt.ignoreAll, 'scayt_ignore_all', U, 'scayt_control', 2);
                        v.scayt_ignore_all = 2;
                    }
                    if (o('all', O) || o('add', O)) {
                        var V = {
                            exec: function() {
                                window.scayt.addWordToUserDictionary(F.$);
                            }
                        };
                        r(t, 'add_word', t.lang.scayt.addWord, 'scayt_add_word', V, 'scayt_control', 3);
                        v.scayt_add_word = 2;
                    }
                    if (G.fireOnContextMenu) G.fireOnContextMenu(t);
                    return v;
                });
                if (t.config.scayt_autoStartup) {
                    var E = function() {
                        t.removeListener('showScaytState', E);
                        w.setState(q.isScaytEnabled(t) ? 1 : 2);
                    };
                    t.on('showScaytState', E);
                    q.loadEngine(t);
                }
            }
        });
    })();
    j.add('smiley', {
        requires: ['dialog'],
        init: function(l) {
            l.addCommand('smiley', new a.dialogCommand('smiley'));
            l.ui.addButton('Smiley', {
                label: l.lang.smiley.toolbar,
                command: 'smiley'
            });
            a.dialog.add('smiley', this.path + 'dialogs/smiley.js');
        }
    });
    i.smiley_path = a.basePath + 'plugins/smiley/images/';
    i.smiley_images = ['regular_smile.gif', 'sad_smile.gif', 'wink_smile.gif', 'teeth_smile.gif', 'confused_smile.gif', 'tounge_smile.gif', 'embaressed_smile.gif', 'omg_smile.gif', 'whatchutalkingabout_smile.gif', 'angry_smile.gif', 'angel_smile.gif', 'shades_smile.gif', 'devil_smile.gif', 'cry_smile.gif', 'lightbulb.gif', 'thumbs_down.gif', 'thumbs_up.gif', 'heart.gif', 'broken_heart.gif', 'kiss.gif', 'envelope.gif'];
    i.smiley_descriptions = [':)', ':(', ';)', ':D', ':/', ':P', '', '', '', '', '', '', '', ';(', '', '', '', '', '', ':kiss', ''];
    (function() {
        var l = '.%2 p,.%2 div,.%2 pre,.%2 address,.%2 blockquote,.%2 h1,.%2 h2,.%2 h3,.%2 h4,.%2 h5,.%2 h6{background-repeat: no-repeat;border: 1px dotted gray;padding-top: 8px;padding-left: 8px;}.%2 p{%1p.png);}.%2 div{%1div.png);}.%2 pre{%1pre.png);}.%2 address{%1address.png);}.%2 blockquote{%1blockquote.png);}.%2 h1{%1h1.png);}.%2 h2{%1h2.png);}.%2 h3{%1h3.png);}.%2 h4{%1h4.png);}.%2 h5{%1h5.png);}.%2 h6{%1h6.png);}',
        m = /%1/g,
        n = /%2/g,
        o = {
            preserveState: true,
            editorFocus: false,
            exec: function(p) {
                this.toggleState();
                this.refresh(p);
            },
            refresh: function(p) {
                var q = this.state == 1 ? 'addClass': 'removeClass';
                p.document.getBody()[q]('cke_show_blocks');
            }
        };
        j.add('showblocks', {
            requires: ['wysiwygarea'],
            init: function(p) {
                var q = p.addCommand('showblocks', o);
                q.canUndo = false;
                if (p.config.startupOutlineBlocks) q.setState(1);
                p.addCss(l.replace(m, 'background-image: url(' + a.getUrl(this.path) + 'images/block_').replace(n, 'cke_show_blocks '));
                p.ui.addButton('ShowBlocks', {
                    label: p.lang.showBlocks,
                    command: 'showblocks'
                });
                p.on('mode',
                function() {
                    if (q.state != 0) q.refresh(p);
                });
                p.on('contentDom',
                function() {
                    if (q.state != 0) q.refresh(p);
                });
            }
        });
    })();
    i.startupOutlineBlocks = false;
    (function() {
        var l = 'cke_show_border',
        m, n = (b.ie6Compat ? ['.%1 table.%2,', '.%1 table.%2 td, .%1 table.%2 th,', '{', 'border : #d3d3d3 1px dotted', '}'] : ['.%1 table.%2,', '.%1 table.%2 > tr > td, .%1 table.%2 > tr > th,', '.%1 table.%2 > tbody > tr > td, .%1 table.%2 > tbody > tr > th,', '.%1 table.%2 > thead > tr > td, .%1 table.%2 > thead > tr > th,', '.%1 table.%2 > tfoot > tr > td, .%1 table.%2 > tfoot > tr > th', '{', 'border : #d3d3d3 1px dotted', '}']).join('');
        m = n.replace(/%2/g, l).replace(/%1/g, 'cke_show_borders ');
        var o = {
            preserveState: true,
            editorFocus: false,
            exec: function(p) {
                this.toggleState();
                this.refresh(p);
            },
            refresh: function(p) {
                var q = this.state == 1 ? 'addClass': 'removeClass';
                p.document.getBody()[q]('cke_show_borders');
            }
        };
        j.add('showborders', {
            requires: ['wysiwygarea'],
            modes: {
                wysiwyg: 1
            },
            init: function(p) {
                var q = p.addCommand('showborders', o);
                q.canUndo = false;
                if (p.config.startupShowBorders !== false) q.setState(1);
                p.addCss(m);
                p.on('mode',
                function() {
                    if (q.state != 0) q.refresh(p);
                },
                null, null, 100);
                p.on('contentDom',
                function() {
                    if (q.state != 0) q.refresh(p);
                });
            },
            afterInit: function(p) {
                var q = p.dataProcessor,
                r = q && q.dataFilter,
                s = q && q.htmlFilter;
                if (r) r.addRules({
                    elements: {
                        table: function(t) {
                            var u = t.attributes,
                            v = u['class'],
                            w = parseInt(u.border, 10);
                            if (!w || w <= 0) u['class'] = (v || '') + ' ' + l;
                        }
                    }
                });
                if (s) s.addRules({
                    elements: {
                        table: function(t) {
                            var u = t.attributes,
                            v = u['class'];
                            v && (u['class'] = v.replace(l, '').replace(/\s{2}/, ' ').replace(/^\s+|\s+$/, ''));
                        }
                    }
                });
                a.on('dialogDefinition',
                function(t) {
                    if (t.editor != p) return;
                    var u = t.data.name;
                    if (u == 'table' || u == 'tableProperties') {
                        var v = t.data.definition,
                        w = v.getContents('info'),
                        x = w.get('txtBorder'),
                        y = x.commit;
                        x.commit = e.override(y,
                        function(z) {
                            return function(A, B) {
                                z.apply(this, arguments);
                                var C = parseInt(this.getValue(), 10);
                                B[!C || C <= 0 ? 'addClass': 'removeClass'](l);
                            };
                        });
                    }
                });
            }
        });
    })();
    j.add('sourcearea', {
        requires: ['editingblock'],
        init: function(l) {
            var m = j.sourcearea;
            l.on('editingBlockReady',
            function() {
                var n, o;
                l.addMode('source', {
                    load: function(p, q) {
                        if (c && b.version < 8) p.setStyle('position', 'relative');
                        l.textarea = n = new h('textarea');
                        n.setAttributes({
                            dir: 'ltr',
                            tabIndex: -1
                        });
                        n.addClass('cke_source');
                        n.addClass('cke_enable_context_menu');
                        var r = {
                            width: b.ie7Compat ? '99%': '100%',
                            height: '100%',
                            resize: 'none',
                            outline: 'none',
                            'text-align': 'left'
                        };
                        if (c) {
                            if (!b.ie8Compat) {
                                o = function() {
                                    n.hide();
                                    n.setStyle('height', p.$.clientHeight + 'px');
                                    n.show();
                                };
                                l.on('resize', o);
                                l.on('afterCommandExec',
                                function(t) {
                                    if (t.data.name == 'toolbarCollapse') o();
                                });
                                r.height = p.$.clientHeight + 'px';
                            }
                        } else n.on('mousedown',
                        function(t) {
                            t.data.stopPropagation();
                        });
                        p.setHtml('');
                        p.append(n);
                        n.setStyles(r);
                        n.on('blur',
                        function() {
                            l.focusManager.blur();
                        });
                        n.on('focus',
                        function() {
                            l.focusManager.focus();
                        });
                        l.mayBeDirty = true;
                        this.loadData(q);
                        var s = l.keystrokeHandler;
                        if (s) s.attach(n);
                        setTimeout(function() {
                            l.mode = 'source';
                            l.fire('mode');
                        },
                        b.gecko || b.webkit ? 100 : 0);
                    },
                    loadData: function(p) {
                        n.setValue(p);
                        l.fire('dataReady');
                    },
                    getData: function() {
                        return n.getValue();
                    },
                    getSnapshotData: function() {
                        return n.getValue();
                    },
                    unload: function(p) {
                        l.textarea = n = null;
                        if (o) l.removeListener('resize', o);
                        if (c && b.version < 8) p.removeStyle('position');
                    },
                    focus: function() {
                        n.focus();
                    }
                });
            });
            l.addCommand('source', m.commands.source);
            if (l.ui.addButton) l.ui.addButton('Source', {
                label: l.lang.source,
                command: 'source'
            });
            l.on('mode',
            function() {
                l.getCommand('source').setState(l.mode == 'source' ? 1 : 2);
            });
        }
    });
    j.sourcearea = {
        commands: {
            source: {
                modes: {
                    wysiwyg: 1,
                    source: 1
                },
                exec: function(l) {
                    if (l.mode == 'wysiwyg') l.fire('saveSnapshot');
                    l.getCommand('source').setState(0);
                    l.setMode(l.mode == 'source' ? 'wysiwyg': 'source');
                },
                canUndo: false
            }
        }
    };
    (function() {
        j.add('stylescombo', {
            requires: ['richcombo', 'styles'],
            init: function(o) {
                var p = o.config,
                q = o.lang.stylesCombo,
                r = this.path,
                s;
                o.ui.addRichCombo('Styles', {
                    label: q.label,
                    title: q.panelTitle,
                    voiceLabel: q.voiceLabel,
                    className: 'cke_styles',
                    multiSelect: true,
                    panel: {
                        css: o.skin.editor.css.concat(p.contentsCss),
                        voiceLabel: q.panelVoiceLabel
                    },
                    init: function() {
                        var t = this,
                        u = p.stylesCombo_stylesSet.split(':'),
                        v = u[1] ? u.slice(1).join(':') : a.getUrl(r + 'styles/' + u[0] + '.js');
                        u = u[0];
                        a.loadStylesSet(u, v,
                        function(w) {
                            var x, y, z = [];
                            s = {};
                            for (var A = 0; A < w.length; A++) {
                                var B = w[A];
                                y = B.name;
                                x = s[y] = new a.style(B);
                                x._name = y;
                                z.push(x);
                            }
                            z.sort(n);
                            var C;
                            for (A = 0; A < z.length; A++) {
                                x = z[A];
                                y = x._name;
                                var D = x.type;
                                if (D != C) {
                                    t.startGroup(q['panelTitle' + String(D)]);
                                    C = D;
                                }
                                t.add(y, x.type == 3 ? y: m(x._.definition), y);
                            }
                            t.commit();
                            t.onOpen();
                        });
                    },
                    onClick: function(t) {
                        o.focus();
                        o.fire('saveSnapshot');
                        var u = s[t],
                        v = o.getSelection();
                        if (u.type == 3) {
                            var w = v.getSelectedElement();
                            if (w) u.applyToObject(w);
                            return;
                        }
                        var x = new d.elementPath(v.getStartElement());
                        if (u.type == 2 && u.checkActive(x)) u.remove(o.document);
                        else u.apply(o.document);
                        o.fire('saveSnapshot');
                    },
                    onRender: function() {
                        o.on('selectionChange',
                        function(t) {
                            var u = this.getValue(),
                            v = t.data.path,
                            w = v.elements;
                            for (var x = 0, y; x < w.length; x++) {
                                y = w[x];
                                for (var z in s) {
                                    if (s[z].checkElementRemovable(y, true)) {
                                        if (z != u) this.setValue(z);
                                        return;
                                    }
                                }
                            }
                            this.setValue('');
                        },
                        this);
                    },
                    onOpen: function() {
                        var B = this;
                        if (c) o.focus();
                        var t = o.getSelection(),
                        u = t.getSelectedElement(),
                        v = u && u.getName(),
                        w = new d.elementPath(u || t.getStartElement()),
                        x = [0, 0, 0, 0];
                        B.showAll();
                        B.unmarkAll();
                        for (var y in s) {
                            var z = s[y],
                            A = z.type;
                            if (A == 3) {
                                if (u && z.element == v) {
                                    if (z.checkElementRemovable(u, true)) B.mark(y);
                                    x[A]++;
                                } else B.hideItem(y);
                            } else {
                                if (z.checkActive(w)) B.mark(y);
                                x[A]++;
                            }
                        }
                        if (!x[1]) B.hideGroup(q['panelTitle' + String(1)]);
                        if (!x[2]) B.hideGroup(q['panelTitle' + String(2)]);
                        if (!x[3]) B.hideGroup(q['panelTitle' + String(3)]);
                    }
                });
            }
        });
        var l = {};
        a.addStylesSet = function(o, p) {
            l[o] = p;
        };
        a.loadStylesSet = function(o, p, q) {
            var r = l[o];
            if (r) {
                q(r);
                return;
            }
            a.scriptLoader.load(p,
            function() {
                q(l[o]);
            });
        };
        function m(o) {
            var p = [],
            q = o.element;
            if (q == 'bdo') q = 'span';
            p = ['<', q];
            var r = o.attributes;
            if (r) for (var s in r) p.push(' ', s, '="', r[s], '"');
            var t = a.style.getStyleText(o);
            if (t) p.push(' style="', t, '"');
            p.push('>', o.name, '</', q, '>');
            return p.join('');
        };
        function n(o, p) {
            var q = o.type,
            r = p.type;
            return q == r ? 0 : q == 3 ? -1 : r == 3 ? 1 : r == 1 ? 1 : -1;
        };
    })();
    i.stylesCombo_stylesSet = 'default';
    j.add('table', {
        init: function(l) {
            var m = j.table,
            n = l.lang.table;
            l.addCommand('table', new a.dialogCommand('table'));
            l.addCommand('tableProperties', new a.dialogCommand('tableProperties'));
            l.ui.addButton('Table', {
                label: n.toolbar,
                command: 'table'
            });
            a.dialog.add('table', this.path + 'dialogs/table.js');
            a.dialog.add('tableProperties', this.path + 'dialogs/table.js');
            if (l.addMenuItems) l.addMenuItems({
                table: {
                    label: n.menu,
                    command: 'tableProperties',
                    group: 'table',
                    order: 5
                },
                tabledelete: {
                    label: n.deleteTable,
                    command: 'tableDelete',
                    group: 'table',
                    order: 1
                }
            });
            if (l.contextMenu) l.contextMenu.addListener(function(o, p) {
                if (!o) return null;
                var q = o.is('table') || o.hasAscendant('table');
                if (q) return {
                    tabledelete: 2,
                    table: 2
                };
                return null;
            });
        }
    });
    (function() {
        function l(E, F) {
            if (c) E.removeAttribute(F);
            else delete E[F];
        };
        var m = /^(?:td|th)$/;
        function n(E) {
            var F = E.createBookmarks(),
            G = E.getRanges(),
            H = [],
            I = {};
            function J(R) {
                if (H.length > 0) return;
                if (R.type == 1 && m.test(R.getName()) && !R.getCustomData('selected_cell')) {
                    h.setMarker(I, R, 'selected_cell', true);
                    H.push(R);
                }
            };
            for (var K = 0; K < G.length; K++) {
                var L = G[K];
                if (L.collapsed) {
                    var M = L.getCommonAncestor(),
                    N = M.getAscendant('td', true) || M.getAscendant('th', true);
                    if (N) H.push(N);
                } else {
                    var O = new d.walker(L),
                    P;
                    O.guard = J;
                    while (P = O.next()) {
                        var Q = P.getParent();
                        if (Q && m.test(Q.getName()) && !Q.getCustomData('selected_cell')) {
                            h.setMarker(I, Q, 'selected_cell', true);
                            H.push(Q);
                        }
                    }
                }
            }
            h.clearAllMarkers(I);
            E.selectBookmarks(F);
            return H;
        };
        function o(E) {
            var F = E.cells;
            for (var G = 0; G < F.length; G++) {
                F[G].innerHTML = '';
                if (!c) new h(F[G]).appendBogus();
            }
        };
        function p(E, F) {
            var G = E.getStartElement().getAscendant('tr');
            if (!G) return;
            var H = G.clone(true);
            H.insertBefore(G);
            o(F ? H.$: G.$);
        };
        function q(E) {
            if (E instanceof d.selection) {
                var F = n(E),
                G = [];
                for (var H = 0; H < F.length; H++) {
                    var I = F[H].getParent();
                    G[I.$.rowIndex] = I;
                }
                for (H = G.length; H >= 0; H--) {
                    if (G[H]) q(G[H]);
                }
            } else if (E instanceof h) {
                var J = E.getAscendant('table');
                if (J.$.rows.length == 1) J.remove();
                else E.remove();
            }
        };
        function r(E, F) {
            var G = E.getStartElement(),
            H = G.getAscendant('td', true) || G.getAscendant('th', true);
            if (!H) return;
            var I = H.getAscendant('table'),
            J = H.$.cellIndex;
            for (var K = 0; K < I.$.rows.length; K++) {
                var L = I.$.rows[K];
                if (L.cells.length < J + 1) continue;
                H = new h(L.cells[J].cloneNode(false));
                if (!c) H.appendBogus();
                var M = new h(L.cells[J]);
                if (F) H.insertBefore(M);
                else H.insertAfter(M);
            }
        };
        function s(E) {
            if (E instanceof d.selection) {
                var F = n(E);
                for (var G = F.length;
                G >= 0; G--) {
                    if (F[G]) s(F[G]);
                }
            } else if (E instanceof h) {
                var H = E.getAscendant('table'),
                I = E.$.cellIndex;
                for (G = H.$.rows.length - 1; G >= 0; G--) {
                    var J = new h(H.$.rows[G]);
                    if (!I && J.$.cells.length == 1) {
                        q(J);
                        continue;
                    }
                    if (J.$.cells[I]) J.$.removeChild(J.$.cells[I]);
                }
            }
        };
        function t(E, F) {
            var G = E.getStartElement(),
            H = G.getAscendant('td', true) || G.getAscendant('th', true);
            if (!H) return;
            var I = H.clone();
            if (!c) I.appendBogus();
            if (F) I.insertBefore(H);
            else I.insertAfter(H);
        };
        function u(E) {
            if (E instanceof d.selection) {
                var F = n(E);
                for (var G = F.length - 1; G >= 0; G--) u(F[G]);
            } else if (E instanceof h) if (E.getParent().getChildCount() == 1) E.getParent().remove();
            else E.remove();
        };
        function v(E) {
            var F = E.getBogus();
            F && F.remove();
            E.trim();
        };
        function w(E, F) {
            var G = new d.range(E.getDocument());
            if (!G['moveToElementEdit' + (F ? 'End': 'Start')](E)) {
                G.selectNodeContents(E);
                G.collapse(F ? false: true);
            }
            G.select(true);
        };
        function x(E) {
            var F = E.$.rows,
            G = -1,
            H = [];
            for (var I = 0; I < F.length; I++) {
                G++; ! H[G] && (H[G] = []);
                var J = -1;
                for (var K = 0; K < F[I].cells.length; K++) {
                    var L = F[I].cells[K];
                    J++;
                    while (H[G][J]) J++;
                    var M = isNaN(L.colSpan) ? 1 : L.colSpan,
                    N = isNaN(L.rowSpan) ? 1 : L.rowSpan;
                    for (var O = 0; O < N; O++) {
                        if (!H[G + O]) H[G + O] = [];
                        for (var P = 0; P < M; P++) H[G + O][J + P] = F[I].cells[K];
                    }
                    J += M - 1;
                }
            }
            return H;
        };
        function y(E, F, G) {
            var H = E[F];
            if (typeof G == 'undefined') return H;
            for (var I = 0; H && I < H.length; I++) {
                if (G.is && H[I] == G.$) return I;
                else if (I == G) return new h(H[I]);
            }
            return G.is ? -1 : null;
        };
        function z(E, F, G) {
            var H = [];
            for (var I = 0; I < E.length; I++) {
                var J = E[I];
                if (typeof G == 'undefined') H.push(J[F]);
                else if (G.is && J[F] == G.$) return I;
                else if (I == G) return new h(J[F]);
            }
            return typeof G == 'undefined' ? H: G.is ? -1 : null;
        };
        function A(E, F, G) {
            var H = n(E),
            I;
            if ((F ? H.length != 1 : H.length < 2) || (I = E.getCommonAncestor()) && I.type == 1 && I.is('table')) return false;
            var J, K = H[0],
            L = K.getAscendant('table'),
            M = x(L),
            N = M.length,
            O = M[0].length,
            P = K.getParent().$.rowIndex,
            Q = y(M, P, K);
            if (F) {
                var R;
                try {
                    R = M[F == 'up' ? P - 1 : F == 'down' ? P + 1 : P][F == 'left' ? Q - 1 : F == 'right' ? Q + 1 : Q];
                } catch(aj) {
                    return false;
                }
                if (!R || K.$ == R) return false;
                H[F == 'up' || F == 'left' ? 'unshift': 'push'](new h(R));
            }
            var S = K.getDocument(),
            T = P,
            U = 0,
            V = 0,
            W = !G && new d.documentFragment(S),
            X = 0;
            for (var Y = 0; Y < H.length; Y++) {
                J = H[Y];
                var Z = J.getParent(),
                aa = J.getFirst(),
                ab = J.$.colSpan,
                ac = J.$.rowSpan,
                ad = Z.$.rowIndex,
                ae = y(M, ad, J);
                X += ab * ac;
                V = Math.max(V, ae - Q + ab);
                U = Math.max(U, ad - P + ac);
                if (!G) {
                    if (v(J), J.getChildren().count()) {
                        if (ad != T && aa && !(aa.isBlockBoundary && aa.isBlockBoundary({
                            br: 1
                        }))) {
                            var af = W.getLast(d.walker.whitespaces(true));
                            if (af && !(af.is && af.is('br'))) W.append(new h('br'));
                        }
                        J.moveChildren(W);
                    }
                    Y ? J.remove() : J.setHtml('');
                }
                T = ad;
            }
            if (!G) {
                W.moveChildren(K);
                if (!c) K.appendBogus();
                if (V >= O) K.removeAttribute('rowSpan');
                else K.$.rowSpan = U;
                if (U >= N) K.removeAttribute('colSpan');
                else K.$.colSpan = V;
                var ag = new d.nodeList(L.$.rows),
                ah = ag.count();
                for (Y = ah - 1; Y >= 0; Y--) {
                    var ai = ag.getItem(Y);
                    if (!ai.$.cells.length) {
                        ai.remove();
                        ah++;
                        continue;
                    }
                }
                return K;
            } else return U * V == X;
        };
        function B(E, F) {
            var G = n(E);
            if (G.length > 1) return false;
            else if (F) return true;
            var H = G[0],
            I = H.getParent(),
            J = I.getAscendant('table'),
            K = x(J),
            L = I.$.rowIndex,
            M = y(K, L, H),
            N = H.$.rowSpan,
            O,
            P,
            Q,
            R;
            if (N > 1) {
                P = Math.ceil(N / 2);
                Q = Math.floor(N / 2);
                R = L + P;
                var S = new h(J.$.rows[R]),
                T = y(K, R),
                U;
                O = H.clone();
                for (var V = 0; V < T.length; V++) {
                    U = T[V];
                    if (U.parentNode == S.$ && V > M) {
                        O.insertBefore(new h(U));
                        break;
                    } else U = null;
                }
                if (!U) S.append(O, true);
            } else {
                Q = P = 1;
                S = I.clone();
                S.insertAfter(I);
                S.append(O = H.clone());
                var W = y(K, L);
                for (var X = 0; X < W.length; X++) W[X].rowSpan++;
            }
            if (!c) O.appendBogus();
            H.$.rowSpan = P;
            O.$.rowSpan = Q;
            if (P == 1) H.removeAttribute('rowSpan');
            if (Q == 1) O.removeAttribute('rowSpan');
            return O;
        };
        function C(E, F) {
            var G = n(E);
            if (G.length > 1) return false;
            else if (F) return true;
            var H = G[0],
            I = H.getParent(),
            J = I.getAscendant('table'),
            K = x(J),
            L = I.$.rowIndex,
            M = y(K, L, H),
            N = H.$.colSpan,
            O,
            P,
            Q;
            if (N > 1) {
                P = Math.ceil(N / 2);
                Q = Math.floor(N / 2);
            } else {
                Q = P = 1;
                var R = z(K, M);
                for (var S = 0; S < R.length; S++) R[S].colSpan++;
            }
            O = H.clone();
            O.insertAfter(H);
            if (!c) O.appendBogus();
            H.$.colSpan = P;
            O.$.colSpan = Q;
            if (P == 1) H.removeAttribute('colSpan');
            if (Q == 1) O.removeAttribute('colSpan');
            return O;
        };
        var D = {
            thead: 1,
            tbody: 1,
            tfoot: 1,
            td: 1,
            tr: 1,
            th: 1
        };
        j.tabletools = {
            init: function(E) {
                var F = E.lang.table;
                E.addCommand('cellProperties', new a.dialogCommand('cellProperties'));
                a.dialog.add('cellProperties', this.path + 'dialogs/tableCell.js');
                E.addCommand('tableDelete', {
                    exec: function(G) {
                        var H = G.getSelection(),
                        I = H && H.getStartElement(),
                        J = I && I.getAscendant('table', true);
                        if (!J) return;
                        H.selectElement(J);
                        var K = H.getRanges()[0];
                        K.collapse();
                        H.selectRanges([K]);
                        if (J.getParent().getChildCount() == 1) J.getParent().remove();
                        else J.remove();
                    }
                });
                E.addCommand('rowDelete', {
                    exec: function(G) {
                        var H = G.getSelection();
                        q(H);
                    }
                });
                E.addCommand('rowInsertBefore', {
                    exec: function(G) {
                        var H = G.getSelection();
                        p(H, true);
                    }
                });
                E.addCommand('rowInsertAfter', {
                    exec: function(G) {
                        var H = G.getSelection();
                        p(H);
                    }
                });
                E.addCommand('columnDelete', {
                    exec: function(G) {
                        var H = G.getSelection();
                        s(H);
                    }
                });
                E.addCommand('columnInsertBefore', {
                    exec: function(G) {
                        var H = G.getSelection();
                        r(H, true);
                    }
                });
                E.addCommand('columnInsertAfter', {
                    exec: function(G) {
                        var H = G.getSelection();
                        r(H);
                    }
                });
                E.addCommand('cellDelete', {
                    exec: function(G) {
                        var H = G.getSelection();
                        u(H);
                    }
                });
                E.addCommand('cellMerge', {
                    exec: function(G) {
                        w(A(G.getSelection()), true);
                    }
                });
                E.addCommand('cellMergeRight', {
                    exec: function(G) {
                        w(A(G.getSelection(), 'right'), true);
                    }
                });
                E.addCommand('cellMergeDown', {
                    exec: function(G) {
                        w(A(G.getSelection(), 'down'), true);
                    }
                });
                E.addCommand('cellVerticalSplit', {
                    exec: function(G) {
                        w(B(G.getSelection()));
                    }
                });
                E.addCommand('cellHorizontalSplit', {
                    exec: function(G) {
                        w(C(G.getSelection()));
                    }
                });
                E.addCommand('cellInsertBefore', {
                    exec: function(G) {
                        var H = G.getSelection();
                        t(H, true);
                    }
                });
                E.addCommand('cellInsertAfter', {
                    exec: function(G) {
                        var H = G.getSelection();
                        t(H);
                    }
                });
                if (E.addMenuItems) E.addMenuItems({
                    tablecell: {
                        label: F.cell.menu,
                        group: 'tablecell',
                        order: 1,
                        getItems: function() {
                            var G = E.getSelection(),
                            H = n(G);
                            return {
                                tablecell_insertBefore: 2,
                                tablecell_insertAfter: 2,
                                tablecell_delete: 2,
                                tablecell_merge: A(G, null, true) ? 2 : 0,
                                tablecell_merge_right: A(G, 'right', true) ? 2 : 0,
                                tablecell_merge_down: A(G, 'down', true) ? 2 : 0,
                                tablecell_split_vertical: B(G, true) ? 2 : 0,
                                tablecell_split_horizontal: C(G, true) ? 2 : 0,
                                tablecell_properties: H.length > 0 ? 2 : 0
                            };
                        }
                    },
                    tablecell_insertBefore: {
                        label: F.cell.insertBefore,
                        group: 'tablecell',
                        command: 'cellInsertBefore',
                        order: 5
                    },
                    tablecell_insertAfter: {
                        label: F.cell.insertAfter,
                        group: 'tablecell',
                        command: 'cellInsertAfter',
                        order: 10
                    },
                    tablecell_delete: {
                        label: F.cell.deleteCell,
                        group: 'tablecell',
                        command: 'cellDelete',
                        order: 15
                    },
                    tablecell_merge: {
                        label: F.cell.merge,
                        group: 'tablecell',
                        command: 'cellMerge',
                        order: 16
                    },
                    tablecell_merge_right: {
                        label: F.cell.mergeRight,
                        group: 'tablecell',
                        command: 'cellMergeRight',
                        order: 17
                    },
                    tablecell_merge_down: {
                        label: F.cell.mergeDown,
                        group: 'tablecell',
                        command: 'cellMergeDown',
                        order: 18
                    },
                    tablecell_split_horizontal: {
                        label: F.cell.splitHorizontal,
                        group: 'tablecell',
                        command: 'cellHorizontalSplit',
                        order: 19
                    },
                    tablecell_split_vertical: {
                        label: F.cell.splitVertical,
                        group: 'tablecell',
                        command: 'cellVerticalSplit',
                        order: 20
                    },
                    tablecell_properties: {
                        label: F.cell.title,
                        group: 'tablecellproperties',
                        command: 'cellProperties',
                        order: 21
                    },
                    tablerow: {
                        label: F.row.menu,
                        group: 'tablerow',
                        order: 1,
                        getItems: function() {
                            return {
                                tablerow_insertBefore: 2,
                                tablerow_insertAfter: 2,
                                tablerow_delete: 2
                            };
                        }
                    },
                    tablerow_insertBefore: {
                        label: F.row.insertBefore,
                        group: 'tablerow',
                        command: 'rowInsertBefore',
                        order: 5
                    },
                    tablerow_insertAfter: {
                        label: F.row.insertAfter,
                        group: 'tablerow',
                        command: 'rowInsertAfter',
                        order: 10
                    },
                    tablerow_delete: {
                        label: F.row.deleteRow,
                        group: 'tablerow',
                        command: 'rowDelete',
                        order: 15
                    },
                    tablecolumn: {
                        label: F.column.menu,
                        group: 'tablecolumn',
                        order: 1,
                        getItems: function() {
                            return {
                                tablecolumn_insertBefore: 2,
                                tablecolumn_insertAfter: 2,
                                tablecolumn_delete: 2
                            };
                        }
                    },
                    tablecolumn_insertBefore: {
                        label: F.column.insertBefore,
                        group: 'tablecolumn',
                        command: 'columnInsertBefore',
                        order: 5
                    },
                    tablecolumn_insertAfter: {
                        label: F.column.insertAfter,
                        group: 'tablecolumn',
                        command: 'columnInsertAfter',
                        order: 10
                    },
                    tablecolumn_delete: {
                        label: F.column.deleteColumn,
                        group: 'tablecolumn',
                        command: 'columnDelete',
                        order: 15
                    }
                });
                if (E.contextMenu) E.contextMenu.addListener(function(G, H) {
                    if (!G) return null;
                    while (G) {
                        if (G.getName() in D) return {
                            tablecell: 2,
                            tablerow: 2,
                            tablecolumn: 2
                        };
                        G = G.getParent();
                    }
                    return null;
                });
            },
            getSelectedCells: n
        };
        j.add('tabletools', j.tabletools);
    })();
    j.add('specialchar', {
        init: function(l) {
            var m = 'specialchar';
            a.dialog.add(m, this.path + 'dialogs/specialchar.js');
            l.addCommand(m, new a.dialogCommand(m));
            l.ui.addButton('SpecialChar', {
                label: l.lang.specialChar.toolbar,
                command: m
            });
        }
    });
    (function() {
        var l = {
            exec: function(n) {
                n.container.focusNext(true);
            }
        },
        m = {
            exec: function(n) {
                n.container.focusPrevious(true);
            }
        };
        j.add('tab', {
            requires: ['keystrokes'],
            init: function(n) {
                var o = n.keystrokeHandler.keystrokes;
                o[9] = 'tab';
                o[2000 + 9] = 'shiftTab';
                var p = n.config.tabSpaces,
                q = '';
                while (p--) q += '\xa0';
                n.addCommand('tab', {
                    exec: function(r) {
                        if (!r.fire('tab')) if (q.length > 0) r.insertHtml(q);
                        else return r.execCommand('blur');
                        return true;
                    }
                });
                n.addCommand('shiftTab', {
                    exec: function(r) {
                        if (!r.fire('shiftTab')) return r.execCommand('blurBack');
                        return true;
                    }
                });
                n.addCommand('blur', l);
                n.addCommand('blurBack', m);
            }
        });
    })();
    h.prototype.focusNext = function(l) {
        var u = this;
        var m = u.$,
        n = u.getTabIndex(),
        o,
        p,
        q,
        r,
        s,
        t;
        if (n <= 0) {
            s = u.getNextSourceNode(l, 1);
            while (s) {
                if (s.isVisible() && s.getTabIndex() === 0) {
                    q = s;
                    break;
                }
                s = s.getNextSourceNode(false, 1);
            }
        } else {
            s = u.getDocument().getBody().getFirst();
            while (s = s.getNextSourceNode(false, 1)) {
                if (!o) if (!p && s.equals(u)) {
                    p = true;
                    if (l) {
                        if (! (s = s.getNextSourceNode(true, 1))) break;
                        o = 1;
                    }
                } else if (p && !u.contains(s)) o = 1;
                if (!s.isVisible() || (t = s.getTabIndex()) < 0) continue;
                if (o && t == n) {
                    q = s;
                    break;
                }
                if (t > n && (!q || !r || t < r)) {
                    q = s;
                    r = t;
                } else if (!q && t === 0) {
                    q = s;
                    r = t;
                }
            }
        }
        if (q) q.focus();
    };
    h.prototype.focusPrevious = function(l) {
        var u = this;
        var m = u.$,
        n = u.getTabIndex(),
        o,
        p,
        q,
        r = 0,
        s,
        t = u.getDocument().getBody().getLast();
        while (t = t.getPreviousSourceNode(false, 1)) {
            if (!o) if (!p && t.equals(u)) {
                p = true;
                if (l) {
                    if (! (t = t.getPreviousSourceNode(true, 1))) break;
                    o = 1;
                }
            } else if (p && !u.contains(t)) o = 1;
            if (!t.isVisible() || (s = t.getTabIndex()) < 0) continue;
            if (n <= 0) {
                if (o && s === 0) {
                    q = t;
                    break;
                }
                if (s > r) {
                    q = t;
                    r = s;
                }
            } else {
                if (o && s == n) {
                    q = t;
                    break;
                }
                if (s < n && (!q || s > r)) {
                    q = t;
                    r = s;
                }
            }
        }
        if (q) q.focus();
    };
    i.tabSpaces = 0;
    (function() {
        j.add('templates', {
            requires: ['dialog'],
            init: function(n) {
                a.dialog.add('templates', a.getUrl(this.path + 'dialogs/templates.js'));
                n.addCommand('templates', new a.dialogCommand('templates'));
                n.ui.addButton('Templates', {
                    label: n.lang.templates.button,
                    command: 'templates'
                });
            }
        });
        var l = {},
        m = {};
        a.addTemplates = function(n, o) {
            l[n] = o;
        };
        a.getTemplates = function(n) {
            return l[n];
        };
        a.loadTemplates = function(n, o) {
            var p = [];
            for (var q = 0; q < n.length; q++) {
                if (!m[n[q]]) {
                    p.push(n[q]);
                    m[n[q]] = 1;
                }
            }
            if (p.length > 0) a.scriptLoader.load(p, o);
            else setTimeout(o, 0);
        };
    })();
    i.templates = 'default';
    i.templates_files = [a.getUrl('plugins/templates/templates/default.js')];
    i.templates_replaceContent = true;
    (function() {
        var l = function() {
            this.toolbars = [];
            this.focusCommandExecuted = false;
        };
        l.prototype.focus = function() {
            for (var n = 0, o; o = this.toolbars[n++];) for (var p = 0, q; q = o.items[p++];) {
                if (q.focus) {
                    q.focus();
                    return;
                }
            }
        };
        var m = {
            toolbarFocus: {
                modes: {
                    wysiwyg: 1,
                    source: 1
                },
                exec: function(n) {
                    if (n.toolbox) {
                        n.toolbox.focusCommandExecuted = true;
                        if (c) setTimeout(function() {
                            n.toolbox.focus();
                        },
                        100);
                        else n.toolbox.focus();
                    }
                }
            }
        };
        j.add('toolbar', {
            init: function(n) {
                var o = function(p, q) {
                    switch (q) {
                    case 39:
                    case 9:
                        while ((p = p.next || p.toolbar.next && p.toolbar.next.items[0]) && !p.focus) {}
                        if (p) p.focus();
                        else n.toolbox.focus();
                        return false;
                    case 37:
                    case 2000 + 9 : while ((p = p.previous || p.toolbar.previous && p.toolbar.previous.items[p.toolbar.previous.items.length - 1]) && !p.focus) {}
                        if (p) p.focus();
                        else {
                            var r = n.toolbox.toolbars[n.toolbox.toolbars.length - 1].items;
                            r[r.length - 1].focus();
                        }
                        return false;
                    case 27:
                        n.focus();
                        return false;
                    case 13:
                    case 32:
                        p.execute();
                        return false;
                    }
                    return true;
                };
                n.on('themeSpace',
                function(p) {
                    if (p.data.space == n.config.toolbarLocation) {
                        n.toolbox = new l();
                        var q = ['<div class="cke_toolbox"'],
                        r = n.config.toolbarStartupExpanded !== false,
                        s;
                        q.push(r ? '>': ' style="display:none">');
                        var t = n.toolbox.toolbars,
                        u = n.config.toolbar instanceof Array ? n.config.toolbar: n.config['toolbar_' + n.config.toolbar];
                        for (var v = 0; v < u.length; v++) {
                            var w = u[v];
                            if (!w) continue;
                            var x = 'cke_' + e.getNextNumber(),
                            y = {
                                id: x,
                                items: []
                            };
                            if (s) {
                                q.push('</div>');
                                s = 0;
                            }
                            if (w === '/') {
                                q.push('<div class="cke_break"></div>');
                                continue;
                            }
                            q.push('<span id="', x, '" class="cke_toolbar"><span class="cke_toolbar_start"></span>');
                            var z = t.push(y) - 1;
                            if (z > 0) {
                                y.previous = t[z - 1];
                                y.previous.next = y;
                            }
                            for (var A = 0; A < w.length; A++) {
                                var B, C = w[A];
                                if (C == '-') B = k.separator;
                                else B = n.ui.create(C);
                                if (B) {
                                    if (B.canGroup) {
                                        if (!s) {
                                            q.push('<span class="cke_toolgroup">');
                                            s = 1;
                                        }
                                    } else if (s) {
                                        q.push('</span>');
                                        s = 0;
                                    }
                                    var D = B.render(n, q);
                                    z = y.items.push(D) - 1;
                                    if (z > 0) {
                                        D.previous = y.items[z - 1];
                                        D.previous.next = D;
                                    }
                                    D.toolbar = y;
                                    D.onkey = o;
                                    D.onfocus = function() {
                                        if (!n.toolbox.focusCommandExecuted) n.focus();
                                    };
                                }
                            }
                            if (s) {
                                q.push('</span>');
                                s = 0;
                            }
                            q.push('<span class="cke_toolbar_end"></span></span>');
                        }
                        q.push('</div>');
                        if (n.config.toolbarCanCollapse) {
                            var E = e.addFunction(function() {
                                n.execCommand('toolbarCollapse');
                            }),
                            F = 'cke_' + e.getNextNumber();
                            n.addCommand('toolbarCollapse', {
                                exec: function(G) {
                                    var H = a.document.getById(F),
                                    I = H.getPrevious(),
                                    J = G.getThemeSpace('contents'),
                                    K = I.getParent(),
                                    L = parseInt(J.$.style.height, 10),
                                    M = K.$.offsetHeight;
                                    if (I.isVisible()) {
                                        I.hide();
                                        H.addClass('cke_toolbox_collapser_min');
                                        H.setAttribute('title', G.lang.toolbarExpand);
                                    } else {
                                        I.show();
                                        H.removeClass('cke_toolbox_collapser_min');
                                        H.setAttribute('title', G.lang.toolbarCollapse);
                                    }
                                    var N = K.$.offsetHeight - M;
                                    J.setStyle('height', L - N + 'px');
                                },
                                modes: {
                                    wysiwyg: 1,
                                    source: 1
                                }
                            });
                            q.push('<a title="' + (r ? n.lang.toolbarCollapse: n.lang.toolbarExpand) + '" id="' + F + '" class="cke_toolbox_collapser');
                            if (!r) q.push(' cke_toolbox_collapser_min');
                            q.push('" onclick="CKEDITOR.tools.callFunction(' + E + ')"></a>');
                        }
                        p.data.html += q.join('');
                    }
                });
                n.addCommand('toolbarFocus', m.toolbarFocus);
            }
        });
    })();
    k.separator = {
        render: function(l, m) {
            m.push('<span class="cke_separator"></span>');
            return {};
        }
    };
    i.toolbarLocation = 'top';
    i.toolbar_Basic = [['Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink', '-', 'About']];
    i.toolbar_Full = [['Source', '-', 'Save', 'NewPage', 'Preview', '-', 'Templates'], ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Print', 'SpellChecker', 'Scayt'], ['Undo', 'Redo', '-', 'Find', 'Replace', '-', 'SelectAll', 'RemoveFormat'], ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'], '/', ['Bold', 'Italic', 'Underline', 'Strike', '-', 'Subscript', 'Superscript'], ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', 'Blockquote', 'CreateDiv'], ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'], ['Link', 'Unlink', 'Anchor'], ['Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak'], '/', ['Styles', 'Format', 'Font', 'FontSize'], ['TextColor', 'BGColor'], ['Maximize', 'ShowBlocks', '-', 'About', 'MyButton']];
    i.toolbar = 'Full';
    i.toolbarCanCollapse = true;
    (function() {
        j.add('undo', {
            requires: ['selection', 'wysiwygarea'],
            init: function(r) {
                var s = new n(r),
                t = r.addCommand('undo', {
                    exec: function() {
                        if (s.undo()) {
                            r.selectionChange();
                            this.fire('afterUndo');
                        }
                    },
                    state: 0,
                    canUndo: false
                }),
                u = r.addCommand('redo', {
                    exec: function() {
                        if (s.redo()) {
                            r.selectionChange();
                            this.fire('afterRedo');
                        }
                    },
                    state: 0,
                    canUndo: false
                });
                s.onChange = function() {
                    t.setState(s.undoable() ? 2 : 0);
                    u.setState(s.redoable() ? 2 : 0);
                };
                function v(w) {
                    if (s.enabled && w.data.command.canUndo !== false) s.save();
                };
                r.on('beforeCommandExec', v);
                r.on('afterCommandExec', v);
                r.on('saveSnapshot',
                function() {
                    s.save();
                });
                r.on('contentDom',
                function() {
                    r.document.on('keydown',
                    function(w) {
                        if (!w.data.$.ctrlKey && !w.data.$.metaKey) s.type(w);
                    });
                });
                r.on('beforeModeUnload',
                function() {
                    r.mode == 'wysiwyg' && s.save(true);
                });
                r.on('mode',
                function() {
                    s.enabled = r.mode == 'wysiwyg';
                    s.onChange();
                });
                r.ui.addButton('Undo', {
                    label: r.lang.undo,
                    command: 'undo'
                });
                r.ui.addButton('Redo', {
                    label: r.lang.redo,
                    command: 'redo'
                });
                r.resetUndo = function() {
                    s.reset();
                    r.fire('saveSnapshot');
                };
            }
        });
        function l(r) {
            var t = this;
            var s = r.getSelection();
            t.contents = r.getSnapshot();
            t.bookmarks = s && s.createBookmarks2(true);
            if (c) t.contents = t.contents.replace(/\s+_cke_expando=".*?"/g, '');
        };
        var m = /\b(?:href|src|name)="[^"]*?"/gi;
        l.prototype = {
            equals: function(r, s) {
                var t = this.contents,
                u = r.contents;
                if (c && (b.ie7Compat || b.ie6Compat)) {
                    t = t.replace(m, '');
                    u = u.replace(m, '');
                }
                if (t != u) return false;
                if (s) return true;
                var v = this.bookmarks,
                w = r.bookmarks;
                if (v || w) {
                    if (!v || !w || v.length != w.length) return false;
                    for (var x = 0; x < v.length; x++) {
                        var y = v[x],
                        z = w[x];
                        if (y.startOffset != z.startOffset || y.endOffset != z.endOffset || !e.arrayCompare(y.start, z.start) || !e.arrayCompare(y.end, z.end)) return false;
                    }
                }
                return true;
            }
        };
        function n(r) {
            this.editor = r;
            this.reset();
        };
        var o = {
            8 : 1,
            46 : 1
        },
        p = {
            16 : 1,
            17 : 1,
            18 : 1
        },
        q = {
            37 : 1,
            38 : 1,
            39 : 1,
            40 : 1
        };
        n.prototype = {
            type: function(r) {
                var s = r && r.data.getKey(),
                t = s in p,
                u = s in o,
                v = this.lastKeystroke in o,
                w = u && s == this.lastKeystroke,
                x = s in q,
                y = this.lastKeystroke in q,
                z = !u && !x,
                A = u && !w,
                B = !(t || this.typing) || z && (v || y);
                if (B || A) {
                    var C = new l(this.editor);
                    e.setTimeout(function() {
                        var E = this;
                        var D = E.editor.getSnapshot();
                        if (c) D = D.replace(/\s+_cke_expando=".*?"/g, '');
                        if (C.contents != D) {
                            E.typing = true;
                            if (!E.save(false, C, false)) E.snapshots.splice(E.index + 1, E.snapshots.length - E.index - 1);
                            E.hasUndo = true;
                            E.hasRedo = false;
                            E.typesCount = 1;
                            E.modifiersCount = 1;
                            E.onChange();
                        }
                    },
                    0, this);
                }
                this.lastKeystroke = s;
                if (u) {
                    this.typesCount = 0;
                    this.modifiersCount++;
                    if (this.modifiersCount > 25) {
                        this.save(false, null, false);
                        this.modifiersCount = 1;
                    }
                } else if (!x) {
                    this.modifiersCount = 0;
                    this.typesCount++;
                    if (this.typesCount > 25) {
                        this.save(false, null, false);
                        this.typesCount = 1;
                    }
                }
            },
            reset: function() {
                var r = this;
                r.lastKeystroke = 0;
                r.snapshots = [];
                r.index = -1;
                r.limit = r.editor.config.undoStackSize;
                r.currentImage = null;
                r.hasUndo = false;
                r.hasRedo = false;
                r.resetType();
            },
            resetType: function() {
                var r = this;
                r.typing = false;
                delete r.lastKeystroke;
                r.typesCount = 0;
                r.modifiersCount = 0;
            },
            fireChange: function() {
                var r = this;
                r.hasUndo = !!r.getNextImage(true);
                r.hasRedo = !!r.getNextImage(false);
                r.resetType();
                r.onChange();
            },
            save: function(r, s, t) {
                var v = this;
                var u = v.snapshots;
                if (!s) s = new l(v.editor);
                if (v.currentImage && s.equals(v.currentImage, r)) return false;
                u.splice(v.index + 1, u.length - v.index - 1);
                if (u.length == v.limit) u.shift();
                v.index = u.push(s) - 1;
                v.currentImage = s;
                if (t !== false) v.fireChange();
                return true;
            },
            restoreImage: function(r) {
                var t = this;
                t.editor.loadSnapshot(r.contents);
                if (r.bookmarks) t.editor.getSelection().selectBookmarks(r.bookmarks);
                else if (c) {
                    var s = t.editor.document.getBody().$.createTextRange();
                    s.collapse(true);
                    s.select();
                }
                t.index = r.index;
                t.currentImage = r;
                t.fireChange();
            },
            getNextImage: function(r) {
                var w = this;
                var s = w.snapshots,
                t = w.currentImage,
                u, v;
                if (t) if (r) for (v = w.index - 1; v >= 0; v--) {
                    u = s[v];
                    if (!t.equals(u, true)) {
                        u.index = v;
                        return u;
                    }
                } else for (v = w.index + 1; v < s.length; v++) {
                    u = s[v];
                    if (!t.equals(u, true)) {
                        u.index = v;
                        return u;
                    }
                }
                return null;
            },
            redoable: function() {
                return this.enabled && this.hasRedo;
            },
            undoable: function() {
                return this.enabled && this.hasUndo;
            },
            undo: function() {
                var s = this;
                if (s.undoable()) {
                    s.save(true);
                    var r = s.getNextImage(true);
                    if (r) return s.restoreImage(r),
                    true;
                }
                return false;
            },
            redo: function() {
                var s = this;
                if (s.redoable()) {
                    s.save(true);
                    if (s.redoable()) {
                        var r = s.getNextImage(false);
                        if (r) return s.restoreImage(r),
                        true;
                    }
                }
                return false;
            }
        };
    })();
    i.undoStackSize = 20;
    (function() {
        var l = {
            table: 1,
            pre: 1
        },
        m = /\s*<(p|div|address|h\d|center)[^>]*>\s*(?:<br[^>]*>|&nbsp;|\u00A0|&#160;)?\s*(:?<\/\1>)?\s*(?=$|<\/body>)/gi;
        function n(w) {
            if (this.mode == 'wysiwyg') {
                this.focus();
                this.fire('saveSnapshot');
                var x = this.getSelection(),
                y = w.data;
                if (this.dataProcessor) y = this.dataProcessor.toHtml(y);
                if (c) {
                    var z = x.isLocked;
                    if (z) x.unlock();
                    var A = x.getNative();
                    if (A.type == 'Control') A.clear();
                    A.createRange().pasteHTML(y);
                    if (z) this.getSelection().lock();
                } else this.document.$.execCommand('inserthtml', false, y);
                e.setTimeout(function() {
                    this.fire('saveSnapshot');
                },
                0, this);
            }
        };
        function o(w) {
            if (this.mode == 'wysiwyg') {
                this.focus();
                this.fire('saveSnapshot');
                var x = w.data,
                y = x.getName(),
                z = f.$block[y],
                A = this.getSelection(),
                B = A.getRanges(),
                C = A.isLocked;
                if (C) A.unlock();
                var D, E, F, G;
                for (var H = B.length - 1; H >= 0; H--) {
                    D = B[H];
                    D.deleteContents();
                    E = !H && x || x.clone(true);
                    var I, J;
                    if (z) while ((I = D.getCommonAncestor(false, true)) && (J = f[I.getName()]) && !(J && J[y])) {
                        if (I.getName() in f.span) D.splitElement(I);
                        else if (D.checkStartOfBlock() && D.checkEndOfBlock()) {
                            D.setStartBefore(I);
                            D.collapse(true);
                            I.remove();
                        } else D.splitBlock();
                    }
                    D.insertNode(E);
                    if (!F) F = E;
                }
                D.moveToPosition(F, 4);
                var K = F.getNextSourceNode(true);
                if (K && K.type == 1) D.moveToElementEditStart(K);
                A.selectRanges([D]);
                if (C) this.getSelection().lock();
                e.setTimeout(function() {
                    this.fire('saveSnapshot');
                },
                0, this);
            }
        };
        function p(w) {
            if (!w.checkDirty()) setTimeout(function() {
                w.resetDirty();
            });
        };
        var q = d.walker.whitespaces(true),
        r = d.walker.bookmark(false, true);
        function s(w) {
            return q(w) && r(w);
        };
        function t(w) {
            return w.type == 3 && e.trim(w.getText()).match(/^(?:&nbsp;|\xa0)$/);
        };
        function u(w) {
            var x = w.editor,
            y = w.data.path,
            z = y.blockLimit,
            A = w.data.selection,
            B = A.getRanges()[0],
            C = x.document.getBody(),
            D = x.config.enterMode;
            if (D != 2 && B.collapsed && z.getName() == 'body' && !y.block) {
                p(x);
                var E = B.fixBlock(true, x.config.enterMode == 3 ? 'div': 'p');
                if (c) {
                    var F = E.getFirst(s);
                    F && t(F) && F.remove();
                }
                if (E.getOuterHtml().match(m)) {
                    var G = E.getPrevious(q),
                    H = E.getNext(q);
                    if (G && G.getName && !(G.getName() in l) && B.moveToElementEditStart(G) || H && H.getName && !(H.getName() in l) && B.moveToElementEditStart(H)) E.remove();
                }
                B.select();
                if (!c) x.selectionChange();
            }
            var I = C.getLast(d.walker.whitespaces(true));
            if (I && I.getName && I.getName() in l) {
                p(x);
                if (!c) C.appendBogus();
                else C.append(x.document.createText('\xa0'));
            }
        };
        j.add('wysiwygarea', {
            requires: ['editingblock'],
            init: function(w) {
                var x = w.config.enterMode != 2 ? w.config.enterMode == 3 ? 'div': 'p': false;
                w.on('editingBlockReady',
                function() {
                    var z, A, B, C, D, E, F, G = b.isCustomDomain(),
                    H = function(K) {
                        if (B) B.remove();
                        if (A) A.remove();
                        E = 0;
                        B = h.createFromHtml('<iframe style="width:100%;height:100%" frameBorder="0"' + (G ? " src=\"javascript:void((function(){document.open();document.domain='" + document.domain + "';" + 'document.close();' + '})())"': '') + ' tabIndex="-1"' + ' allowTransparency="true"' + '></iframe>');
                        B.on('load',
                        function(M) {
                            M.removeListener();
                            var N = B.getFrameDocument().$;
                            N.open();
                            if (G) N.domain = document.domain;
                            N.write(K);
                            N.close();
                        });
                        var L = w.lang.editorTitle.replace('%1', w.name);
                        if (b.gecko) {
                            z.setAttributes({
                                role: 'region',
                                title: L
                            });
                            B.setAttributes({
                                role: 'region',
                                title: ' '
                            });
                        } else if (b.webkit) {
                            B.setAttribute('title', L);
                            B.setAttribute('name', L);
                        } else if (c) {
                            A = h.createFromHtml('<fieldset style="height:100%' + (c && b.quirks ? ';position:relative': '') + '">' + '<legend style="display:block;width:0;height:0;overflow:hidden;' + (c && b.quirks ? 'position:absolute': '') + '">' + e.htmlEncode(L) + '</legend>' + '</fieldset>', a.document);
                            B.appendTo(A);
                            A.appendTo(z);
                        }
                        if (!c) z.append(B);
                    },
                    I = '<script id="cke_actscrpt" type="text/javascript">window.parent.CKEDITOR._["contentDomReady' + w.name + '"]( window );' + '</script>',
                    J = function(K) {
                        if (E) return;
                        E = 1;
                        var L = K.document,
                        M = L.body,
                        N = L.getElementById('cke_actscrpt');
                        N.parentNode.removeChild(N);
                        delete a._['contentDomReady' + w.name];
                        M.spellcheck = !w.config.disableNativeSpellChecker;
                        if (c) {
                            M.hideFocus = true;
                            M.disabled = true;
                            M.contentEditable = true;
                            M.removeAttribute('disabled');
                        } else L.designMode = 'on';
                        try {
                            L.execCommand('enableObjectResizing', false, !w.config.disableObjectResizing);
                        } catch(S) {}
                        try {
                            L.execCommand('enableInlineTableEditing', false, !w.config.disableNativeTableHandles);
                        } catch(T) {}
                        K = w.window = new d.window(K);
                        L = w.document = new g(L);
                        if (! (c || b.opera)) L.on('mousedown',
                        function(U) {
                            var V = U.data.getTarget();
                            if (V.is('img', 'hr', 'input', 'textarea', 'select')) w.getSelection().selectElement(V);
                        });
                        if (b.webkit) {
                            L.on('click',
                            function(U) {
                                if (U.data.getTarget().is('input', 'select')) U.data.preventDefault();
                            });
                            L.on('mouseup',
                            function(U) {
                                if (U.data.getTarget().is('input', 'textarea')) U.data.preventDefault();
                            });
                        }
                        if (c && L.$.compatMode == 'CSS1Compat') {
                            var O = L.getDocumentElement();
                            O.on('mousedown',
                            function(U) {
                                if (U.data.getTarget().equals(O)) y.focus();
                            });
                        }
                        var P = c || b.webkit ? K: L;
                        P.on('blur',
                        function() {
                            w.focusManager.blur();
                        });
                        P.on('focus',
                        function() {
                            if (b.gecko) {
                                var U = M;
                                while (U.firstChild) U = U.firstChild;
                                if (!U.nextSibling && 'BR' == U.tagName && U.hasAttribute('_moz_editor_bogus_node')) {
                                    var V = L.$.createEvent('KeyEvents');
                                    V.initKeyEvent('keypress', true, true, K.$, false, false, false, false, 0, 32);
                                    L.$.dispatchEvent(V);
                                    var W = L.getBody().getFirst();
                                    if (w.config.enterMode == 2) L.createElement('br', {
                                        attributes: {
                                            _moz_dirty: ''
                                        }
                                    }).replace(W);
                                    else W.remove();
                                }
                            }
                            w.focusManager.focus();
                        });
                        var Q = w.keystrokeHandler;
                        if (Q) Q.attach(L);
                        if (c) {
                            L.on('keydown',
                            function(U) {
                                var V = U.data.getKeystroke() == 8 && w.getSelection().getSelectedElement();
                                if (V) {
                                    w.fire('saveSnapshot');
                                    V.remove();
                                    w.fire('saveSnapshot');
                                    U.cancel();
                                }
                            });
                            if (L.$.compatMode == 'CSS1Compat') {
                                var R = {
                                    33 : 1,
                                    34 : 1
                                };
                                L.on('keydown',
                                function(U) {
                                    if (U.data.getKeystroke() in R) setTimeout(function() {
                                        w.getSelection().scrollIntoView();
                                    },
                                    0);
                                });
                            }
                        }
                        if (w.contextMenu) w.contextMenu.addTarget(L, w.config.browserContextMenuOnCtrl !== false);
                        setTimeout(function() {
                            w.fire('contentDom');
                            if (F) {
                                w.mode = 'wysiwyg';
                                w.fire('mode');
                                F = false;
                            }
                            C = false;
                            if (D) {
                                w.focus();
                                D = false;
                            }
                            setTimeout(function() {
                                w.fire('dataReady');
                            },
                            0);
                            if (c) setTimeout(function() {
                                if (w.document) {
                                    var U = w.document.$.body;
                                    U.runtimeStyle.marginBottom = '0px';
                                    U.runtimeStyle.marginBottom = '';
                                }
                            },
                            1000);
                        },
                        0);
                    };
                    w.addMode('wysiwyg', {
                        load: function(K, L, M) {
                            z = K;
                            if (c && b.quirks) K.setStyle('position', 'relative');
                            w.mayBeDirty = true;
                            F = true;
                            if (M) this.loadSnapshotData(L);
                            else this.loadData(L);
                        },
                        loadData: function(K) {
                            C = true;
                            var L = w.config,
                            M = L.fullPage,
                            N = L.docType,
                            O = '<style type="text/css" cke_temp="1">' + w._.styles.join('\n') + '</style>'; ! M && (O = e.buildStyleHtml(w.config.contentsCss) + O);
                            var P = L.baseHref ? '<base href="' + L.baseHref + '" cke_temp="1" />': '';
                            if (M) K = K.replace(/<!DOCTYPE[^>]*>/i,
                            function(Q) {
                                w.docType = N = Q;
                                return '';
                            });
                            if (w.dataProcessor) K = w.dataProcessor.toHtml(K, x);
                            if (M) {
                                if (!/<body[\s|>]/.test(K)) K = '<body>' + K;
                                if (!/<html[\s|>]/.test(K)) K = '<html>' + K + '</html>';
                                if (!/<head[\s|>]/.test(K)) K = K.replace(/<html[^>]*>/, '$&<head><title></title></head>');
                                P && (K = K.replace(/<head>/, '$&' + P));
                                K = K.replace(/<\/head\s*>/, O + '$&');
                                K = N + K;
                            } else K = L.docType + '<html dir="' + L.contentsLangDirection + '">' + '<head>' + P + O + '</head>' + '<body' + (L.bodyId ? ' id="' + L.bodyId + '"': '') + (L.bodyClass ? ' class="' + L.bodyClass + '"': '') + '>' + K + '</html>';
                            K += I;
                            a._['contentDomReady' + w.name] = J;
                            H(K);
                        },
                        getData: function() {
                            var K = w.config,
                            L = K.fullPage,
                            M = L && w.docType,
                            N = B.getFrameDocument(),
                            O = L ? N.getDocumentElement().getOuterHtml() : N.getBody().getHtml();
                            if (w.dataProcessor) O = w.dataProcessor.toDataFormat(O, x);
                            if (K.ignoreEmptyParagraph) O = O.replace(m, '');
                            if (M) O = M + '\n' + O;
                            return O;
                        },
                        getSnapshotData: function() {
                            return B.getFrameDocument().getBody().getHtml();
                        },
                        loadSnapshotData: function(K) {
                            B.getFrameDocument().getBody().setHtml(K);
                        },
                        unload: function(K) {
                            w.window = w.document = B = z = D = null;
                            w.fire('contentDomUnload');
                        },
                        focus: function() {
                            if (C) D = true;
                            else if (w.window) {
                                w.window.focus();
                                if (c) try {
                                    var K = w.getSelection();
                                    K = K && K.getNative();
                                    var L = K && K.type && K.createRange();
                                    if (L) {
                                        K.empty();
                                        L.select();
                                    }
                                } catch(M) {}
                                w.selectionChange();
                            }
                        }
                    });
                    w.on('insertHtml', n, null, null, 20);
                    w.on('insertElement', o, null, null, 20);
                    w.on('selectionChange', u, null, null, 1);
                });
                if (c) {
                    var y;
                    w.on('uiReady',
                    function() {
                        y = w.container.append(h.createFromHtml('<input tabindex="-1" style="position:absolute; left:-10000">'));
                        y.on('focus',
                        function() {
                            w.focus();
                        });
                    });
                }
            }
        });
        if (b.gecko) {
            var v = window.top;
            (function() {
                var w = v.document.body;
                if (!w) v.addEventListener('load', arguments.callee, false);
                else w.setAttribute('onpageshow', w.getAttribute('onpageshow') + ';event.persisted && CKEDITOR.tools.callFunction(' + e.addFunction(function() {
                    var x = a.instances,
                    y, z;
                    for (var A in x) {
                        y = x[A];
                        z = y.document;
                        if (z) {
                            z.$.designMode = 'off';
                            z.$.designMode = 'on';
                        }
                    }
                }) + ')');
            })();
        }
    })();
    i.disableObjectResizing = false;
    i.disableNativeTableHandles = true;
    i.disableNativeSpellChecker = true;
    i.ignoreEmptyParagraph = true;
    j.add('wsc', {
        init: function(l) {
            var m = 'checkspell',
            n = l.addCommand(m, new a.dialogCommand(m));
            n.modes = {
                wysiwyg: !b.opera && document.domain == window.location.hostname
            };
            l.ui.addButton('SpellChecker', {
                label: l.lang.spellCheck.toolbar,
                command: m
            });
            a.dialog.add(m, this.path + 'dialogs/wsc.js');
        }
    });
    i.wsc_customerId = i.wsc_customerId || '1:ua3xw1-2XyGJ3-GWruD3-6OFNT1-oXcuB1-nR6Bp4-hgQHc-EcYng3-sdRXG3-NOfFk';
    i.wsc_customLoaderScript = i.wsc_customLoaderScript || null;
    j.add('styles', {
        requires: ['selection']
    });
    a.editor.prototype.attachStyleStateChange = function(l, m) {
        var n = this._.styleStateChangeCallbacks;
        if (!n) {
            n = this._.styleStateChangeCallbacks = [];
            this.on('selectionChange',
            function(o) {
                for (var p = 0; p < n.length; p++) {
                    var q = n[p],
                    r = q.style.checkActive(o.data.path) ? 1 : 2;
                    if (q.state !== r) {
                        q.fn.call(this, r);
                        q.state !== r;
                    }
                }
            });
        }
        n.push({
            style: l,
            fn: m
        });
    };
    a.STYLE_BLOCK = 1;
    a.STYLE_INLINE = 2;
    a.STYLE_OBJECT = 3;
    (function() {
        var l = {
            address: 1,
            div: 1,
            h1: 1,
            h2: 1,
            h3: 1,
            h4: 1,
            h5: 1,
            h6: 1,
            p: 1,
            pre: 1
        },
        m = {
            a: 1,
            embed: 1,
            hr: 1,
            img: 1,
            li: 1,
            object: 1,
            ol: 1,
            table: 1,
            td: 1,
            tr: 1,
            ul: 1
        },
        n = /\s*(?:;\s*|$)/;
        a.style = function(L, M) {
            if (M) {
                L = e.clone(L);
                G(L.attributes, M);
                G(L.styles, M);
            }
            var N = this.element = (L.element || '*').toLowerCase();
            this.type = N == '#' || l[N] ? 1 : m[N] ? 3 : 2;
            this._ = {
                definition: L
            };
        };
        a.style.prototype = {
            apply: function(L) {
                K.call(this, L, false);
            },
            remove: function(L) {
                K.call(this, L, true);
            },
            applyToRange: function(L) {
                var M = this;
                return (M.applyToRange = M.type == 2 ? o: M.type == 1 ? q: null).call(M, L);
            },
            removeFromRange: function(L) {
                return (this.removeFromRange = this.type == 2 ? p: null).call(this, L);
            },
            applyToObject: function(L) {
                E(L, this);
            },
            checkActive: function(L) {
                switch (this.type) {
                case 1:
                    return this.checkElementRemovable(L.block || L.blockLimit, true);
                case 2:
                    var M = L.elements;
                    for (var N = 0, O; N < M.length; N++) {
                        O = M[N];
                        if (O == L.block || O == L.blockLimit) continue;
                        if (this.checkElementRemovable(O, true)) return true;
                    }
                }
                return false;
            },
            checkElementRemovable: function(L, M) {
                if (!L) return false;
                var N = this._.definition,
                O;
                if (L.getName() == this.element) {
                    if (!M && !L.hasAttributes()) return true;
                    O = H(N);
                    if (O._length) {
                        for (var P in O) {
                            if (P == '_length') continue;
                            var Q = L.getAttribute(P) || '';
                            if (O[P] == (P == 'style' ? J(Q, false) : Q)) {
                                if (!M) return true;
                            } else if (M) return false;
                        }
                        if (M) return true;
                    } else return true;
                }
                var R = I(this)[L.getName()];
                if (R) {
                    if (! (O = R.attributes)) return true;
                    for (var S = 0; S < O.length; S++) {
                        P = O[S][0];
                        var T = L.getAttribute(P);
                        if (T) {
                            var U = O[S][1];
                            if (U === null || typeof U == 'string' && T == U || U.test(T)) return true;
                        }
                    }
                }
                return false;
            }
        };
        a.style.getStyleText = function(L) {
            var M = L._ST;
            if (M) return M;
            M = L.styles;
            var N = L.attributes && L.attributes.style || '';
            if (N.length) N = N.replace(n, ';');
            for (var O in M) N += (O + ':' + M[O]).replace(n, ';');
            if (N.length) N = J(N);
            return L._ST = N;
        };
        function o(L) {
            var al = this;
            var M = L.document;
            if (L.collapsed) {
                var N = D(al, M);
                L.insertNode(N);
                L.moveToPosition(N, 2);
                return;
            }
            var O = al.element,
            P = al._.definition,
            Q, R = f[O] || (Q = true, f.span),
            S = L.createBookmark();
            L.enlarge(1);
            L.trim();
            var T = L.getBoundaryNodes(),
            U = T.startNode,
            V = T.endNode.getNextSourceNode(true);
            if (!V) {
                var W;
                V = W = M.createText('');
                V.insertAfter(L.endContainer);
            }
            var X = V.getParent();
            if (X && X.getAttribute('_fck_bookmark')) V = X;
            if (V.equals(U)) {
                V = V.getNextSourceNode(true);
                if (!V) {
                    V = W = M.createText('');
                    V.insertAfter(U);
                }
            }
            var Y = U,
            Z, aa;
            while (Y) {
                var ab = false;
                if (Y.equals(V)) {
                    Y = null;
                    ab = true;
                } else {
                    var ac = Y.type,
                    ad = ac == 1 ? Y.getName() : null;
                    if (ad && Y.getAttribute('_fck_bookmark')) {
                        Y = Y.getNextSourceNode(true);
                        continue;
                    }
                    if (!ad || R[ad] && (Y.getPosition(V) | 4 | 0 | 8) == 4 + 0 + 8) {
                        var ae = Y.getParent();
                        if (ae && ((ae.getDtd() || f.span)[O] || Q)) {
                            if (!Z && (!ad || !f.$removeEmpty[ad] || (Y.getPosition(V) | 4 | 0 | 8) == 4 + 0 + 8)) {
                                Z = new d.range(M);
                                Z.setStartBefore(Y);
                            }
                            if (ac == 3 || ac == 1 && !Y.getChildCount()) {
                                var af = Y,
                                ag;
                                while (!af.$.nextSibling && (ag = af.getParent(), R[ag.getName()]) && (ag.getPosition(U) | 2 | 0 | 8) == 2 + 0 + 8) af = ag;
                                Z.setEndAfter(af);
                                if (!af.$.nextSibling) ab = true;
                                if (!aa) aa = ac != 3 || /[^\s\ufeff]/.test(Y.getText());
                            }
                        } else ab = true;
                    } else ab = true;
                    Y = Y.getNextSourceNode();
                }
                if (ab && aa && Z && !Z.collapsed) {
                    var ah = D(al, M),
                    ai = Z.getCommonAncestor();
                    while (ah && ai) {
                        if (ai.getName() == O) {
                            for (var aj in P.attributes) {
                                if (ah.getAttribute(aj) == ai.getAttribute(aj)) ah.removeAttribute(aj);
                            }
                            for (var ak in P.styles) {
                                if (ah.getStyle(ak) == ai.getStyle(ak)) ah.removeStyle(ak);
                            }
                            if (!ah.hasAttributes()) {
                                ah = null;
                                break;
                            }
                        }
                        ai = ai.getParent();
                    }
                    if (ah) {
                        Z.extractContents().appendTo(ah);
                        y(al, ah);
                        Z.insertNode(ah);
                        B(ah);
                        if (!c) ah.$.normalize();
                    }
                    Z = null;
                }
            }
            W && W.remove();
            L.moveToBookmark(S);
        };
        function p(L) {
            L.enlarge(1);
            var M = L.createBookmark(),
            N = M.startNode;
            if (L.collapsed) {
                var O = new d.elementPath(N.getParent()),
                P;
                for (var Q = 0, R; Q < O.elements.length && (R = O.elements[Q]); Q++) {
                    if (R == O.block || R == O.blockLimit) break;
                    if (this.checkElementRemovable(R)) {
                        var S = L.checkBoundaryOfElement(R, 2),
                        T = !S && L.checkBoundaryOfElement(R, 1);
                        if (T || S) {
                            P = R;
                            P.match = T ? 'start': 'end';
                        } else {
                            B(R);
                            x(this, R);
                        }
                    }
                }
                if (P) {
                    var U = N;
                    for (Q = 0; true; Q++) {
                        var V = O.elements[Q];
                        if (V.equals(P)) break;
                        else if (V.match) continue;
                        else V = V.clone();
                        V.append(U);
                        U = V;
                    }
                    U[P.match == 'start' ? 'insertBefore': 'insertAfter'](P);
                }
            } else {
                var W = M.endNode,
                X = this;
                function Y() {
                    var ab = new d.elementPath(N.getParent()),
                    ac = new d.elementPath(W.getParent()),
                    ad = null,
                    ae = null;
                    for (var af = 0; af < ab.elements.length; af++) {
                        var ag = ab.elements[af];
                        if (ag == ab.block || ag == ab.blockLimit) break;
                        if (X.checkElementRemovable(ag)) ad = ag;
                    }
                    for (af = 0; af < ac.elements.length; af++) {
                        ag = ac.elements[af];
                        if (ag == ac.block || ag == ac.blockLimit) break;
                        if (X.checkElementRemovable(ag)) ae = ag;
                    }
                    if (ae) W.breakParent(ae);
                    if (ad) N.breakParent(ad);
                };
                Y();
                var Z = N.getNext();
                while (!Z.equals(W)) {
                    var aa = Z.getNextSourceNode();
                    if (Z.type == 1 && this.checkElementRemovable(Z)) {
                        if (Z.getName() == this.element) x(this, Z);
                        else z(Z, I(this)[Z.getName()]);
                        if (aa.type == 1 && aa.contains(N)) {
                            Y();
                            aa = N.getNext();
                        }
                    }
                    Z = aa;
                }
            }
            L.moveToBookmark(M);
        };
        function q(L) {
            var M = L.createBookmark(true),
            N = L.createIterator();
            N.enforceRealBlocks = true;
            var O, P = L.document,
            Q;
            while (O = N.getNextParagraph()) {
                var R = D(this, P);
                r(O, R);
            }
            L.moveToBookmark(M);
        };
        function r(L, M) {
            var N = M.is('pre'),
            O = L.is('pre'),
            P = N && !O,
            Q = !N && O;
            if (P) M = w(L, M);
            else if (Q) M = v(t(L), M);
            else L.moveChildren(M);
            M.replace(L);
            if (N) s(M);
        };
        function s(L) {
            var M;
            if (! ((M = L.getPreviousSourceNode(true, 1)) && M.is && M.is('pre'))) return;
            var N = u(M.getHtml(), /\n$/, '') + '\n\n' + u(L.getHtml(), /^\n/, '');
            if (c) L.$.outerHTML = '<pre>' + N + '</pre>';
            else L.setHtml(N);
            M.remove();
        };
        function t(L) {
            var M = /(\S\s*)\n(?:\s|(<span[^>]+_fck_bookmark.*?\/span>))*\n(?!$)/gi,
            N = L.getName(),
            O = u(L.getOuterHtml(), M,
            function(Q, R, S) {
                return R + '</pre>' + S + '<pre>';
            }),
            P = [];
            O.replace(/<pre>([\s\S]*?)<\/pre>/gi,
            function(Q, R) {
                P.push(R);
            });
            return P;
        };
        function u(L, M, N) {
            var O = '',
            P = '';
            L = L.replace(/(^<span[^>]+_fck_bookmark.*?\/span>)|(<span[^>]+_fck_bookmark.*?\/span>$)/gi,
            function(Q, R, S) {
                R && (O = R);
                S && (P = S);
                return '';
            });
            return O + L.replace(M, N) + P;
        };
        function v(L, M) {
            var N = new d.documentFragment(M.getDocument());
            for (var O = 0; O < L.length; O++) {
                var P = L[O];
                P = P.replace(/(\r\n|\r)/g, '\n');
                P = u(P, /^[ \t]*\n/, '');
                P = u(P, /\n$/, '');
                P = u(P, /^[ \t]+|[ \t]+$/g,
                function(R, S, T) {
                    if (R.length == 1) return '&nbsp;';
                    else if (!S) return e.repeat('&nbsp;', R.length - 1) + ' ';
                    else return ' ' + e.repeat('&nbsp;', R.length - 1);
                });
                P = P.replace(/\n/g, '<br>');
                P = P.replace(/[ \t]{2,}/g,
                function(R) {
                    return e.repeat('&nbsp;', R.length - 1) + ' ';
                });
                var Q = M.clone();
                Q.setHtml(P);
                N.append(Q);
            }
            return N;
        };
        function w(L, M) {
            var N = L.getHtml();
            N = u(N, /(?:^[ \t\n\r]+)|(?:[ \t\n\r]+$)/g, '');
            N = N.replace(/[ \t\r\n]*(<br[^>]*>)[ \t\r\n]*/gi, '$1');
            N = N.replace(/([ \t\n\r]+|&nbsp;)/g, ' ');
            N = N.replace(/<br\b[^>]*>/gi, '\n');
            if (c) {
                var O = L.getDocument().createElement('div');
                O.append(M);
                M.$.outerHTML = '<pre>' + N + '</pre>';
                M = O.getFirst().remove();
            } else M.setHtml(N);
            return M;
        };
        function x(L, M) {
            var N = L._.definition,
            O = N.attributes,
            P = N.styles,
            Q = I(L);
            function R() {
                for (var T in O) {
                    if (T == 'class' && M.getAttribute(T) != O[T]) continue;
                    M.removeAttribute(T);
                }
            };
            R();
            for (var S in P) M.removeStyle(S);
            O = Q[M.getName()];
            if (O) R();
            A(M);
        };
        function y(L, M) {
            var N = L._.definition,
            O = N.attributes,
            P = N.styles,
            Q = I(L),
            R = M.getElementsByTag(L.element);
            for (var S = R.count(); --S >= 0;) x(L, R.getItem(S));
            for (var T in Q) {
                if (T != L.element) {
                    R = M.getElementsByTag(T);
                    for (S = R.count() - 1; S >= 0; S--) {
                        var U = R.getItem(S);
                        z(U, Q[T]);
                    }
                }
            }
        };
        function z(L, M) {
            var N = M && M.attributes;
            if (N) for (var O = 0; O < N.length; O++) {
                var P = N[O][0],
                Q;
                if (Q = L.getAttribute(P)) {
                    var R = N[O][1];
                    if (R === null || R.test && R.test(Q) || typeof R == 'string' && Q == R) L.removeAttribute(P);
                }
            }
            A(L);
        };
        function A(L) {
            if (!L.hasAttributes()) {
                var M = L.getFirst(),
                N = L.getLast();
                L.remove(true);
                if (M) {
                    B(M);
                    if (N && !M.equals(N)) B(N);
                }
            }
        };
        function B(L) {
            if (!L || L.type != 1 || !f.$removeEmpty[L.getName()]) return;
            C(L, L.getNext(), true);
            C(L, L.getPrevious());
        };
        function C(L, M, N) {
            if (M && M.type == 1) {
                var O = M.getAttribute('_fck_bookmark');
                if (O) M = N ? M.getNext() : M.getPrevious();
                if (M && M.type == 1 && L.isIdentical(M)) {
                    var P = N ? L.getLast() : L.getFirst();
                    if (O)(N ? M.getPrevious() : M.getNext()).move(L, !N);
                    M.moveChildren(L, !N);
                    M.remove();
                    if (P) B(P);
                }
            }
        };
        function D(L, M) {
            var N, O = L._.definition,
            P = L.element;
            if (P == '*') P = 'span';
            N = new h(P, M);
            return E(N, L);
        };
        function E(L, M) {
            var N = M._.definition,
            O = N.attributes,
            P = a.style.getStyleText(N);
            if (O) for (var Q in O) L.setAttribute(Q, O[Q]);
            if (P) L.setAttribute('style', P);
            return L;
        };
        var F = /#\((.+?)\)/g;
        function G(L, M) {
            for (var N in L) L[N] = L[N].replace(F,
            function(O, P) {
                return M[P];
            });
        };
        function H(L) {
            var M = L._AC;
            if (M) return M;
            M = {};
            var N = 0,
            O = L.attributes;
            if (O) for (var P in O) {
                N++;
                M[P] = O[P];
            }
            var Q = a.style.getStyleText(L);
            if (Q) {
                if (!M.style) N++;
                M.style = Q;
            }
            M._length = N;
            return L._AC = M;
        };
        function I(L) {
            if (L._.overrides) return L._.overrides;
            var M = L._.overrides = {},
            N = L._.definition.overrides;
            if (N) {
                if (!e.isArray(N)) N = [N];
                for (var O = 0; O < N.length; O++) {
                    var P = N[O],
                    Q,
                    R,
                    S;
                    if (typeof P == 'string') Q = P.toLowerCase();
                    else {
                        Q = P.element ? P.element.toLowerCase() : L.element;
                        S = P.attributes;
                    }
                    R = M[Q] || (M[Q] = {});
                    if (S) {
                        var T = R.attributes = R.attributes || [];
                        for (var U in S) T.push([U.toLowerCase(), S[U]]);
                    }
                }
            }
            return M;
        };
        function J(L, M) {
            var N;
            if (M !== false) {
                var O = new h('span');
                O.setAttribute('style', L);
                N = O.getAttribute('style');
            } else N = L;
            return N.replace(/\s*([;:])\s*/, '$1').replace(/([^\s;])$/, '$1;').replace(/,\s+/g, ',').toLowerCase();
        };
        function K(L, M) {
            var N = L.getSelection(),
            O = N.getRanges(),
            P = M ? this.removeFromRange: this.applyToRange;
            for (var Q = 0; Q < O.length; Q++) P.call(this, O[Q]);
            N.selectRanges(O);
        };
    })();
    a.styleCommand = function(l) {
        this.style = l;
    };
    a.styleCommand.prototype.exec = function(l) {
        var n = this;
        l.focus();
        var m = l.document;
        if (m) if (n.state == 2) n.style.apply(m);
        else if (n.state == 1) n.style.remove(m);
        return !! m;
    };
    j.add('domiterator');
    (function() {
        function l(o) {
            var p = this;
            if (arguments.length < 1) return;
            p.range = o;
            p.forceBrBreak = false;
            p.enlargeBr = true;
            p.enforceRealBlocks = false;
            p._ || (p._ = {});
        };
        var m = /^[\r\n\t ]+$/,
        n = d.walker.bookmark();
        l.prototype = {
            getNextParagraph: function(o) {
                var O = this;
                var p, q, r, s, t;
                if (!O._.lastNode) {
                    q = O.range.clone();
                    q.enlarge(O.forceBrBreak || !O.enlargeBr ? 3 : 2);
                    var u = new d.walker(q),
                    v = d.walker.bookmark(true, true);
                    u.evaluator = v;
                    O._.nextNode = u.next();
                    u = new d.walker(q);
                    u.evaluator = v;
                    var w = u.previous();
                    O._.lastNode = w.getNextSourceNode(true);
                    if (O._.lastNode && O._.lastNode.type == 3 && !e.trim(O._.lastNode.getText()) && O._.lastNode.getParent().isBlockBoundary()) {
                        var x = new d.range(q.document);
                        x.moveToPosition(O._.lastNode, 4);
                        if (x.checkEndOfBlock()) {
                            var y = new d.elementPath(x.endContainer),
                            z = y.block || y.blockLimit;
                            O._.lastNode = z.getNextSourceNode(true);
                        }
                    }
                    if (!O._.lastNode) {
                        O._.lastNode = O._.docEndMarker = q.document.createText('');
                        O._.lastNode.insertAfter(w);
                    }
                    q = null;
                }
                var A = O._.nextNode;
                w = O._.lastNode;
                O._.nextNode = null;
                while (A) {
                    var B = false,
                    C = A.type != 1,
                    D = false;
                    if (!C) {
                        var E = A.getName();
                        if (A.isBlockBoundary(O.forceBrBreak && {
                            br: 1
                        })) {
                            if (E == 'br') C = true;
                            else if (!q && !A.getChildCount() && E != 'hr') {
                                p = A;
                                r = A.equals(w);
                                break;
                            }
                            if (q) {
                                q.setEndAt(A, 3);
                                if (E != 'br') O._.nextNode = A;
                            }
                            B = true;
                        } else {
                            if (A.getFirst()) {
                                if (!q) {
                                    q = new d.range(O.range.document);
                                    q.setStartAt(A, 3);
                                }
                                A = A.getFirst();
                                continue;
                            }
                            C = true;
                        }
                    } else if (A.type == 3) if (m.test(A.getText())) C = false;
                    if (C && !q) {
                        q = new d.range(O.range.document);
                        q.setStartAt(A, 3);
                    }
                    r = (!B || C) && A.equals(w);
                    if (q && !B) while (!A.getNext() && !r) {
                        var F = A.getParent();
                        if (F.isBlockBoundary(O.forceBrBreak && {
                            br: 1
                        })) {
                            B = true;
                            r = r || F.equals(w);
                            break;
                        }
                        A = F;
                        C = true;
                        r = A.equals(w);
                        D = true;
                    }
                    if (C) q.setEndAt(A, 4);
                    A = A.getNextSourceNode(D, null, w);
                    r = !A;
                    if ((B || r) && q) {
                        var G = q.getBoundaryNodes(),
                        H = new d.elementPath(q.startContainer);
                        if (G.startNode.getParent().equals(H.blockLimit) && n(G.startNode) && n(G.endNode)) {
                            q = null;
                            O._.nextNode = null;
                        } else break;
                    }
                    if (r) break;
                }
                if (!p) {
                    if (!q) {
                        O._.docEndMarker && O._.docEndMarker.remove();
                        O._.nextNode = null;
                        return null;
                    }
                    H = new d.elementPath(q.startContainer);
                    var I = H.blockLimit,
                    J = {
                        div: 1,
                        th: 1,
                        td: 1
                    };
                    p = H.block;
                    if (!p && !O.enforceRealBlocks && J[I.getName()] && q.checkStartOfBlock() && q.checkEndOfBlock()) p = I;
                    else if (!p || O.enforceRealBlocks && p.getName() == 'li') {
                        p = O.range.document.createElement(o || 'p');
                        q.extractContents().appendTo(p);
                        p.trim();
                        q.insertNode(p);
                        s = t = true;
                    } else if (p.getName() != 'li') {
                        if (!q.checkStartOfBlock() || !q.checkEndOfBlock()) {
                            p = p.clone(false);
                            q.extractContents().appendTo(p);
                            p.trim();
                            var K = q.splitBlock();
                            s = !K.wasStartOfBlock;
                            t = !K.wasEndOfBlock;
                            q.insertNode(p);
                        }
                    } else if (!r) O._.nextNode = p.equals(w) ? null: q.getBoundaryNodes().endNode.getNextSourceNode(true, null, w);
                }
                if (s) {
                    var L = p.getPrevious();
                    if (L && L.type == 1) if (L.getName() == 'br') L.remove();
                    else if (L.getLast() && L.getLast().$.nodeName.toLowerCase() == 'br') L.getLast().remove();
                }
                if (t) {
                    var M = d.walker.bookmark(false, true),
                    N = p.getLast();
                    if (N && N.type == 1 && N.getName() == 'br') if (c || N.getPrevious(M) || N.getNext(M)) N.remove();
                }
                if (!O._.nextNode) O._.nextNode = r || p.equals(w) ? null: p.getNextSourceNode(true, null, w);
                return p;
            }
        };
        d.range.prototype.createIterator = function() {
            return new l(this);
        };
    })();
    j.add('panelbutton', {
        requires: ['button'],
        beforeInit: function(l) {
            l.ui.addHandler(4, k.panelButton.handler);
        }
    });
    a.UI_PANELBUTTON = 4;
    (function() {
        var l = function(m) {
            var o = this;
            var n = o._;
            if (n.state == 0) return;
            o.createPanel(m);
            if (n.on) {
                n.panel.hide();
                return;
            }
            n.panel.showBlock(o._.id, o.document.getById(o._.id), 4);
        };
        k.panelButton = e.createClass({
            base: k.button,
            $: function(m) {
                var o = this;
                var n = m.panel;
                delete m.panel;
                o.base(m);
                o.document = n && n.parent && n.parent.getDocument() || a.document;
                o.hasArrow = true;
                o.click = l;
                o._ = {
                    panelDefinition: n
                };
            },
            statics: {
                handler: {
                    create: function(m) {
                        return new k.panelButton(m);
                    }
                }
            },
            proto: {
                createPanel: function(m) {
                    var n = this._;
                    if (n.panel) return;
                    var o = this._.panelDefinition || {},
                    p = o.parent || a.document.getBody(),
                    q = this._.panel = new k.floatPanel(m, p, o),
                    r = this;
                    q.onShow = function() {
                        if (r.className) this.element.getFirst().addClass(r.className + '_panel');
                        n.oldState = r._.state;
                        r.setState(1);
                        n.on = 1;
                        if (r.onOpen) r.onOpen();
                    };
                    q.onHide = function() {
                        if (r.className) this.element.getFirst().removeClass(r.className + '_panel');
                        r.setState(n.oldState);
                        n.on = 0;
                        if (r.onClose) r.onClose();
                    };
                    q.onEscape = function() {
                        q.hide();
                        r.document.getById(n.id).focus();
                    };
                    if (this.onBlock) this.onBlock(q, n.id);
                    q.getBlock(n.id).onHide = function() {
                        n.on = 0;
                        r.setState(2);
                    };
                }
            }
        });
    })();
    j.add('floatpanel', {
        requires: ['panel']
    });
    (function() {
        var l = {},
        m = false;
        function n(o, p, q, r, s) {
            var t = p.getUniqueId() + '-' + q.getUniqueId() + '-' + o.skinName + '-' + o.lang.dir + (o.uiColor && '-' + o.uiColor || '') + (r.css && '-' + r.css || '') + (s && '-' + s || ''),
            u = l[t];
            if (!u) {
                u = l[t] = new k.panel(p, r);
                u.element = q.append(h.createFromHtml(u.renderHtml(o), p));
                u.element.setStyles({
                    display: 'none',
                    position: 'absolute'
                });
            }
            return u;
        };
        k.floatPanel = e.createClass({
            $: function(o, p, q, r) {
                q.forceIFrame = true;
                var s = p.getDocument(),
                t = n(o, s, p, q, r || 0),
                u = t.element,
                v = u.getFirst().getFirst();
                this.element = u;
                this._ = {
                    panel: t,
                    parentElement: p,
                    definition: q,
                    document: s,
                    iframe: v,
                    children: [],
                    dir: o.lang.dir
                };
            },
            proto: {
                addBlock: function(o, p) {
                    return this._.panel.addBlock(o, p);
                },
                addListBlock: function(o, p) {
                    return this._.panel.addListBlock(o, p);
                },
                getBlock: function(o) {
                    return this._.panel.getBlock(o);
                },
                showBlock: function(o, p, q, r, s) {
                    var t = this._.panel,
                    u = t.showBlock(o);
                    this.allowBlur(false);
                    m = true;
                    var v = this.element,
                    w = this._.iframe,
                    x = this._.definition,
                    y = p.getDocumentPosition(v.getDocument()),
                    z = this._.dir == 'rtl',
                    A = y.x + (r || 0),
                    B = y.y + (s || 0);
                    if (z && (q == 1 || q == 4)) A += p.$.offsetWidth;
                    else if (!z && (q == 2 || q == 3)) A += p.$.offsetWidth - 1;
                    if (q == 3 || q == 4) B += p.$.offsetHeight - 1;
                    this._.panel._.offsetParentId = p.getId();
                    v.setStyles({
                        top: B + 'px',
                        left: '-3000px',
                        opacity: '0',
                        display: ''
                    });
                    if (!this._.blurSet) {
                        var C = c ? w: new d.window(w.$.contentWindow);
                        a.event.useCapture = true;
                        C.on('blur',
                        function(D) {
                            var G = this;
                            if (!G.allowBlur()) return;
                            var E = D.data.getTarget(),
                            F = E.getWindow && E.getWindow();
                            if (F && F.equals(C)) return;
                            if (G.visible && !G._.activeChild && !m) G.hide();
                        },
                        this);
                        C.on('focus',
                        function() {
                            this._.focused = true;
                            this.hideChild();
                            this.allowBlur(true);
                        },
                        this);
                        a.event.useCapture = false;
                        this._.blurSet = 1;
                    }
                    t.onEscape = e.bind(function() {
                        this.onEscape && this.onEscape();
                    },
                    this);
                    e.setTimeout(function() {
                        if (z) A -= v.$.offsetWidth;
                        var D = e.bind(function() {
                            if (u.autoSize) {
                                var E = v.getFirst(),
                                F = u.element.$.scrollHeight;
                                if (c && b.quirks && F > 0) F += (E.$.offsetHeight || 0) - (E.$.clientHeight || 0);
                                E.setStyle('height', F + 'px');
                                t._.currentBlock.element.setStyle('display', 'none').removeStyle('display');
                            } else v.getFirst().removeStyle('height');
                            var G = t.element,
                            H = G.getWindow(),
                            I = H.getScrollPosition(),
                            J = H.getViewPaneSize(),
                            K = {
                                height: G.$.offsetHeight,
                                width: G.$.offsetWidth
                            };
                            if (z ? A < 0 : A + K.width > J.width + I.x) A += K.width * (z ? 1 : -1);
                            if (B + K.height > J.height + I.y) B -= K.height;
                            v.setStyles({
                                top: B + 'px',
                                left: A + 'px',
                                opacity: '1'
                            });
                        },
                        this);
                        t.isLoaded ? D() : t.onLoad = D;
                        e.setTimeout(function() {
                            if (x.voiceLabel) if (b.gecko) {
                                var E = w.getParent();
                                E.setAttribute('role', 'region');
                                E.setAttribute('title', x.voiceLabel);
                                w.setAttribute('role', 'region');
                                w.setAttribute('title', ' ');
                            }
                            w.$.contentWindow.focus();
                            this.allowBlur(true);
                        },
                        0, this);
                    },
                    0, this);
                    this.visible = 1;
                    if (this.onShow) this.onShow.call(this);
                    m = false;
                },
                hide: function() {
                    var o = this;
                    if (o.visible && (!o.onHide || o.onHide.call(o) !== true)) {
                        o.hideChild();
                        o.element.setStyle('display', 'none');
                        o.visible = 0;
                    }
                },
                allowBlur: function(o) {
                    var p = this._.panel;
                    if (o != undefined) p.allowBlur = o;
                    return p.allowBlur;
                },
                showAsChild: function(o, p, q, r, s, t) {
                    if (this._.activeChild == o && o._.panel._.offsetParentId == q.getId()) return;
                    this.hideChild();
                    o.onHide = e.bind(function() {
                        e.setTimeout(function() {
                            if (!this._.focused) this.hide();
                        },
                        0, this);
                    },
                    this);
                    this._.activeChild = o;
                    this._.focused = false;
                    o.showBlock(p, q, r, s, t);
                    if (b.ie7Compat || b.ie8 && b.ie6Compat) setTimeout(function() {
                        o.element.getChild(0).$.style.cssText += '';
                    },
                    100);
                },
                hideChild: function() {
                    var o = this._.activeChild;
                    if (o) {
                        delete o.onHide;
                        delete this._.activeChild;
                        o.hide();
                    }
                }
            }
        });
        a.on('instanceDestroyed',
        function() {
            var o = e.isEmpty(a.instances);
            for (var p in l) {
                var q = l[p];
                if (o) q.destroy();
                else q.element.hide();
            }
            o && (l = {});
        });
    })();
    j.add('menu', {
        beforeInit: function(l) {
            var m = l.config.menu_groups.split(','),
            n = {};
            for (var o = 0; o < m.length; o++) n[m[o]] = o + 1;
            l._.menuGroups = n;
            l._.menuItems = {};
        },
        requires: ['floatpanel']
    });
    e.extend(a.editor.prototype, {
        addMenuGroup: function(l, m) {
            this._.menuGroups[l] = m || 100;
        },
        addMenuItem: function(l, m) {
            if (this._.menuGroups[m.group]) this._.menuItems[l] = new a.menuItem(this, l, m);
        },
        addMenuItems: function(l) {
            for (var m in l) this.addMenuItem(m, l[m]);
        },
        getMenuItem: function(l) {
            return this._.menuItems[l];
        }
    });
    (function() {
        a.menu = e.createClass({
            $: function(m, n) {
                var o = this;
                o.id = 'cke_' + e.getNextNumber();
                o.editor = m;
                o.items = [];
                o._.level = n || 1;
            },
            _: {
                showSubMenu: function(m) {
                    var t = this;
                    var n = t._.subMenu,
                    o = t.items[m],
                    p = o.getItems && o.getItems();
                    if (!p) {
                        t._.panel.hideChild();
                        return;
                    }
                    if (n) n.removeAll();
                    else {
                        n = t._.subMenu = new a.menu(t.editor, t._.level + 1);
                        n.parent = t;
                        n.onClick = e.bind(t.onClick, t);
                    }
                    for (var q in p) {
                        var r = t.editor.getMenuItem(q);
                        if (r) {
                            r.state = p[q];
                            n.add(r);
                        }
                    }
                    var s = t._.panel.getBlock(t.id).element.getDocument().getById(t.id + String(m));
                    n.show(s, 2);
                }
            },
            proto: {
                add: function(m) {
                    if (!m.order) m.order = this.items.length;
                    this.items.push(m);
                },
                removeAll: function() {
                    this.items = [];
                },
                show: function(m, n, o, p) {
                    var q = this.items,
                    r = this.editor,
                    s = this._.panel,
                    t = this._.element;
                    if (!s) {
                        s = this._.panel = new k.floatPanel(this.editor, a.document.getBody(), {
                            css: r.skin.editor.css,
                            level: this._.level - 1,
                            className: r.skinClass + ' cke_contextmenu'
                        },
                        this._.level);
                        s.onEscape = e.bind(function() {
                            this.onEscape && this.onEscape();
                            this.hide();
                        },
                        this);
                        s.onHide = e.bind(function() {
                            this.onHide && this.onHide();
                        },
                        this);
                        var u = s.addBlock(this.id);
                        u.autoSize = true;
                        var v = u.keys;
                        v[40] = 'next';
                        v[9] = 'next';
                        v[38] = 'prev';
                        v[2000 + 9] = 'prev';
                        v[32] = 'click';
                        v[39] = 'click';
                        t = this._.element = u.element;
                        t.addClass(r.skinClass);
                        var w = t.getDocument();
                        w.getBody().setStyle('overflow', 'hidden');
                        w.getElementsByTag('html').getItem(0).setStyle('overflow', 'hidden');
                        this._.itemOverFn = e.addFunction(function(C) {
                            var D = this;
                            clearTimeout(D._.showSubTimeout);
                            D._.showSubTimeout = e.setTimeout(D._.showSubMenu, r.config.menu_subMenuDelay, D, [C]);
                        },
                        this);
                        this._.itemOutFn = e.addFunction(function(C) {
                            clearTimeout(this._.showSubTimeout);
                        },
                        this);
                        this._.itemClickFn = e.addFunction(function(C) {
                            var E = this;
                            var D = E.items[C];
                            if (D.state == 0) {
                                E.hide();
                                return;
                            }
                            if (D.getItems) E._.showSubMenu(C);
                            else E.onClick && E.onClick(D);
                        },
                        this);
                    }
                    l(q);
                    var x = ['<div class="cke_menu">'],
                    y = q.length,
                    z = y && q[0].group;
                    for (var A = 0; A < y; A++) {
                        var B = q[A];
                        if (z != B.group) {
                            x.push('<div class="cke_menuseparator"></div>');
                            z = B.group;
                        }
                        B.render(this, A, x);
                    }
                    x.push('</div>');
                    t.setHtml(x.join(''));
                    if (this.parent) this.parent._.panel.showAsChild(s, this.id, m, n, o, p);
                    else s.showBlock(this.id, m, n, o, p);
                    r.fire('menuShow', [s]);
                },
                hide: function() {
                    this._.panel && this._.panel.hide();
                }
            }
        });
        function l(m) {
            m.sort(function(n, o) {
                if (n.group < o.group) return - 1;
                else if (n.group > o.group) return 1;
                return n.order < o.order ? -1 : n.order > o.order ? 1 : 0;
            });
        };
    })();
    a.menuItem = e.createClass({
        $: function(l, m, n) {
            var o = this;
            e.extend(o, n, {
                order: 0,
                className: 'cke_button_' + m
            });
            o.group = l._.menuGroups[o.group];
            o.editor = l;
            o.name = m;
        },
        proto: {
            render: function(l, m, n) {
                var t = this;
                var o = l.id + String(m),
                p = typeof t.state == 'undefined' ? 2 : t.state,
                q = ' cke_' + (p == 1 ? 'on': p == 0 ? 'disabled': 'off'),
                r = t.label;
                if (p == 0) r = t.editor.lang.common.unavailable.replace('%1', r);
                if (t.className) q += ' ' + t.className;
                n.push('<span class="cke_menuitem"><a id="', o, '" class="', q, '" href="javascript:void(\'', (t.label || '').replace("'", ''), '\')" title="', t.label, '" tabindex="-1"_cke_focus=1 hidefocus="true"');
                if (b.opera || b.gecko && b.mac) n.push(' onkeypress="return false;"');
                if (b.gecko) n.push(' onblur="this.style.cssText = this.style.cssText;"');
                var s = (t.iconOffset || 0) * -16;
                n.push(' onmouseover="CKEDITOR.tools.callFunction(', l._.itemOverFn, ',', m, ');" onmouseout="CKEDITOR.tools.callFunction(', l._.itemOutFn, ',', m, ');" onclick="CKEDITOR.tools.callFunction(', l._.itemClickFn, ',', m, '); return false;"><span class="cke_icon_wrapper"><span class="cke_icon"' + (t.icon ? ' style="background-image:url(' + a.getUrl(t.icon) + ');background-position:0 ' + s + 'px;"': '') + '></span></span>' + '<span class="cke_label">');
                if (t.getItems) n.push('<span class="cke_menuarrow"></span>');
                n.push(r, '</span></a></span>');
            }
        }
    });
    i.menu_subMenuDelay = 400;
    i.menu_groups = 'clipboard,form,tablecell,tablecellproperties,tablerow,tablecolumn,table,anchor,link,image,flash,checkbox,radio,textfield,hiddenfield,imagebutton,button,select,textarea,div';
    (function() {
        var l = function(n, o) {
            return n._.modes && n._.modes[o || n.mode];
        },
        m;
        j.add('editingblock', {
            init: function(n) {
                if (!n.config.editingBlock) return;
                n.on('themeSpace',
                function(o) {
                    if (o.data.space == 'contents') o.data.html += '<br>';
                });
                n.on('themeLoaded',
                function() {
                    n.fireOnce('editingBlockReady');
                });
                n.on('uiReady',
                function() {
                    n.setMode(n.config.startupMode);
                });
                n.on('afterSetData',
                function() {
                    if (!m) {
                        function o() {
                            m = true;
                            l(n).loadData(n.getData());
                            m = false;
                        };
                        if (n.mode) o();
                        else n.on('mode',
                        function() {
                            o();
                            n.removeListener('mode', arguments.callee);
                        });
                    }
                });
                n.on('beforeGetData',
                function() {
                    if (!m && n.mode) {
                        m = true;
                        n.setData(l(n).getData());
                        m = false;
                    }
                });
                n.on('getSnapshot',
                function(o) {
                    if (n.mode) o.data = l(n).getSnapshotData();
                });
                n.on('loadSnapshot',
                function(o) {
                    if (n.mode) l(n).loadSnapshotData(o.data);
                });
                n.on('mode',
                function(o) {
                    o.removeListener();
                    var p = n.container;
                    if (b.webkit && b.version < 528) {
                        var q = n.config.tabIndex || n.element.getAttribute('tabindex') || 0;
                        p = p.append(h.createFromHtml('<input tabindex="' + q + '"' + ' style="position:absolute; left:-10000">'));
                    }
                    p.on('focus',
                    function() {
                        n.focus();
                    });
                    if (n.config.startupFocus) n.focus();
                    setTimeout(function() {
                        n.fireOnce('instanceReady');
                        a.fire('instanceReady', null, n);
                    });
                });
            }
        });
        a.editor.prototype.mode = '';
        a.editor.prototype.addMode = function(n, o) {
            o.name = n;
            (this._.modes || (this._.modes = {}))[n] = o;
        };
        a.editor.prototype.setMode = function(n) {
            var o, p = this.getThemeSpace('contents'),
            q = this.checkDirty();
            if (this.mode) {
                if (n == this.mode) return;
                this.fire('beforeModeUnload');
                var r = l(this);
                o = r.getData();
                r.unload(p);
                this.mode = '';
            }
            p.setHtml('');
            var s = l(this, n);
            if (!s) throw '[CKEDITOR.editor.setMode] Unknown mode "' + n + '".';
            if (!q) this.on('mode',
            function() {
                this.resetDirty();
                this.removeListener('mode', arguments.callee);
            });
            s.load(p, typeof o != 'string' ? this.getData() : o);
        };
        a.editor.prototype.focus = function() {
            var n = l(this);
            if (n) n.focus();
        };
    })();
    i.startupMode = 'wysiwyg';
    i.startupFocus = false;
    i.editingBlock = true;
    (function() {
        function l() {
            var v = this;
            try {
                var s = v.getSelection();
                if (!s) return;
                var t = s.getStartElement(),
                u = new d.elementPath(t);
                if (!u.compare(v._.selectionPreviousPath)) {
                    v._.selectionPreviousPath = u;
                    v.fire('selectionChange', {
                        selection: s,
                        path: u,
                        element: t
                    });
                }
            } catch(w) {}
        };
        var m, n;
        function o() {
            n = true;
            if (m) return;
            p.call(this);
            m = e.setTimeout(p, 200, this);
        };
        function p() {
            m = null;
            if (n) {
                e.setTimeout(l, 0, this);
                n = false;
            }
        };
        var q = {
            exec: function(s) {
                switch (s.mode) {
                case 'wysiwyg':
                    s.document.$.execCommand('SelectAll', false, null);
                    break;
                case 'source':
                }
            },
            canUndo: false
        };
        j.add('selection', {
            init: function(s) {
                s.on('contentDom',
                function() {
                    var t = s.document,
                    u = t.getBody();
                    if (c) {
                        var v, w;
                        u.on('focusin',
                        function() {
                            if (v) {
                                try {
                                    v.select();
                                } catch(z) {}
                                v = null;
                            }
                        });
                        s.window.on('focus',
                        function() {
                            w = true;
                            y();
                        });
                        u.on('beforedeactivate',
                        function() {
                            w = false;
                        });
                        u.on('mousedown', x);
                        u.on('mouseup',
                        function() {
                            w = true;
                            setTimeout(function() {
                                y(true);
                            },
                            0);
                        });
                        u.on('keydown', x);
                        u.on('keyup',
                        function() {
                            w = true;
                            y();
                        });
                        t.on('selectionchange', y);
                        function x() {
                            w = false;
                        };
                        function y(z) {
                            if (w) {
                                var A = s.document,
                                B = A && A.$.selection;
                                if (z && B && B.type == 'None') if (!A.$.queryCommandEnabled('InsertImage')) {
                                    e.setTimeout(y, 50, this, true);
                                    return;
                                }
                                v = B && B.createRange();
                                o.call(s);
                            }
                        };
                    } else {
                        t.on('mouseup', o, s);
                        t.on('keyup', o, s);
                    }
                });
                s.addCommand('selectAll', q);
                s.ui.addButton('SelectAll', {
                    label: s.lang.selectAll,
                    command: 'selectAll'
                });
                s.selectionChange = o;
            }
        });
        a.editor.prototype.getSelection = function() {
            return this.document && this.document.getSelection();
        };
        a.editor.prototype.forceNextSelectionCheck = function() {
            delete this._.selectionPreviousPath;
        };
        g.prototype.getSelection = function() {
            var s = new d.selection(this);
            return ! s || s.isInvalid ? null: s;
        };
        a.SELECTION_NONE = 1;
        a.SELECTION_TEXT = 2;
        a.SELECTION_ELEMENT = 3;
        d.selection = function(s) {
            var v = this;
            var t = s.getCustomData('cke_locked_selection');
            if (t) return t;
            v.document = s;
            v.isLocked = false;
            v._ = {
                cache: {}
            };
            if (c) {
                var u = v.getNative().createRange();
                if (!u || u.item && u.item(0).ownerDocument != v.document.$ || u.parentElement && u.parentElement().ownerDocument != v.document.$) v.isInvalid = true;
            }
            return v;
        };
        var r = {
            img: 1,
            hr: 1,
            li: 1,
            table: 1,
            tr: 1,
            td: 1,
            th: 1,
            embed: 1,
            object: 1,
            ol: 1,
            ul: 1,
            a: 1,
            input: 1,
            form: 1,
            select: 1,
            textarea: 1,
            button: 1,
            fieldset: 1,
            th: 1,
            thead: 1,
            tfoot: 1
        };
        d.selection.prototype = {
            getNative: c ?
            function() {
                return this._.cache.nativeSel || (this._.cache.nativeSel = this.document.$.selection);
            }: function() {
                return this._.cache.nativeSel || (this._.cache.nativeSel = this.document.getWindow().$.getSelection());
            },
            getType: c ?
            function() {
                var s = this._.cache;
                if (s.type) return s.type;
                var t = 1;
                try {
                    var u = this.getNative(),
                    v = u.type;
                    if (v == 'Text') t = 2;
                    if (v == 'Control') t = 3;
                    if (u.createRange().parentElement) t = 2;
                } catch(w) {}
                return s.type = t;
            }: function() {
                var s = this._.cache;
                if (s.type) return s.type;
                var t = 2,
                u = this.getNative();
                if (!u) t = 1;
                else if (u.rangeCount == 1) {
                    var v = u.getRangeAt(0),
                    w = v.startContainer;
                    if (w == v.endContainer && w.nodeType == 1 && v.endOffset - v.startOffset == 1 && r[w.childNodes[v.startOffset].nodeName.toLowerCase()]) t = 3;
                }
                return s.type = t;
            },
            getRanges: c ? (function() {
                var s = function(t, u) {
                    t = t.duplicate();
                    t.collapse(u);
                    var v = t.parentElement(),
                    w = v.childNodes,
                    x;
                    for (var y = 0; y < w.length; y++) {
                        var z = w[y];
                        if (z.nodeType == 1) {
                            x = t.duplicate();
                            x.moveToElementText(z);
                            x.collapse();
                            var A = x.compareEndPoints('StartToStart', t);
                            if (A > 0) break;
                            else if (A === 0) return {
                                container: v,
                                offset: y
                            };
                            x = null;
                        }
                    }
                    if (!x) {
                        x = t.duplicate();
                        x.moveToElementText(v);
                        x.collapse(false);
                    }
                    x.setEndPoint('StartToStart', t);
                    var B = x.text.replace(/(\r\n|\r)/g, '\n').length;
                    while (B > 0) B -= w[--y].nodeValue.length;
                    if (B === 0) return {
                        container: v,
                        offset: y
                    };
                    else return {
                        container: w[y],
                        offset: -B
                    };
                };
                return function() {
                    var E = this;
                    var t = E._.cache;
                    if (t.ranges) return t.ranges;
                    var u = E.getNative(),
                    v = u && u.createRange(),
                    w = E.getType(),
                    x;
                    if (!u) return [];
                    if (w == 2) {
                        x = new d.range(E.document);
                        var y = s(v, true);
                        x.setStart(new d.node(y.container), y.offset);
                        y = s(v);
                        x.setEnd(new d.node(y.container), y.offset);
                        return t.ranges = [x];
                    } else if (w == 3) {
                        var z = E._.cache.ranges = [];
                        for (var A = 0; A < v.length; A++) {
                            var B = v.item(A),
                            C = B.parentNode,
                            D = 0;
                            x = new d.range(E.document);
                            for (; D < C.childNodes.length && C.childNodes[D] != B; D++) {}
                            x.setStart(new d.node(C), D);
                            x.setEnd(new d.node(C), D + 1);
                            z.push(x);
                        }
                        return z;
                    }
                    return t.ranges = [];
                };
            })() : function() {
                var s = this._.cache;
                if (s.ranges) return s.ranges;
                var t = [],
                u = this.getNative();
                if (!u) return [];
                for (var v = 0; v < u.rangeCount; v++) {
                    var w = u.getRangeAt(v),
                    x = new d.range(this.document);
                    x.setStart(new d.node(w.startContainer), w.startOffset);
                    x.setEnd(new d.node(w.endContainer), w.endOffset);
                    t.push(x);
                }
                return s.ranges = t;
            },
            getStartElement: function() {
                var z = this;
                var s = z._.cache;
                if (s.startElement !== undefined) return s.startElement;
                var t, u = z.getNative();
                switch (z.getType()) {
                case 3:
                    return z.getSelectedElement();
                case 2:
                    var v = z.getRanges()[0];
                    if (v) if (!v.collapsed) {
                        v.optimize();
                        for (;;) {
                            var w = v.startContainer,
                            x = v.startOffset;
                            if (x == (w.getChildCount ? w.getChildCount() : w.getLength()) && !w.isBlockBoundary()) v.setStartAfter(w);
                            else break;
                        }
                        t = v.startContainer;
                        if (t.type != 1) return t.getParent();
                        t = t.getChild(v.startOffset);
                        if (!t || t.type != 1) return v.startContainer;
                        var y = t.getFirst();
                        while (y && y.type == 1) {
                            t = y;
                            y = y.getFirst();
                        }
                        return t;
                    }
                    if (c) {
                        v = u.createRange();
                        v.collapse(true);
                        t = v.parentElement();
                    } else {
                        t = u.anchorNode;
                        if (t && t.nodeType != 1) t = t.parentNode;
                    }
                }
                return s.startElement = t ? new h(t) : null;
            },
            getSelectedElement: function() {
                var s = this._.cache;
                if (s.selectedElement !== undefined) return s.selectedElement;
                var t;
                if (this.getType() == 3) {
                    var u = this.getNative();
                    if (c) try {
                        t = u.createRange().item(0);
                    } catch(w) {} else {
                        var v = u.getRangeAt(0);
                        t = v.startContainer.childNodes[v.startOffset];
                    }
                }
                return s.selectedElement = t ? new h(t) : null;
            },
            lock: function() {
                var s = this;
                s.getRanges();
                s.getStartElement();
                s.getSelectedElement();
                s._.cache.nativeSel = {};
                s.isLocked = true;
                s.document.setCustomData('cke_locked_selection', s);
            },
            unlock: function(s) {
                var x = this;
                var t = x.document,
                u = t.getCustomData('cke_locked_selection');
                if (u) {
                    t.setCustomData('cke_locked_selection', null);
                    if (s) {
                        var v = u.getSelectedElement(),
                        w = !v && u.getRanges();
                        x.isLocked = false;
                        x.reset();
                        t.getBody().focus();
                        if (v) x.selectElement(v);
                        else x.selectRanges(w);
                    }
                }
                if (!u || !s) {
                    x.isLocked = false;
                    x.reset();
                }
            },
            reset: function() {
                this._.cache = {};
            },
            selectElement: function(s) {
                var v = this;
                if (v.isLocked) {
                    var t = new d.range(v.document);
                    t.setStartBefore(s);
                    t.setEndAfter(s);
                    v._.cache.selectedElement = s;
                    v._.cache.startElement = s;
                    v._.cache.ranges = [t];
                    v._.cache.type = 3;
                    return;
                }
                if (c) {
                    v.getNative().empty();
                    try {
                        t = v.document.$.body.createControlRange();
                        t.addElement(s.$);
                        t.select();
                    } catch(w) {
                        t = v.document.$.body.createTextRange();
                        t.moveToElementText(s.$);
                        t.select();
                    }
                    v.reset();
                } else {
                    t = v.document.$.createRange();
                    t.selectNode(s.$);
                    var u = v.getNative();
                    u.removeAllRanges();
                    u.addRange(t);
                    v.reset();
                }
            },
            selectRanges: function(s) {
                var y = this;
                if (y.isLocked) {
                    y._.cache.selectedElement = null;
                    y._.cache.startElement = s[0].getTouchedStartNode();
                    y._.cache.ranges = s;
                    y._.cache.type = 2;
                    return;
                }
                if (c) {
                    if (s[0]) s[0].select();
                    y.reset();
                } else {
                    var t = y.getNative();
                    t.removeAllRanges();
                    for (var u = 0; u < s.length; u++) {
                        var v = s[u],
                        w = y.document.$.createRange(),
                        x = v.startContainer;
                        if (v.collapsed && b.gecko && b.version < 10900 && x.type == 1 && !x.getChildCount()) x.appendText('');
                        w.setStart(x.$, v.startOffset);
                        w.setEnd(v.endContainer.$, v.endOffset);
                        t.addRange(w);
                    }
                    y.reset();
                }
            },
            createBookmarks: function(s) {
                var t = [],
                u = this.getRanges(),
                v = u.length,
                w;
                for (var x = 0; x < v; x++) {
                    t.push(w = u[x].createBookmark(s, true));
                    s = w.serializable;
                    var y = s ? this.document.getById(w.startNode) : w.startNode,
                    z = s ? this.document.getById(w.endNode) : w.endNode;
                    for (var A = x + 1; A < v; A++) {
                        var B = u[A],
                        C = B.startContainer,
                        D = B.endContainer;
                        C.equals(y.getParent()) && B.startOffset++;
                        C.equals(z.getParent()) && B.startOffset++;
                        D.equals(y.getParent()) && B.endOffset++;
                        D.equals(z.getParent()) && B.endOffset++;
                    }
                }
                return t;
            },
            createBookmarks2: function(s) {
                var t = [],
                u = this.getRanges();
                for (var v = 0; v < u.length; v++) t.push(u[v].createBookmark2(s));
                return t;
            },
            selectBookmarks: function(s) {
                var t = [];
                for (var u = 0; u < s.length; u++) {
                    var v = new d.range(this.document);
                    v.moveToBookmark(s[u]);
                    t.push(v);
                }
                this.selectRanges(t);
                return this;
            },
            getCommonAncestor: function() {
                var s = this.getRanges(),
                t = s[0].startContainer,
                u = s[s.length - 1].endContainer;
                return t.getCommonAncestor(u);
            },
            scrollIntoView: function() {
                var s = this.getStartElement();
                s.scrollIntoView();
            }
        };
    })();
    (function() {
        var l = d.walker.whitespaces(true),
        m = /\ufeff|\u00a0/;
        d.range.prototype.select = c ?
        function(n) {
            var x = this;
            var o = x.collapsed,
            p, q, r = x.createBookmark(),
            s = r.startNode,
            t;
            if (!o) t = r.endNode;
            var u = x.document.$.body.createTextRange();
            u.moveToElementText(s.$);
            u.moveStart('character', 1);
            if (t) {
                var v = x.document.$.body.createTextRange();
                v.moveToElementText(t.$);
                u.setEndPoint('EndToEnd', v);
                u.moveEnd('character', -1);
            } else {
                var w = s.getNext(l);
                p = !(w && w.getText && w.getText().match(m)) && (n || !s.hasPrevious() || s.getPrevious().is && s.getPrevious().is('br'));
                q = x.document.createElement('span');
                q.setHtml('&#65279;');
                q.insertBefore(s);
                if (p) x.document.createText('﻿').insertBefore(s);
            }
            x.setStartBefore(s);
            s.remove();
            if (o) {
                if (p) {
                    u.moveStart('character', -1);
                    u.select();
                    x.document.$.selection.clear();
                } else u.select();
                q.remove();
            } else {
                x.setEndBefore(t);
                t.remove();
                u.select();
            }
        }: function() {
            var q = this;
            var n = q.startContainer;
            if (q.collapsed && n.type == 1 && !n.getChildCount()) n.append(new d.text(''));
            var o = q.document.$.createRange();
            o.setStart(n.$, q.startOffset);
            try {
                o.setEnd(q.endContainer.$, q.endOffset);
            } catch(r) {
                if (r.toString().indexOf('NS_ERROR_ILLEGAL_VALUE') >= 0) {
                    q.collapse(true);
                    o.setEnd(q.endContainer.$, q.endOffset);
                } else throw r;
            }
            var p = q.document.getSelection().getNative();
            p.removeAllRanges();
            p.addRange(o);
        };
    })();
    (function() {
        var l = {
            elements: {
                $: function(m) {
                    var n = m.attributes,
                    o = n && n._cke_realelement,
                    p = o && new a.htmlParser.fragment.fromHtml(decodeURIComponent(o)),
                    q = p && p.children[0];
                    if (q && m.attributes._cke_resizable) {
                        var r = m.attributes.style;
                        if (r) {
                            var s = /(?:^|\s)width\s*:\s*(\d+)/i.exec(r),
                            t = s && s[1];
                            s = /(?:^|\s)height\s*:\s*(\d+)/i.exec(r);
                            var u = s && s[1];
                            if (t) q.attributes.width = t;
                            if (u) q.attributes.height = u;
                        }
                    }
                    return q;
                }
            }
        };
        j.add('fakeobjects', {
            requires: ['htmlwriter'],
            afterInit: function(m) {
                var n = m.dataProcessor,
                o = n && n.htmlFilter;
                if (o) o.addRules(l);
            }
        });
    })();
    a.editor.prototype.createFakeElement = function(l, m, n, o) {
        var p = this.lang.fakeobjects,
        q = {
            'class': m,
            src: a.getUrl('images/spacer.gif'),
            _cke_realelement: encodeURIComponent(l.getOuterHtml()),
            _cke_real_node_type: l.type,
            alt: p[n] || p.unknown
        };
        if (n) q._cke_real_element_type = n;
        if (o) q._cke_resizable = o;
        return this.document.createElement('img', {
            attributes: q
        });
    };
    a.editor.prototype.createFakeParserElement = function(l, m, n, o) {
        var p = this.lang.fakeobjects,
        q, r = new a.htmlParser.basicWriter();
        l.writeHtml(r);
        q = r.getHtml();
        var s = {
            'class': m,
            src: a.getUrl('images/spacer.gif'),
            _cke_realelement: encodeURIComponent(q),
            _cke_real_node_type: l.type,
            alt: p[n] || p.unknown
        };
        if (n) s._cke_real_element_type = n;
        if (o) s._cke_resizable = o;
        return new a.htmlParser.element('img', s);
    };
    a.editor.prototype.restoreRealElement = function(l) {
        if (l.getAttribute('_cke_real_node_type') != 1) return null;
        return h.createFromHtml(decodeURIComponent(l.getAttribute('_cke_realelement')), this.document);
    };
    j.add('richcombo', {
        requires: ['floatpanel', 'listblock', 'button'],
        beforeInit: function(l) {
            l.ui.addHandler(3, k.richCombo.handler);
        }
    });
    a.UI_RICHCOMBO = 3;
    k.richCombo = e.createClass({
        $: function(l) {
            var n = this;
            e.extend(n, l, {
                title: l.label,
                modes: {
                    wysiwyg: 1
                }
            });
            var m = n.panel || {};
            delete n.panel;
            n.id = e.getNextNumber();
            n.document = m && m.parent && m.parent.getDocument() || a.document;
            m.className = (m.className || '') + ' cke_rcombopanel';
            n._ = {
                panelDefinition: m,
                items: {},
                state: 2
            };
        },
        statics: {
            handler: {
                create: function(l) {
                    return new k.richCombo(l);
                }
            }
        },
        proto: {
            renderHtml: function(l) {
                var m = [];
                this.render(l, m);
                return m.join('');
            },
            render: function(l, m) {
                var n = 'cke_' + this.id,
                o = e.addFunction(function(r) {
                    var u = this;
                    var s = u._;
                    if (s.state == 0) return;
                    u.createPanel(l);
                    if (s.on) {
                        s.panel.hide();
                        return;
                    }
                    if (!s.committed) {
                        s.list.commit();
                        s.committed = 1;
                    }
                    var t = u.getValue();
                    if (t) s.list.mark(t);
                    else s.list.unmarkAll();
                    s.panel.showBlock(u.id, new h(r), 4);
                },
                this),
                p = {
                    id: n,
                    combo: this,
                    focus: function() {
                        var r = a.document.getById(n).getChild(1);
                        r.focus();
                    },
                    execute: o
                };
                l.on('mode',
                function() {
                    this.setState(this.modes[l.mode] ? 2 : 0);
                },
                this);
                var q = e.addFunction(function(r, s) {
                    r = new d.event(r);
                    var t = r.getKeystroke();
                    switch (t) {
                    case 13:
                    case 32:
                    case 40:
                        e.callFunction(o, s);
                        break;
                    default:
                        p.onkey(p, t);
                    }
                    r.preventDefault();
                });
                m.push('<span class="cke_rcombo">', '<span id=', n);
                if (this.className) m.push(' class="', this.className, ' cke_off"');
                m.push('><span class=cke_label>', this.label, '</span><a hidefocus=true title="', this.title, '" tabindex="-1" href="javascript:void(\'', this.label, "')\"");
                if (b.opera || b.gecko && b.mac) m.push(' onkeypress="return false;"');
                if (b.gecko) m.push(' onblur="this.style.cssText = this.style.cssText;"');
                m.push(' onkeydown="CKEDITOR.tools.callFunction( ', q, ', event, this );" onclick="CKEDITOR.tools.callFunction(', o, ', this); return false;"><span><span class="cke_accessibility">' + (this.voiceLabel ? this.voiceLabel + ' ': '') + '</span>' + '<span id="' + n + '_text" class="cke_text cke_inline_label">' + this.label + '</span>' + '</span>' + '<span class=cke_openbutton></span>' + '</a>' + '</span>' + '</span>');
                if (this.onRender) this.onRender();
                return p;
            },
            createPanel: function(l) {
                if (this._.panel) return;
                var m = this._.panelDefinition,
                n = m.parent || a.document.getBody(),
                o = new k.floatPanel(l, n, m),
                p = o.addListBlock(this.id, this.multiSelect),
                q = this;
                o.onShow = function() {
                    if (q.className) this.element.getFirst().addClass(q.className + '_panel');
                    q.setState(1);
                    p.focus(!q.multiSelect && q.getValue());
                    q._.on = 1;
                    if (q.onOpen) q.onOpen();
                };
                o.onHide = function() {
                    if (q.className) this.element.getFirst().removeClass(q.className + '_panel');
                    q.setState(2);
                    q._.on = 0;
                    if (q.onClose) q.onClose();
                };
                o.onEscape = function() {
                    o.hide();
                    q.document.getById('cke_' + q.id).getFirst().getNext().focus();
                };
                p.onClick = function(r, s) {
                    q.document.getWindow().focus();
                    if (q.onClick) q.onClick.call(q, r, s);
                    if (s) q.setValue(r, q._.items[r]);
                    else q.setValue('');
                    o.hide();
                };
                this._.panel = o;
                this._.list = p;
                o.getBlock(this.id).onHide = function() {
                    q._.on = 0;
                    q.setState(2);
                };
                if (this.init) this.init();
            },
            setValue: function(l, m) {
                var o = this;
                o._.value = l;
                var n = o.document.getById('cke_' + o.id + '_text');
                if (! (l || m)) {
                    m = o.label;
                    n.addClass('cke_inline_label');
                } else n.removeClass('cke_inline_label');
                n.setHtml(typeof m != 'undefined' ? m: l);
            },
            getValue: function() {
                return this._.value || '';
            },
            unmarkAll: function() {
                this._.list.unmarkAll();
            },
            mark: function(l) {
                this._.list.mark(l);
            },
            hideItem: function(l) {
                this._.list.hideItem(l);
            },
            hideGroup: function(l) {
                this._.list.hideGroup(l);
            },
            showAll: function() {
                this._.list.showAll();
            },
            add: function(l, m, n) {
                this._.items[l] = n || l;
                this._.list.add(l, m, n);
            },
            startGroup: function(l) {
                this._.list.startGroup(l);
            },
            commit: function() {
                this._.list.commit();
            },
            setState: function(l) {
                var m = this;
                if (m._.state == l) return;
                m.document.getById('cke_' + m.id).setState(l);
                m._.state = l;
            }
        }
    });
    k.prototype.addRichCombo = function(l, m) {
        this.add(l, 3, m);
    };
    j.add('htmlwriter');
    a.htmlWriter = e.createClass({
        base: a.htmlParser.basicWriter,
        $: function() {
            var n = this;
            n.base();
            n.indentationChars = '\t';
            n.selfClosingEnd = ' />';
            n.lineBreakChars = '\n';
            n.forceSimpleAmpersand = false;
            n.sortAttributes = true;
            n._.indent = false;
            n._.indentation = '';
            n._.rules = {};
            var l = f;
            for (var m in e.extend({},
            l.$nonBodyContent, l.$block, l.$listItem, l.$tableContent)) n.setRules(m, {
                indent: true,
                breakBeforeOpen: true,
                breakAfterOpen: true,
                breakBeforeClose: !l[m]['#'],
                breakAfterClose: true
            });
            n.setRules('br', {
                breakAfterOpen: true
            });
            n.setRules('title', {
                indent: false,
                breakAfterOpen: false
            });
            n.setRules('style', {
                indent: false,
                breakBeforeClose: true
            });
            n.setRules('pre', {
                indent: false
            });
        },
        proto: {
            openTag: function(l, m) {
                var o = this;
                var n = o._.rules[l];
                if (o._.indent) o.indentation();
                else if (n && n.breakBeforeOpen) {
                    o.lineBreak();
                    o.indentation();
                }
                o._.output.push('<', l);
            },
            openTagClose: function(l, m) {
                var o = this;
                var n = o._.rules[l];
                if (m) o._.output.push(o.selfClosingEnd);
                else {
                    o._.output.push('>');
                    if (n && n.indent) o._.indentation += o.indentationChars;
                }
                if (n && n.breakAfterOpen) o.lineBreak();
            },
            attribute: function(l, m) {
                if (this.forceSimpleAmpersand) m = m.replace(/&amp;/, '&');
                this._.output.push(' ', l, '="', m, '"');
            },
            closeTag: function(l) {
                var n = this;
                var m = n._.rules[l];
                if (m && m.indent) n._.indentation = n._.indentation.substr(n.indentationChars.length);
                if (n._.indent) n.indentation();
                else if (m && m.breakBeforeClose) {
                    n.lineBreak();
                    n.indentation();
                }
                n._.output.push('</', l, '>');
                if (m && m.breakAfterClose) n.lineBreak();
            },
            text: function(l) {
                if (this._.indent) {
                    this.indentation();
                    l = e.ltrim(l);
                }
                this._.output.push(l);
            },
            comment: function(l) {
                if (this._.indent) this.indentation();
                this._.output.push('<!--', l, '-->');
            },
            lineBreak: function() {
                var l = this;
                if (l._.output.length > 0) l._.output.push(l.lineBreakChars);
                l._.indent = true;
            },
            indentation: function() {
                this._.output.push(this._.indentation);
                this._.indent = false;
            },
            setRules: function(l, m) {
                var n = this._.rules[l];
                if (n) e.extend(n, m, true);
                else this._.rules[l] = m;
            }
        }
    });
    j.add('menubutton', {
        requires: ['button', 'contextmenu'],
        beforeInit: function(l) {
            l.ui.addHandler(5, k.menuButton.handler);
        }
    });
    a.UI_MENUBUTTON = 5;
    (function() {
        var l = function(m) {
            var n = this._;
            if (n.state === 0) return;
            n.previousState = n.state;
            var o = n.menu;
            if (!o) {
                o = n.menu = new j.contextMenu(m);
                o.onHide = e.bind(function() {
                    this.setState(n.previousState);
                },
                this);
                if (this.onMenu) o.addListener(this.onMenu);
            }
            if (n.on) {
                o.hide();
                return;
            }
            this.setState(1);
            o.show(a.document.getById(this._.id), 4);
        };
        k.menuButton = e.createClass({
            base: k.button,
            $: function(m) {
                var n = m.panel;
                delete m.panel;
                this.base(m);
                this.hasArrow = true;
                this.click = l;
            },
            statics: {
                handler: {
                    create: function(m) {
                        return new k.menuButton(m);
                    }
                }
            }
        });
    })();
    a.DIALOG_RESIZE_NONE = 0;
    a.DIALOG_RESIZE_WIDTH = 1;
    a.DIALOG_RESIZE_HEIGHT = 2;
    a.DIALOG_RESIZE_BOTH = 3;
    (function() {
        function l(K) {
            return !! this._.tabs[K][0].$.offsetHeight;
        };
        function m() {
            var O = this;
            var K = O._.currentTabId,
            L = O._.tabIdList.length,
            M = e.indexOf(O._.tabIdList, K) + L;
            for (var N = M - 1; N > M - L; N--) {
                if (l.call(O, O._.tabIdList[N % L])) return O._.tabIdList[N % L];
            }
            return null;
        };
        function n() {
            var O = this;
            var K = O._.currentTabId,
            L = O._.tabIdList.length,
            M = e.indexOf(O._.tabIdList, K);
            for (var N = M + 1; N < M + L; N++) {
                if (l.call(O, O._.tabIdList[N % L])) return O._.tabIdList[N % L];
            }
            return null;
        };
        a.dialog = function(K, L) {
            var M = a.dialog._.dialogDefinitions[L];
            M = e.extend(M(K), p);
            M = e.clone(M);
            M = new t(this, M);
            this.definition = M = a.fire('dialogDefinition', {
                name: L,
                definition: M
            },
            K).definition;
            var N = a.document,
            O = K.theme.buildDialog(K);
            this._ = {
                editor: K,
                element: O.element,
                name: L,
                contentSize: {
                    width: 0,
                    height: 0
                },
                size: {
                    width: 0,
                    height: 0
                },
                updateSize: false,
                contents: {},
                buttons: {},
                accessKeyMap: {},
                tabs: {},
                tabIdList: [],
                currentTabId: null,
                currentTabIndex: null,
                pageCount: 0,
                lastTab: null,
                tabBarMode: false,
                focusList: [],
                currentFocusIndex: 0,
                hasFocus: false
            };
            this.parts = O.parts;
            this.parts.dialog.setStyles({
                position: b.ie6Compat ? 'absolute': 'fixed',
                top: 0,
                left: 0,
                visibility: 'hidden'
            });
            a.event.call(this);
            if (M.onLoad) this.on('load', M.onLoad);
            if (M.onShow) this.on('show', M.onShow);
            if (M.onHide) this.on('hide', M.onHide);
            if (M.onOk) this.on('ok',
            function(aa) {
                if (M.onOk.call(this, aa) === false) aa.data.hide = false;
            });
            if (M.onCancel) this.on('cancel',
            function(aa) {
                if (M.onCancel.call(this, aa) === false) aa.data.hide = false;
            });
            var P = this,
            Q = function(aa) {
                var ab = P._.contents,
                ac = false;
                for (var ad in ab) for (var ae in ab[ad]) {
                    ac = aa.call(this, ab[ad][ae]);
                    if (ac) return;
                }
            };
            this.on('ok',
            function(aa) {
                Q(function(ab) {
                    if (ab.validate) {
                        var ac = ab.validate(this);
                        if (typeof ac == 'string') {
                            alert(ac);
                            ac = false;
                        }
                        if (ac === false) {
                            if (ab.select) ab.select();
                            else ab.focus();
                            aa.data.hide = false;
                            aa.stop();
                            return true;
                        }
                    }
                });
            },
            this, null, 0);
            this.on('cancel',
            function(aa) {
                Q(function(ab) {
                    if (ab.isChanged()) {
                        if (!confirm(K.lang.common.confirmCancel)) aa.data.hide = false;
                        return true;
                    }
                });
            },
            this, null, 0);
            this.parts.close.on('click',
            function(aa) {
                if (this.fire('cancel', {
                    hide: true
                }).hide !== false) this.hide();
            },
            this);
            function R(aa) {
                var ab = P._.focusList,
                ac = aa ? 1 : -1;
                if (ab.length < 1) return;
                var ad = (P._.currentFocusIndex + ac + ab.length) % ab.length,
                ae = ad;
                while (!ab[ae].isFocusable()) {
                    ae = (ae + ac + ab.length) % ab.length;
                    if (ae == ad) break;
                }
                ab[ae].focus();
                if (ab[ae].type == 'text') ab[ae].select();
            };
            var S;
            function T(aa) {
                if (P != a.dialog._.currentTop) return;
                var ab = aa.data.getKeystroke();
                S = 0;
                if (ab == 9 || ab == 2000 + 9) {
                    var ac = ab == 2000 + 9;
                    if (P._.tabBarMode) {
                        var ad = ac ? m.call(P) : n.call(P);
                        P.selectPage(ad);
                        P._.tabs[ad][0].focus();
                    } else R(!ac);
                    S = 1;
                } else if (ab == 4000 + 121 && !P._.tabBarMode) {
                    P._.tabBarMode = true;
                    P._.tabs[P._.currentTabId][0].focus();
                    S = 1;
                } else if ((ab == 37 || ab == 39) && P._.tabBarMode) {
                    ad = ab == 37 ? m.call(P) : n.call(P);
                    P.selectPage(ad);
                    P._.tabs[ad][0].focus();
                    S = 1;
                }
                if (S) {
                    aa.stop();
                    aa.data.preventDefault();
                }
            };
            function U(aa) {
                S && aa.data.preventDefault();
            };
            this.on('show',
            function() {
                a.document.on('keydown', T, this, null, 0);
                if (b.opera || b.gecko && b.mac) a.document.on('keypress', U, this);
                if (b.ie6Compat) {
                    var aa = y.getChild(0).getFrameDocument();
                    aa.on('keydown', T, this, null, 0);
                }
            });
            this.on('hide',
            function() {
                a.document.removeListener('keydown', T);
                if (b.opera || b.gecko && b.mac) a.document.removeListener('keypress', U);
            });
            this.on('iframeAdded',
            function(aa) {
                var ab = new g(aa.data.iframe.$.contentWindow.document);
                ab.on('keydown', T, this, null, 0);
            });
            this.on('show',
            function() {
                var ad = this;
                if (!ad._.hasFocus) {
                    ad._.currentFocusIndex = -1;
                    R(true);
                    if (ad._.editor.mode == 'wysiwyg' && c) {
                        var aa = K.document.$.selection,
                        ab = aa.createRange();
                        if (ab) if (ab.parentElement && ab.parentElement().ownerDocument == K.document.$ || ab.item && ab.item(0).ownerDocument == K.document.$) {
                            var ac = document.body.createTextRange();
                            ac.moveToElementText(ad.getElement().getFirst().$);
                            ac.collapse(true);
                            ac.select();
                        }
                    }
                }
            },
            this, null, 4294967295);
            if (b.ie6Compat) this.on('load',
            function(aa) {
                var ab = this.getElement(),
                ac = ab.getFirst();
                ac.remove();
                ac.appendTo(ab);
            },
            this);
            v(this);
            w(this);
            new d.text(M.title, a.document).appendTo(this.parts.title);
            for (var V = 0; V < M.contents.length; V++) this.addPage(M.contents[V]);
            var W = /cke_dialog_tab(\s|$|_)/,
            X = /cke_dialog_tab(\s|$)/;
            this.parts.tabs.on('click',
            function(aa) {
                var af = this;
                var ab = aa.data.getTarget(),
                ac = ab,
                ad,
                ae;
                if (! (W.test(ab.$.className) || ab.getName() == 'a')) return;
                ad = ab.$.id.substr(0, ab.$.id.lastIndexOf('_'));
                af.selectPage(ad);
                if (af._.tabBarMode) {
                    af._.tabBarMode = false;
                    af._.currentFocusIndex = -1;
                    R(true);
                }
                aa.data.preventDefault();
            },
            this);
            var Y = [],
            Z = a.dialog._.uiElementBuilders.hbox.build(this, {
                type: 'hbox',
                className: 'cke_dialog_footer_buttons',
                widths: [],
                children: M.buttons
            },
            Y).getChild();
            this.parts.footer.setHtml(Y.join(''));
            for (V = 0; V < Z.length; V++) this._.buttons[Z[V].id] = Z[V];
            a.skins.load(K, 'dialog');
        };
        function o(K, L, M) {
            this.element = L;
            this.focusIndex = M;
            this.isFocusable = function() {
                return ! L.getAttribute('disabled') && L.isVisible();
            };
            this.focus = function() {
                K._.currentFocusIndex = this.focusIndex;
                this.element.focus();
            };
            L.on('keydown',
            function(N) {
                if (N.data.getKeystroke() in {
                    32 : 1,
                    13 : 1
                }) this.fire('click');
            });
            L.on('focus',
            function() {
                this.fire('mouseover');
            });
            L.on('blur',
            function() {
                this.fire('mouseout');
            });
        };
        a.dialog.prototype = {
            resize: (function() {
                return function(K, L) {
                    var M = this;
                    if (M._.contentSize && M._.contentSize.width == K && M._.contentSize.height == L) return;
                    a.dialog.fire('resize', {
                        dialog: M,
                        skin: M._.editor.skinName,
                        width: K,
                        height: L
                    },
                    M._.editor);
                    M._.contentSize = {
                        width: K,
                        height: L
                    };
                    M._.updateSize = true;
                };
            })(),
            getSize: function() {
                var M = this;
                if (!M._.updateSize) return M._.size;
                var K = M._.element.getFirst(),
                L = M._.size = {
                    width: K.$.offsetWidth || 0,
                    height: K.$.offsetHeight || 0
                };
                M._.updateSize = !L.width || !L.height;
                return L;
            },
            move: (function() {
                var K;
                return function(L, M) {
                    var P = this;
                    var N = P._.element.getFirst();
                    if (K === undefined) K = N.getComputedStyle('position') == 'fixed';
                    if (K && P._.position && P._.position.x == L && P._.position.y == M) return;
                    P._.position = {
                        x: L,
                        y: M
                    };
                    if (!K) {
                        var O = a.document.getWindow().getScrollPosition();
                        L += O.x;
                        M += O.y;
                    }
                    N.setStyles({
                        left: (L > 0 ? L: 0) + 'px',
                        top: (M > 0 ? M: 0) + 'px'
                    });
                };
            })(),
            getPosition: function() {
                return e.extend({},
                this._.position);
            },
            show: function() {
                var K = this._.editor;
                if (K.mode == 'wysiwyg' && c) {
                    var L = K.getSelection();
                    L && L.lock();
                }
                var M = this._.element,
                N = this.definition;
                if (! (M.getParent() && M.getParent().equals(a.document.getBody()))) M.appendTo(a.document.getBody());
                else return;
                if (b.gecko && b.version < 10900) {
                    var O = this.parts.dialog;
                    O.setStyle('position', 'absolute');
                    setTimeout(function() {
                        O.setStyle('position', 'fixed');
                    },
                    0);
                }
                this.resize(N.minWidth, N.minHeight);
                this.selectPage(this.definition.contents[0].id);
                this.reset();
                if (a.dialog._.currentZIndex === null) a.dialog._.currentZIndex = this._.editor.config.baseFloatZIndex;
                this._.element.getFirst().setStyle('z-index', a.dialog._.currentZIndex += 10);
                if (a.dialog._.currentTop === null) {
                    a.dialog._.currentTop = this;
                    this._.parentDialog = null;
                    z(this._.editor);
                    M.on('keydown', C);
                    M.on(b.opera ? 'keypress': 'keyup', D);
                    for (var P in {
                        keyup: 1,
                        keydown: 1,
                        keypress: 1
                    }) M.on(P, J);
                } else {
                    this._.parentDialog = a.dialog._.currentTop;
                    var Q = this._.parentDialog.getElement().getFirst();
                    Q.$.style.zIndex -= Math.floor(this._.editor.config.baseFloatZIndex / 2);
                    a.dialog._.currentTop = this;
                }
                E(this, this, '\x1b', null,
                function() {
                    this.getButton('cancel') && this.getButton('cancel').click();
                });
                this._.hasFocus = false;
                e.setTimeout(function() {
                    var R = a.document.getWindow().getViewPaneSize(),
                    S = this.getSize();
                    this.move((R.width - N.minWidth) / 2, (R.height - S.height) / 2);
                    this.parts.dialog.setStyle('visibility', '');
                    this.fireOnce('load', {});
                    this.fire('show', {});
                    this._.editor.fire('dialogShow', this);
                    this.foreach(function(T) {
                        T.setInitValue && T.setInitValue();
                    });
                },
                100, this);
            },
            foreach: function(K) {
                var N = this;
                for (var L in N._.contents) for (var M in N._.contents[L]) K(N._.contents[L][M]);
                return N;
            },
            reset: (function() {
                var K = function(L) {
                    if (L.reset) L.reset();
                };
                return function() {
                    this.foreach(K);
                    return this;
                };
            })(),
            setupContent: function() {
                var K = arguments;
                this.foreach(function(L) {
                    if (L.setup) L.setup.apply(L, K);
                });
            },
            commitContent: function() {
                var K = arguments;
                this.foreach(function(L) {
                    if (L.commit) L.commit.apply(L, K);
                });
            },
            hide: function() {
                this.fire('hide', {});
                this._.editor.fire('dialogHide', this);
                var K = this._.element;
                if (!K.getParent()) return;
                K.remove();
                this.parts.dialog.setStyle('visibility', 'hidden');
                F(this);
                if (!this._.parentDialog) A();
                else {
                    var L = this._.parentDialog.getElement().getFirst();
                    L.setStyle('z-index', parseInt(L.$.style.zIndex, 10) + Math.floor(this._.editor.config.baseFloatZIndex / 2));
                }
                a.dialog._.currentTop = this._.parentDialog;
                if (!this._.parentDialog) {
                    a.dialog._.currentZIndex = null;
                    K.removeListener('keydown', C);
                    K.removeListener(b.opera ? 'keypress': 'keyup', D);
                    for (var M in {
                        keyup: 1,
                        keydown: 1,
                        keypress: 1
                    }) K.removeListener(M, J);
                    var N = this._.editor;
                    N.focus();
                    if (N.mode == 'wysiwyg' && c) {
                        var O = N.getSelection();
                        O && O.unlock(true);
                    }
                } else a.dialog._.currentZIndex -= 10;
                this.foreach(function(P) {
                    P.resetInitValue && P.resetInitValue();
                });
            },
            addPage: function(K) {
                var U = this;
                var L = [],
                M = K.label ? ' title="' + e.htmlEncode(K.label) + '"': '',
                N = K.elements,
                O = a.dialog._.uiElementBuilders.vbox.build(U, {
                    type: 'vbox',
                    className: 'cke_dialog_page_contents',
                    children: K.elements,
                    expand: !!K.expand,
                    padding: K.padding,
                    style: K.style || 'width: 100%;'
                },
                L),
                P = h.createFromHtml(L.join('')),
                Q = h.createFromHtml(['<a class="cke_dialog_tab"', U._.pageCount > 0 ? ' cke_last': 'cke_first', M, !!K.hidden ? ' style="display:none"': '', ' id="', K.id + '_', e.getNextNumber(), '" href="javascript:void(0)"', ' hidefocus="true">', K.label, '</a>'].join(''));
                if (U._.pageCount === 0) U.parts.dialog.addClass('cke_single_page');
                else U.parts.dialog.removeClass('cke_single_page');
                U._.tabs[K.id] = [Q, P];
                U._.tabIdList.push(K.id);
                U._.pageCount++;
                U._.lastTab = Q;
                var R = U._.contents[K.id] = {},
                S,
                T = O.getChild();
                while (S = T.shift()) {
                    R[S.id] = S;
                    if (typeof S.getChild == 'function') T.push.apply(T, S.getChild());
                }
                P.setAttribute('name', K.id);
                P.appendTo(U.parts.contents);
                Q.unselectable();
                U.parts.tabs.append(Q);
                if (K.accessKey) {
                    E(U, U, 'CTRL+' + K.accessKey, H, G);
                    U._.accessKeyMap['CTRL+' + K.accessKey] = K.id;
                }
            },
            selectPage: function(K) {
                var P = this;
                for (var L in P._.tabs) {
                    var M = P._.tabs[L][0],
                    N = P._.tabs[L][1];
                    if (L != K) {
                        M.removeClass('cke_dialog_tab_selected');
                        N.hide();
                    }
                }
                var O = P._.tabs[K];
                O[0].addClass('cke_dialog_tab_selected');
                O[1].show();
                P._.currentTabId = K;
                P._.currentTabIndex = e.indexOf(P._.tabIdList, K);
            },
            hidePage: function(K) {
                var L = this._.tabs[K] && this._.tabs[K][0];
                if (!L) return;
                L.hide();
            },
            showPage: function(K) {
                var L = this._.tabs[K] && this._.tabs[K][0];
                if (!L) return;
                L.show();
            },
            getElement: function() {
                return this._.element;
            },
            getName: function() {
                return this._.name;
            },
            getContentElement: function(K, L) {
                return this._.contents[K][L];
            },
            getValueOf: function(K, L) {
                return this.getContentElement(K, L).getValue();
            },
            setValueOf: function(K, L, M) {
                return this.getContentElement(K, L).setValue(M);
            },
            getButton: function(K) {
                return this._.buttons[K];
            },
            click: function(K) {
                return this._.buttons[K].click();
            },
            disableButton: function(K) {
                return this._.buttons[K].disable();
            },
            enableButton: function(K) {
                return this._.buttons[K].enable();
            },
            getPageCount: function() {
                return this._.pageCount;
            },
            getParentEditor: function() {
                return this._.editor;
            },
            getSelectedElement: function() {
                return this.getParentEditor().getSelection().getSelectedElement();
            },
            addFocusable: function(K, L) {
                var N = this;
                if (typeof L == 'undefined') {
                    L = N._.focusList.length;
                    N._.focusList.push(new o(N, K, L));
                } else {
                    N._.focusList.splice(L, 0, new o(N, K, L));
                    for (var M = L + 1; M < N._.focusList.length; M++) N._.focusList[M].focusIndex++;
                }
            }
        };
        e.extend(a.dialog, {
            add: function(K, L) {
                if (!this._.dialogDefinitions[K] || typeof L == 'function') this._.dialogDefinitions[K] = L;
            },
            exists: function(K) {
                return !! this._.dialogDefinitions[K];
            },
            getCurrent: function() {
                return a.dialog._.currentTop;
            },
            okButton: (function() {
                var K = function(L, M) {
                    M = M || {};
                    return e.extend({
                        id: 'ok',
                        type: 'button',
                        label: L.lang.common.ok,
                        'class': 'cke_dialog_ui_button_ok',
                        onClick: function(N) {
                            var O = N.data.dialog;
                            if (O.fire('ok', {
                                hide: true
                            }).hide !== false) O.hide();
                        }
                    },
                    M, true);
                };
                K.type = 'button';
                K.override = function(L) {
                    return e.extend(function(M) {
                        return K(M, L);
                    },
                    {
                        type: 'button'
                    },
                    true);
                };
                return K;
            })(),
            cancelButton: (function() {
                var K = function(L, M) {
                    M = M || {};
                    return e.extend({
                        id: 'cancel',
                        type: 'button',
                        label: L.lang.common.cancel,
                        'class': 'cke_dialog_ui_button_cancel',
                        onClick: function(N) {
                            var O = N.data.dialog;
                            if (O.fire('cancel', {
                                hide: true
                            }).hide !== false) O.hide();
                        }
                    },
                    M, true);
                };
                K.type = 'button';
                K.override = function(L) {
                    return e.extend(function(M) {
                        return K(M, L);
                    },
                    {
                        type: 'button'
                    },
                    true);
                };
                return K;
            })(),
            addUIElement: function(K, L) {
                this._.uiElementBuilders[K] = L;
            }
        });
        a.dialog._ = {
            uiElementBuilders: {},
            dialogDefinitions: {},
            currentTop: null,
            currentZIndex: null
        };
        a.event.implementOn(a.dialog);
        a.event.implementOn(a.dialog.prototype, true);
        var p = {
            resizable: 0,
            minWidth: 600,
            minHeight: 400,
            buttons: [a.dialog.okButton, a.dialog.cancelButton]
        },
        q = function(K, L, M) {
            for (var N = 0, O; O = K[N]; N++) {
                if (O.id == L) return O;
                if (M && O[M]) {
                    var P = q(O[M], L, M);
                    if (P) return P;
                }
            }
            return null;
        },
        r = function(K, L, M, N, O) {
            if (M) {
                for (var P = 0, Q; Q = K[P]; P++) {
                    if (Q.id == M) {
                        K.splice(P, 0, L);
                        return L;
                    }
                    if (N && Q[N]) {
                        var R = r(Q[N], L, M, N, true);
                        if (R) return R;
                    }
                }
                if (O) return null;
            }
            K.push(L);
            return L;
        },
        s = function(K, L, M) {
            for (var N = 0, O; O = K[N]; N++) {
                if (O.id == L) return K.splice(N, 1);
                if (M && O[M]) {
                    var P = s(O[M], L, M);
                    if (P) return P;
                }
            }
            return null;
        },
        t = function(K, L) {
            this.dialog = K;
            var M = L.contents;
            for (var N = 0, O; O = M[N]; N++) M[N] = new u(K, O);
            e.extend(this, L);
        };
        t.prototype = {
            getContents: function(K) {
                return q(this.contents, K);
            },
            getButton: function(K) {
                return q(this.buttons, K);
            },
            addContents: function(K, L) {
                return r(this.contents, K, L);
            },
            addButton: function(K, L) {
                return r(this.buttons, K, L);
            },
            removeContents: function(K) {
                s(this.contents, K);
            },
            removeButton: function(K) {
                s(this.buttons, K);
            }
        };
        function u(K, L) {
            this._ = {
                dialog: K
            };
            e.extend(this, L);
        };
        u.prototype = {
            get: function(K) {
                return q(this.elements, K, 'children');
            },
            add: function(K, L) {
                return r(this.elements, K, L, 'children');
            },
            remove: function(K) {
                s(this.elements, K, 'children');
            }
        };
        function v(K) {
            var L = null,
            M = null,
            N = K.getElement().getFirst(),
            O = K.getParentEditor(),
            P = O.config.dialog_magnetDistance,
            Q = O.skin.margins || [0, 0, 0, 0];
            if (typeof P == 'undefined') P = 20;
            function R(T) {
                var U = K.getSize(),
                V = a.document.getWindow().getViewPaneSize(),
                W = T.data.$.screenX,
                X = T.data.$.screenY,
                Y = W - L.x,
                Z = X - L.y,
                aa,
                ab;
                L = {
                    x: W,
                    y: X
                };
                M.x += Y;
                M.y += Z;
                if (M.x + Q[3] < P) aa = -Q[3];
                else if (M.x - Q[1] > V.width - U.width - P) aa = V.width - U.width + Q[1];
                else aa = M.x;
                if (M.y + Q[0] < P) ab = -Q[0];
                else if (M.y - Q[2] > V.height - U.height - P) ab = V.height - U.height + Q[2];
                else ab = M.y;
                K.move(aa, ab);
                T.data.preventDefault();
            };
            function S(T) {
                a.document.removeListener('mousemove', R);
                a.document.removeListener('mouseup', S);
                if (b.ie6Compat) {
                    var U = y.getChild(0).getFrameDocument();
                    U.removeListener('mousemove', R);
                    U.removeListener('mouseup', S);
                }
            };
            K.parts.title.on('mousedown',
            function(T) {
                K._.updateSize = true;
                L = {
                    x: T.data.$.screenX,
                    y: T.data.$.screenY
                };
                a.document.on('mousemove', R);
                a.document.on('mouseup', S);
                M = K.getPosition();
                if (b.ie6Compat) {
                    var U = y.getChild(0).getFrameDocument();
                    U.on('mousemove', R);
                    U.on('mouseup', S);
                }
                T.data.preventDefault();
            },
            K);
        };
        function w(K) {
            var L = K.definition,
            M = L.minWidth || 0,
            N = L.minHeight || 0,
            O = L.resizable,
            P = K.getParentEditor().skin.margins || [0, 0, 0, 0];
            function Q(ab, ac) {
                ab.y += ac;
            };
            function R(ab, ac) {
                ab.x2 += ac;
            };
            function S(ab, ac) {
                ab.y2 += ac;
            };
            function T(ab, ac) {
                ab.x += ac;
            };
            var U = null,
            V = null,
            W = K._.editor.config.magnetDistance,
            X = ['tl', 't', 'tr', 'l', 'r', 'bl', 'b', 'br'];
            function Y(ab) {
                var ac = ab.listenerData.part,
                ad = K.getSize();
                V = K.getPosition();
                e.extend(V, {
                    x2: V.x + ad.width,
                    y2: V.y + ad.height
                });
                U = {
                    x: ab.data.$.screenX,
                    y: ab.data.$.screenY
                };
                a.document.on('mousemove', Z, K, {
                    part: ac
                });
                a.document.on('mouseup', aa, K, {
                    part: ac
                });
                if (b.ie6Compat) {
                    var ae = y.getChild(0).getFrameDocument();
                    ae.on('mousemove', Z, K, {
                        part: ac
                    });
                    ae.on('mouseup', aa, K, {
                        part: ac
                    });
                }
                ab.data.preventDefault();
            };
            function Z(ab) {
                var ac = ab.data.$.screenX,
                ad = ab.data.$.screenY,
                ae = ac - U.x,
                af = ad - U.y,
                ag = a.document.getWindow().getViewPaneSize(),
                ah = ab.listenerData.part;
                if (ah.search('t') != -1) Q(V, af);
                if (ah.search('l') != -1) T(V, ae);
                if (ah.search('b') != -1) S(V, af);
                if (ah.search('r') != -1) R(V, ae);
                U = {
                    x: ac,
                    y: ad
                };
                var ai, aj, ak, al;
                if (V.x + P[3] < W) ai = -P[3];
                else if (ah.search('l') != -1 && V.x2 - V.x < M + W) ai = V.x2 - M;
                else ai = V.x;
                if (V.y + P[0] < W) aj = -P[0];
                else if (ah.search('t') != -1 && V.y2 - V.y < N + W) aj = V.y2 - N;
                else aj = V.y;
                if (V.x2 - P[1] > ag.width - W) ak = ag.width + P[1];
                else if (ah.search('r') != -1 && V.x2 - V.x < M + W) ak = V.x + M;
                else ak = V.x2;
                if (V.y2 - P[2] > ag.height - W) al = ag.height + P[2];
                else if (ah.search('b') != -1 && V.y2 - V.y < N + W) al = V.y + N;
                else al = V.y2;
                K.move(ai, aj);
                K.resize(ak - ai, al - aj);
                ab.data.preventDefault();
            };
            function aa(ab) {
                a.document.removeListener('mouseup', aa);
                a.document.removeListener('mousemove', Z);
                if (b.ie6Compat) {
                    var ac = y.getChild(0).getFrameDocument();
                    ac.removeListener('mouseup', aa);
                    ac.removeListener('mousemove', Z);
                }
            };
        };
        var x, y, z = function(K) {
            var L = a.document.getWindow();
            if (!y) {
                var M = K.config.dialog_backgroundCoverColor || 'white',
                N = ['<div style="position: ', b.ie6Compat ? 'absolute': 'fixed', '; z-index: ', K.config.baseFloatZIndex, '; top: 0px; left: 0px; ', !b.ie6Compat ? 'background-color: ' + M: '', '" id="cke_dialog_background_cover">'];
                if (b.ie6Compat) {
                    var O = b.isCustomDomain(),
                    P = "<html><body style=\\'background-color:" + M + ";\\'></body></html>";
                    N.push('<iframe hidefocus="true" frameborder="0" id="cke_dialog_background_iframe" src="javascript:');
                    N.push('void((function(){document.open();' + (O ? "document.domain='" + document.domain + "';": '') + "document.write( '" + P + "' );" + 'document.close();' + '})())');
                    N.push('" style="position:absolute;left:0;top:0;width:100%;height: 100%;progid:DXImageTransform.Microsoft.Alpha(opacity=0)"></iframe>');
                }
                N.push('</div>');
                y = h.createFromHtml(N.join(''));
            }
            var Q = y,
            R = function() {
                var V = L.getViewPaneSize();
                Q.setStyles({
                    width: V.width + 'px',
                    height: V.height + 'px'
                });
            },
            S = function() {
                var V = L.getScrollPosition(),
                W = a.dialog._.currentTop;
                Q.setStyles({
                    left: V.x + 'px',
                    top: V.y + 'px'
                });
                do {
                    var X = W.getPosition();
                    W.move(X.x, X.y);
                } while ( W = W . _ . parentDialog )
            };
            x = R;
            L.on('resize', R);
            R();
            if (b.ie6Compat) {
                var T = function() {
                    S();
                    arguments.callee.prevScrollHandler.apply(this, arguments);
                };
                L.$.setTimeout(function() {
                    T.prevScrollHandler = window.onscroll || (function() {});
                    window.onscroll = T;
                },
                0);
                S();
            }
            var U = K.config.dialog_backgroundCoverOpacity;
            Q.setOpacity(typeof U != 'undefined' ? U: 0.5);
            Q.appendTo(a.document.getBody());
        },
        A = function() {
            if (!y) return;
            var K = a.document.getWindow();
            y.remove();
            K.removeListener('resize', x);
            if (b.ie6Compat) K.$.setTimeout(function() {
                var L = window.onscroll && window.onscroll.prevScrollHandler;
                window.onscroll = L || null;
            },
            0);
            x = null;
        },
        B = {},
        C = function(K) {
            var L = K.data.$.ctrlKey || K.data.$.metaKey,
            M = K.data.$.altKey,
            N = K.data.$.shiftKey,
            O = String.fromCharCode(K.data.$.keyCode),
            P = B[(L ? 'CTRL+': '') + (M ? 'ALT+': '') + (N ? 'SHIFT+': '') + O];
            if (!P || !P.length) return;
            P = P[P.length - 1];
            P.keydown && P.keydown.call(P.uiElement, P.dialog, P.key);
            K.data.preventDefault();
        },
        D = function(K) {
            var L = K.data.$.ctrlKey || K.data.$.metaKey,
            M = K.data.$.altKey,
            N = K.data.$.shiftKey,
            O = String.fromCharCode(K.data.$.keyCode),
            P = B[(L ? 'CTRL+': '') + (M ? 'ALT+': '') + (N ? 'SHIFT+': '') + O];
            if (!P || !P.length) return;
            P = P[P.length - 1];
            if (P.keyup) {
                P.keyup.call(P.uiElement, P.dialog, P.key);
                K.data.preventDefault();
            }
        },
        E = function(K, L, M, N, O) {
            var P = B[M] || (B[M] = []);
            P.push({
                uiElement: K,
                dialog: L,
                key: M,
                keyup: O || K.accessKeyUp,
                keydown: N || K.accessKeyDown
            });
        },
        F = function(K) {
            for (var L in B) {
                var M = B[L];
                for (var N = M.length - 1; N >= 0; N--) {
                    if (M[N].dialog == K || M[N].uiElement == K) M.splice(N, 1);
                }
                if (M.length === 0) delete B[L];
            }
        },
        G = function(K, L) {
            if (K._.accessKeyMap[L]) K.selectPage(K._.accessKeyMap[L]);
        },
        H = function(K, L) {},
        I = {
            27 : 1,
            13 : 1
        },
        J = function(K) {
            if (K.data.getKeystroke() in I) K.data.stopPropagation();
        };
        (function() {
            k.dialog = {
                uiElement: function(K, L, M, N, O, P, Q) {
                    if (arguments.length < 4) return;
                    var R = (N.call ? N(L) : N) || 'div',
                    S = ['<', R, ' '],
                    T = (O && O.call ? O(L) : O) || {},
                    U = (P && P.call ? P(L) : P) || {},
                    V = (Q && Q.call ? Q(K, L) : Q) || '',
                    W = this.domId = U.id || e.getNextNumber() + '_uiElement',
                    X = this.id = L.id,
                    Y;
                    U.id = W;
                    var Z = {};
                    if (L.type) Z['cke_dialog_ui_' + L.type] = 1;
                    if (L.className) Z[L.className] = 1;
                    var aa = U['class'] && U['class'].split ? U['class'].split(' ') : [];
                    for (Y = 0; Y < aa.length; Y++) {
                        if (aa[Y]) Z[aa[Y]] = 1;
                    }
                    var ab = [];
                    for (Y in Z) ab.push(Y);
                    U['class'] = ab.join(' ');
                    if (L.title) U.title = L.title;
                    var ac = (L.style || '').split(';');
                    for (Y in T) ac.push(Y + ':' + T[Y]);
                    if (L.hidden) ac.push('display:none');
                    for (Y = ac.length - 1; Y >= 0; Y--) {
                        if (ac[Y] === '') ac.splice(Y, 1);
                    }
                    if (ac.length > 0) U.style = (U.style ? U.style + '; ': '') + ac.join('; ');
                    for (Y in U) S.push(Y + '="' + e.htmlEncode(U[Y]) + '" ');
                    S.push('>', V, '</', R, '>');
                    M.push(S.join(''));
                    (this._ || (this._ = {})).dialog = K;
                    if (typeof L.isChanged == 'boolean') this.isChanged = function() {
                        return L.isChanged;
                    };
                    if (typeof L.isChanged == 'function') this.isChanged = L.isChanged;
                    a.event.implementOn(this);
                    this.registerEvents(L);
                    if (this.accessKeyUp && this.accessKeyDown && L.accessKey) E(this, K, 'CTRL+' + L.accessKey);
                    var ad = this;
                    K.on('load',
                    function() {
                        if (ad.getInputElement()) ad.getInputElement().on('focus',
                        function() {
                            K._.tabBarMode = false;
                            K._.hasFocus = true;
                            ad.fire('focus');
                        },
                        ad);
                    });
                    if (this.keyboardFocusable) {
                        this.focusIndex = K._.focusList.push(this) - 1;
                        this.on('focus',
                        function() {
                            K._.currentFocusIndex = ad.focusIndex;
                        });
                    }
                    e.extend(this, L);
                },
                hbox: function(K, L, M, N, O) {
                    if (arguments.length < 4) return;
                    this._ || (this._ = {});
                    var P = this._.children = L,
                    Q = O && O.widths || null,
                    R = O && O.height || null,
                    S = {},
                    T, U = function() {
                        var V = ['<tbody><tr class="cke_dialog_ui_hbox">'];
                        for (T = 0; T < M.length; T++) {
                            var W = 'cke_dialog_ui_hbox_child',
                            X = [];
                            if (T === 0) W = 'cke_dialog_ui_hbox_first';
                            if (T == M.length - 1) W = 'cke_dialog_ui_hbox_last';
                            V.push('<td class="', W, '" ');
                            if (Q) {
                                if (Q[T]) X.push('width:' + e.cssLength(Q[T]));
                            } else X.push('width:' + Math.floor(100 / M.length) + '%');
                            if (R) X.push('height:' + e.cssLength(R));
                            if (O && O.padding != undefined) X.push('padding:' + e.cssLength(O.padding));
                            if (X.length > 0) V.push('style="' + X.join('; ') + '" ');
                            V.push('>', M[T], '</td>');
                        }
                        V.push('</tr></tbody>');
                        return V.join('');
                    };
                    k.dialog.uiElement.call(this, K, O || {
                        type: 'hbox'
                    },
                    N, 'table', S, O && O.align && {
                        align: O.align
                    } || null, U);
                },
                vbox: function(K, L, M, N, O) {
                    if (arguments.length < 3) return;
                    this._ || (this._ = {});
                    var P = this._.children = L,
                    Q = O && O.width || null,
                    R = O && O.heights || null,
                    S = function() {
                        var T = ['<table cellspacing="0" border="0" '];
                        T.push('style="');
                        if (O && O.expand) T.push('height:100%;');
                        T.push('width:' + e.cssLength(Q || '100%'), ';');
                        T.push('"');
                        T.push('align="', e.htmlEncode(O && O.align || (K.getParentEditor().lang.dir == 'ltr' ? 'left': 'right')), '" ');
                        T.push('><tbody>');
                        for (var U = 0; U < M.length; U++) {
                            var V = [];
                            T.push('<tr><td ');
                            if (Q) V.push('width:' + e.cssLength(Q || '100%'));
                            if (R) V.push('height:' + e.cssLength(R[U]));
                            else if (O && O.expand) V.push('height:' + Math.floor(100 / M.length) + '%');
                            if (O && O.padding != undefined) V.push('padding:' + e.cssLength(O.padding));
                            if (V.length > 0) T.push('style="', V.join('; '), '" ');
                            T.push(' class="cke_dialog_ui_vbox_child">', M[U], '</td></tr>');
                        }
                        T.push('</tbody></table>');
                        return T.join('');
                    };
                    k.dialog.uiElement.call(this, K, O || {
                        type: 'vbox'
                    },
                    N, 'div', null, null, S);
                }
            };
        })();
        k.dialog.uiElement.prototype = {
            getElement: function() {
                return a.document.getById(this.domId);
            },
            getInputElement: function() {
                return this.getElement();
            },
            getDialog: function() {
                return this._.dialog;
            },
            setValue: function(K) {
                this.getInputElement().setValue(K);
                this.fire('change', {
                    value: K
                });
                return this;
            },
            getValue: function() {
                return this.getInputElement().getValue();
            },
            isChanged: function() {
                return false;
            },
            selectParentTab: function() {
                var N = this;
                var K = N.getInputElement(),
                L = K,
                M;
                while ((L = L.getParent()) && L.$.className.search('cke_dialog_page_contents') == -1) {}
                if (!L) return N;
                M = L.getAttribute('name');
                if (N._.dialog._.currentTabId != M) N._.dialog.selectPage(M);
                return N;
            },
            focus: function() {
                this.selectParentTab().getInputElement().focus();
                return this;
            },
            registerEvents: function(K) {
                var L = /^on([A-Z]\w+)/,
                M, N = function(P, Q, R, S) {
                    Q.on('load',
                    function() {
                        P.getInputElement().on(R, S, P);
                    });
                };
                for (var O in K) {
                    if (! (M = O.match(L))) continue;
                    if (this.eventProcessors[O]) this.eventProcessors[O].call(this, this._.dialog, K[O]);
                    else N(this, this._.dialog, M[1].toLowerCase(), K[O]);
                }
                return this;
            },
            eventProcessors: {
                onLoad: function(K, L) {
                    K.on('load', L, this);
                },
                onShow: function(K, L) {
                    K.on('show', L, this);
                },
                onHide: function(K, L) {
                    K.on('hide', L, this);
                }
            },
            accessKeyDown: function(K, L) {
                this.focus();
            },
            accessKeyUp: function(K, L) {},
            disable: function() {
                var K = this.getInputElement();
                K.setAttribute('disabled', 'true');
                K.addClass('cke_disabled');
            },
            enable: function() {
                var K = this.getInputElement();
                K.removeAttribute('disabled');
                K.removeClass('cke_disabled');
            },
            isEnabled: function() {
                return ! this.getInputElement().getAttribute('disabled');
            },
            isVisible: function() {
                return this.getInputElement().isVisible();
            },
            isFocusable: function() {
                if (!this.isEnabled() || !this.isVisible()) return false;
                return true;
            }
        };
        k.dialog.hbox.prototype = e.extend(new k.dialog.uiElement(), {
            getChild: function(K) {
                var L = this;
                if (arguments.length < 1) return L._.children.concat();
                if (!K.splice) K = [K];
                if (K.length < 2) return L._.children[K[0]];
                else return L._.children[K[0]] && L._.children[K[0]].getChild ? L._.children[K[0]].getChild(K.slice(1, K.length)) : null;
            }
        },
        true);
        k.dialog.vbox.prototype = new k.dialog.hbox();
        (function() {
            var K = {
                build: function(L, M, N) {
                    var O = M.children,
                    P, Q = [],
                    R = [];
                    for (var S = 0; S < O.length && (P = O[S]); S++) {
                        var T = [];
                        Q.push(T);
                        R.push(a.dialog._.uiElementBuilders[P.type].build(L, P, T));
                    }
                    return new k.dialog[M.type](L, R, Q, N, M);
                }
            };
            a.dialog.addUIElement('hbox', K);
            a.dialog.addUIElement('vbox', K);
        })();
        a.dialogCommand = function(K) {
            this.dialogName = K;
        };
        a.dialogCommand.prototype = {
            exec: function(K) {
                K.openDialog(this.dialogName);
            },
            canUndo: false
        };
        (function() {
            var K = /^([a]|[^a])+$/,
            L = /^\d*$/,
            M = /^\d*(?:\.\d+)?$/;
            a.VALIDATE_OR = 1;
            a.VALIDATE_AND = 2;
            a.dialog.validate = {
                functions: function() {
                    return function() {
                        var T = this;
                        var N = T && T.getValue ? T.getValue() : arguments[0],
                        O = undefined,
                        P = 2,
                        Q = [],
                        R;
                        for (R = 0; R < arguments.length; R++) {
                            if (typeof arguments[R] == 'function') Q.push(arguments[R]);
                            else break;
                        }
                        if (R < arguments.length && typeof arguments[R] == 'string') {
                            O = arguments[R];
                            R++;
                        }
                        if (R < arguments.length && typeof arguments[R] == 'number') P = arguments[R];
                        var S = P == 2 ? true: false;
                        for (R = 0; R < Q.length; R++) {
                            if (P == 2) S = S && Q[R](N);
                            else S = S || Q[R](N);
                        }
                        if (!S) {
                            if (O !== undefined) alert(O);
                            if (T && (T.select || T.focus)) T.select || T.focus();
                            return false;
                        }
                        return true;
                    };
                },
                regex: function(N, O) {
                    return function() {
                        var Q = this;
                        var P = Q && Q.getValue ? Q.getValue() : arguments[0];
                        if (!N.test(P)) {
                            if (O !== undefined) alert(O);
                            if (Q && (Q.select || Q.focus)) if (Q.select) Q.select();
                            else Q.focus();
                            return false;
                        }
                        return true;
                    };
                },
                notEmpty: function(N) {
                    return this.regex(K, N);
                },
                integer: function(N) {
                    return this.regex(L, N);
                },
                number: function(N) {
                    return this.regex(M, N);
                },
                equals: function(N, O) {
                    return this.functions(function(P) {
                        return P == N;
                    },
                    O);
                },
                notEqual: function(N, O) {
                    return this.functions(function(P) {
                        return P != N;
                    },
                    O);
                }
            };
        })();
    })();
    e.extend(a.editor.prototype, {
        openDialog: function(l, m) {
            var n = a.dialog._.dialogDefinitions[l];
            if (typeof n == 'function') {
                var o = this._.storedDialogs || (this._.storedDialogs = {}),
                p = o[l] || (o[l] = new a.dialog(this, l));
                m && m.call(p, p);
                p.show();
                return p;
            } else if (n == 'failed') throw new Error('[CKEDITOR.dialog.openDialog] Dialog "' + l + '" failed when loading definition.');
            var q = a.document.getBody(),
            r = q.$.style.cursor,
            s = this;
            q.setStyle('cursor', 'wait');
            a.scriptLoader.load(a.getUrl(n),
            function() {
                if (typeof a.dialog._.dialogDefinitions[l] != 'function') a.dialog._.dialogDefinitions[l] = 'failed';
                s.openDialog(l, m);
                q.setStyle('cursor', r);
            });
            return null;
        }
    });
    j.add('dialog', {
        requires: ['dialogui']
    });
    j.add('panel', {
        beforeInit: function(l) {
            l.ui.addHandler(2, k.panel.handler);
        }
    });
    a.UI_PANEL = 2;
    k.panel = function(l, m) {
        var n = this;
        if (m) e.extend(n, m);
        e.extend(n, {
            className: '',
            css: []
        });
        n.id = e.getNextNumber();
        n.document = l;
        n._ = {
            blocks: {}
        };
    };
    k.panel.handler = {
        create: function(l) {
            return new k.panel(l);
        }
    };
    k.panel.prototype = {
        renderHtml: function(l) {
            var m = [];
            this.render(l, m);
            return m.join('');
        },
        render: function(l, m) {
            var o = this;
            var n = 'cke_' + o.id;
            m.push('<div class="', l.skinClass, '" lang="', l.langCode, '" style="display:none;z-index:' + (l.config.baseFloatZIndex + 1) + '">' + '<div' + ' id=', n, ' dir=', l.lang.dir, ' class="cke_panel cke_', l.lang.dir);
            if (o.className) m.push(' ', o.className);
            m.push('">');
            if (o.forceIFrame || o.css.length) {
                m.push('<iframe id="', n, '_frame" frameborder="0" src="javascript:void(');
                m.push(b.isCustomDomain() ? "(function(){document.open();document.domain='" + document.domain + "';" + 'document.close();' + '})()': '0');
                m.push(')"></iframe>');
            }
            m.push('</div></div>');
            return n;
        },
        getHolderElement: function() {
            var l = this._.holder;
            if (!l) {
                if (this.forceIFrame || this.css.length) {
                    var m = this.document.getById('cke_' + this.id + '_frame'),
                    n = m.getParent(),
                    o = n.getAttribute('dir'),
                    p = n.getParent().getAttribute('class'),
                    q = n.getParent().getAttribute('lang'),
                    r = m.getFrameDocument();
                    r.$.open();
                    if (b.isCustomDomain()) r.$.domain = document.domain;
                    var s = e.addFunction(e.bind(function(u) {
                        this.isLoaded = true;
                        if (this.onLoad) this.onLoad();
                    },
                    this));
                    r.$.write('<!DOCTYPE html><html dir="' + o + '" class="' + p + '_container" lang="' + q + '">' + '<head>' + '<style>.' + p + '_container{visibility:hidden}</style>' + '</head>' + '<body class="cke_' + o + ' cke_panel_frame ' + b.cssClass + '" style="margin:0;padding:0"' + ' onload="( window.CKEDITOR || window.parent.CKEDITOR ).tools.callFunction(' + s + ');">' + '</body>' + e.buildStyleHtml(this.css) + '</html>');
                    r.$.close();
                    var t = r.getWindow();
                    t.$.CKEDITOR = a;
                    r.on('keydown',
                    function(u) {
                        var w = this;
                        var v = u.data.getKeystroke();
                        if (w._.onKeyDown && w._.onKeyDown(v) === false) {
                            u.data.preventDefault();
                            return;
                        }
                        if (v == 27) w.onEscape && w.onEscape();
                    },
                    this);
                    l = r.getBody();
                } else l = this.document.getById('cke_' + this.id);
                this._.holder = l;
            }
            return l;
        },
        addBlock: function(l, m) {
            var n = this;
            m = n._.blocks[l] = m || new k.panel.block(n.getHolderElement());
            if (!n._.currentBlock) n.showBlock(l);
            return m;
        },
        getBlock: function(l) {
            return this._.blocks[l];
        },
        showBlock: function(l) {
            var p = this;
            var m = p._.blocks,
            n = m[l],
            o = p._.currentBlock;
            if (o) o.hide();
            p._.currentBlock = n;
            n._.focusIndex = -1;
            p._.onKeyDown = n.onKeyDown && e.bind(n.onKeyDown, n);
            n.show();
            return n;
        },
        destroy: function() {
            this.element && this.element.remove();
        }
    };
    k.panel.block = e.createClass({
        $: function(l) {
            var m = this;
            m.element = l.append(l.getDocument().createElement('div', {
                attributes: {
                    'class': 'cke_panel_block'
                },
                styles: {
                    display: 'none'
                }
            }));
            m.keys = {};
            m._.focusIndex = -1;
            m.element.disableContextMenu();
        },
        _: {},
        proto: {
            show: function() {
                this.element.setStyle('display', '');
            },
            hide: function() {
                var l = this;
                if (!l.onHide || l.onHide.call(l) !== true) l.element.setStyle('display', 'none');
            },
            onKeyDown: function(l) {
                var q = this;
                var m = q.keys[l];
                switch (m) {
                case 'next':
                    var n = q._.focusIndex,
                    o = q.element.getElementsByTag('a'),
                    p;
                    while (p = o.getItem(++n)) {
                        if (p.getAttribute('_cke_focus') && p.$.offsetWidth) {
                            q._.focusIndex = n;
                            p.focus();
                            break;
                        }
                    }
                    return false;
                case 'prev':
                    n = q._.focusIndex;
                    o = q.element.getElementsByTag('a');
                    while (n > 0 && (p = o.getItem(--n))) {
                        if (p.getAttribute('_cke_focus') && p.$.offsetWidth) {
                            q._.focusIndex = n;
                            p.focus();
                            break;
                        }
                    }
                    return false;
                case 'click':
                    n = q._.focusIndex;
                    p = n >= 0 && q.element.getElementsByTag('a').getItem(n);
                    if (p) p.$.click ? p.$.click() : p.$.onclick();
                    return false;
                }
                return true;
            }
        }
    });
    j.add('listblock', {
        requires: ['panel'],
        onLoad: function() {
            k.panel.prototype.addListBlock = function(l, m) {
                return this.addBlock(l, new k.listBlock(this.getHolderElement(), m));
            };
            k.listBlock = e.createClass({
                base: k.panel.block,
                $: function(l, m) {
                    var o = this;
                    o.base(l);
                    o.multiSelect = !!m;
                    var n = o.keys;
                    n[40] = 'next';
                    n[9] = 'next';
                    n[38] = 'prev';
                    n[2000 + 9] = 'prev';
                    n[32] = 'click';
                    o._.pendingHtml = [];
                    o._.items = {};
                    o._.groups = {};
                },
                _: {
                    close: function() {
                        if (this._.started) {
                            this._.pendingHtml.push('</ul>');
                            delete this._.started;
                        }
                    },
                    getClick: function() {
                        if (!this._.click) this._.click = e.addFunction(function(l) {
                            var n = this;
                            var m = true;
                            if (n.multiSelect) m = n.toggle(l);
                            else n.mark(l);
                            if (n.onClick) n.onClick(l, m);
                        },
                        this);
                        return this._.click;
                    }
                },
                proto: {
                    add: function(l, m, n) {
                        var q = this;
                        var o = q._.pendingHtml,
                        p = 'cke_' + e.getNextNumber();
                        if (!q._.started) {
                            o.push('<ul class=cke_panel_list>');
                            q._.started = 1;
                        }
                        q._.items[l] = p;
                        o.push('<li id=', p, ' class=cke_panel_listItem><a _cke_focus=1 hidefocus=true title="', n || l, '" href="javascript:void(\'', l, '\')" onclick="CKEDITOR.tools.callFunction(', q._.getClick(), ",'", l, "'); return false;\">", m || l, '</a></li>');
                    },
                    startGroup: function(l) {
                        this._.close();
                        var m = 'cke_' + e.getNextNumber();
                        this._.groups[l] = m;
                        this._.pendingHtml.push('<h1 id=', m, ' class=cke_panel_grouptitle>', l, '</h1>');
                    },
                    commit: function() {
                        var l = this;
                        l._.close();
                        l.element.appendHtml(l._.pendingHtml.join(''));
                        l._.pendingHtml = [];
                    },
                    toggle: function(l) {
                        var m = this.isMarked(l);
                        if (m) this.unmark(l);
                        else this.mark(l);
                        return ! m;
                    },
                    hideGroup: function(l) {
                        var m = this.element.getDocument().getById(this._.groups[l]),
                        n = m && m.getNext();
                        if (m) {
                            m.setStyle('display', 'none');
                            if (n && n.getName() == 'ul') n.setStyle('display', 'none');
                        }
                    },
                    hideItem: function(l) {
                        this.element.getDocument().getById(this._.items[l]).setStyle('display', 'none');
                    },
                    showAll: function() {
                        var l = this._.items,
                        m = this._.groups,
                        n = this.element.getDocument();
                        for (var o in l) n.getById(l[o]).setStyle('display', '');
                        for (var p in m) {
                            var q = n.getById(m[p]),
                            r = q.getNext();
                            q.setStyle('display', '');
                            if (r && r.getName() == 'ul') r.setStyle('display', '');
                        }
                    },
                    mark: function(l) {
                        var m = this;
                        if (!m.multiSelect) m.unmarkAll();
                        m.element.getDocument().getById(m._.items[l]).addClass('cke_selected');
                    },
                    unmark: function(l) {
                        this.element.getDocument().getById(this._.items[l]).removeClass('cke_selected');
                    },
                    unmarkAll: function() {
                        var l = this._.items,
                        m = this.element.getDocument();
                        for (var n in l) m.getById(l[n]).removeClass('cke_selected');
                    },
                    isMarked: function(l) {
                        return this.element.getDocument().getById(this._.items[l]).hasClass('cke_selected');
                    },
                    focus: function(l) {
                        this._.focusIndex = -1;
                        if (l) {
                            var m = this.element.getDocument().getById(this._.items[l]).getFirst(),
                            n = this.element.getElementsByTag('a'),
                            o,
                            p = -1;
                            while (o = n.getItem(++p)) {
                                if (o.equals(m)) {
                                    this._.focusIndex = p;
                                    break;
                                }
                            }
                            setTimeout(function() {
                                m.focus();
                            },
                            0);
                        }
                    }
                }
            });
        }
    });
    j.add('dialogui');
    (function() {
        var l = function(s) {
            var v = this;
            v._ || (v._ = {});
            v._['default'] = v._.initValue = s['default'] || '';
            var t = [v._];
            for (var u = 1; u < arguments.length; u++) t.push(arguments[u]);
            t.push(true);
            e.extend.apply(e, t);
            return v._;
        },
        m = {
            build: function(s, t, u) {
                return new k.dialog.textInput(s, t, u);
            }
        },
        n = {
            build: function(s, t, u) {
                return new k.dialog[t.type](s, t, u);
            }
        },
        o = {
            isChanged: function() {
                return this.getValue() != this.getInitValue();
            },
            reset: function() {
                this.setValue(this.getInitValue());
            },
            setInitValue: function() {
                this._.initValue = this.getValue();
            },
            resetInitValue: function() {
                this._.initValue = this._['default'];
            },
            getInitValue: function() {
                return this._.initValue;
            }
        },
        p = e.extend({},
        k.dialog.uiElement.prototype.eventProcessors, {
            onChange: function(s, t) {
                if (!this._.domOnChangeRegistered) {
                    s.on('load',
                    function() {
                        this.getInputElement().on('change',
                        function() {
                            this.fire('change', {
                                value: this.getValue()
                            });
                        },
                        this);
                    },
                    this);
                    this._.domOnChangeRegistered = true;
                }
                this.on('change', t);
            }
        },
        true),
        q = /^on([A-Z]\w+)/,
        r = function(s) {
            for (var t in s) {
                if (q.test(t) || t == 'title' || t == 'type') delete s[t];
            }
            return s;
        };
        e.extend(k.dialog, {
            labeledElement: function(s, t, u, v) {
                if (arguments.length < 4) return;
                var w = l.call(this, t);
                w.labelId = e.getNextNumber() + '_label';
                var x = this._.children = [],
                y = function() {
                    var z = [];
                    if (t.labelLayout != 'horizontal') z.push('<div class="cke_dialog_ui_labeled_label" id="', w.labelId, '" >', t.label, '</div>', '<div class="cke_dialog_ui_labeled_content">', v(s, t), '</div>');
                    else {
                        var A = {
                            type: 'hbox',
                            widths: t.widths,
                            padding: 0,
                            children: [{
                                type: 'html',
                                html: '<span class="cke_dialog_ui_labeled_label" id="' + w.labelId + '">' + e.htmlEncode(t.label) + '</span>'
                            },
                            {
                                type: 'html',
                                html: '<span class="cke_dialog_ui_labeled_content">' + v(s, t) + '</span>'
                            }]
                        };
                        a.dialog._.uiElementBuilders.hbox.build(s, A, z);
                    }
                    return z.join('');
                };
                k.dialog.uiElement.call(this, s, t, u, 'div', null, null, y);
            },
            textInput: function(s, t, u) {
                if (arguments.length < 3) return;
                l.call(this, t);
                var v = this._.inputId = e.getNextNumber() + '_textInput',
                w = {
                    'class': 'cke_dialog_ui_input_' + t.type,
                    id: v,
                    type: 'text'
                },
                x;
                if (t.validate) this.validate = t.validate;
                if (t.maxLength) w.maxlength = t.maxLength;
                if (t.size) w.size = t.size;
                var y = this,
                z = false;
                s.on('load',
                function() {
                    y.getInputElement().on('keydown',
                    function(B) {
                        if (B.data.getKeystroke() == 13) z = true;
                    });
                    y.getInputElement().on('keyup',
                    function(B) {
                        if (B.data.getKeystroke() == 13 && z) {
                            s.getButton('ok') && setTimeout(function() {
                                s.getButton('ok').click();
                            },
                            0);
                            z = false;
                        }
                    },
                    null, null, 1000);
                });
                var A = function() {
                    var B = ['<div class="cke_dialog_ui_input_', t.type, '"'];
                    if (t.width) B.push('style="width:' + t.width + '" ');
                    B.push('><input ');
                    for (var C in w) B.push(C + '="' + w[C] + '" ');
                    B.push(' /></div>');
                    return B.join('');
                };
                k.dialog.labeledElement.call(this, s, t, u, A);
            },
            textarea: function(s, t, u) {
                if (arguments.length < 3) return;
                l.call(this, t);
                var v = this,
                w = this._.inputId = e.getNextNumber() + '_textarea',
                x = {};
                if (t.validate) this.validate = t.validate;
                x.rows = t.rows || 5;
                x.cols = t.cols || 20;
                var y = function() {
                    var z = ['<div class="cke_dialog_ui_input_textarea"><textarea class="cke_dialog_ui_input_textarea" id="', w, '" '];
                    for (var A in x) z.push(A + '="' + e.htmlEncode(x[A]) + '" ');
                    z.push('>', e.htmlEncode(v._['default']), '</textarea></div>');
                    return z.join('');
                };
                k.dialog.labeledElement.call(this, s, t, u, y);
            },
            checkbox: function(s, t, u) {
                if (arguments.length < 3) return;
                var v = l.call(this, t, {
                    'default': !!t['default']
                });
                if (t.validate) this.validate = t.validate;
                var w = function() {
                    var x = e.extend({},
                    t, {
                        id: t.id ? t.id + '_checkbox': e.getNextNumber() + '_checkbox'
                    },
                    true),
                    y = [],
                    z = {
                        'class': 'cke_dialog_ui_checkbox_input',
                        type: 'checkbox'
                    };
                    r(x);
                    if (t['default']) z.checked = 'checked';
                    v.checkbox = new k.dialog.uiElement(s, x, y, 'input', null, z);
                    y.push(' <label for="', z.id, '">', e.htmlEncode(t.label), '</label>');
                    return y.join('');
                };
                k.dialog.uiElement.call(this, s, t, u, 'span', null, null, w);
            },
            radio: function(s, t, u) {
                if (arguments.length < 3) return;
                l.call(this, t);
                if (!this._['default']) this._['default'] = this._.initValue = t.items[0][1];
                if (t.validate) this.validate = t.valdiate;
                var v = [],
                w = this,
                x = function() {
                    var y = [],
                    z = [],
                    A = {
                        'class': 'cke_dialog_ui_radio_item'
                    },
                    B = t.id ? t.id + '_radio': e.getNextNumber() + '_radio';
                    for (var C = 0; C < t.items.length; C++) {
                        var D = t.items[C],
                        E = D[2] !== undefined ? D[2] : D[0],
                        F = D[1] !== undefined ? D[1] : D[0],
                        G = e.extend({},
                        t, {
                            id: e.getNextNumber() + '_radio_input',
                            title: null,
                            type: null
                        },
                        true),
                        H = e.extend({},
                        G, {
                            id: null,
                            title: E
                        },
                        true),
                        I = {
                            type: 'radio',
                            'class': 'cke_dialog_ui_radio_input',
                            name: B,
                            value: F
                        },
                        J = [];
                        if (w._['default'] == F) I.checked = 'checked';
                        r(G);
                        r(H);
                        v.push(new k.dialog.uiElement(s, G, J, 'input', null, I));
                        J.push(' ');
                        new k.dialog.uiElement(s, H, J, 'label', null, {
                            'for': I.id
                        },
                        D[0]);
                        y.push(J.join(''));
                    }
                    new k.dialog.hbox(s, [], y, z);
                    return z.join('');
                };
                k.dialog.labeledElement.call(this, s, t, u, x);
                this._.children = v;
            },
            button: function(s, t, u) {
                if (!arguments.length) return;
                if (typeof t == 'function') t = t(s.getParentEditor());
                l.call(this, t, {
                    disabled: t.disabled || false
                });
                a.event.implementOn(this);
                var v = this;
                s.on('load',
                function(x) {
                    var y = this.getElement();
                    (function() {
                        y.on('click',
                        function(z) {
                            v.fire('click', {
                                dialog: v.getDialog()
                            });
                            z.data.preventDefault();
                        });
                    })();
                    y.unselectable();
                },
                this);
                var w = e.extend({},
                t);
                delete w.style;
                k.dialog.uiElement.call(this, s, w, u, 'a', null, {
                    style: t.style,
                    href: 'javascript:void(0)',
                    title: t.label,
                    hidefocus: 'true',
                    'class': t['class']
                },
                '<span class="cke_dialog_ui_button">' + e.htmlEncode(t.label) + '</span>');
            },
            select: function(s, t, u) {
                if (arguments.length < 3) return;
                var v = l.call(this, t);
                if (t.validate) this.validate = t.validate;
                var w = function() {
                    var x = e.extend({},
                    t, {
                        id: t.id ? t.id + '_select': e.getNextNumber() + '_select'
                    },
                    true),
                    y = [],
                    z = [],
                    A = {
                        'class': 'cke_dialog_ui_input_select'
                    };
                    if (t.size != undefined) A.size = t.size;
                    if (t.multiple != undefined) A.multiple = t.multiple;
                    r(x);
                    for (var B = 0, C; B < t.items.length && (C = t.items[B]); B++) z.push('<option value="', e.htmlEncode(C[1] !== undefined ? C[1] : C[0]), '" /> ', e.htmlEncode(C[0]));
                    v.select = new k.dialog.uiElement(s, x, y, 'select', null, A, z.join(''));
                    return y.join('');
                };
                k.dialog.labeledElement.call(this, s, t, u, w);
            },
            file: function(s, t, u) {
                if (arguments.length < 3) return;
                if (t['default'] === undefined) t['default'] = '';
                var v = e.extend(l.call(this, t), {
                    definition: t,
                    buttons: []
                });
                if (t.validate) this.validate = t.validate;
                var w = function() {
                    v.frameId = e.getNextNumber() + '_fileInput';
                    var x = b.isCustomDomain(),
                    y = ['<iframe frameborder="0" allowtransparency="0" class="cke_dialog_ui_input_file" id="', v.frameId, '" title="', t.label, '" src="javascript:void('];
                    y.push(x ? "(function(){document.open();document.domain='" + document.domain + "';" + 'document.close();' + '})()': '0');
                    y.push(')"></iframe>');
                    return y.join('');
                };
                s.on('load',
                function() {
                    var x = a.document.getById(v.frameId),
                    y = x.getParent();
                    y.addClass('cke_dialog_ui_input_file');
                });
                k.dialog.labeledElement.call(this, s, t, u, w);
            },
            fileButton: function(s, t, u) {
                if (arguments.length < 3) return;
                var v = l.call(this, t),
                w = this;
                if (t.validate) this.validate = t.validate;
                var x = e.extend({},
                t),
                y = x.onClick;
                x.className = (x.className ? x.className + ' ': '') + 'cke_dialog_ui_button';
                x.onClick = function(z) {
                    var A = t['for'];
                    if (!y || y.call(this, z) !== false) {
                        s.getContentElement(A[0], A[1]).submit();
                        this.disable();
                    }
                };
                s.on('load',
                function() {
                    s.getContentElement(t['for'][0], t['for'][1])._.buttons.push(w);
                });
                k.dialog.button.call(this, s, x, u);
            },
            html: (function() {
                var s = /^\s*<[\w:]+\s+([^>]*)?>/,
                t = /^(\s*<[\w:]+(?:\s+[^>]*)?)((?:.|\r|\n)+)$/,
                u = /\/$/;
                return function(v, w, x) {
                    if (arguments.length < 3) return;
                    var y = [],
                    z,
                    A = w.html,
                    B,
                    C;
                    if (A.charAt(0) != '<') A = '<span>' + A + '</span>';
                    if (w.focus) {
                        var D = this.focus;
                        this.focus = function() {
                            D.call(this);
                            w.focus.call(this);
                            this.fire('focus');
                        };
                        if (w.isFocusable) {
                            var E = this.isFocusable;
                            this.isFocusable = E;
                        }
                        this.keyboardFocusable = true;
                    }
                    k.dialog.uiElement.call(this, v, w, y, 'span', null, null, '');
                    z = y.join('');
                    B = z.match(s);
                    C = A.match(t) || ['', '', ''];
                    if (u.test(C[1])) {
                        C[1] = C[1].slice(0, -1);
                        C[2] = '/' + C[2];
                    }
                    x.push([C[1], ' ', B[1] || '', C[2]].join(''));
                };
            })()
        },
        true);
        k.dialog.html.prototype = new k.dialog.uiElement();
        k.dialog.labeledElement.prototype = e.extend(new k.dialog.uiElement(), {
            setLabel: function(s) {
                var t = a.document.getById(this._.labelId);
                if (t.getChildCount() < 1) new d.text(s, a.document).appendTo(t);
                else t.getChild(0).$.nodeValue = s;
                return this;
            },
            getLabel: function() {
                var s = a.document.getById(this._.labelId);
                if (!s || s.getChildCount() < 1) return '';
                else return s.getChild(0).getText();
            },
            eventProcessors: p
        },
        true);
        k.dialog.button.prototype = e.extend(new k.dialog.uiElement(), {
            click: function() {
                var s = this;
                if (!s._.disabled) return s.fire('click', {
                    dialog: s._.dialog
                });
                s.getElement().$.blur();
                return false;
            },
            enable: function() {
                this._.disabled = false;
                var s = this.getElement();
                s && s.removeClass('disabled');
            },
            disable: function() {
                this._.disabled = true;
                this.getElement().addClass('disabled');
            },
            isVisible: function() {
                return this.getElement().getFirst().isVisible();
            },
            isEnabled: function() {
                return ! this._.disabled;
            },
            eventProcessors: e.extend({},
            k.dialog.uiElement.prototype.eventProcessors, {
                onClick: function(s, t) {
                    this.on('click', t);
                }
            },
            true),
            accessKeyUp: function() {
                this.click();
            },
            accessKeyDown: function() {
                this.focus();
            },
            keyboardFocusable: true
        },
        true);
        k.dialog.textInput.prototype = e.extend(new k.dialog.labeledElement(), {
            getInputElement: function() {
                return a.document.getById(this._.inputId);
            },
            focus: function() {
                var s = this.selectParentTab();
                setTimeout(function() {
                    var t = s.getInputElement();
                    t && t.$.focus();
                },
                0);
            },
            select: function() {
                var s = this.selectParentTab();
                setTimeout(function() {
                    var t = s.getInputElement();
                    if (t) {
                        t.$.focus();
                        t.$.select();
                    }
                },
                0);
            },
            accessKeyUp: function() {
                this.select();
            },
            setValue: function(s) {
                s = s || '';
                return k.dialog.uiElement.prototype.setValue.call(this, s);
            },
            keyboardFocusable: true
        },
        o, true);
        k.dialog.textarea.prototype = new k.dialog.textInput();
        k.dialog.select.prototype = e.extend(new k.dialog.labeledElement(), {
            getInputElement: function() {
                return this._.select.getElement();
            },
            add: function(s, t, u) {
                var v = new h('option', this.getDialog().getParentEditor().document),
                w = this.getInputElement().$;
                v.$.text = s;
                v.$.value = t === undefined || t === null ? s: t;
                if (u === undefined || u === null) {
                    if (c) w.add(v.$);
                    else w.add(v.$, null);
                } else w.add(v.$, u);
                return this;
            },
            remove: function(s) {
                var t = this.getInputElement().$;
                t.remove(s);
                return this;
            },
            clear: function() {
                var s = this.getInputElement().$;
                while (s.length > 0) s.remove(0);
                return this;
            },
            keyboardFocusable: true
        },
        o, true);
        k.dialog.checkbox.prototype = e.extend(new k.dialog.uiElement(), {
            getInputElement: function() {
                return this._.checkbox.getElement();
            },
            setValue: function(s) {
                this.getInputElement().$.checked = s;
                this.fire('change', {
                    value: s
                });
            },
            getValue: function() {
                return this.getInputElement().$.checked;
            },
            accessKeyUp: function() {
                this.setValue(!this.getValue());
            },
            eventProcessors: {
                onChange: function(s, t) {
                    if (!c) return p.onChange.apply(this, arguments);
                    else {
                        s.on('load',
                        function() {
                            var u = this._.checkbox.getElement();
                            u.on('propertychange',
                            function(v) {
                                v = v.data.$;
                                if (v.propertyName == 'checked') this.fire('change', {
                                    value: u.$.checked
                                });
                            },
                            this);
                        },
                        this);
                        this.on('change', t);
                    }
                    return null;
                }
            },
            keyboardFocusable: true
        },
        o, true);
        k.dialog.radio.prototype = e.extend(new k.dialog.uiElement(), {
            setValue: function(s) {
                var t = this._.children,
                u;
                for (var v = 0; v < t.length && (u = t[v]); v++) u.getElement().$.checked = u.getValue() == s;
                this.fire('change', {
                    value: s
                });
            },
            getValue: function() {
                var s = this._.children;
                for (var t = 0; t < s.length; t++) {
                    if (s[t].getElement().$.checked) return s[t].getValue();
                }
                return null;
            },
            accessKeyUp: function() {
                var s = this._.children,
                t;
                for (t = 0; t < s.length; t++) {
                    if (s[t].getElement().$.checked) {
                        s[t].getElement().focus();
                        return;
                    }
                }
                s[0].getElement().focus();
            },
            eventProcessors: {
                onChange: function(s, t) {
                    if (!c) return p.onChange.apply(this, arguments);
                    else {
                        s.on('load',
                        function() {
                            var u = this._.children,
                            v = this;
                            for (var w = 0; w < u.length; w++) {
                                var x = u[w].getElement();
                                x.on('propertychange',
                                function(y) {
                                    y = y.data.$;
                                    if (y.propertyName == 'checked' && this.$.checked) v.fire('change', {
                                        value: this.getAttribute('value')
                                    });
                                });
                            }
                        },
                        this);
                        this.on('change', t);
                    }
                    return null;
                }
            },
            keyboardFocusable: true
        },
        o, true);
        k.dialog.file.prototype = e.extend(new k.dialog.labeledElement(), o, {
            getInputElement: function() {
                var s = a.document.getById(this._.frameId).getFrameDocument();
                return s.$.forms.length > 0 ? new h(s.$.forms[0].elements[0]) : this.getElement();
            },
            submit: function() {
                this.getInputElement().getParent().$.submit();
                return this;
            },
            getAction: function(s) {
                return this.getInputElement().getParent().$.action;
            },
            reset: function() {
                var s = a.document.getById(this._.frameId),
                t = s.getFrameDocument(),
                u = this._.definition,
                v = this._.buttons;
                function w() {
                    t.$.open();
                    if (b.isCustomDomain()) t.$.domain = document.domain;
                    var x = '';
                    if (u.size) x = u.size - (c ? 7 : 0);
                    t.$.write(['<html><head><title></title></head><body style="margin: 0; overflow: hidden; background: transparent;">', '<form enctype="multipart/form-data" method="POST" action="', e.htmlEncode(u.action), '">', '<input type="file" name="', e.htmlEncode(u.id || 'cke_upload'), '" size="', e.htmlEncode(x > 0 ? x: ''), '" />', '</form>', '</body></html>'].join(''));
                    t.$.close();
                    for (var y = 0; y < v.length; y++) v[y].enable();
                };
                if (b.gecko) setTimeout(w, 500);
                else w();
            },
            getValue: function() {
                return '';
            },
            eventProcessors: p,
            keyboardFocusable: true
        },
        true);
        k.dialog.fileButton.prototype = new k.dialog.button();
        a.dialog.addUIElement('text', m);
        a.dialog.addUIElement('password', m);
        a.dialog.addUIElement('textarea', n);
        a.dialog.addUIElement('checkbox', n);
        a.dialog.addUIElement('radio', n);
        a.dialog.addUIElement('button', n);
        a.dialog.addUIElement('select', n);
        a.dialog.addUIElement('file', n);
        a.dialog.addUIElement('fileButton', n);
        a.dialog.addUIElement('html', n);
    })();
    a.themes.add('default', (function() {
        function l(m, n) {
            var o, p;
            p = m.config.sharedSpaces;
            p = p && p[n];
            p = p && a.document.getById(p);
            if (p) {
                var q = '<span class="cke_shared"><span class="' + m.skinClass + ' cke_editor_' + m.name + '">' + '<span class="' + b.cssClass + '">' + '<span class="cke_wrapper cke_' + m.lang.dir + '">' + '<span class="cke_editor">' + '<div class="cke_' + n + '">' + '</div></span></span></span></span></span>',
                r = p.append(h.createFromHtml(q, p.getDocument()));
                if (p.getCustomData('cke_hasshared')) r.hide();
                else p.setCustomData('cke_hasshared', 1);
                o = r.getChild([0, 0, 0, 0]);
                m.on('focus',
                function() {
                    for (var s = 0, t, u = p.getChildren(); t = u.getItem(s); s++) {
                        if (t.type == 1 && !t.equals(r) && t.hasClass('cke_shared')) t.hide();
                    }
                    r.show();
                });
                m.on('destroy',
                function() {
                    r.remove();
                });
            }
            return o;
        };
        return {
            build: function(m, n) {
                var o = m.name,
                p = m.element,
                q = m.elementMode;
                if (!p || q == 0) return;
                if (q == 1) p.hide();
                var r = m.fire('themeSpace', {
                    space: 'top',
                    html: ''
                }).html,
                s = m.fire('themeSpace', {
                    space: 'contents',
                    html: ''
                }).html,
                t = m.fireOnce('themeSpace', {
                    space: 'bottom',
                    html: ''
                }).html,
                u = s && m.config.height,
                v = m.config.tabIndex || m.element.getAttribute('tabindex') || 0;
                if (!s) u = 'auto';
                else if (!isNaN(u)) u += 'px';
                var w = '',
                x = m.config.width;
                if (x) {
                    if (!isNaN(x)) x += 'px';
                    w += 'width: ' + x + ';';
                }
                var y = r && l(m, 'top'),
                z = l(m, 'bottom');
                y && (y.setHtml(r), r = '');
                z && (z.setHtml(t), t = '');
                var A = h.createFromHtml(['<span id="cke_', o, '" onmousedown="return false;" class="', m.skinClass, ' cke_editor_', o, '" dir="', m.lang.dir, '" title="', b.gecko ? ' ': '', '" lang="', m.langCode, '" tabindex="' + v + '"' + (w ? ' style="' + w + '"': '') + '>' + '<span class="', b.cssClass, '"><span class="cke_wrapper cke_', m.lang.dir, '"><table class="cke_editor" border="0" cellspacing="0" cellpadding="0"><tbody><tr', r ? '': ' style="display:none"', '><td id="cke_top_', o, '" class="cke_top">', r, '</td></tr><tr', s ? '': ' style="display:none"', '><td id="cke_contents_', o, '" class="cke_contents" style="height:', u, '">', s, '</td></tr><tr', t ? '': ' style="display:none"', '><td id="cke_bottom_', o, '" class="cke_bottom">', t, '</td></tr></tbody></table><style>.', m.skinClass, '{visibility:hidden;}</style></span></span></span>'].join(''));
                A.getChild([0, 0, 0, 0, 0]).unselectable();
                A.getChild([0, 0, 0, 0, 2]).unselectable();
                if (q == 1) A.insertAfter(p);
                else p.append(A);
                m.container = A;
                A.disableContextMenu();
                m.fireOnce('themeLoaded');
                m.fireOnce('uiReady');
            },
            buildDialog: function(m) {
                var n = e.getNextNumber(),
                o = h.createFromHtml(['<div class="cke_editor_' + m.name.replace('.', '\\.') + '_dialog cke_skin_', m.skinName, '" dir="', m.lang.dir, '" lang="', m.langCode, '"><table class="cke_dialog', ' ' + b.cssClass, ' cke_', m.lang.dir, '" style="position:absolute"><tr><td><div class="%body"><div id="%title#" class="%title"></div><div id="%close_button#" class="%close_button"><span>X</span></div><div id="%tabs#" class="%tabs"></div><table class="%contents"><tr><td id="%contents#" class="%contents"></td></tr></table><div id="%footer#" class="%footer"></div></div><div id="%tl#" class="%tl"></div><div id="%tc#" class="%tc"></div><div id="%tr#" class="%tr"></div><div id="%ml#" class="%ml"></div><div id="%mr#" class="%mr"></div><div id="%bl#" class="%bl"></div><div id="%bc#" class="%bc"></div><div id="%br#" class="%br"></div></td></tr></table>', c ? '': '<style>.cke_dialog{visibility:hidden;}</style>', '</div>'].join('').replace(/#/g, '_' + n).replace(/%/g, 'cke_dialog_')),
                p = o.getChild([0, 0, 0, 0, 0]),
                q = p.getChild(0),
                r = p.getChild(1);
                q.unselectable();
                r.unselectable();
                return {
                    element: o,
                    parts: {
                        dialog: o.getChild(0),
                        title: q,
                        close: r,
                        tabs: p.getChild(2),
                        contents: p.getChild([3, 0, 0, 0]),
                        footer: p.getChild(4)
                    }
                };
            },
            destroy: function(m) {
                var n = m.container;
                if (c) {
                    n.setStyle('display', 'none');
                    var o = document.body.createTextRange();
                    o.moveToElementText(n.$);
                    try {
                        o.select();
                    } catch(p) {}
                }
                if (n) n.remove();
                if (m.elementMode == 1) {
                    m.element.show();
                    delete m.element;
                }
            }
        };
    })());
    a.editor.prototype.getThemeSpace = function(l) {
        var m = 'cke_' + l,
        n = this._[m] || (this._[m] = a.document.getById(m + '_' + this.name));
        return n;
    };
    a.editor.prototype.resize = function(l, m, n, o) {
        var p = /^\d+$/;
        if (p.test(l)) l += 'px';
        var q = this.container,
        r = a.document.getById('cke_contents_' + this.name),
        s = o ? q.getChild(0) : q;
        b.webkit && s.setStyle('display', 'none');
        s.setStyle('width', l);
        if (b.webkit) {
            s.$.offsetWidth;
            s.setStyle('display', '');
        }
        var t = n ? 0 : (s.$.offsetHeight || 0) - (r.$.clientHeight || 0);
        r.setStyle('height', Math.max(m - t, 0) + 'px');
        this.fire('resize');
    };
    a.editor.prototype.getResizable = function() {
        return this.container.getChild(0);
    };
})();