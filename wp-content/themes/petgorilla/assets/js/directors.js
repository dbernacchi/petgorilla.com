$(window).resize(function(){
	
	
		clearTimeout(wait_dig);
		var wait_dig = setTimeout(function(){
			if(winWt > 768){
				initialize();
			}
		});
	
});

!
function(processors)
{
	/**
	 * @param {string} name
	 * @return {?}
	 */

	function r(name)
	{
		if (t[name])
		{
			return t[name].exports;
		}
		var mod = t[name] = {
			exports: {},
			id: name,
			loaded: false
		};
		return processors[name].call(mod.exports, mod, mod.exports, r), mod.loaded = true, mod.exports;
	}
	var t = {};
	return r.m = processors, r.c = t, r.p = "http://localhost:8888/wp-content/themes/petgorilla/ajax/", r(0);
}([function(dataAndEvents, deepDataAndEvents, test)
{
	/**
	 * @param {string} data
	 * @return {?}
	 */

	function fire(data)
	{
		return data && data.__esModule ? data : {
			"default": data
		};
	}
	var args = test(6);
	var memory = (fire(args), test(1));
	fire(memory);
	test(5); /** @type {boolean} */
	var radius = false; /** @type {number} */
	var position = 0;
	var self = void 0; /** @type {Array} */
	var data = [];
	/**
	 * @return {?}
	 */
	var detachEvent = function()
		{
			return window.innerWidth;
		};
	/**
	 * @param {Function} callback
	 * @return {undefined}
	 */
	var doRequest = function(callback)
		{ /** @type {XMLHttpRequest} */
			var xhr = new XMLHttpRequest;
			xhr.addEventListener("load", function()
			{
				var _data = void 0;
				try
				{ /** @type {*} */
					_data = JSON.parse(this.responseText);
				}
				catch (n)
				{
					return;
				} /** @type {*} */
				data = _data;
				callback();
			});
			xhr.open("GET", window._src + "?album=" + window._albumID);
			xhr.send();
		};
	/**
	 * @return {undefined}
	 */
	var loaded = function()
		{
			var rootProperty = arguments.length <= 0 || void 0 === arguments[0] ? 0 : arguments[0]; /** @type {number} */
			var a = (data[rootProperty], 0);
			for (; a < data.length; a++)
			{
				success(a);
			}
			done();
			if (detachEvent() > 1E3)
			{
				initialize();
			}
		};
	/**
	 * @param {number} key
	 * @return {undefined}
	 */
	var success = function(key)
		{
			var winWt = parseInt($(window).width())
			var d = data[key];
			if (d && d.posters)
			{ /** @type {(HTMLElement|null)} */
				var s2 = document.getElementById("director-video-thumbs"); /** @type {Element} */
				var div2 = document.createElement("li"); /** @type {string} */
				
/*
				if(winWt <= 768){
					div2.setAttribute('class','col-md-6');
				}else{
					div2.setAttribute('class','col-xs-12');
				}
*/
				
				var item = '<figure style="background-image: url(' + d.posters.medium.link + ')"><span class="screen-reader-text">' + d.title + "</span></figure>"; /** @type {string} */
				div2.innerHTML = item;
				div2.addEventListener("click", function(types)
				{
					$('#site-content-contain').scrollTop(0, 0);
					types.preventDefault();
					done(key);
				});
				s2.appendChild(div2);
				
				if(winWt > 768){
					initialize();
				}
				
			}
		}; /** @type {number} */
	var disable = 0; /** @type {number} */
	var newY = 0; /** @type {null} */
	var button = null; /** @type {null} */
	var node = null;
	/**
	 * @return {undefined}
	 */
	var initialize = function()
		{ /** @type {(HTMLElement|null)} */
			var div = document.getElementById("director-video-thumbs"); /** @type {(Node|null)} */
			var canvas = div.parentNode; /** @type {NodeList} */
			var codeSegments = div.querySelectorAll("li");
			if (!(codeSegments.length <= 6))
			{ /** @type {(CSSStyleDeclaration|null)} */
				var style = window.getComputedStyle(div); /** @type {number} */
				newY = parseFloat(style.getPropertyValue("width")) / 6; /** @type {number} */
				var i = 0;
				for (; i < codeSegments.length; i++)
				{ 
					codeSegments[i].style.width = 100 / codeSegments.length + "%";
				} 
				var wrapper = document.createElement("div"); /** @type {string} */
				
				wrapper.style.height = '100%';
				wrapper.style.width = 16.667 * codeSegments.length + "%";
				wrapper.appendChild(div);
				
				canvas.appendChild(wrapper); /** @type {Element} */
				
				button = document.createElement("span");
				button.classList.add("thumbarrow");
				button.classList.add("fa");
				button.classList.add("fa-angle-left");
				button.classList.add("prev"); /** @type {Element} */
				
				node = document.createElement("span");
				node.classList.add("thumbarrow");
				node.classList.add("fa");
				node.classList.add("fa-angle-right");
				node.classList.add("next"); /** @type {(Node|null)} */
				
				canvas.appendChild(button);
				canvas.appendChild(node);
				button.addEventListener("click", function()
				{
					render(1);
				});
				node.addEventListener("click", function()
				{
					render(-1);
				});
				render(0);
			}
		};
		

	/**
	 * @param {number} rows
	 * @return {?}
	 */
	var render = function(rows)
		{ /** @type {(HTMLElement|null)} */
			var div = document.getElementById("director-video-thumbs"); /** @type {NodeList} */
			var lis = div.querySelectorAll("li");
			return disable += rows, disable > 0 ? void disable-- : disable < 6 - lis.length ? void disable++ : (disable >= 0 ? button.classList.add("disable") : button.classList.remove("disable"), disable <= 6 - lis.length ? node.classList.add("disable") : node.classList.remove("disable"), void(div.parentNode.style.left = disable * newY + "px"));
		};
	/**
	 * @param {Object} img
	 * @return {undefined}
	 */
	var init = function(img)
		{
			var w = radius; /** @type {number} */
			var dialogHeight = Math.round(w * img.height / img.width); /** @type {(HTMLElement|null)} */
			var id = document.getElementById("director-video-wrap"); /** @type {Element} */
			var el = document.createElement("iframe"); /** @type {string} */
			var query = "player-" + img.id + "-" + Math.round(1E3 * Math.random());
			var attrs = {
				id: query,
				src: "//player.vimeo.com/video/" + img.id + "?api=1&amp;player_id=" + query,
				width: w,
				height: dialogHeight,
				frameborder: 0,
				allowfullscreen: "allowfullscreen"
			};
			var attr;
			for (attr in attrs)
			{
				el.setAttribute(attr, attrs[attr]);
			}
			id.appendChild(el);
			self = $f(el);
			self.addEvent("ready", function(dataAndEvents)
			{
				self.addEvent("finish", function(dataAndEvents)
				{
					oncomplete();
				});
				self.api("play");
			});
		};
	/**
	 * @return {undefined}
	 */
	var oncomplete = function()
		{
			var i = position;
			i++;
			if (i >= data.length)
			{ /** @type {number} */
				i = 0;
			}
			done(i);
		};
	/**
	 * @return {undefined}
	 */
	var done = function()
		{
			var i = arguments.length <= 0 || void 0 === arguments[0] ? 0 : arguments[0];
			if (self)
			{
				self.api("stop");
				self.removeEvent("finish");
				self.removeEvent("ready");
				setTimeout(function()
				{
					var ele = self.element;
					ele.parentNode.removeChild(ele); /** @type {null} */
					self = null;
				}, 10);
			}
			setTimeout(function()
			{
				init(data[i]);
			}, 20);
			position = i;
			/** @type {NodeList} */
			var verticalSlides = document.querySelectorAll("#director-video-thumbs li");
			/** @type {number} */
			var j = 0;
			for (;j < verticalSlides.length;j++) {
				if (j == position) {
					verticalSlides[j].classList.add("active");
				} else {
					verticalSlides[j].classList.remove("active");
				}
			}
		};
	window.addEventListener("load", function()
	{
		if (detachEvent() > 1E3)
		{ /** @type {NodeList} */
			//var codeSegments = document.querySelectorAll(".directors .director-wrap > div");
			/** @type {number} */
			//radius = (detachEvent() - 200) / 2;
			/** @type {number} */
			//var iHeight = Math.round(0.5625 * radius);
			/** @type {number} */
			//var i = 0;
			// for (;i < codeSegments.length;i++) {
			/** @type {string} */
			//codeSegments[i].style.height = iHeight + "px";
			// }
		}
		else
		{ /** @type {number} */
			// radius = detachEvent() - 40;
		}
		doRequest(function()
		{
			if (0 == radius)
			{ /** @type {number} */
				radius = 640;
			}
			loaded();
		});
	}, false);
}, function(dataAndEvents, deepDataAndEvents, require)
{
	/**
	 * @param {Object} value
	 * @return {?}
	 */

	function appendModelPrefix(value)
	{
		return value && value.__esModule ? value : {
			"default": value
		};
	}
	var other = require(2);
	var fullOtherName = appendModelPrefix(other);
	!
	function()
	{
		/**
		 * @param {Element} el
		 * @return {undefined}
		 */

		function DOMTokenList(el)
		{ /** @type {Element} */
			this.el = el;
			var codeSegments = el.className.replace(/^\s+|\s+$/g, "").split(/\s+/); /** @type {number} */
			var i = 0;
			for (; i < codeSegments.length; i++)
			{
				push.call(this, codeSegments[i]);
			}
		}
		/**
		 * @param {Object} obj
		 * @param {string} prop
		 * @param {Function} getter
		 * @return {undefined}
		 */

		function defineElementGetter(obj, prop, getter)
		{
			if (fullOtherName["default"])
			{
				(0, fullOtherName["default"])(obj, prop, { /** @type {Function} */
					get: getter
				});
			}
			else
			{
				obj.__defineGetter__(prop, getter);
			}
		}
		if (!("undefined" == typeof window.Element || "classList" in document.documentElement))
		{
			var prototype = Array.prototype; /** @type {function (this:(Array.<T>|{length: number}), ...[T]): number} */
			var push = prototype.push; /** @type {function (this:(Array.<T>|{length: number}), *=, *=, ...[T]): Array.<T>} */
			var splice = prototype.splice; /** @type {function (this:(string|{length: number}), *=): string} */
			var join = prototype.join;
			DOMTokenList.prototype = {
				/**
				 * @param {string} item
				 * @return {undefined}
				 */
				add: function(item)
				{
					if (!this.contains(item))
					{
						push.call(this, item);
						this.el.className = this.toString();
					}
				},
				/**
				 * @param {string} other
				 * @return {?}
				 */
				contains: function(other)
				{
					return -1 != this.el.className.indexOf(other);
				},
				/**
				 * @param {?} escape
				 * @return {?}
				 */
				item: function(escape)
				{
					return this[escape] || null;
				},
				/**
				 * @param {string} item
				 * @return {undefined}
				 */
				remove: function(item)
				{
					if (this.contains(item))
					{ /** @type {number} */
						var i = 0;
						for (; i < this.length && this[i] != item; i++)
						{}
						splice.call(this, i, 1);
						this.el.className = this.toString();
					}
				},
				/**
				 * @return {?}
				 */
				toString: function()
				{
					return join.call(this, " ");
				},
				/**
				 * @param {string} item
				 * @return {?}
				 */
				toggle: function(item)
				{
					return this.contains(item) ? this.remove(item) : this.add(item), this.contains(item);
				}
			}; /** @type {function (Element): undefined} */
			window.DOMTokenList = DOMTokenList;
			defineElementGetter(Element.prototype, "classList", function()
			{
				return new DOMTokenList(this);
			});
		}
	}();
}, function(module, dataAndEvents, $sanitize)
{
	module.exports = {
		"default": $sanitize(3),
		__esModule: true
	};
}, function(module, dataAndEvents, require)
{
	var _ = require(4);
	/**
	 * @param {?} protoProps
	 * @param {?} argv
	 * @param {?} staticProps
	 * @return {?}
	 */
	module.exports = function(protoProps, argv, staticProps)
	{
		return _.setDesc(protoProps, argv, staticProps);
	};
}, function(module, dataAndEvents)
{ /** @type {function (new:Object, *=): ?} */
	var OBJECT = Object;
	module.exports = { /** @type {function ((Object|null), (Object|null)=): Object} */
		create: OBJECT.create,
		/** @type {function (Object): (Object|null)} */
		getProto: OBJECT.getPrototypeOf,
		/** @type {function (this:Object, string): boolean} */
		isEnum: {}.propertyIsEnumerable,
		/** @type {function (Object, string): (ObjectPropertyDescriptor|undefined)} */
		getDesc: OBJECT.getOwnPropertyDescriptor,
		/** @type {function (Object, string, Object): Object} */
		setDesc: OBJECT.defineProperty,
		/** @type {function (Object, Object): Object} */
		setDescs: OBJECT.defineProperties,
		/** @type {function (Object): Array.<string>} */
		getKeys: OBJECT.keys,
		/** @type {function (Object): Array.<string>} */
		getNames: OBJECT.getOwnPropertyNames,
		getSymbols: OBJECT.getOwnPropertySymbols,
		/** @type {function (this:(Array.<T>|string|{length: number}), (function (this:S, T, number, Array.<T>): ?|null), S=): ?} */
		each: [].forEach
	};
}, function(dataAndEvents, deepDataAndEvents)
{}, function(dataAndEvents, deepDataAndEvents, require)
{
	/**
	 * @param {Object} value
	 * @return {?}
	 */

	function appendModelPrefix(value)
	{
		return value && value.__esModule ? value : {
			"default": value
		};
	}
	var other = require(7);
	var fullOtherName = appendModelPrefix(other);
	(function()
	{
		/**
		 * @param {?} iframe
		 * @return {?}
		 */

		function Froogaloop(iframe)
		{
			return new Froogaloop.fn.init(iframe);
		}
		/**
		 * @param {(Object|string)} method
		 * @param {?} data
		 * @param {?} allow
		 * @return {?}
		 */

		function postMessage(method, data, allow)
		{
			if (!allow.contentWindow.postMessage)
			{
				return false;
			}
			var sData = (0, fullOtherName["default"])(
			{
				method: method,
				value: data
			});
			allow.contentWindow.postMessage(sData, origin);
		}
		/**
		 * @param {MessageEvent} event
		 * @return {?}
		 */

		function onMessageReceived(event)
		{
			var data;
			var callbackEvent;
			try
			{ /** @type {*} */
				data = JSON.parse(event.data);
				callbackEvent = data.event || data.method;
			}
			catch (i)
			{}
			if ("ready" != callbackEvent || (hasMembers || (hasMembers = true)), !/^https?:\/\/player.vimeo.com/.test(event.origin))
			{
				return false;
			}
			if ("*" === origin)
			{
				origin = event.origin;
			}
			var source = data.value;
			var param = data.data;
			var target_id = "" === target_id ? null : data.player_id;
			var callback = getCallback(callbackEvent, target_id); /** @type {Array} */
			var params = [];
			return callback ? (void 0 !== source && params.push(source), param && params.push(param), target_id && params.push(target_id), params.length > 0 ? callback.apply(null, params) : callback.call()) : false;
		}
		/**
		 * @param {string} eventName
		 * @param {Function} callback
		 * @param {?} target_id
		 * @return {undefined}
		 */

		function storeCallback(eventName, callback, target_id)
		{
			if (target_id)
			{
				if (!eventCallbacks[target_id])
				{
					eventCallbacks[target_id] = {};
				} /** @type {Function} */
				eventCallbacks[target_id][eventName] = callback;
			}
			else
			{ /** @type {Function} */
				eventCallbacks[eventName] = callback;
			}
		}
		/**
		 * @param {?} eventName
		 * @param {?} target_id
		 * @return {?}
		 */

		function getCallback(eventName, target_id)
		{
			return target_id ? eventCallbacks[target_id][eventName] : eventCallbacks[eventName];
		}
		/**
		 * @param {string} eventName
		 * @param {?} target_id
		 * @return {?}
		 */

		function removeCallback(eventName, target_id)
		{
			if (target_id && eventCallbacks[target_id])
			{
				if (!eventCallbacks[target_id][eventName])
				{
					return false;
				} /** @type {null} */
				eventCallbacks[target_id][eventName] = null;
			}
			else
			{
				if (!eventCallbacks[eventName])
				{
					return false;
				} /** @type {null} */
				eventCallbacks[eventName] = null;
			}
			return true;
		}
		/**
		 * @param {Function} obj
		 * @return {?}
		 */

		function isFunction(obj)
		{
			return !!(obj && (obj.constructor && (obj.call && obj.apply)));
		}
		var eventCallbacks = {}; /** @type {boolean} */
		var hasMembers = false; /** @type {string} */
		var origin = (Array.prototype.slice, "*");
		return Froogaloop.fn = Froogaloop.prototype = {
			element: null,
			/**
			 * @param {HTMLElement} elt
			 * @return {?}
			 */
			init: function(elt)
			{
				return "string" == typeof elt && (elt = document.getElementById(elt)), this.element = elt, this;
			},
			/**
			 * @param {string} method
			 * @param {Object} callback
			 * @return {?}
			 */
			api: function(method, callback)
			{
				if (!this.element || !method)
				{
					return false;
				}
				var that = this;
				var element = that.element;
				var target_id = "" !== element.id ? element.id : null;
				var pdataCur = isFunction(callback) ? null : callback;
				var restoreScript = isFunction(callback) ? callback : null;
				return restoreScript && storeCallback(method, restoreScript, target_id), postMessage(method, pdataCur, element), that;
			},
			/**
			 * @param {string} eventName
			 * @param {Function} callback
			 * @return {?}
			 */
			addEvent: function(eventName, callback)
			{
				if (!this.element)
				{
					return false;
				}
				var that = this;
				var element = that.element;
				var target_id = "" !== element.id ? element.id : null;
				return storeCallback(eventName, callback, target_id), "ready" != eventName ? postMessage("addEventListener", eventName, element) : "ready" == eventName && (hasMembers && callback.call(null, target_id)), that;
			},
			/**
			 * @param {string} eventName
			 * @return {?}
			 */
			removeEvent: function(eventName)
			{
				if (!this.element)
				{
					return false;
				}
				var that = this;
				var element = that.element;
				var target_id = "" !== element.id ? element.id : null;
				var removed = removeCallback(eventName, target_id);
				if ("ready" != eventName)
				{
					if (removed)
					{
						postMessage("removeEventListener", eventName, element);
					}
				}
			}
		}, Froogaloop.fn.init.prototype = Froogaloop.fn, window.addEventListener ? window.addEventListener("message", onMessageReceived, false) : window.attachEvent("onmessage", onMessageReceived), window.Froogaloop = window.$f = Froogaloop;
	})();
}, function(module, dataAndEvents, $sanitize)
{
	module.exports = {
		"default": $sanitize(8),
		__esModule: true
	};
}, function(module, dataAndEvents, require)
{
	var Y = require(9);
	/**
	 * @param {?} chai
	 * @return {?}
	 */
	module.exports = function(chai)
	{
		return (Y.JSON && Y.JSON.stringify || JSON.stringify).apply(JSON, arguments);
	};
}, function($, dataAndEvents)
{
	var n = $.exports = {
		version: "1.2.6"
	};
	if ("number" == typeof __e)
	{
		__e = n;
	}
}]);
